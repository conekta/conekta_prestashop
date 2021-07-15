/**
* 2007-2021 Conekta
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
*  @copyright  2012-2021 Conekta
*  @version  v2.0.0
*  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

function manageInstallments() {
    let enabled = $("#INSTALLMENTS_ENABLED").is(":checked")
    let elements = $(".checkbox > label[for^='INSTALLMENTS_'][for$='_MONTHS']").parent()
    let minimum = $("#INSTALLMENTS_MINIMUM").parent().parent();
    if( enabled ) {
        elements.removeClass( "hidden" )
        minimum.removeClass( "hidden" )
    } else {
        elements.addClass( "hidden" )
        minimum.addClass( "hidden" )
    }
}

$(document).ready(function() {
    //initial state
    $("#EXPIRATION_DATE_TYPE_DAYS").prop( "disabled", !$("#PAYMENT_METHS_CASH").is(":checked"));
    $("#EXPIRATION_DATE_TYPE_HOURS").prop( "disabled", !$("#PAYMENT_METHS_CASH").is(":checked") );
    $("#EXPIRATION_DATE_LIMIT").prop( "disabled", !$("#PAYMENT_METHS_CASH").is(":checked") );
    manageInstallments();
    
    $("#INSTALLMENTS_ENABLED").change(manageInstallments);

    //onchange value
    $("#PAYMENT_METHS_CASH").change(function() {
        $("#EXPIRATION_DATE_TYPE_DAYS").prop( "disabled", !this.checked );
        $("#EXPIRATION_DATE_TYPE_HOURS").prop( "disabled", !this.checked );
        $("#EXPIRATION_DATE_LIMIT").prop( "disabled", !this.checked );  
        $("#EXPIRATION_DATE_LIMIT").prop( "required", this.checked );      
    });

}); 