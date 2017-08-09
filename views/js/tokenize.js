/**
* 2007-2016 Conekta
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
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
*  @copyright  2012-2016 Conekta
*  @version  v2.0.0
*  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
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
      	if( $form.find('[name=conektaToken]').length) {
        	return true;
        } else {
     	  Conekta.token.create($form, conektaSuccessResponseHandler, conektaErrorResponseHandler);
		  return false; 
        }
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
        $('#conekta-payment-form').prepend('<div class="conekta-payment-errors">' + response.message +'</div>');
        $('.conekta-payment-errors').fadeIn(1000);
    }
    
    $('#conekta-submit-button').removeAttr('disabled');
    $('#conekta-payment-form').show();
    $('#conekta-ajax-loader').hide();
};
