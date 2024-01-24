<?php
/**
 * NOTICE OF LICENSE
 * Title   : Conekta Card Payment Gateway for Prestashop
 * Author  : Conekta.io
 * URL     : https://www.conekta.io/es/docs/plugins/prestashop.
 * PHP Version 7.0.0
 * Conekta File Doc Comment
 *
 * @author    Conekta <support@conekta.io>
 * @copyright 2012-2023 Conekta
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 *
 * @category  Conekta
 *
 * @version   GIT: @2.3.7@
 *
 * @see       https://conekta.com/
 */
require_once dirname(__FILE__) . '/../../model/DigitalFemsaDatabase.php';
class ConektaNotificationModuleFrontController extends ModuleFrontController
{
    public const ORDER_CANCELED = 6;

    public const ORDER_REFUNDED = 7;

    public $ajax;

    private const events = ['order.paid', 'order.expired', 'order.canceled', 'order.refunded', 'plan.deleted', 'order.pending_payment'];

    /**
     * @throws \PrestaShopException
     * @throws \Exception
     */
    public function postProcess()
    {
        $this->ajax = 1;

        $data = $this->getJsonData();

        if (isset($data->data) && in_array($data->type, self::events)) {
            switch ($data->type) {
                case self::events[0]:
                    $this->orderPaid($data->data->object);

                    break;

                case self::events[1]:
                case self::events[2]:
                    $orderID = $this->getOrderID($data->data->object);
                    $this->orderCanceled($orderID);

                    break;

                case self::events[3]:
                    $orderID = $this->getOrderID($data->data->object);
                    $this->orderRefunded($orderID);

                    break;

                case self::events[4]:
                    $this->planDeleted($data->data->object);

                    break;
                case self::events[5]:
                    $conektaOrder = $data->data->object;
                    $orderID = $this->getOrderID( $conektaOrder);
                    $this->orderPendingPayment($orderID, $conektaOrder);

                    break;
            }
        }
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
    private function orderPendingPayment($orderID)
    {
        // by default is cash_payment
        $current_state =  (int) Configuration::get('waiting_cash_payment');

        Db::getInstance()->Execute(
            'UPDATE ' . _DB_PREFIX_
            . 'orders SET current_state = ' .   $current_state  . ' WHERE id_order = '
            . pSQL($orderID)
        );
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
        $result = DigitalFemsaDatabase::getProductIdProductData($conektaPlan->id);

        foreach ($result as $product) {
            DigitalFemsaDatabase::updateConektaProductData($product['id_product'], 'is_subscription', 'false');
            DigitalFemsaDatabase::updateConektaProductData($product['id_product'], 'subscription_plan', '');
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
        $result = DigitalFemsaDatabase::getOrderByReferenceId($referenceID);

        return $result['id_order'];
    }

    /**
     * @throws \Exception
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
     * @throws \Exception
     */
    private function authenticateEvent($body, $digest)
    {
        $privateKeyString = Configuration::get('FEMSA_DIGITAL_MODE') ?
            Configuration::get('FEMSA_DIGITAL_PRIVATE_KEY_LIVE') :
            Configuration::get('FEMSA_DIGITAL_PRIVATE_KEY_TEST');

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
