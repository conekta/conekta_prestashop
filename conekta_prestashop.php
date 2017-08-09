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
//include_once "/var/www/html/modules/conekta_prestashop/modules/conekta_prestashop/admin_controller.php";
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
        if (!parent::install() || !$this->registerHook('paymentOptions') || !$this->registerHook('paymentReturn')) {
            return false;
        }
        return true;
    }

    public function hookPaymentOptions($params)
    {
      error_log("======ENTROU NO hookPaymentOptions=======");
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
            //$this->getOfflinePaymentOption(),
            //$this->getExternalPaymentOption(),
          $this->getCardPaymentOption(),
          $this->getOxxoPaymentOption(),
          $this->getSpeiPaymentOption(),
            //$this->getIframePaymentOption(),
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
                      ->setAction($this->context->link->getModuleLink($this->name, 'validation', array(), true))
                      ->setAdditionalInformation($this->context->smarty->fetch('module:conekta_prestashop/views/templates/front/payment_infos.tpl'))
                      ->setLogo(Media::getMediaPath(_PS_MODULE_DIR_.$this->name.'/payment.jpg'));

        return $offlineOption;
    }


    public function getOxxoPaymentOption()
    {
        $offlineOption = new PaymentOption();
        $offlineOption->setCallToActionText($this->l('Pago en Efectivo con OxxoPay'))
                      ->setAction($this->context->link->getModuleLink($this->name, 'validation', array(), true))
                      ->setAdditionalInformation($this->context->smarty->fetch('module:conekta_prestashop/views/templates/front/payment_infos.tpl'))
                      ->setLogo(Media::getMediaPath(_PS_MODULE_DIR_.$this->name.'/payment.jpg'));

        return $offlineOption;
    }

    public function getExternalPaymentOption()
    {
        $externalOption = new PaymentOption();
        $externalOption->setCallToActionText($this->l('Pay external'))
                       ->setAction($this->context->link->getModuleLink($this->name, 'validation', array(), true))
                       ->setInputs([
                            'token' => [
                                'name' =>'token',
                                'type' =>'hidden',
                                'value' =>'12345689',
                            ],
                        ])
                       ->setAdditionalInformation($this->context->smarty->fetch('module:conekta_prestashop/views/templates/front/payment_infos.tpl'))
                       ->setLogo(Media::getMediaPath(_PS_MODULE_DIR_.$this->name.'/payment.jpg'));

        return $externalOption;
    }


    public function getCardPaymentOption() 
    {
        //PrestaShopLogger::addLog("getCardPaymentOptios", 1, null, '', 0, true, 1234) 

        $embeddedOption = new PaymentOption();
        $embeddedOption->setModuleName($this->name)
          //->setCallToActionText($this->l('Pago con tarjeta de crédito y débito (con opción de meses sin intereses)'))
                       ->setCallToActionText($this->l($this->name))
                       ->setAction($this->context->link->getModuleLink($this->name, 'validation', array(), true))
                       ->setForm($this->generateCardPaymentForm())
                       ->setAdditionalInformation($this->context->smarty->fetch('module:conekta_prestashop/views/templates/front/payment_infos.tpl'))
                       ->setLogo(Media::getMediaPath(_PS_MODULE_DIR_.$this->name.'/payment.jpg'));

        return $embeddedOption;
    }

    public function getIframePaymentOption()
    {
        $iframeOption = new PaymentOption();
        $iframeOption->setCallToActionText($this->l('Pay iframe'))
                     ->setAdditionalInformation($this->context->smarty->fetch('module:conekta_prestashop/views/templates/front/payment_infos.tpl'))
                     ->setLogo(Media::getMediaPath(_PS_MODULE_DIR_.$this->name.'/payment.jpg'));

        return $iframeOption;
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
            'CHEQUE_NAME' => Tools::getValue('CHEQUE_NAME', Configuration::get('CHEQUE_NAME')),
            'CHEQUE_ADDRESS' => Tools::getValue('CHEQUE_ADDRESS', Configuration::get('CHEQUE_ADDRESS')),
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
            'LIVE_PUBLIC_KEY' => Tools::getValue('LIVE_PUBLIC_KEY', Configuration::get('LIVE_PUBLIC_KEY')),
        );
    }


    public function buildAdminContent()
    {
        $fields_form = array(
            'form' => array(
                'legend' => array(
                  'title' => $this->trans('Contact details', array(), 'Modules.Conekta_Prestashop.Admin'),
                  //'title' => 'some-title',  
                  'icon' => 'icon-envelope'
                ),
                'input' => array(
                    array(
                        'type' => 'text',
                        'label' => $this->trans('Payee (name)', array(), 'Modules.Conekta_Prestashop.Admin'),
                        //'label' => 'some-label', 
                        'name' => 'CHEQUE_NAME',
                        'required' => true
                    ),
                    array(
                        'type' => 'textarea',
                        'label' => $this->trans('Address', array(), 'Modules.Conekta_Prestashop.Admin'),
                        'desc' => $this->trans('Address where the check should be sent to.', array(), 'Modules.Conekta_Prestashop.Admin'),
                        //'label' => 'some-new-label', 
                        //'desc' => 'some-desc', 
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
                        //'label' => 'some-label', 
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
                    //'title' => 'submit title'),
                )
            ),
          );
      return $fields_form; 
    }

    public function renderForm()
    {
      $fields_form  = $this->buildAdminContent();
      //$fields_form = buildAdminParameters(); 
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
}
