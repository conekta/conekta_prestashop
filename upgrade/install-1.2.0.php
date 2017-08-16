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

if (!defined('_PS_VERSION_')) {
    exit;
}

// object module ($this) available
function upgrade_module_1_2_0()
{
    if (class_exists('DB')) {
        Db::getInstance()->Execute('ALTER TABLE IF EXISTS `' . _DB_PREFIX_ . 'conekta_transaction` DROP COLUMN `id_conekta_customer`, DROP COLUMN `fee`;');
    }
}
