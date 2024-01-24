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
 * @version   GIT: @2.3.7@
 *
 * @see       https://conekta.com/
 */

namespace DigitalFemsa;

abstract class Conekta
{
    public static $apiKey;

    public static $apiBase = 'https://api.conekta.io';

    public static $apiVersion = '2.0.0';

    public static $locale = 'es';

    public static $plugin = '';

    public static $pluginVersion = '';

    public const VERSION = '4.0.2';

    public static function setApiKey($apiKey)
    {
        self::$apiKey = $apiKey;
    }

    public static function setApiVersion($version)
    {
        self::$apiVersion = $version;
    }

    public static function setLocale($locale)
    {
        self::$locale = $locale;
    }

    public static function setPlugin($plugin = '')
    {
        self::$plugin = $plugin;
    }

    public static function setPluginVersion($pluginVersion = '')
    {
        self::$pluginVersion = $pluginVersion;
    }

    public static function getPlugin()
    {
        return self::$plugin;
    }

    public static function getPluginVersion()
    {
        return self::$pluginVersion;
    }
}
