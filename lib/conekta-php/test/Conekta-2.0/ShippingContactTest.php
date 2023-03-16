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

class ShippingContactTest extends BaseTest
{
    public static $validCustomer = ['email' => 'hola@hola.com',
    'name' => 'John Constantine',
    'shipping_contacts' => [
      [
        'receiver' => 'Jack Bauer',
        'phone' => '+5213353319758',
        'email' => 'thomas.logan@xmen.org',
        'address' => [
          'street1' => '250 Alexis St',
          'city' => 'Red Deer',
          'state' => 'Alberta',
          'country' => 'CA',
          'postal_code' => 'T4N 0B8',
          ],
        ],
      [
        'receiver' => 'John Williams',
        'phone' => '+5213353319758',
        'email' => 'rogue@xmen.org',
        'address' => [
          'street1' => '250 Alexis St',
          'city' => 'Red Deer',
          'state' => 'Alberta',
          'country' => 'CA',
          'postal_code' => 'T4N 0B8',
          ],
        ],
      ],
    ];

    public function testSuccessfulShippingContactDelete()
    {
        $this->setApiKey();
        $customer = Customer::create(self::$validCustomer);
        $shippingContact = $customer->shipping_contacts[0];
        $shippingContact->delete();
        $this->assertTrue($shippingContact->deleted == true);
    }

    public function testSuccessfulShippingContactUpdate()
    {
        $this->setApiKey();
        $customer = Customer::create(self::$validCustomer);
        $shippingContact = $customer->shipping_contacts[0];
        $shippingContact->update(['receiver' => 'Tony Almeida']);
        $this->assertTrue($shippingContact->receiver == 'Tony Almeida');
    }

    public function testUnsuccessfulShippingContactUpdate()
    {
        $this->setApiKey();
        $customer = Customer::create(self::$validCustomer);
        $shippingContact = $customer->shipping_contacts[0];

        try {
            $shippingContact->update(['phone' => '']);
        } catch (\Exception $e) {
            $this->assertTrue(strpos(get_class($e), 'ParameterValidationError') == true);
        }
    }
}
