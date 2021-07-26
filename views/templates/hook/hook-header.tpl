{*
 * 2007-2021 PrestaShop and Contributors
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to https://www.prestashop.com for more information.
 *
 * @author    Conekta <support@conekta.io>
 * @copyright 2007-2021 PrestaShop SA and Contributors
 * @version v1.0.0
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
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
