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
class AdminConfigureFaviconBoController extends ModuleAdminController
{
    public function __construct()
    {
        $this->bootstrap = true;
        $this->className = 'Configuration';
        $this->table = 'configuration';

        parent::__construct();

        $this->fields_options = [
            'ps_faviconnotificationbo' => [
                'title' => $this->trans('Configuration', [], 'Admin.Global'),
                'info' => $this->trans('Display notifications in the browser tab for:', [], 'Modules.Faviconnotificationbo.Admin'),
                'fields' => [
                    Ps_faviconnotificationbo::CONFIG_COUNT_ORDER_NOTIFICATION => [
                        'type' => 'bool',
                        'title' => $this->trans('New orders', [], 'Modules.Faviconnotificationbo.Admin'),
                        'validation' => 'isBool',
                        'cast' => 'intval',
                    ],
                    Ps_faviconnotificationbo::CONFIG_COUNT_CUSTOMER_NOTIFICATION => [
                        'type' => 'bool',
                        'title' => $this->trans('New customers', [], 'Admin.Navigation.Header'),
                        'validation' => 'isBool',
                        'cast' => 'intval',
                    ],
                    Ps_faviconnotificationbo::CONFIG_COUNT_MSG_NOTIFICATION => [
                        'type' => 'bool',
                        'title' => $this->trans('New messages', [], 'Admin.Orderscustomers.Feature'),
                        'validation' => 'isBool',
                        'cast' => 'intval',
                    ],
                    Ps_faviconnotificationbo::CONFIG_FAVICON_BACKGROUND_COLOR => [
                        'type' => 'color',
                        'title' => $this->trans('Notification background color', [], 'Modules.Faviconnotificationbo.Admin'),
                        'validation' => 'isColor',
                        'required' => false,
                    ],
                    Ps_faviconnotificationbo::CONFIG_FAVICON_TXT_COLOR => [
                        'type' => 'color',
                        'title' => $this->trans('Notification text color', [], 'Modules.Faviconnotificationbo.Admin'),
                        'validation' => 'isColor',
                        'required' => false,
                    ],
                ],
                'submit' => [
                    'title' => $this->trans('Save', [], 'Admin.Actions'),
                ],
            ],
        ];
    }
}
