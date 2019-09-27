<?php
/**
 * 2007-2017 PrestaShop
 *
 * NOTICE OF LICENSE
 * Title   : Conekta Card Payment Gateway for Prestashop
 * Author  : Conekta.io
 * URL     : https://www.conekta.io/es/docs/plugins/prestashop.
 *
 *  @author Conekta <support@conekta.io>
 *  @copyright 2012-2017 Conekta
 *  @license http://opensourec.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 *  @version v1.1.0
 */

use PrestaShop\PrestaShop\Core\Payment\PaymentOption;

require_once(dirname(__FILE__) . '/model/Config.php');
require_once(dirname(__FILE__) . '/model/Database.php');
require_once(dirname(__FILE__) . '/lib/conekta-php/lib/Conekta.php');

if (!defined('_PS_VERSION_')) {
    exit;
}

class ConektaPaymentsPrestashop extends PaymentModule
{
    protected $html = '';
    protected $postErrors = array();

    public $details;
    public $owner;
    public $address;
    public $extra_mail_vars;

    public function __construct()
    {
        $this->name                   = 'conektapaymentsprestashop';
        $this->tab                    = 'payments_gateways';
        $this->version                = '1.1.0';
        $this->ps_versions_compliancy = array(
            'min' => '1.7',
            'max' => _PS_VERSION_
        );
        $this->author                 = 'Conekta';
        $this->module_key             = 'db59557d5fe73f63180043679985c8c4';
        $this->displayName            = $this->l('Conekta Prestashop');
        $this->description            = $this->l('Accept payments by Credit and Debit Card with Conekta (Visa, Mastercard, Amex)');
        $this->controllers            = array(
            'validation'
        );
        $this->is_eu_compatible       = 1;
        $this->currencies             = true;
        $this->currencies_mode        = 'checkbox';

        $config = Configuration::getMultiple(array(
            'PAYEE_NAME',
            'PAYEE_ADDRESS',
            'MODE',
            'WEB_HOOK',
            'PAYMENT_METHS_CARD',
            'PAYMENT_METHS_INSTALLMET',
            'PAYMENT_METHS_CASH',
            'PAYMENT_METHS_SPEI',
            'TEST_PRIVATE_KEY',
            'TEST_PUBLIC_KEY',
            'LIVE_PRIVATE_KEY',
            'LIVE_PUBLIC_KEY'
        ));

        if (isset($config['PAYEE_NAME'])) {
            $this->checkName = $config['PAYEE_NAME'];
        }
        if (isset($config['PAYEE_ADDRESS'])) {
            $this->address = $config['PAYEE_ADDRESS'];
        }

        if (isset($config['MODE'])) {
            $this->mode = $config['MODE'];
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

        $this->bootstrap = true;
        parent::__construct();

        if (!count(Currency::checkPaymentCurrencies($this->id))) {
            $this->warning = $this->l('No currency has been set for this module.');
        }
    }

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

        if (!parent::install() || !$this->createPendingCashState() || !$this->createPendingSpeiState() || !$this->registerHook('header') || !$this->registerHook('paymentOptions') || !$this->registerHook('paymentReturn') || !$this->registerHook('adminOrder') && Configuration::updateValue('PAYMENT_METHS_CARD', 1) && Configuration::updateValue('PAYMENT_METHS_INSTALLMET', 1) && Configuration::updateValue('PAYMENT_METHS_CASH', 1) && Configuration::updateValue('PAYMENT_METHS_SPEI', 1) && Configuration::updateValue('MODE', 0) || !Database::installDb()) {
            return false;
        }

        Configuration::updateValue('CONEKTA_PRESTASHOP_VERSION', $this->version);
        return true;
    }

