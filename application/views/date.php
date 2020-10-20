<?php echo $this->load->view('pluggins/datepicker', '', true); ?>
Masukkan tanggal pengambilan formulir <br>
<form id="form_modal_ajax" action='<?php echo site_url('admin/handleTanggal') ?>' method='post'>
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <?php $tanggal = $this->db->get_where('formulir_permohonan_informasi', array('id' => $id))->row(); ?>
    <input name="tanggal_pengambilan" value="<?php echo @$tanggal->tanggal_pengambilan ?>" id="tanggal_pengambilan" type="text" class="form-control datepicker">

</form>