<?php
/**
 * 2007-2020 PrestaShop and Contributors
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2020 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */
if (!defined('_PS_VERSION_')) {
    exit;
}

class Ps_faviconnotificationbo extends Module
{
    const CONFIG_COUNT_ORDER_NOTIFICATION = 'CHECKBOX_ORDER';
    const CONFIG_COUNT_CUSTOMER_NOTIFICATION = 'CHECKBOX_CUSTOMER';
    const CONFIG_COUNT_MSG_NOTIFICATION = 'CHECKBOX_MESSAGE';
    const CONFIG_FAVICON_BACKGROUND_COLOR = 'BACKGROUND_COLOR_FAVICONBO';
    const CONFIG_FAVICON_TXT_COLOR = 'TEXT_COLOR_FAVICONBO';
    const HOOKS = [
        'displayBackOfficeHeader',
    ];
    const ADMINCONTROLLERS = [
        'adminConfigure' => 'AdminConfigureFaviconBo',
    ];

    public function __construct()
    {
        $this->name = 'ps_faviconnotificationbo';
        $this->tab = 'administration';
        $this->version = '2.1.0';
        $this->author = 'PrestaShop';
        $this->module_key = '91315ca88851b6c2852ee4be0c59b7b1';

        parent::__construct();

        $this->displayName = $this->trans('Order Notifications on the Favicon', [], 'Modules.Faviconnotificationbo.Admin');
        $this->description = $this->trans('Be notified of each new order, client or message directly in the browser tab of your back office, even when working on another page', [], 'Modules.Faviconnotificationbo.Admin');
        $this->ps_versions_compliancy = ['min' => '1.7.6.0', 'max' => _PS_VERSION_];
    }

    /**
     * @return bool
     */
    public function install()
    {
        return parent::install()
            && $this->registerHook(static::HOOKS)
            && $this->installConfiguration()
            && $this->installTabs();
    }

    /**
     * @return bool
     */
    public function installConfiguration()
    {
        return (bool) Configuration::updateValue(static::CONFIG_COUNT_ORDER_NOTIFICATION, '1')
            && (bool) Configuration::updateValue(static::CONFIG_COUNT_CUSTOMER_NOTIFICATION, '1')
            && (bool) Configuration::updateValue(static::CONFIG_COUNT_MSG_NOTIFICATION, '1')
            && (bool) Configuration::updateValue(static::CONFIG_FAVICON_BACKGROUND_COLOR, '#DF0067')
            && (bool) Configuration::updateValue(static::CONFIG_FAVICON_TXT_COLOR, '#FFFFFF');
    }

    /**
     * @return bool
     */
    public function installTabs()
    {
        $result = true;

        foreach (static::ADMINCONTROLLERS as $controller_name) {
            if (Tab::getIdFromClassName($controller_name)) {
                continue;
            }

            $tab = new Tab();
            $tab->class_name = $controller_name;
            $tab->module = $this->name;
            $tab->active = true;
            $tab->id_parent = -1;
            $tab->name = array_fill_keys(
                Language::getIDs(false),
                $this->displayName
            );
            $result = $result && (bool) $tab->add();
        }

        return $result;
    }

    /**
     * @return bool
     */
    public function uninstall()
    {
        return parent::uninstall()
            && $this->uninstallConfiguration()
            && $this->uninstallTabs();
    }

    /**
     * @return bool
     */
    public function uninstallConfiguration()
    {
        return (bool) Configuration::deleteByName(static::CONFIG_COUNT_ORDER_NOTIFICATION)
            && (bool) Configuration::deleteByName(static::CONFIG_COUNT_CUSTOMER_NOTIFICATION)
            && (bool) Configuration::deleteByName(static::CONFIG_COUNT_MSG_NOTIFICATION)
            && (bool) Configuration::deleteByName(static::CONFIG_FAVICON_BACKGROUND_COLOR)
            && (bool) Configuration::deleteByName(static::CONFIG_FAVICON_TXT_COLOR);
    }

    /**
     * @return bool
     */
    public function uninstallTabs()
    {
        $result = true;

        foreach (Tab::getCollectionFromModule($this->name) as $tab) {
            /** @var Tab $tab */
            $result = $result && (bool) $tab->delete();
        }

        return $result;
    }

    /**
     * Redirect to our ModuleAdminController when click on Configure button
     */
    public function getContent()
    {
        Tools::redirectAdmin($this->context->link->getAdminLink(static::ADMINCONTROLLERS['adminConfigure']));
    }

    /**
     * @param array $params
     *
     * @return string
     */
    public function hookDisplayBackOfficeHeader(array $params)
    {
        $this->context->controller->addJS([
            $this->getPathUri() . 'views/js/favico.js',
            $this->getPathUri() . 'views/js/ps_faviconnotificationbo.js',
        ]);

        $this->context->smarty->assign([
            'bofaviconBgColor' => Configuration::get(static::CONFIG_FAVICON_BACKGROUND_COLOR),
            'bofaviconTxtColor' => Configuration::get(static::CONFIG_FAVICON_TXT_COLOR),
            'bofaviconOrder' => Configuration::get(static::CONFIG_COUNT_ORDER_NOTIFICATION),
            'bofaviconCustomer' => Configuration::get(static::CONFIG_COUNT_CUSTOMER_NOTIFICATION),
            'bofaviconMsg' => Configuration::get(static::CONFIG_COUNT_MSG_NOTIFICATION),
            'bofaviconUrl' => $this->context->link->getAdminLink('AdminCommon'),
        ]);

        return $this->context->smarty->fetch($this->getLocalPath() . 'views/templates/hook/displayBackOfficeHeader.tpl');
    }
}
