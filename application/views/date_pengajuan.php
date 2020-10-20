<?php echo $this->load->view('pluggins/datepicker', '', true); ?>
Masukkan tanggal pengambilan Pengajuan Keberatan <br>
<form id="form_modal_ajax" action='<?php echo site_url('admin/handleTanggalPengajuan') ?>' method='post'>
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <input name="tanggal_pengambilan" id="tanggal_pengambilan" type="text" class="form-control datepicker">

</form>