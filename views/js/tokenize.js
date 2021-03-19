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
// if ( $.mobile ) {
// 	//jq mobile loaded
// 	 $(document).on('pageinit', function() {
// 		 conektaSetup();
// 	 });
// 	 $(document).ready(function() {
// 		 conektaSetup();
// 	 });
//  } else {
//    // not jqm
// 	 $(document).ready(function() {
// 		 conektaSetup();
// 	 });
//  }

function callBack(token){
	if(!token.id) {
		conektaErrorResponseHandler(token);
	} else {
		conektaSuccessResponseHandler(token);
	}
}
 
function conektaSetup() {
	if (!$('#conekta-payment-form').length){
		return false;
	}
	 
	var cardComponent = {
		idElement: 'cardNumber',
		style: {
			'width': '210px',
			'padding': '5px 10px',
			'font-size': '15px',
			'border': '1px solid rgb(204, 204, 204)'
		},
		placeholder: ' '
	};

	var cvcComponent = {
		idElement: 'cardVerificationValue',
		style: {
			'padding': '5px 10px',
			'font-size': '15px',
			'border': '1px solid rgb(204, 204, 204)'
		},
		placeholder: ' '
	};

	renderComponents(conekta_public_key, cardComponent, cvcComponent);
}

var conektaSuccessResponseHandler = function(response) {
	console.log(response);
	var $form = $('#conekta-payment-form');
	$form.append($('<input type="hidden" name="conektaToken" id="conektaToken" />').val(response.id));
};
 
var conektaErrorResponseHandler = function(token) {
	if ($('.conekta-payment-errors').length) {
		$('.conekta-payment-errors').fadeIn(1000);
	} else {
		$('#conekta-payment-form').prepend('<div class="conekta-payment-errors">' + token +'</div>');
		$('.conekta-payment-errors').fadeIn(1000);
	}
};


$(document).ready (function($) {
	
	window.ConektaCheckoutComponents.Integration ({
		targetIFrame: "#conektaIframeContainer", 
		checkoutRequestId: conekta_checkout_id,
		publicKey: conekta_public_key,
		options: {
			theme: 'default',
			styles: {
				fontSize: 'baseline',
				inputType: 'rounded',
				buttonType: 'sharp'
			}
		},
		onCreateTokenSucceeded: function (token) {
			console.log("Token creado ");
			document.getElementById('conektaIframeContainer').remove();
			conektaSuccessResponseHandler(token);
		},
		onCreateTokenError: function (error) {
			console.log(error);
			conektaErrorResponseHandler(error);
		},
		onFinalizePayment: function(event) {
		  	var $form = $('#conekta-payment-form');
		  	$form.append($('<input type="hidden" name="conektaOrdenID" id="conektaOrdenID" />').val(conekta_order_id));
			$form.get(0).submit();
			console.log("Pago exitoso.")
		},
		onErrorPayment: function(event) {
			console.log(event)
			alert("Pago declinado.")
		}
	})

});
$('#conekta-payment-form').submit(function(event) {
	var $form = $('#conekta-payment-form');
	if ($form.find('[name=conektaToken]').length) {
		return true;
	} else {
		var month = $('#cardExpMonth').val();
		var year = $('#cardExpYear').val();
		var owner = $('.cardNumber').val();
		createToken('cardNumber', callBack, {
			name: owner,
			expMonth: month,
			expYear: year
		});
		return false;
	}
});