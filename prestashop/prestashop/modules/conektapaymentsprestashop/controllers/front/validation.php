<?php
/**
* 2007-2019 PrestaShop
*
* NOTICE OF LICENSE
* Title   : Conekta Card Payment Gateway for Prestashop
* Author  : Conekta.io
* URL     : https://www.conekta.io/es/docs/plugins/prestashop.
*
* @author Conekta <support@conekta.io>
* @copyright 2012-2019 Conekta
* @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*
*/

class ConektaPaymentsPrestashopValidationModuleFrontController extends ModuleFrontController
{
    public function postProcess()
    {
        $cart = $this->context->cart;
        $authorized = false;
        $customer = new Customer($cart->id_customer);
        $conekta = new ConektaPaymentsPrestashop();

        foreach (Module::getPaymentModules() as $module) {
            if ($module['name'] == 'conektapaymentsprestashop') {
                $authorized = true;
                break;
            }
        }
        if (!$authorized) {
            die($this->module->getTranslator()
                ->trans('This payment method is not available.', array(), 'Modules.ConektaPaymentsPrestashop.Shop'));
        }

        if (!Validate::isLoadedObject($customer)) {
            Tools::redirect('index.php?controller=order&step=1');
        }

        $type = pSQL(Tools::getValue('type'));
        $msi = pSQL(Tools::getValue('monthly_installments'));
        $conektaToken = pSQL(Tools::getValue('conektaToken'));

        $conekta->processPayment($type, $conektaToken, $msi);

        $this->setTemplate('module:conektapaymentsprestashop/views/templates/front/payment_return.tpl');
    }
}
