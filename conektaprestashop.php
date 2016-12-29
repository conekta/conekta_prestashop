<?php
/**
 * Title   : Conekta Card Payment Gateway for Prestashop
 * Author  : Conekta.io
 * Url     : https://www.conekta.io/es/docs/plugins/prestashop.
 *
 *  @author Conekta <support@conekta.io>
 *  @copyright  2012-2016 Conekta
 *  @version  v1.2.0
 *  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
if (!defined('_PS_VERSION_')) {
    exit;
}

class ConektaPrestashop extends PaymentModule
{
    protected $backward = false;

    public function __construct()
    {
        $this->name = 'conektaprestashop';
        $this->tab = 'payments_gateways';
        $this->version = '1.2.0';
        $this->author = 'Conekta';
        $this->bootstrap = true;
        parent::__construct();
        $this->module_key = 'f9fff7b3952e3ecb51bb737ab7a05003';
        $this->displayName = $this->l('Conekta Prestashop');
        $this->description = $this->l('Accept payments by Credit and Debit Card with Conekta (Visa, Mastercard, Amex)');
        $this->confirmUninstall = $this->l('Warning: all the Conekta transaction details in your database will be deleted. Are you sure you want uninstall this module?');
        $this->backward_error = $this->l('In order to work correctly in PrestaShop v1.4, this module requires backward compatibility module of at least v0.4.');
        if (version_compare(_PS_VERSION_, '1.5', '<')) {
            require(_PS_MODULE_DIR_ . $this->name . '/compatibility/backward.php');

            $this->backward = true;
        } else {
            $this->backward = true;
        }
    }

    /**
     * Conekta's module installation
     *
     * @return boolean Install result
     */
    public function install()
    {
        if (!$this->backward && _PS_VERSION_ < 1.5) {
            $this->smarty->assign("error_message", $this->backward_error);
            echo $this->fetchTemplate("error.tpl");
            return false;
        }

        /* For 1.4.3 and less compatibility */
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

        $ret = parent::install() && $this->_createPendingCashState() && $this->_createPendingBanorteState() && $this->_createPendingSpeiState() && $this->registerHook('adminOrder') && $this->registerHook('payment') && $this->registerHook('header') && $this->registerHook('backOfficeHeader') && $this->registerHook('paymentReturn') && Configuration::updateValue('CONEKTA_CARDS', 1) && Configuration::updateValue('CONEKTA_MSI', 1) && Configuration::updateValue('CONEKTA_CASH', 1) && Configuration::updateValue('CONEKTA_BANORTE', 1) && Configuration::updateValue('CONEKTA_SPEI', 1) && Configuration::updateValue('CONEKTA_MODE', 0) && Configuration::updateValue('CONEKTA_PAYMENT_ORDER_STATUS', (int)Configuration::get('PS_OS_PAYMENT')) && $this->installDb();

        Configuration::updateValue('CONEKTA_PRESTASHOP_VERSION', $this->version);
        return $ret;
    }

    /**
     * Conekta's module database tables
     *
     * @return boolean Database tables installation result
     */
    public function installDb()
    {
        return Db::getInstance()->Execute('CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'conekta_transaction` (
          `id_conekta_transaction` int(11) NOT NULL AUTO_INCREMENT,
          `type` enum(\'payment\',\'refund\') NOT NULL,
          `id_cart` int(10) unsigned NOT NULL,
          `id_order` int(10) unsigned NOT NULL, 
          `id_conekta_order` int(10) unsigned NOT NULL, 
          `id_transaction` varchar(32) NOT NULL, 
          `amount` decimal(10,2) NOT NULL, 
          `status` enum(\'paid\',\'unpaid\') NOT NULL,
          `currency` varchar(3) NOT NULL,
          `mode` enum(\'live\',\'test\') NOT NULL,
          `date_add` datetime NOT NULL,
          `reference` varchar(30) NOT NULL,
          `barcode` varchar(230) NOT NULL,
          `captured` tinyint(1) NOT NULL DEFAULT \'1\',
          PRIMARY KEY (`id_conekta_transaction`),
          KEY `idx_transaction` (`type`,`id_order`,`status`))
          ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');
    }

    private function _createPendingSpeiState()
    {
        $state = new OrderState();
        $languages = Language::getLanguages();
        $names = array();
        
        foreach ($languages as $lang) {
            $names[$lang['id_lang']] = 'En espera de pago';
        }

        $state->name = $names;
        $state->color = '#4169E1';
        $state->send_email = true;
        $state->module_name = 'conektaprestashop';
        $templ = array();
        
        foreach ($languages as $lang) {
            $templ[$lang['id_lang']] = 'conektaprestashop';
        }

        $state->template = $templ;
        if ($state->save()) {
            Configuration::updateValue('waiting_spei_payment', $state->id);
            $directory = _PS_MODULE_DIR_ . $this->name . '/mails/';
            if ($dhvalue = opendir($directory)) {
                while (($file = readdir($dhvalue)) !== false) {
                    if (is_dir($directory . $file) && $file[0] != '.') {
                        copy($directory . $file . '/conektaspei.html', '../mails/' . $file . '/conektaspei.html');
                    }
                }

                closedir($dhvalue);
            }
        } else {
            return false;
        }

        return true;
    }

    private function _createPendingBanorteState()
    {
        $state = new OrderState();
        $languages = Language::getLanguages();
        $names = array();
        
        foreach ($languages as $lang) {
            $names[$lang['id_lang']] = 'En espera de pago';
        }

        $state->name = $names;
        $state->color = '#4169E1';
        $state->send_email = true;
        $state->module_name = 'conektaprestashop';
        $templ = array();

        foreach ($languages as $lang) {
            $templ[$lang['id_lang']] = 'conektaprestashop';
        }

        $state->template = $templ;
        if ($state->save()) {
            Configuration::updateValue('waiting_banorte_payment', $state->id);
            $directory = _PS_MODULE_DIR_ . $this->name . '/mails/';
            if ($dhvalue = opendir($directory)) {
                while (($file = readdir($dhvalue)) !== false) {
                    if (is_dir($directory . $file) && $file[0] != '.') {
                        copy($directory . $file . '/conektabanorte.html', '../mails/' . $file . '/conektabanorte.html');
                    }
                }

                closedir($dhvalue);
            }
        } else {
            return false;
        }

        return true;
    }

    private function _createPendingCashState()
    {
        $state = new OrderState();
        $languages = Language::getLanguages();
        $names = array();
        
        foreach ($languages as $lang) {
            $names[$lang['id_lang']] = 'En espera de pago';
        }

        $state->name = $names;
        $state->color = '#4169E1';
        $state->send_email = true;
        $state->module_name = 'conektaprestashop';
        $templ = array();
        
        foreach ($languages as $lang) {
            $templ[$lang['id_lang']] = 'conektaprestashop';
        }

        $state->template = $templ;
        if ($state->save()) {
            Configuration::updateValue('waiting_cash_payment', $state->id);
            $directory = _PS_MODULE_DIR_ . $this->name . '/mails/';
            if ($dhvalue = opendir($directory)) {
                while (($file = readdir($dhvalue)) !== false) {
                    if (is_dir($directory . $file) && $file[0] != '.') {
                        copy($directory . $file . '/conektaefectivo.html', '../mails/' . $file . '/conektaefectivo.html');
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
     * Conekta's module uninstallation
     *
     * @return boolean Uninstall result
     */
    public function uninstall()
    {
        return parent::uninstall() && Configuration::deleteByName('CONEKTA_PRESTASHOP_VERSION') && Configuration::deleteByName('CONEKTA_MSI') && Configuration::deleteByName('CONEKTA_CARDS') && Configuration::deleteByName('CONEKTA_CASH') && Configuration::deleteByName('CONEKTA_BANORTE') && Configuration::deleteByName('CONEKTA_SPEI') && Configuration::deleteByName('CONEKTA_PUBLIC_KEY_TEST') && Configuration::deleteByName('CONEKTA_PUBLIC_KEY_LIVE') && Configuration::deleteByName('CONEKTA_MODE') && Configuration::deleteByName('CONEKTA_PRIVATE_KEY_TEST') && Configuration::deleteByName('CONEKTA_PRIVATE_KEY_LIVE') && Configuration::deleteByName('CONEKTA_PAYMENT_ORDER_STATUS') && Configuration::deleteByName('CONEKTA_WEBHOOK') && Configuration::deleteByName('CONEKTA_WEBHOOK_FAILED_ATTEMPTS') && Configuration::deleteByName('CONEKTA_WEBHOOK_ERROR_MESSAGE') && Configuration::deleteByName('CONEKTA_WEBHOOK_FAILED_URL') && Db::getInstance()->Execute('DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'conekta_customer`') && Db::getInstance()->Execute('DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'conekta_transaction`');
    }

    /**
     * Load Javascripts and CSS related to the CONEKTA'S module
     * @return string Content
     */
    public function hookHeader()
    {
        /* If 1.4 and no backward, then leave */
        if (!$this->backward) {
            return;
        }

        if (!$this->checkSettings()) {
            return;
        }

        if (Tools::getValue('controller') != 'order-opc' && (!($_SERVER['PHP_SELF'] == __PS_BASE_URI__ . 'order.php' || $_SERVER['PHP_SELF'] == __PS_BASE_URI__ . 'order-opc.php' || Tools::getValue('controller') == 'order' || Tools::getValue('controller') == 'orderopc' || Tools::getValue('step') == 3))) {
            return;
        }

        $this->context->controller->addCSS($this->_path . 'views/css/conekta-prestashop.css');

        if (Configuration::get('CONEKTA_MODE')) {
            $this->smarty->assign("api_key", addslashes(Configuration::get('CONEKTA_PUBLIC_KEY_LIVE')));
        } else {
            $this->smarty->assign("api_key", addslashes(Configuration::get('CONEKTA_PUBLIC_KEY_TEST')));
        }

        $this->smarty->assign("path", $this->_path);
        return $this->fetchTemplate("hook-header.tpl");
    }

    /**
     * Display the CONEKTA payment form on the checkout page
     * @return string Conekta's Smarty template content
     */
    public function hookPayment($params)
    {
        /* If 1.4 and no backward then leave */
        if (!$this->backward) {
            return;
        }

        if (!$this->checkSettings()) {
            return;
        }

        $this->smarty->assign('card', Configuration::get('CONEKTA_CARDS'));
        $this->smarty->assign('msi', Configuration::get('CONEKTA_MSI'));
        $this->smarty->assign('cash', Configuration::get('CONEKTA_CASH'));
        $this->smarty->assign('spei', Configuration::get('CONEKTA_SPEI'));
        $this->smarty->assign('banorte', Configuration::get('CONEKTA_BANORTE'));

        if (Tools::getIsset("message")) {
            $this->smarty->assign("message", Tools::getIsset("message"));
            return $this->fetchTemplate('payment-methods-all.tpl');
        } else {
            $this->smarty->assign("message", '');
            return $this->fetchTemplate('payment-methods-all.tpl');
        }
    }

    public function hookAdminOrder($params)
    {
        if (version_compare(_PS_VERSION_, '1.6', '<')) {
            return;
        }

        $id_order = (int) ($params['id_order']);

        if (Db::getInstance()->getValue('SELECT module FROM ' . _DB_PREFIX_ . 'orders WHERE id_order = ' . (int) $id_order) == $this->name) {
            $conekta_transaction_details = Db::getInstance()->getRow('SELECT * FROM ' . _DB_PREFIX_ . 'conekta_transaction WHERE id_order = ' . pSQL((int) $id_order) . ' AND type = \'payment\' AND status = \'paid\'');

            $this->smarty->assign('conekta_transaction_details', $conekta_transaction_details);

            
            if ($conekta_transaction_details['status'] === 'paid') {
                $this->smarty->assign("color_status", "green");
                $this->smarty->assign("message_status", $this->l("Paid"));
            } else {
                $this->smarty->assign("color_status", "#CC0000");
                $this->smarty->assign("message_status", $this->l("Unpaid"));
            }

            $this->smarty->assign("display_price", Tools::displayPrice($conekta_transaction_details['amount']));
            $this->smarty->assign("processed_on", Tools::safeOutput($conekta_transaction_details['date_add']));

            if ($conekta_transaction_details['mode'] === "live") {
                $this->smarty->assign("color_mode", "green");
                $this->smarty->assign("txt_mode", $this->l("Live"));
            } else {
                $this->smarty->assign("color_mode", "#CC0000");
                $this->smarty->assign("txt_mode", $this->l('Test (No payment has been processed and you will need to enable the &quot;Live&quot; mode)'));
            }
            
            return $this->fetchTemplate("admin-order.tpl");
        }
    }

    /**
     * Display the info in the admin
     *
     * @return string Content
     */
    public function hookBackOfficeHeader()
    {
        if (version_compare(_PS_VERSION_, 1.6, '>=')) {
            return;
        }
        if (!$this->backward) {
            return;
        }
        if (!Tools::getIsset('vieworder') || !Tools::getIsset('id_order')) {
            return;
        }
        
        $id_order = (int) Tools::getValue('id_order');

        if (Db::getInstance()->getValue('SELECT module FROM ' . _DB_PREFIX_ . 'orders WHERE id_order = ' . pSQL((int) $id_order)) == $this->name) {
            $conekta_transaction_details = Db::getInstance()->getRow('SELECT * FROM ' . _DB_PREFIX_ . 'conekta_transaction WHERE id_order = ' . pSQL((int) $id_order) . ' AND type = \'payment\' AND status = \'paid\'');

            $this->smarty->assign('conekta_transaction_details', $conekta_transaction_details);

            
            if ($conekta_transaction_details['status'] === 'paid') {
                $this->smarty->assign("color_status", "green");
                $this->smarty->assign("message_status", $this->l("Paid"));
            } else {
                $this->smarty->assign("color_status", "#CC0000");
                $this->smarty->assign("message_status", $this->l("Unpaid"));
            }

            $this->smarty->assign("display_price", Tools::displayPrice($conekta_transaction_details['amount']));
            $this->smarty->assign("processed_on", Tools::safeOutput($conekta_transaction_details['date_add']));

            if ($conekta_transaction_details['mode'] === "live") {
                $this->smarty->assign("color_mode", "green");
                $this->smarty->assign("txt_mode", $this->l("Live"));
            } else {
                $this->smarty->assign("color_mode", "#CC0000");
                $this->smarty->assign("txt_mode", $this->l('Test (No payment has been processed and you will need to enable the "Live" mode)'));
            }
            
            return $this->fetchTemplate("admin-order.tpl");
        }
    }

    /**
     * Display a confirmation message after an order has been placed
     * To Do: add more complete information to show to user, add print button
     * @param array Hook parameters
     */
    public function hookPaymentReturn($params)
    {
        if (!$this->active) {
            return;
        }

        if ($params['objOrder'] && Validate::isLoadedObject($params['objOrder'])) {
            $id_order = (int) $params['objOrder']->id;
            $conekta_transaction_details = Db::getInstance()->getRow('SELECT * FROM ' . _DB_PREFIX_ . 'conekta_transaction WHERE id_order = ' . pSQL((int) $id_order) . ';');

            // Check for Barcode Payments,
            // Referenced Payments
            // And Cards

            if ($conekta_transaction_details['barcode']) {
                $this->smarty->assign('cash', true);
                $this->smarty->assign('conekta_order', array(
                    'barcode' => $conekta_transaction_details['reference'],
                    'type' => 'cash',
                    'barcode_url' => $conekta_transaction_details['barcode'],
                    'amount' => $conekta_transaction_details['amount'],
                    'currency' => $conekta_transaction_details['currency']
                    ));
            } elseif (isset($conekta_transaction_details['reference']) && !empty($conekta_transaction_details['reference'])) {
                if (strpos($conekta_transaction_details['reference'], '6461801118') !== false) {
                    $this->smarty->assign('spei', true);
                    $this->smarty->assign('conekta_order', array(
                        'receiving_account_number' => $conekta_transaction_details['reference'],
                        'amount' => $conekta_transaction_details['amount'],
                        'currency' => $conekta_transaction_details['currency']
                        ));
                } else {
                    $this->smarty->assign('banorte', true);
                    $this->smarty->assign('conekta_order', array(
                        'service_name' => "Conekta",
                        'service_number' => "127589",
                        'reference' => $conekta_transaction_details['reference'],
                        'amount' => $conekta_transaction_details['amount'],
                        'currency' => $conekta_transaction_details['currency']
                        ));
                }
            } else {
                $this->smarty->assign('card', true);
                $this->smarty->assign('conekta_order', array(
                    'type' => 'card',
                    'reference' => isset($params['objOrder']->reference) ? $params['objOrder']->reference : '#' . sprintf('%06d', $params['objOrder']->id),
                    'valid' => $params['objOrder']->valid
                    ));
            }
        }

        return $this->fetchTemplate('checkout-confirmation-all.tpl');
    }

    /**
     * Process a payment, where the magic happens
     *
     * @param string $token CONEKTA Transaction ID (token)
     */
    public function processPayment($token, $type, $monthly_installments)
    {
        /* If 1.4 and no backward, then leave */
        if (!$this->backward) {
            return;
        }

        if (!$token && $type == "card") {
            if (version_compare(_PS_VERSION_, '1.4.0.3', '>') && class_exists('Logger')) {
                Logger::addLog($this->l('Conekta - Payment transaction failed.') . ' Message: A valid Conekta token was not provided', 3, null, 'Cart', (int)$this->context->cart->id, true);
            }

            $controller = Configuration::get('PS_ORDER_PROCESS_TYPE') ? 'order-opc.php' : 'order.php';

            $location = $this->context->link->getPageLink($controller, true) . (strpos($controller, '?') !== false ? '&' : '?') . 'step=3&message_to_purchaser=token&conekta_error=1#conekta_error';

            Tools::redirectLink($location);
        }

        require_once(dirname(__FILE__) . '/lib/conekta-php/lib/Conekta.php');

        \Conekta\Conekta::setApiKey(Configuration::get('CONEKTA_MODE') ? Configuration::get('CONEKTA_PRIVATE_KEY_LIVE') : Configuration::get('CONEKTA_PRIVATE_KEY_TEST'));
        \Conekta\Conekta::setPlugin('Prestashop');
        \Conekta\Conekta::setApiVersion('1.1.0');

        $cart             = $this->context->cart;
        $customer         = new Customer((int) $cart->id_customer);
        $address_delivery = new Address((int) $cart->id_address_delivery);
        $address_fiscal   = new Address((int) $cart->id_address_invoice);

        // get shipping info

        $carrier          = new Carrier((int)$cart->id_carrier);
        $shipping_price   = $cart->getTotalShippingCost() * 100;
        $shipping_carrier = "other";
        $shipping_service = "other";

        if (isset($carrier)) {
            $shipping_carrier = $carrier->name;
            $shipping_service = implode(",", $carrier->delay);
        }

        // build line items

        $items      = $cart->getProducts();
        $line_items = array();
        foreach ($items as $item) {
            $line_items = array_merge($line_items, array(
                array(
                    'name'        => $item['name'],
                    'unit_price'  => (float)$item['price'] * 100,
                    'description' => $item['description_short'],
                    'quantity'    => $item['cart_quantity'],
                    'sku'         => $item['reference'],
                    'type'        => "physical",
                    'tags'        =>["prestashop"]
                    )
                ));
        }
        $shipping_lines = array(
            array(
                "description"     => $shipping_service,
                "amount"          => $shipping_price,
                "tracking_number" => $shipping_service,
                "carrier"         => $shipping_carrier,
                "method"          => $shipping_service
            )
        );
        $fiscal_entity = array(
            "tax_id"       => "",
            "company_name" => $address_fiscal->company,
            "email"        => "",
            "phone"        => $address_fiscal->phone,
            "address"      => array(
                "street1" => $address_fiscal->address1,
                "city"    => $address_fiscal->city,
                "country" => $address_fiscal->country,
                "zip"     => $address_fiscal->postcode,
                "state"   => State::getNameById($address_fiscal->id_state)
            )
        );
        $shipping_contact = array(
            "email"    => $customer->email,
            "phone"    => $address_delivery->phone,
            "reciever" => $customer->firstname . " " . $customer->lastname,
            "address"  => array(
                "street1" => $address_delivery->address1,
                "city"    => $address_delivery->city,
                "state"   => State::getNameById($address_delivery->id_state),
                "country" => $address_delivery->country,
                "zip"     => $address_delivery->postcode
            )
        );
        $customer_info = array(
            "name"  => $customer->firstname . " " . $customer->lastname,
            "phone" => $address_delivery->phone,
            "email" => $customer->email
        );
        $order_details = array(
            "currency"         => $this->context->currency->iso_code,
            "line_items"       => $line_items,
            "fiscal_entity"    => $fiscal_entity,
            "shipping_lines"   => $shipping_lines,
            "shipping_contact" => $shipping_contact,
            "customer_info"    => $customer_info
        );
        $amount = $this->context->cart->getOrderTotal() * 100;
        try {
            $order = \Conekta\Order::create($order_details)

            if ($type == "cash") {
                $charges_params =
                    array(
                        'source' => array('type' => 'oxxo_cash'),
                        'amount' => $amount
                    );
                $charge_response = $order->createCharge($charges_params);
                $barcode_url = $charge_response->payment_method->barcode_url;
                $reference = $charge_response->payment_method->reference;
                $order_status = (int) Configuration::get('waiting_cash_payment');

                $message = $this->l('Conekta Transaction Details:') . "\n\n" . $this->l('Reference:') . ' ' . $reference . "\n" . $this->l('Barcode:') . ' ' . $barcode_url . "\n" . $this->l('Amount:') . ' ' . ($charge_response->amount * 0.01) . "\n" . $this->l('Processed on:') . ' ' . strftime('%Y-%m-%d %H:%M:%S', $charge_response->created_at) . "\n" . $this->l('Currency:') . ' ' . Tools::strtoupper($charge_response->currency) . "\n" . $this->l('Mode:') . ' ' . ($charge_response->livemode == 'true' ? $this->l('Live') : $this->l('Test')) . "\n";

                $checkout = Module::getInstanceByName('conektaprestashop');
                $checkout->extra_mail_vars = array(
                    '{barcode_url}' => (string)$barcode_url,
                    '{barcode}' => (string)$reference
                    );
            } elseif ($type == "spei") {
                $charges_params =
                    array(
                        'source' => array( 'type' => 'spei'),
                        'amount' => $amount
                    );
                $charge_response = $order->createCharge($charges_params);
                $reference = $charge_response->payment_method->clabe;
                $order_status = (int)Configuration::get('waiting_spei_payment');
                $message = $this->l('Conekta Transaction Details:') . "\n\n" . $this->l('Amount:') . ' ' . ($charge_response->amount * 0.01) . "\n" . $this->l('Processed on:') . ' ' . strftime('%Y-%m-%d %H:%M:%S', $charge_response->created_at) . "\n" . $this->l('Currency:') . ' ' . Tools::strtoupper($charge_response->currency) . "\n" . $this->l('Mode:') . ' ' . ($charge_response->livemode == 'true' ? $this->l('Live') : $this->l('Test')) . "\n";
                $checkout = Module::getInstanceByName('conektaprestashop');
                $checkout->extra_mail_vars = array(
                    '{receiving_account_number}' => (string)$reference
                    );
            } elseif ($type == "banorte") {
                $charges_params =
                    array(
                        'source' => array('type' => 'banorte'),
                        'amount' => $amount
                    )
                $charge_response = $order->createCharge($charges_params);
                $reference = $charge_response->payment_method->reference;
                $service_name = $charge_response->payment_method->service_name;
                $service_number = $charge_response->payment_method->service_number;
                $order_status = (int)Configuration::get('waiting_banorte_payment');
                $message = $this->l('Conekta Transaction Details:') . "\n\n" . $this->l('Amount:') . ' ' . ($charge_response->amount * 0.01) . "\n" . $this->l('Processed on:') . ' ' . strftime('%Y-%m-%d %H:%M:%S', $charge_response->created_at) . "\n" . $this->l('Currency:') . ' ' . Tools::strtoupper($charge_response->currency) . "\n" . $this->l('Mode:') . ' ' . ($charge_response->livemode == 'true' ? $this->l('Live') : $this->l('Test')) . "\n";
                $checkout = Module::getInstanceByName('conektaprestashop');
                $checkout->extra_mail_vars = array(
                    '{reference}' => (string)$reference
                    );
                $checkout->extra_mail_vars = array(
                    '{service_name}' => (string)$service_name
                    );
                $checkout->extra_mail_vars = array(
                    '{service_number}' => (string)$service_number
                    );
            } else {
                $charges_params =
                    array(
                        'source' => array(
                            'type'                 => 'card',
                            'token_id'             => $token,
                            'monthly_installments' => $monthly_installments > 1 ? $monthly_installments : null
                          ),
                         'amount' => $amount
                     );
                $charge_response = $order->createCharge($charges_params);
                $order_status = (int)Configuration::get('PS_OS_PAYMENT');
                $message = $this->l('Conekta Transaction Details:') . "\n\n" . $this->l('Amount:') . ' ' . ($charge_response->amount * 0.01) . "\n" . $this->l('Status:') . ' ' . ($charge_response->status == 'paid' ? $this->l('Paid') : $this->l('Unpaid')) . "\n" . $this->l('Processed on:') . ' ' . strftime('%Y-%m-%d %H:%M:%S', $charge_response->created_at) . "\n" . $this->l('Currency:') . ' ' . Tools::strtoupper($charge_response->currency) . "\n" . $this->l('Mode:') . ' ' . ($charge_response->livemode == 'true' ? $this->l('Live') : $this->l('Test')) . "\n";
            }

            $this->validateOrder((int)$this->context->cart->id, (int) $order_status, $this->context->cart->getOrderTotal(), $this->displayName, $message, array(), null, false, $this->context->customer->secure_key);

            if (version_compare(_PS_VERSION_, '1.5', '>=')) {
                $new_order = new Order((int)$this->currentOrder);
                if (Validate::isLoadedObject($new_order)) {
                    $payment = $new_order->getOrderPaymentCollection();
                    if (isset($payment[0])) {
                        $payment[0]->transaction_id = pSQL($charge_response->id);
                        $payment[0]->save();
                    }
                }
            }

            if (isset($charge_response->id) && $type == "cash") {
                Db::getInstance()->Execute('INSERT INTO ' . _DB_PREFIX_ . 'conekta_transaction (type, id_cart, id_order, id_conekta_order, id_transaction, amount, status, currency, mode, date_add, reference, barcode, captured) VALUES (\'payment\', ' . pSQL((int) $this->context->cart->id) . ', ' . pSQL((int) $this->currentOrder) . ', \'' . pSQL($order->id) . '\', \'' . pSQL($charge_response->id) . '\',\'' . ($order->amount * 0.01) . '\', \'' . ($charge_response->status == 'paid' ? 'paid' : 'unpaid') . '\', \'' . pSQL($charge_response->currency) . '\', \'' . ($charge_response->livemode == 'true' ? 'live' : 'test') . '\', NOW(),\'' . $reference . '\',\'' . $barcode_url . '\',\'' . ($charge_response->livemode == 'true' ? '1' : '0') . '\' )');
            } elseif (isset($charge_response->id) && $type == "spei") {
                Db::getInstance()->Execute('INSERT INTO ' . _DB_PREFIX_ . 'conekta_transaction (type, id_cart, id_order, id_conekta_order, id_transaction, amount, status, currency, mode, date_add, reference, captured) VALUES (\'payment\', ' . (int) $this->context->cart->id . ', ' . (int) $this->currentOrder . ', \'' . pSQL($order->id) . '\', \'' . pSQL($charge_response->id) . '\', \'' . ($charge_response->amount * 0.01) . '\', \'' . ($charge_response->status == 'paid' ? 'paid' : 'unpaid') . '\', \'' . pSQL($charge_response->currency) . '\', \'' . ($charge_response->livemode == 'true' ? 'live' : 'test') . '\', NOW(),\'' . $reference . '\', \'' . ($charge_response->livemode == 'true' ? '1' : '0') . '\' )');
            } elseif (isset($charge_response->id) && $type == "banorte") {
                Db::getInstance()->Execute('INSERT INTO ' . _DB_PREFIX_ . 'conekta_transaction (type, id_cart, id_order, id_conekta_order, id_transaction, amount, status, currency, mode, date_add, reference, captured) VALUES (\'payment\', ' . (int) $this->context->cart->id . ', ' . (int) $this->currentOrder . ', \'' . pSQL($order->id) . '\', \'' . pSQL($charge_response->id) . '\', \'' . ($charge_response->amount * 0.01) . '\', \'' . ($charge_response->status == 'paid' ? 'paid' : 'unpaid') . '\', \'' . pSQL($charge_response->currency) . '\', \'' . ($charge_response->livemode == 'true' ? 'live' : 'test') . '\', NOW(),\'' . $reference . '\', \'' . ($charge_response->livemode == 'true' ? '1' : '0') . '\' )');
            } elseif (isset($charge_response->id)) {
                Db::getInstance()->Execute('INSERT INTO ' . _DB_PREFIX_ . 'conekta_transaction (type, id_cart, id_order, id_conekta_order, id_transaction, amount, status, currency, mode, date_add, captured) VALUES (\'payment\', ' . (int) $this->context->cart->id . ', ' . (int) $this->currentOrder . ', \'' . pSQL($order->id) . '\', \'' . pSQL($charge_response->id) . '\',\'' . ($charge_response->amount * 0.01) . '\', \'' . ($charge_response->status == 'paid' ? 'paid' : 'unpaid') . '\', \'' . pSQL($charge_response->currency) . '\', \'' . ($charge_response->livemode == 'true' ? 'live' : 'test') . '\', NOW(), \'1\')');
            }

            if (version_compare(_PS_VERSION_, '1.5', '<')) {
                $redirect = 'order-confirmation.php?id_cart=' . (int) $this->context->cart->id . '&id_module=' . (int) $this->id . '&id_order=' . (int)$this->currentOrder . '&key=' . $this->context->customer->secure_key;
            } else {
                $redirect = $this->context->link->getPageLink('order-confirmation', true, null, array(
                    'id_order' => (int) $this->currentOrder,
                    'id_cart' => (int) $this->context->cart->id,
                    'key' => $this->context->customer->secure_key,
                    'id_module' => (int) $this->id
                    ));
            }

            Tools::redirect($redirect);
        } catch (\Conekta\ErrorList $e) {
            $message = $e->details[0]->message_to_purchaser;
            if (version_compare(_PS_VERSION_, '1.4.0.3', '>') && class_exists('Logger')) {
                foreach ($e->$details as $single_error) {
                    Logger::addLog($this->l('Payment transaction failed') . ' ' . $single_error->message_to_purchaser, 2, null, 'Cart', (int)$this->context->cart->id, true);
                }

            }

            $controller = Configuration::get('PS_ORDER_PROCESS_TYPE') ? 'order-opc.php' : 'order.php';
            $location = $this->context->link->getPageLink($controller, true) . (strpos($controller, '?') !== false ? '&' : '?') . 'step=3&conekta_error=1&message=' . $message . '#conekta_error';
            Tools::redirectLink($location);
        }
    }

    /**
     * Check settings requirements to make sure the CONEKTA's module will work
     *
     * @param string $mode This will control which settings are checked.  Valid values are 1 for 'live', 0 for 'test' or 'global' to use the global mode setting.  If a mode is not provided, then 'global' will be used by default
     * @return boolean Check result
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
     * Check technical requirements to make sure the Conekta module will work properly
     *
     * @return array of the Requirements
     */
    public function checkRequirements()
    {
        $tests = array(
            'result' => true
            );

        $tests['curl'] = array(
            'name' => $this->l('PHP cURL extension must be enabled on your server') ,
            'result' => (integer) function_exists('curl_init')
            );

        if (Configuration::get('CONEKTA_MODE')) {
            $tests['ssl'] = array(
                'name' => $this->l('SSL must be enabled on your store (before entering Live mode)') ,
                'result' => (integer) Configuration::get('PS_SSL_ENABLED') || (!empty($_SERVER['HTTPS']) && Tools::strtolower($_SERVER['HTTPS']) != 'off')
                );
        }

        $tests['php52'] = array(
            'name' => $this->l('Your server must run PHP 5.2 or greater') ,
            'result' => (integer) version_compare(PHP_VERSION, '5.2.0', '>=')
            );

        $tests['configuration'] = array(
            'name' => $this->l('You must sign-up for CONEKTA and configure your account settings in the module') ,
            'result' => (integer) $this->checkSettings()
            );

        if (version_compare(_PS_VERSION_, '1.5', '<')) {
            $tests['backward'] = array(
                'name' => $this->l('You are using the backward compatibility module') ,
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
     * Display the admin interface of the CONEKTA module
     *
     * @return string HTML/JS Content
     */
    public function getContent()
    {
        // If 1.4 and no backward, then leave
        if (!$this->backward) {
            return false;
        }

        $this->smarty->assign("base_uri", __PS_BASE_URI__);
        $this->smarty->assign("conekta_mode", Configuration::get('CONEKTA_MODE'));

        if (version_compare(_PS_VERSION_, '1.5', '>')) {
            $this->context->controller->addJQueryPlugin('fancybox');
            $this->smarty->assign("fancy_box", false);
        } else {
            $this->smarty->assign("fancy_box", true);
        }

        $url = Tools::getValue('conekta_webhook');

        if (empty($url)) {
            $url = _PS_BASE_URL_ . __PS_BASE_URI__ . "modules/conektaprestashop/notification.php";
        }

        $submitConfigEvent = (boolean) Tools::isSubmit('SubmitConekta');

        if ($submitConfigEvent) {
            $configuration_values = array(
                'CONEKTA_MODE' => Tools::getValue('conekta_mode') ,
                'CONEKTA_PUBLIC_KEY_TEST' => rtrim(Tools::getValue('conekta_public_key_test')) ,
                'CONEKTA_PUBLIC_KEY_LIVE' => rtrim(Tools::getValue('conekta_public_key_live')) ,
                'CONEKTA_PRIVATE_KEY_TEST' => rtrim(Tools::getValue('conekta_private_key_test')) ,
                'CONEKTA_PRIVATE_KEY_LIVE' => rtrim(Tools::getValue('conekta_private_key_live')) ,
                'CONEKTA_CARDS' => rtrim(Tools::getValue('conekta_cards')) ,
                'CONEKTA_MSI' => rtrim(Tools::getValue('conekta_msi')) ,
                'CONEKTA_CASH' => rtrim(Tools::getValue('conekta_cash')) ,
                'CONEKTA_BANORTE' => rtrim(Tools::getValue('conekta_banorte')) ,
                'CONEKTA_SPEI' => rtrim(Tools::getValue('conekta_spei'))
                );

            foreach ($configuration_values as $configuration_key => $configuration_value) {
                Configuration::updateValue($configuration_key, $configuration_value);
            }

            $this->_createWebhook();
            
            $webhook_message = Configuration::get('CONEKTA_WEBHOOK_ERROR_MESSAGE');
            
            if (empty($webhook_message)) {
                $webhook_message = false;
            }

            $this->smarty->assign("error_webhook_message", Configuration::get('CONEKTA_WEBHOOK_ERROR_MESSAGE'));
        } else {
            $this->smarty->assign("error_webhook_message", false);
        }

        $this->smarty->assign("is_submit_config", $submitConfigEvent);

        $requirements = $this->checkRequirements();

        $this->smarty->assign("_path", $this->_path);
        $this->smarty->assign("requirements", $requirements);
        $this->smarty->assign("config_check", $requirements['result']);

        if ($requirements['result']) {
            $this->smarty->assign("msg_show", $this->l('All the checks were successfully performed. You can now start using your module.'));
        } else {
            $this->smarty->assign("msg_show", $this->l('Please resolve the following errors:'));
        }

        if (!$this->backward) {
            return $this->fetchTemplate("content.old.tpl");
        }

        $this->smarty->assign("request_uri", Tools::safeOutput($_SERVER['REQUEST_URI']));

        $this->smarty->assign("conekta_cards", Configuration::get('CONEKTA_CARDS'));
        $this->smarty->assign("conekta_msi", Configuration::get('CONEKTA_MSI'));
        $this->smarty->assign("conekta_cash", Configuration::get('CONEKTA_CASH'));
        $this->smarty->assign("conekta_banorte", Configuration::get('CONEKTA_BANORTE'));
        $this->smarty->assign("conekta_spei", Configuration::get('CONEKTA_SPEI'));

        $this->smarty->assign("conekta_public_key_test", Configuration::get('CONEKTA_PUBLIC_KEY_TEST'));
        $this->smarty->assign("conekta_private_key_test", Configuration::get('CONEKTA_PRIVATE_KEY_TEST'));
        $this->smarty->assign("conekta_public_key_live", Configuration::get('CONEKTA_PUBLIC_KEY_LIVE'));
        $this->smarty->assign("conekta_private_key_live", Configuration::get('CONEKTA_PRIVATE_KEY_LIVE'));


        $this->smarty->assign("url", $url);
        return $this->fetchTemplate("content.tpl");
    }

    public function fetchTemplate($name)
    {
        if (version_compare(_PS_VERSION_, '1.4', '<')) {
            $this->context->smarty->currentTemplate = $name;
        } else {
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
        }

        return $this->display(__FILE__, $name);
    }

    public function pre($data)
    {
        print '<pre>' . print_r($data, true) . '</pre>';
    }

    private function _createWebhook()
    {
        require_once(dirname(__FILE__) . '/lib/conekta-php/lib/Conekta.php');

        \Conekta\Conekta:::setApiKey(Configuration::get('CONEKTA_MODE') ? Configuration::get('CONEKTA_PRIVATE_KEY_LIVE') : Configuration::get('CONEKTA_PRIVATE_KEY_TEST'));
        \Conekta\Conekta::setPlugin("Prestashop");
        \Conekta\Conekta::setApiVersion("1.1.0");
        \Conekta\Conekta::setLocale('en');

        $events = array(
            "events" => array(
                "charge.paid"
                )
            );

        // Reset error message

        Configuration::deleteByName('CONEKTA_WEBHOOK_ERROR_MESSAGE');

        // Obtain user input

        $url = Tools::safeOutput(Tools::getValue('conekta_webhook'));

        // Obtain stored value

        $config_url = Tools::safeOutput(Configuration::get('CONEKTA_WEBHOOK'));
        $is_valid_url = !empty($url) && !filter_var($url, FILTER_VALIDATE_URL) === false;
        $failed_attempts = (integer) Configuration::get('CONEKTA_WEBHOOK_FAILED_ATTEMPTS');

        // If input is valid, has not been stored and has not failed more than 5 times

        if ($is_valid_url && ($config_url != $url) && ($failed_attempts < 5 && $url != Configuration::get('CONEKTA_WEBHOOK_FAILED_URL'))) {
            try {
                $different = true;
                $webhooks = \Conekta\Webhook::where();

                foreach ($webhooks as $webhook) {
                    if (strpos($webhook->webhook_url, $url) !== false) {
                        $different = false;
                    }
                }

                if ($different) {
                    if (Configuration::get('CONEKTA_MODE')) {
                        $mode = array(
                            "production_enabled" => 1
                            );
                    } else {
                        $mode = array(
                            "development_enabled" => 1
                            );
                    }

                    $webhook = \Conekta\Webhook::create(array_merge(array( // TODO revisar que sigan siendo los mismos parámetros para la creación
                        "url" => $url
                        ), $mode, $events));
                    Configuration::updateValue('CONEKTA_WEBHOOK', $url);

                    // delete error variables

                    Configuration::deleteByName('CONEKTA_WEBHOOK_FAILED_ATTEMPTS');
                    Configuration::deleteByName('CONEKTA_WEBHOOK_FAILED_URL');
                    Configuration::deleteByName('CONEKTA_WEBHOOK_ERROR_MESSAGE');
                } else {
                    Configuration::updateValue('CONEKTA_WEBHOOK_ERROR_MESSAGE', "Webhook was already register in Conekta!");
                }
            } catch (\Conekta\ErrorList $e)) {
                foreach ($e->$details as $single_error) {
                    Configuration::updateValue('CONEKTA_WEBHOOK_ERROR_MESSAGE', $single_error->message_to_purchaser);
                }
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
}