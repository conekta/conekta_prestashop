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

namespace Conekta;

class ShippingLineTest extends BaseTest
{
    public static $validOrder = [
    'line_items' => [
      [
        'name' => 'Box of Cohiba S1s',
        'description' => 'Imported From Mex.',
        'unit_price' => 20000,
        'quantity' => 1,
        'sku' => 'cohb_s1',
        'category' => 'food',
        'tags' => ['food', 'mexican food'],
        ],
      ],
    'currency' => 'mxn',
    'shipping_lines' => [
      [
        'description' => 'Free Shipping',
        'amount' => 0,
        'tracking_number' => 'TRACK123',
        'carrier' => 'USPS',
        'method' => 'Train',
        ],
      [
        'description' => 'Free Shipping',
        'amount' => 40,
        'tracking_number' => 'TRACK124',
        'carrier' => 'USPS',
        'method' => 'Train',
        ],
      ],
    ];

    public function testSuccessfulShippingLineDelete()
    {
        $this->setApiKey();
        $order = Order::create(self::$validOrder);
        $shippingLine = $order->shipping_lines[0];
        $shippingLine->delete();
        $this->assertTrue($shippingLine->deleted == true);
    }

    public function testSuccessfulShippingLineUpdate()
    {
        $this->setApiKey();
        $order = Order::create(self::$validOrder);
        $shippingLine = $order->shipping_lines[0];
        $shippingLine->update(['method' => 'Air']);
        $this->assertTrue($shippingLine->method == 'Air');
    }

    public function testUnsuccessfulShippingLineUpdate()
    {
        $this->setApiKey();
        $order = Order::create(self::$validOrder);
        $shippingLine = $order->shipping_lines[0];

        try {
            $shippingLine->update(['amount' => -1]);
        } catch (\Exception $e) {
            $this->assertTrue(strpos(get_class($e), 'ParameterValidationError') == true);
        }
    }
}
