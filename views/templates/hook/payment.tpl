
{if $card == 1 }

<div class="payment_module conekta-payment-module card-option" >
	<h3 class="conekta_title">{l s='Pago con tarjeta de créditos y débito' mod='conektatarjeta'}</h3>

	<div id="conekta-ajax-loader"><img src="{$module_dir|escape:'bellini':'UTF-8'}img/ajax-loader.gif" alt="" /> {l s='Transaction in progress, please wait.' mod='conektatarjeta'}</div>

	<form data-ajax="false" action="{$module_dir}charge.php" method="POST" id="conekta-payment-form">
		{if isset($smarty.get.conekta_error)}<a id="conekta_error" name="conekta_error"></a><div class="conekta-payment-errors">{l s='There was a problem processing your credit card, please double check your data and try again.' mod='conektatarjeta'}</div>{/if}
		<div class="conekta-card-deleted"></div>

                <label>{l s='Nombre del tarjetahabiente' mod='conektatarjeta'}</label><br />
                <input type="text" size="20" autocomplete="off" class="conekta-card-name" data-conekta="card[name]" />
                <br />

		<label>{l s='Número de tarjeta' mod='conektatarjeta'}</label><br />
		<input type="text" size="20" autocomplete="off" class="conekta-card-number" data-conekta="card[number]" />
		<br />
		<div class="block-left">
		</div>
		<div class="block-left">
			<label>{l s='CVC' mod='conektatarjeta'}</label><br />
			<input type="text" size="4" autocomplete="off" class="conekta-card-cvc" data-conekta="card[cvc]" />
		</div>
		<div class="clear"></div>
		<label>{l s='Fecha de Expiración (MM/YYYY)' mod='conektatarjeta'}</label><br />
{* use this if the merchant would like the months to be names	*}
		{html_select_date month_extra='id="conekta-card-expiry-month" class="conekta-card-expiry-month" data-conekta="card[exp_month]" data-encrypted-name="month"' data-conekta="card[exp_year]" year_extra='id="conekta-card-expiry-year" class="conekta-card-expiry-year" data-encrypted-name="year"' display_days=false end_year="+10"}

		<br />

		<input type="submit" value="{l s='Realizar Pago' mod='conektatarjeta'}" style="margin-top:20px;" id="conekta-submit-button" class="conekta-submit-button exclusive" data-icon="check" data-iconpos="right" data-theme="b" />

	</form>

</div>
{/if}

{if $cash == 1}

<div class="payment_module conekta-payment-module cash-option" >

<h3 class="conekta_title">{l s='Pago en efectivo (Oxxo)' mod='conektatarjeta'}</h3>

{* Classic Credit card form *}
<div id="conekta-ajax-loader"><img src="{$module_dir|escape:'bellini':'UTF-8'}img/ajax-loader.gif" alt="" /> {l s='Transaction in progress, please wait.' mod='conektatarjeta'}</div>

<form data-ajax="false" action="{$module_dir}charge.php" method="POST" id="conekta-cash-form">

<input type="submit" value="{l s='Generar Ficha de Pago' mod='conektatarjeta'}" id="conekta-submit-button" class="{if $conekta_ps_version >= '1.5'}conekta-submit-button {/if}exclusive" data-icon="check" data-iconpos="right" data-theme="b" />

</form>


</div>

{/if}

{if $spei == 1 }

<div class="payment_module conekta-payment-module spei-option" >

<h3 class="conekta_title">{l s='Pago por medio de SPEI' mod='conektatarjeta'}</h3>

{* Classic Credit card form *}
<div id="conekta-ajax-loader"><img src="{$module_dir|escape:'bellini':'UTF-8'}img/ajax-loader.gif" alt="" /> {l s='Transaction in progress, please wait.' mod='conektatarjeta'}</div>

<form data-ajax="false" action="{$module_dir}charge.php" method="POST" id="conekta-cash-form">

<input type="submit" value="{l s='Generar Clabe para Realizar Pago' mod='conektatarjeta'}" id="conekta-submit-button" class="{if $conekta_ps_version >= '1.5'}conekta-submit-button {/if}exclusive" data-icon="check" data-iconpos="right" data-theme="b" />

</form>

</div>

{/if}

{literal}
<script>
if ( $.mobile ) {
   //jq mobile loaded
	$(document).on('pageinit', function() {
		conektaSetup();
	});
	$(document).ready(function() {
		conektaSetup();
	});

} else {
  // not jqm
	$(document).ready(function() {
		conektaSetup();
	});
} 
</script>
{/literal}
