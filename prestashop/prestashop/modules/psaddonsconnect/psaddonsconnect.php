<?php
/**
 * 2007-2019 PrestaShop SA and Contributors
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to https://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2019 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0  Academic Free License (AFL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */
if (!defined('_PS_VERSION_')) {
    exit;
}
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    include_once __DIR__ . '/vendor/autoload.php';
}

use PrestaShop\Module\AddonsConnect\WeekAdvice;

class PsAddonsConnect extends Module
{
    public $bootstrap;
    public $js_path;
    public $img_path;
    public $logo_path;
    public $confirmUninstall;

    public function __construct()
    {
        // Settings
        $this->name = 'psaddonsconnect';
        $this->tab = '';
        $this->version = '2.1.2';
        $this->author = 'PrestaShop';
        $this->need_instance = 0;

        $this->module_key = 'b733732c35249557e6bc142fdc427f66';

        // bootstrap -> always set to true
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Tips and Updates module');
        $this->description = $this->l('2 in 1: Make security and functional updates easier for all modules in your store, and take advantage of an e-commerce tip each week to help you on your way.');

        // Settings paths
        $this->js_path = $this->_path . 'views/js/';
        $this->img_path = $this->_path . 'views/img/';
        $this->logo_path = $this->_path . 'logo.png';

        // Confirm uninstall
        $this->confirmUninstall = $this->l('Are you sure you want to uninstall this module?');
        $this->ps_versions_compliancy = array('min' => '1.7.4', 'max' => _PS_VERSION_);
    }

    /**
     * install()
     *
     * @return bool
     */
    public function install()
    {
        // register hook used by the module
        if (parent::install() &&
            $this->registerHook('dashboardZoneOne')) {
            //Update module position in Dashboard
            $query = 'SELECT id_hook FROM ' . _DB_PREFIX_ . "hook WHERE name = 'dashboardZoneOne'";

            /** @var array $result */
            $result = Db::getInstance()->ExecuteS($query);
            $id_hook = $result['0']['id_hook'];

            $this->updatePosition((int) $id_hook, false);

            return true;
        } else { // if something wrong return false
            $this->_errors[] = $this->l('There was an error during the installation. Please contact us through Addons website');

            return false;
        }
    }

    /**
     * uninstall()
     *
     * @return bool
     */
    public function uninstall()
    {
        Configuration::deleteByName('PS_ADDONS_CONNECT');

        // unregister hook
        if (parent::uninstall() &&
            $this->unregisterHook('dashboardZoneOne')) {
            return true;
        } else {
            $this->_errors[] = $this->l('There was an error during the desinstallation. Please contact us through Addons website');

            return false;
        }

        return parent::uninstall();
    }

    /**
     * load dependencies
     */
    public function loadAsset()
    {
        // Load JS
        $jss = array(
            $this->js_path . 'psaddonsconnect.js',
        );

        $this->context->controller->addJS($jss);

        // Clean memory
        unset($jss);
    }

