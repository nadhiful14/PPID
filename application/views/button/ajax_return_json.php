<script>
    function <?php echo @$namaFunction ?>(){
    var dataString = $('#frm').serialize(); 
    $('#loader').css('display', 'block'); 
    $('#<?php echo @$tagHasil ?>').html(""); 
    $.post('<?php echo site_url(@$url) ?>', dataString, function (result) {
        obj = eval('(' + result + ')'); 
        $('#loader').css('display', 'none'); 
        if (obj.success) {
            $('.gagal').css('display', 'none'); 
            $('#<?php echo @$tagHasil ?>').html(obj.result); 
        } else{$('.gagal').css('display', 'block'); 
            $('#pesan_gagal').html(obj.msg); }
    })
}</script>