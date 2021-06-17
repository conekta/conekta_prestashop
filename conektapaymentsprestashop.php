<?php
/**
 * 2007-2019 PrestaShop
 *
 * NOTICE OF LICENSE
 * Title   : Conekta Card Payment Gateway for Prestashop
 * Author  : Conekta.io
 * URL     : https://www.conekta.io/es/docs/plugins/prestashop.
 * PHP Version 7.0.0
 *
 * ConektaPaymentsPrestashop File Doc Comment
 *
 * @author    Conekta <support@conekta.io>
 * @copyright 2012-2019 Conekta
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @category  ConektaPaymentsPrestashop
 * @package   ConektaPaymentsPrestashop
 * @version   GIT: @1.1.0@
 * @link      https://conekta.com/
 */

use PrestaShop\PrestaShop\Core\Payment\PaymentOption;

require_once dirname(__FILE__) . '/model/Config.php';
require_once dirname(__FILE__) . '/model/Database.php';
require_once dirname(__FILE__) . '/conektagatewayhelper.php';
require_once dirname(__FILE__) . '/lib/conekta-php/lib/Conekta.php';

if (!defined('_PS_VERSION_')) {
    exit;
}

define("METADATA_LIMIT", 12);
define("CANCELLED_ID", 6);
define("REFUNDED_ID", 7);

/**
 * ConektaPaymentsPrestashop Class Doc Comment
 *
 * @category Class
 * @package  ConektaPaymentsPrestashop
 * @author   Conekta <support@conekta.io>
 * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link     https://conekta.com/
 */

class ConektaPaymentsPrestashop extends PaymentModule
{
    protected $html = '';
    protected $postErrors = array();

    public $details;
    public $owner;
    public $address;
    public $extra_mail_vars;

    /**
     * Implement the configuration of the Conekta Prestashop module
     */
    public function __construct()
    {
        $this->name = 'conektapaymentsprestashop';
        $this->tab = 'payments_gateways';
        $this->version = '1.1.0';
        $this->ps_versions_compliancy = array(
            'min' => '1.7',
            'max' => _PS_VERSION_
        );
        $this->author = 'Conekta';
        $this->module_key = 'db59557d5fe73f63180043679985c8c4';
        $this->displayName = $this->l('Conekta Prestashop');
        $this->description = $this->l('Accept payments by Credit and Debit Card with Conekta (Visa, Mastercard, Amex)');
        $this->controllers = array( 'validation' );
        $this->is_eu_compatible = 1;
        $this->currencies = true;
        $this->currencies_mode = 'checkbox';
        $this->cash = true;
        $this->amount_min = 2000;

        $settings = array(
            'PAYEE_NAME',
            'PAYEE_ADDRESS',
            'MODE',
            'WEB_HOOK',
            'PAYMENT_METHS_CARD',
            'PAYMENT_METHS_INSTALLMET',
            'PAYMENT_METHS_CASH',
            'PAYMENT_METHS_SPEI',
            'EXPIRATION_DATE_TYPE',
            'EXPIRATION_DATE_LIMIT',
            'TEST_PRIVATE_KEY',
            'TEST_PUBLIC_KEY',
            'LIVE_PRIVATE_KEY',
            'LIVE_PUBLIC_KEY',
            'PRE_AUTHORIZE_CONEKTA',
            'CHARGE_ON_DEMAND_ENABLE',
            '3DS_FORCE'
        );
        $order_elements = array_keys(get_class_vars('Cart'));
        foreach ($order_elements as $element) {
            $settings[] = 'ORDER_'.Tools::strtoupper($element);
        }
        $product_elements = self::CART_PRODUCT_ATTR;
        foreach ($product_elements as $element) {
            $settings[] = 'PRODUCT_'.Tools::strtoupper($element);
        }

        $config = Configuration::getMultiple($settings);

        if (isset($config['PAYEE_NAME'])) {
            $this->checkName = $config['PAYEE_NAME'];
        }
        if (isset($config['PAYEE_ADDRESS'])) {
            $this->address = $config['PAYEE_ADDRESS'];
        }

        if (isset($config['MODE'])) {
            $this->mode = $config['MODE'];
            $this->conekta_mode = ($this->mode) ? 'live' : 'test';
        }
        if (isset($config['WEB_HOOK'])) {
            $this->web_hook = $config['WEB_HOOK'];
        }

        if (isset($config['PAYMENT_METHS_CARD'])) {
            $this->paymnt_method_card = $config['PAYMENT_METHS_CARD'];
        }

        if (isset($config['PAYMENT_METHS_INSTALLMET'])) {
            $this->payment_method_installment = $config['PAYMENT_METHS_INSTALLMET'];
        }

        if (isset($config['PAYMENT_METHS_CASH'])) {
            $this->payment_method_cash = $config['PAYMENT_METHS_CASH'];
        }

        if (isset($config['PAYMENT_METHS_SPEI'])) {
            $this->payment_method_spei = $config['PAYMENT_METHS_SPEI'];
        }
        if (isset($config['EXPIRATION_DATE_TYPE'])) {
            $this->expiration_date_type = $config['EXPIRATION_DATE_TYPE'];
        }
        if (isset($config['EXPIRATION_DATE_LIMIT'])) {
            $this->expiration_date_limit = $config['EXPIRATION_DATE_LIMIT'];
        }
        if (isset($config['TEST_PRIVATE_KEY'])) {
            $this->test_private_key = $config['TEST_PRIVATE_KEY'];
        }

        if (isset($config['TEST_PUBLIC_KEY'])) {
            $this->test_public_key = $config['TEST_PUBLIC_KEY'];
        }

        if (isset($config['LIVE_PRIVATE_KEY'])) {
            $this->live_private_key = $config['LIVE_PRIVATE_KEY'];
        }

        if (isset($config['LIVE_PUBLIC_KEY'])) {
            $this->live_public_key = $config['LIVE_PUBLIC_KEY'];
        }

        if (isset($config['PRE_AUTHORIZE_CONEKTA'])) {
            $this->pre_authorize = $config['PRE_AUTHORIZE_CONEKTA'];
        }

        if (isset($config['CHARGE_ON_DEMAND_ENABLE'])) {
            $this->charge_on_demand = $config['CHARGE_ON_DEMAND_ENABLE'];
        }

        if (isset($config['3DS_FORCE'])) {
            $this->charge_on_demand = $config['3DS_FORCE'];
        }

        $this->bootstrap = true;
        parent::__construct();

        if (!count(Currency::checkPaymentCurrencies($this->id))) {
            $this->warning = $this->l('No currency has been set for this module.');
        }
    }

    /**
     * Install configuration, create table in database and register hooks
     *
     * @return boolean
     */
    public function install()
    {

        $updateConfig = array(
            'PS_OS_CHEQUE' => 1,
            'PS_OS_PAYMENT' => 2,
            'PS_OS_PREPARATION' => 3,
            'PS_OS_SHIPPING' => 4,
            'PS_OS_DELIVERED' => 5,
            'PS_OS_CANCELED' => 6,
            'PS_OS_REFUND' => 7,
            'PS_OS_ERROR' => 8,
            'PS_OS_OUTOFSTOCK' => 9,
            'PS_OS_BANKWIRE' => 10,
            'PS_OS_PAYPAL' => 11,
            'PS_OS_WS_PAYMENT' => 12
        );

        foreach ($updateConfig as $u => $v) {
            if (!Configuration::get($u) || (int) Configuration::get($u) < 1) {
                if (defined('_' . $u . '_') && (int) constant('_' . $u . '_') > 0) {
                    Configuration::updateValue($u, constant('_' . $u . '_'));
                } else {
                    Configuration::updateValue($u, $v);
                }
            }
        }
        if (!parent::install() || !$this->createPendingCashState()
            || !$this->createPendingSpeiState() || !$this->registerHook('header')
            || !$this->registerHook('paymentOptions')
            || !$this->registerHook('paymentReturn')
            || !$this->registerHook('adminOrder')
            || !$this->registerHook('updateOrderStatus')
            || !$this->registerHook('actionProductSave')
            || !$this->registerHook('displayAdminProductsMainStepLeftColumnMiddle')
            || !$this->registerHook('actionValidateOrder')
            && Configuration::updateValue('PAYMENT_METHS_CARD', 1)
            && Configuration::updateValue('PAYMENT_METHS_INSTALLMET', 1)
            && Configuration::updateValue('PAYMENT_METHS_CASH', 1)
            && Configuration::updateValue('PAYMENT_METHS_SPEI', 1)
            && Configuration::updateValue('MODE', 0) || !Database::installDb()
            || !Database::createTableConektaOrder()
            || !Database::createTableMetaData()
            || !Database::createTableProductData()
        ) {
            return false;
        }

        Configuration::updateValue('CONEKTA_PRESTASHOP_VERSION', $this->version);
        return true;
    }

