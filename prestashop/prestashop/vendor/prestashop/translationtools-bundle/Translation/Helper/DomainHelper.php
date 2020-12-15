<?php

/**
 * 2007-2016 PrestaShop.
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
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2015 PrestaShop SA
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

namespace PrestaShop\TranslationToolsBundle\Translation\Helper;

class DomainHelper
{
    /**
     * @param string $localPath
     *
     * @return string
     */
    public static function getCrowdinPath($localPath)
    {
        $segments = explode(DIRECTORY_SEPARATOR, $localPath);
        $directorySegments = array_slice($segments, 0, 2);

        if (count($directorySegments) !== count($segments)) {
            return implode(DIRECTORY_SEPARATOR, $directorySegments).DIRECTORY_SEPARATOR.implode('.', array_slice($segments, 2));
        }

        return implode(DIRECTORY_SEPARATOR, $directorySegments);
    }

    /**
     * @param string $domain
     *
     * @return string
     */
    public static function getExportPath($domain)
    {
        return str_replace('.', DIRECTORY_SEPARATOR, $domain);
    }

    /**
     * @param string $exportPath
     *
     * @return string
     */
    public static function getDomain($exportPath)
    {
        return str_replace(DIRECTORY_SEPARATOR, '.', $exportPath);
    }

    /**
     * Builds a module domain name for the legacy system
     *
     * @param string $moduleName Name of the module (eg. ps_themecusto)
     * @param string $sourceFileName Filename where the wording was found (eg. someFile.tpl)
     *
     * @return string The domain name (eg. Modules.Psthemecusto.somefile)
     */
    public static function buildModuleDomainFromLegacySource($moduleName, $sourceFileName)
    {
        $transformedModuleName = self::buildModuleDomainNameComponent($moduleName);

        if (empty($sourceFileName)) {
            $source = self::transformDomainComponent($moduleName);
        } else {
            $source = strtolower(basename($sourceFileName, '.tpl'));

            // sourced from https://github.com/PrestaShop/PrestaShop/blob/1.6.1.x/classes/Translate.php#L174-L178
            if ('controller' == substr($source, -10, 10)) {
                $source = substr($source, 0, -10);
            }

            $source = ucfirst($source);
        }

        $domain = 'Modules.' . $transformedModuleName . '.' . $source;

        return $domain;
    }

    /**
     * Returns the base domain for the provided module name
     *
     * @param string $moduleName
     * @param bool $withDots True to use separating dots
     *
     * @return string
     */
    public static function buildModuleBaseDomain($moduleName, $withDots = false)
    {
        $domain = 'Modules';

        if ($withDots) {
            $domain .= '.';
        }

        $domain .= self::buildModuleDomainNameComponent($moduleName);

        return $domain;
    }

    /**
     * Transforms the module name to use in a domain
     *
     * @param string $moduleName
     *
     * @return string
     */
    private static function buildModuleDomainNameComponent($moduleName)
    {
        if ('ps_' === substr($moduleName, 0, 3)) {
            $moduleName = substr($moduleName, 3);
        }

        return self::transformDomainComponent($moduleName);
    }

    /**
     * Formats a domain component by removing unwanted characters
     *
     * @param string $component
     *
     * @return string
     */
    private static function transformDomainComponent($component)
    {
        return ucfirst(
            strtr(
                strtolower($component),
                ['_' => '']
            )
        );
    }
}
