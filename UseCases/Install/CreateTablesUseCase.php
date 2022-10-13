<?php
/**
 * 2007-2022 PrestaShop
 *
 * NOTICE OF LICENSE
 * Title   : Conekta Card Payment Gateway for Prestashop
 * Author  : Conekta.io
 * URL     : https://www.conekta.io/es/docs/plugins/prestashop.
 *
 *  @author Conekta <support@conekta.io>
 *  @copyright 2012-2022 Conekta
 *  @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 *  @version v1.0.0
 */

class CreateTablesUseCase
{
    public function __invoke()
    {
        return Database::installDb() && Database::createTableConektaOrder() && Database::createTableMetaData();
    }
}