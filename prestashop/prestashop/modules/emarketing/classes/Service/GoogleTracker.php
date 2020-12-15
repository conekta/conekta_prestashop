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

namespace Emarketing\Service;

use Emarketing\Service\Snippets\Snippets;

/**
 * Class GoogleTracker
 * @package Emarketing\Service
 */
class GoogleTracker extends Snippets
{
    /**
     * @param $globalSiteTracker
     * @param $conversionTracker
     * @return bool
     * @throws \Exception
     */
    public function saveTracker($globalSiteTracker, $conversionTracker)
    {
        $this->saveInConfiguration('GLOBAL_SITE_TRACKER', $globalSiteTracker);
        $this->saveInConfiguration('CONVERSION_TRACKER', $conversionTracker);

        return true;
    }

    /**
     * @return string
     */
    public function getGlobalSiteTracker()
    {
        $globalSiteTracker = $this->getFromConfiguration('GLOBAL_SITE_TRACKER');

        return $globalSiteTracker;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getConversionTracker()
    {
        $conversionTracker = $this->getFromConfiguration('CONVERSION_TRACKER');

        $order = new \Order(\Tools::getValue('id_order'));

        $currency = new \Currency($order->id_currency);

        $conversionTracker = preg_replace(
            ['/\'value\'\:[\s\S]+?,/', '/\'currency\'\:[\s\S]+?,/', '/\'transaction_id\'\:[\s\S]+?\'\'/'],
            ["'value': " . \Tools::ps_round($order->total_paid, 2) . ",", "'currency': '" . $currency->iso_code  . "',", "'transaction_id': '" . $order->id . "',"],
            $conversionTracker
        );

        return $conversionTracker;
    }
}
