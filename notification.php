<?php
/**
 * Title   : Conekta Card Payment Gateway for Prestashop
 * Author  : Conekta.io
 * Url     : https://www.conekta.io/es/docs/plugins/prestashop
 */

if (!defined('_PS_VERSION_'))
    exit;

include (dirname(__FILE__) . '/../../config/config.inc.php');
include (dirname(__FILE__) . '/../../init.php');

// To configure, add webhook in account storename.com/modules/conektaefectivo/notification.php

$body = Tools::file_get_contents('php://input');
$event_json = Tools::jsonDecode($body);

if ($event_json->type == 'charge.paid')
{
    $charge = $event_json->data->object;
    $order = Order::getOrderByCartId((integer)$charge->reference_id);
    if ($order)
    {
        $orderHistory = new OrderHistory();
        $orderHistory->id_order = $order;
        $orderHistory->changeIdOrderState(Configuration::get('PS_OS_PAYMENT') , $order);
        $orderHistory->addWithemail();
        Db::getInstance()->Execute('UPDATE ' . _DB_PREFIX_ . 'conekta_transaction SET status = "paid" WHERE id_order = ' . $charge->reference_id . '');
    }
}

header('HTTP/1.1 200 OK');
exit;