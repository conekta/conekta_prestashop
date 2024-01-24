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
require __DIR__ . '/vendor/autoload.php';

require_once __DIR__ . '/model/DigitalFemsaConfig.php';

require_once __DIR__ . '/model/DigitalFemsaDatabase.php';

require_once __DIR__ . '/lib/conekta-php/lib/Conekta.php';

require_once __DIR__ . '/src/UseCases/CreateWebhook.php';

require_once __DIR__ . '/src/UseCases/ValidateAdminForm.php';

use DigitalFemsa\Payments\UseCases\CreateWebhook;
use DigitalFemsa\Payments\UseCases\ValidateAdminForm;
use PrestaShop\PrestaShop\Core\Payment\PaymentOption;

if (!defined('_PS_VERSION_')) {
    exit(403);
}

define('DIGITAL_FEMSA_METADATA_LIMIT', 12);

/**
 * Conekta Class Doc Comment
 *
 * @category Class
 *
 * @author   Conekta <support@conekta.io>
 * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 *
 * @see      https://conekta.com/
 */
class OxxoPay extends PaymentModule
{
    public const ConektaSettings = [
        'FEMSA_DIGITAL_PRESTASHOP_VERSION',
        'FEMSA_DIGITAL_MODE',
        'FEMSA_DIGITAL_PUBLIC_KEY_TEST',
        'FEMSA_DIGITAL_PUBLIC_KEY_LIVE',
        'FEMSA_DIGITAL_PRIVATE_KEY_TEST',
        'FEMSA_DIGITAL_PRIVATE_KEY_LIVE',
        'FEMSA_DIGITAL_WEBHOOK',
        'FEMSA_DIGITAL_WEBHOOK_FAILED_URL',
        'FEMSA_DIGITAL_WEBHOOK_ERROR_MESSAGE',
        'FEMSA_DIGITAL_WEBHOOK_FAILED_ATTEMPTS',
        'FEMSA_DIGITAL_METHOD_CASH',
        'FEMSA_DIGITAL_EXPIRATION_DATE_LIMIT',
        'FEMSA_DIGITAL_EXPIRATION_DATE_TYPE',
        'FEMSA_DIGITAL_ORDER_METADATA',
        'FEMSA_DIGITAL_PRODUCT_METADATA',
    ];

    public const CartProductAttribute = [
        'id_product_attribute',
        'id_product',
        'cart_quantity',
        'id_shop',
        'id_customization',
        'name',
        'is_virtual',
        'description_short',
        'available_now',
        'available_later',
        'id_category_default',
        'id_supplier',
        'id_manufacturer',
        'manufacturer_name',
        'on_sale',
        'ecotax',
        'additional_shipping_cost',
        'available_for_order',
        'show_price',
        'price',
        'active',
        'unity',
        'unit_price_ratio',
        'quantity_available',
        'width',
        'height',
        'depth',
        'out_of_stock',
        'weight',
        'available_date',
        'date_add',
        'date_upd',
        'quantity',
        'link_rewrite',
        'category',
        'unique_id',
        'id_address_delivery',
        'advanced_stock_management',
        'supplier_reference',
        'customization_quantity',
        'price_attribute',
        'ecotax_attr',
        'reference',
        'weight_attribute',
        'ean13',
        'isbn',
        'upc',
        'minimal_quantity',
        'wholesale_price',
        'id_image',
        'legend',
        'reduction_type',
        'is_gift',
        'reduction',
        'reduction_without_tax',
        'price_without_reduction',
        'attributes',
        'attributes_small',
        'rate',
        'tax_name',
        'stock_quantity',
        'price_without_reduction_without_tax',
        'price_with_reduction',
        'price_with_reduction_without_tax',
        'total',
        'total_wt',
        'price_wt',
        'reduction_applies',
        'quantity_discount_applies',
        'allow_oosp',
    ];

    protected $html = '';

    public $settings;

    private $orderElements;

    private $productElements;

    public $extra_mail_vars;

    /**
     * @var string
     */
    private $conektaMode;

    /**
     * Implement the configuration of the DigitalFemsa Prestashop module
     */
    public function __construct()
    {
        $this->name = 'oxxopay';
        $this->tab = 'payments_gateways';
        $this->version = '1.0.0';
        $this->ps_versions_compliancy = [
            'min' => '1.7',
            'max' => _PS_VERSION_,
        ];
        $this->author = 'FemsaDigital';
        $this->displayName = $this->l('Oxxopay');
        $this->description = $this->l('Accept cash payments');
        $this->controllers = ['validation', 'notification'];
        $this->is_eu_compatible = 1;
        $this->currencies = true;
        $this->currencies_mode = 'checkbox';
        $this->cash = true;
        $this->amount_min = 2000;

        $this->settings = array_keys(self::ConektaSettings);

        $this->orderElements = array_keys(
            array_diff_key(get_class_vars('Cart'), ['definition' => '', 'htmlFields' => ''])
        );
        sort($this->orderElements);
        array_walk($this->orderElements, function ($element) {
            $this->settings[] = sprintf('ORDER_%s', Tools::strtoupper($element));
        });

        $this->productElements = self::CartProductAttribute;
        sort($this->productElements);
        array_walk($this->productElements, function ($element) {
            $this->settings[] = sprintf('PRODUCT_%s', Tools::strtoupper($element));
        });

        $config = Configuration::getMultiple($this->settings);
        $this->setConfiguration($config);

        $this->bootstrap = true;
        parent::__construct();

        if (!count(Currency::checkPaymentCurrencies($this->id))) {
            $this->warning = $this->l('No currency has been set for this module.');
        }
    }

    /**
     * @param array $config
     *
     * @return void
     */
    private function setConfiguration(array $config)
    {
        $mappedConfig = $this->mappedConfig();

        foreach ($config as $key => $value) {
            if (!isset($mappedConfig[$key])) {
                continue;
            }
            $attr = $mappedConfig[$key];
            $this->$attr = $value;

            if ($key == 'FEMSA_DIGITAL_MODE') {
                $this->conektaMode = ($value) ? 'live' : 'test';
            }
        }
    }