    /**
     * Adding the reference code of the Conekta order to the order generated by Prestashop.
     *
     * @param array $params Array with order data
     *
     * @return boolean
     */
    public function hookActionValidateOrder($params)
    {

        $key = Configuration::get('CONEKTA_MODE') ? Configuration::get('CONEKTA_PRIVATE_KEY_LIVE') : Configuration::get('CONEKTA_PRIVATE_KEY_TEST');
        $iso_code = $this->context->language->iso_code;

        \Conekta\Conekta::setApiKey($key);
        \Conekta\Conekta::setPlugin("Prestashop 1.7");
        \Conekta\Conekta::setApiVersion("2.0.0");
        \Conekta\Conekta::setPluginVersion($this->version);
        \Conekta\Conekta::setLocale($iso_code);

        if (!empty(filter_input(INPUT_GET, 'conektaOrdenID'))) {
            try {
                $order = \Conekta\Order::find(filter_input(INPUT_GET, 'conektaOrdenID'));
                $params['order']->reference = $order->metadata['reference_id'];
                return true;
            } catch (\Exception $e) {
                return false;
            }
        }
    }
    /**
     * Delete configuration and drop table in database.
     *
     * @return boolean
     */
    public function uninstall()
    {
        return parent::uninstall()
        && Configuration::deleteByName('CONEKTA_PRESTASHOP_VERSION')
        && Configuration::deleteByName('CONEKTA_MSI')
        && Configuration::deleteByName('CONEKTA_CARDS')
        && Configuration::deleteByName('PAYMENT_METHS_CASH')
        && Configuration::deleteByName('PAYMENT_METHS_SPEI')
        && Configuration::deleteByName('CONEKTA_PUBLIC_KEY_TEST')
        && Configuration::deleteByName('CONEKTA_PUBLIC_KEY_LIVE')
        && Configuration::deleteByName('CONEKTA_MODE')
        && Configuration::deleteByName('CONEKTA_PRIVATE_KEY_TEST')
        && Configuration::deleteByName('CONEKTA_PRIVATE_KEY_LIVE')
        && Configuration::deleteByName('CONEKTA_SIGNATURE_KEY_LIVE')
        && Configuration::deleteByName('CONEKTA_SIGNATURE_KEY_TEST')
        && Configuration::deleteByName('CONEKTA_PAYMENT_ORDER_STATUS')
        && Configuration::deleteByName('CONEKTA_WEBHOOK')
        && Configuration::deleteByName('CONEKTA_WEBHOOK_FAILED_ATTEMPTS')
        && Configuration::deleteByName('CONEKTA_WEBHOOK_ERROR_MESSAGE')
        && Configuration::deleteByName('CONEKTA_WEBHOOK_FAILED_URL')
        && Db::getInstance()->Execute(
            'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'conekta_transaction`'
        )
        && Db::getInstance()->Execute(
            'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'conekta_metadata`'
        )
        && Db::getInstance()->Execute(
            'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'conekta_order_checkout`'
        )
        && Db::getInstance()->Execute(
            'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'conekta_product_data`'
        );
    }

    public function hookActionProductSave($params)
    {
        $product_id = $params['id_product'];
        if (empty(filter_input(INPUT_POST, 'is_subscription'))) {
            Database::updateConektaProductData($product_id, 'is_subscription', 'false');
            Database::updateConektaProductData($product_id, 'subscription_plan', '');
        } else {
            Database::updateConektaProductData($product_id, 'is_subscription', 'true');
            Database::updateConektaProductData($product_id, 'subscription_plan', filter_input(INPUT_POST, 'subscription_plan'));
        }
    }

    public function hookDisplayAdminProductsMainStepLeftColumnMiddle($params)
    {
        $id_product = $params['id_product'];
        $key = Configuration::get('CONEKTA_MODE') ? Configuration::get('CONEKTA_PRIVATE_KEY_LIVE') : Configuration::get('CONEKTA_PRIVATE_KEY_TEST');
        $iso_code = $this->context->language->iso_code;
        \Conekta\Conekta::setApiKey($key);
        \Conekta\Conekta::setPlugin("Prestashop1.7");
        \Conekta\Conekta::setApiVersion("2.0.0");
        \Conekta\Conekta::setLocale($iso_code);
        $result  = Database::getConektaProductData($id_product, 'is_subscription');
        $is_subscription = empty($result) ? 'false' : $result['product_value'];
        $result = Database::getConektaProductData($id_product, 'subscription_plan');
        $subscription_plan = empty($result) ? '' : $result['product_value'];
        $this->smarty->assign(
            array(
                'plans'                => \Conekta\Plan::all(),
                'is_subscription_text' => $this->trans('Enable Subscriptions', array(), 'Modules.ConektaPaymentsPrestashop.Admin'),
                'is_subscription'      => ($is_subscription == 'true') ? 'checked' : '',
                'subscription_plan'    => $subscription_plan,
            )
        );
        return $this->fetchTemplate('product-subscription.tpl');
    }

    /**
     * Returns the order confirmation checkout
     *
     * @param array $params payment information parameter
     *
     * @return template
     */
    public function hookPaymentReturn($params)
    {
        $key = Configuration::get('CONEKTA_MODE') ? Configuration::get('CONEKTA_PRIVATE_KEY_LIVE') : Configuration::get('CONEKTA_PRIVATE_KEY_TEST');
        $iso_code = $this->context->language->iso_code;
        \Conekta\Conekta::setApiKey($key);
        \Conekta\Conekta::setPlugin("Prestashop1.7");
        \Conekta\Conekta::setApiVersion("2.0.0");
        \Conekta\Conekta::setLocale($iso_code);

        if ($params['order'] && Validate::isLoadedObject($params['order'])) {
            $id_order = (int) $params['order']->id;
            $conekta_tran_details = Database::getOrderById($id_order);
            if ($conekta_tran_details['barcode']) {
                $this->smarty->assign('cash', true);
                $this->smarty->assign(
                    'conekta_order',
                    array(
                        'barcode' => $conekta_tran_details['reference'],
                        'type' => 'cash',
                        'barcode_url' => $conekta_tran_details['barcode'],
                        'amount' => $conekta_tran_details['amount'],
                        'currency' => $conekta_tran_details['currency']
                    )
                );
            } elseif (isset($conekta_tran_details['reference']) && !empty($conekta_tran_details['reference'])) {
                if (strpos($conekta_tran_details['reference'], '6461801118') !== false) {
                    $this->smarty->assign('spei', true);
                    $this->smarty->assign(
                        'conekta_order',
                        array(
                            'receiving_account_number' => $conekta_tran_details['reference'],
                            'amount' => $conekta_tran_details['amount'],
                            'currency' => $conekta_tran_details['currency']
                        )
                    );
                }
            } else {
                $this->smarty->assign('card', true);
                $this->smarty->assign(
                    'conekta_order',
                    array(
                        'type' => 'card',
                        'reference' => isset($params['order']->reference) ?
                                                $params['order']->reference :
                                                '#' . sprintf('%06d', $params['order']->id),
                        'valid' => $params['order']->valid
                    )
                );

                if (isset($conekta_tran_details['id_conekta_order'])) {
                    $orderConekta = \Conekta\Order::find($conekta_tran_details['id_conekta_order']);
                    
                    if (isset($orderConekta->checkout['plan_id']) && !empty($orderConekta->checkout['plan_id'])) {
                        
                        $planConekta = \Conekta\Plan::find($orderConekta->checkout['plan_id']);
                        
                        $this->smarty->assign('subscription', true);
                        $this->smarty->assign(
                            'conekta_subscription',
                            array(
                                'name' => $planConekta->name,
                                'amount' => $planConekta->amount * 0.01,
                                'currency' => $planConekta->currency,
                                'interval' => HelperGateway::getInterval($planConekta->interval, $planConekta->frequency),
                                'frequency' => $planConekta->frequency,
                                'trial_period_days' => isset($planConekta->trial_period_days) ?
                                                                $planConekta->trial_period_days:
                                                                0,
                                'expiry_count' => $planConekta->expiry_count
                            )
                        );
                    }
                }
            }
        }
        return $this->fetchTemplate('checkout-confirmation-all.tpl');
    }

    /**
     * The order is refunded
     *
     * @param array $params Information of order to update it.
     *
     * @return void
     */
    public function hookUpdateOrderStatus($params)
    {
        if ($params['newOrderStatus']->id == CANCELLED_ID || $params['newOrderStatus']->id == REFUNDED_ID) {
            $key = Configuration::get('CONEKTA_MODE') ?
                Configuration::get('CONEKTA_PRIVATE_KEY_LIVE') :
                Configuration::get('CONEKTA_PRIVATE_KEY_TEST');

            $iso_code = $this->context->language->iso_code;

            \Conekta\Conekta::setApiKey($key);
            \Conekta\Conekta::setPlugin("Prestashop1.7");
            \Conekta\Conekta::setApiVersion("2.0.0");
            \Conekta\Conekta::setPluginVersion($this->version);
            \Conekta\Conekta::setLocale($iso_code);

            $id_order = (int) $params['id_order'];
            $conekta_tran_details = Database::getOrderById($id_order);

            //only credit card refund
            if (!empty($conekta_tran_details)
                && !$conekta_tran_details['barcode']
                && !(isset($conekta_tran_details['reference'])
                && !empty($conekta_tran_details['reference']))
            ) {
                $order = \Conekta\Order::find($conekta_tran_details['id_conekta_order']);
                if (!empty($order) && $order->charges[0]->payment_method->object == "card_payment") {
                    if ($order->payment_status == 'pre_authorized') {
                        $order->void();
                    } else {
                        $order->refund(['reason' => 'requested_by_client']);
                    }
                }
            }
        }
    }

