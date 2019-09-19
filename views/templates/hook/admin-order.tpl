{*
 * 2007-2019 PrestaShop and Contributors
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
 * @copyright 2007-2019 PrestaShop SA and Contributors
 * @version v1.0.0
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}

<div class="col-md-12">
	<div class="panel">
		<h3><i class="icon-money"></i> {l s='Conekta Payment Details' mod='conekta_prestashop'}</h3>

		<ul class="nav nav-tabs" id="tabConekta">
			<li class="active">
				<a href="#conekta_details">
					<i class="icon-money"></i> {l s='Details' mod='conekta_prestashop'} <span class="badge">{$conekta_transaction_details.id_transaction|escape:'htmlall':'UTF-8'}</span>
				</a>
			</li>
		</ul>

		<div class="tab-content panel">
			<div class="tab-pane active" id="conekta_details">
			{if isset($conekta_transaction_details.id_transaction)}
				<p>
					<strong>Status</strong> <span style="font-weight: bold; color: {$color_status|escape:'htmlall':'UTF-8'};">{$message_status|escape:'htmlall':'UTF-8'}</span>
					<br>
					<strong>{l s='Amount:' mod='conekta_prestashop'}</strong> {$display_price|escape:'htmlall':'UTF-8'}
					<br>
					<strong>{l s='Processed on:' mod='conekta_prestashop'}</strong> {$processed_on|escape:'htmlall':'UTF-8'}
					<br>
					<strong>{l s='Mode:' mod='conekta_prestashop'}</strong> <span style="font-weight: bold; color: {$color_mode|escape:'htmlall':'UTF-8'}};">{$txt_mode|unescape:"htmlall"}</span>
				</p>
			{else}
				<span style="color: #CC0000;"><strong>{l s='Warning:' mod='conekta_prestashop'}</strong></span> {l s='The customer paid using Conekta and an error occured (check details at the bottom of this page)' mod='conekta_prestashop'}
			{/if}
			</div>
		</div>
	</div>
</div>