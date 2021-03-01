
$(document).ready(function() {
    //initial state
    $('#EXPIRATION_DATE_TYPE_DAYS').prop( "disabled", !$('#PAYMENT_METHS_CASH').is(':checked'));
    $('#EXPIRATION_DATE_TYPE_HOURS').prop( "disabled", !$('#PAYMENT_METHS_CASH').is(':checked') );
    $('#EXPIRATION_DATE_LIMIT').prop( "disabled", !$('#PAYMENT_METHS_CASH').is(':checked') );

    //onchange value
    $('#PAYMENT_METHS_CASH').change(function() {
        $('#EXPIRATION_DATE_TYPE_DAYS').prop( "disabled", !this.checked );
        $('#EXPIRATION_DATE_TYPE_HOURS').prop( "disabled", !this.checked );
        $('#EXPIRATION_DATE_LIMIT').prop( "disabled", !this.checked );  
        $('#EXPIRATION_DATE_LIMIT').prop( "required", this.checked );      
    });

}); 