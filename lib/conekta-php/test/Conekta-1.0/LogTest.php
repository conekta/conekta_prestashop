<?php
/**
 * NOTICE OF LICENSE
 * Title   : Conekta Card Payment Gateway for Prestashop
 * Author  : Conekta.io
 * URL     : https://www.conekta.io/es/docs/plugins/prestashop.
 * PHP Version 7.0.0
 * Conekta File Doc Comment
 *
 * @author    Conekta <support@conekta.io>
 * @copyright 2012-2023 Conekta
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 *
 * @category  Conekta
 *
 * @version   GIT: @2.3.6@
 *
 * @see       https://conekta.com/
 */

namespace Conekta;

class LogTest extends BaseTest
{
    public function testSuccesfulFind()
    {
        $this->setApiKey();
        $this->setApiVersion('1.0.0');
        $logs = Log::where();
        $log = Log::find($logs[0]['id']);
        $this->assertTrue(strpos(get_class($log), 'Log') !== false);
    }

    public function testSuccesfulWhere()
    {
        $this->setApiKey();
        $this->setApiVersion('1.0.0');
        $logs = Log::where();
        $this->assertTrue(strpos(get_class($logs), 'Conekta\ConektaObject') !== false);
        $this->assertTrue(strpos(get_class($logs[0]), 'Conekta\ConektaObject') !== false);
    }
}
