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
use Emarketing\Service\Products\PriceCalculation;

/**
 * Class FacebookPixel
 * @package Emarketing\Service
 */
class FacebookPixel extends Snippets
{
    /**
     * @param $globalTag
     * @param $viewContent
     * @param $addToCart
     * @param $purchase
     * @return bool
     * @throws \Exception
     */
    public function savePixel($globalTag, $viewContent, $addToCart, $purchase)
    {
        $this->saveInConfiguration('FB_GLOBAL', $globalTag);
        $this->saveInConfiguration('FB_VIEWCONTENT', $viewContent);
        $this->saveInConfiguration('FB_ADDTOCART', $addToCart);
        $this->saveInConfiguration('FB_PURCHASE', $purchase);

        return true;
    }

    /**
     * @return string
     */
    public function getGlobalTagSnippet()
    {
        $snippet = $this->getFromConfiguration('FB_GLOBAL');

        return $snippet;
    }

    /**
     * @return string
     */
    public function getViewContentSnippet()
    {
        $snippet = $this->getFromConfiguration('FB_VIEWCONTENT');

        return $this->replaceProductPageVariables($snippet);
    }

    /**
     * @return string
     */
    public function getAddToCartSnippet()
    {
        $snippet = $this->getFromConfiguration('FB_ADDTOCART');

        $snippet = preg_replace(
            ['/<script>/', '/<\/script>/'],
            ["<script>\ndocument.addEventListener('DOMContentLoaded', function(event) {\n document.querySelectorAll('.add-to-cart, #add_to_cart button, #add_to_cart a, #add_to_cart input').forEach(function(a){\na.addEventListener('click', function(){", "});});});\n</script>"],
            $snippet
        );

        return $this->replaceProductPageVariables($snippet);
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getPurchaseSnippet()
    {
        $snippet = $this->getFromConfiguration('FB_PURCHASE');

        $order = new \Order(\Tools::getValue('id_order'));

        $currency = new \Currency($order->id_currency);

        $snippet = preg_replace(
            ['/\bREPLACE_VALUE\b/', '/\bCURRENCY\b/'],
            [\Tools::ps_round($order->total_paid, 2), $currency->iso_code],
            $snippet
        );

        return $snippet;
    }

    /**
     * @param $snippet
     * @return string
     */
    private function replaceProductPageVariables($snippet)
    {
        $product = \Context::getContext()->controller->getProduct();

        $category = new \Category($product->id_category_default);
        $categoryName = is_array($category->name) ? reset($category->name) : $category->name;

        $currentCurrency = \Context::getContext()->currency;

        $priceCalculation = new PriceCalculation();
        $price = $priceCalculation->getFinalPrice($currentCurrency->id, $product->id, true, \Tools::getValue('id_product_attribute'));

        $snippet = preg_replace(
            ['/\bREPLACE_CONTENT\b/', '/\bREPLACE_CATEGORY\b/', '/\bREPLACE_CONTENT_ID\b/', '/\bREPLACE_VALUE\b/', '/\bCURRENCY\b/'],
            [$product->name, $categoryName, $product->id, $price, $currentCurrency->iso_code],
            $snippet
        );

        return $snippet;
    }
}
