<!-- end header -->
<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="title-holder">
            <div class="title-holder-cell text-left">
              <h1 class="page-title">Formulir Indeks Kepuasan Masyarakat</h1>
              <ol class="breadcrumb">
                <li><a href="<?php echo site_url() ?>">Home</a></li>
                <li class="active">Formulir Indeks Kepuasan Masyarakat </li>
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 adress_cont ">
              <h3>KUISIONER INDEKS KEPUASAN MASYARAKAT </h3>
              <p style="text-align: justify;">Bapak/Ibu Yang Terhormat,Kami mohon Anda berkenan mengisi kuesioner berikut ini sebagai upaya kami terus-menerus memperbaiki dan memberikan pelayanan yang terbaik kepada masyarakat. Partisipasi Anda akan sangat berguna untuk menyusun indeks kepuasan masyarakat atas layanan Dinas PUSDATARU Provinsi Jawa Tengah.Atas perhatian dan partisipasinya, disampaikan terima kasih. </p>

            </div>
          </div>
        </div>
        <hr size="12px" width="100%" align="center" style="margin-bottom: 40px">
        <div class="row">
          <div class="full">
            <?php echo form_open_multipart('Front/add_form_kepuasan') ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 adress_cont margin_bottom_30">


              <div class="position-relative form-group">
                <label for="nama_alternatif" class=""><strong>E-mail Anda</strong></label>
                <input name="email" id="email" type="email" autocomplete='off' class="form-control" required>
                <small>Alamat e-mail harus aktif!</small>
              </div>
              <div class="position-relative form-group">
                <label for="nama_alternatif" class=""><strong>Nama Anda</strong></label>
                <input name="nama" id="nama" type="text" autocomplete='off' class="form-control" required>
                <small>Alamat e-mail harus aktif!</small>
              </div>
              <div class="position-relative form-group">
                <label for="nama_alternatif" class=""><strong>Alamat Anda</strong></label>
                <textarea name="alamat" id="alamat" type="text" autocomplete='off' class="form-control" required></textarea>
                <small>Alamat lengkap anda</small>
              </div>
              <div class="position-relative form-group">
                <label for="nama_alternatif" class=""><strong>Nomor Telp/HP Anda</strong></label>
                <input name="no_telpon" id="no_telpon" type="text" autocomplete='off' class="form-control">
              </div>

              <div class="position-relative form-group">
                <label for="nama_alternatif" class=""><strong>Pelayanan Yang Kami Berikan</strong></label>
                <div class="radio">
                  <label><input type="radio" name="nilai_pelayanan" id="nilai_pelayanan" value="Sangat Baik"> Sangat Baik</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="nilai_pelayanan" id="nilai_pelayanan" value="Baik"> Baik</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="nilai_pelayanan" id="nilai_pelayanan" value="Cukup Baik"> Cukup Baik</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="nilai_pelayanan" id="nilai_pelayanan" value="Tidak Baik"> Tidak Baik</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="nilai_pelayanan" id="nilai_pelayanan" value="Sangat Tidak Baik"> Sangat Tidak Baik</label>
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