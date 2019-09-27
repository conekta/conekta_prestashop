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

include(dirname(__FILE__) . '/../../config/config.inc.php');
include(dirname(__FILE__) . '/../../init.php');

if (!defined('_PS_VERSION_')) {
    exit;
}

// To configure, add webhook in account storename.com/modules/conektaefectivo/notification.php

$body = Tools::file_get_contents('php://input');
authenticateEvent($body, $_SERVER['HTTP_DIGEST']);
$event_json = Tools::jsonDecode($body);

if ($event_json->type == 'order.paid' && isset($event_json->data)) {
    $conekta_order = $event_json->data->object;
    
    $reference_id           = (integer) $conekta_order->metadata->reference_id;
    $id_order               = Order::getOrderByCartId($reference_id);
    $order                  = new Order($id_order);
    $order_fields           = $order->getFields();
    $currency_payment       = Currency::getPaymentCurrencies(Module::getModuleIdByName('conektapaymentsprestashop'), $order_fields['id_shop']);
    $total_order_amount     = $order->getOrdersTotalPaid();
    $str_total_order_amount = (string) $total_order_amount * 100;
    
    if ($currency_payment[0]['iso_code'] === $conekta_order->currency) {
        if ($str_total_order_amount == $conekta_order->amount) {
            $orderHistory           = new OrderHistory();
            $orderHistory->id_order = (int) $order->id;
            $orderHistory->changeIdOrderState((int) Configuration::get('PS_OS_PAYMENT'), (int) $order->id);
            $orderHistory->addWithEmail();
            Db::getInstance()->Execute('UPDATE ' . _DB_PREFIX_ . 'conekta_transaction SET status = "paid" WHERE id_order = ' . pSQL($id_order));
        }
    }
}

function authenticateEvent($body, $digest)
{
    if (Configuration::get('CONEKTA_MODE')) {
        $private_key_string = Configuration::get('CONEKTA_SIGNATURE_KEY_LIVE');
    } else {
        $private_key_string = Configuration::get('CONEKTA_SIGNATURE_KEY_TEST');
    }
    if (!empty($private_key_string) && !empty($body)) {
        if (!empty($digest)) {
            $private_key       = openssl_pkey_get_private($private_key_string);
            $encrypted_message = urldecode($digest);
            $sha256_message    = "";
            openssl_private_decrypt($encrypted_message, $sha256_message, $private_key);
            if (hash("sha256", $body) != $sha256_message) {
                authenticateLogger("unauthenticated event");
            }
        } else {
            authenticateLogger("Empty digest");
        }
    }
}


function authenticateLogger($log_message)
{
    if (version_compare(_PS_VERSION_, '1.4.0.3', '>') && class_exists('Logger')) {
        Logger::addLog($log_message, 1, null, 'notification', '');
    }
}

header('HTTP/1.1 200 OK');
exit;
