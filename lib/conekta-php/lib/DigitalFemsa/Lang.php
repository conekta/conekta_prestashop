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

class Lang
{
    public const EN = 'en';

    public const ES = 'es';

    protected static $cache = [];

    public static function translate($key, $locale, $parameters = null)
    {
        $parameters = str_replace('DigitalFemsa\\', '', $parameters);

        $langs = self::readDirectory(dirname(__FILE__) . '/../locales/messages');

        $keys = explode('.', $locale . '.' . $key);
        $result = $langs[array_shift($keys)];

        foreach ($keys as $val) {
            $result = $result[$val];
        }

        if (is_array($parameters) && !empty($parameters)) {
            foreach ($parameters as $object => $val) {
                $result = str_replace($object, $val, $result);
            }
        }

        return $result;
    }

    protected static function readDirectory($directory)
    {
        if (!empty(self::$cache)) {
            return self::$cache;
        }

        $langs = [];

        if ($handle = opendir($directory)) {
            while ($lang = readdir($handle)) {
                if (strpos($lang, '.php') !== false) {
                    $langKey = str_replace('.php', '', $lang);
                    $langs[$langKey] = include $directory . '/' . $lang;
                }
            }

            closedir($handle);
        }

        self::$cache = $langs;

        return $langs;
    }
}
