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

use Emarketing\ClientError;

/**
 * Class Categories
 * @package Emarketing\Action
 */
class Categories
{
    /**
     * @param $postData
     * @return array
     * @throws ClientError
     */
    public function fetchCategory($postData)
    {
        $idCategory = $this->getIdCategory($postData);

        $idLang = $this->getIdLanguage($postData);

        $serviceCategory = new \Emarketing\Service\Category;

        return $serviceCategory->buildCategoryInformation($idCategory, $idLang);
    }

    /**
     * @param $postData
     * @return string
     * @throws ClientError
     */
    private function getIdCategory($postData)
    {
        if (!isset($postData['id_category']) || !is_numeric($postData['id_category'])) {
            throw new ClientError('Invalid Category ID');
        }

        if ($postData['id_category'] === 0) {
            return \Configuration::get('PS_HOME_CATEGORY');
        }

        return $postData['id_category'];
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
