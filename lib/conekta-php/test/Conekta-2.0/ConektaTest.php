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

class ConektaTest extends BaseTest
{
    public function setEnvLocale($locale)
    {
        Conekta::setLocale($locale);
    }

    public function setPlugin($plugin)
    {
        Conekta::setPlugin($plugin);
    }

    public function setPluginVersion($version)
    {
        Conekta::setPluginVersion($version);
    }

    public function testApiLocaleInitializerStyle()
    {
        $this->setEnvLocale('en');
        $this->assertTrue(Conekta::$locale == 'en');
        $this->setEnvLocale('es');
    }

    public function testPluginInitializerStyle()
    {
        $this->setApiKey();
        $this->setPlugin('Magento 2');
        $this->setPluginVersion('2.0.0');
        $this->assertTrue(Conekta::getPlugin() == 'Magento 2');
        $this->assertTrue(Conekta::getPluginVersion() == '2.0.0');
    }
}
