<?php
/**
 * NOTICE OF LICENSE
 *
 * This file is licenced under the GNU General Public License, version 3 (GPL-3.0).
 * With the purchase or the installation of the software in your application
 * you accept the licence agreement.
 *
 * @author    emarketing www.emarketing.com <integrations@emarketing.com>
 * @copyright 2020 emarketing AG
 * @license   https://opensource.org/licenses/GPL-3.0 GNU General Public License version 3
 */

class AdminEmarketingController extends ModuleAdminController
{
    /**
     * AdminEmarketingController constructor.
     * @throws PrestaShopException
     */
    public function __construct()
    {
        parent::__construct();

        \Tools::redirectAdmin(\Context::getContext()->link->getAdminLink('AdminModules').'&configure=emarketing');
    }
}
