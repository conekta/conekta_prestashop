{**
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
 * @category  Conekta
 * @version   GIT: @2.3.7@
 * @see       https://conekta.com/
 *}
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.conekta.io/js/latest/conekta.min.js"></script>
<script type="text/javascript" src="https://cdn.conekta.io/iframe/latest/conekta-iframe.js"></script> 
<script type="text/javascript" src="https://pay.conekta.com/v1.0/js/conekta-checkout.min.js"></script> 
<script type="text/javascript" src="{$path|escape:'htmlall':'UTF-8'}views/js/tokenize.js"></script>


<script type="text/javascript">
	var conekta_public_key = "{$api_key|escape:'htmlall':'UTF-8'}";
	var conekta_checkout_id = "{$checkoutRequestId|escape:'htmlall':'UTF-8'}";
	var conekta_order_id = "{$orderID|escape:'htmlall':'UTF-8'}";
	var conekta_amount = "{$amount|escape:'htmlall':'UTF-8'}";
</script> 
