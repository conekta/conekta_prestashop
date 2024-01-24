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

abstract class Util
{
    public static $types = [
    'webhook' => '\DigitalFemsa\Webhook',
    'webhook_log' => '\DigitalFemsa\WebhookLog',
    'billing_address' => '\DigitalFemsa\Address',
    'cash_payment' => '\DigitalFemsa\PaymentMethod',
    'charge' => '\DigitalFemsa\Charge',
    'customer' => '\DigitalFemsa\Customer',
    'event' => '\DigitalFemsa\Event',
    'payment_source' => '\DigitalFemsa\PaymentSource',
    'tax_line' => '\DigitalFemsa\TaxLine',
    'shipping_line' => '\DigitalFemsa\ShippingLine',
    'discount_line' => '\DigitalFemsa\DiscountLine',
    'conekta_list' => '\DigitalFemsa\ConektaList',
    'shipping_contact' => '\DigitalFemsa\ShippingContact',
    'lang' => '\DigitalFemsa\Lang',
    'line_item' => '\DigitalFemsa\LineItem',
    'order' => '\DigitalFemsa\Order',
    'token' => '\DigitalFemsa\Token',
    ];

    public static function convertToConektaObject($resp)
    {
        $types = self::$types;

        if (is_array($resp)) {
            if (isset($resp['object']) && is_string($resp['object']) && isset($types[$resp['object']])) {
                $class = $types[$resp['object']];
                $instance = new $class();
                $instance->loadFromArray($resp);

                return $instance;
            }

            if (isset($resp['street1']) || isset($resp['street2'])) {
                $class = '\DigitalFemsa\Address';
                $instance = new $class();
                $instance->loadFromArray($resp);

                return $instance;
            }

            if (current($resp)) {
                $instance = new ConektaObject();
                $instance->loadFromArray($resp);

                return $instance;
            }

            return new ConektaObject();
        }

        return $resp;
    }

    public static function shiftArray($array, $object)
    {
        unset($array[$object]);
        end($array);
        $lastKey = key($array);

        for ($i = $object; $i < $lastKey; ++$i) {
            $array[$i] = $array[$i + 1];
            unset($array[$i + 1]);
        }

        return $array;
    }
}