    /**
     * Create pending chash state
     *
     * @return boolean
     */
    private function createPendingCashState()
    {
        $state     = new OrderState();
        $languages = Language::getLanguages();
        $names     = array();

        foreach ($languages as $lang) {
            $names[$lang['id_lang']] = 'En espera de pago';
        }

        $state->name        = $names;
        $state->color       = '#4169E1';
        $state->send_email  = true;
        $state->module_name = 'conektapaymentsprestashop';
        $templ              = array();

        foreach ($languages as $lang) {
            $templ[$lang['id_lang']] = 'conektaefectivo';
        }

        $state->template = $templ;

        if ($state->save()) {
            Configuration::updateValue('waiting_cash_payment', $state->id);
            $directory = _PS_MAIL_DIR_;
            if ($dhvalue = opendir($directory)) {
                while (($file = readdir($dhvalue)) !== false) {
                    if (is_dir($directory.$file) && $file[0] != '.') {
                        $new_html_file = _PS_MODULE_DIR_ . $this->name . '/mails/' . $file . '/conektaefectivo.html';
                        $new_txt_file  = _PS_MODULE_DIR_ . $this->name . '/mails/' . $file . '/conektaefectivo.txt';

                        $html_folder = $directory . $file . '/conektaefectivo.html';
                        $txt_folder  = $directory . $file . '/conektaefectivo.txt';

                        try {
                            Tools::copy($new_html_file, $html_folder);
                            Tools::copy($new_txt_file, $txt_folder);
                        } catch (\Exception $e) {
                            $error_copy = $e->getMessage() . ' ';
                            if (class_exists('Logger')) {
                                Logger::addLog(json_encode($error_copy), 1, null, null, null, true);
                            }
                        }
                    }
                }
                closedir($dhvalue);
            }
        } else {
            return false;
        }
        return true;
    }

    /**
     * Create pending spei state
     *
     * @return boolean
     */
    private function createPendingSpeiState()
    {
        $state     = new OrderState();
        $languages = Language::getLanguages();
        $names     = array();

        foreach ($languages as $lang) {
            $names[$lang['id_lang']] = 'En espera de pago';
        }

        $state->name        = $names;
        $state->color       = '#4169E1';
        $state->send_email  = true;
        $state->module_name = 'conektapaymentsprestashop';
        $templ              = array();

        foreach ($languages as $lang) {
            $templ[$lang['id_lang']] = 'conektaspei';
        }

        $state->template = $templ;
        if ($state->save()) {
            Configuration::updateValue('waiting_spei_payment', $state->id);
            $directory = _PS_MAIL_DIR_;
            if ($dhvalue = opendir($directory)) {
                while (($file = readdir($dhvalue)) !== false) {
                    if (is_dir($directory.$file) && $file[0] != '.') {
                        $new_html_file = _PS_MODULE_DIR_ . $this->name . '/mails/' . $file . '/conektaspei.html';
                        $new_txt_file  = _PS_MODULE_DIR_ . $this->name . '/mails/' . $file . '/conektaspei.txt';

                        $html_folder = $directory . $file . '/conektaspei.html';
                        $txt_folder  = $directory . $file . '/conektaspei.txt';

                        try {
                            Tools::copy($new_html_file, $html_folder);
                            Tools::copy($new_txt_file, $txt_folder);
                        } catch (\Exception $e) {
                            $error_copy = $e->getMessage() . ' ';
                            if (class_exists('Logger')) {
                                Logger::addLog(json_encode($error_copy), 1, null, null, null, true);
                            }
                        }
                    }
                }
                closedir($dhvalue);
            }
        } else {
            return false;
        }
        return true;
    }

    /**
     * Generate method payment and checkout conekta
     *
     * @return template
     */
    public function hookHeader()
    {
        $key = Configuration::get('CONEKTA_MODE') ? Configuration::get('CONEKTA_PRIVATE_KEY_LIVE') : Configuration::get('CONEKTA_PRIVATE_KEY_TEST');
        $iso_code = $this->context->language->iso_code;
        \Conekta\Conekta::setApiKey($key);
        \Conekta\Conekta::setPlugin("Prestashop1.7");
        \Conekta\Conekta::setApiVersion("2.0.0");
        \Conekta\Conekta::setLocale($iso_code);

        if (Tools::getValue('controller') != 'order-opc' && (!($_SERVER['PHP_SELF'] == __PS_BASE_URI__ . 'order.php' || $_SERVER['PHP_SELF'] == __PS_BASE_URI__ . 'order-opc.php' || Tools::getValue('controller') == 'order' || Tools::getValue('controller') == 'orderopc' || Tools::getValue('step') == 3))) {
            return;
        }
        Media::addJsDef(
            array(
                "ajax_link" => $this->_path .'ajax.php'
            )
        );
        $this->context->controller->addCSS($this->_path . 'views/css/conekta-prestashop.css');

        if (Configuration::get('MODE')) {
            $this->smarty->assign("api_key", addslashes(Configuration::get('LIVE_PUBLIC_KEY')));
        } else {
            $this->smarty->assign("api_key", addslashes(Configuration::get('TEST_PUBLIC_KEY')));
        }

        $this->smarty->assign("path", $this->_path);

        $cart = $this->context->cart;
        $customerPrestashop = $this->context->customer;
        $address_delivery = new Address((int) $cart->id_address_delivery);
        $payment_options = array();

        if (Configuration::get('PAYMENT_METHS_SPEI')) {
            array_push($payment_options, 'bank_transfer');
        }

        if (Configuration::get('PAYMENT_METHS_CASH')) {
            array_push($payment_options, 'cash');
        }

        if (Configuration::get('PAYMENT_METHS_CARD')) {
            array_push($payment_options, 'card');
        }

        $pre_authorize = false;
        $force_3ds = false;
        $on_demand_enabled = false;
        $state            = State::getNameById($address_delivery->id_state);
        $country          = Country::getIsoById($address_delivery->id_country);
        $carrier          = new Carrier((int) $cart->id_carrier);
        $shp_price        = $cart->getTotalShippingCost();
        $shp_carrier      = "other";
        $shp_service      = "other";
        $discounts        = $cart->getCartRules();
        $items            = $cart->getProducts();
        $shippingLines = null;
        $shippingContact = null;

        if (isset($carrier)) {
            if ($carrier->name != null) {
                $shp_carrier = $carrier->name;
                $shp_service = implode(",", $carrier->delay);
                $shippingLines =  Config::getShippingLines($shp_service, $shp_carrier, $shp_price);
            } elseif (HelperGateway::isDigital($items)) {
                $shp_carrier = "Producto digital";
                $shp_service = "Digital";
                $shippingLines =  Config::getShippingLines($shp_service, $shp_carrier, $shp_price);
            }
        }

        $shippingContact = Config::getShippingContact($customerPrestashop, $address_delivery, $state, $country);
        $customerInfo = Config::getCustomerInfo($customerPrestashop, $address_delivery);

        if (count($payment_options) > 0 && !empty($shippingContact['address']['postal_code']) && !empty($shippingLines)) {
            $order_details = array();
            $taxlines = array();
    
            if ((Configuration::get('PAYMENT_METHS_INSTALLMET'))) {
                $msi = true;
            }

            if (Configuration::get('PRE_AUTHORIZE_CONEKTA')) {
                $pre_authorize = true;
            }

            if (Configuration::get('CHARGE_ON_DEMAND_ENABLE')) {
                $on_demand_enabled = true;
            }

            if (Configuration::get('3DS_FORCE')) {
                $force_3ds = true;
            }

            $order_details = [
                'currency' => $this->context->currency->iso_code,
                'line_items' => Config::getLineItems($items),
                'customer_info' => array(),
                'discount_lines' => Config::getDiscountLines($discounts),
                'shipping_lines' => HelperGateway::addShippingLines($shippingLines),
                'shipping_contact' => $shippingContact,
                'pre_authorize' => $pre_authorize,
                'tax_lines' => HelperGateway::addTaxLines(Config::getTaxLines($items)),
                'metadata' => [
                    "plugin" => "Prestashop",
                    "plugin_version" => _PS_VERSION_,
                    "reference_id" => Order::generateReference()
                ],
                'checkout' => [
                    "type" => 'Integration',
                    "on_demand_enabled" => $on_demand_enabled,
                    "force_3ds_flow" => Configuration::get('CONEKTA_MODE') ? $force_3ds : false,
                ]
            ];

            $order_elements = array_keys(get_class_vars('Cart'));
            foreach ($order_elements as $element) {
                if (!empty(Configuration::get('ORDER_'.Tools::strtoupper($element))) && property_exists($this->context->cart, $element)) {
                    $order_details['metadata'][$element] = $this->context->cart->$element;
                }
            }

            $product_elements = self::CART_PRODUCT_ATTR;
            foreach ($items as $item) {
                $index ='product-'.$item['id_product'];
                $order_details['metadata'][$index] = '';
                foreach ($product_elements as $element) {
                    if (!empty(Configuration::get('PRODUCT_'.Tools::strtoupper($element)))
                        && array_key_exists($element, $item)
                    ) {
                        $order_details['metadata'][$index] .= $this->buildRecursiveMetadata($item[$element], $element);
                    }
                }
                $order_details['metadata'][$index] = Tools::substr($order_details['metadata'][$index], 0, -2);
            }

            $amount = HelperGateway::calculateAmountTotal($order_details);

            try {
                // Validate, create and update the customer in conekta

                if (!HelperGateway::validateItems($items)) {
                    $this->context->smarty->assign(
                        array(
                            'message' =>  'El carrito posee productos del tipo "suscripción" y'
                            . ' "no suscripción", estos no pueden comprarse juntos, o posee distintas'
                            . ' suscripciones en el carrito, solo puede comprar una suscripción por compra.'
                            . ' Por favor, revise los productos en el carrito.',
                        )
                    );
                    return false;
                }

                $cust_db = Database::getConektaMetadata($customerPrestashop->id, $this->conekta_mode, "conekta_customer_id");

                $message = $this->checkedFields($customerInfo['phone'], $order_details, $amount);
                if ($message !== true) {
                    $this->context->smarty->assign(
                        array(
                            'message' =>  $message,
                        )
                    );
                    return false;
                }

                if (empty($cust_db['meta_value'])) {
                    $customerConekta = \Conekta\Customer::create($customerInfo);
                    $customerConekta_id = $customerConekta->id;
                    Database::updateConektaMetadata($customerPrestashop->id, $this->conekta_mode, "conekta_customer_id", $customerConekta_id);
                } else {
                    $customerConekta_id = $cust_db['meta_value'];
                    $customerConekta = \Conekta\Customer::find($customerConekta_id);
                    $customerConekta->update($customerInfo);
                }

                $order_details['customer_info'] = array("customer_id" => $customerConekta_id);

                $order_details['checkout'] = array_merge(
                    $order_details['checkout'],
                    HelperGateway::generateCheckout($items, $payment_options)
                );

                if (in_array('cash', $payment_options)) {
                    $order_details['checkout']["expires_at"] = time() + (Configuration::get('EXPIRATION_DATE_LIMIT') * (Configuration::get('EXPIRATION_DATE_TYPE') == 0 ? 86400 : 3600));
                }

                // Validate, create and update the order in Conekta

                $ord_db = Database::getConektaOrder($customerPrestashop->id, $this->conekta_mode, $this->context->cart->id);

                if (isset($ord_db) && $ord_db['status'] == 'unpaid') {
                    $order = \Conekta\Order::find($ord_db['id_conekta_order']);

                    if (isset($order->charges[0]->status) && $order->charges[0]->status != 'unpaid') {
                        Database::updateConektaOrder($customerPrestashop->id, $this->context->cart->id, $this->conekta_mode, $order->id, $order->charges[0]->status);
                    }
                }

                if (empty($order)) {
                    $order = \Conekta\Order::create($order_details);
                    Database::updateConektaOrder($customerPrestashop->id, $this->context->cart->id, $this->conekta_mode, $order->id, 'unpaid');
                } elseif (empty($order->charges[0]->status) || $order->charges[0]->status == 'unpaid') {
                    $order->update([
                        'customer_info' => $customerInfo
                    ]);
                    unset($order_details['customer_info']);
                    $order->update($order_details);
                } else {
                    $order = \Conekta\Order::create($order_details);
                    Database::updateConektaOrder($customerPrestashop->id, $this->context->cart->id, $this->conekta_mode, $order->id, 'unpaid');
                }
            } catch (\Exception $e) {
                $log_message = $e->getMessage() . ' ';
    
                if (class_exists('Logger')) {
                    Logger::addLog($this->l('Payment transaction failed') . ' ' . $log_message, 2, null, 'Cart', (int) $this->context->cart->id, true);
                }

                $message = $e->getMessage() . ' ';

                $this->context->smarty->assign("message", $message);
            }
        }
        if (isset($order)) {
            $this->smarty->assign("orderID", $order->id);
            $this->smarty->assign("checkoutRequestId", $order->checkout['id']);
        } else {
            $this->smarty->assign("checkoutRequestId", "");
            $this->smarty->assign("orderID", "");
        }
        return $this->fetchTemplate("hook-header.tpl");
    }

