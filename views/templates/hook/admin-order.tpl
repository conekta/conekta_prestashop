{*
* 20012 - 2016 Conekta
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author Conekta <support@conekta.io>
*  @copyright  2012-2016 PrestaShop SA
*  @version  v2.0.0
*  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*}

<div class="col-md-12">
	<div class="panel">
		<h3><i class="icon-money"></i> {l s='Conekta Payment Details' mod='conektaprestashop'}</h3>

		<ul class="nav nav-tabs" id="tabConekta">
			<li class="active">
				<a href="#conekta_details">
					<i class="icon-money"></i> {l s='Details' mod='conektaprestashop'} <span class="badge">{$conekta_transaction_details.id_transaction|escape:'htmlall':'UTF-8'}</span>
				</a>
			</li>
		</ul>

		<div class="tab-content panel">
			<div class="tab-pane active" id="conekta_details">
			{if isset($conekta_transaction_details.id_transaction)}
				<p>
					<strong>Status</strong> <span style="font-weight: bold; color: {$color_status|escape:'htmlall':'UTF-8'};">{$message_status|escape:'htmlall':'UTF-8'}</span>
					<br>
					<strong>{l s='Amount:' mod='conektaprestashop'}</strong> {$display_price|escape:'htmlall':'UTF-8'}
					<br>
					<strong>{l s='Processed on:' mod='conektaprestashop'}</strong> {$processed_on|escape:'htmlall':'UTF-8'}
					<br>
					<strong>{l s='Mode:' mod='conektaprestashop'}</strong> <span style="font-weight: bold; color: {$color_mode|escape:'htmlall':'UTF-8'}};">{$txt_mode|unescape:"htmlall"}</span>
				</p>
			{else}
				<span style="color: #CC0000;"><strong>{l s='Warning:' mod='conektaprestashop'}</strong></span> {l s='The customer paid using Conekta and an error occured (check details at the bottom of this page)' mod='conektaprestashop'}
			{/if}
			</div>
		</div>
	</div>
</div>