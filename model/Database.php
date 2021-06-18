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
 * Database File Doc Comment
 *
 * @author    Conekta <support@conekta.io>
 * @copyright 2012-2019 Conekta
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @category  Database
 * @package   Database
 * @version   GIT: @1.1.0@
 * @link      https://conekta.com/
 */

/**
 * Database Class Doc Comment
 *
 * @author   Conekta <support@conekta.io>
 * @category Class
 * @package  Database
 * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link     https://conekta.com/
 */

class Database
{
    /**
     * Returns the module that the payment of the order was made.
     *
     * @param $order_id Order id
     *
     * @return array|string
     */
    public static function getOrderConekta($order_id)
    {
        return Db::getInstance()->getValue(
            'SELECT module FROM ' . _DB_PREFIX_ . 'orders '
            . 'WHERE id_order = ' . pSQL((int) $order_id)
        );
    }

    /**
     * Returns information of the order paid.
     *
     * @param $order_id The order id
     *
     * @return array
     */
    public static function getConektaTransaction($order_id)
    {
        return Db::getInstance()->getRow(
            'SELECT * FROM ' . _DB_PREFIX_ . 'conekta_transaction '
            . 'WHERE id_order = ' . pSQL((int) $order_id)
            . ' AND type = \'payment\''
        );
    }

    /**
     * Insert payment with oxxo
     *
     * @param Order  $order           Object order
     * @param array  $charge_response Charges made on the order
     * @param string $reference       Payment reference code
     * @param int    $currentOrder    Order ID
     * @param int    $cartId          Cart ID
     *
     * @return boolean
     */
    public static function insertOxxoPayment($order, $charge_response, $reference, $currentOrder, $cartId)
    {
        return Db::getInstance()->Execute(
            'INSERT INTO ' . _DB_PREFIX_ . 'conekta_transaction ('
            . 'type, id_cart, id_order, id_conekta_order, id_transaction, amount,'
            . 'status, currency, mode, date_add, reference, barcode, captured)'
            . 'VALUES (\'payment\', ' . pSQL((int) $cartId) . ', ' . pSQL((int) $currentOrder) . ', \''
            . pSQL($order->id) . '\', \'' . pSQL($charge_response->id) . '\',\''
            . (float) ($order->amount * 0.01) . '\', \''
            . ($charge_response->status == 'paid' ? 'paid' : 'unpaid') . '\', \''
            . pSQL($charge_response->currency) . '\', \''
            . ($charge_response->livemode == 'true' ? 'live' : 'test') . '\', NOW(),\''
            . pSQL($reference) . '\',\'' . pSQL($reference) . '\',\''
            . ($charge_response->livemode == 'true' ? '1' : '0') . '\' )'
        );
    }