    /**
     * Generates the metadata of the order attributes.
     *
     * @param array  $data_object Object to generate metadata
     * @param string $key         Key the data_object
     *
     * @return string
     */
    public function buildRecursiveMetadata($data_object, $key)
    {
        $string = '';
        if (gettype($data_object) == 'array') {
            foreach (array_keys($data_object) as $data_key) {
                $key_concat = (string)($key).'-'.(string)($data_key);
                if (empty($data_object[$data_key])) {
                    $string .= (string)($key_concat) . ': NULL | ';
                } else {
                    $string .= $this->buildRecursiveMetadata($data_object[$data_key], $key_concat);
                }
            }
        } else {
            if (empty($data_object)) {
                $string .= (string)($key) . ': NULL | ';
            } else {
                $string .= (string)($key) . ': ' . (string)($data_object) . ' | ';
            }
        }
        return $string;
    }

    /**
     * Returns the order information.
     *
     * @param array $params The order info
     *
     * @return template
     */
    public function hookAdminOrder($params)
    {
        $id_order = (int) $params['id_order'];
        $status   = $this->getTransactionStatus($id_order);

        return $status;
    }

    /**
     * The different payment methods are added.
     *
     * @param array $params Payment options
     *
     * @return array
     */
    public function hookPaymentOptions($params)
    {
        if (!$this->active) {
            return;
        }

        if (!$this->checkCurrency($params['cart'])) {
            return;
        }
        $this->smarty->assign(
            array(
                'test_private_key' => Configuration::get('TEST_PRIVATE_KEY')
            )
        );
        $payment_options = array();

        if (Configuration::get('PAYMENT_METHS_CARD')
            || Configuration::get('PAYMENT_METHS_CASH')
            || Configuration::get('PAYMENT_METHS_SPEI')
        ) {
            array_push($payment_options, $this->getConektaPaymentOption());
        }
        return $payment_options;
    }

