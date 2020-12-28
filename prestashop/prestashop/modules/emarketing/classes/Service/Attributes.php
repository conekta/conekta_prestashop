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
 * Class Attributes
 * @package Emarketing\Service
 */
class Attributes
{
    /**
     * @param $idLang
     * @return array
     */
    public function buildAttributeInformation($idLang)
    {
        $attrGroups = \AttributeGroup::getAttributesGroups($idLang);

        $features = \Feature::getFeatures($idLang);

        $mapData = array(
            'attributes' => $attrGroups,
            'features' => $features
        );

        return $mapData;
    }
}
