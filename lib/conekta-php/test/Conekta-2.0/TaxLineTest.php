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

class TaxLineTest extends BaseTest
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
        'tax_lines' => [
            [
                'description' => 'IVA',
                'amount' => 60,
            ],
            [
                'description' => 'ISR',
                'amount' => 100,
            ],
        ],
        'currency' => 'mxn',
    ];

    public function testSuccessfulTaxLineDelete()
    {
        $this->setApiKey();
        $order = Order::create(self::$validOrder);
        $taxLine = $order->tax_lines[0];
        $taxLine->delete();
        $this->assertTrue($taxLine->deleted == true);
    }

    public function testSuccessfulTaxLineUpdate()
    {
        $this->setApiKey();
        $order = Order::create(self::$validOrder);
        $taxLine = $order->tax_lines[0];
        $taxLine->update(['amount' => 10]);
        $this->assertTrue($taxLine->amount == 10);
    }

    public function testUnsuccessfulTaxLineUpdate()
    {
        $this->setApiKey();
        $order = Order::create(self::$validOrder);
        $taxLine = $order->tax_lines[0];

        try {
            $taxLine->update(['amount' => -1]);
        } catch (\Exception $e) {
            $this->assertTrue(strpos(get_class($e), 'ParameterValidationError') == true);
        }
    }
}
