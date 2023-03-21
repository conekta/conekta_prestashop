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

use PHPUnit\Framework\TestCase;

class BaseTest extends TestCase
{
    public function setApiKey()
    {
        $apiEnvKey = getenv('CONEKTA_API');

        if (!$apiEnvKey) {
            $apiEnvKey = 'key_ZLy4aP2szht1HqzkCezDEA';
        }
        Conekta::setApiKey($apiEnvKey);
    }

    public function setApiVersion($version)
    {
        Conekta::setApiVersion($version);
    }
}
