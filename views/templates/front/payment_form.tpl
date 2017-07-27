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

<form action="{$action}" id="conekta-payment-form">
{if isset($smarty.get.conekta_error)}<a id="conekta_error" name="conekta_error"></a><div class="conekta-payment-errors">{l s='There was a problem processing your credit card, please double check your data and try again.' mod='conekta_prestashop'}</div>{/if}
  <p>
    <label>{l s='Nombre del Tarjetahabiente'}</label>
    <input type="text" autocomplete="off" class="conekta-card-name" data-conekta="card[name]">
  </p>

  <p>
    <label>{l s='Número de Tarjeta'}</label>
    <input type="text" size="20" autocomplete="off" class="conekta-card-number" data-conekta="card[number]">
  </p>

  <p>
    <label>{l s='CVC'}</label>
    <input type="text" size="4" autocomplete="off" class="conekta-card-cvc" data-conekta="card[cvc]">
  </p>

  <p>
    <label>{l s='Expiration (MM/AAAA)'}</label>
    <select id="month" class="conekta-card-expiry-month" id="conekta-card-expiry-month" data-conekta="card[exp_month]" data-encrypted-name="month">
      {foreach from=$months item=month}
        <option value="{$month}">{$month}</option>
      {/foreach}
    </select>
    <span> / </span>
    <select id="year" class="conekta-card-expiry-year" id="conekta-card-expiry-year" data-conekta="card[exp_year]" data-encrypted-name="year">
      {foreach from=$years item=year}
        <option value="{$year}">{$year}</option>
      {/foreach}
    </select>
  </p>
</form>
