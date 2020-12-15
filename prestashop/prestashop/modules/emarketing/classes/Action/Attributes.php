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
 * Class Attributes
 * @package Emarketing\Action
 */
class Attributes
{
    /**
     * @param $postData
     * @return array
     */
    public function fetchAttributes($postData)
    {
        $idLang = $this->getIdLanguage($postData);

        $serviceAttributes = new \Emarketing\Service\Attributes;

        return $serviceAttributes->buildAttributeInformation($idLang);
    }

    /**
     * @param $postData
     * @return mixed
     */
    private function getIdLanguage($postData)
    {
        if (!isset($postData['id_language']) || !is_numeric($postData['id_language'])) {
            return \Context::getContext()->language->id;
        }

        return $postData['id_language'];
    }
}
