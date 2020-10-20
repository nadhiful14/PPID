<script>
    function <?php echo @$namaFunction ?>(id){
    $.post('<?php echo site_url(@$url) ?>'+'/'+id, function (result) {
		 $('<?php echo @$tagHasil ?>').prepend(result);
    });
	<?php echo (!empty($namaMethod))? $namaMethod.'();': "" ?>
	
}</script>