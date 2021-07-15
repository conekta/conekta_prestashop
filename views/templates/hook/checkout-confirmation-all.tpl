{*
 * 2007-2021 PrestaShop and Contributors
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
 * @copyright 2007-2021 PrestaShop SA and Contributors
 * @version v1.0.0
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}

{if isset($cash)}
<p> {l s='Informacion para realizar el pago:' mod='conektapaymentsprestashop'} <p>
                <br><br><b>{l s='Monto:' mod='conektapaymentsprestashop'}</b> $ {$conekta_order.amount|escape:'htmlall':'UTF-8' }
                {$conekta_order.currency|escape:'htmlall':'UTF-8' }
                <br><b><p>OXXO cobrará una comisión adicional al momento de realizar el pago</p>
                <br><h1>Referencia: {$conekta_order.barcode|escape:'htmlall':'UTF-8'}</h1>
                <br><h4>Instrucciones</h3>
                <br><p>1.- Acude a la tienda OXXO más cercana</p>
                <br><p>2.- Indica en caja que quieres realizar un pago de  OXXOPay</p>
                <br><p>3.- Dicta al cajero el número de referencia en esta ficha para que la tecleé directamente en la pantalla de venta</p>
                <br><p>4.- Realiza el pago correspondiente con dinero en efectivo </p>
                <br><p>5.- Al confirmar tu pago, el cajero te entregará un comprobante impreso. En él podrás verificar que se haya realizado correctamente. Conserva este comprobante de pago </p>
                <br /><br /><span>
<div class="conf confirmation">{l s='Por favor de imprimir la ficha de pago y realizar el pago en el OXXO más cercano.' mod='conektapaymentsprestashop'}</div>
{/if}

{if isset($card)}
{if $conekta_order.valid == 1 }
                <div class="conf confirmation">{l s='Pago Exitoso, el pago ha sido aprobado y el pedido se ha guardado con la referencia ' mod='conektapaymentsprestashop'} <b>{$conekta_order.reference|escape:'htmlall':'UTF-8'}</b>.</div>
{else}
                <div class="error">{l s='Sorry, unfortunately an error occurred during the transaction.' mod='conektapaymentsprestashop'}<br /><br />
                {l s='Please double-check your credit card details and try again or feel free to contact us to resolve this issue.' mod='conektapaymentsprestashop'}<br /><br />
                ({l s='Your Order\'s Reference:' mod='conektapaymentsprestashop'} <b>{$conekta_order.reference|escape:'htmlall':'UTF-8'}</b>)</div>
{/if}
{/if}

{if isset($spei)}
<p> {l s='Informacion para realizar el pago por medio de SPEI:' mod='conektapaymentsprestashop'} <p>
                <br><br><b>{l s='Monto:' mod='conektapaymentsprestashop'}</b> $ {$conekta_order.amount|escape:'htmlall':'UTF-8' } {$conekta_order.currency|escape:'htmlall':'UTF-8' }
                <br><br><b>{l s='CLABE:' mod='conektapaymentsprestashop'}</b>
                <br>{$conekta_order.receiving_account_number|escape:'htmlall':'UTF-8'}
                <br /><br /><span>
<div class="conf confirmation">{l s='Por favor de realizar el pago por medio de SPEI.' mod='conektapaymentsprestashop'}</div>
{/if}

{if isset($subscription)}
    {if $conekta_order.valid == 1 }
        <br><br><b>{l s='DETALLE DEL SUBSCRIPCIÓN' mod='conektapaymentsprestashop'}</b>
        <p><br><br><b>{l s='NOMBRE:' mod='conektapaymentsprestashop'}</b>   {$conekta_subscription.name|escape:'htmlall':'UTF-8' }
        <br><br><b>{l s='MONTO:' mod='conektapaymentsprestashop'}</b>   ${$conekta_subscription.amount|escape:'htmlall':'UTF-8' } {$conekta_subscription.currency|escape:'htmlall':'UTF-8' }
        <br><br><b>{l s='INTERVALO:' mod='conektapaymentsprestashop'}</b>   Cada {$conekta_subscription.frequency|escape:'htmlall':'UTF-8' } {$conekta_subscription.interval|escape:'htmlall':'UTF-8' }
        <br><br><b>{l s='DÍAS DE PRUEBA:' mod='conektapaymentsprestashop'}</b>   {$conekta_subscription.trial_period_days|escape:'htmlall':'UTF-8' }
        <br><br><b>{l s='NÚMERO DE CARGOS QUE SE HARÁN:' mod='conektapaymentsprestashop'}</b>  {$conekta_subscription.expiry_count|escape:'htmlall':'UTF-8' }</p>
    {/if}
{/if}