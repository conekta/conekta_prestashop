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
 * DebugConekta File Doc Comment
 *
 * @author    Conekta <support@conekta.io>
 * @copyright 2012-2019 Conekta
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @category  DebugConekta
 * @package   DebugConekta
 * @version   GIT: @1.1.0@
 * @link      https://conekta.com/
 */

define("CONEKTA_ERROR", "CONEKTA ERROR: ");
define("CONEKTA_ORDER_UPDATE", "Update Order: ");
define("CONEKTA_ORDER_CREATE", "Create Order: ");
define("CONEKTA_CUSTOMER_UPDATE", "Update Customer: ");
define("CONEKTA_CUSTOMER_CREATE", "Create Customer: ");
define("CONEKTA_NOTICE", "CONEKTA Notice: ");

define("TYPE_NOTICE", 0);
define("TYPE_ERROR", 1);
define("TYPE_UPDATE_CUSTOMER", 2);
define("TYPE_CREATE_CUSTOMER", 3);
define("TYPE_UPDATE_ORDER", 4);
define("TYPE_CREATE_ORDER", 5);

/**
 * DebugConekta Class Doc Comment
 *
 * @author   Conekta <support@conekta.io>
 * @category Class
 * @package  DebugConekta
 * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link     https://conekta.com/
 */
class DebugConekta
{
    public static function log($message, $type = TYPE_NOTICE, $file_name = "debug")
    {
        $dirname = dirname(__FILE__) . '/logs/';

        if (!file_exists($dirname)) {
            mkdir($dirname, 0775, true);
        }
        
        $path = $dirname . $file_name .'-'. date("Y-m-d") . '.log';

        switch ($type) {
            case TYPE_NOTICE:
                $type_message = CONEKTA_NOTICE;
                break;
            case TYPE_ERROR:
                $type_message = CONEKTA_ERROR;
                break;
            case TYPE_UPDATE_CUSTOMER:
                $type_message = CONEKTA_CUSTOMER_UPDATE;
                break;
            case TYPE_CREATE_CUSTOMER:
                $type_message = CONEKTA_CUSTOMER_CREATE;
                break;
            case TYPE_UPDATE_ORDER:
                $type_message = CONEKTA_ORDER_UPDATE;
                break;
            case TYPE_CREATE_ORDER:
                $type_message = CONEKTA_ORDER_CREATE;
                break;
            default:
                $type_message = CONEKTA_NOTICE;
                break;
        }

        if (Configuration::get('CONEKTA_DEBUG')) {
            $file = fopen($path, "a+");
            fwrite($file, '[ ' . gmdate("Y-m-d H:i:s") . ' ] ');
            fwrite($file, $type_message);
            fwrite($file, print_r($message, true) . PHP_EOL);
            fclose($file);
        }
    }
}