    /**
     * Create table ps_conekta_transaction
     *
     * @return boolean
     */
    public static function installDb()
    {
        return (
            Db::getInstance()->execute(
                'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'conekta_transaction` (
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
                ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8 AUTO_INCREMENT=1'
            )
        );
    }

    /**
     * Create table ps_conekta_metadata
     *
     * @return boolean
     */
    public static function createTableMetaData()
    {
        $table = _DB_PREFIX_."conekta_metadata";
        $sql = "CREATE TABLE IF NOT EXISTS $table (
            id_conekta_metadata int(11) NOT NULL AUTO_INCREMENT,
            id_user int(11) unsigned NOT NULL,
            `mode` enum(\"live\",\"test\") NOT NULL,
            meta_option varchar(32) NOT NULL,
            meta_value varchar(128) NOT NULL,
            PRIMARY KEY (id_conekta_metadata),
            KEY id_user (id_user),
            KEY id_conekta_metadata (id_conekta_metadata)
            )
            ENGINE=". _MYSQL_ENGINE_ . "DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";

        return (Db::getInstance()->execute($sql));
    }

    /**
     * Create table ps_conekta_order_checkout
     *
     * @return boolean
     */
    public static function createTableConektaOrder()
    {
        $table = _DB_PREFIX_."conekta_order_checkout";
        $sql = "CREATE TABLE IF NOT EXISTS $table (
            id int(11) NOT NULL AUTO_INCREMENT,
            id_user int(11) unsigned NOT NULL,
            id_cart int(11) unsigned NOT NULL,
            `mode` enum(\"live\",\"test\") NOT NULL,
            id_conekta_order varchar(32) NOT NULL,
            `status` enum(\"paid\",\"pre_authorized\",\"unpaid\",\"pending_payment\",\"expired\",\"voided\","
            . "\"fraudulent\",\"preauthorized\",\"canceled\",\"pending_confirmation\",\"charged_back\","
            . "\"partially_refunded\",\"refunded\",\"reversed\",\"approved\",\"declined\",\"in_review\","
            . "\"insufficient_funds\",\"card_declined\",\"stolen_card\",\"suspected_fraud\","
            . "\"unprocessable_card_type\") NOT NULL,
            PRIMARY KEY (id),
            KEY id_user (id_user),
            KEY id_cart (id_cart),
            KEY id (id),
            KEY id_conekta_order (id_conekta_order)
            )
            ENGINE=". _MYSQL_ENGINE_ . "DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";

        return (Db::getInstance()->execute($sql));
    }

    /**
     * Insert payment with spei
     *
     * @param Order  $order           Object order
     * @param array  $charge_response Charges made on the order
     * @param string $reference       Payment reference code
     * @param int    $currentOrder    Order ID
     * @param int    $cartId          Cart ID
     *
     * @return boolean
     */
    public static function insertSpeiPayment($order, $charge_response, $reference, $currentOrder, $cartId)
    {
        return Db::getInstance()->Execute(
            'INSERT INTO ' . _DB_PREFIX_ . 'conekta_transaction('
            . 'type, id_cart, id_order, id_conekta_order, id_transaction, amount,'
            . 'status, currency, mode, date_add, reference, captured)'
            . 'VALUES (\'payment\', ' . (int) $cartId . ', ' . (int) $currentOrder . ', \''
            . pSQL($order->id) . '\', \'' . pSQL($charge_response->id) . '\', \''
            . (float)($charge_response->amount * 0.01) . '\', \''
            . ($charge_response->status == 'paid' ? 'paid' : 'unpaid') . '\', \''
            . pSQL($charge_response->currency) . '\', \''
            . ($charge_response->livemode == 'true' ? 'live' : 'test') . '\', NOW(),\''
            . pSQL($reference) . '\', \'' . ($charge_response->livemode == 'true' ? '1' : '0') . '\' )'
        );
    }

    /**
     * Insert payment with card
     *
     * @param Order $order           Object order
     * @param array $charge_response Charges made on the order
     * @param int   $currentOrder    Order ID
     * @param int   $cartId          Cart ID
     *
     * @return boolean
     */
    public static function insertCardPayment($order, $charge_response, $currentOrder, $cartId)
    {
        return Db::getInstance()->Execute(
            'INSERT INTO ' . _DB_PREFIX_ . 'conekta_transaction ('
            . 'type, id_cart, id_order, id_conekta_order, id_transaction,'
            . 'amount, status, currency, mode, date_add, captured)'
            . 'VALUES (\'payment\', ' . (int) $cartId . ', ' . (int) $currentOrder . ', \''
            . pSQL($order->id) . '\', \'' . pSQL($charge_response->id) . '\',\''
            . (float)($charge_response->amount * 0.01) . '\', \''
            . ($charge_response->status == 'paid' ? 'paid' : 'unpaid') . '\', \''
            . pSQL($charge_response->currency) . '\', \''
            . ($charge_response->livemode == 'true' ? 'live' : 'test') . '\', NOW(), \'1\')'
        );
    }

    /**
     * Returns the order information
     *
     * @param int $id_order Order ID
     *
     * @return array
     */
    public static function getOrderById($id_order)
    {
        return Db::getInstance()->getRow(
            'SELECT * FROM ' . _DB_PREFIX_ . 'conekta_transaction '
            . 'WHERE id_order = ' . pSQL((int) $id_order) . ';'
        );
    }

    /**
     * Returns the order information
     *
     * @param int    $user_id      Order ID
     * @param string $mode         Mode (Production or Test)
     * @param string $meta_options Metadata option to be searched
     *
     * @return array|string
     */
    public static function getConektaMetadata($user_id, $mode, $meta_options)
    {
        $table = _DB_PREFIX_."conekta_metadata";

        $sql = "SELECT meta_value FROM  $table WHERE id_user = '{$user_id}' "
        . "AND meta_option = '{$meta_options}' "
        . "AND `mode` = '{$mode}'";

        return  Db::getInstance()->getRow($sql);
    }

    /**
     * Save or update value.
     *
     * @param int    $user_id      User ID
     * @param string $mode         Mode (Production or Test)
     * @param string $meta_options Metadata option to save
     * @param string $meta_value   Value to be saved
     *
     * @return boolean
     */
    public static function updateConektaMetadata($user_id, $mode, $meta_options, $meta_value)
    {
        $table = _DB_PREFIX_."conekta_metadata";

        if (empty(Database::getConektaMetadata($user_id, $mode, $meta_options))) {
            $sql = "INSERT INTO $table(id_user, mode, meta_option, meta_value) "
            . "VALUES ('{$user_id}','{$mode}','{$meta_options}','{$meta_value}')";
        } else {
            $sql ="UPDATE $table SET id_user = '{$user_id}', meta_option = '{$meta_options}', "
            . "meta_value = '{$meta_value}' WHERE id_user = '{$user_id}' AND meta_option = '{$meta_options}' "
            . "AND `mode` = '{$mode}'";
        }
        return Db::getInstance()->Execute($sql);
    }

    /**
     * Returns the id of the order created by conekta
     *
     * @param int    $user_id User ID
     * @param string $mode    Mode (Production or Test)
     * @param int    $cart_id Cart ID
     *
     * @return array|string
     */
    public static function getConektaOrder($user_id, $mode, $cart_id)
    {
        $table = _DB_PREFIX_."conekta_order_checkout";

        $sql = "SELECT id_conekta_order, `status` FROM  $table WHERE id_user = '{$user_id}' "
        . "AND `mode` = '{$mode}'  AND `status` = 'unpaid' AND id_cart ='{$cart_id}'";

        return  Db::getInstance()->getRow($sql);
    }

    /**
     * Add or update placed orders
     *
     * @param int    $user_id          User ID
     * @param int    $cart_id          Cart ID
     * @param string $mode             Mode (Production or Test)
     * @param string $id_conekta_order Order ID generate for Conekta
     * @param string $status           Order status
     *
     * @return boolean
     */
    public static function updateConektaOrder($user_id, $cart_id, $mode, $id_conekta_order, $status)
    {
        $table = _DB_PREFIX_."conekta_order_checkout";

        if (empty(Database::getConektaOrder($user_id, $mode, $cart_id))) {
            $sql = "INSERT INTO $table(id_user,	id_cart, mode, id_conekta_order, `status`) "
            . "VALUES ('{$user_id}','{$cart_id}','{$mode}','{$id_conekta_order}', '{$status}')";
        } else {
            $sql = "UPDATE $table SET `status` = '{$status}' WHERE id_user = '{$user_id}' "
            . "AND id_cart = '{$cart_id}' AND id_conekta_order = '{$id_conekta_order}' AND `mode` = '{$mode}'";
        }
        return Db::getInstance()->Execute($sql);
    }

    /**
     * Returns the id of the order related to the reference_id
     *
     * @param string $reference_id Alphabetical reference code assigned to the order.
     *
     * @return array|string
     */
    public static function getOrderByReferenceId($reference_id)
    {
        $table = _DB_PREFIX_."orders";
        $sql = "SELECT id_order FROM $table WHERE reference = '{$reference_id}'";
        return Db::getInstance()->getRow($sql);
    }
}