    /**
     * Check if the currency is correct
     *
     * @param array $cart payment cart
     *
     * @return boolean
     */
    public function checkCurrency($cart)
    {
        $currency_order    = new Currency($cart->id_currency);
        $currencies_module = $this->getCurrency($cart->id_currency);

        if (is_array($currencies_module)) {
            foreach ($currencies_module as $currency_module) {
                if ($currency_order->id == $currency_module['id_currency']) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Add conekta payment method
     *
     * @return PaymentOption
     */
    public function getConektaPaymentOption()
    {
        $embeddedOption = new PaymentOption();
        $embeddedOption->setModuleName($this->name)->setCallToActionText($this->l('Pago por medio de Conekta '))->setAction($this->context->link->getModuleLink($this->name, 'validation', array(), true))->setForm($this->generateCardPaymentForm())->setLogo(Media::getMediaPath(_PS_MODULE_DIR_ . $this->name . '/views/img/cards2.png'));

        return $embeddedOption;
    }

    /**
     * Validate the fields saved in the conekta module
     *
     * @return void
     */
    private function postValidation()
    {
        if (Tools::isSubmit('btnSubmit')) {
            if (!Tools::getValue('PAYEE_NAME')) {
                $this->postErrors[] = $this->trans('The "Payee" field is required.', array(), 'Modules.ConektaPaymentsPrestashop.Admin');
            } elseif (!Tools::getValue('PAYEE_ADDRESS')) {
                $this->postErrors[] = $this->trans('The "Address" field is required.', array(), 'Modules.ConektaPaymentsPrestashop.Admin');
            }

            if (!Tools::getValue('WEB_HOOK')) {
                $this->postErrors[] = $this->trans('The "Web Hook" field is required.', array(), 'Modules.ConektaPaymentsPrestashop.Admin');
            }
            if (Tools::getValue('PAYMENT_METHS_CASH') && !Tools::getValue('EXPIRATION_DATE_LIMIT')) {
                $this->postErrors[] = $this->trans('The "Expiration date limit" field is required.', array(), 'Modules.ConektaPaymentsPrestashop.Admin');
            }

            if (Tools::getValue('PAYMENT_METHS_CASH') && ( (Tools::getValue('EXPIRATION_DATE_TYPE')==0 && (Tools::getValue('EXPIRATION_DATE_LIMIT')<0 || Tools::getValue('EXPIRATION_DATE_LIMIT')>31)) || (Tools::getValue('EXPIRATION_DATE_TYPE')==1 && (Tools::getValue('EXPIRATION_DATE_LIMIT')<0 || Tools::getValue('EXPIRATION_DATE_LIMIT')>24)) )) {
                $this->postErrors[] = $this->trans('The "Expiration date limit" is out of range.', array(), 'Modules.ConektaPaymentsPrestashop.Admin');
            }

            if (Tools::getValue('PAYMENT_METHS_CASH') && !is_numeric(Tools::getValue('EXPIRATION_DATE_LIMIT'))) {
                $this->postErrors[] = $this->trans('The "Expiration date limit" must be a number.', array(), 'Modules.ConektaPaymentsPrestashop.Admin');
            }

            $order_elements = array_keys(get_class_vars('Cart'));
            $i = 0;
            $attributes_count = 0;
            while ($i < count($order_elements) && $attributes_count <= METADATA_LIMIT) {
                if (!empty(Tools::getValue('ORDER_'.Tools::strtoupper($order_elements[$i])))) {
                    $attributes_count++;
                }
                $i++;
            }
            $i = 0;
            $product_elements = self::CART_PRODUCT_ATTR;
            while ($i < count($product_elements) && $attributes_count <= METADATA_LIMIT) {
                if (!empty(Tools::getValue('PRODUCT_'.Tools::strtoupper($product_elements[$i])))) {
                    $attributes_count++;
                }
                $i++;
            }

            if ($attributes_count > METADATA_LIMIT) {
                $this->postErrors[] = $this->trans('No more than '. METADATA_LIMIT .' attributes can be sent as metadata', array(), 'Modules.ConektaPaymentsPrestashop.Admin');
            }

            if (!Tools::getValue('TEST_PRIVATE_KEY')) {
                $this->postErrors[] = $this->trans('The "Test Private Key" field is required.', array(), 'Modules.ConektaPaymentsPrestashop.Admin');
            }

            if (!Tools::getValue('TEST_PUBLIC_KEY')) {
                $this->postErrors[] = $this->trans('The "Test Public Key" field is required.', array(), 'Modules.ConektaPaymentsPrestashop.Admin');
            }

            if (Tools::getValue('LIVE_PRIVATE_KEY') && !Tools::getValue('LIVE_PUBLIC_KEY')) {
                $this->postErrors[] = $this->trans('The "Live Public Key" field is required.', array(), 'Modules.ConektaPaymentsPrestashop.Admin');
            }

            if (!Tools::getValue('LIVE_PRIVATE_KEY') && Tools::getValue('LIVE_PUBLIC_KEY')) {
                $this->postErrors[] = $this->trans('The "Live Private Key" field is required.', array(), 'Modules.ConektaPaymentsPrestashop.Admin');
            }
        }
    }

    /**
     * Update value and notify
     *
     * @return void
     */
    private function postProcess()
    {
        if (Tools::isSubmit('btnSubmit') && Tools::getValue('TEST_PUBLIC_KEY') && Tools::getValue('TEST_PRIVATE_KEY')) {
            Configuration::updateValue('PAYEE_NAME', Tools::getValue('PAYEE_NAME'));
            Configuration::updateValue('PAYEE_ADDRESS', Tools::getValue('PAYEE_ADDRESS'));
            Configuration::updateValue('MODE', Tools::getValue('MODE'));
            Configuration::updateValue('WEB_HOOK', Tools::getValue('WEB_HOOK'));
            Configuration::updateValue('PAYMENT_METHS_CARD', Tools::getValue('PAYMENT_METHS_CARD'));
            Configuration::updateValue('PAYMENT_METHS_INSTALLMET', Tools::getValue('PAYMENT_METHS_INSTALLMET'));
            Configuration::updateValue('PAYMENT_METHS_CASH', Tools::getValue('PAYMENT_METHS_CASH'));
            Configuration::updateValue('PAYMENT_METHS_BANORTE', Tools::getValue('PAYMENT_METHS_BANORTE'));
            Configuration::updateValue('PAYMENT_METHS_SPEI', Tools::getValue('PAYMENT_METHS_SPEI'));
            Configuration::updateValue('EXPIRATION_DATE_TYPE', Tools::getValue('EXPIRATION_DATE_TYPE'));
            Configuration::updateValue('EXPIRATION_DATE_LIMIT', Tools::getValue('EXPIRATION_DATE_LIMIT'));
            Configuration::updateValue('PRE_AUTHORIZE_CONEKTA', Tools::getValue('PRE_AUTHORIZE_CONEKTA'));
            Configuration::updateValue('CHARGE_ON_DEMAND_ENABLE', Tools::getValue('CHARGE_ON_DEMAND_ENABLE'));
            Configuration::updateValue('3DS_FORCE', Tools::getValue('3DS_FORCE'));
            
            if (Tools::getValue('TEST_PUBLIC_KEY') && Tools::getValue('TEST_PRIVATE_KEY')) {
                Configuration::updateValue('TEST_PRIVATE_KEY', Tools::getValue('TEST_PRIVATE_KEY'));
                Configuration::updateValue('TEST_PUBLIC_KEY', Tools::getValue('TEST_PUBLIC_KEY'));
            }

            if (Tools::getValue('LIVE_PUBLIC_KEY') && Tools::getValue('LIVE_PUBLIC_KEY')) {
                Configuration::updateValue('LIVE_PRIVATE_KEY', Tools::getValue('LIVE_PRIVATE_KEY'));
                Configuration::updateValue('LIVE_PUBLIC_KEY', Tools::getValue('LIVE_PUBLIC_KEY'));
            }

            $order_elements = array_keys(get_class_vars('Cart'));
            foreach ($order_elements as $element) {
                Configuration::updateValue('ORDER_'.Tools::strtoupper($element), Tools::getValue('ORDER_'.Tools::strtoupper($element)));
            }
            $product_elements = self::CART_PRODUCT_ATTR;
            foreach ($product_elements as $element) {
                Configuration::updateValue('PRODUCT_'.Tools::strtoupper($element), Tools::getValue('PRODUCT_'.Tools::strtoupper($element)));
            }
        }

        $this->html .= $this->displayConfirmation($this->trans('Settings updated', array(), 'Admin.Notifications.Success'));
    }

    /**
     * Display check
     *
     * @return template
     */
    private function displayCheck()
    {
        return $this->display(__FILE__, './views/templates/hook/infos.tpl');
    }

    /**
     * Returns the values of the fields in the configuration
     *
     * @return array
     */
    public function getConfigFieldsValues()
    {
        $ret = array(
            'PAYEE_NAME' => Tools::getValue('PAYEE_NAME', Configuration::get('PAYEE_NAME')),
            'PAYEE_ADDRESS' => Tools::getValue('PAYEE_ADDRESS', Configuration::get('PAYEE_ADDRESS')),
            'MODE' => Tools::getValue('MODE', Configuration::get('MODE')),
            'WEB_HOOK' => Tools::getValue('WEB_HOOK', Configuration::get('WEB_HOOK')),
            'PAYMENT_METHS_CARD' => Tools::getValue('PAYMENT_METHS_CARD', Configuration::get('PAYMENT_METHS_CARD')),
            'PAYMENT_METHS_INSTALLMET' => Tools::getValue('PAYMENT_METHS_INSTALLMET', Configuration::get('PAYMENT_METHS_INSTALLMET')),
            'PAYMENT_METHS_CASH' => Tools::getValue('PAYMENT_METHS_CASH', Configuration::get('PAYMENT_METHS_CASH')),
            'PAYMENT_METHS_BANORTE' => Tools::getValue('PAYMENT_METHS_BANORTE', Configuration::get('PAYMENT_METHS_BANORTE')),
            'PAYMENT_METHS_SPEI' => Tools::getValue('PAYMENT_METHS_SPEI', Configuration::get('PAYMENT_METHS_SPEI')),
            'EXPIRATION_DATE_TYPE' => Tools::getValue('EXPIRATION_DATE_TYPE', Configuration::get('EXPIRATION_DATE_TYPE')),
            'EXPIRATION_DATE_LIMIT' => Tools::getValue('EXPIRATION_DATE_LIMIT', Configuration::get('EXPIRATION_DATE_LIMIT')),
            'TEST_PRIVATE_KEY' => Tools::getValue('TEST_PRIVATE_KEY', Configuration::get('TEST_PRIVATE_KEY')),
            'TEST_PUBLIC_KEY' => Tools::getValue('TEST_PUBLIC_KEY', Configuration::get('TEST_PUBLIC_KEY')),
            'LIVE_PRIVATE_KEY' => Tools::getValue('LIVE_PRIVATE_KEY', Configuration::get('LIVE_PRIVATE_KEY')),
            'LIVE_PUBLIC_KEY' => Tools::getValue('LIVE_PUBLIC_KEY', Configuration::get('LIVE_PUBLIC_KEY')),
            'PRE_AUTHORIZE_CONEKTA' => Tools::getValue('PRE_AUTHORIZE_CONEKTA', Configuration::get('PRE_AUTHORIZE_CONEKTA')),
            'CHARGE_ON_DEMAND_ENABLE' => Tools::getValue('CHARGE_ON_DEMAND_ENABLE', Configuration::get('CHARGE_ON_DEMAND_ENABLE')),
            '3DS_FORCE' => Tools::getValue('3DS_FORCE', Configuration::get('3DS_FORCE'))
        );
        $order_elements = array_keys(get_class_vars('Cart'));
        foreach ($order_elements as $element) {
            $ret['ORDER_'.Tools::strtoupper($element)] = Configuration::get('ORDER_'.Tools::strtoupper($element));
        }
        $product_elements = self::CART_PRODUCT_ATTR;
        foreach ($product_elements as $element) {
            $ret['PRODUCT_'.Tools::strtoupper($element)] = Configuration::get('PRODUCT_'.Tools::strtoupper($element));
        }
        
        return $ret;
    }

    const CART_PRODUCT_ATTR = array("id_product_attribute", "id_product", "cart_quantity", "id_shop", "id_customization", "name", "is_virtual", "description_short", "available_now", "available_later", "id_category_default", "id_supplier", "id_manufacturer", "manufacturer_name", "on_sale", "ecotax", "additional_shipping_cost", "available_for_order", "show_price", "price", "active", "unity", "unit_price_ratio", "quantity_available", "width", "height", "depth", "out_of_stock", "weight", "available_date", "date_add", "date_upd", "quantity", "link_rewrite", "category", "unique_id", "id_address_delivery", "advanced_stock_management", "supplier_reference", "customization_quantity", "price_attribute", "ecotax_attr", "reference", "weight_attribute", "ean13", "isbn", "upc", "minimal_quantity", "wholesale_price", "id_image", "legend", "reduction_type", "is_gift", "reduction", "reduction_without_tax", "price_without_reduction", "attributes", "attributes_small", "rate", "tax_name", "stock_quantity", "price_without_reduction_without_tax", "price_with_reduction", "price_with_reduction_without_tax", "total", "total_wt", "price_wt", "reduction_applies", "quantity_discount_applies", "allow_oosp");

    /**
     * Build Admin Content
     *
     * @return array
     */
    public function buildAdminContent()
    {
        $this->context->controller->addJS($this->_path . 'views/js/functions.js');
        $order_elements = array_keys(array_diff_key(get_class_vars('Cart'), array('definition' => '', 'htmlFields' => '')));
        sort($order_elements);
        $order_meta =  array();
        foreach ($order_elements as $val) {
            $order_meta[] = array(
                "id" => Tools::strtoupper($val),
                "name" => $val,
                "val" => $val
            );
        }
        $product_elements = self::CART_PRODUCT_ATTR;
        sort($product_elements);
        $product_meta =  array();
        foreach ($product_elements as $val) {
            $product_meta[] = array(
                "id" => Tools::strtoupper($val),
                "name" => $val,
                "val" => $val
            );
        }
        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->trans('Contact details', array(), 'Modules.ConektaPaymentsPrestashop.Admin'),
                    'icon' => 'icon-envelope'
                ),
                'input' => array(
                    array(
                        'type' => 'text',
                        'label' => $this->trans('Payee (name)', array(), 'Modules.ConektaPaymentsPrestashop.Admin'),
                        'name' => 'PAYEE_NAME',
                        'required' => true
                    ),
                    array(
                        'type' => 'textarea',
                        'label' => $this->trans('Address', array(), 'Modules.ConektaPaymentsPrestashop.Admin'),
                        'desc' => $this->trans('Address where the check should be sent to.', array(), 'Modules.ConektaPaymentsPrestashop.Admin'),
                        'name' => 'PAYEE_ADDRESS',
                        'required' => true
                    ),
                    array(
                        'type' => 'radio',
                        'label' => $this->l('Mode'),
                        'name' => 'MODE',
                        'required' => true,
                        'class' => 't',
                        'is_bool' => true,
                        'values' => array(
                            array( 'id' => 'active_on', 'value' => 1, 'label' => $this->l('Production') ),
                            array( 'id' => 'active_off', 'value' => 0, 'label' => $this->l('Sandbox') )
                        )
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->trans('Webhook', array(), 'Modules.ConektaPaymentsPrestashop.Admin'),
                        'name' => 'WEB_HOOK',
                        'required' => true
                    ),
                    array(
                        'type' => 'checkbox',
                        'label' => $this->l('Payment Method'),
                        'desc' => $this->l('Choose options.'),
                        'name' => 'PAYMENT_METHS',
                        'values' => array(
                            'query' => array(
                                array( 'id' => 'CARD', 'name' => $this->l('Card'), 'val' => 'card_payment_method'),
                                array( 'id' => 'INSTALLMET', 'name' => $this->l('Monthly Installents'), 'val' => 'installment_payment_method' ),
                                array( 'id' => 'CASH', 'name' => $this->l('Cash'), 'val' => 'cash_payment_method' ),
                                array( 'id' => 'SPEI', 'name' => $this->l('SPEI'), 'val' => 'spei_payment_method' )
                            ),
                            'id' => 'id',
                            'name' => 'name'
                        ),
                        'expand' => array(
                            'print_total' => 4,
                            'default' => 'show',
                            'show' => array( 'text' => $this->l('show'), 'icon' => 'plus-sign-alt' ),
                            'hide' => array( 'text' => $this->l('hide'), 'icon' => 'minus-sign-alt' )
                        )
                    ),
                    array(
                        'type' => 'radio',
                        'label' => $this->l('Expiration date type'),
                        'name' => 'EXPIRATION_DATE_TYPE',
                        'class' => 't',
                        'is_bool' => true,
                        'values' => array(
                            array( 'id' => 'EXPIRATION_DATE_TYPE_DAYS', 'value' => 0, 'label' => $this->l('Days') ),
                            array( 'id' => 'EXPIRATION_DATE_TYPE_HOURS', 'value' => 1, 'label' => $this->l('Hours') )
                        )
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->trans('Expiration date limit', array(), 'Modules.ConektaPaymentsPrestashop.Admin'),
                        'name' => 'EXPIRATION_DATE_LIMIT',
                    ),
                    array(
                        'type' => 'checkbox',
                        'label' => $this->l('Additional Order Metadata'),
                        'name' => 'ORDER',
                        'values' => array(
                            'query' => $order_meta,
                            'id' => 'id',
                            'name' => 'name'
                        ),
                        'expand' => array(
                            'print_total' => count($order_meta),
                            'default' => 'show',
                            'show' => array(
                                'text' => $this->l('show'),
                                'icon' => 'plus-sign-alt'
                            ),
                            'hide' => array(
                                'text' => $this->l('hide'),
                                'icon' => 'minus-sign-alt'
                            )
                        )
                    ),
                    array(
                        'type' => 'checkbox',
                        'label' => $this->l('Additional Product Metadata'),
                        'name' => 'PRODUCT',
                        'values' => array(
                            'query' => $product_meta,
                            'id' => 'id',
                            'name' => 'name'
                        ),
                        'expand' => array(
                            'print_total' => count($product_meta),
                            'default' => 'show',
                            'show' => array(
                                'text' => $this->l('show'),
                                'icon' => 'plus-sign-alt'
                            ),
                            'hide' => array(
                                'text' => $this->l('hide'),
                                'icon' => 'minus-sign-alt'
                            )
                        )
                    ),
                    array(
                        'type' => 'checkbox',
                        'label' => $this->l('Charge on Demand'),
                        'name' => 'CHARGE_ON_DEMAND',
                        'values' => array(
                            'query' => array(
                                array(
                                    'id' => 'ENABLE',
                                    'name' => $this->l('Enable card save'),
                                    'val' => 'charge_on_demand_enabled'
                                ),
                            ),
                            'id' => 'id',
                            'name' => 'name',
                        )
                    ),
                    array(
                        'type' => 'checkbox',
                        'label' => $this->l('3DS'),
                        'name' => '3DS',
                        'values' => array(
                            'query' => array(
                                array(
                                    'id' => 'FORCE',
                                    'name' => $this->l('Activar 3DS'),
                                    'val' => 'force_3ds'
                                ),
                            ),
                            'id' => 'id',
                            'name' => 'name',
                        )
                    ),
                    array(
                        'type' => 'checkbox',
                        'label' => $this->l('Preauthorize'),
                        'name' => 'PRE_AUTHORIZE',
                        'values' => array(
                            'query' => array(
                                array(
                                    'id' => 'CONEKTA',
                                    'name' => $this->l('Enable Preauthorization'),
                                    'val' => 'pre_authorize'
                                ),
                            ),
                            'id' => 'id',
                            'name' => 'name',
                        )
                    )
                )
            )
        );
        return $fields_form;
    }
    
