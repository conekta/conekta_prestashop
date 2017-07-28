{*
* 2007-2017 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
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
*  @copyright 2007-2017 PrestaShop SA
*  @version v1.0.0
*  @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*}

<div class="alert alert-info">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   	<span aria-hidden="true">&times;</span>
  </button>
  <img src="../modules/conekta_prestashop/views/img/conektalogo.png" style="float:left; margin-right:15px;" width="86" height="49">
  <p><strong>{l s='This module allows you to accept payments by check.'' d='Modules.Checkpayment.Admin' }</strong></p>
  <p>{l s="If the client chooses this payment method, the order status will change to 'Waiting for payment'." d='Modules.Checkpayment.Admin'}</p>
  <p>{l s="You will need to manually confirm the order as soon as you receive a check." d='Modules.Checkpayment.Admin'}</p>
</div>
{if $error_webhook_message}
	<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		 </button>
		<p>{$error_webhook_message|escape:'htmlall':'UTF-8'}</p>
	</div>
{/if}
{if $is_submit_config}
	<div class="alert alert-success">{l s='Settings successfully saved' }</div>
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