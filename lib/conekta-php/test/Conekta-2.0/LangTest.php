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

class LangTest extends BaseTest
{
    public function testShouldTranslatesMessage()
    {
        $langEnTest = Lang::translate('error.resource.id_purchaser', Lang::EN);
        $langEsTest = Lang::translate('error.resource.id_purchaser', Lang::ES);
        $langEnOut = 'There was an error. Please contact system administrator.';
        $langEsOut = 'Hubo un error. Favor de contactar al administrador del sistema.';
        $this->assertTrue($langEnTest == $langEnOut);
        $this->assertTrue($langEsTest == $langEsOut);
    }
}
