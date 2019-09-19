<?php
/**
* 2007-2017 PrestaShop
*
* NOTICE OF LICENSE
* Title   : Conekta Card Payment Gateway for Prestashop
* Author  : Conekta.io
* URL     : https://www.conekta.io/es/docs/plugins/prestashop.
*
*  @author Conekta <support@conekta.io>
*  @copyright 2012-2017 Conekta
*  @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*  @version v1.0.0
*/

/**
* Class Config
*/
class Config
{
    public static function getLineItems($items = '')
    {
        $lineItems = array();
        foreach ($items as $item) {
            $lineItems = array_merge($lineItems, array(
                array(
                    'name'        => $item['name'],
                    'unit_price'  => (int)((float)$item['price'] * 100),
                    'quantity'    => (int)$item['cart_quantity'],
                    'tags'        => array("prestashop")
                    )
                ));

            if (Tools::strlen($item['reference']) > 0) {
                array_merge($lineItems, array(
                    array(
                        'sku' => $item['reference']
                        )
                    ));
            }

            if (Tools::strlen($item['description_short']) > 2) {
                array_merge($lineItems, array(
                    array(
                        'description' => $item['reference']
                        )
                    ));
            }
        }

        return $lineItems;
    }

    public static function getTaxLines($items = '')
    {
        $tax_lines = array();
        foreach ($items as $item) {
            $tax = (int)round(((float)$item['total_wt'] - (float)$item['total']) * 100);
            if (!empty($item['tax_name'])) {
                $tax_lines = array_merge($tax_lines, array(
                    array(
                        'description' => $item['tax_name'],
                        'amount'      => $tax
                        )
                    ));
            }
        }

        return $tax_lines;
    }

    public static function getDiscountLines($discounts)
    {
        $discount_lines = array();
        if (!empty($discounts)) {
            foreach ($discounts as $discount) {
                $discount_lines = array_merge(
                    $discount_lines,
                    array(
                        array(
                            'code' => (string) $discount['name'],
                            'amount' => (string) $discount['value_real'] * 100,
                            'type'=>'coupon'
                        )
                    )
                );
            }
        }
        return $discount_lines;
    }

    public static function getShippingLines($shipping_service, $shipping_carrier = '', $shipping_price = '')
    {
        $shipping_lines = array(
            array(
                "amount"          => $shipping_price,
                "tracking_number" => $shipping_service,
                "carrier"         => $shipping_carrier,
                "method"          => $shipping_service
                )
            );

        return $shipping_lines;
    }

    public static function getShippingContact($customer = '', $address_delivery = '', $state = '', $country = '')
    {
        $shipping_contact = array(
            "receiver" => $customer->firstname . " " . $customer->lastname,
            "phone"    => $address_delivery->phone,
            "address"  => array(
                "street1"     => $address_delivery->address1,
                "city"        => $address_delivery->city,
                "state"       => $state,
                "country"     => $country,
                "postal_code" => $address_delivery->postcode
                ),
            "metadata" => array("soft_validations" => true)
            );

        return $shipping_contact;
    }

    public static function getCustomerInfo($customer = '', $address_delivery = '')
    {
        $customer_info = array(
            "name"     => $customer->firstname . " " . $customer->lastname,
            "phone"    => $address_delivery->phone,
            "email"    => $customer->email,
            "metadata" => array("soft_validations" => true)
            );

        return $customer_info;
    }
}
