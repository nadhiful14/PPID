function enableButton() {
    $('#form-button-save').attr('disabled', false);
    $('#form-button-save').html('<i class="fa fa-check"></i> Save');
    $('#save-and-go-back-button').attr('disabled', false);
    $('#save-and-go-back-button').html('<i class="fa fa-rotate-left"></i> Save and go back to list');
}
function disableButton(save_and_close) {
    if (save_and_close) {
        $('#save-and-go-back-button').attr('disabled', true);
        $('#save-and-go-back-button').html('<i class="fa fa-spinner fa-pulse"></i>');
        $('#form-button-save').attr('disabled', true);
    } else {
        $('#form-button-save').attr('disabled', true);
        $('#form-button-save').html('<i class="fa fa-spinner fa-pulse"></i>');
        $('#save-and-go-back-button').attr('disabled', true);
    }
}
function enableButtonUpdate() {
    $('#form-button-save').attr('disabled', false);
    $('#form-button-save').html('<i class="fa fa-check"></i> Update Changes');
    $('#save-and-go-back-button').attr('disabled', false);
    $('#save-and-go-back-button').html('<i class="fa fa-rotate-left"></i> Update and go back to list');
}
function disableButtonUpdate(save_and_close) {
    if (save_and_close) {
        $('#save-and-go-back-button').attr('disabled', true);
        $('#save-and-go-back-button').html('<i class="fa fa-spinner fa-pulse"></i>');
        $('#form-button-save').attr('disabled', true);
    } else {
        $('#form-button-save').attr('disabled', true);
        $('#form-button-save').html('<i class="fa fa-spinner fa-pulse"></i>');
        $('#save-and-go-back-button').attr('disabled', true);
    }
}
//disable auto complete
jQuery(function ($) {
    $('#crud-form').on('focus', ':input', function(){
        $(this).attr( 'autocomplete', 'off' );
    });
});