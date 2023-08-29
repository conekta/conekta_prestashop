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
{if isset($message)}
  <div class="conekta-payment-errors" style="display:block;">{$message|escape:'htmlall':'UTF-8'}</div>
{/if}
{if isset($smarty.get.message)}
  <div class="conekta-payment-errors" style="display:block;">{$smarty.get.message|escape:'htmlall':'UTF-8'}</div>
{/if}

<form action="{$action|escape:'htmlall':'UTF-8'}" id="conekta-payment-form" method="post">

  {if isset($smarty.get.conekta_error)}
    <div class="conekta-payment-errors">
      {l s='There was a problem processing your credit card, please double check your data and try again.' mod='conekta'}
    </div>
  {/if}
  {if !isset($message)}
      <div id="conektaIframeContainer" style="height:800px; width: 100%;"></div>
      <button style="display:none" id="conekta-payment-resume" type="submit" class="btn btn-primary">resumen</button>
  {/if}

</form>
