<?php

/*
 * Title   : Conekta Card Payment Gateway for Prestashop
 * Author  : Conekta.io
 * Url     : https://www.conekta.io/es/docs/plugins/prestashop
 */

if (!defined('_PS_VERSION_'))
	exit;

// object module ($this) available
function upgrade_module_1_8_0($object)
{
	if (class_exists('DB'))
	{
		Db::getInstance()->Execute('ALTER TABLE IF EXISTS `' . _DB_PREFIX_ . 'conekta_transaction` DROP COLUMN `id_conekta_customer`, DROP COLUMN `fee`;');
	}
}