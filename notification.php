<?php
/**
 * 2007-2019 PrestaShop
 *
 * NOTICE OF LICENSE
 * Title   : Conekta Card Payment Gateway for Prestashop
 * Author  : Conekta.io
 * Url     : https://www.conekta.io/es/docs/plugins/prestashop.
 * PHP Version 7.0.0
 *
 * Notification File Doc Comment
 *
 * @author    Conekta <support@conekta.io>
 * @copyright 2012-2019 Conekta
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @category  Notification
 * @package   Notification
 * @version   GIT: @1.1.0@
 * @link      https://conekta.com/
 *
 */

require_once dirname(__FILE__) . '/../../config/config.inc.php';
require_once dirname(__FILE__) . '/../../init.php';
require_once dirname(__FILE__) . '/model/Database.php';
require_once dirname(__FILE__) . '/log.php';

if (!defined('_PS_VERSION_')) {
    exit;
}

define("ORDER_CANCELED", 6);
define("ORDER_REFUNDED", 7);

/*
    To configure, add webhook in account
    storename.com/modules/conektaefectivo/notification.php
*/

$body = Tools::file_get_contents('php://input');
authenticateEvent($body, filter_input(INPUT_SERVER, 'HTTP_DIGEST'));
$event_json = Tools::jsonDecode($body);

DebugConekta::log($event_json, TYPE_NOTICE);

if ($event_json->type == 'order.paid' && isset($event_json->data)) {
    $conekta_order = $event_json->data->object;
    
    $reference_id = (string) $conekta_order->metadata->reference_id;
    $result = Database::getOrderByReferenceId($reference_id);
    $id_order = $result['id_order'];
    $order = new Order($id_order);
    $order_fields = $order->getFields();
    $currency_payment = Currency::getPaymentCurrencies(
        Module::getModuleIdByName('conektapaymentsprestashop'),
        $order_fields['id_shop']
    );
    $total_order_amount = $order->getOrdersTotalPaid();
    $str_total_order_amount = (string) $total_order_amount * 100;

    if ($currency_payment[0]['iso_code'] === $conekta_order->currency) {
        if ($str_total_order_amount == $conekta_order->amount) {
            $orderHistory           = new OrderHistory();
            $orderHistory->id_order = (int) $order->id;
            $orderHistory->changeIdOrderState(
                (int) Configuration::get('PS_OS_PAYMENT'),
                (int) $order->id
            );
            $orderHistory->addWithEmail();
            $addIdTransaction = '';

            if (isset($conekta_order->checkout->plan_id)) {
                $addIdTransaction = ', id_transaction = '. json_encode($conekta_order->charges->data[0]->id);
            }
            
            Db::getInstance()->Execute(
                'UPDATE ' . _DB_PREFIX_
                .'conekta_transaction SET status = "paid"' . $addIdTransaction . ' WHERE id_order = '
                . pSQL($id_order)
            );
        }
    }
} elseif ($event_json->type == 'order.expired' && isset($event_json->data)) {
    $conekta_order = $event_json->data->object;
      
    $reference_id           = (string) $conekta_order->metadata->reference_id;
    $result                 = Database::getOrderByReferenceId($reference_id);
    $id_order               = $result['id_order'];
    Db::getInstance()->Execute(
        'UPDATE ' . _DB_PREFIX_
        . 'orders SET current_state = '. ORDER_CANCELED .' WHERE id_order = '
        . pSQL($id_order)
    );
} elseif ($event_json->type == 'order.canceled' && isset($event_json->data)) {
    $conekta_order = $event_json->data->object;
    $reference_id           = (string) $conekta_order->metadata->reference_id;
    $result                 = Database::getOrderByReferenceId($reference_id);
    $id_order               = $result['id_order'];
    Db::getInstance()->Execute(
        'UPDATE ' . _DB_PREFIX_
        . 'orders SET current_state = '. ORDER_CANCELED .' WHERE id_order = '
        . pSQL($id_order)
    );
} elseif ($event_json->type == 'order.refunded' && isset($event_json->data)) {
    $conekta_order = $event_json->data->object;
    $reference_id           = (string) $conekta_order->metadata->reference_id;
    $result                 = Database::getOrderByReferenceId($reference_id);
    $id_order               = $result['id_order'];
    Db::getInstance()->Execute(
        'UPDATE ' . _DB_PREFIX_
        . 'orders SET current_state = '. ORDER_REFUNDED .' WHERE id_order = '
        . pSQL($id_order)
    );
} elseif ($event_json->type == 'plan.deleted' && isset($event_json->data)) {
    $conekta_plan = $event_json->data->object;
    $result = Database::getProductIdProductData($conekta_plan->id);

    foreach ($result as $product) {
        Database::updateConektaProductData($product['id_product'], 'is_subscription', 'false');
        Database::updateConektaProductData($product['id_product'], 'subscription_plan', '');
    }
}

/**
 * Aunthenticate events
 *
 * @param $body   inputs
 * @param $digest methods a web server can use to negotiate credentials
 *
 * @return void
 */
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
            openssl_private_decrypt(
                $encrypted_message,
                $sha256_message,
                $private_key
            );
            if (hash("sha256", $body) != $sha256_message) {
                authenticateLogger("unauthenticated event");
            }
        } else {
            authenticateLogger("Empty digest");
        }
    }
}

/**
 * Aunthenticate logger
 *
 * @param $log_message message log
 *
 * @return void
 */
function authenticateLogger($log_message)
{
    if (version_compare(_PS_VERSION_, '1.4.0.3', '>') && class_exists('Logger')) {
        Logger::addLog($log_message, 1, null, 'notification', '');
    }
}

header('HTTP/1.1 200 OK');
exit;
