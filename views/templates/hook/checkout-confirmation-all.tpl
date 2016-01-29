{if $cash }
<p> Informacion para realizar el pago: <p>
                <br><br><b>{l s='Monto:' mod='pagoefectivo'}</b> $ {$conekta_order.amount } {$conekta_order.currency }
                <br><br><b>{l s='Código de barra:' mod='pagoefectivo'}</b>
                <br><br><img src='{$conekta_order.barcode_url|escape:html:'UTF-8'}'>
                <br>{$conekta_order.barcode|escape:html:'UTF-8'}
                <br /><br /><span>
<div class="conf confirmation">{l s='Por favor de imprimir la ficha de pago y realizar el pago en el OXXO más cercano.' mod='conektatarjeta'}</div>
{/if}

{if $card }
{if $conekta_order.valid == 1 }
		<div class="conf confirmation">{l s='Pago Exitoso, el pago ha sido aprobado y el pedido se ha guardado con la referencia ' mod='conektatarjeta'} <b>{$conekta_order.reference|escape:html:'UTF-8'}</b>.</div>
{else}
		<div class="error">{l s='Sorry, unfortunately an error occured during the transaction.' mod='conektatarjeta'}<br /><br />
		{l s='Please double-check your credit card details and try again or feel free to contact us to resolve this issue.' mod='conektatarjeta'}<br /><br />
		({l s='Your Order\'s Reference:' mod='conektatarjeta'} <b>{$conekta_order.reference|escape:html:'UTF-8'}</b>)</div>
{/if}
{/if}

{if $spei }
<p> Informacion para realizar el pago por medio de SPEI: <p>
                <br><br><b>{l s='Monto:' mod='pagoefectivo'}</b> $ {$conekta_order.amount } {$conekta_order.currency }
                <br><br><b>{l s='Clabe:' mod='pagoefectivo'}</b>
                <br>{$conekta_order.clabe|escape:html:'UTF-8'}
                <br /><br /><span>
<div class="conf confirmation">{l s='Por favor de realizar el pago por medio de SPEI.' mod='conektatarjeta'}</div>
{/if}
