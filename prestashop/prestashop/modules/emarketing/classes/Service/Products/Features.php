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
 * Class Features
 * @package Emarketing\Service
 */
class Features
{
    /**
     * @param \Product $psProduct
     * @param $idLang
     * @return array
     * @throws \PrestaShopException
     */
    public function buildFeatureInformation($psProduct, $idLang)
    {
        $features = $psProduct->getFeatures();

        $featureData = array();
        foreach ($features as $feature) {
            $featureData[] = $this->getValue($feature['id_feature_value'], $idLang);
        }

        return $featureData;
    }

    /**
     * @param $idValue
     * @param $idLang
     * @return \FeatureValue
     * @throws \PrestaShopException
     */
    private function getValue($idValue, $idLang)
    {
        $featureValue = new \FeatureValue($idValue, $idLang);

        return get_object_vars($featureValue);
    }
}
