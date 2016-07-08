{if $cash }
<p> Informacion para realizar el pago: <p>
                <br><br><b>{l s='Monto:' mod='conektaprestashop'}</b> $ {$conekta_order.amount|escape:'htmlall':'UTF-8' } {$conekta_order.currency|escape:'htmlall':'UTF-8' }
                <br><br><b>{l s='Código de barra:' mod='conektaprestashop'}</b>
                <br><br><img src="{$conekta_order.barcode_url|escape:'htmlall':'UTF-8'}">
                <br>{$conekta_order.barcode|escape:'htmlall':'UTF-8'}
                <br /><br /><span>
<div class="conf confirmation">{l s='Por favor de imprimir la ficha de pago y realizar el pago en el OXXO más cercano.' mod='conektaprestashop'}</div>
{/if}

{if $card }
{if $conekta_order.valid == 1 }
		<div class="conf confirmation">{l s='Pago Exitoso, el pago ha sido aprobado y el pedido se ha guardado con la referencia ' mod='conektaprestashop'} <b>{$conekta_order.reference|escape:'htmlall':'UTF-8'}</b>.</div>
{else}
		<div class="error">{l s='Sorry, unfortunately an error occurred during the transaction.' mod='conektaprestashop'}<br /><br />
		{l s='Please double-check your credit card details and try again or feel free to contact us to resolve this issue.' mod='conektaprestashop'}<br /><br />
		({l s='Your Order\'s Reference:' mod='conektaprestashop'} <b>{$conekta_order.reference|escape:'htmlall':'UTF-8'}</b>)</div>
{/if}
{/if}

{if $spei }
<p> Informacion para realizar el pago por medio de SPEI: <p>
                <br><br><b>{l s='Monto:' mod='conektaprestashop'}</b> $ {$conekta_order.amount|escape:'htmlall':'UTF-8' } {$conekta_order.currency|escape:'htmlall':'UTF-8' }
                <br><br><b>{l s='CLABE:' mod='conektaprestashop'}</b>
                <br>{$conekta_order.receiving_account_number|escape:'htmlall':'UTF-8'}
                <br /><br /><span>
<div class="conf confirmation">{l s='Por favor de realizar el pago por medio de SPEI.' mod='conektaprestashop'}</div>
{/if}

{if $banorte }
<p> Informacion para realizar el pago por medio de BANORTE: <p>
                <br><br><b>{l s='Monto:' mod='conektaprestashop'}</b> $ {$conekta_order.amount|escape:'htmlall':'UTF-8' } {$conekta_order.currency|escape:'htmlall':'UTF-8' }
                <br><br><b>{l s='Referencia:' mod='conektaprestashop'}</b>
                <br>{$conekta_order.reference|escape:'htmlall':'UTF-8'}
                <br><br><b>{l s='Número de servicio:' mod='conektaprestashop'}</b>
                <br>{$conekta_order.service_number|escape:'htmlall':'UTF-8'}
                <br><br><b>{l s='Nombre de servicio:' mod='conektaprestashop'}</b>
                <br>{$conekta_order.service_name|escape:'htmlall':'UTF-8'}
                <br /><br /><span>
<div class="conf confirmation">{l s='Por favor de realizar el pago por medio de BANORTE.' mod='conektaprestashop'}</div>
{/if}