    /**
     * @return string[]
     */
    private function mappedConfig()
    {
        return [
            'FEMSA_DIGITAL_MODE' => 'mode',
            'FEMSA_DIGITAL_WEBHOOK' => 'web_hook',
            'FEMSA_DIGITAL_METHOD_CASH' => 'payment_method_cash',
            'FEMSA_DIGITAL_EXPIRATION_DATE_TYPE' => 'expiration_date_type',
            'FEMSA_DIGITAL_EXPIRATION_DATE_LIMIT' => 'expiration_date_limit',
            'FEMSA_DIGITAL_PRIVATE_KEY_TEST' => 'test_private_key',
            'FEMSA_DIGITAL_PUBLIC_KEY_TEST' => 'test_public_key',
            'FEMSA_DIGITAL_PRIVATE_KEY_LIVE' => 'live_private_key',
            'FEMSA_DIGITAL_PUBLIC_KEY_LIVE' => 'live_public_key'
        ];
    }

    /**
     * Install configuration, create table in database and register hooks
     *
     * @return bool
     */
    public function install()
    {
        $updateConfig = [
            'PS_OS_CHEQUE' => 1,
            'PS_OS_PAYMENT' => 2,
            'PS_OS_PREPARATION' => 3,
            'PS_OS_SHIPPING' => 4,
            'PS_OS_DELIVERED' => 5,
            'PS_OS_CANCELED' => 6,
            'PS_OS_REFUND' => 7,
            'PS_OS_ERROR' => 8,
            'PS_OS_OUTOFSTOCK' => 9,
            'PS_OS_BANKWIRE' => 10,
            'PS_OS_PAYPAL' => 11,
            'PS_OS_WS_PAYMENT' => 12,
        ];
        $this->upgradeConfig();

        foreach ($updateConfig as $u => $v) {
            if (!Configuration::get($u) || (int) Configuration::get($u) < 1) {
                if (defined('_' . $u . '_') && (int) constant('_' . $u . '_') > 0) {
                    Configuration::updateValue($u, constant('_' . $u . '_'));
                } else {
                    Configuration::updateValue($u, $v);
                }
            }
        }

        if (!parent::install()
            || !$this->createPendingCashState()
            || !$this->registerHook('header')
            || !$this->registerHook('paymentOptions')
            || !$this->registerHook('paymentReturn')
            || !$this->registerHook('adminOrder')
            || !$this->registerHook('updateOrderStatus')
            && Configuration::updateValue('FEMSA_DIGITAL_METHOD_CASH', 1)
            && Configuration::updateValue('FEMSA_DIGITAL_MODE', 0)
            || !DigitalFemsaDatabase::installDb()
            || !DigitalFemsaDatabase::createTableConektaOrder()
            || !DigitalFemsaDatabase::createTableMetaData()
        ) {
            return false;
        }

        Configuration::updateValue('FEMSA_DIGITAL_PRESTASHOP_VERSION', $this->version);

        return true;
    }

