<?php
/**
 * NOTICE OF LICENSE
 * Title   : Conekta Card Payment Gateway for Prestashop
 * Author  : Conekta.io
 * URL     : https://www.conekta.io/es/docs/plugins/prestashop.
 * PHP Version 7.4
 * Conekta File Doc Comment
 *
 * @author    Conekta <support@conekta.io>
 * @copyright 2012-2023 Conekta
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 *
 * @category  Conekta
 *
 * @version   GIT: @3.0.0@
 *
 * @see       https://conekta.com/
 */
require_once dirname(__FILE__) . '/../../model/Database.php';

use Conekta\Api\PlansApi;
use Conekta\ApiException;
use Conekta\Configuration as ConektaConfiguration;
use Conekta\Model\OrderResponse;

class ConektaNotificationModuleFrontController extends ModuleFrontController
{
    public const ORDER_CANCELED = 6;

    public const ORDER_REFUNDED = 7;

    public const ORDER_PENDING_PAYMENT = 20;

    public $auth = false;

    public $ajax;

    private const events = ['order.paid', 'order.expired', 'order.canceled', 'order.refunded', 'plan.deleted', 'order.pending_payment'];

    private const CONEKTA_ORDER_ID_PATTERN = '/^ord_[A-Za-z0-9]+$/';

    private const EXPECTED_PAYMENT_STATUS = [
        'order.paid' => ['paid'],
        'order.expired' => ['expired', 'canceled', 'voided'],
        'order.canceled' => ['expired', 'canceled', 'voided'],
        'order.refunded' => ['refunded'],
        'order.pending_payment' => ['pending_payment'],
    ];

    /**
     * @throws \PrestaShopException
     * @throws Exception
     */
    public function postProcess()
    {
        $this->ajax = 1;
        header('Content-Type: application/json');

        $data = $this->getJsonData();

        if (!isset($data->type, $data->data->object->id)
            || !is_string($data->type)
            || !in_array($data->type, self::events, true)
            || !is_string($data->data->object->id)
        ) {
            return $this->rejected('Evento no reconocido');
        }

        $objectId = $data->data->object->id;

        try {
            if ($data->type === 'plan.deleted') {
                return $this->planDeleted($objectId);
            }

            return $this->processOrderEvent($data->type, $objectId);
        } catch (ApiException $e) {
            http_response_code(503);

            return $this->rejected('No fue posible validar el evento con Conekta');
        }
    }

    private function processOrderEvent(string $eventType, string $conektaOrderId): array
    {
        if (!preg_match(self::CONEKTA_ORDER_ID_PATTERN, $conektaOrderId)) {
            return $this->rejected('Orden no reconocida');
        }

        $transaction = Database::getTransactionByConektaOrderId($conektaOrderId);

        if (empty($transaction)) {
            return $this->rejected('Orden no reconocida');
        }

        $order = new Order((int) $transaction['id_order']);

        if (!Validate::isLoadedObject($order) || (int) $order->id_cart !== (int) $transaction['id_cart']) {
            return $this->rejected('Orden no reconocida');
        }

        if ($this->isAlreadyInEventState($eventType, $order)) {
            return $this->accepted('Evento ya procesado');
        }

        $conektaOrder = $this->module->getApiOrderInstance()->getOrderById($conektaOrderId);

        if (!$this->isValidConektaOrder($eventType, $conektaOrder, $conektaOrderId, $order)) {
            return $this->rejected('El evento no coincide con la orden en Conekta');
        }

        switch ($eventType) {
            case 'order.paid':
                $this->orderPaid($order);

                return $this->accepted('Orden pagada con éxito');
            case 'order.expired':
            case 'order.canceled':
                $this->orderCanceled((int) $order->id);

                return $this->accepted('Orden cancelada con éxito');
            case 'order.refunded':
                $this->orderRefunded((int) $order->id);

                return $this->accepted('Orden reembolsada con éxito');
            case 'order.pending_payment':
                $this->orderPendingPayment($order, $conektaOrder);

                return $this->accepted('Orden en espera de pago');
        }

        return $this->rejected('Evento no reconocido');
    }

    private function isAlreadyInEventState(string $eventType, Order $order): bool
    {
        $currentState = (int) $order->current_state;

        switch ($eventType) {
            case 'order.paid':
                return $currentState === (int) Configuration::get('PS_OS_PAYMENT');
            case 'order.expired':
            case 'order.canceled':
                return $currentState === self::ORDER_CANCELED;
            case 'order.refunded':
                return $currentState === self::ORDER_REFUNDED;
            case 'order.pending_payment':
                return in_array(
                    $currentState,
                    [(int) Configuration::get('waiting_cash_payment'), (int) Configuration::get('waiting_spei_payment')],
                    true
                );
        }

        return false;
    }

