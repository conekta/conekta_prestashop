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
 * Class Carriers
 * @package Emarketing\Service
 */
class Carriers
{
    /**
     * @param $idLang
     * @param $idCountry
     * @param \Product $psProduct
     * @return array
     * @throws \PrestaShopException
     */
    public function buildCarrierInformation($idLang, $idCountry, $psProduct)
    {
        $idZone = \Country::getIdZone($idCountry);

        $carriers = $this->getAllCarriers($idLang, $idZone);

        foreach ($carriers as $carrierKey => $carrier) {
            $carriers[$carrierKey]['price'] = $this->getShippingCost($idZone, $psProduct, $carrier);
        }

        return $carriers;
    }

    /**
     * @param $idLang
     * @param $idZone
     * @return array
     */
    private function getAllCarriers($idLang, $idZone)
    {
        return \Carrier::getCarriers($idLang, true, false, $idZone, null, \Carrier::ALL_CARRIERS);
    }

    /**
     * @param $idZone
     * @param \Product $psProduct
     * @param $carrier
     * @return bool|float
     * @throws \PrestaShopException
     */
    private function getShippingCost($idZone, $psProduct, $carrier)
    {
        $carrier = new \Carrier($carrier['id_carrier']);

        $rangeTable = $carrier->getRangeTable();

        if ($rangeTable == 'range_weight') {
            $costs = $this->getCostsByWeight($carrier, $psProduct->weight, $idZone, $carrier->range_behavior);
        }

        if ($rangeTable == 'range_price') {
            $costs = $this->getCostsByPrice($carrier, $psProduct->price, $idZone, $carrier->range_behavior);
        }

        if (empty($costs)) {
            return false;
        }

        $address = \Address::initialize();
        $carrierTax = $carrier->getTaxesRate($address);

        if (!empty($carrierTax)) {
            return $costs + ($costs * $carrierTax / 100);
        }

        return $costs;
    }

    /**
     * @param \Carrier $carrier
     * @param $productWeight
     * @param $idZone
     * @param $rangeBehaviour
     * @return bool|float
     */
    private function getCostsByWeight($carrier, $productWeight, $idZone, $rangeBehaviour)
    {
        $priceByWeightCheck = \Carrier::checkDeliveryPriceByWeight($carrier->id, $productWeight, $idZone);
        if ($priceByWeightCheck || $rangeBehaviour == 0) {
            return $carrier->getDeliveryPriceByWeight($productWeight, $idZone);
        }

        return false;
    }

    /**
     * @param \Carrier $carrier
     * @param $productPrice
     * @param $idZone
     * @param $rangeBehaviour
     * @return bool|float
     */
    private function getCostsByPrice($carrier, $productPrice, $idZone, $rangeBehaviour)
    {
        $priceByPriceCheck = \Carrier::checkDeliveryPriceByPrice($carrier->id, $productPrice, $idZone);
        if ($priceByPriceCheck || $rangeBehaviour == 0) {
            return $carrier->getDeliveryPriceByPrice($productPrice, $idZone);
        }

        return false;
    }
}
