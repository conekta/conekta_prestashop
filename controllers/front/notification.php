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
class ConektaNotificationModuleFrontController extends ModuleFrontController
{
    public const ORDER_CANCELED = 6;

    public const ORDER_REFUNDED = 7;

    public const ORDER_PENDING_PAYMENT = 20;

    public $auth = false;

    public $ajax;

    private const events = ['order.paid', 'order.expired', 'order.canceled', 'order.refunded', 'plan.deleted', 'order.pending_payment'];

    /**
     * @throws \PrestaShopException
     * @throws Exception
     */
    public function postProcess()
    {
        $this->ajax = 1;
        $response = [
            'success' => false,
            'message' => 'Evento no reconocido',
        ];

        $data = $this->getJsonData();

        if (isset($data->data) && in_array($data->type, self::events)) {
            switch ($data->type) {
                case self::events[0]:
                    $this->orderPaid($data->data->object);
                    $response = [
                        'success' => true,
                        'message' => 'Orden pagada con éxito',
                    ];
                    break;

                case self::events[1]:
                case self::events[2]:
                    $orderID = $this->getOrderID($data->data->object);
                    $this->orderCanceled($orderID);
                    $response = [
                        'success' => true,
                        'message' => 'Orden cancelada con éxito',
                        'orderID' => $orderID,
                    ];
                    break;

                case self::events[3]:
                    $orderID = $this->getOrderID($data->data->object);
                    $this->orderRefunded($orderID);
                    $response = [
                        'success' => true,
                        'message' => 'Orden reembolsada con éxito',
                        'orderID' => $orderID,
                    ];
                    break;

                case self::events[4]:
                    $response = [
                        'success' => true,
                        'message' => 'Plan eliminado con éxito',
                    ];
                    $this->planDeleted($data->data->object);

                    break;
                case self::events[5]:
                    $conektaOrder = $data->data->object;
                    $orderID = $this->getOrderID( $conektaOrder);
                    $this->orderPendingPayment($orderID, $conektaOrder);

                    $response = [
                        'success' => true,
                        'message' => 'Orden en espera de pago',
                        'orderID' => $orderID,
                    ];

                    break;
            }
        }
        header('Content-Type: application/json');
        return $response;
    }


    /**
     * @param $conektaOrder
     *
     * @return void
     *
     * @throws \PrestaShopDatabaseException
     * @throws \PrestaShopException
     */
    private function orderPaid($conektaOrder)
    {
        $orderID = $this->getOrderID($conektaOrder);
        $order = new Order($orderID);
        $orderFields = $order->getFields();
        $currencyPayment = Currency::getPaymentCurrencies(
            Module::getModuleIdByName('conekta'),
            $orderFields['id_shop']
        );
        $totalOrderAmount = $order->getOrdersTotalPaid();
        $strTotalOrderAmount = (string) $totalOrderAmount * 100;

        if ($currencyPayment[0]['iso_code'] === $conektaOrder->currency) {
            if ($strTotalOrderAmount == $conektaOrder->amount) {
                $orderHistory = new OrderHistory();
                $orderHistory->id_order = (int) $order->id;
                $orderHistory->changeIdOrderState(
                    (int) Configuration::get('PS_OS_PAYMENT'),
                    (int) $order->id
                );
                $orderHistory->addWithEmail();
                $addIdTransaction = '';

                if (isset($conektaOrder->checkout->plan_id)) {
                    $addIdTransaction = ', id_transaction = ' . json_encode($conektaOrder->charges->data[0]->id);
                }

                Db::getInstance()->Execute(
                    'UPDATE ' . _DB_PREFIX_
                    . 'conekta_transaction SET status = "paid"' . $addIdTransaction . ' WHERE id_order = '
                    . pSQL($orderID)
                );
            }
        }
    }

    /**
     * @param $orderID
     *
     * @return void
     */
    private function orderCanceled($orderID)
    {
        Db::getInstance()->Execute(
            'UPDATE ' . _DB_PREFIX_
            . 'orders SET current_state = ' . self::ORDER_CANCELED . ' WHERE id_order = '
            . pSQL($orderID)
        );
    }
    /**
     * @param $orderID
     *
     * @return void
     */
    private function orderPendingPayment($orderID, $conektaOrder)
    {
        // by default is cash_payment
        $current_state =  (int) Configuration::get('waiting_cash_payment');

        // checks if payment method is spei and override config state
        if (isset($conektaOrder['charges']['data'][0]['payment_method']['object']) && $conektaOrder['charges']['data'][0]['payment_method']['object'] === 'bank_transfer_payment') {
            $current_state =  (int) Configuration::get('waiting_spei_payment');
        }
/*
        Db::getInstance()->Execute(
            'UPDATE ' . _DB_PREFIX_
            . 'orders SET current_state = ' .   $current_state  . ' WHERE id_order = '
            . pSQL($orderID)
        ); */
          $order = new Order($orderID);

        if (Validate::isLoadedObject($order)) {
            $order->setCurrentState( $current_state);
            $history = new OrderHistory();
            $history->id_order = $order->id;
            $history->changeIdOrderState( $current_state, $order->id);
        }
    }


    /**
     * @param $orderID
     *
     * @return void
     */
    private function orderRefunded($orderID)
    {
        Db::getInstance()->Execute(
            'UPDATE ' . _DB_PREFIX_
            . 'orders SET current_state = ' . self::ORDER_REFUNDED . ' WHERE id_order = '
            . pSQL($orderID)
        );
    }

    /**
     * @param $conektaPlan
     *
     * @return void
     */
    private function planDeleted($conektaPlan)
    {
        $result = Database::getProductIdProductData($conektaPlan->id);

        foreach ($result as $product) {
            Database::updateConektaProductData($product['id_product'], 'is_subscription', 'false');
            Database::updateConektaProductData($product['id_product'], 'subscription_plan', '');
        }
    }

    /**
     * @param $conektaOrder
     *
     * @return mixed
     */
    private function getOrderID($conektaOrder)
    {
        $referenceID = (string) $conektaOrder->metadata->reference_id;
        $result = Database::getOrderByReferenceId($referenceID);

        return $result['id_order'];
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