    private function isValidConektaOrder(
        string $eventType,
        OrderResponse $conektaOrder,
        string $conektaOrderId,
        Order $order
    ): bool {
        $metadata = (array) $conektaOrder->getMetadata();
        $orderCurrency = new Currency((int) $order->id_currency);
        $expectedAmount = (int) round($order->getOrdersTotalPaid() * 100);

        return $conektaOrder->getId() === $conektaOrderId
            && in_array($conektaOrder->getPaymentStatus(), self::EXPECTED_PAYMENT_STATUS[$eventType], true)
            && isset($metadata['reference_id'])
            && (int) $metadata['reference_id'] === (int) $order->id_cart
            && Tools::strtoupper((string) $conektaOrder->getCurrency()) === Tools::strtoupper($orderCurrency->iso_code)
            && (int) $conektaOrder->getAmount() === $expectedAmount;
    }

    private function orderPaid(Order $order): void
    {
        $orderHistory = new OrderHistory();
        $orderHistory->id_order = (int) $order->id;
        $orderHistory->changeIdOrderState(
            (int) Configuration::get('PS_OS_PAYMENT'),
            (int) $order->id
        );
        $orderHistory->addWithEmail();

        Db::getInstance()->Execute(
            'UPDATE ' . _DB_PREFIX_
            . 'conekta_transaction SET status = "paid" WHERE id_order = '
            . (int) $order->id
        );
    }

    private function orderCanceled(int $orderID): void
    {
        Db::getInstance()->Execute(
            'UPDATE ' . _DB_PREFIX_
            . 'orders SET current_state = ' . self::ORDER_CANCELED . ' WHERE id_order = '
            . $orderID
        );
    }

    private function orderPendingPayment(Order $order, OrderResponse $conektaOrder): void
    {
        $current_state = (int) Configuration::get('waiting_cash_payment');
        $charges = $conektaOrder->getCharges() ? $conektaOrder->getCharges()->getData() : [];
        $paymentMethod = isset($charges[0]) ? $charges[0]->getPaymentMethod() : null;

        if ($paymentMethod !== null && $paymentMethod->getObject() === 'bank_transfer_payment') {
            $current_state = (int) Configuration::get('waiting_spei_payment');
        }

        $order->setCurrentState($current_state);
        $history = new OrderHistory();
        $history->id_order = $order->id;
        $history->changeIdOrderState($current_state, $order->id);
    }

    private function orderRefunded(int $orderID): void
    {
        Db::getInstance()->Execute(
            'UPDATE ' . _DB_PREFIX_
            . 'orders SET current_state = ' . self::ORDER_REFUNDED . ' WHERE id_order = '
            . $orderID
        );
    }

    private function planDeleted(string $planId): array
    {
        $products = Database::getProductIdProductData($planId);

        if (empty($products)) {
            return $this->rejected('Plan no reconocido');
        }

        try {
            $this->getApiPlanInstance()->getPlan($planId);

            return $this->rejected('El plan sigue activo en Conekta');
        } catch (ApiException $e) {
            if ($e->getCode() !== 404) {
                throw $e;
            }
        }

        foreach ($products as $product) {
            Database::updateConektaProductData($product['id_product'], 'is_subscription', 'false');
            Database::updateConektaProductData($product['id_product'], 'subscription_plan', '');
        }

        return $this->accepted('Plan eliminado con éxito');
    }

    private function getApiPlanInstance(): PlansApi
    {
        $config = ConektaConfiguration::getDefaultConfiguration()->setAccessToken($this->module->getConektaApiKey());

        return new PlansApi(null, $config);
    }

    private function accepted(string $message): array
    {
        return ['success' => true, 'message' => $message];
    }

    private function rejected(string $message): array
    {
        return ['success' => false, 'message' => $message];
    }

    /**
     * @throws Exception
     */
    private function getJsonData()
    {
        $body = Tools::file_get_contents('php://input');
        //$this->authenticateEvent($body, filter_input(INPUT_SERVER, 'HTTP_DIGEST'));

        return json_decode($body);
    }

    /**
     * Authenticate events
     *
     * @param $body   string|bool
     * @param $digest mixed a web server can use to negotiate credentials
     *
     * @return void
     *
     * @throws Exception
     */
    private function authenticateEvent($body, $digest)
    {
        $privateKeyString = Configuration::get('CONEKTA_MODE') ?
            Configuration::get('CONEKTA_PRIVATE_KEY_LIVE') :
            Configuration::get('CONEKTA_PRIVATE_KEY_TEST');

        if (!empty($privateKeyString) && !empty($body)) {
            if (!empty($digest)) {
                $privateKey = openssl_pkey_get_private($privateKeyString);
                $encryptedMessage = urldecode($digest);
                $sha256Message = '';
                openssl_private_decrypt(
                    $encryptedMessage,
                    $sha256Message,
                    $privateKey
                );

                if (hash('sha256', $body) != $sha256Message) {
                    throw new Exception('Failed Auth');
                }
            }
        }
    }
}
