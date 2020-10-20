		<div class="row">
			<div class="col-md-12 col-lg-12 col-sm-12">
				<form method="post" id="frm">
					<input type=hidden name=departemen_id value="<?php echo $this->session->userdata('departemen_id') ?>">
				</form>
				<div id="toPrint">
					<div id="hasilCari"></div>
				</div>
				<?php echo ajax_return_json('getLaporan', 'staff/getLogDepartemen', 'hasilCari'); ?>
			</div>
		</div>
<?php echo $this->load->view('pluggins/get_table_data_sequence','',true) ?>