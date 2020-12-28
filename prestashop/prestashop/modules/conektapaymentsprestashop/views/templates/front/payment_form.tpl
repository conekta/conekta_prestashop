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

{if isset($smarty.get.message)}
<div class="conekta-payment-errors" style="display:block;">{$smarty.get.message|escape:'htmlall':'UTF-8'}</div>
{/if}

<form action="{$action|escape:'htmlall':'UTF-8'}" id="conekta-payment-form">
{if isset($smarty.get.conekta_error)}<div class="conekta-payment-errors">{l s='There was a problem processing your credit card, please double check your data and try again.' mod='conektapaymentsprestashop'}</div>{/if}
  <p>
    <label>{l s='Nombre del Tarjetahabiente' mod='conektapaymentsprestashop'}</label>
    <input type="text" autocomplete="off" class="conekta-card-name" data-conekta="card[name]">
  </p>

  <div>
    <label>{l s='Número de Tarjeta' mod='conektapaymentsprestashop'}</label>
    <div id="conekta-card-number" class="conekta-card-number" style="height: 50px;"></div>
  </div>

  <div>
    <label>{l s='CVC' mod='conektapaymentsprestashop'}</label>
    <div id="conekta-card-cvc" class="conekta-card-cvc" style="height: 50px;"></div>
  </div>

  <p>
    <label>{l s='Expiration (MM/AAAA)' mod='conektapaymentsprestashop'}</label>
    <select class="conekta-card-expiry-month" id="conekta-card-expiry-month" data-conekta="card[exp_month]" data-encrypted-name="month">
      {foreach from=$months item=month}
        <option value="{$month|escape:'htmlall':'UTF-8'}">{$month|escape:'htmlall':'UTF-8'}</option>
      {/foreach}
    </select>
    <span> / </span>
    <select class="conekta-card-expiry-year" id="conekta-card-expiry-year" data-conekta="card[exp_year]" data-encrypted-name="year">
      {foreach from=$years item=year}
        <option value="{$year|escape:'htmlall':'UTF-8'}">{$year|escape:'htmlall':'UTF-8'}</option>
      {/foreach}
    </select>
  </p>
  {if $msi == 1}
    <p>
    <label>{l s='Monthly Installments' mod='conektapaymentsprestashop'}</label>
    <select class="conekta-card-msi" id="conekta-card-msi" name="monthly_installments">
        {foreach from=$msi_jumps item=msi}
          <option value="{$msi|escape:'htmlall':'UTF-8'}">{$msi|escape:'htmlall':'UTF-8'}</option>
        {/foreach}
      </select>
    </p>
  {/if}
</form>