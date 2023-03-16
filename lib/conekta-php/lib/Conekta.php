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
if (!function_exists('curl_init')) {
    throw new Exception('Conekta needs the CURL PHP extension.');
}

if (!function_exists('json_decode')) {
    throw new Exception('Conekta needs the JSON PHP extension.');
}

if (!function_exists('mb_detect_encoding')) {
    throw new Exception('Conekta needs the Multibyte String PHP extension.');
}

if (!function_exists('get_called_class')) {
    throw new Exception('Conekta needs to be run on PHP >= 5.3.0.');
}

require_once dirname(__FILE__) . '/Conekta/Lang.php';

require_once dirname(__FILE__) . '/Conekta/Conekta.php';

require_once dirname(__FILE__) . '/Conekta/Util.php';

require_once dirname(__FILE__) . '/Conekta/Requestor.php';

require_once dirname(__FILE__) . '/Conekta/ConektaObject.php';

require_once dirname(__FILE__) . '/Conekta/ConektaResource.php';

require_once dirname(__FILE__) . '/Conekta/Charge.php';

require_once dirname(__FILE__) . '/Conekta/PaymentMethod.php';

require_once dirname(__FILE__) . '/Conekta/Customer.php';

require_once dirname(__FILE__) . '/Conekta/Card.php';

require_once dirname(__FILE__) . '/Conekta/Plan.php';

require_once dirname(__FILE__) . '/Conekta/Subscription.php';

require_once dirname(__FILE__) . '/Conekta/Token.php';

require_once dirname(__FILE__) . '/Conekta/Event.php';

require_once dirname(__FILE__) . '/Conekta/Payout.php';

require_once dirname(__FILE__) . '/Conekta/Payee.php';

require_once dirname(__FILE__) . '/Conekta/PayoutMethod.php';

require_once dirname(__FILE__) . '/Conekta/Method.php';

require_once dirname(__FILE__) . '/Conekta/Address.php';

require_once dirname(__FILE__) . '/Conekta/Webhook.php';

require_once dirname(__FILE__) . '/Conekta/WebhookLog.php';

require_once dirname(__FILE__) . '/Conekta/Log.php';

require_once dirname(__FILE__) . '/Conekta/Order.php';

require_once dirname(__FILE__) . '/Conekta/PaymentSource.php';

require_once dirname(__FILE__) . '/Conekta/TaxLine.php';

require_once dirname(__FILE__) . '/Conekta/DiscountLine.php';

require_once dirname(__FILE__) . '/Conekta/ShippingLine.php';

require_once dirname(__FILE__) . '/Conekta/LineItem.php';

require_once dirname(__FILE__) . '/Conekta/ConektaList.php';

require_once dirname(__FILE__) . '/Conekta/ShippingContact.php';

require_once dirname(__FILE__) . '/Conekta/Exceptions/Handler.php';

require_once dirname(__FILE__) . '/Conekta/Exceptions/ApiError.php';

require_once dirname(__FILE__) . '/Conekta/Exceptions/AuthenticationError.php';

require_once dirname(__FILE__) . '/Conekta/Exceptions/MalformedRequestError.php';

require_once dirname(__FILE__) . '/Conekta/Exceptions/NoConnectionError.php';

require_once dirname(__FILE__) . '/Conekta/Exceptions/ParameterValidationError.php';

require_once dirname(__FILE__) . '/Conekta/Exceptions/ProcessingError.php';

require_once dirname(__FILE__) . '/Conekta/Exceptions/ResourceNotFoundError.php';
