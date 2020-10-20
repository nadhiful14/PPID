<script>
    function <?php echo @$namaFunction ?>(){
    var dataString = $('#frm').serialize(); 
    $('#loading').css('display', 'inline'); 
    $.post('<?php echo site_url(@$url) ?>', dataString, function (result) {
        obj = eval('(' + result + ')'); 
        $('#loading').css('display', 'none'); 
        if (obj.success == 1) {
            $('.gagal').css('display', 'none'); 
            <?php echo @$namaMethod ?>();
        } else{$('.gagal').css('display', 'block'); 
            $('#pesan_gagal').html(obj.message); }
    })
}</script>