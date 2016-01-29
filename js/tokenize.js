/**
* Handles tokenization in the checkout
* Token sent to server which handles the transaction in charge.php
*/

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



function conektaSetup()
{
	if ($('#conekta_setup_complete').val()==1)
		return false;

	if (!$('#conekta-payment-form').length)
		return false;

	/* Set Conekta public key */
	Conekta.setPublishableKey(conekta_public_key);

	//since we are using smarty html_select_date custom function
	$('#conekta-card-expiry-month').removeAttr('name');
	$('#conekta-card-expiry-year').removeAttr('name');

	$('#conekta-payment-form').submit(function(event) {

        var $form = $('#conekta-payment-form');
    	$form.find("button").prop("disabled", true);
      	if( $form.find('[name=conektaToken]').length)
        	return true;
     	Conekta.token.create($form, conektaSuccessResponseHandler, conektaErrorResponseHandler);
		return false; 
	});
}


var conektaSuccessResponseHandler = function(response) {
    var $form = $('#conekta-payment-form');
    $form.append($('<input type="hidden" name="conektaToken" />').val(response.id));
    $form.get(0).submit();
    
};


var conektaErrorResponseHandler = function(response) {
    var $form = $('#conekta-payment-form');
    //$form.unblock();
    
    if ($('.conekta-payment-errors').length)
        $('.conekta-payment-errors').fadeIn(1000);
    else
    {
        $('#conekta-payment-form').prepend('<div class="conekta-payment-errors">' + response.message_to_purchaser +'</div>');
        $('.conekta-payment-errors').fadeIn(1000);
    }
    
    $('#conekta-submit-button').removeAttr('disabled');
    $('#conekta-payment-form').show();
    $('#conekta-ajax-loader').hide();
};
