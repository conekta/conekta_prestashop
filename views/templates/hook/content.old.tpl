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
{if $fancy_box}
<script type="text/javascript" src="{$base_uri|escape:'url':'UTF-8'}js/jquery/jquery.fancybox-1.3.4.js"></script>
<link type="text/css" rel="stylesheet" href="{$base_uri|escape:'url':'UTF-8'}css/jquery.fancybox-1.3.4.css" />
{/if}

<link href="{$_path|escape:'htmlall':'UTF-8'}views/css/conekta-prestashop-admin.css" rel="stylesheet" type="text/css" media="all"/>
{if $error_webhook_message}
<script>
	alert("{$error_webhook_message|escape:'htmlall':'UTF-8'}");
</script>
{/if}

{if $is_submit_config}
<fieldset>
	<legend><img src="../img/admin/ok.gif" alt=""> {l s='Confirmation' mod='conektaprestashop'}</legend>
	<div class="form-group">
		<div class="col-lg-9">
			<div class="conf confirmation">{l s='Settings successfully saved' mod='conektaprestashop'}</div>
		</div>
	</div>
</fieldset>
{/if}

<br>

<div class="conekta-module-wrapper">
	<div class="row">
		<div class="col-md-6">
			<fieldset>
				<legend>
					<img src="/prestashop/modules/openpayprestashop/views/img/checks-icon.gif" alt="">{l s='Technical Checks' mod='conektaprestashop'}
				</legend>
				<div class="{$class_show|escape:'htmlall':'UTF-8'}">
					{$msg_show|escape:'htmlall':'UTF-8'}
				</div>
				<table cellspacing="0" cellpadding="0" class="conekta-technical">
					{foreach key=key item=item from=$requirements}
						{if $key != 'result'}
						<tr>
							<td>
								<img src="../img/admin/{if $item.result }ok{else}forbbiden{/if}.gif" alt=""/>
							</td>
							<td>
								{$item.name|escape:'htmlall':'UTF-8'}
								{if !$item.result and isset($item.resolution)} 
									<br> {$item.resolution|escape:'htmlall':'UTF-8'}
								{/if}
							</td>
						</tr>
						{/if}
					{/foreach}
				</table>
			</fieldset>
		</div>
	</div>

	<br>
	<form action="{$request_uri|escape:'url':'UTF-8'|urldecode}" method="post">
		<fieldset class="conekta-settings">
			<legend>
				<img src="/prestashop/modules/openpayprestashop/views/img/technical-icon.gif" alt=""> {l s='Settings' mod='conektaprestashop'}
			</legend>
			<table style="margin: 0; border: none; margin-top: 3px; width: 100%;" cellspacing="0" cellpadding="0">
				<tbody>
					<tr style="border-bottom: 1px solid #ccced7; padding: 10px;">
						<td style="border-right: 1px solid #ccced7; padding-left: 40px; padding-bottom: 15px;" colspan="1">
							<h3>{l s='Mode' mod='conektaprestashop'}</h3>
							<table style="margin: 0; border: none;" cellspacing="0" cellpadding="0">
								<tbody>
									<tr>
										<td valign="middle" align="left" style="border: medium none; padding: 6px;">
											<input type="radio" name="conekta_mode" value="0" {if $conekta_mode == 0}checked="checked"{/if} /> {l s='Sandbox' mod='conektaprestashop'}
										</td>
										<td valign="middle" align="left" style="border: medium none; padding: 6px;">
											<input type="radio" name="conekta_mode" value="1" {if $conekta_mode == 1}checked="checked"{/if}/> {l s='Live' mod='conektaprestashop'}
										</td>
									</tr>
								</tbody>
							</table>
						</td>
						<td style="padding-left: 25px; padding-bottom: 15px;" colspan="1">
							<h3>{l s='Webhook' mod='conektaprestashop'}</h3>
							<table style="margin: 0; border: none;" cellspacing="0" cellpadding="0">
								<tbody>
									<td valign="middle" align="left" colspan="2" style="border: medium none; padding: 6px;">
										<input type="text" name="conekta_webhook" value="{$url|escape:'htmlall':'UTF-8'}"/> 
									</td>
								</tbody>
							</table>
						</td>
					</tr>
					<tr>
						<td style="border-bottom: 1px solid #ccced7; padding: 8px;" colspan="2">
							<h3>{l s='Payment Method' mod='conektaprestashop'}</h3>
							<table style="margin: 0; border: none;" cellspacing="0" cellpadding="0">
								<tbody>
									<tr>
										<td valign="middle" align="left" style="border: medium none; padding: 6px;">
											<input type="checkbox" name="conekta_cards" value="1" {if $conekta_cards}checked="checked"{/if}/> {l s='Card' mod='conektaprestashop'}
										</td>
										<td valign="middle" align="left" style="border: medium none; padding: 6px;">
											<input type="checkbox" name="conekta_msi" value="1" {if $conekta_msi}checked="checked"{/if}/> {l s='Monthly Installments' mod='conektaprestashop'} 
										</td>
										<td valign="middle" align="left" style="border: medium none; padding: 6px;">
											<input type="checkbox" name="conekta_cash" value="1" {if $conekta_cash}checked="checked"{/if}/> {l s='Cash' mod='conektaprestashop'}
										</td>
										<td valign="middle" align="left" style="border: medium none; padding: 6px;">
											<input type="checkbox" name="conekta_banorte" value="1" {if $conekta_banorte}checked="checked"{/if}/> {l s='Banorte' mod='conektaprestashop'} 
										</td>
										<td valign="middle" align="left" style="border: medium none; padding: 6px;">
											<input type="checkbox" name="conekta_spei" value="1" {if $conekta_spei}checked="checked"{/if}/> {l s='SPEI' mod='conektaprestashop'}
										</td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
					<tr>
						<td style="border-right: 1px solid #ccced7; border-bottom: 1px solid #ccced7; padding-left: 40px; padding-bottom: 15px; padding-top: 20px;" colspan="1">
							<table style="border: 0;">
								<tbody>
									<tr>
										<td>
											<tr>
												<td valign="middle"> {l s='Test Public Key' mod='conektaprestashop'} </td>
											</tr>
											<tr>
												<td align="left" valign="middle">
													<input type="text" name="conekta_public_key_test" value="{$conekta_public_key_test|escape:'htmlall':'UTF-8'}"/>
												</td>
											</tr>

											<tr>
												<td valign="middle"> {l s='Live Public Key' mod='conektaprestashop'} </td>
											</tr>
											<tr>
												<td align="left" valign="middle">
													<input type="text" name="conekta_public_key_live" value="{$conekta_public_key_live|escape:'htmlall':'UTF-8'}"/>
												</td>
											</tr>
										</td>
									</tr>
								</tbody>
							</table>
						</td>
						<td style="border: none; border-bottom: 1px solid #ccced7; padding-left: 40px; padding-bottom: 15px; padding-top: 20px;" colspan="1">
							<table style="border: 0;">
								<tbody>
									<tr>
										<td>
											<tr>
												<td valign="middle"> {l s='Test Private Key' mod='conektaprestashop'} </td>
											</tr>
											<tr>
												<td align="left" valign="middle">
													<input type="password" name="conekta_private_key_test" value="{$conekta_private_key_test|escape:'htmlall':'UTF-8'}"/>
												</td>
											</tr>
											<tr>
												<td valign="middle"> {l s='Live Private Key' mod='conektaprestashop'} </td>
											</tr>
											<tr>
												<td align="left" valign="middle">
													<input type="password" name="conekta_private_key_live" value="{$conekta_private_key_live|escape:'htmlall':'UTF-8'}"/>
												</td>
											</tr>
										</td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
					<tr>
						<td align="middle" style="text-align: center;" valign="middle" colspan="2">
							<input type="submit" class="button" style="text-align: center; margin-top: 15px;" name="SubmitConekta" value="Save Settings"/>
						</td>
					</tr>
				</tbody>
			</table>
		</fieldset>
		<div class="clear"></div>
		<br>
	</form>
</div>

<script type="text/javascript">
	function updateConektaSettings(){
		if ($("input:radio[name=conekta_mode]:checked").val() == 1){
			$("fieldset.conekta-cc-numbers").hide();
		} else { 
			$("fieldset.conekta-cc-numbers").show(1000);
		} 

		if ($("input:radio[name=conekta_save_tokens]:checked").val() == 1){
			$("tr.conekta_save_token_tr").show(1000);
		} else {
			$("tr.conekta_save_token_tr").hide();
		}
	}

	$("input:radio[name=conekta_mode]").click(function(){
		updateConektaSettings();
	}); 

	$("input:radio[name=conekta_save_tokens]").click(function(){
		updateConektaSettings();
	});

	$(document).ready(function(){
		updateConektaSettings();
	});
</script>