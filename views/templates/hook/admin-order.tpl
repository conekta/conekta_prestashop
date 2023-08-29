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
<div class="col-md-12">
	<div class="panel">
		<h3><i class="icon-money"></i> {l s='Conekta Payment Details' mod='conekta'}</h3>

		<ul class="nav nav-tabs" id="tabConekta">
			<li class="active">
				<a href="#conekta_details">
					<i class="icon-money"></i> {l s='Details' mod='conekta'} <span class="badge">{$conekta_tran_details.id_transaction|escape:'htmlall':'UTF-8'}</span>
				</a>
			</li>
		</ul>

		<div class="tab-content panel">
			<div class="tab-pane active" id="conekta_details">
			{if isset($conekta_tran_details.id_transaction)}
				<p>
					<strong>Status</strong> <span style="font-weight: bold; color: {$color_status|escape:'htmlall':'UTF-8'};">{$message_status|escape:'htmlall':'UTF-8'}</span>
					<br>
					<strong>{l s='Amount:' mod='conekta'}</strong> {$display_price|escape:'htmlall':'UTF-8'}
					<br>
					<strong>{l s='Processed on:' mod='conekta'}</strong> {$processed_on|escape:'htmlall':'UTF-8'}
					<br>
					<strong>{l s='Mode:' mod='conekta'}</strong> <span style="font-weight: bold; color: {$color_mode|escape:'htmlall':'UTF-8'}};">{$txt_mode|escape:'htmlall':'UTF-8'}</span>
				</p>
			{else}
				<span style="color: #CC0000;"><strong>{l s='Warning:' mod='conekta'}</strong></span> {l s='The customer paid using Conekta and an error occured (check details at the bottom of this page)' mod='conekta'}
			{/if}
			</div>
		</div>
	</div>
</div>