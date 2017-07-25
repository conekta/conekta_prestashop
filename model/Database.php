<?php
/**
* Class Database
*/
class Database 
{
	public function getOrderConekta($order_id)
    {
        return Db::getInstance()->getValue(
            'SELECT module FROM ' . _DB_PREFIX_ . 'orders '
            .'WHERE id_order = ' . pSQL((int) $order_id));
    }

    public function getConektaTransaction($order_id)
    {
        return Db::getInstance()->getRow(
                'SELECT * FROM ' . _DB_PREFIX_ . 'conekta_transaction '
                .'WHERE id_order = ' . pSQL((int) $order_id) . 
                ' AND type = \'payment\'');
    }

    public function insertOxxoPayment($order,$charge_response,$reference,$currentOrder,$cartId)
    {
      return Db::getInstance()->Execute('INSERT INTO ' . _DB_PREFIX_ . 'conekta_transaction (type, id_cart, id_order, id_conekta_order, id_transaction, amount, status, currency, mode, date_add, reference, barcode, captured) VALUES (\'payment\', ' . pSQL((int) $cartId) . ', ' . pSQL((int) $currentOrder) . ', \'' . pSQL($order->id) . '\', \'' . pSQL($charge_response->id) . '\',\'' . ($order->amount * 0.01) . '\', \'' . ($charge_response->status == 'paid' ? 'paid' : 'unpaid') . '\', \'' . pSQL($charge_response->currency) . '\', \'' . ($charge_response->livemode == 'true' ? 'live' : 'test') . '\', NOW(),\'' . $reference . '\',\'' . $reference . '\',\'' . ($charge_response->livemode == 'true' ? '1' : '0') . '\' )');
    }

    public function insertSpeiPayment($order,$charge_response,$reference,$currentOrder,$cartId)
    {
      return Db::getInstance()->Execute('INSERT INTO ' . _DB_PREFIX_ . 'conekta_transaction (type, id_cart, id_order, id_conekta_order, id_transaction, amount, status, currency, mode, date_add, reference, captured) VALUES (\'payment\', ' . (int) $cartId . ', ' . (int) $currentOrder . ', \'' . pSQL($order->id) . '\', \'' . pSQL($charge_response->id) . '\', \'' . ($charge_response->amount * 0.01) . '\', \'' . ($charge_response->status == 'paid' ? 'paid' : 'unpaid') . '\', \'' . pSQL($charge_response->currency) . '\', \'' . ($charge_response->livemode == 'true' ? 'live' : 'test') . '\', NOW(),\'' . $reference . '\', \'' . ($charge_response->livemode == 'true' ? '1' : '0') . '\' )');
    }

    public function insertCardPayment($order,$charge_response,$reference,$currentOrder,$cartId)
    {
      Db::getInstance()->Execute('INSERT INTO ' . _DB_PREFIX_ . 'conekta_transaction (type, id_cart, id_order, id_conekta_order, id_transaction, amount, status, currency, mode, date_add, captured) VALUES (\'payment\', ' . (int) $cartId . ', ' . (int) $currentOrder . ', \'' . pSQL($order->id) . '\', \'' . pSQL($charge_response->id) . '\',\'' . ($charge_response->amount * 0.01) . '\', \'' . ($charge_response->status == 'paid' ? 'paid' : 'unpaid') . '\', \'' . pSQL($charge_response->currency) . '\', \'' . ($charge_response->livemode == 'true' ? 'live' : 'test') . '\', NOW(), \'1\')');
    }

    /**
     * Conekta's module database tables
     *
     * @return boolean Database tables installation result
     */
    public function installDb()
    {
        return (Db::getInstance()->Execute('CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'conekta_transaction` (
          `id_conekta_transaction` int(11) NOT NULL AUTO_INCREMENT,
          `type` enum(\'payment\',\'refund\') NOT NULL,
          `id_cart` int(10) unsigned NOT NULL,
          `id_order` int(10) unsigned NOT NULL, 
          `id_conekta_order` varchar(32) NOT NULL, 
          `id_transaction` varchar(32) NOT NULL, 
          `amount` decimal(10,2) NOT NULL, 
          `status` enum(\'paid\',\'unpaid\') NOT NULL,
          `currency` varchar(3) NOT NULL,
          `mode` enum(\'live\',\'test\') NOT NULL,
          `date_add` datetime NOT NULL,
          `reference` varchar(30) NOT NULL,
          `barcode` varchar(230) NOT NULL,
          `captured` tinyint(1) NOT NULL DEFAULT \'1\',
          PRIMARY KEY (`id_conekta_transaction`),
          KEY `idx_transaction` (`type`,`id_order`,`status`))
          ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8 AUTO_INCREMENT=1'));
    }
}