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

/**
 * Class FrontendHeader
 * @package Emarketing\Service
 */
class FrontendHeader
{
    /**
     * @return string
     * @throws \Exception
     */
    public function buildHtml()
    {
        $currentPage = \Context::getContext()->controller->php_self;

        $html = "<!-- emarketing start -->\n";

        $html .= $this->buildGoogle($currentPage);

        $html .= $this->buildFacebook($currentPage);

        $html .= "<!-- emarketing end -->";

        return $html;
    }

    /**
     * @param $currentPage
     * @return string
     * @throws \Exception
     */
    private function buildGoogle($currentPage)
    {
        $serviceVerification = new Verification;
        $html = $serviceVerification->getTag() . "\n";

        $serviceTracker = new GoogleTracker();
        $html .= $serviceTracker->getGlobalSiteTracker() . "\n";

        if ($currentPage == 'order-confirmation') {
            $html .= $serviceTracker->getConversionTracker() . "\n";
        }

        return $html;
    }

    /**
     * @param $currentPage
     * @return string
     * @throws \Exception
     */
    private function buildFacebook($currentPage)
    {
        $serviceTracker = new FacebookPixel();

        $html = $serviceTracker->getGlobalTagSnippet() . "\n";

        if ($currentPage == 'product') {
            $html .= $serviceTracker->getViewContentSnippet() . "\n";
            $html .= $serviceTracker->getAddToCartSnippet() . "\n";
        }

        if ($currentPage == 'order-confirmation') {
            $html .= $serviceTracker->getPurchaseSnippet() . "\n";
        }

        return $html;
    }
}
