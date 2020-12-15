<?php
/*
* 2007-2016 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2016 PrestaShop SA
*  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

class GamificationTools
{
    public static function parseMetaData($content)
    {
        $meta_data = array(
            'PREFIX_' => _DB_PREFIX_,
            );
        //replace define
        $content = str_replace(array_keys($meta_data), array_values($meta_data), $content);
        
        //replace meta data
        $content = preg_replace_callback('#\{config\}([a-zA-Z0-9_-]*)\{/config\}#', function ($matches) {
            return Configuration::get($matches[1]);
        }, $content);
        $content = preg_replace_callback('#\{link\}(.*)\{/link\}#', function ($matches) {
            return Context::getContext()->link->getAdminLink($matches[1]);
        }, $content);
        $content = preg_replace_callback('#\{employee\}(.*)\{/employee\}#', function ($matches) {
            return Context::getContext()->employee->$matches[1];
        }, $content);
        $content = preg_replace_callback('#\{language\}(.*)\{/language\}#', function ($matches) {
            return Context::getContext()->language->$matches[1];
        }, $content);
        $content = preg_replace_callback('#\{country\}(.*)\{/country\}#', function ($matches) {
            return Context::getContext()->country->$matches[1];
        }, $content);
        
        return $content;
    }

    /**
     * Retrieve Json api file, forcing gzip compression to save bandwith.
     *
     * @param string $url
     * @param bool $withResponseHeaders
     *
     * @return string|bool
     */
    public static function retrieveJsonApiFile($url, $withResponseHeaders = false)
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_MAXREDIRS, 2);
        // @see https://cloud.google.com/appengine/kb/#compression
        curl_setopt($curl, CURLOPT_ENCODING, 'gzip');
        curl_setopt($curl, CURLOPT_USERAGENT, 'gzip');
        curl_setopt($curl, CURLOPT_HEADER, $withResponseHeaders);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $content = curl_exec($curl);

        curl_close($curl);

        return $content;
    }
}