    /**
     * Build the content of the fields of the keys
     *
     * @return array
     */
    public function buildAdminContentKey()
    {
        $this->context->controller->addJS($this->_path . 'views/js/functions.js');
        $fields_form_keys = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->trans('KEYS', array(), 'Modules.ConektaPaymentsPrestashop.Admin'),
                    'icon' => 'icon-key'
                ),
                'input' => array(
                    array(
                        'type' => 'text',
                        'label' => $this->trans('Test Private Key', array(), 'Modules.ConektaPaymentsPrestashop.Admin'),
                        'name' => 'TEST_PRIVATE_KEY',
                        'required' => true
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->trans('Test Public Key', array(), 'Modules.ConektaPaymentsPrestashop.Admin'),
                        'name' => 'TEST_PUBLIC_KEY',
                        'required' => true,
                    ),
                    array(
                        'type' => 'password',
                        'label' => $this->trans('Live Private Key', array(), 'Modules.ConektaPaymentsPrestashop.Admin'),
                        'name' => 'LIVE_PRIVATE_KEY',
                        'required' => true
                    ),
                    array(
                        'type' => 'password',
                        'label' => $this->trans('Live Public Key', array(), 'Modules.ConektaPaymentsPrestashop.Admin'),
                        'name' => 'LIVE_PUBLIC_KEY',
                        'required' => true
                    ),
                ),
                'submit' => array(
                    'title' => $this->trans('Save All', array(), 'Admin.Actions')
                )
            )
        );
        return $fields_form_keys;
    }

    /**
     * Render form
     *
     * @return HelperForm
     */
    public function renderForm()
    {
        $fields_form           = $this->buildAdminContent();
        $fields_form_keys       = $this->buildAdminContentKey();
        $helper                = new HelperForm();
        $helper->show_toolbar  = false;
        $helper->id            = (int) Tools::getValue('id_carrier');
        $helper->identifier    = $this->identifier;
        $helper->submit_action = 'btnSubmit';
        $helper->currentIndex  = $this->context->link->getAdminLink('AdminModules', false) . '&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name;
        $helper->token         = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars      = array( 'fields_value' => $this->getConfigFieldsValues() );
        $this->fields_form = array();
        $this->fields_form_keys = array();
        return $helper->generateForm(array( $fields_form, $fields_form_keys ));
    }

    /**
     * Check settings key conekta
     *
     * @param $mode configuration type
     *
     * @return boolean
     */
    public function checkSettings($mode = 'global')
    {
        if ($mode === 'global') {
            $mode = Configuration::get('CONEKTA_MODE');
        }

        $valid = false;

        if ($mode) {
            $valid = Configuration::get('CONEKTA_PUBLIC_KEY_LIVE') != '' && Configuration::get('CONEKTA_PRIVATE_KEY_LIVE') != '';
        } else {
            $valid = Configuration::get('CONEKTA_PUBLIC_KEY_TEST') != '' && Configuration::get('CONEKTA_PRIVATE_KEY_TEST') != '';
        }

        return $valid;
    }

    /**
     * Check requirements
     *
     * @return boolean
     */
    public function checkRequirements()
    {
        $tests = array(
            'result' => true
        );

        $tests['curl'] = array(
            'name' => $this->l('PHP cURL extension must be enabled on your server'),
            'result' => (integer) function_exists('curl_init')
        );

        if (Configuration::get('CONEKTA_MODE')) {
            $tests['ssl'] = array(
                'name' => $this->l('SSL must be enabled on your store (before entering Live mode)'),
                'result' => (integer) Configuration::get('PS_SSL_ENABLED') || (!empty(filter_input(INPUT_SERVER, 'HTTPS')) && Tools::strtolower(filter_input(INPUT_SERVER, 'HTTPS')) != 'off')
            );
        }

        $tests['php52'] = array(
            'name' => $this->l('Your server must run PHP 5.2 or greater'),
            'result' => (integer) version_compare(PHP_VERSION, '5.2.0', '>=')
        );

        $tests['configuration'] = array(
            'name' => $this->l('You must sign-up for CONEKTA and configure your account settings in the module'),
            'result' => (integer) $this->checkSettings()
        );

        if (version_compare(_PS_VERSION_, '1.5', '<')) {
            $tests['backward'] = array(
                'name' => $this->l('You are using the backward compatibility module'),
                'result' => $this->backward,
                'resolution' => $this->backward_error
            );
        }

        foreach ($tests as $k => $test) {
            if ($k != 'result' && !$test['result']) {
                $tests['result'] = false;
            }
        }

        return $tests;
    }

    /**
     * Returns the template's HTML content.
     *
     * @return string HTML content
     */
    public function getContent()
    {
        //CODE FOR WEBHOOK VALIDATION UNTESTED DONT ERASE

        $this->smarty->assign("base_uri", __PS_BASE_URI__);
        $this->smarty->assign("mode", Configuration::get('MODE'));
        $url = Configuration::get('WEB_HOOK');

        if (empty($url)) {
            $url = _PS_BASE_URL_ . __PS_BASE_URI__ . "modules/conektapaymentsprestashop/notification.php";
        }

        if (Tools::isSubmit('btnSubmit') && Tools::getValue('TEST_PUBLIC_KEY') && Tools::getValue('TEST_PRIVATE_KEY')) {
            $configuration_values = array(
                'CONEKTA_MODE' => Tools::getValue('MODE'),
                'CONEKTA_PUBLIC_KEY_TEST' => rtrim(Tools::getValue('TEST_PUBLIC_KEY')),
                'CONEKTA_PRIVATE_KEY_TEST' => rtrim(Tools::getValue('TEST_PRIVATE_KEY')),
                'CONEKTA_CARDS' => rtrim(Tools::getValue('PAYMENT_METHS_CARD')),
                'CONEKTA_MSI' => rtrim(Tools::getValue('PAYMENT_METHS_INSTALLMET')),
                'PAYMENT_METHS_CASH' => rtrim(Tools::getValue('PAYMENT_METHS_CASH')),
                'PAYMENT_METHS_SPEI' => rtrim(Tools::getValue('PAYMENT_METHS_SPEI')),
                'EXPIRATION_DATE_LIMIT' => rtrim(Tools::getValue('EXPIRATION_DATE_LIMIT')),
                'EXPIRATION_DATE_TYPE' => rtrim(Tools::getValue('EXPIRATION_DATE_TYPE')),
            );

            if (Tools::getValue('LIVE_PUBLIC_KEY') && Tools::getValue('LIVE_PRIVATE_KEY')) {
                $configuration_values = array_merge(
                    $configuration_values,
                    array(
                        'CONEKTA_PUBLIC_KEY_LIVE' => rtrim(Tools::getValue('LIVE_PUBLIC_KEY')),
                        'CONEKTA_PRIVATE_KEY_LIVE' => rtrim(Tools::getValue('LIVE_PRIVATE_KEY')),
                    )
                );
            }
         
            foreach ($configuration_values as $configuration_key => $configuration_value) {
                Configuration::updateValue($configuration_key, $configuration_value);
            }
            $this->createWebhook();

            $webhook_message = Configuration::get('CONEKTA_WEBHOOK_ERROR_MESSAGE');

            if (empty($webhook_message)) {
                $webhook_message = false;
            }

            $this->smarty->assign("error_webhook_message", Configuration::get('CONEKTA_WEBHOOK_ERROR_MESSAGE'));
        } else {
            $this->smarty->assign("error_webhook_message", false);
        }

        $requirements = $this->checkRequirements();
        $this->smarty->assign("_path", $this->_path);
        $this->smarty->assign("requirements", $requirements);
        $this->smarty->assign("config_check", $requirements['result']);
        if ($requirements['result']) {
            $this->smarty->assign("msg_show", $this->l('All the checks were successfully performed. You can now start using your module.'));
        } else {
            $this->smarty->assign("msg_show", $this->l('Please resolve the following errors:'));
        }

        $this->html = '';

        if (Tools::isSubmit('btnSubmit')) {
            $this->postValidation();
            if (!count($this->postErrors)) {
                $this->postProcess();
            } else {
                foreach ($this->postErrors as $err) {
                    $this->html .= $this->displayError($err);
                }
            }
        }

        $this->html .= $this->displayCheck();
        $this->html .= $this->renderForm();
        
        return $this->html;
    }

    /**
     * Validate fields
     *
     * @param string $phone         Customer's phone number
     * @param array  $order_details Order details
     * @param int    $amount        Total amount
     *
     * @return boolean
     */
    public function checkedFields($phone = null, $order_details = null, $amount = null)
    {
        if (!empty($phone)) {
            if (strpos($phone, '+') !== false) {
                return $this->trans('The phone number must not contain "+"', array(), 'Modules.ConektaPaymentsPrestashop.Admin');
            } elseif (strlen($phone) != 10) {
                return $this->trans('The field Phone must be a string with a maximum length of 10. (Example: 52XXXXXXXX)', array(), 'Modules.ConektaPaymentsPrestashop.Admin');
            } elseif (!is_numeric($phone)) {
                return $this->trans('The Phone field is not a valid phone number', array(), 'Modules.ConektaPaymentsPrestashop.Admin');
            }
        } else {
            return $this->trans('The phone number is empty', array(), 'Modules.ConektaPaymentsPrestashop.Admin');
        }

        if(!empty($order_details)) {
            if ($order_details['currency'] == 'MXN' && $amount < $this->amount_min) {
                return $this->trans('The minimum purchase amount with Conekta must be greater than $ 20.00', array(), 'Modules.ConektaPaymentsPrestashop.Admin');
            }
        }

        return true;
    }

    /**
     * Create Webhook ok conekta
     *
     * @return void
     */
    private function createWebhook()
    {
        $key      = Configuration::get('CONEKTA_MODE') ? Configuration::get('CONEKTA_PRIVATE_KEY_LIVE') : Configuration::get('CONEKTA_PRIVATE_KEY_TEST');
        $iso_code = $this->context->language->iso_code;

        \Conekta\Conekta::setApiKey($key);
        \Conekta\Conekta::setPlugin("Prestashop1.7");
        \Conekta\Conekta::setApiVersion("2.0.0");
        \Conekta\Conekta::setPluginVersion($this->version);
        \Conekta\Conekta::setLocale($iso_code);

        $events = array(
            "events" => array(
                "order.paid",
                "order.expired",
            )
        );

        $url = Tools::safeOutput(Tools::getValue('WEB_HOOK'));

        Configuration::deleteByName('CONEKTA_WEBHOOK_ERROR_MESSAGE');

        // Obtain stored value
        $config_url      = Tools::safeOutput(Configuration::get('CONEKTA_WEBHOOK'));
        $is_valid_url    = !empty($url) && !filter_var($url, FILTER_VALIDATE_URL) === false;
        $failed_attempts = (integer) Configuration::get('CONEKTA_WEBHOOK_FAILED_ATTEMPTS');

        // If input is valid, has not been stored and has not failed more than 5 times
        if ($is_valid_url && ($config_url != $url) && ($failed_attempts < 5 && $url != Configuration::get('CONEKTA_WEBHOOK_FAILED_URL'))) {
            try {
                $webhooks = \Conekta\Webhook::where();

                $urls = array();

                foreach ($webhooks as $webhook) {
                    array_push($urls, $webhook->webhook_url);
                }
                if (!in_array($url, $urls)) {
                    if (Configuration::get('CONEKTA_MODE')) {
                        $mode = array(
                            "production_enabled" => 1
                        );
                    } else {
                        $mode = array(
                            "development_enabled" => 1
                        );
                    }
                    \Conekta\Webhook::create(
                        array_merge(
                            array(
                                "url" => $url
                            ),
                            $mode,
                            $events
                        )
                    );

                    Configuration::updateValue('CONEKTA_WEBHOOK', $url);

                    // delete error variables

                    Configuration::deleteByName('CONEKTA_WEBHOOK_FAILED_ATTEMPTS');
                    Configuration::deleteByName('CONEKTA_WEBHOOK_FAILED_URL');
                    Configuration::deleteByName('CONEKTA_WEBHOOK_ERROR_MESSAGE');
                }
            } catch (\Exception $e) {
                Configuration::updateValue('CONEKTA_WEBHOOK_ERROR_MESSAGE', $e->getMessage());
            }
        } else {
            if ($url == Configuration::get('CONEKTA_WEBHOOK_FAILED_URL')) {
                Configuration::updateValue('CONEKTA_WEBHOOK_ERROR_MESSAGE', "Webhook was already register, try changing webhook!");
                Configuration::deleteByName('CONEKTA_WEBHOOK_FAILED_ATTEMPTS');
                $failed_attempts = 0;
            } elseif ($failed_attempts >= 5) {
                Configuration::updateValue('CONEKTA_WEBHOOK_ERROR_MESSAGE', "Maximum failed attempts reached!");
            } elseif (!$is_valid_url) {
                Configuration::updateValue('CONEKTA_WEBHOOK_ERROR_MESSAGE', "Not a valid url!");
            } else {
                Configuration::updateValue('CONEKTA_WEBHOOK_ERROR_MESSAGE', "Webhook was already registered in your shop!");
            }
        }
        if (!empty(Configuration::get('CONEKTA_WEBHOOK_ERROR_MESSAGE'))) {
            $failed_attempts = $failed_attempts + 1;
            Configuration::updateValue('CONEKTA_WEBHOOK_FAILED_ATTEMPTS', $failed_attempts);
            Configuration::updateValue('CONEKTA_WEBHOOK_FAILED_URL', $url);
        }
    }

    /**
     * Insert monthly fees
     *
     * @param $total Total price of order
     * @param $jumps monthly fees
     *
     * @return array
     */
    public function getJumps($total, $jumps)
    {
        if ($total >= 300 && $total < 600) {
            $jumps[0] = array(1,3);
        } elseif ($total >= 600 && $total < 900) {
            $jumps[0] = array(1,3,6);
        } elseif ($total >= 900 && $total < 1200) {
            $jumps[0] = array(1,3,6,9);
        } elseif ($total >= 1200) {
            $jumps[0] = array(1,3,6,9,12);
        }
        return $jumps;
    }

    /**
     * Generate Payment form
     *
     * @return string HTML generate payment form
     */
    protected function generateCardPaymentForm()
    {
        //value by default
        $msi   = 0;
        $jumps = array( 1 );
        if (Configuration::get('PAYMENT_METHS_INSTALLMET')) {
            $msi   = 1;
            $total = $this->context->cart->getOrderTotal();
            $jumps = $this->getJumps($total, $jumps);
        }
        $months = array();
        for ($i = 1; $i <= 12; $i++) {
            $months[] = sprintf("%02d", $i);
        }

        $years = array();
        for ($i = 0; $i <= 10; $i++) {
            $years[] = date('Y', strtotime('+' . $i . ' years'));
        }

        $this->context->smarty->assign(
            array(
                'action' => $this->context->link->getModuleLink($this->name, 'validation', array(), true),
                'path' => $this->_path
            )
        );

        return $this->context->smarty->fetch('module:conektapaymentsprestashop/views/templates/front/payment_form.tpl');
    }

    /**
     * Payment process and validates if the payment was made correctly
     *
     * @param $conektaOrderId The id of the order to pay
     *
     * @return string link redirect
     */
    public function processPayment($conektaOrderId)
    {
        $key = Configuration::get('CONEKTA_MODE') ? Configuration::get('CONEKTA_PRIVATE_KEY_LIVE') : Configuration::get('CONEKTA_PRIVATE_KEY_TEST');
        $iso_code = $this->context->language->iso_code;

        \Conekta\Conekta::setApiKey($key);
        \Conekta\Conekta::setPlugin("Prestashop 1.7");
        \Conekta\Conekta::setApiVersion("2.0.0");
        \Conekta\Conekta::setPluginVersion($this->version);
        \Conekta\Conekta::setLocale($iso_code);
        // $cart = $this->context->cart;
        try {
            $order = \Conekta\Order::find($conektaOrderId);

            if (!isset($order->charges[0]) && empty($order->charges[0])) {
                if (isset($order->checkout['plan_id'])) {
                    $charge_response = (object) array(
                        'id' => '',
                        'status' => $order->status,
                        'created_at' => $order->created_at,
                        'currency' => $order->currency,
                        'livemode' => $order->livemode,
                        'amount' => $order->amount,
                    );
                } else {
                    return false;
                }

            } else {
                $charge_response = $order->charges[0];
            }
            $order_status = (int) Configuration::get('PS_OS_PAYMENT');
            $message = $this->l('Conekta Transaction Details:') . "\n\n" . $this->l('Amount:') . ' ' . ($order->amount * 0.01) . "\n" . $this->l('Status:') . ' ' . ($charge_response->status == 'paid') ? $this->l('Paid') : $this->l('Unpaid') . "\n" . $this->l('Processed on:') . ' ' . strftime('%Y-%m-%d %H:%M:%S', $charge_response->created_at) . "\n" . $this->l('Currency:') . ' ' . Tools::strtoupper($charge_response->currency) . "\n" . $this->l('Mode:') . ' ' . ($charge_response->livemode == 'true') ? $this->l('Live') : $this->l('Test') . "\n";
            $this->validateOrder((int) $this->context->cart->id, (int) $order_status, $order->amount * 0.01, $this->displayName, $message, array(), null, false, $this->context->customer->secure_key);

            if (version_compare(_PS_VERSION_, '1.5', '>=')) {
                $new_order = new Order((int) $this->currentOrder);
                if (Validate::isLoadedObject($new_order)) {
                    $payment = $new_order->getOrderPaymentCollection();
                    if (isset($payment[0])) {
                        $payment[0]->transaction_id = pSQL($charge_response->id);
                        $payment[0]->save();
                    }
                }
            }

            if (isset($charge_response->id) && !empty($charge_response->id) && strtolower($charge_response->payment_method->type) == "oxxo") {
                Database::insertOxxoPayment($order, $charge_response, $charge_response->payment_method->reference, $this->currentOrder, $this->context->cart->id);
            } elseif (isset($charge_response->id) && !empty($charge_response->id)  && strtolower($charge_response->payment_method->type) == "spei") {
                Database::insertSpeiPayment($order, $charge_response, $charge_response->payment_method->reference, $this->currentOrder, $this->context->cart->id);
            } elseif (isset($charge_response->id) && !empty($charge_response->id)  && !isset($order->checkout['plan_id']) ) {
                Database::insertCardPayment($order, $charge_response, $this->currentOrder, $this->context->cart->id);
            } elseif (isset($order->checkout['plan_id'])) {
                Database::insertCardPayment($order, $charge_response, $this->currentOrder, $this->context->cart->id);
            }
            Database::updateConektaOrder($this->context->customer->id, $this->context->cart->id, $this->conekta_mode, $order->id, $charge_response->status);

            $redirect = $this->context->link->getPageLink(
                'order-confirmation',
                true,
                null,
                array(
                    'id_order' => (int) $this->currentOrder,
                    'id_cart' => (int) $this->context->cart->id,
                    'key' => $this->context->customer->secure_key,
                    'id_module' => (int) $this->id
                )
            );
            Tools::redirect($redirect);
        } catch (\Exception $e) {
            $log_message = $e->getMessage() . ' ';

            if (class_exists('Logger')) {
                Logger::addLog($this->l('Payment transaction failed') . ' ' . $log_message, 2, null, 'Cart', (int) $this->context->cart->id, true);
            }

            $message = $e->getMessage() . ' ';

            $controller = Configuration::get('PS_ORDER_PROCESS_TYPE') ? 'order-opc.php' : 'order.php';
            $location   = $this->context->link->getPageLink($controller, true) . (strpos($controller, '?') !== false ? '&' : '?') . 'step=3&conekta_error=1&message=' . $message . '#conekta_error';
            Tools::redirectLink($location);
        }
    }

    /**
     * Fetch template with the name
     *
     * @param $name Name of template
     *
     * @return string link template
     */
    public function fetchTemplate($name)
    {
        $views = 'views/templates/';
        if (@filemtime(dirname(__FILE__) . '/' . $name)) {
            return $this->display(__FILE__, $name);
        } elseif (@filemtime(dirname(__FILE__) . '/' . $views . 'hook/' . $name)) {
            return $this->display(__FILE__, $views . 'hook/' . $name);
        } elseif (@filemtime(dirname(__FILE__) . '/' . $views . 'front/' . $name)) {
            return $this->display(__FILE__, $views . 'front/' . $name);
        } elseif (@filemtime(dirname(__FILE__) . '/' . $views . 'admin/' . $name)) {
            return $this->display(__FILE__, $views . 'admin/' . $name);
        }

        return $this->display(__FILE__, $name);
    }

    /**
     * Returns a template with the order status
     *
     * @param $order_id The id of order
     *
     * @return string HTML
     */
    public function getTransactionStatus($order_id)
    {
        if (Database::getOrderConekta($order_id) == $this->name) {
            $conekta_tran_details = Database::getConektaTransaction($order_id);

            $this->smarty->assign('conekta_tran_details', $conekta_tran_details);
            
            if ($conekta_tran_details['status'] === 'paid') {
                $this->smarty->assign("color_status", "green");
                $this->smarty->assign("message_status", $this->l("Paid"));
            } else {
                $this->smarty->assign("color_status", "#CC0000");
                $this->smarty->assign("message_status", $this->l("Unpaid"));
            }
            $this->smarty->assign(
                "display_price",
                Tools::displayPrice($conekta_tran_details['amount'])
            );
            $this->smarty->assign(
                "processed_on",
                Tools::safeOutput($conekta_tran_details['date_add'])
            );

            if ($conekta_tran_details['mode'] === "live") {
                $this->smarty->assign("color_mode", "green");
                $this->smarty->assign("txt_mode", $this->l("Live"));
            } else {
                $this->smarty->assign("color_mode", "#CC0000");
                $this->smarty->assign(
                    "txt_mode",
                    $this->l(
                        'Test (No payment has been processed and you will'
                        .' need to enable the &quot;Live&quot; mode)'
                    )
                );
            }

            return $this->fetchTemplate("admin-order.tpl");
        }
    }
}
