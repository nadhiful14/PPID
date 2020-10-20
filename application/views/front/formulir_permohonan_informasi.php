<!-- end header -->
<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="title-holder">
            <div class="title-holder-cell text-left">
              <h1 class="page-title">Formulir Permohonan Informasi</h1>
              <ol class="breadcrumb">
                <li><a href="<?php echo site_url() ?>">Home</a></li>
                <li class="active">Formulir Permohonan Informasi </li>
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
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 adress_cont margin_bottom_30">
              <img width="90px" src="<?php echo base_url('assets/template/img') ?>/logo/logodprdblitar.png" alt="logo" />

            </div>
            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 adress_cont ">
              <h3>FORMULIR PERMOHONAN INFORMASI</h3>
              <p>Dinas Pekerjaan Umum Sumber Daya Air dan Penataan Ruang Provinsi Jawa Timur </p>

            </div>


          </div>
        </div>
        <hr size="12px" width="100%" align="center" style="margin-bottom: 40px">
        <div class="row">
          <div class="full">
            <?php echo form_open_multipart('Front/add_form_permohonan') ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 adress_cont margin_bottom_30">
              <div class="position-relative form-group">
                <label for="nama_alternatif" class=""><strong>Nomor Formulir</strong></label>
                <input name="nomor" id="nomor" type="text" autocomplete='off' class="form-control">
                <small>Diisi oleh petugas</small>
              </div>
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
                <label for="nama_alternatif" class=""><strong>Alamat Lengkap</strong></label>
                <input name="alamat" id="alamat" type="text" autocomplete='off' class="form-control" required>
                <small>Alamat Baris 1</small>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" id="kota" name="kota" required>
                  <small>Kota</small>
                </div>
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" id="provinsi" name="provinsi" required>
                  <small>Provinsi</small>
                </div>
              </div>
              <div class="position-relative form-group">
                <label for="nama_alternatif" class=""><strong>Nomor Telp/HP</strong></label>
                <input name="no_telpon" id="no_telpon" type="text" autocomplete='off' class="form-control">
                <small>Cantumkan kode area untuk nomor telp kantor/ rumah</small>
              </div>
              <div class="position-relative form-group">
                <label for="nama_alternatif" class=""><strong>Pekerjaan</strong></label>
                <input name="pekerjaan" id="pekerjaan" type="text" autocomplete='off' class="form-control">
              </div>
              <div class="position-relative form-group">
                <label for="nama_alternatif" class=""><strong>Email</strong></label>
                <input name="email" id="email" type="email" autocomplete='off' class="form-control" required>
              </div>
              <div class="position-relative form-group">
                <label for="nama_alternatif" class=""><strong>Upload scan KTP</strong></label>
                <div class="row">
                  <div class="col-md-8">
                    <div class="custom-file">
                      <input type="file" id="upload_ktp" name="upload_ktp"><br>
                      <small for="image">File jpg, png maksimal 1 Mb</small>
                    </div>
                  </div>
                </div>
              </div>

              <div class="position-relative form-group">
                <label for="nama_alternatif" class=""><strong>Upload Scan Pengantar dari Instansi / Perguruan Tinggi</strong></label>
                <div class="row">
                  <div class="col-md-8">
                    <div class="custom-file">
                      <input type="file" id="upload_pengantar" name="upload_pengantar"><br>
                      <small for="image">File jpg, png maksimal 1 Mb</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="position-relative form-group">
                <label for="nama_alternatif" class=""><strong>Informasi yang dibutuhkan</strong></label>
                <textarea name="informasi" id="informasi" type="text" autocomplete='off' class="form-control" required></textarea>
              </div>
              <div class="position-relative form-group">
                <label for="nama_alternatif" class=""><strong>Tujuan Memperoleh Informasi</strong></label>
                <textarea name="tujuan" id="tujuan" type="text" autocomplete='off' class="form-control" required></textarea>
              </div>
              <div class="position-relative form-group">
                <label for="nama_alternatif" class=""><strong>Cara Memperoleh Informasi</strong></label>
                <div class="checkbox">
                  <label><input type="checkbox" name="cara_memperoleh[]" value="Melihat/Membaca/Mendengarkan/Mencatat"> Melihat/Membaca/Mendengarkan/Mencatat</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" name="cara_memperoleh[]" value="Mendapatkan salinan informasi hardcopy/ softcopy"> Mendapatkan salinan informasi hardcopy/ softcopy</label>
                </div>
              </div>
              <div class="position-relative form-group">
                <label for="nama_alternatif" class=""><strong>Cara Mendapatkan Salinan Informasi</strong></label>
                <div class="checkbox">
                  <label><input type="checkbox" name="cara_mendapatkan[]" value="Mengambil Langsung"> Mengambil Langsung</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" name="cara_mendapatkan[]" value="E-mail"> E-mail</label>
                </div>
              </div>
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