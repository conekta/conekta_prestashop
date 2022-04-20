{*
 * 2007-2022 PrestaShop and Contributors
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
 * @copyright 2007-2022 PrestaShop SA and Contributors
 * @version v1.0.0
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}

{if isset($message)}
  <div class="conekta-payment-errors" style="display:block;">{$message|escape:'htmlall':'UTF-8'}</div>
{/if}
{if isset($smarty.get.message)}
  <div class="conekta-payment-errors" style="display:block;">{$smarty.get.message|escape:'htmlall':'UTF-8'}</div>
{/if}

<form action="{$action|escape:'htmlall':'UTF-8'}" id="conekta-payment-form" method="post">

  {if isset($smarty.get.conekta_error)}
    <div class="conekta-payment-errors">
      {l s='There was a problem processing your credit card, please double check your data and try again.' mod='conektapaymentsprestashop'}
    </div>
  {/if}
  {if !isset($message)}
      <div id="conektaIframeContainer" style="height:800px; width: 600px;"></div>
      <button style="display:none" id="conekta-payment-resume" type="submit" class="btn btn-primary">resumen</button>
  {/if}

</form>
