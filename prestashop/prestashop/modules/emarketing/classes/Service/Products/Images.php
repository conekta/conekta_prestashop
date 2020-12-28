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

namespace Emarketing\Service\Products;

/**
 * Class Images
 * @package Emarketing\Service
 */
class Images
{
    /**
     * @var \Context
     */
    private $context;

    /**
     * Images constructor.
     */
    public function __construct()
    {
        $this->context= \Context::getContext();
    }

    /**
     * @param \Product $psProduct
     * @param $idLang
     * @return mixed
     */
    public function buildImageInformation($psProduct, $idLang)
    {
        $images = array();

        $productImages = $psProduct->getImages($idLang);
        $images['product'] = $this->addUrls($productImages, $psProduct->link_rewrite);

        $images['variants'] = array();
        $variantImages = $psProduct->getCombinationImages($idLang);
        if (empty($variantImages)) {
            return $images;
        }
        foreach ($variantImages as $variantImage) {
            $images['variants'][] = $this->addUrls($variantImage, $psProduct->link_rewrite);
        }

        return $images;
    }

    /**
     * @param $images
     * @param $linkRewrite
     * @return array
     */
    private function addUrls($images, $linkRewrite)
    {
        if (empty($images)) {
            return array();
        }

        $completeImages = array();
        foreach ($images as $image) {
            $image['url'] = $this->context->link->getImageLink($linkRewrite, $image['id_image']);

            $completeImages[] = $image;
        }

        return $completeImages;
    }
}
