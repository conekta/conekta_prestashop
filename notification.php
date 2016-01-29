<?php
include(dirname(__FILE__).'/../../config/config.inc.php');
include(dirname(__FILE__). '/../../init.php');

// To configure, add webhook in account storename.com/modules/conektaefectivo/notification.php

$body = @file_get_contents('php://input');
$event_json = json_decode($body);
if ($event_json->type == 'charge.paid'){
  $charge=$event_json->data->object;
  $order=Order::getOrderByCartId(intval($charge->reference_id));
  if ($order){
		$orderHistory = new OrderHistory();
		$orderHistory->id_order = $order;
		$orderHistory->changeIdOrderState(Configuration::get('PS_OS_PAYMENT'), $order);
		$orderHistory->addWithemail();
      		Db::getInstance()->Execute('UPDATE '._DB_PREFIX_.'conekta_transaction SET status = "paid" WHERE id_order = '. $charge->reference_id . '');
    }
}
header('HTTP/1.1 200 OK');
exit;

