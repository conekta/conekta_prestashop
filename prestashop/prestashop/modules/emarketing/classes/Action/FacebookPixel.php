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

namespace Emarketing\Action;

/**
 * Class FacebookTracker
 * @package Emarketing\Action
 */
class FacebookPixel
{
    /**
     * @param $postData
     * @return bool|array
     * @throws \Exception
     */
    public function receivePixel($postData)
    {
        $serviceTracker = new \Emarketing\Service\FacebookPixel();

        $globalTag = $this->getCode($postData, 'global_tag');

        $viewContent = $this->getCode($postData, 'view_content_snippet');

        $addToCart = $this->getCode($postData, 'add_to_cart_snippet');

        $purchase = $this->getCode($postData, 'purchase_snippet');

        return $serviceTracker->savePixel($globalTag, $viewContent, $addToCart, $purchase);
    }

    /**
     * @param $postData
     * @param $name
     * @return string|null
     */
    private function getCode($postData, $name)
    {
        if (!isset($postData[$name])) {
            return null;
        }

        return $postData[$name];
    }
}
