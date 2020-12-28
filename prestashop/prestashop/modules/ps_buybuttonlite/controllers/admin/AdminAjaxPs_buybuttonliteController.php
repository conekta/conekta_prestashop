<?php
/**
* 2007-2018 PrestaShop
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
* @author    PrestaShop SA <contact@prestashop.com>
* @copyright 2007-2018 PrestaShop SA
* @license   http://addons.prestashop.com/en/content/12-terms-and-conditions-of-use
* International Registered Trademark & Property of PrestaShop SA
*/

class AdminAjaxPs_buybuttonliteController extends ModuleAdminController
{
    /**
     * Return product / product list matching the search
     *
     * @param string $query Product to search
     *
     * @return json
     */
    public function ajaxProcessSearchProducts()
    {
        $context = Context::getContext();
        $id_lang = $context->language->id;

        $query = Tools::getValue('product_search');

        $result = $this->getSqlQuery($query, $id_lang);

        if (!$result) {
            return false;
        }

        $productList = [];

        foreach ($result as $row) {
            if ($this->hasCombinations($row['id_product'])) {
                $row['attribute_name'] = $this->getAttributes($row['id_product_attribute'], $id_lang);
                $row['image_link'] = $this->getProductAttributeImage($row['id_product'], $row['id_product_attribute']);
            } else {
                $row['image_link'] = $this->getProductImage($row['id_product']);
            }
            $productList[] = $row;
        }

        $this->ajaxDie(json_encode($productList));
    }

    /**
     * Build the sql querry and return result
     *
     * @param string $query Product to search
     * @param int $id_lang
     *
     * @return array
     */
    public function getSqlQuery($query, $id_lang)
    {
        $sql = new DbQuery();
        $sql->select('p.`id_product`, pa.`id_product_attribute`, pl.`name`, p.`reference`, p.`customizable`');
        $sql->from('product', 'p');
        $sql->join(Shop::addSqlAssociation('product', 'p'));
        $sql->leftJoin('product_lang', 'pl', '
            p.`id_product` = pl.`id_product`
            AND pl.`id_lang` = ' . (int) $id_lang . Shop::addSqlRestrictionOnLang('pl')
        );
        $sql->leftJoin('product_attribute', 'pa', 'pa.`id_product` = p.`id_product`');
        $where = 'pl.`name` LIKE \'%' . pSQL($query) . '%\'
        OR p.`reference` LIKE \'%' . pSQL($query) . '%\'
        OR EXISTS(SELECT * FROM `' . _DB_PREFIX_ . 'product_supplier` sp WHERE sp.`id_product` = p.`id_product` AND `product_supplier_reference` LIKE \'%' . pSQL($query) . '%\')';
        $sql->orderBy('pl.`name` ASC');
        if (Combination::isFeatureActive()) {
            $where .= ' OR EXISTS(SELECT * FROM `' . _DB_PREFIX_ . 'product_attribute` `pa` WHERE pa.`id_product` = p.`id_product` AND (pa.`reference` LIKE \'%' . pSQL($query) . '%\'))';
        }
        $sql->where($where);

        return Db::getInstance()->executeS($sql);
    }

    /**
     * Get product cover image
     *
     * @param int $id_product id product
     *
     * @return string image link
     */
    public function getProductImage($id_product)
    {
        $product = new Product($id_product);

        $link_rewrite = $this->checkLinkRewrite($product->link_rewrite);

        $link = new Link();

        $image_data = Image::getCover($id_product);
        $id_image = $image_data['id_image'];

        $image_link = $link->getImageLink($link_rewrite, $id_image, ImageType::getFormattedName('small'));

        return Tools::getProtocol().$image_link;
    }

    /**
     * Get product attribute image
     *
     * @param int $id_product id product
     * @param int $id_product_attribute id product attribute
     *
     * @return string image link
     */
    public function getProductAttributeImage($id_product, $id_product_attribute)
    {
        $context = Context::getContext();
        $id_lang = $context->language->id;
        $id_shop = $context->shop->id;

        $product = new Product($id_product);

        $link_rewrite = $this->checkLinkRewrite($product->link_rewrite);

        $link = new Link();

        $image_data = Image::getBestImageAttribute($id_shop, $id_lang, $id_product, $id_product_attribute);
        $id_image = $image_data['id_image'];

        $image_link = $link->getImageLink($link_rewrite, $id_image, ImageType::getFormattedName('small'));

        return Tools::getProtocol().$image_link;
    }

    /**
     * Check if product has combinations
     *
     * @param int $id_product id product
     *
     * @return bool
     */
    public function hasCombinations($id_product)
    {
        if (is_null($id_product) || 0 >= $id_product) {
            return false;
        }

        $attributes = Product::getAttributesInformationsByProduct($id_product);

        return !empty($attributes);
    }

    /**
     * Get attributes assicuate to a product attribute id
     *
     * @param int $id_product_attribute id product attribute
     *
     * @return array
     */
    public function getAttributes($id_product_attribute, $id_lang)
    {
        $sql = 'SELECT agl.name as label, al.name as value
            FROM ' . _DB_PREFIX_ . 'product_attribute_combination pac
            LEFT JOIN ' . _DB_PREFIX_ . 'attribute a ON (a.id_attribute = pac.id_attribute)
            LEFT JOIN ' . _DB_PREFIX_ . 'attribute_lang al ON (al.id_attribute = a.id_attribute AND al.id_lang=' . (int) $id_lang . ')
            LEFT JOIN ' . _DB_PREFIX_ . 'attribute_group ag ON (ag.id_attribute_group = a.id_attribute_group)
            LEFT JOIN ' . _DB_PREFIX_ . 'attribute_group_lang agl ON (agl.id_attribute_group = ag.id_attribute_group AND agl.id_lang=' . (int) $id_lang . ')
            WHERE pac.id_product_attribute=' . (int) $id_product_attribute;

        $results = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);

        $attributes = [];
        foreach ($results as $attribute) {
            $attributes[] = implode($attribute, ' - ');
        }

        $attributesList = implode($attributes, ', ');

        return $attributesList;
    }

    /**
     * Allow to check if $link_rewrite is an array or not and only return a valid value
     *
     * @param array|string $link_rewrite
     *
     * @return string
     */
    private function checkLinkRewrite($link_rewrite)
    {
        if (is_array($link_rewrite)) {
            $filteredArray = array_filter($link_rewrite);
            $link_rewrite = current($filteredArray);
        }

        return $link_rewrite;
    }
}
