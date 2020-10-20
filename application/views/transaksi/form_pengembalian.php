<form id="form_modal_ajax" action="<?php echo site_url('admin/simpanPengembalian') ?>" method="post">
 <input type=hidden name="id" value=<?php echo @$id ?>>
  <div class="form-group">
    <label for="email">Keterangan Pengembalian:</label>
    <textarea name="keterangan" class="texteditor"><?php echo @$isi->keterangan ?></textarea>
  </div>
</form>
<script src="<?php echo base_url() ?>/assets/grocery_crud/texteditor/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url() ?>/assets/grocery_crud/texteditor/ckeditor/adapters/jquery.js"></script>
<script src="<?php echo base_url() ?>/assets/grocery_crud/js/jquery_plugins/config/jquery.ckeditor.config.js"></script>

