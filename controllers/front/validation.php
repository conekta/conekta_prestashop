<?php
/**
 * 2007-2022 PrestaShop
 *
 * NOTICE OF LICENSE
 * Title   : Conekta Card Payment Gateway for Prestashop
 * Author  : Conekta.io
 * URL     : https://www.conekta.io/es/docs/plugins/prestashop.
 * PHP Version 7.0.0
 *
 * Validation File Doc Comment
 *
 * @author    Conekta <support@conekta.io>
 * @copyright 2012-2022 Conekta
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @category  Validation
 * @package   Validation
 * @version   GIT: @2.3.5@
 * @link      https://conekta.com/
 */

/**
 * ConektaValidationModuleFrontController Class Doc Comment
 *
 * @author   Conekta <support@conekta.io>
 * @category Class
 * @package  ConektaValidationModuleFrontController
 * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link     https://conekta.com/
 */

class ConektaValidationModuleFrontController extends ModuleFrontController
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
        $conekta = new Conekta();

        foreach (Module::getPaymentModules() as $module) {
            if ($module['name'] == 'conekta') {
                $authorized = true;
                break;
            }
        }
        if (!$authorized) {
            print_r($this->getTranslator()->trans(
                'This payment method is not available.',
                array(),
                'Modules.Conekta.Shop'
            ));
        } else {
            if (!Validate::isLoadedObject($customer)) {
                Tools::redirect('index.php?controller=order&step=1');
            }

            $date = new DateTime();

            $order = (object) array(
                'id' => pSQL(Tools::getValue('conektaOrdenID')),
                'amount' => pSQL(Tools::getValue('conektAmount')),
                'charges' => (object) array(
                    'id' => pSQL(Tools::getValue('chargeId')),
                    'created_at' => pSQL(Tools::getValue('createAt'))?
                        pSQL(Tools::getValue('createAt')) : $date->getTimestamp(),
                    'amount' => pSQL(Tools::getValue('conektAmount')),
                    'status' => pSQL(Tools::getValue('charge_status')),
                    'currency' => pSQL(Tools::getValue('charge_currency')),
                    'livemode' => Configuration::get('CONEKTA_MODE'),
                    'payment_method' => (object) array(
                        'type' => pSQL(Tools::getValue('payment_type')),
                        'reference' => pSQL(Tools::getValue('reference'))
                    ),
                ),
                'plan_id' => pSQL(Tools::getValue('plan_id'))
            );

            $conekta->processPayment($order);
            
            $this->setTemplate('module:conekta/views/templates/front/payment_return.tpl');
        }
    }
}
