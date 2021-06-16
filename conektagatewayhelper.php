<?php
require_once dirname(__FILE__) . '/model/Database.php';

class HelperGateway {

    public static function addTaxLines($taxlines = null)
    {
        $tax_lines['tax_lines'] = array();
        if (isset($taxlines)) {
            foreach ($taxlines as $tax) {
                array_push(
                    $tax_lines['tax_lines'],
                    array (
                        'description' => HelperGateway::removeSpecialCharacter($tax['description']),
                        'amount' => $tax['amount']
                    )
                );
            }
        }

        return $tax_lines['tax_lines'];
    }

    public static function addShippingLines($shippingLines = null)
    {
        $shippingLinesArray['shipping_lines'] = array();

        if (isset($shippingLines)) {
            foreach ($shippingLines as $shipping) {
                array_push(
                    $shippingLinesArray['shipping_lines'],
                    array (
                        'amount' => $shipping['amount'],
                        'tracking_number' => HelperGateway::removeSpecialCharacter($shipping['tracking_number']),
                        'carrier' => HelperGateway::removeSpecialCharacter($shipping['carrier']),
                        'method' => HelperGateway::removeSpecialCharacter($shipping['method'])
                    )
                );
            }
        }
        return $shippingLinesArray['shipping_lines'];
    }

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

    public static function validateSubscrition($items)
    {   
        if (count($items) > 1) {
            return false;

        } elseif ($items[0]['cart_quantity'] == 1) {
            return Database::isProductSubscription($items[0]['id_product']);
        }

        return false;
    }

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

    public static function validateItemsProduct($items)
    {
        $i = 0;
        $non_subscription = true;

        while(count($items) > $i && $non_subscription) {

            if (Database::isProductSubscription($items[$i]['id_product'])) {
                $non_subscription = false;
            }
            $i++;
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
        $param =  str_replace(['#', '-', '_', '.', '/', '(', ')', '[', ']', '!', '¡', '%'], ' ', $param);
        return $param;
    }

    public static function generateCheckout($items, $payment_options)
    {
        if (HelperGateway::validateSubscrition($items)) {

            return array(
                "allowed_payment_methods" => ['card'],
                "plan_id" => Database::getIdPlan($items[0]['id_product'])
            );
        } elseif (HelperGateway::validateItemsProduct($items)) {

            return array(
                "allowed_payment_methods" => $payment_options,
            );
        }
    }

    public static function getInterval($option, $frecuency)
    {
        $interval = '';
        switch ($option) {
            case 'minute': ($frecuency > 1)? $interval = 'Minutos': $interval = 'Minuto';
            break;
            case 'week':($frecuency > 1)? $interval = 'Semanas': $interval = 'Semana';
            break;
            case 'half_month':($frecuency > 1)? $interval = 'Quincenas': $interval = 'Quincena';
            break;
            case 'month':($frecuency > 1)? $interval = 'Meses': $interval = 'Mes';
            break;
            case 'year': ($frecuency > 1)? $interval = 'Años': $interval = 'Año';
            break;
        }
        return $interval;
    }

    /**
     * Check if the product is digital
     *
     * @param array $items Products
     *
     * @return boolean
     */
    public static function isDigital($items) // Eliminar cuando se termine la tarea
    {
        $all_digital = true;
        if (empty($items)) {
            return false;
        }

        $i = 0;
        do {
            if (!$items[$i]['is_virtual']) {
                $all_digital =  false;
            }
            $i++;
        } while ($i < count($items) && $all_digital);

        return $all_digital;
    }
}