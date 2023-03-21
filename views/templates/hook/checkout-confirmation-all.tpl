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
 * @version   GIT: @2.3.6@
 * @see       https://conekta.com/
 *}
{if isset($cash)}
<p> {l s='Informacion para realizar el pago:' mod='conekta'} <p>
                <br><br><b>{l s='Monto:' mod='conekta'}</b> $ {$conekta_order.amount|escape:'htmlall':'UTF-8' }
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
<div class="conf confirmation">{l s='Por favor de imprimir la ficha de pago y realizar el pago en el OXXO más cercano.' mod='conekta'}</div>
{/if}

{if isset($card)}
{if $conekta_order.valid == 1 }
                <div class="conf confirmation">{l s='Pago Exitoso, el pago ha sido aprobado y el pedido se ha guardado con la referencia ' mod='conekta'} <b>{$conekta_order.reference|escape:'htmlall':'UTF-8'}</b>.</div>
{else}
                <div class="error">{l s='Sorry, unfortunately an error occurred during the transaction.' mod='conekta'}<br /><br />
                {l s='Please double-check your credit card details and try again or feel free to contact us to resolve this issue.' mod='conekta'}<br /><br />
                ({l s='Your Order\'s Reference:' mod='conekta'} <b>{$conekta_order.reference|escape:'htmlall':'UTF-8'}</b>)</div>
{/if}
{/if}

{if isset($spei)}
<p> {l s='Informacion para realizar el pago por medio de SPEI:' mod='conekta'} <p>
                <br><br><b>{l s='Monto:' mod='conekta'}</b> $ {$conekta_order.amount|escape:'htmlall':'UTF-8' } {$conekta_order.currency|escape:'htmlall':'UTF-8' }
                <br><br><b>{l s='CLABE:' mod='conekta'}</b>
                <br>{$conekta_order.receiving_account_number|escape:'htmlall':'UTF-8'}
                <br /><br /><span>
<div class="conf confirmation">{l s='Por favor de realizar el pago por medio de SPEI.' mod='conekta'}</div>
{/if}

{if isset($subscription)}
    {if $conekta_order.valid == 1 }
        <br><br><b>{l s='DETALLE DEL SUBSCRIPCIÓN' mod='conekta'}</b>
        <p><br><br><b>{l s='NOMBRE:' mod='conekta'}</b>   {$conekta_subscription.name|escape:'htmlall':'UTF-8' }
        <br><br><b>{l s='MONTO:' mod='conekta'}</b>   ${$conekta_subscription.amount|escape:'htmlall':'UTF-8' } {$conekta_subscription.currency|escape:'htmlall':'UTF-8' }
        <br><br><b>{l s='INTERVALO:' mod='conekta'}</b>   Cada {$conekta_subscription.frequency|escape:'htmlall':'UTF-8' } {$conekta_subscription.interval|escape:'htmlall':'UTF-8' }
        <br><br><b>{l s='DÍAS DE PRUEBA:' mod='conekta'}</b>   {$conekta_subscription.trial_period_days|escape:'htmlall':'UTF-8' }
        <br><br><b>{l s='NÚMERO DE CARGOS QUE SE HARÁN:' mod='conekta'}</b>  {$conekta_subscription.expiry_count|escape:'htmlall':'UTF-8' }</p>
    {/if}
{/if}