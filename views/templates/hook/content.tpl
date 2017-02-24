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

<div class="panel">
	<div class="panel-heading">
		<i class="icon-cogs"></i>
		{l s='conekta settings' mod='conektaprestashop'}
	</div>

	{if $error_webhook_message}
		<div class="alert alert-warning">{$error_webhook_message|escape:'htmlall':'UTF-8'}</div>
	{/if}

	{if $is_submit_config}
		<div class="alert alert-success">{l s='Settings successfully saved' mod='conektaprestashop'}</div>
	{/if}
	
	{if $config_check}
		<div class="alert alert-success"><strong>{$msg_show|escape:'htmlall':'UTF-8'}</strong></div>
	{else}
		<div class="alert alert-danger">
			<strong>{$msg_show|escape:'htmlall':'UTF-8'}</strong>
			<ul style="margin-top: 10px;">
				{foreach key=key item=item from=$requirements}
					{if $key != 'result'}
						{if $item.result == 0}
							<li>{$item.name|escape:'htmlall':'UTF-8'}</li>
						{/if}
					{/if}
				{/foreach}
			</ul>
		</div>
	{/if}

	<form action="{$request_uri|escape:'url':'UTF-8'|urldecode}" class="defaultForm form-horizontal" method="post">
		<div class="form-wrapper">
			<div class="form-group">
				<label class="control-label col-lg-3">{l s='Mode' mod='conektaprestashop'}</label>
				<div class="col-lg-9">
					<div class="radio">
						<label><input name="conekta_mode" value="1" {if $conekta_mode == 1}checked="checked"{/if} type="radio">{l s='Production' mod='conektaprestashop'}</label>
					</div>
					<div class="radio ">
						<label><input name="conekta_mode" value="0" {if $conekta_mode == 0}checked="checked"{/if} type="radio">{l s='Sandbox' mod='conektaprestashop'}</label>
					</div>
				</div>				
			</div>
			<div class="form-group">
				<label class="control-label col-lg-3">
					{l s='Webhook' mod='conektaprestashop'}
				</label>
				<div class="col-lg-5">
					<input name="conekta_webhook" value="{$url|escape:'htmlall':'UTF-8'}" type="text" required>				
				</div>			
			</div>
			<div class="form-group">
				<label class="control-label col-lg-3"> {l s='Payment Method' mod='conektaprestashop'} </label>
				<div class="col-lg-9">
					<div class="checkbox">
						<label for="conekta_cards"><input name="conekta_cards" value="1" id="conekta_cards" {if $conekta_cards}checked="checked"{/if}type="checkbox">{l s='Card' mod='conektaprestashop'}</label>
					</div>
					<div class="checkbox">
						<label for="conekta_msi"><input name="conekta_msi" value="1" id="conekta_msi" {if $conekta_msi}checked="checked"{/if}type="checkbox">{l s='Monthly Installments' mod='conektaprestashop'}</label>
					</div>
					<div class="checkbox">
						<label for="conekta_cash"><input name="conekta_cash" value="1" id="conekta_cash" {if $conekta_cash}checked="checked"{/if}type="checkbox">{l s='OxxoPay' mod='conektaprestashop'}</label>
					</div>
					<div class="checkbox">
						<label for="conekta_spei"><input name="conekta_spei" value="1" id="conekta_spei" {if $conekta_spei}checked="checked"{/if}type="checkbox">{l s='SPEI' mod='conektaprestashop'}</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-lg-3">
					{l s='Test Private Key' mod='conektaprestashop'}
				</label>
				<div class="col-lg-9">
					<div class="input-group fixed-width-xxl">
						<span class="input-group-addon">
							<i class="icon-key"></i>
						</span>
						<input name="conekta_private_key_test" class="" value="{$conekta_private_key_test|escape:'htmlall':'UTF-8'}" type="password">
					</div>							
				</div>		
			</div>
			<div class="form-group">
				<label class="control-label col-lg-3">
					{l s='Test Public Key' mod='conektaprestashop'}
				</label>
				<div class="col-lg-3">
					<input name="conekta_public_key_test" value="{$conekta_public_key_test|escape:'htmlall':'UTF-8'}" type="text">
				</div>			
			</div>
			<div class="form-group">
				<label class="control-label col-lg-3">
					{l s='Live Private Key' mod='conektaprestashop'}
				</label>
				<div class="col-lg-9">
					<div class="input-group fixed-width-xxl">
						<span class="input-group-addon">
							<i class="icon-key"></i>
						</span>
						<input name="conekta_private_key_live" class="" value="{$conekta_private_key_live|escape:'htmlall':'UTF-8'}" type="password">
					</div>							
				</div>		
			</div>
			<div class="form-group">
				<label class="control-label col-lg-3">
					{l s='Live Public Key' mod='conektaprestashop'}
				</label>
				<div class="col-lg-3">
					<input name="conekta_public_key_live" value="{$conekta_public_key_live|escape:'htmlall':'UTF-8'}" type="text">
				</div>			
			</div>
			<div class="form-group">
				<label class="control-label col-lg-3">
					{l s='Signature Test Key' mod='conektaprestashop'}
				</label>
				<div class="col-lg-3">
					<textarea name="conekta_signature_key_test" class="form-control" rows="5" value="" type="text">{$conekta_signature_key_test|escape:'htmlall':'UTF-8'}</textarea>
				</div>		
			</div>
			<div class="form-group">
				<label class="control-label col-lg-3">
					{l s='Signature Live Key' mod='conektaprestashop'}
				</label>
				<div class="col-lg-3">
					<textarea name="conekta_signature_key_live" class="form-control" rows="5" value="" type="text">
					{$conekta_signature_key_live|escape:'htmlall':'UTF-8'}
					</textarea>	
				</div>		
			</div>
		</div>

		<div class="panel-footer">
			<button type="submit" value="1" id="configuration_form_submit_btn" name="SubmitConekta" class="btn btn-default pull-right">
				<i class="process-icon-save"></i> {l s='Save Configuration' mod='conektaprestashop'}
			</button>
		</div>
	</form>
</div>