    public function uninstall()
    {
        return parent::uninstall() && Configuration::deleteByName('CONEKTA_PRESTASHOP_VERSION') && Configuration::deleteByName('CONEKTA_MSI') && Configuration::deleteByName('CONEKTA_CARDS') && Configuration::deleteByName('PAYMENT_METHS_CASH') && Configuration::deleteByName('PAYMENT_METHS_SPEI') && Configuration::deleteByName('CONEKTA_PUBLIC_KEY_TEST') && Configuration::deleteByName('CONEKTA_PUBLIC_KEY_LIVE') && Configuration::deleteByName('CONEKTA_MODE') && Configuration::deleteByName('CONEKTA_PRIVATE_KEY_TEST') && Configuration::deleteByName('CONEKTA_PRIVATE_KEY_LIVE') && Configuration::deleteByName('CONEKTA_SIGNATURE_KEY_LIVE') && Configuration::deleteByName('CONEKTA_SIGNATURE_KEY_TEST') && Configuration::deleteByName('CONEKTA_PAYMENT_ORDER_STATUS') && Configuration::deleteByName('CONEKTA_WEBHOOK') && Configuration::deleteByName('CONEKTA_WEBHOOK_FAILED_ATTEMPTS') && Configuration::deleteByName('CONEKTA_WEBHOOK_ERROR_MESSAGE') && Configuration::deleteByName('CONEKTA_WEBHOOK_FAILED_URL') && Db::getInstance()->Execute('DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'conekta_transaction`');
    }

    public function hookPaymentReturn($params)
    {
        if ($params['order'] && Validate::isLoadedObject($params['order'])) {
            $id_order                    = (int) $params['order']->id;
            $conekta_transaction_details = Database::getOrderById($id_order);
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
                }
            } else {
                $this->smarty->assign('card', true);
                $this->smarty->assign('conekta_order', array(
                    'type' => 'card',
                    'reference' => isset($params['order']->reference) ? $params['order']->reference : '#' . sprintf('%06d', $params['order']->id),
                    'valid' => $params['order']->valid
                ));
            }
        }

        return $this->fetchTemplate('checkout-confirmation-all.tpl');
    }

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

    public function hookHeader()
    {
        if (Tools::getValue('controller') != 'order-opc' && (!($_SERVER['PHP_SELF'] == __PS_BASE_URI__ . 'order.php' || $_SERVER['PHP_SELF'] == __PS_BASE_URI__ . 'order-opc.php' || Tools::getValue('controller') == 'order' || Tools::getValue('controller') == 'orderopc' || Tools::getValue('step') == 3))) {
            return;
        }

        $this->context->controller->addCSS($this->_path . 'views/css/conekta-prestashop.css');

        if (Configuration::get('MODE')) {
            $this->smarty->assign("api_key", addslashes(Configuration::get('LIVE_PUBLIC_KEY')));
        } else {
            $this->smarty->assign("api_key", addslashes(Configuration::get('TEST_PUBLIC_KEY')));
        }

        $this->smarty->assign("path", $this->_path);

        return $this->fetchTemplate("hook-header.tpl");
    }

    public function hookAdminOrder($params)
    {
        $id_order = (int) $params['id_order'];
        $status   = $this->getTransactionStatus($id_order);

        return $status;
    }

    public function hookPaymentOptions($params)
    {
        if (!$this->active) {
            return;
        }

        if (!$this->checkCurrency($params['cart'])) {
            return;
        }

        $this->smarty->assign(array(
            'test_private_key' => Configuration::get('TEST_PRIVATE_KEY')
        ));

        $payment_options = array();

        if (Configuration::get('PAYMENT_METHS_SPEI')) {
            array_push($payment_options, $this->getSpeiPaymentOption());
        }

        if (Configuration::get('PAYMENT_METHS_CASH')) {
            array_push($payment_options, $this->getOxxoPaymentOption());
        }

        if (Configuration::get('PAYMENT_METHS_CARD')) {
            array_push($payment_options, $this->getCardPaymentOption());
        }

        return $payment_options;
    }

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

    public function getSpeiPaymentOption()
    {
        $offlineOption = new PaymentOption();
        $offlineOption->setCallToActionText($this->l('Pago por medio de '))->setAction($this->context->link->getModuleLink($this->name, 'validation', array(
            'type' => 'spei'
        ), true))->setLogo(Media::getMediaPath(_PS_MODULE_DIR_ . $this->name . '/views/img/spei.png'));

        return $offlineOption;
    }

    public function getOxxoPaymentOption()
    {
        $offlineOption = new PaymentOption();
        $offlineOption->setCallToActionText($this->l('Pago en Efectivo con '))->setAction($this->context->link->getModuleLink($this->name, 'validation', array(
            'type' => 'cash'
        ), true))->setLogo(Media::getMediaPath(_PS_MODULE_DIR_ . $this->name . '/views/img/oxxo.png'));

        return $offlineOption;
    }

    public function getCardPaymentOption()
    {
        $embeddedOption = new PaymentOption();
        $embeddedOption->setModuleName($this->name)->setCallToActionText($this->l('Pago por medio de '))->setAction($this->context->link->getModuleLink($this->name, 'validation', array(), true))->setForm($this->generateCardPaymentForm())->setLogo(Media::getMediaPath(_PS_MODULE_DIR_ . $this->name . '/views/img/cards2.png'));

        return $embeddedOption;
    }

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
            Configuration::updateValue('TEST_PRIVATE_KEY', Tools::getValue('TEST_PRIVATE_KEY'));
            Configuration::updateValue('TEST_PUBLIC_KEY', Tools::getValue('TEST_PUBLIC_KEY'));
            Configuration::updateValue('LIVE_PRIVATE_KEY', Tools::getValue('LIVE_PRIVATE_KEY'));
            Configuration::updateValue('LIVE_PUBLIC_KEY', Tools::getValue('LIVE_PUBLIC_KEY'));
        }

        $this->html .= $this->displayConfirmation($this->trans('Settings updated', array(), 'Admin.Notifications.Success'));
    }

    private function displayCheck()
    {
        return $this->display(__FILE__, './views/templates/hook/infos.tpl');
    }

    public function getConfigFieldsValues()
    {
        return array(
            'PAYEE_NAME' => Tools::getValue('PAYEE_NAME', Configuration::get('PAYEE_NAME')),
            'PAYEE_ADDRESS' => Tools::getValue('PAYEE_ADDRESS', Configuration::get('PAYEE_ADDRESS')),
            'MODE' => Tools::getValue('MODE', Configuration::get('MODE')),
            'WEB_HOOK' => Tools::getValue('WEB_HOOK', Configuration::get('WEB_HOOK')),
            'PAYMENT_METHS_CARD' => Tools::getValue('PAYMENT_METHS_CARD', Configuration::get('PAYMENT_METHS_CARD')),
            'PAYMENT_METHS_INSTALLMET' => Tools::getValue('PAYMENT_METHS_INSTALLMET', Configuration::get('PAYMENT_METHS_INSTALLMET')),
            'PAYMENT_METHS_CASH' => Tools::getValue('PAYMENT_METHS_CASH', Configuration::get('PAYMENT_METHS_CASH')),
            'PAYMENT_METHS_BANORTE' => Tools::getValue('PAYMENT_METHS_BANORTE', Configuration::get('PAYMENT_METHS_BANORTE')),
            'PAYMENT_METHS_SPEI' => Tools::getValue('PAYMENT_METHS_SPEI', Configuration::get('PAYMENT_METHS_SPEI')),
            'TEST_PRIVATE_KEY' => Tools::getValue('TEST_PRIVATE_KEY', Configuration::get('TEST_PRIVATE_KEY')),
            'TEST_PUBLIC_KEY' => Tools::getValue('TEST_PUBLIC_KEY', Configuration::get('TEST_PUBLIC_KEY')),
            'LIVE_PRIVATE_KEY' => Tools::getValue('LIVE_PRIVATE_KEY', Configuration::get('LIVE_PRIVATE_KEY')),
            'LIVE_PUBLIC_KEY' => Tools::getValue('LIVE_PUBLIC_KEY', Configuration::get('LIVE_PUBLIC_KEY'))
        );
    }

    public function buildAdminContent()
    {
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
                            array(
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Production')
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Sandbox')
                            )
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
                                array(
                                    'id' => 'CARD',
                                    'name' => $this->l('Card'),
                                    'val' => 'card_payment_method'
                                ),
                                array(
                                    'id' => 'INSTALLMET',
                                    'name' => $this->l('Monthly Installents'),
                                    'val' => 'installment_payment_method'
                                ),
                                array(
                                    'id' => 'CASH',
                                    'name' => $this->l('Cash'),
                                    'val' => 'cash_payment_method'
                                ),
                                array(
                                    'id' => 'SPEI',
                                    'name' => $this->l('SPEI'),
                                    'val' => 'spei_payment_method'
                                )

                            ),
                            'id' => 'id',
                            'name' => 'name'
                        ),
                        'expand' => array(
                            'print_total' => 4,
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
                        'type' => 'text',
                        'label' => $this->trans('Test Private Key', array(), 'Modules.ConektaPaymentsPrestashop.Admin'),
                        'name' => 'TEST_PRIVATE_KEY',
                        'required' => true
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->trans('Test Public Key', array(), 'Modules.ConektaPaymentsPrestashop.Admin'),
                        'name' => 'TEST_PUBLIC_KEY',
                        'required' => true
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
                    )
                ),
                'submit' => array(
                    'title' => $this->trans('Save', array(), 'Admin.Actions')
                )
            )
        );

        return $fields_form;
    }

    public function renderForm()
    {
        $fields_form           = $this->buildAdminContent();
        $helper                = new HelperForm();
        $helper->show_toolbar  = false;
        $helper->id            = (int) Tools::getValue('id_carrier');
        $helper->identifier    = $this->identifier;
        $helper->submit_action = 'btnSubmit';
        $helper->currentIndex  = $this->context->link->getAdminLink('AdminModules', false) . '&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name;
        $helper->token         = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars      = array(
            'fields_value' => $this->getConfigFieldsValues()
        );

        $this->fields_form = array();

        return $helper->generateForm(array(
            $fields_form
        ));
    }

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
                'result' => (integer) Configuration::get('PS_SSL_ENABLED') || (!empty($_SERVER['HTTPS']) && Tools::strtolower($_SERVER['HTTPS']) != 'off')
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
                'CONEKTA_PUBLIC_KEY_LIVE' => rtrim(Tools::getValue('LIVE_PUBLIC_KEY')),
                'CONEKTA_PRIVATE_KEY_TEST' => rtrim(Tools::getValue('TEST_PRIVATE_KEY')),
                'CONEKTA_PRIVATE_KEY_LIVE' => rtrim(Tools::getValue('LIVE_PRIVATE_KEY')),
                'CONEKTA_CARDS' => rtrim(Tools::getValue('PAYMENT_METHS_CARD')),
                'CONEKTA_MSI' => rtrim(Tools::getValue('PAYMENT_METHS_INSTALLMET')),
                'PAYMENT_METHS_CASH' => rtrim(Tools::getValue('PAYMENT_METHS_CASH')),
                'PAYMENT_METHS_SPEI' => rtrim(Tools::getValue('PAYMENT_METHS_SPEI'))
            );

            foreach ($configuration_values as $configuration_key => $configuration_value) {
                //echo $configuration_key."\t=>   ".$configuration_value.'<br>';
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
                "order.paid"
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

                    \Conekta\Webhook::create(array_merge(array(
                        "url" => $url
                    ), $mode, $events));

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

    public function getJumps($total, $jumps)
    {
        if ($total >= 300 && $total < 600) {
            $jumps[0] = array(
                1,
                3
            );
        } elseif ($total >= 600 && $total < 900) {
            $jumps[0] = array(
                1,
                3,
                6
            );
        } elseif ($total >= 900 && $total < 1200) {
            $jumps[0] = array(
                1,
                3,
                6,
                9
            );
        } elseif ($total >= 1200) {
            $jumps[0] = array(
                1,
                3,
                6,
                9,
                12
            );
        }

        return $jumps;
    }

    protected function generateCardPaymentForm()
    {

        //value by default
        $msi   = 0;
        $jumps = array(
            1
        );

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

        $this->context->smarty->assign(array(
            'action' => $this->context->link->getModuleLink($this->name, 'validation', array(), true),
            'months' => $months,
            'years' => $years,
            'msi' => $msi,
            'msi_jumps' => $jumps[0],
            'test_private_key' => Configuration::get('TEST_PRIVATE_KEY')
        ));

        return $this->context->smarty->fetch('module:conektapaymentsprestashop/views/templates/front/payment_form.tpl');
    }

    public function processPayment($type, $token, $msi)
    {
        $key      = Configuration::get('CONEKTA_MODE') ? Configuration::get('CONEKTA_PRIVATE_KEY_LIVE') : Configuration::get('CONEKTA_PRIVATE_KEY_TEST');
        $iso_code = $this->context->language->iso_code;

        \Conekta\Conekta::setApiKey($key);
        \Conekta\Conekta::setPlugin("Prestashop 1.7");
        \Conekta\Conekta::setApiVersion("2.0.0");
        \Conekta\Conekta::setPluginVersion($this->version);
        \Conekta\Conekta::setLocale($iso_code);

        $cart             = $this->context->cart;
        $customer         = new Customer((int) $cart->id_customer);
        $address_delivery = new Address((int) $cart->id_address_delivery);
        $state            = State::getNameById($address_delivery->id_state);
        $country          = Country::getIsoById($address_delivery->id_country);
        $carrier          = new Carrier((int) $cart->id_carrier);
        $shp_price        = (int) number_format(($cart->getTotalShippingCost() * 100), 0);
        $shp_carrier      = "other";
        $shp_service      = "other";
        $discounts        = $cart->getCartRules();
        $items            = $cart->getProducts();

        if (isset($carrier)) {
            $shp_carrier = $carrier->name;
            $shp_service = implode(",", $carrier->delay);
        }

        $order_details                     = array();
        $order_details['currency']         = $this->context->currency->iso_code;
        $order_details['line_items']       = Config::getLineItems($items);
        $order_details['tax_lines']        = Config::getTaxLines($items);
        $order_details['discount_lines']   = Config::getDiscountLines($discounts);
        $order_details['customer_info']    = Config::getCustomerInfo($customer, $address_delivery);
        $order_details['shipping_lines']   = Config::getShippingLines($shp_service, $shp_carrier, $shp_price);
        $order_details['shipping_contact'] = Config::getShippingContact($customer, $address_delivery, $state, $country);
        $order_details['metadata']         = array(
            "reference_id" => $this->context->cart->id
        );

        $amount = 0;

        foreach ($order_details['line_items'] as $item) {
            $amount = $amount + ($item['quantity'] * $item['unit_price']);
        }

        if (isset($order_details['tax_lines'])) {
            foreach ($order_details['tax_lines'] as $tax) {
                $amount = $amount + $tax['amount'];
            }
        }

        if (isset($order_details['shipping_lines'])) {
            foreach ($order_details['shipping_lines'] as $shipping) {
                $amount = $amount + $shipping['amount'];
            }
        }

        if (isset($order_details['discount_lines'])) {
            foreach ($order_details['discount_lines'] as $discount) {
                $amount = $amount - $discount['amount'];
            }
        }

        try {
            $order = \Conekta\Order::create($order_details);

            if ($type == "cash") {
                $charge_params = array(
                    'payment_method' => array(
                        'type' => 'oxxo_cash'
                    ),
                    'amount' => $amount
                );

                $charge_response           = $order->createCharge($charge_params);
                $barcode_url               = $charge_response->payment_method->reference;
                $reference                 = $charge_response->payment_method->reference;
                $order_status              = (int) Configuration::get('waiting_cash_payment');
                $message                   = $this->l('Conekta Transaction Details:') . "\n\n" . $this->l('Reference:') . ' ' . $reference . "\n" . $this->l('Barcode:') . ' ' . $barcode_url . "\n" . $this->l('Amount:') . ' ' . ($charge_response->amount * 0.01) . "\n" . $this->l('Processed on:') . ' ' . strftime('%Y-%m-%d %H:%M:%S', $charge_response->created_at) . "\n" . $this->l('Currency:') . ' ' . Tools::strtoupper($charge_response->currency) . "\n" . $this->l('Mode:') . ' ' . ($charge_response->livemode == 'true' ? $this->l('Live') : $this->l('Test')) . "\n";
                $checkout                  = Module::getInstanceByName('conektapaymentsprestashop');
                $checkout->extra_mail_vars = array(
                    '{barcode}' => (string) $reference
                );
            } elseif ($type == "spei") {
                $charge_params = array(
                    'payment_method' => array(
                        'type' => 'spei'
                    ),
                    'amount' => $amount
                );

                $charge_response = $order->createCharge($charge_params);
                $reference       = $charge_response->payment_method->clabe;
                $order_status    = (int) Configuration::get('waiting_spei_payment');
                $message         = $this->l('Conekta Transaction Details:') . "\n\n" . $this->l('Reference:') . ' ' . $reference . "\n" . $this->l('Amount:') . ' ' . ($charge_response->amount * 0.01) . "\n" . $this->l('Processed on:') . ' ' . strftime('%Y-%m-%d %H:%M:%S', $charge_response->created_at) . "\n" . $this->l('Currency:') . ' ' . Tools::strtoupper($charge_response->currency) . "\n" . $this->l('Mode:') . ' ' . ($charge_response->livemode == 'true' ? $this->l('Live') : $this->l('Test')) . "\n";
                $checkout        = Module::getInstanceByName('conektapaymentsprestashop');

                $checkout->extra_mail_vars = array(
                    '{receiving_account_number}' => (string) $reference
                );
            } else {
                $charge_params = array(
                    'payment_method' => array(
                        'type' => 'card',
                        'token_id' => $token
                    ),
                    'amount' => $amount
                );

                $monthly_installments = (int) $msi;

                if ($monthly_installments > 1) {
                    $charge_params['payment_method'] = array_merge($charge_params['payment_method'], array(
                        'monthly_installments' => $monthly_installments
                    ));
                }

                $charge_response = $order->createCharge($charge_params);
                $order_status    = (int) Configuration::get('PS_OS_PAYMENT');
                $message         = $this->l('Conekta Transaction Details:') . "\n\n" . $this->l('Amount:') . ' ' . ($charge_response->amount * 0.01) . "\n" . $this->l('Status:') . ' ' . ($charge_response->status == 'paid' ? $this->l('Paid') : $this->l('Unpaid')) . "\n" . $this->l('Processed on:') . ' ' . strftime('%Y-%m-%d %H:%M:%S', $charge_response->created_at) . "\n" . $this->l('Currency:') . ' ' . Tools::strtoupper($charge_response->currency) . "\n" . $this->l('Mode:') . ' ' . ($charge_response->livemode == 'true' ? $this->l('Live') : $this->l('Test')) . "\n";
            }


            $this->validateOrder((int) $this->context->cart->id, (int) $order_status, $order->amount / 100, $this->displayName, $message, array(), null, false, $this->context->customer->secure_key);

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

            if (isset($charge_response->id) && $type == "cash") {
                Database::insertOxxoPayment($order, $charge_response, $reference, $this->currentOrder, $this->context->cart->id);
            } elseif (isset($charge_response->id) && $type == "spei") {
                Database::insertSpeiPayment($order, $charge_response, $reference, $this->currentOrder, $this->context->cart->id);
            } elseif (isset($charge_response->id)) {
                Database::insertCardPayment($order, $charge_response, $this->currentOrder, $this->context->cart->id);
            }

            $redirect = $this->context->link->getPageLink('order-confirmation', true, null, array(
                'id_order' => (int) $this->currentOrder,
                'id_cart' => (int) $this->context->cart->id,
                'key' => $this->context->customer->secure_key,
                'id_module' => (int) $this->id
            ));
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

    public function getTransactionStatus($order_id)
    {
        if (Database::getOrderConekta($order_id) == $this->name) {
            $conekta_transaction_details = Database::getConektaTransaction($order_id);

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
}
