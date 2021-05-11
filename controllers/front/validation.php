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
 * Validation File Doc Comment
 *
 * @category  Validation
 * @package   Validation
 * @author    Conekta <support@conekta.io>
 * @copyright 2012-2019 Conekta
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @version   GIT: @1.1.0@
 * @link      https://conekta.com/
 */

/**
 * ConektaPaymentsPrestashopValidationModuleFrontController Class Doc Comment
 *
 * @category Class
 * @package  ConektaPaymentsPrestashopValidationModuleFrontController
 * @author   Conekta <support@conekta.io>
 * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link     https://conekta.com/
 */

class ConektaPaymentsPrestashopValidationModuleFrontController extends ModuleFrontController
{
    /**
     * Returns the module that the payment of the order was made.
     *
     * @return void
     */
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
            print_r ($this->getTranslator()->trans('This payment method is not available.', array(), 'Modules.ConektaPaymentsPrestashop.Shop'));
        } else {

            if (!Validate::isLoadedObject($customer)) {
                Tools::redirect('index.php?controller=order&step=1');
            }
            
            $conektaOrderId = pSQL(Tools::getValue('conektaOrdenID'));
            
            $conekta->processPayment($conektaOrderId);
            
            $this->setTemplate('module:conektapaymentsprestashop/views/templates/front/payment_return.tpl');
        }
    }
}
