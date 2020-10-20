<?php echo $this->load->view('pluggins/notifications', '', true); ?>
<script>
    $("#<?php echo @$namaForm ?>").submit(function(e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.

        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            beforeSend: function() {
                $('#btn-save').attr('disabled', true);
                $('#btn-save').html('<i class="fa fa-spinner fa-pulse"></i>');
            },
            success: function(data) {
                result = eval('(' + data + ')');
                if (result.success) {
                    Lobibox.notify('success', {
                        msg: result.msg
                    });
                } else {
                    Lobibox.notify('error', {
                        msg: result.msg
                    });
                }
            },
            complete: function() {
                $('#btn-save').attr('disabled', false);
                $('#btn-save').html('<i class="fa fa-check"></i> Simpan');
            }
        });


    });
</script>