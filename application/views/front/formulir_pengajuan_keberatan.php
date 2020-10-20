<!-- end header -->
<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="title-holder">
            <div class="title-holder-cell text-left">
              <h1 class="page-title">Formulir Pengajuan Keberatan</h1>
              <ol class="breadcrumb">
                <li><a href="<?php echo site_url() ?>">Home</a></li>
                <li class="active">Formulir Pengajuan Keberatan </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end inner page banner -->
<div class="section padding_layout_1">
  <div class="container">
    <div class="row" style="padding: 0px 75px 0px 75px">
      <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12"></div>
      <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
          <div class="full">
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 adress_cont margin_bottom_30">
              <img width="230px" src="<?php echo base_url('assets/uploads/files') ?>/aa.png" alt="logo" />
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 adress_cont ">
              <h3>FORMULIR KEBERATAN ATAS LAYANAN INFORMASI PUBLIK </h3>
              <p>Dinas Pekerjaan Umum Sumber Daya Air Dan Penataan Ruang Provinsi Jawa Tengah</p>
            </div>
          </div>
        </div>
        <hr size="12px" width="100%" align="center" style="margin-bottom: 40px">
        <div class="row">
          <div class="full">
            <?php echo form_open_multipart('Front/add_form_pengajuan') ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 adress_cont margin_bottom_30">
              <p>Dengan hormat,</p>
              <p class="adress_cont margin_bottom_30">Di bawah ini, saya mengajukan Formulir Keberatan Atas Layanan Informasi Publik pada Dinas PUSDATARU Provinsi Jawa Timur, sebagai berikut :
              </p>
              <strong class="adress_cont margin_bottom_30">DATA PRIBADI PEMOHON KEBERATAN INFORMASI PUBLIK</strong>
              <label for="inputEmail4"> <strong>Nama Lengkap</strong></label>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" id="nama_depan" name="nama_depan" required>
                  <small>Nama Depan</small>
                </div>
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" required>
                  <small>Nama Belakang</small>
                </div>
              </div>
              <div class="position-relative form-group">
                <label for="nama_alternatif" class=""><strong>Alamat E-mail aktif</strong></label>
                <input name="email" id="email" type="email" autocomplete='off' class="form-control" required>
                <small>Alamat e-mail harus aktif!</small>
              </div>
              <div class="position-relative form-group">
                <label for="nama_alternatif" class=""><strong>Nomor Telp/HP</strong></label>
                <input name="no_telpon" id="no_telpon" type="text" autocomplete='off' class="form-control">
              </div>

              <div class="position-relative form-group margin_bottom_30">
                <label for="nama_alternatif" class=""><strong>Lampiran scan KTP</strong></label>
                <div class="row">

                  <!-- <div class="col-md-12">
                    <div class="alert alert-danger form-group position-relative" role="alert">
                      This is a danger alert—check it out!
                    </div>
                  </div> -->
                  <div class="col-md-12">
                    <div class="custom-file">
                      <input type="file" id="upload_ktp" name="upload_ktp"><br>
                      <small for="image">File dalam format jpg, maksimal 1 Mb</small>
                    </div>
                  </div>
                </div>
              </div>

              <strong class="position-relative form-group">ALASAN PENGAJUAN KEBERATAN ATAS INFORMASI PUBLIK</strong>
              <p class="position-relative form-group">Silakan pilih salah satu alasan keberatan atas Layanan Informasi Publik pada Dinas PUSDATARU Provinsi Jawa Timur di bawah ini dan berikan penjelasannya :</p>
              <div class="position-relative form-group">
                <label for="nama_alternatif" class=""><strong>Informasi yang diminta</strong></label>
                <input name="informasi" id="informasi" type="text" autocomplete='off' class="form-control" required></input>
              </div>

              <div class="position-relative form-group">
                <label for="nama_alternatif" class=""><strong>Alasan keberatan </strong></label>
                <div class="checkbox">
                  <label><input type="checkbox" name="alasan_keberatan[]" value="Permohonan Informasi di tolak"> Permohonan Informasi di tolak</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" name="alasan_keberatan[]" value="Informasi berkala tidak disediakan"> Informasi berkala tidak disediakan</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" name="alasan_keberatan[]" value="Permintaan informasi tidak ditanggapi"> Permintaan informasi tidak ditanggapi</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" name="alasan_keberatan[]" value="Permintaan informasi ditanggapi tidak sebagaimana yang diminta"> Permintaan informasi ditanggapi tidak sebagaimana yang diminta</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" name="alasan_keberatan[]" value="Permintaan informasi tidak dipenuhi"> Permintaan informasi tidak dipenuhi</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" name="alasan_keberatan[]" value="Biaya yang dikenakan tidak wajar"> Biaya yang dikenakan tidak wajar</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" name="alasan_keberatan[]" value="Informasi disampaikan melebihi jangka waktu yang ditentukan"> Informasi disampaikan melebihi jangka waktu yang ditentukan</label>
                </div>
              </div>

              <div class="position-relative form-group">
                <label for="nama_alternatif" class=""><strong>Tambahkan keterangan atas keberatan Anda</strong></label>
                <textarea name="keterangan_keberatan" id="keterangan_keberatan" type="text" autocomplete='off' class="form-control" required></textarea>
              </div>

              <div class="position-relative form-group adress_cont margin_bottom_30">
                <label for="lampiran" class=""><strong>Lampiran bukti keberatan</strong></label>
                <div class="row">
                  <div class="col-md-8">
                    <div class="custom-file">
                      <input type="file" id="upload_lampiran" name="upload_lampiran"><br>
                      <small for="image">Lampirkan scan bukti keberatan, maksimal 1 Mb</small>
                    </div>
                  </div>
                </div>
              </div>
              <p class="adress_cont margin_bottom_30">Demikian pengajuan keberatan atas Layanan Informasi Publik pada Dinas PUSDATARU Provinsi Jawa Timur saya ajukan dan dapat dipertanggung-jawabkan. Terima kasih</p>


              <button type="submit" class="btn btn-primary">Submit</button>
              <?php echo form_close(); ?>

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- section -->