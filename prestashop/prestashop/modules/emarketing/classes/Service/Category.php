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

use Emarketing\ClientError;

/**
 * Class Category
 * @package Emarketing\Service
 */
class Category
{
    /**
     * @param $idCategory
     * @param $idLang
     * @return array
     * @throws ClientError
     */
    public function buildCategoryInformation($idCategory, $idLang)
    {
        $category = new \Category($idCategory);

        if (empty($category) || empty($category->id_category)) {
            throw new ClientError('No category with this ID');
        }

        $categoryData = get_object_vars($category);

        $categoryData['url'] = $category->getLink(null, $idLang);

        $categoryData['children'] = $category->getSubCategories($idLang, true);

        return $categoryData;
    }
}
