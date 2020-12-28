<?php
/**
* 2007-2018 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
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
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2018 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

class Ps_BuybuttonLite extends Module
{
    public function __construct()
    {
        $this->name = 'ps_buybuttonlite';
        $this->tab = 'administration';
        $this->version = '1.0.1';
        $this->author = 'PrestaShop';
        $this->need_instance = 0;

        $this->module_key = '80c29e3aad22cbb2a9297b6cb4e8fff8';

        $this->bootstrap = true;

        parent::__construct();

        $this->controllerAdmin = 'AdminAjaxPs_buybuttonlite';

        $this->displayName = $this->trans('Buy button lite', array(), 'Modules.Buybuttonlite.Admin');
        $this->description = $this->trans('Increase your conversion rate and boost your sales, generate links and add them to your content so that visitors can easily proceed to checkout', array(), 'Modules.Buybuttonlite.Admin');
        $this->ps_version = (bool)version_compare(_PS_VERSION_, '1.7', '>=');

        // Settings paths
        $this->css_path = $this->_path.'views/css/';

        // Confirm uninstall
        $this->confirmUninstall = $this->trans('Are you sure you want to uninstall this module?', array(), 'Modules.Legalcompliance.Admin');
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
    }

    /**
     * install()
     *
     * @param none
     * @return bool
     */
    public function install()
    {
        return parent::install() && $this->installTab();
    }

    /**
     * uninstall()
     *
     * @param none
     * @return bool
     */
    public function uninstall()
    {
        return parent::uninstall() && $this->uninstallTab();
    }

    /**
     * Register admin controller (ajax call)
     *
     * @param none
     * @return bool
     */
    public function installTab()
    {
        $tab = new Tab();
        $tab->class_name = $this->controllerAdmin;
        $tab->active = 1;
        $tab->name = array();
        foreach (Language::getLanguages(true) as $lang) {
            $tab->name[$lang['id_lang']] = $this->name;
        }
        $tab->id_parent = -1;
        $tab->module = $this->name;

        return $tab->add();
    }

    /**
     * Unregister admin controller
     *
     * @param none
     * @return bool
     */
    public function uninstallTab()
    {
        $id_tab = (int)Tab::getIdFromClassName($this->controllerAdmin);
        $tab = new Tab($id_tab);
        if (Validate::isLoadedObject($tab)) {
            return $tab->delete();
        }
    }

    /**
     * Load dependencies
     *
     * @param none
     * @return bool
     */
    public function loadAsset()
    {
        $css = array(
            'https://cdnjs.cloudflare.com/ajax/libs/element-ui/2.4.7/theme-chalk/index.css',
            $this->css_path.'override-element-ui.css',
            $this->css_path.'app.css',
            $this->css_path.'back.css',
        );

        return $this->context->controller->addCSS($css, 'all');
    }

    /**
     * Load the configuration form
     */
    public function getContent()
    {
        $this->loadAsset();

        $link = new Link();
        $adminAjaxController = $link->getAdminLink($this->controllerAdmin);

        $trackingAddonsUrl = $this->getAddonsTrackingUrl();

        $confTranslations = array(
            'selectProduct' => $this->trans('Select a product', array(), 'Modules.Buybuttonlite.Admin'),
            'searchProduct' => $this->trans('Search for a product', array(), 'Admin.Orderscustomers.Feature'),
            'action' => $this->trans('Action', array(), 'Admin.Global'),
            'sharableLink' => $this->trans('Get sharable link', array(), 'Modules.Buybuttonlite.Admin'),
            'errorFormSelectProduct' => $this->trans('Please select a product', array(), 'Modules.Buybuttonlite.Admin'),
            'errorFormSelectAction' => $this->trans('Please select an action', array(), 'Modules.Buybuttonlite.Admin'),
            'copyToClipboard' => $this->trans('Copy to clipboard', array(), 'Admin.Global'),
            'linkPlaceholder' => $this->trans('Please select a product and an action', array(), 'Modules.Buybuttonlite.Admin'),
            'linkCopied' => $this->trans('Link copied to clipboard', array(), 'Modules.Buybuttonlite.Admin'),
            'alertCustomizableProduct' => $this->trans('The selected product is customizable, if it is added to cart through that shareable link, it won\'t get any customization. We recommend to share product page link instead.', array(), 'Modules.Buybuttonlite.Admin'),
        );

        $bannerPromoTranslations = array(
            'copyToClipboard' => $this->trans('Copy to clipboard', array(), 'Admin.Global'),
            'discover' => $this->trans('Discover', array(), 'Admin.Modules.Feature'),
            'screenshots' => $this->trans('Screenshots', array(), 'Admin.Global'),
            'goFurther' => $this->trans('Want to go further?', array(), 'Modules.Buybuttonlite.Admin'),
            'addonsMarketplace' => $this->trans('PrestaShop Addons Marketplace', array(), 'Admin.Modules.Feature'),
            'discoverOn' => $this->trans('Discover on Addons Marketplace', array(), 'Admin.Modules.Feature'),
            'developedBy' => $this->trans('Developed by PrestaShop', array(), 'Admin.Global')
        );

        Media::addJsDef(array(
            'context' => json_encode(Context::getContext()),
            'confTranslations' => json_encode($confTranslations),
            'bannerPromoTranslations' => json_encode($bannerPromoTranslations),
            'adminAjaxController' => $adminAjaxController,
            'trackingAddonsLink' => $trackingAddonsUrl,
            'redirectControllerUrl' => preg_replace('#&id_lang=[0-9]{1,2}$#', '', $this->context->link->getModuleLink($this->name, 'RedirectManager', array(), true)),
            'psBaseUrl' => Tools::getHttpHost(true),
            'psVersion' => _PS_VERSION_
        ));

        $this->context->smarty->assign('modulePath', $this->_path);

        return $this->context->smarty->fetch($this->local_path.'views/templates/admin/app.tpl');
    }

    /**
     * Generate addons url tracking depending the language
     *
     * @param none
     * @return string url tracking addons
     */
    public function getAddonsTrackingUrl()
    {
        $availableTrackingLanguage = array('en', 'fr', 'es', 'it', 'de', 'nl', 'pt', 'pl', 'ru');

        $iso_code = 'en';
        if (in_array($this->context->language->iso_code, $availableTrackingLanguage)) {
            $iso_code = $this->context->language->iso_code;
        }

        return 'https://addons.prestashop.com/'.$iso_code.'/blog-forum-actualites/41139-buy-button.html?utm_source=back-office&utm_medium=native-module&utm_campaign=back-office-'.strtoupper($iso_code).'&utm_content=Permalink';
    }
}
