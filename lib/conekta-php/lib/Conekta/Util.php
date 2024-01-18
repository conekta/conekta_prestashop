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

namespace Conekta;

abstract class Util
{
    public static $types = [
    'webhook' => '\Conekta\Webhook',
    'webhook_log' => '\Conekta\WebhookLog',
    'billing_address' => '\Conekta\Address',
    'cash_payment' => '\Conekta\PaymentMethod',
    'charge' => '\Conekta\Charge',
    'customer' => '\Conekta\Customer',
    'event' => '\Conekta\Event',
    'payment_source' => '\Conekta\PaymentSource',
    'tax_line' => '\Conekta\TaxLine',
    'shipping_line' => '\Conekta\ShippingLine',
    'discount_line' => '\Conekta\DiscountLine',
    'conekta_list' => '\Conekta\ConektaList',
    'shipping_contact' => '\Conekta\ShippingContact',
    'lang' => '\Conekta\Lang',
    'line_item' => '\Conekta\LineItem',
    'order' => '\Conekta\Order',
    'token' => '\Conekta\Token',
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
                $class = '\Conekta\Address';
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
