<?php
/**
* Class Config
*/
class Config 
{
	public function getLineItems($items = '')
	{
		$lineItems = array();
        foreach ($items as $item) {
            $lineItems = array_merge($lineItems, array(
                array(
                    'name'        => $item['name'],
                    'unit_price'  => intval((float)$item['price'] * 100),
                    'quantity'    => intval($item['cart_quantity']),
                    'tags'        => ["prestashop"]
                    )
                ));
            if(strlen($item['reference']) > 0){
                array_merge($lineItems, array(
                    array(
                        'sku' => $item['reference']
                        )
                ));
            }
            if(strlen($item['description_short']) > 2){
                array_merge($lineItems, array(
                    array(
                        'description' => $item['reference']
                        )
                ));
            }
        }

	   return $lineItems;
    }
    public function getTaxLines($items = '')
    {
        $tax_lines = array();
        foreach ($items as $item) {
            $tax = intval(((float)$item['total_wt'] - (float)$item['total']) * 100);
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
    public function getDiscountLines($discounts='')
    {
        $discount_lines = array();
        if(!empty($discounts)){
            foreach ($discounts as $discount) {
                $discount_lines = array_merge($discount_lines, array(
                    array(
                        'code'   => $discount['code'],
                        'amount' => (int)$discount['value_real'] * 100,
                        'type'   => 'coupon'
                    )
                ));
            }
        }

        return $discount_lines;
    }
    public function getShippingLines($shipping_carrier = '', $shipping_price = '', $shipping_service)
    {
         if (!empty($shipping_carrier)) {
            $shipping_lines = array(
                array(
                    "amount"          => $shipping_price,
                    "tracking_number" => $shipping_service,
                    "carrier"         => $shipping_carrier,
                    "method"          => $shipping_service
                )
            );
        }

        return $shipping_lines;
    }
    public function getShippingContact($customer='', $address_delivery = '', $state = '', $country = '' )
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
    public function getCustomerInfo($customer = '', $address_delivery= '')
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