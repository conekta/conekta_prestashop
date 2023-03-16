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

class LineItemTest extends BaseTest
{
    public static $validOrder = [
        'line_items' => [
            [
                'name' => 'Box of Cohiba S1s',
                'description' => 'Imported From Mex.',
                'unit_price' => 20000,
                'quantity' => 1,
                'tags' => ['food', 'mexican food'],
            ],
            [
                'name' => 'Box of Cohiba S1s',
                'description' => 'Imported From Mex.',
                'unit_price' => 3500,
                'quantity' => 1,
                'tags' => ['food'],
            ],
        ],
        'currency' => 'mxn',
    ];

    public function testSuccessfulLineItemDelete()
    {
        $this->setApiKey();
        $order = Order::create(self::$validOrder);
        $lineItem = $order->line_items[0];
        $lineItem->delete();

        $this->assertTrue($lineItem->deleted == true);
    }

    public function testSuccessfulLineItemUpdate()
    {
        $this->setApiKey();
        $order = Order::create(self::$validOrder);
        $lineItem = $order->line_items[0];
        $lineItem->update(['unit_price' => 1000]);

        $this->assertTrue($lineItem->unit_price == 1000);
    }

    public function testUnsuccessfulLineItemUpdate()
    {
        $this->setApiKey();
        $order = Order::create(self::$validOrder);
        $lineItem = $order->line_items[0];

        try {
            $lineItem->update(['unit_price' => -1]);
        } catch (\Exception $e) {
            $this->assertTrue(strpos(get_class($e), 'ParameterValidationError') == true);
        }
    }
}
