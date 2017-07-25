<?php
/*
* 2007-2015 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2015 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

use PrestaShop\PrestaShop\Core\Payment\PaymentOption;
require_once(dirname(__FILE__) . '/model/Config.php');
require_once(dirname(__FILE__) . '/model/Database.php');
require_once(dirname(__FILE__) . '/lib/conekta-php/lib/Conekta.php');

if (!defined('_PS_VERSION_')) {
    exit;
}

class Conekta_Prestashop extends PaymentModule
{
    protected $_html = '';
    protected $_postErrors = array();

    public $details;
    public $owner;
    public $address;
    public $extra_mail_vars;

    public function __construct()
    {
        $this->name = 'conekta_prestashop';
        $this->tab = 'payments_gateways';
        $this->version = '1.0.0';
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
        $this->author = 'Conekta';
        $this->controllers = array('validation');
        $this->is_eu_compatible = 1;

        $this->currencies = true;
        $this->currencies_mode = 'checkbox';
        
        
        $config = Configuration::getMultiple(array('CHEQUE_NAME', 
          'CHEQUE_ADDRESS',
          'MODE',
          'WEB_HOOK',
          'PAYMENT_METHS_CARD',
          'PAYMENT_METHS_INSTALLMET',
          'PAYMENT_METHS_CASH',
          'PAYMENT_METHS_BANORTE',
          'PAYMENT_METHS_SPEI',
          'TEST_PRIVATE_KEY',
          'TEST_PUBLIC_KEY',
          'LIVE_PRIVATE_KEY',
          'LIVE_PUBLIC_KEY'));
        if (isset($config['CHEQUE_NAME'])) {
            $this->checkName = $config['CHEQUE_NAME'];
        }
        if (isset($config['CHEQUE_ADDRESS'])) {
            $this->address = $config['CHEQUE_ADDRESS'];
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

        if (isset($config['PAYMENT_METHS_BANORTE'])) {
            $this->payment_method_banorte = $config['PAYMENT_METHS_BANORTE'];
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

        $this->displayName = $this->l('Conekta Prestashop');
        $this->description = $this->l('This is a fucking awsome plugin');

        if (!count(Currency::checkPaymentCurrencies($this->id))) {
            $this->warning = $this->l('No currency has been set for this module.');
        }
    }

    public function install()
    {
        $updateConfig = array(
            'PS_OS_CHEQUE'      => 1,
            'PS_OS_PAYMENT'     => 2,
            'PS_OS_PREPARATION' => 3,
            'PS_OS_SHIPPING'    => 4,
            'PS_OS_DELIVERED'   => 5,
            'PS_OS_CANCELED'    => 6,
            'PS_OS_REFUND'      => 7,
            'PS_OS_ERROR'       => 8,
            'PS_OS_OUTOFSTOCK'  => 9,
            'PS_OS_BANKWIRE'    => 10,
            'PS_OS_PAYPAL'      => 11,
            'PS_OS_WS_PAYMENT'  => 12
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

     if (!parent::install() || 
            !$this->registerHook('paymentOptions') || 
                !$this->registerHook('paymentReturn') || 
                    !Database::installDb() ||
                        !$this->registerHook('adminOrder')) {
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
        return parent::uninstall() && 
        Db::getInstance()->Execute('DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'conekta_transaction`');
    }

    public function hookPaymentReturn($params)
    {
        if ($params['objOrder'] && Validate::isLoadedObject($params['objOrder'])) {
            $id_order = (int) $params['order']->id;
            $conekta_transaction_details = Db::getInstance()->getRow('SELECT * FROM ' . _DB_PREFIX_ 
                . 'conekta_transaction WHERE id_order = ' . pSQL((int) $id_order) . ';');
            if ($conekta_transaction_details['barcode']) {
                $this->smarty->assign('cash', true);
                $this->smarty->assign('conekta_order', array(
                    'barcode'     => $conekta_transaction_details['reference'],
                    'type'        => 'cash',
                    'barcode_url' => $conekta_transaction_details['barcode'],
                    'amount'      => $conekta_transaction_details['amount'],
                    'currency'    => $conekta_transaction_details['currency']
                    ));
            }elseif (isset($conekta_transaction_details['reference']) && !empty($conekta_transaction_details['reference'])) {
                if (strpos($conekta_transaction_details['reference'], '6461801118') !== false) {
                    $this->smarty->assign('spei', true);
                    $this->smarty->assign('conekta_order', array(
                        'receiving_account_number' => $conekta_transaction_details['reference'],
                        'amount'                   => $conekta_transaction_details['amount'],
                        'currency'                 => $conekta_transaction_details['currency']
                        ));
                }
            } else {
                $this->smarty->assign('card', true);
                $this->smarty->assign('conekta_order', array(
                    'type'      => 'card',
                    'reference' => isset($params['order']->reference) ? $params['order']->reference : '#' . sprintf('%06d', $params['order']->id),
                    'valid'     => $params['order']->valid
                    ));
            }
        }
        return $this->fetchTemplate('checkout-confirmation-all.tpl');
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
        $state->module_name = 'conekta_prestashop';
        $templ = array();
        
        foreach ($languages as $lang) {
            $templ[$lang['id_lang']] = 'conekta_prestashop';
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

    private function _createPendingSpeiState()
    {
        $state = new OrderState();
        $languages = Language::getLanguages();
        $names = array();
        
        foreach ($languages as $lang) {
            $names[$lang['id_lang']] = 'En espera de pago';
        }

        $state->name        = $names;
        $state->color       = '#4169E1';
        $state->send_email  = true;
        $state->module_name = 'conekta_prestashop';
        $templ              = array();
        
        foreach ($languages as $lang) {
            $templ[$lang['id_lang']] = 'conekta_prestashop';
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

    /**
     * Load Javascripts and CSS related to the CONEKTA'S module
     * @return string Content
     */
    public function hookHeader()
    {
        if (Tools::getValue('controller') != 'order-opc' 
            && (!($_SERVER['PHP_SELF'] == __PS_BASE_URI__ . 'order.php' 
                || $_SERVER['PHP_SELF'] == __PS_BASE_URI__ . 'order-opc.php' 
                || Tools::getValue('controller') == 'order' 
                || Tools::getValue('controller') == 'orderopc' 
                || Tools::getValue('step') == 3))) {
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

    public function hookAdminOrder($params)
    {
        $id_order = intval($params['id_order']);
        $status = $this->getTransactionStatus($id_order);

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
        
       $this->smarty->assign( [
            'test_private_key' => Configuration::get('TEST_PRIVATE_KEY'),
        ]);

        $payment_options = [
          $this->getCardPaymentOption(),
          $this->getOxxoPaymentOption(),
          $this->getSpeiPaymentOption(),
        ];

        return $payment_options;
    }

    public function checkCurrency($cart)
    {
        $currency_order = new Currency($cart->id_currency);
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
        $offlineOption->setCallToActionText($this->l('Pago por medio de Spei'))
                      ->setAction($this->context->link->getModuleLink($this->name, 'validation', array('type'=>'spei'), true))
                      ->setAdditionalInformation($this->context->smarty->fetch('module:conekta_prestashop/views/templates/front/spei.tpl'))
                      ->setLogo(Media::getMediaPath(_PS_MODULE_DIR_.$this->name.'/payment.jpg'));

        return $offlineOption;
    }

    public function getOxxoPaymentOption()
    {
        $offlineOption = new PaymentOption();
        $offlineOption->setCallToActionText($this->l('Pago en Efectivo con OxxoPay'))
                      ->setAction($this->context->link->getModuleLink($this->name, 'validation', array('type'=>'cash'), true))
                      ->setAdditionalInformation($this->context->smarty->fetch('module:conekta_prestashop/views/templates/front/payment_infos.tpl'))
                      ->setLogo(Media::getMediaPath(_PS_MODULE_DIR_.$this->name.'/payment.jpg'));

        return $offlineOption;
    }

    public function getCardPaymentOption() 
    {
        $embeddedOption = new PaymentOption();
        $embeddedOption->setModuleName($this->name)
                       ->setCallToActionText($this->l($this->name))
                       ->setAction($this->context->link->getModuleLink($this->name, 'validation', array(), true))
                       ->setForm($this->generateCardPaymentForm())
                       ->setAdditionalInformation($this->context->smarty->fetch('module:conekta_prestashop/views/templates/front/payment_infos.tpl'))
                       ->setLogo(Media::getMediaPath(_PS_MODULE_DIR_.$this->name.'/payment.jpg'));

        return $embeddedOption;
    }

    private function _postValidation()
    {
        if (Tools::isSubmit('btnSubmit')) {
            if (!Tools::getValue('CHEQUE_NAME')) {
                $this->_postErrors[] = $this->trans('The "Payee" field is required.', array(),'Modules.Conekta_Prestashop.Admin');
            } elseif (!Tools::getValue('CHEQUE_ADDRESS')) {
                $this->_postErrors[] = $this->trans('The "Address" field is required.', array(), 'Modules.Conekta_Prestashop.Admin');
            }

            if (!Tools::getValue('WEB_HOOK')){
              $this->_postErrors[] = $this->trans('The "Web Hook" field is required.', array(),'Modules.Conekta_Prestashop.Admin');
            }

            if (!Tools::getValue('TEST_PRIVATE_KEY')){
              $this->_postErrors[] = $this->trans('The "Test Private Key" field is required.', array(),'Modules.Conekta_Prestashop.Admin');
            }

            if (!Tools::getValue('TEST_PUBLIC_KEY')){
              $this->_postErrors[] = $this->trans('The "Test Public Key" field is required.', array(),'Modules.Conekta_Prestashop.Admin');
            }
            
            if (Tools::getValue('LIVE_PRIVATE_KEY') && !Tools::getValue('LIVE_PUBLIC_KEY')){
              $this->_postErrors[] = $this->trans('The "Live Public Key" field is required.', array(),'Modules.Conekta_Prestashop.Admin');
            }
 
             if (!Tools::getValue('LIVE_PRIVATE_KEY') && Tools::getValue('LIVE_PUBLIC_KEY')){
              $this->_postErrors[] = $this->trans('The "Live Private Key" field is required.', array(),'Modules.Conekta_Prestashop.Admin');
            }
          
        }
    }
    private function _postProcess()
    {
        if (Tools::isSubmit('btnSubmit')) {
            Configuration::updateValue('CHEQUE_NAME', Tools::getValue('CHEQUE_NAME'));
            Configuration::updateValue('CHEQUE_ADDRESS', Tools::getValue('CHEQUE_ADDRESS'));
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

        $this->_html .= $this->displayConfirmation($this->trans('Settings updated', array(), 'Admin.Notifications.Success'));
    }


    private function _displayCheck()
    {
        return $this->display(__FILE__, './views/templates/hook/infos.tpl');
    }
    public function getConfigFieldsValues()
    {
        return array(
            'CHEQUE_NAME'               => Tools::getValue('CHEQUE_NAME', Configuration::get('CHEQUE_NAME')),
            'CHEQUE_ADDRESS'            => Tools::getValue('CHEQUE_ADDRESS', Configuration::get('CHEQUE_ADDRESS')),
            'MODE'                      => Tools::getValue('MODE', Configuration::get('MODE')),
            'WEB_HOOK'                  => Tools::getValue('WEB_HOOK', Configuration::get('WEB_HOOK')),
            'PAYMENT_METHS_CARD'        => Tools::getValue('PAYMENT_METHS_CARD', Configuration::get('PAYMENT_METHS_CARD')),
            'PAYMENT_METHS_INSTALLMET'  => Tools::getValue('PAYMENT_METHS_INSTALLMET', Configuration::get('PAYMENT_METHS_INSTALLMET')),
            'PAYMENT_METHS_CASH'        => Tools::getValue('PAYMENT_METHS_CASH', Configuration::get('PAYMENT_METHS_CASH')),
            'PAYMENT_METHS_BANORTE'     => Tools::getValue('PAYMENT_METHS_BANORTE', Configuration::get('PAYMENT_METHS_BANORTE')),
            'PAYMENT_METHS_SPEI'        => Tools::getValue('PAYMENT_METHS_SPEI', Configuration::get('PAYMENT_METHS_SPEI')),
            'TEST_PRIVATE_KEY'          => Tools::getValue('TEST_PRIVATE_KEY', Configuration::get('TEST_PRIVATE_KEY')),
            'TEST_PUBLIC_KEY'           => Tools::getValue('TEST_PUBLIC_KEY', Configuration::get('TEST_PUBLIC_KEY')),
            'LIVE_PRIVATE_KEY'          => Tools::getValue('LIVE_PRIVATE_KEY', Configuration::get('LIVE_PRIVATE_KEY')),
            'LIVE_PUBLIC_KEY'           => Tools::getValue('LIVE_PUBLIC_KEY', Configuration::get('LIVE_PUBLIC_KEY')),
        );
    }


    public function buildAdminContent()
    {
        $fields_form = array(
            'form' => array(
                'legend' => array(
                  'title' => $this->trans('Contact details', array(), 'Modules.Conekta_Prestashop.Admin'),
                  'icon' => 'icon-envelope'
                ),
                'input' => array(
                    array(
                        'type' => 'text',
                        'label' => $this->trans('Payee (name)', array(), 'Modules.Conekta_Prestashop.Admin'),
                        'name' => 'CHEQUE_NAME',
                        'required' => true
                    ),
                    array(
                        'type' => 'textarea',
                        'label' => $this->trans('Address', array(), 'Modules.Conekta_Prestashop.Admin'),
                        'desc' => $this->trans('Address where the check should be sent to.', array(), 'Modules.Conekta_Prestashop.Admin'),
                        'name' => 'CHEQUE_ADDRESS',
                        'required' => true
                      ),
                      array(
                          'type'      => 'radio',                               // This is an <input type="checkbox"> tag.
                          'label'     => $this->l('Mode'),        // The <label> for this <input> tag.
                          'name'      => 'MODE',                              // The content of the 'id' attribute of the <input> tag.
                          'required'  => true,                                  // If set to true, this option must be set.
                          'class'     => 't',                                   // The content of the 'class' attribute of the <label> tag for the <input> tag.
                          'is_bool'   => true,                                  // If set to true, this means you want to display a yes/no or true/false option.
                                                                                // The CSS styling will therefore use green mark for the option value '1', and a red mark for value '2'.
                                                                                // If set to false, this means there can be more than two radio buttons,
                                                                                // and the option label text will be displayed instead of marks.
                          'values'    => array(                                 // $values contains the data itself.
                            array(
                              'id'    => 'active_on',                           // The content of the 'id' attribute of the <input> tag, and of the 'for' attribute for the <label> tag.
                              'value' => 1,                                     // The content of the 'value' attribute of the <input> tag.
                              'label' => $this->l('Production')                    // The <label> for this radio button.
                            ),
                            array(
                              'id'    => 'active_off',
                              'value' => 0,
                              'label' => $this->l('Sandbox')
                            )
                          ),
                        ),
                     array(
                        'type' => 'text',
                        'label' => $this->trans('Webhook', array(), 'Modules.Conekta_Prestashop.Admin'),
                        'name' => 'WEB_HOOK',
                        'required' => true
                      ),
                      array(
                        'type'    => 'checkbox',                   // This is an <input type="checkbox"> tag.
                        'label'   => $this->l('Payment Method'),          // The <label> for this <input> tag.
                        'desc'    => $this->l('Choose options.'),  // A help text, displayed right next to the <input> tag.
                        'name'    => 'PAYMENT_METHS',                    // The content of the 'id' attribute of the <input> tag.
                        'values'  => array(
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
                                'id' => 'BANORTE',
                                'name' => $this->l('Banorte'),
                                'val' => 'banorte_payment_method'
                            ),
                           array(
                                'id' => 'SPEI',
                                'name' => $this->l('SPEI'),
                                'val' => 'spei_payment_method'
                            ),

                        ),
                          //'query' => $options,                     // $options contains the data itself.
                          'id'    => 'id',                  // The value of the 'id' key must be the same as the key
                                                                   // for the 'value' attribute of the <option> tag in each $options sub-array.
                          'name'  => 'name'                        // The value of the 'name' key must be the same as the key
                        ),                                           // for the text content of the <option> tag in each $options sub-array.
                        'expand' => array(                      // 1.6-specific: you can hide the checkboxes when there are too many.
                                                                   // A button appears with the number of options it hides.
                          ['print_total'] => count($options),
                          'default' => 'show',
                          'show' => array('text' => $this->l('show'), 'icon' => 'plus-sign-alt'),
                          'hide' => array('text' => $this->l('hide'), 'icon' => 'minus-sign-alt')
                        ),
                      ),
                      array(
                        'type' => 'text',
                        'label' => $this->trans('Test Private Key', array(), 'Modules.Conekta_Prestashop.Admin'),
                        'name' => 'TEST_PRIVATE_KEY',
                        'required' => true
                      ),
                       array(
                        'type' => 'text',
                        'label' => $this->trans('Test Public Key', array(), 'Modules.Conekta_Prestashop.Admin'),
                        'name' => 'TEST_PUBLIC_KEY',
                        'required' => true
                      ),
                       array(
                        'type' => 'password',
                        'label' => $this->trans('Live Private Key', array(), 'Modules.Conekta_Prestashop.Admin'),
                        'name' => 'LIVE_PRIVATE_KEY',
                        'required' => true
                      ),
                       array(
                        'type' => 'password',
                        'label' => $this->trans('Live Public Key', array(), 'Modules.Conekta_Prestashop.Admin'),
                        'name' => 'LIVE_PUBLIC_KEY',
                        'required' => true
                      ),
            ),
                'submit' => array(
                    'title' => $this->trans('Save', array(), 'Admin.Actions'),
                )
            ),
          );
      return $fields_form; 
    }

    public function renderForm()
    {
      $fields_form  = $this->buildAdminContent();
      $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->id = (int)Tools::getValue('id_carrier');
        $helper->identifier = $this->identifier;
        $helper->submit_action = 'btnSubmit';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFieldsValues(),
        );

        $this->fields_form = array();

        return $helper->generateForm(array($fields_form));
    }

    public function getContent()
    {
        $this->_html = '';

        if (Tools::isSubmit('btnSubmit')) {
             $this->_postValidation();
             if (!count($this->_postErrors)) {
                 $this->_postProcess();
             } else {
                 foreach ($this->_postErrors as $err) {
                     $this->_html .= $this->displayError($err);
                 }
             }
         }

         $this->_html .= $this->_displayCheck();
         $this->_html .= $this->renderForm();

         return $this->_html;
    }

    protected function generateCardPaymentForm()
    {
        $months = [];
        for ($i = 1; $i <= 12; $i++) {
            $months[] = sprintf("%02d", $i);
        }

        $years = [];
        for ($i = 0; $i <= 10; $i++) {
            $years[] = date('Y', strtotime('+'.$i.' years'));
        }

        $this->context->smarty->assign([
            'action' => $this->context->link->getModuleLink($this->name, 'validation', array(), true),
            'months' => $months,
            'years' => $years,
            'test_private_key' => Configuration::get('TEST_PRIVATE_KEY')
        ]);

        return $this->context->smarty->fetch('module:conekta_prestashop/views/templates/front/payment_form.tpl');
    }

    public function processPayment($type)
    {
        
        \Conekta\Conekta::setApiKey('key_SN2vakDK6CrWATiRWCyoZw');
        \Conekta\Conekta::setPlugin('Prestashop');
        \Conekta\Conekta::setApiVersion('2.0.0');

        $cart             = $this->context->cart;
        $customer         = new Customer((int) $cart->id_customer);
        $address_delivery = new Address((int) $cart->id_address_delivery);
        $address_fiscal   = new Address((int) $cart->id_address_invoice);
        $state            = State::getNameById($address_delivery->id_state);
        $country          = Country::getIsoById($address_delivery->id_country);

        // get shipping info
        $carrier          = new Carrier((int)$cart->id_carrier);
        $shp_price   = intval( strval($cart->getTotalShippingCost()) * 100);
        $shp_carrier = "other";
        $shp_service = "other";
        $discounts   = $cart->getDiscounts();
        $items       = $cart->getProducts();

        if (isset($carrier)) {
            $shp_carrier = $carrier->name;
            $shp_service = implode(",", $carrier->delay);
        }

        $order_details = [];
        $order_details['currency']       = $this->context->currency->iso_code;
        $order_details['line_items']     = Config::getLineItems($items);
        $order_details['tax_lines']      = Config::getTaxLines($items);
        $order_details['discount_lines'] = Config::getDiscountLines($discounts);
        $order_details['customer_info']  = Config::getCustomerInfo($customer, $address_delivery);
        $order_details['shipping_lines'] = Config::getShippingLines(
            $shp_carrier, $shp_price, $shp_service
        );
        $order_details['shipping_contact'] = Config::getShippingContact(
            $customer, $address_delivery, $state, $country
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

                $charge_params =
                    array(
                        'payment_method'    => array('type' => 'oxxo_cash'),
                        'amount'            => $amount
                    );

                $charge_response    = $order->createCharge($charge_params);
                $barcode_url        = $charge_response->payment_method->reference;
                $reference          = $charge_response->payment_method->reference;
                $order_status       = (int) Configuration::get('waiting_cash_payment');
                $message            = $this->l('Conekta Transaction Details:') . "\n\n" 
                                    . $this->l('Reference:') . ' ' . $reference . "\n" 
                                    . $this->l('Barcode:') . ' ' . $barcode_url . "\n" 
                                    . $this->l('Amount:') . ' ' . ($charge_response->amount * 0.01) . "\n" 
                                    . $this->l('Processed on:') . ' ' . strftime('%Y-%m-%d %H:%M:%S', $charge_response->created_at) . "\n" 
                                    . $this->l('Currency:') . ' ' . Tools::strtoupper($charge_response->currency) . "\n" 
                                    . $this->l('Mode:') . ' ' . ($charge_response->livemode == 'true' ? $this->l('Live') : $this->l('Test')) . "\n";
                $checkout           = Module::getInstanceByName('conekta_prestashop');

                $checkout->extra_mail_vars = array(
                    '{barcode_url}' => (string)$barcode_url,
                    '{barcode}'     => (string)$reference
                );

            } elseif ($type == "spei") {

                $charge_params =
                    array(
                        'payment_method'    => array( 'type' => 'spei'),
                        'amount'            => $amount
                    );

                $charge_response = $order->createCharge($charge_params);
                $reference       = $charge_response->payment_method->clabe;
                $order_status    = (int)Configuration::get('waiting_spei_payment');
                $message         = $this->l('Conekta Transaction Details:') . "\n\n" 
                                 . $this->l('Amount:') . ' ' . ($charge_response->amount * 0.01) . "\n" 
                                 . $this->l('Processed on:') . ' ' . strftime('%Y-%m-%d %H:%M:%S', $charge_response->created_at) . "\n" 
                                 . $this->l('Currency:') . ' ' . Tools::strtoupper($charge_response->currency) . "\n" 
                                 . $this->l('Mode:') . ' ' . ($charge_response->livemode == 'true' ? $this->l('Live') : $this->l('Test')) . "\n";
                $checkout        = Module::getInstanceByName('conekta_prestashop');

                $checkout->extra_mail_vars = array(
                    '{receiving_account_number}' => (string)$reference
                    );

            } else {

                $charge_params =
                    array(
                        'payment_method'    => array(
                            'type'          => 'card',
                            'token_id'      =>  'tok_test_visa_4242'
                          ),
                         'amount'           => $amount
                     );

                $monthly_installments = (int) $monthly_installments;

                if($monthly_installments > 1)
                    $charge_params['payment_method'] = array_merge($charge_params['payment_method'], array('monthly_installments'=> $monthly_installments));
                
                $charge_response    = $order->createCharge($charge_params);
                $order_status       = (int)Configuration::get('PS_OS_PAYMENT');
                $message            = $this->l('Conekta Transaction Details:') . "\n\n" 
                                    . $this->l('Amount:') . ' ' . ($charge_response->amount * 0.01) . "\n" 
                                    . $this->l('Status:') . ' ' . ($charge_response->status == 'paid' ? $this->l('Paid') : $this->l('Unpaid')) . "\n" 
                                    . $this->l('Processed on:') . ' ' . strftime('%Y-%m-%d %H:%M:%S', $charge_response->created_at) . "\n" 
                                    . $this->l('Currency:') . ' ' . Tools::strtoupper($charge_response->currency) . "\n" 
                                    . $this->l('Mode:') . ' ' . ($charge_response->livemode == 'true' ? $this->l('Live') : $this->l('Test')) . "\n";
            }

            $this->validateOrder(
                (int)$this->context->cart->id, 
                (int) $order_status, 
                $this->context->cart->getOrderTotal(), 
                $this->displayName, 
                $message, array(), 
                null, false, 
                $this->context->customer->secure_key
            );

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
                Database::insertOxxoPayment($order,$charge_response,$reference,$this->currentOrder, $this->context->cart->id);
            } elseif (isset($charge_response->id) && $type == "spei") {
                Database::insertOxxoPayment($order,$charge_response,$reference,$this->currentOrder, $this->context->cart->id);
            } elseif (isset($charge_response->id)) {
                Db::getInstance()->Execute('INSERT INTO ' . _DB_PREFIX_ . 'conekta_transaction (type, id_cart, id_order, id_conekta_order, id_transaction, amount, status, currency, mode, date_add, captured) VALUES (\'payment\', ' . (int) $this->context->cart->id . ', ' . (int) $this->currentOrder . ', \'' . pSQL($order->id) . '\', \'' . pSQL($charge_response->id) . '\',\'' . ($charge_response->amount * 0.01) . '\', \'' . ($charge_response->status == 'paid' ? 'paid' : 'unpaid') . '\', \'' . pSQL($charge_response->currency) . '\', \'' . ($charge_response->livemode == 'true' ? 'live' : 'test') . '\', NOW(), \'1\')');
            }

            $redirect = $this->context->link->getPageLink('order-confirmation', true, null, array(
                'id_order'  => (int) $this->currentOrder,
                'id_cart'   => (int) $this->context->cart->id,
                'key'       => $this->context->customer->secure_key,
                'id_module' => (int) $this->id
            ));

            Tools::redirect($redirect);
        } catch (\Conekta\ErrorList $e) {
            $message = "";
            if (class_exists('Logger')) {
                foreach($e->details as $single_error){
                    $log_message .= $single_error->message . ' ';
                    Logger::addLog($this->l('Payment transaction failed') . ' ' . $log_message, 2, null, 'Cart', (int)$this->context->cart->id, true);
                }
            }

            $controller = Configuration::get('PS_ORDER_PROCESS_TYPE') ? 'order-opc.php' : 'order.php';
            $location = $this->context->link->getPageLink($controller, true) . (strpos($controller, '?') !== false ? '&' : '?') . 'step=3&conekta_error=1&message=' . $message . '#conekta_error';
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

     /**
     * Display the transaction status (paid or unpaid) and mode
     *
     * @return string HTML/JS Content
     */

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
