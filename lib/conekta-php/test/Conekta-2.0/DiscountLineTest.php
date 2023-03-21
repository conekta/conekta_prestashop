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

class DiscountLineTest extends BaseTest
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
    'discount_lines' => [
      [
        'code' => 'Cupon de descuento',
        'amount' => 10,
        'type' => 'loyalty',
        ],
      [
        'code' => 'Cupon de descuento',
        'amount' => 5,
        'type' => 'loyalty',
        ],
      ],
    ];

    public function testSuccessfulDiscountLineDelete()
    {
        $this->setApiKey();
        $order = Order::create(self::$validOrder);
        $discountLine = $order->discount_lines[0];
        $discountLine->delete();

        $this->assertTrue($discountLine->deleted == true);
    }

    public function testSuccessfulDiscountLineUpdate()
    {
        $this->setApiKey();
        $order = Order::create(self::$validOrder);
        $discountLine = $order->discount_lines[0];
        $discountLine->update(['amount' => 11]);

        $this->assertTrue($discountLine->amount == 11);
    }

    public function testUnsuccessfulDiscountLineUpdate()
    {
        $this->setApiKey();
        $order = Order::create(self::$validOrder);
        $discountLine = $order->discount_lines[0];

        try {
            $discountLine->update(['amount' => -1]);
        } catch (\Exception $e) {
            $this->assertTrue(strpos(get_class($e), 'ParameterValidationError') == true);
        }
    }
}
