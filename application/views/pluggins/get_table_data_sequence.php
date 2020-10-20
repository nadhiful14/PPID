<script>
		$(function() {
			getLaporan();
		});
        <?php $getConfig = $this->db->get_where('sipot_durasi_minimum')->row();
        $interval = 60000*$getConfig->durasi_refresh_public;
        ?>
		setInterval(function(){ getLaporan(); }, <?php echo $interval ?>);//1menit
	</script>