    public function practicalLinks()
    {
        $id_lang = $this->context->language->id;
        $iso_lang = Language::getIsoById($id_lang);

        $url = array(
                'fr' => array(
                    'traffic' => 'https://addons.prestashop.com/fr/2-modules-prestashop?m=1&benefits=6&utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-FR&utm_content=traffic',
                    'conversion' => 'https://addons.prestashop.com/fr/2-modules-prestashop?m=1&benefits=1&utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-FR&utm_content=conversions',
                    'averageCart' => 'https://addons.prestashop.com/fr/2-modules-prestashop?m=1&benefits=3&utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-FR&utm_content=cart',
                    'businessSector' => 'https://addons.prestashop.com/fr/content/44-ressources-prestashop-les-outils-pour-reussir?utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-FR&utm_content=sector#modulebusinesssector', ),

                'en' => array(
                    'traffic' => 'https://addons.prestashop.com/en/2-modules-prestashop?m=1&benefits=6&utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-EN&utm_content=traffic',
                    'conversion' => 'https://addons.prestashop.com/en/2-modules-prestashop?m=1&benefits=1&utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-EN&utm_content=conversions',
                    'averageCart' => 'https://addons.prestashop.com/fr/2-modules-prestashop?m=1&benefits=3&utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-FR&utm_content=cart',
                    'businessSector' => 'https://addons.prestashop.com/fr/content/44-ressources-prestashop-les-outils-pour-reussir?utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-FR&utm_content=sector#modulebusinesssector', ),

                'es' => array(
                    'traffic' => 'https://addons.prestashop.com/es/2-modulos?m=1&benefits=6&utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-ES&utm_content=traffic',
                    'conversion' => 'https://addons.prestashop.com/es/2-modulos?m=1&benefits=1&utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-ES&utm_content=conversions',
                    'averageCart' => 'https://addons.prestashop.com/es/2-modulos?m=1&benefits=3&utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-ES&utm_content=cart',
                    'businessSector' => 'https://addons.prestashop.com/es/content/44-recursos-de-prestashop-herramientas-para-triunfar?utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-ES&utm_content=sector#modulebusinesssector', ),

                'de' => array(
                    'traffic' => 'https://addons.prestashop.com/de/2-modules-prestashop?m=1&benefits=6&utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-DE&utm_content=traffic',
                    'conversion' => 'https://addons.prestashop.com/de/2-modules-prestashop?m=1&benefits=1&utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-DE&utm_content=conversions',
                    'averageCart' => 'https://addons.prestashop.com/de/2-modules-prestashop?m=1&benefits=3&utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-DE&utm_content=cart',
                    'businessSector' => 'https://addons.prestashop.com/de/content/44-die-ressourcen-von-prestashop-die-tools-zu-ihrem-erfolg?utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-DE&utm_content=sector#modulebusinesssector', ),

                'it' => array(
                    'traffic' => 'https://addons.prestashop.com/it/2-modules-prestashop?m=1&benefits=6&utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-IT&utm_content=traffic',
                    'conversion' => 'https://addons.prestashop.com/it/2-modules-prestashop?m=1&benefits=1&utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-IT&utm_content=conversions',
                    'averageCart' => 'https://addons.prestashop.com/it/2-modules-prestashop?m=1&benefits=3&utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-IT&utm_content=cart',
                    'businessSector' => 'https://addons.prestashop.com/it/content/44-risorse-prestashop-gli-strumenti-per-avere-successo?utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-IT&utm_content=sector#modulebusinesssector', ),

                'nl' => array(
                    'traffic' => 'https://addons.prestashop.com/nl/2-modules-prestashop?m=1&benefits=6&utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-NL&utm_content=traffic',
                    'conversion' => 'https://addons.prestashop.com/nl/2-modules-prestashop?m=1&benefits=1&utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-NL&utm_content=conversions',
                    'averageCart' => 'https://addons.prestashop.com/nl/2-modules-prestashop?m=1&benefits=3&utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-NL&utm_content=cart',
                    'businessSector' => 'https://addons.prestashop.com/nl/content/44-prestashop-hulpmiddelen-de-tools-voor-een-succesvolle-webshop?utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-NL&utm_content=sector#modulebusinesssector', ),

                'pl' => array(
                    'traffic' => 'https://addons.prestashop.com/pl/2-moduly-prestashop?m=1&benefits=6&utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-PL&utm_content=traffic',
                    'conversion' => 'https://addons.prestashop.com/pl/2-2-moduly-prestashop?m=1&benefits=1&utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-PL&utm_content=conversions',
                    'averageCart' => 'https://addons.prestashop.com/pl/2-moduly-prestashop?m=1&benefits=3&utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-PL&utm_content=cart',
                    'businessSector' => 'https://addons.prestashop.com/pl/content/44-zasoby-prestashop-klucze-do-sukcesu?utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-PL&utm_content=sector#modulebusinesssector', ),

                'pt' => array(
                    'traffic' => 'https://addons.prestashop.com/pt/2-modules-prestashop?m=1&benefits=6&utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-PT&utm_content=traffic',
                    'conversion' => 'https://addons.prestashop.com/pt/2-modules-prestashop?m=1&benefits=1&utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-PT&utm_content=conversions',
                    'averageCart' => 'https://addons.prestashop.com/pt/2-modules-prestashop?m=1&benefits=3&utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-PT&utm_content=cart',
                    'businessSector' => 'https://addons.prestashop.com/pt/content/44-recursos-da-prestashop-as-ferramentas-para-o-seu-sucesso?utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-PT&utm_content=sector#modulebusinesssector', ),

                'ru' => array(
                    'traffic' => 'https://addons.prestashop.com/ru/2-modules-prestashop?m=1&benefits=6&utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-RU&utm_content=traffic',
                    'conversion' => 'https://addons.prestashop.com/ru/2-modules-prestashop?m=1&benefits=1&utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-RU&utm_content=conversions',
                    'averageCart' => 'https://addons.prestashop.com/ru/2-modules-prestashop?m=1&benefits=3&utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-RU&utm_content=cart',
                    'businessSector' => 'https://addons.prestashop.com/ru/content/44-prestashop-resources-the-tools-for-success?utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-RU&utm_content=sector#modulebusinesssector', ),
            );

        if (!isset($url[$iso_lang])) {
            return $url['en'];
        }

        return  $url[$iso_lang];
    }

    public function hookDashboardZoneOne($params)
    {
        $this->loadAsset();

        $addonsConnectionUrl = '';
        $logged_on_addons17 = 0;

        if (true === version_compare(_PS_VERSION_, '1.7', '>=')) {
            global $kernel;

            //router to get the addons URL
            $instance = $kernel->getContainer();
            $router = $instance->get('router');
            $addonsConnectionUrl = $router->generate('admin_addons_login');

            if (isset($_COOKIE['username_addons'])) {
                $logged_on_addons17 = 1;
            }
        }

        // API DATA
        $weekAdvice = new WeekAdvice();
        $weekAdviceData = $weekAdvice->getWeekData($this->context->language->iso_code);
        $advice = !empty($weekAdviceData['advice']) ? $weekAdviceData['advice'] : false;
        $currentLangIsoCode = $this->context->language->iso_code;
        $link_advice = false;
        if (!empty($weekAdviceData['link'])) {
            $link_advice = $weekAdviceData['link'] . "?utm_source=back-office&utm_medium=AddonsConnect&utm_campaign=back-office-$currentLangIsoCode&utm_content=tipofthemoment";
        }

        // assign var to smarty
        $this->context->smarty->assign(array(
            'img_path' => $this->img_path,
            'ps_version' => (bool) version_compare(_PS_VERSION_, '1.7', '>='),
            'advice' => $advice,
            'link_advice' => $link_advice,
            'url_connexion' => $addonsConnectionUrl,
            'logged_on_addons17' => $logged_on_addons17,
            'practical_links' => $this->practicalLinks(),
            'currentLangIsoCode' => $currentLangIsoCode,
        ));

        return $this->context->smarty->fetch($this->local_path . 'views/templates/hook/dashboard_zone_one.tpl');
    }
}
