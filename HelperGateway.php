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
 * @version   GIT: @2.3.6@
 *
 * @see       https://conekta.com/
 */
require_once dirname(__FILE__) . '/model/Database.php';

/**
 * HelperGateway Class Doc Comment
 *
 * @author   Conekta <support@conekta.io>
 *
 * @category Class
 *
 * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 *
 * @see     https://conekta.com/
 */
class HelperGateway
{
    /**
     * Add tax lines
     *
     * @param array $taxlines Tax of the Order
     *
     * @return array
     */
    public static function addTaxLines($taxlines = null)
    {
        $tax_lines = [
            'tax_lines' => [],
        ];

        if (isset($taxlines)) {
            foreach ($taxlines as $tax) {
                array_push(
                    $tax_lines['tax_lines'],
                    [
                        'description' => HelperGateway::removeSpecialCharacter($tax['description']),
                        'amount' => $tax['amount'],
                    ]
                );
            }
        }

        return $tax_lines['tax_lines'];
    }

    /**
     * Add Shipping lines
     *
     * @param array $shippingLines Shipping of the Order
     *
     * @return array
     */
    public static function addShippingLines($shippingLines = null)
    {
        $shippingLinesArray = [
            'shipping_lines' => [],
        ];

        if (isset($shippingLines)) {
            foreach ($shippingLines as $shipping) {
                array_push(
                    $shippingLinesArray['shipping_lines'],
                    [
                        'amount' => $shipping['amount'],
                        'tracking_number' => HelperGateway::removeSpecialCharacter($shipping['tracking_number']),
                        'carrier' => HelperGateway::removeSpecialCharacter($shipping['carrier']),
                        'method' => HelperGateway::removeSpecialCharacter($shipping['method']),
                    ]
                );
            }
        }

        return $shippingLinesArray['shipping_lines'];
    }

    /**
     * Calculate amount total of the Order
     *
     * @param array $order_details Order details
     *
     * @return int
     */
    public static function calculateAmountTotal($order_details = null)
    {
        $amount = 0;

        if (isset($order_details['shipping_lines'])) {
            foreach ($order_details['shipping_lines'] as $shipping) {
                $amount = $amount + $shipping['amount'];
            }
        }

        if (isset($order_details['tax_lines'])) {
            foreach ($order_details['tax_lines'] as $tax) {
                $amount = $amount + $tax['amount'];
            }
        }

        foreach ($order_details['line_items'] as $item) {
            $amount = $amount + ($item['quantity'] * $item['unit_price']);
        }

        if (isset($order_details['discount_lines'])) {
            foreach ($order_details['discount_lines'] as $discount) {
                $amount = $amount - $discount['amount'];
            }
        }

        return $amount;
    }

    /**
     * Validates if the product is subscrition
     *
     * @param array $items items in the order
     *
     * @return bool
     */
    public static function validateSubscrition($items)
    {
        if (count($items) > 1) {
            return false;
        } elseif ($items[0]['cart_quantity'] == 1) {
            return Database::isProductSubscription($items[0]['id_product']);
        }

        return false;
    }

    /**
     * Validates if the items were entered correctly
     *
     * @param array $items items in the order
     *
     * @return bool
     */
    public static function validateItems($items)
    {
        if (count($items) > 1) {
            return HelperGateway::validateItemsProduct($items);
        } elseif ($items[0]['cart_quantity'] > 1) {
            if (Database::isProductSubscription($items[0]['id_product'])) {
                return false;
            }
        }

        return true;
    }

    /**
     * Validates the plan and order amounts match
     *
     * @param array $items items in the order
     * @param int $amount of the order
     *
     * @return bool
     */
    public static function validateAmounts($items, $amount)
    {
        if (Database::isProductSubscription($items[0]['id_product'])) {
            $plan_id = Database::getIdPlan($items[0]['id_product']);
            $conekta_plan = \Conekta\Plan::find($plan_id);

            return $conekta_plan->amount == $amount;
        }

        return true;
    }

    /**
     * Validate if items are unsubscribed
     *
     * @param array $items items in the order
     *
     * @return bool
     */
    public static function validateItemsProduct($items)
    {
        $i = 0;
        $non_subscription = true;

        while (count($items) > $i && $non_subscription) {
            if (Database::isProductSubscription($items[$i]['id_product'])) {
                $non_subscription = false;
            }
            ++$i;
        }

        return $non_subscription;
    }

    /**
     * Remove special character
     *
     * @param string $param character string
     *
     * @return string
     */
    public static function removeSpecialCharacter($param)
    {
        $param = str_replace(['#', '-', '_', '.', '/', '(', ')', '[', ']', '!', '¡', '%'], ' ', $param);

        return $param;
    }

    /**
     * Generate Checkout
     *
     * @param array $items Items of the order
     * @param array $payment_options Payment options
     *
     * @return array
     */
    public static function generateCheckout($items, $payment_options)
    {
        $retorno = HelperGateway::validateSubscrition($items);

        if ($retorno) {
            return [
                'allowed_payment_methods' => ['card'],
                'plan_id' => Database::getIdPlan($items[0]['id_product']),
            ];
        } elseif (HelperGateway::validateItemsProduct($items)) {
            return [
                'allowed_payment_methods' => $payment_options,
            ];
        }
    }

    /**
     * Show inverval of the subscription
     *
     * @param string $option Interval selected for the subscription
     * @param int $frecuency Frecuency of the subscription
     *
     * @return string
     */
    public static function getInterval($option, $frecuency)
    {
        $interval = '';

        switch ($option) {
            case 'minute':
                ($frecuency > 1) ? $interval = 'Minutos' : $interval = 'Minuto';

                break;

            case 'week':
                ($frecuency > 1) ? $interval = 'Semanas' : $interval = 'Semana';

                break;

            case 'half_month':
                ($frecuency > 1) ? $interval = 'Quincenas' : $interval = 'Quincena';

                break;

            case 'month':
                ($frecuency > 1) ? $interval = 'Meses' : $interval = 'Mes';

                break;

            case 'year':
                ($frecuency > 1) ? $interval = 'Años' : $interval = 'Año';

                break;
        }

        return $interval;
    }

    /**
     * Check if the product is digital
     *
     * @param array $items Products
     *
     * @return bool
     */
    public static function isDigital($items)
    {
        $all_digital = true;

        if (empty($items)) {
            return false;
        }

        $i = 0;

        do {
            if (!$items[$i]['is_virtual']) {
                $all_digital = false;
            }
            ++$i;
        } while ($i < count($items) && $all_digital);

        return $all_digital;
    }
}
