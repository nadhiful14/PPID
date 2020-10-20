<form method="post" id="formSubmit2" action="<?php echo site_url('admin/updateDurasiMinimum') ?>">
    <div class="row">
        <div class="col-md-4 col-lg-4 col-sm-12">
            <div class="form-group">
                <label for="inputEmail3" class="control-label">Durasi Minimum Jam Kerja(Jam)</label>
                <select name="minim_jam_kerja" class="chosen-select" style="width:100%">
                    <?php echo $this->general->generateAngka(8, @$dataMinimum->minim_jam_kerja) ?>
                </select>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="control-label">Durasi Minimum Jam Kerja(Jam)</label>
                <select name="minim_jam_kerja_lembur" class="chosen-select" width="20px">
                    <?php echo $this->general->generateAngka(8, @$dataMinimum->minim_jam_kerja_lembur) ?>
                </select>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="control-label">Durasi Minimum Jam Kerja(Jam)</label>
                <select name="minim_jam_lembur" class="chosen-select" width="20px">
                    <?php echo $this->general->generateAngka(8, @$dataMinimum->minim_jam_lembur) ?>
                </select>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-12">
            <div class="form-group">
                <label for="pwd">Jam Cut Off:</label>
                <input type="text" value="<?php echo substr(@$dataMinimum->jam_cut_off, 0, 5) ?>" class="form-control time-input" name="jam_cut_off">
            </div>
            <div class="checkbox">
                <label><input type="checkbox" name="is_cut_off_aktif" <?php echo (@$dataMinimum->is_cut_off_active == 1) ? 'checked' : '' ?>> Cut Off Aktif</label>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success" id="btn-save"><i class="fa fa-check"></i> Simpan</button>
</form>

<style>
    .chosen-container {
        width: 137px !important;
    }
</style>
<?php echo formPost("formSubmit2"); ?>