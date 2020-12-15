<?php
/**
* 2007-2018 PrestaShop
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
* @author PrestaShop SA <contact@prestashop.com>
* @copyright 2007-2018 PrestaShop SA
* @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
* International Registered Trademark & Property of PrestaShop SA
**/
class ThemeCustoRequests
{
    /**
     * Get all the modules by name
     *
     * @param string $moduleName
     *
     * @return array|false|PDOStatement|resource|null
     */
    public static function getModulesListByName($moduleName)
    {
        $sqlQuery = '   SELECT m.id_module, m.name, ms.enable_device as active
                    FROM `' . _DB_PREFIX_ . 'module` m
                    LEFT JOIN `' . _DB_PREFIX_ . 'module_shop` ms ON m.id_module = ms.id_module
                    WHERE m.name = "' . pSQL($moduleName) . '"';

        return Db::getInstance()->executeS($sqlQuery);
    }

    /**
     * Get the device status of a module
     *
     * @param int $moduleId
     *
     * @return string|false|null
     */
    public static function getModuleDeviceStatus($moduleId)
    {
        $sqlQuery = '   SELECT ms.enable_device as active
                        FROM `' . _DB_PREFIX_ . 'module_shop` ms
                        WHERE ms.id_module = ' . (int) $moduleId;

        return Db::getInstance()->getValue($sqlQuery);
    }
}
