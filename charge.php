<?php
/**
 * Title   : Conekta Card Payment Gateway for Prestashop
 * Author  : Conekta.io
 * Url     : https://www.conekta.io/es/docs/plugins/prestashop.
 *
 *  @author Conekta <support@conekta.io>
 *  @copyright  2012-2016 Conekta
 *  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 *  @version  v2.0.0
 */

include dirname(__FILE__).'/../../config/config.inc.php';
include dirname(__FILE__).'/../../init.php';
include dirname(__FILE__).'/conektaprestashop.php';

/* Todo: extend for subscriptions and meses sin intereses */
/* Check token */
$conekta = new ConektaPrestashop();
$conektaToken = Tools::getValue('conektaToken');
$type = Tools::getValue('type');
$monthly_installments = Tools::getValue('monthly_installments');
/* Check that module is active */

if ($conekta->active) {
    $conekta->processPayment($conektaToken, $type, $monthly_installments);
} else {
    Tools::dieOrLog('Token required, please check for any Javascript errors on the payment page.', true);
}