    /**
     * Delete configuration and drop table in database.
     *
     * @return bool
     */
    public function uninstall()
    {
        $configDeleted = array_filter(array_map(function ($setting) {
            return Configuration::deleteByName($setting);
        }, self::ConektaSettings), function ($result) {
            return !$result;
        });

        $customStateId = Configuration::get('waiting_cash_payment'); // Reemplaza con el nombre de configuración correcto

        if ($customStateId) {
            $customState = new OrderState($customStateId);
            if (Validate::isLoadedObject($customState)) {
                $customState->delete();
            }
        }

        return parent::uninstall()
            && count($configDeleted) == 0
            && Db::getInstance()->Execute(
                'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'conekta_transaction`'
            )
            && Db::getInstance()->Execute(
                'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'conekta_metadata`'
            )
            && Db::getInstance()->Execute(
                'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'conekta_order_checkout`'
            );
    }

    /**
     * Returns the order confirmation checkout
     *
     * @param array $params payment information parameter
     *
     * @return template
     */
    public function hookPaymentReturn($params)
    {
        if ($params['order'] && Validate::isLoadedObject($params['order'])) {
            $id_order = (int) $params['order']->id;
            $conekta_tran_details = DigitalFemsaDatabase::getOrderById($id_order);

            $this->smarty->assign('cash', true);
            $this->smarty->assign(
                'conekta_order',
                [
                    'barcode' => $conekta_tran_details['reference'],
                    'type' => 'cash',
                    'barcode_url' => $conekta_tran_details['barcode'],
                    'amount' => $conekta_tran_details['amount'],
                    'currency' => $conekta_tran_details['currency'],
                ]
            );
        }

        return $this->fetchTemplate('checkout-confirmation-all.tpl');
    }

    /**
     * The order is refunded
     *
     * @param array $params information of order to update it
     *
     * @return void
     */
    public function hookUpdateOrderStatus($params)
    {
        if ($params['newOrderStatus']->id == 7) {
            // order refunded
            $key = Configuration::get('FEMSA_DIGITAL_MODE') ?
                Configuration::get('FEMSA_DIGITAL_PRIVATE_KEY_LIVE') :
                Configuration::get('FEMSA_DIGITAL_PRIVATE_KEY_TEST');

            $iso_code = $this->context->language->iso_code;

            \DigitalFemsa\Conekta::setApiKey($key);
            \DigitalFemsa\Conekta::setPlugin('Prestashop1.7');
            \DigitalFemsa\Conekta::setApiVersion('2.0.0');
            \DigitalFemsa\Conekta::setPluginVersion($this->version);
            \DigitalFemsa\Conekta::setLocale($iso_code);

            $id_order = (int) $params['id_order'];
            $conekta_tran_details = DigitalFemsaDatabase::getOrderById($id_order);

            // only credit card refund
            if (!$conekta_tran_details['barcode']
                && !(isset($conekta_tran_details['reference'])
                    && !empty($conekta_tran_details['reference']))
            ) {
                $order = \DigitalFemsa\Order::find($conekta_tran_details['id_conekta_order']);
                $order->refund(['reason' => 'requested_by_client']);
            }
        }
    }

    /**
     * Create pending chash state
     *
     * @return bool
     */
    private function createPendingCashState()
    {
        $state = new OrderState();
        $languages = Language::getLanguages();
        $names = [];

        foreach ($languages as $lang) {
            $names[$lang['id_lang']] = 'En espera de pago';
        }

        $state->name = $names;
        $state->color = '#4169E1';
        $state->send_email = true;
        $state->module_name = 'conekta';
        $templ = [];

        foreach ($languages as $lang) {
            $templ[$lang['id_lang']] = 'conektaefectivo';
        }

        $state->template = $templ;

        if ($state->save()) {
            Configuration::updateValue('waiting_cash_payment', $state->id);
            $directory = _PS_MAIL_DIR_;

            if ($dhvalue = opendir($directory)) {
                while (($file = readdir($dhvalue)) !== false) {
                    if (is_dir($directory . $file) && $file[0] != '.') {
                        $new_html_file = _PS_MODULE_DIR_ . $this->name . '/mails/' . $file . '/conektaefectivo.html';
                        $new_txt_file = _PS_MODULE_DIR_ . $this->name . '/mails/' . $file . '/conektaefectivo.txt';

                        $html_folder = $directory . $file . '/conektaefectivo.html';
                        $txt_folder = $directory . $file . '/conektaefectivo.txt';

                        try {
                            Tools::copy($new_html_file, $html_folder);
                            Tools::copy($new_txt_file, $txt_folder);
                        } catch (\Exception $e) {
                            $error_copy = $e->getMessage();

                            if (class_exists('Logger')) {
                                Logger::addLog(json_encode($error_copy), 1, null, null, null, true);
                            }
                        }
                    }
                }
                closedir($dhvalue);
            }
        } else {
            return false;
        }

        return true;
    }

    /**
     * Generate method payment and checkout conekta
     *
     * @return template
     */
    public function hookHeader()
    {
        $key = Configuration::get('FEMSA_DIGITAL_MODE') ? Configuration::get('FEMSA_DIGITAL_PRIVATE_KEY_LIVE')
            : Configuration::get('FEMSA_DIGITAL_PRIVATE_KEY_TEST');
        $iso_code = $this->context->language->iso_code;
        \DigitalFemsa\Conekta::setApiKey($key);
        \DigitalFemsa\Conekta::setPlugin('Prestashop1.7');
        \DigitalFemsa\Conekta::setApiVersion('2.0.0');
        \DigitalFemsa\Conekta::setLocale($iso_code);

        if (Tools::getValue('controller') != 'order-opc'
            && (!($_SERVER['PHP_SELF'] == __PS_BASE_URI__ . 'order.php'
                || $_SERVER['PHP_SELF'] == __PS_BASE_URI__ . 'order-opc.php'
                || Tools::getValue('controller') == 'order'
                || Tools::getValue('controller') == 'orderopc'
                || Tools::getValue('step') == 3))) {
            return;
        }

        Media::addJsDef(
            [
                'ajax_link' => $this->_path . 'ajax.php',
            ]
        );
        $this->context->controller->addCSS($this->_path . 'views/css/conekta-prestashop.css');

        if (Configuration::get('FEMSA_DIGITAL_MODE')) {
            $this->smarty->assign('api_key', addslashes(Configuration::get('FEMSA_DIGITAL_PUBLIC_KEY_LIVE')));
        } else {
            $this->smarty->assign('api_key', addslashes(Configuration::get('FEMSA_DIGITAL_PUBLIC_KEY_TEST')));
        }

        $this->smarty->assign('path', $this->_path);

        $cart = $this->context->cart;
        $customer = $this->context->customer;
        $payment_options = ['cash'];

        $address_delivery = new Address((int) $cart->id_address_delivery);
        $state = State::getNameById($address_delivery->id_state);
        $country = Country::getIsoById($address_delivery->id_country);
        $carrier = new Carrier((int) $cart->id_carrier);
        $shp_price = $cart->getTotalShippingCost();
        $discounts = $cart->getCartRules();
        $items = $cart->getProducts();
        $shippingLines = null;

        if (!empty($carrier)) {
            if ($carrier->name != null) {
                $shp_carrier = $carrier->name;
                $shp_service = implode(',', $carrier->delay);
                $shippingLines = DigitalFemsaConfig::getShippingLines($shp_service, $shp_carrier, $shp_price);
            }
        }

        $shippingContact = DigitalFemsaConfig::getShippingContact($customer, $address_delivery, $state, $country);
        $customerInfo = DigitalFemsaConfig::getCustomerInfo($customer, $address_delivery);

        $result = DigitalFemsaDatabase::getConektaMetadata($customer->id, $this->conektaMode, 'conekta_customer_id');

        if (count($payment_options) > 0
            && !empty($shippingContact['address']['postal_code'])
            && !empty($shippingLines)) {
            $order_details = [];
            $taxlines = [];

            if (empty($result['meta_value'])) {
                $customer_id = $this->createCustomer($customer, $customerInfo);
            } else {
                $customer_id = $result['meta_value'];
                $customerConekta = \DigitalFemsa\Customer::find($customer_id);
                $customerConekta->update($customerInfo);
            }

            $taxlines = DigitalFemsaConfig::getTaxLines($items);

            $checkout = [
                'type' => 'HostedPayment',
                'allowed_payment_methods' => $payment_options,
                'failure_url' => Configuration::get('FEMSA_DIGITAL_WEBHOOK'),
                'success_url' => Configuration::get('FEMSA_DIGITAL_WEBHOOK'),
            ];

            if (in_array('cash', $payment_options)) {
                $expirationDateLimit = Configuration::get('FEMSA_DIGITAL_EXPIRATION_DATE_LIMIT');
                $expirationDateType = Configuration::get('FEMSA_DIGITAL_EXPIRATION_DATE_TYPE') == 0 ? 86400 : 3600;
                $checkout['expires_at'] = time() + ($expirationDateLimit * $expirationDateType);
            }

            $order_details = [
                'currency' => $this->context->currency->iso_code,
                'line_items' => DigitalFemsaConfig::getLineItems($items),
                'customer_info' => ['customer_id' => $customer_id],
                'discount_lines' => DigitalFemsaConfig::getDiscountLines($discounts),
                'shipping_lines' => [],
                'shipping_contact' => $shippingContact,
                'tax_lines' => [],
                'metadata' => [
                    'plugin' => 'Prestashop',
                    'plugin_version' => _PS_VERSION_,
                    'reference_id' => $this->context->cart->id,
                ],
                'checkout' => $checkout,
            ];

            $order_elements = array_keys(get_class_vars('Cart'));

            foreach ($order_elements as $element) {
                $elementKey = sprintf('ORDER_%s', Tools::strtoupper($element));

                if (!empty(Configuration::get($elementKey)) && property_exists($this->context->cart, $element)) {
                    $order_details['metadata'][$element] = $this->context->cart->$element;
                }
            }

            foreach ($items as $item) {
                $index = 'product-' . $item['id_product'];
                $order_details['metadata'][$index] = '';

                foreach ($this->productElements as $element) {
                    $elementKey = sprintf('PRODUCT_%s', Tools::strtoupper($element));

                    if (!empty(Configuration::get($elementKey)) && array_key_exists($element, $item)) {
                        $order_details['metadata'][$index] .= $this->buildRecursiveMetadata($item[$element], $element);
                    }
                }
                $order_details['metadata'][$index] = Tools::substr($order_details['metadata'][$index], 0, -2);
            }

            $amount = 0;

            if (!empty($shippingLines)) {
                foreach ($shippingLines as $shipping) {
                    $order_details['shipping_lines'][] = [
                        'amount' => $shipping['amount'],
                        'tracking_number' => $this->removeSpecialCharacter($shipping['tracking_number']),
                        'carrier' => $this->removeSpecialCharacter($shipping['carrier']),
                        'method' => $this->removeSpecialCharacter($shipping['method']),
                    ];
                    $amount = $amount + $shipping['amount'];
                }
            }

            if (isset($taxlines)) {
                foreach ($taxlines as $tax) {
                    $order_details['tax_lines'][] = [
                        'description' => $this->removeSpecialCharacter($tax['description']),
                        'amount' => $tax['amount'],
                    ];
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

            $result = DigitalFemsaDatabase::getConektaOrder($customer->id, $this->conektaMode, $this->context->cart->id);

            try {
                if ($order_details['currency'] == 'MXN' && $amount < $this->amount_min) {
                    $message = 'El monto minimo de compra con DigitalFemsa tiene que ser mayor a $20.00 ';
                    $this->context->smarty->assign(
                        [
                            'message' => $message,
                        ]
                    );

                    return false;
                }

                if (isset($result) && $result != false && $result['status'] == 'unpaid') {
                    $order = \DigitalFemsa\Order::find($result['id_conekta_order']);

                    if (isset($order->charges[0]->status) && $order->charges[0]->status == 'paid') {
                        DigitalFemsaDatabase::updateConektaOrder(
                            $customer->id,
                            $this->context->cart->id,
                            $this->conektaMode,
                            $order->id,
                            $order->charges[0]->status
                        );
                    }
                }

                if (empty($order)) {
                    $order = \DigitalFemsa\Order::create($order_details);
                    DigitalFemsaDatabase::updateConektaOrder(
                        $customer->id,
                        $this->context->cart->id,
                        $this->conektaMode,
                        $order->id,
                        'unpaid'
                    );
                } elseif (empty($order->charges[0]->status) || $order->charges[0]->status != 'paid') {
                    unset($order_details['customer_info']);
                    $order->update($order_details);
                } else {
                    $order = \DigitalFemsa\Order::create($order_details);
                    DigitalFemsaDatabase::updateConektaOrder(
                        $customer->id,
                        $this->context->cart->id,
                        $this->conektaMode,
                        $order->id,
                        'unpaid'
                    );
                }
            } catch (\Exception $e) {
                $log_message = $e->getMessage();

                if (class_exists('Logger')) {
                    Logger::addLog(
                        $this->l('Payment transaction failed') . ' ' . $log_message,
                        2,
                        null,
                        'Cart',
                        (int) $this->context->cart->id,
                        true
                    );
                }

                $message = $e->getMessage();

                $this->context->smarty->assign('message', $message);
            }
        }

        if (isset($order)) {
            $this->smarty->assign('orderID', $order->id);
            $this->smarty->assign('checkoutRequestId', $order->checkout['id']);
            $this->smarty->assign('amount', $amount);
        } else {
            $this->smarty->assign('checkoutRequestId', '');
            $this->smarty->assign('orderID', '');
            $this->smarty->assign('amount', '');
        }

        return $this->fetchTemplate('hook-header.tpl');
    }

    /**
     * Generates the metadata of the order attributes.
     *
     * @param array $data_object Object to generate metadata
     * @param string $key Key the data_object
     *
     * @return string
     */
    public function buildRecursiveMetadata($data_object, $key)
    {
        $string = '';

        if (gettype($data_object) == 'array') {
            foreach (array_keys($data_object) as $data_key) {
                $key_concat = (string) $key . '-' . (string) $data_key;

                if (empty($data_object[$data_key])) {
                    $string .= (string) $key_concat . ': NULL | ';
                } else {
                    $string .= $this->buildRecursiveMetadata($data_object[$data_key], $key_concat);
                }
            }
        } else {
            if (empty($data_object)) {
                $string .= (string) $key . ': NULL | ';
            } else {
                $string .= (string) $key . ': ' . (string) $data_object . ' | ';
            }
        }

        return $string;
    }

    /**
     * Returns the order information.
     *
     * @param array $params The order info
     *
     * @return template
     */
    public function hookAdminOrder($params)
    {
        $id_order = (int) $params['id_order'];
        $status = $this->getTransactionStatus($id_order);

        return $status;
    }

    /**
     * The different payment methods are added.
     *
     * @param array $params Payment options
     *
     * @return array
     */
    public function hookPaymentOptions($params)
    {
        if (!$this->active) {
            return;
        }

        if (!$this->checkCurrency($params['cart'])) {
            return;
        }
        $this->smarty->assign(
            [
                'test_private_key' => Configuration::get('FEMSA_DIGITAL_PRIVATE_KEY_TEST'),
            ]
        );
        $payment_options = [
            $this->getConektaPaymentOption()
        ];

        return $payment_options;
    }

    /**
     * Remove special character
     *
     * @param string $param character string
     *
     * @return string
     */
    public function removeSpecialCharacter($param)
    {
        $param = str_replace(['#', '-', '_', '.', '/', '(', ')', '[', ']', '!', '¡', '%'], ' ', $param);

        return $param;
    }

    /**
     * Check if the currency is correct
     *
     * @param array $cart payment cart
     *
     * @return bool
     */
    public function checkCurrency($cart)
    {
        $currency_order = new Currency($cart->id_currency);
        $currencies_module = $this->getCurrency($cart->id_currency);

        if (is_array($currencies_module)) {
            foreach ($currencies_module as $currency_module) {
                if ($currency_order->id == $currency_module['id_currency']) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Add conekta payment method
     *
     * @return PaymentOption
     */
    public function getConektaPaymentOption()
    {
        $embeddedOption = new PaymentOption();
        $embeddedOption->setModuleName($this->name)->setCallToActionText(
            $this->l('Pago por medio de DigitalFemsa ')
        )->setAction($this->context->link->getModuleLink($this->name, 'validation', [], true))->setForm(
            $this->generateCardPaymentForm()
        )->setLogo(Media::getMediaPath(_PS_MODULE_DIR_ . $this->name . '/views/img/cards2.png'));

        return $embeddedOption;
    }

    /**
     * @return void
     */
    private function upgradeConfig()
    {
        $configMap = [
            'PAYMENT_METHS_CASH' => 'FEMSA_DIGITAL_METHOD_CASH',
            'EXPIRATION_DATE_LIMIT' => 'FEMSA_DIGITAL_EXPIRATION_DATE_LIMIT',
            'EXPIRATION_DATE_TYPE' => 'FEMSA_DIGITAL_EXPIRATION_DATE_TYPE',
            'MODE' => 'FEMSA_DIGITAL_MODE',
            'WEB_HOOK' => 'FEMSA_DIGITAL_WEBHOOK',
            'TEST_PRIVATE_KEY' => 'FEMSA_DIGITAL_PRIVATE_KEY_TEST',
            'TEST_PUBLIC_KEY' => 'FEMSA_DIGITAL_PUBLIC_KEY_TEST',
            'LIVE_PUBLIC_KEY' => 'FEMSA_DIGITAL_PUBLIC_KEY_LIVE',
            'LIVE_PRIVATE_KEY' => 'FEMSA_DIGITAL_PRIVATE_KEY_LIVE'
        ];
        array_walk($configMap, function ($destiny, $source) {
            Configuration::updateValue($destiny, Configuration::get($source));
            Configuration::deleteByName($source);
        });
    }

    /**
     * Update value and notify
     *
     * @return void
     */
    private function postProcess()
    {
        $configurationValues = [
            'FEMSA_DIGITAL_WEBHOOK' => rtrim(Tools::getValue('FEMSA_DIGITAL_WEBHOOK')),
            'FEMSA_DIGITAL_MODE' => Tools::getValue('FEMSA_DIGITAL_MODE'),
            'FEMSA_DIGITAL_PUBLIC_KEY_TEST' => rtrim(Tools::getValue('FEMSA_DIGITAL_PUBLIC_KEY_TEST')),
            'FEMSA_DIGITAL_PUBLIC_KEY_LIVE' => rtrim(Tools::getValue('FEMSA_DIGITAL_PUBLIC_KEY_LIVE')),
            'FEMSA_DIGITAL_PRIVATE_KEY_TEST' => rtrim(Tools::getValue('FEMSA_DIGITAL_PRIVATE_KEY_TEST')),
            'FEMSA_DIGITAL_PRIVATE_KEY_LIVE' => rtrim(Tools::getValue('FEMSA_DIGITAL_PRIVATE_KEY_LIVE')),
            'FEMSA_DIGITAL_METHOD_CASH' => rtrim(Tools::getValue('FEMSA_DIGITAL_METHOD_CASH')),
            'FEMSA_DIGITAL_EXPIRATION_DATE_LIMIT' => rtrim(Tools::getValue('FEMSA_DIGITAL_EXPIRATION_DATE_LIMIT')),
            'FEMSA_DIGITAL_EXPIRATION_DATE_TYPE' => rtrim(Tools::getValue('FEMSA_DIGITAL_EXPIRATION_DATE_TYPE')),
        ];
        array_walk($configurationValues, function ($value, $key) {
            Configuration::updateValue($key, $value);
        });

        array_walk($this->orderElements, function ($element) {
            $key = sprintf('ORDER_%s', Tools::strtoupper($element));
            Configuration::updateValue($key, Tools::getValue($key));
        });

        array_walk($this->productElements, function ($element) {
            $key = sprintf('PRODUCT_%s', Tools::strtoupper($element));
            Configuration::updateValue($key, Tools::getValue($key));
        });

        $this->html .= $this->displayConfirmation(
            $this->trans('Settings updated', [], 'Admin.Notifications.Success')
        );
    }

    /**
     * Display check
     *
     * @return template
     */
    private function displayCheck()
    {
        return $this->display(__FILE__, './views/templates/hook/infos.tpl');
    }

    /**
     * Returns the values of the fields in the configuration
     *
     * @return array
     */
    public function getConfigFieldsValues()
    {
        $settings = self::ConektaSettings;
        $settingsFieldsValues = [];

        array_walk($settings, function ($setting) use (&$settingsFieldsValues) {
            $settingValue = Tools::getValue($setting, Configuration::get($setting));

            if ($setting === 'FEMSA_DIGITAL_WEBHOOK') {
                $settingValue = !empty($settingValue) ? $settingValue : Context::getContext()->link->getModuleLink(
                    'conekta',
                    'notification',
                    ['ajax' => true]
                );
            }

            $settingsFieldsValues[$setting] = $settingValue;
        });

        array_walk($this->orderElements, function ($element) use (&$settingsFieldsValues) {
            $key = sprintf('ORDER_%s', Tools::strtoupper($element));
            $settingsFieldsValues[$key] = Configuration::get($key);
        });

        array_walk($this->productElements, function ($element) use (&$settingsFieldsValues) {
            $key = sprintf('PRODUCT_%s', Tools::strtoupper($element));
            $settingsFieldsValues[$key] = Configuration::get($key);
        });

        return $settingsFieldsValues;
    }

    /**
     * Build Admin Content
     *
     * @return array
     */
    public function buildAdminContent()
    {
        $this->context->controller->addJS($this->_path . 'views/js/functions.js');

        $orderMetadata = array_map(function ($value) {
            return [
                'id' => Tools::strtoupper($value),
                'name' => $value,
                'val' => $value,
            ];
        }, $this->orderElements);

        $productMetadata = array_map(function ($value) {
            return [
                'id' => Tools::strtoupper($value),
                'name' => $value,
                'val' => $value,
            ];
        }, $this->productElements);

        $fields_form = [
            'form' => [
                'legend' => [
                    'title' => $this->trans('Contact details', [], 'Modules.DigitalFemsa.Admin'),
                    'icon' => 'icon-envelope',
                ],
                'input' => [
                    [
                        'type' => 'radio',
                        'label' => $this->l('Mode'),
                        'name' => 'FEMSA_DIGITAL_MODE',
                        'required' => true,
                        'class' => 't',
                        'is_bool' => true,
                        'values' => [
                            ['id' => 'active_on', 'value' => 1, 'label' => $this->l('Production')],
                            ['id' => 'active_off', 'value' => 0, 'label' => $this->l('Sandbox')],
                        ],
                    ],
                    [
                        'type' => 'text',
                        'label' => $this->trans('Webhook', [], 'Modules.DigitalFemsa.Admin'),
                        'desc' => $this->trans(
                            'https://{domain}/es/module/oxxopay/notification?ajax=true',
                            [],
                            'Modules.DigitalFemsa.Admin'
                        ),
                        'name' => 'FEMSA_DIGITAL_WEBHOOK',
                        'required' => true,
                    ],
                    [
                        'type' => 'checkbox',
                        'label' => $this->l('Payment Method'),
                        'desc' => $this->l('Choose options.'),
                        'name' => 'FEMSA_DIGITAL_METHOD',
                        'values' => [
                            'query' => [
                                [
                                    'id' => 'CASH',
                                    'name' => $this->l('Cash'),
                                    'val' => 'cash_payment_method'
                                ],
                            ],
                            'id' => 'id',
                            'name' => 'name',
                        ],
                        'expand' => [
                            'print_total' => 1,
                            'default' => 'show',
                            'show' => ['text' => $this->l('show'), 'icon' => 'plus-sign-alt'],
                            'hide' => ['text' => $this->l('hide'), 'icon' => 'minus-sign-alt'],
                        ],
                    ],
                    [
                        'type' => 'radio',
                        'label' => $this->l('Expiration date type'),
                        'name' => 'FEMSA_DIGITAL_EXPIRATION_DATE_TYPE',
                        'class' => 't',
                        'is_bool' => true,
                        'values' => [
                            ['id' => 'FEMSA_DIGITAL_EXPIRATION_DATE_TYPE_DAYS', 'value' => 0, 'label' => $this->l('Days')],
                            ['id' => 'FEMSA_DIGITAL_EXPIRATION_DATE_TYPE_HOURS', 'value' => 1, 'label' => $this->l('Hours')],
                        ],
                    ],
                    [
                        'type' => 'text',
                        'label' => $this->trans('Expiration date limit', [], 'Modules.DigitalFemsa.Admin'),
                        'name' => 'FEMSA_DIGITAL_EXPIRATION_DATE_LIMIT',
                    ],
                    [
                        'type' => 'text',
                        'label' => $this->trans('Test Private Key', [], 'Modules.DigitalFemsa.Admin'),
                        'name' => 'FEMSA_DIGITAL_PRIVATE_KEY_TEST',
                        'required' => true,
                    ],
                    [
                        'type' => 'text',
                        'label' => $this->trans('Test Public Key', [], 'Modules.DigitalFemsa.Admin'),
                        'name' => 'FEMSA_DIGITAL_PUBLIC_KEY_TEST',
                        'required' => true,
                    ],
                    [
                        'type' => 'text',
                        'label' => $this->trans('Live Private Key', [], 'Modules.DigitalFemsa.Admin'),
                        'name' => 'FEMSA_DIGITAL_PRIVATE_KEY_LIVE',
                        'required' => true,
                    ],
                    [
                        'type' => 'text',
                        'label' => $this->trans('Live Public Key', [], 'Modules.DigitalFemsa.Admin'),
                        'name' => 'FEMSA_DIGITAL_PUBLIC_KEY_LIVE',
                        'required' => true,
                    ],
                    [
                        'type' => 'checkbox',
                        'label' => $this->l('Additional Order Metadata'),
                        'name' => 'ORDER',
                        'values' => [
                            'query' => $orderMetadata,
                            'id' => 'id',
                            'name' => 'name',
                        ],
                        'expand' => [
                            'print_total' => count($orderMetadata),
                            'default' => 'show',
                            'show' => [
                                'text' => $this->l('show'),
                                'icon' => 'plus-sign-alt',
                            ],
                            'hide' => [
                                'text' => $this->l('hide'),
                                'icon' => 'minus-sign-alt',
                            ],
                        ],
                    ],
                    [
                        'type' => 'checkbox',
                        'label' => $this->l('Additional Product Metadata'),
                        'name' => 'PRODUCT',
                        'values' => [
                            'query' => $productMetadata,
                            'id' => 'id',
                            'name' => 'name',
                        ],
                        'expand' => [
                            'print_total' => count($productMetadata),
                            'default' => 'show',
                            'show' => [
                                'text' => $this->l('show'),
                                'icon' => 'plus-sign-alt',
                            ],
                            'hide' => [
                                'text' => $this->l('hide'),
                                'icon' => 'minus-sign-alt',
                            ],
                        ],
                    ],
                ],
                'submit' => [
                    'title' => $this->trans('Save', [], 'Admin.Actions'),
                ],
            ],
        ];

        return $fields_form;
    }

    /**
     * Render form
     *
     * @return string
     */
    public function renderForm()
    {
        $adminUrl = $this->context->link->getAdminLink('AdminModules', false);
        $templateCurrentIndex = '%s&configure=%s&tab_module=%s&module_name=%s';
        $urlCurrentIndex = sprintf($templateCurrentIndex, $adminUrl, $this->name, $this->tab, $this->name);

        $fields_form = $this->buildAdminContent();
        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->id = (int) Tools::getValue('id_carrier');
        $helper->identifier = $this->identifier;
        $helper->submit_action = 'btnSubmit';
        $helper->currentIndex = $urlCurrentIndex;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = ['fields_value' => $this->getConfigFieldsValues()];
        $this->fields_form = [];

        return $helper->generateForm([$fields_form]);
    }

    /**
     * Check settings key conekta
     *
     * @return bool
     */
    public function checkSettings()
    {
        $mode = Tools::getValue('FEMSA_DIGITAL_MODE');
        $valid = !empty(Tools::getValue('FEMSA_DIGITAL_PUBLIC_KEY_LIVE'))
            && !empty(Tools::getValue('FEMSA_DIGITAL_PRIVATE_KEY_LIVE'));

        if (!$mode) {
            $valid = !empty(Tools::getValue('FEMSA_DIGITAL_PUBLIC_KEY_TEST'))
                && !empty(Tools::getValue('FEMSA_DIGITAL_PRIVATE_KEY_TEST'));
        }

        return $valid;
    }

    /**
     * Check requirements
     *
     * @return array
     */
    public function checkRequirements()
    {
        $testRequirements = [];

        if (!function_exists('curl_init')) {
            $testRequirements['curl'] = [
                'name' => $this->l('PHP cURL extension must be enabled on your server'),
            ];
        }

        if (Tools::getValue('FEMSA_DIGITAL_MODE')
            && (!Configuration::get('PS_SSL_ENABLED')
                || (!empty(filter_input(INPUT_SERVER, 'HTTPS'))
                    && Tools::strtolower(filter_input(INPUT_SERVER, 'HTTPS')) === 'off'))
        ) {
            $testRequirements['ssl'] = [
                'name' => $this->l('SSL must be enabled on your store (before entering Live mode)'),
            ];
        }

        if (version_compare(PHP_VERSION, '7.1', '<')) {
            $testRequirements['php7.1'] = [
                'name' => $this->l('Your server must run PHP 7.1 or greater'),
            ];
        }

        if (!$this->checkSettings()) {
            $testRequirements['configuration'] = [
                'name' => $this->l('You must sign-up for CONEKTA and configure your account settings in the module'),
            ];
        }

        if (version_compare(_PS_VERSION_, '1.7', '<')) {
            $tests['backward'] = [
                'name' => $this->l('You are using the backward compatibility module'),
            ];
        }

        $testRequirements['result'] = count($testRequirements) === 0;

        return $testRequirements;
    }

    /**
     * Returns the template's HTML content.
     *
     * @return string HTML content
     */
    public function getContent()
    {
        // CODE FOR WEBHOOK VALIDATION UNTESTED DONT ERASE

        $this->smarty->assign('base_uri', __PS_BASE_URI__);
        $this->smarty->assign('mode', Configuration::get('FEMSA_DIGITAL_MODE'));

        $this->html = '';

        if (Tools::isSubmit('btnSubmit')) {
            $errors = (new ValidateAdminForm())($this->orderElements, $this->productElements);

            if (count($errors) > 0) {
                array_walk($errors, function ($error) {
                    $this->html .= $this->displayError($error);
                });
            }

            $requirements = $this->checkRequirements();
            $this->smarty->assign('_path', $this->_path);

            if (!$requirements['result']) {
                $this->smarty->assign('requirements', $requirements);
                $this->smarty->assign('config_check', $requirements['result']);
                $this->smarty->assign('msg_show', $this->l('Please resolve the following errors:'));
            }

            if (count($errors) <= 0 && $requirements['result']) {
                $oldWebHook = Configuration::get('FEMSA_DIGITAL_WEBHOOK');
                $this->postProcess();

                if (!$this->createWebhook($oldWebHook)) {
                    $webhookMessage = Configuration::get('FEMSA_DIGITAL_WEBHOOK_ERROR_MESSAGE');
                    $this->smarty->assign('error_webhook_message', $webhookMessage);
                }
            }
        }

        $this->html .= $this->displayCheck();
        $this->html .= $this->renderForm();

        return $this->html;
    }

    /**
     * Create customer of DigitalFemsa
     *
     * @param $customer Info user in Prestashop
     * @param $params   Info of user
     *
     * @return string
     */
    public function createCustomer($customer, $params)
    {
        try {
            $customerConekta = \DigitalFemsa\Customer::create($params);

            DigitalFemsaDatabase::updateConektaMetadata(
                $customer->id,
                $this->conektaMode,
                'conekta_customer_id',
                $customerConekta->id
            );

            return $customerConekta->id;
        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * Create Webhook ok conekta
     *
     * @return bool
     */
    private function createWebhook(string $oldWebhook): bool
    {
        $key = Configuration::get('FEMSA_DIGITAL_MODE') ? Configuration::get('FEMSA_DIGITAL_PRIVATE_KEY_LIVE')
            : Configuration::get('FEMSA_DIGITAL_PRIVATE_KEY_TEST');
        $isoCode = $this->context->language->iso_code;

        return (new CreateWebhook())(
            Configuration::get('FEMSA_DIGITAL_MODE'),
            $key,
            $isoCode,
            $this->version,
            $oldWebhook
        );
    }

    /**
     * Generate Payment form
     *
     * @return string HTML generate payment form
     */
    protected function generateCardPaymentForm()
    {
        $months = [];

        for ($i = 1; $i <= 12; ++$i) {
            $months[] = sprintf('%02d', $i);
        }

        $years = [];

        for ($i = 0; $i <= 10; ++$i) {
            $years[] = date('Y', strtotime('+' . $i . ' years'));
        }

        $this->context->smarty->assign(
            [
                'action' => $this->context->link->getModuleLink($this->name, 'validation', [], true),
                'months' => $months,
                'years' => $years,
                'test_private_key' => Configuration::get('FEMSA_DIGITAL_PRIVATE_KEY_TEST'),
                'path' => $this->_path,
            ]
        );

        return $this->context->smarty->fetch('module:conekta/views/templates/front/payment_form.tpl');
    }

    /**
     * Payment process and validates if the payment was made correctly
     *
     * @param $conektaOrderId The id of the order to pay
     *
     * @return string link redirect
     */
    public function processPayment($conektaOrderId)
    {
        $key = Configuration::get('FEMSA_DIGITAL_MODE') ?
            Configuration::get('FEMSA_DIGITAL_PRIVATE_KEY_LIVE') :
            Configuration::get('FEMSA_DIGITAL_PRIVATE_KEY_TEST');
        $iso_code = $this->context->language->iso_code;

        \DigitalFemsa\Conekta::setApiKey($key);
        \DigitalFemsa\Conekta::setPlugin('Prestashop 1.7');
        \DigitalFemsa\Conekta::setApiVersion('2.0.0');
        \DigitalFemsa\Conekta::setPluginVersion($this->version);
        \DigitalFemsa\Conekta::setLocale($iso_code);

        try {
            $order = \DigitalFemsa\Order::find($conektaOrderId->id);
            $charge_response = $order->charges[0];
            $order_status = (int) Configuration::get('PS_OS_PAYMENT');
            $createAtDate = new DateTime();
            $createAtDate->setTimestamp($charge_response->created_at);

            $message = $this->l('DigitalFemsa Transaction Details:')
                . "\n\n" . $this->l('Amount:') . ' ' . ($charge_response->amount * 0.01) . "\n"
                . $this->l('Status:') . ' '
                . ($charge_response->status == 'paid' ? $this->l('Paid') : $this->l('Unpaid'))
                . "\n" . $this->l('Processed on:') . ' ' . $createAtDate->format('Y-m-d H:i:s')
                . "\n" . $this->l('Currency:') . ' ' . Tools::strtoupper($charge_response->currency)
                . "\n" . $this->l('Mode:') . ' '
                . ($charge_response->livemode == 'true' ? $this->l('Live') : $this->l('Test')) . "\n";

            $this->validateOrder(
                (int) $this->context->cart->id,
                (int) $order_status,
                $order->amount / 100,
                $this->displayName,
                $message,
                [],
                null,
                false,
                $this->context->customer->secure_key
            );

            if (version_compare(_PS_VERSION_, '1.5', '>=')) {
                $new_order = new Order((int) $this->currentOrder);

                if (Validate::isLoadedObject($new_order)) {
                    $payment = $new_order->getOrderPaymentCollection();

                    if (isset($payment[0])) {
                        $payment[0]->transaction_id = pSQL($charge_response->id);
                        $payment[0]->save();
                    }
                }
            }

            $reference = $charge_response->payment_method->reference;

            DigitalFemsaDatabase::insertOxxoPayment(
                $order,
                $charge_response,
                $reference,
                $this->currentOrder,
                $this->context->cart->id
            );

            DigitalFemsaDatabase::updateConektaOrder(
                $this->context->customer->id,
                $this->context->cart->id,
                $this->conektaMode,
                $order->id,
                $order->charges[0]->status
            );

            $redirect = $this->context->link->getPageLink(
                'order-confirmation',
                true,
                null,
                [
                    'id_order' => (int) $this->currentOrder,
                    'id_cart' => (int) $this->context->cart->id,
                    'key' => $this->context->customer->secure_key,
                    'id_module' => (int) $this->id,
                ]
            );
            Tools::redirect($redirect);
        } catch (\Exception $e) {
            $log_message = $e->getMessage();

            if (class_exists('Logger')) {
                Logger::addLog(
                    $this->l('Payment transaction failed') . ' ' . $log_message,
                    2,
                    null,
                    'Cart',
                    (int) $this->context->cart->id,
                    true
                );
            }

            $message = $e->getMessage();

            $controller = Configuration::get('PS_ORDER_PROCESS_TYPE') ? 'order-opc.php' : 'order.php';
            $location = $this->context->link->getPageLink($controller, true)
                . (strpos($controller, '?') !== false ? '&' : '?')
                . 'step=3&conekta_error=1&message=' . $message . '#conekta_error';

            Tools::redirectLink($location);
        }
    }

    /**
     * Fetch template with the name
     *
     * @param $name Name of template
     *
     * @return string link template
     */
    public function fetchTemplate($name)
    {
        $views = 'views/templates/';

        if (@filemtime(dirname(__FILE__) . '/' . $name)) {
            return $this->display(__FILE__, $name);
        } elseif (@filemtime(dirname(__FILE__) . '/' . $views . 'hook/' . $name)) {
            return $this->display(__FILE__, $views . 'hook/' . $name);
        } elseif (@filemtime(dirname(__FILE__) . '/' . $views . 'front/' . $name)) {
            return $this->display(__FILE__, $views . 'front/' . $name);
        } elseif (@filemtime(dirname(__FILE__) . '/' . $views . 'admin/' . $name)) {
            return $this->display(__FILE__, $views . 'admin/' . $name);
        }

        return $this->display(__FILE__, $name);
    }

    /**
     * Returns a template with the order status
     *
     * @param $order_id The id of order
     *
     * @return string HTML
     */
    public function getTransactionStatus($order_id)
    {
        if (DigitalFemsaDatabase::getOrderConekta($order_id) == $this->name) {
            $conekta_tran_details = DigitalFemsaDatabase::getConektaTransaction($order_id);

            $this->smarty->assign('conekta_tran_details', $conekta_tran_details);

            if ($conekta_tran_details['status'] === 'paid') {
                $this->smarty->assign('color_status', 'green');
                $this->smarty->assign('message_status', $this->l('Paid'));
            } else {
                $this->smarty->assign('color_status', '#CC0000');
                $this->smarty->assign('message_status', $this->l('Unpaid'));
            }
            $this->smarty->assign(
                'display_price',
                Tools::displayPrice($conekta_tran_details['amount'])
            );
            $this->smarty->assign(
                'processed_on',
                Tools::safeOutput($conekta_tran_details['date_add'])
            );

            if ($conekta_tran_details['mode'] === 'live') {
                $this->smarty->assign('color_mode', 'green');
                $this->smarty->assign('txt_mode', $this->l('Live'));
            } else {
                $this->smarty->assign('color_mode', '#CC0000');
                $this->smarty->assign(
                    'txt_mode',
                    $this->l(
                        'Test (No payment has been processed and you will'
                        . ' need to enable the &quot;Live&quot; mode)'
                    )
                );
            }

            return $this->fetchTemplate('admin-order.tpl');
        }
    }
}
