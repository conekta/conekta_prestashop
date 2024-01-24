<?php
/**
 * NOTICE OF LICENSE
 * Title   : Conekta Card Payment Gateway for Prestashop
 * Author  : Conekta.io
 * URL     : https://www.conekta.io/es/docs/plugins/prestashop.
 * PHP Version 7.0.0
 * Conekta File Doc Comment
 *
 * @author    Conekta <support@conekta.io>
 * @copyright 2012-2023 Conekta
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 *
 * @category  Conekta
 *
 * @version   GIT: @2.3.7@
 *
 * @see       https://conekta.com/
 */

namespace DigitalFemsa;

class DiscountLine extends ConektaResource
{
    public $code = '';

    public $amount = '';

    public $type = '';

    public $parentId = '';

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __isset($property)
    {
        return isset($this->$property);
    }

    public function instanceUrl()
    {
        $this->apiVersion = Conekta::$apiVersion;
        $id = $this->id;
        parent::idValidator($id);
        $class = get_class($this);
        $base = $this->classUrl($class);
        $extn = urlencode($id);
        $orderUrl = $this->order->instanceUrl();

        return $orderUrl . $base . "/{$extn}";
    }

    public function update($params = null)
    {
        return parent::_update($params);
    }

    public function delete()
    {
        return parent::_delete('order', 'discount_lines');
    }
}
