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
 * Class PriceCalculation
 * @package Emarketing\Service
 */
class PriceCalculation
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
     * @param $idCurrency
     * @param $idProduct
     * @param $saleIncluded
     * @param $idVariant
     * @return string
     */
    public function getFinalPrice($idCurrency, $idProduct, $saleIncluded = false, $idVariant = false)
    {
        $specificPrice = \SpecificPrice::getSpecificPrice(
            $idProduct,
            $this->context->shop->id,
            $idCurrency,
            $this->context->country->id,
            1,
            1,
            $idVariant
        );

        return \Product::priceCalculation(
            $this->context->shop->id,
            $idProduct,
            $idVariant,
            $this->context->country->id,
            0,
            0,
            $idCurrency,
            1,
            1,
            true,
            2,
            false,
            $saleIncluded,
            true,
            $specificPrice,
            true
        );
    }
}
