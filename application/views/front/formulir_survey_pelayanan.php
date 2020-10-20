<!-- end header -->
<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="title-holder">
            <div class="title-holder-cell text-left">
              <h1 class="page-title">Kuisioner Kepuasan Layanan Informasi Publik</h1>
              <ol class="breadcrumb">
                <li><a href="<?php echo site_url() ?>">Home</a></li>
                <li class="active">Kuisioner Kepuasan Layanan Informasi Publik </li>
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
            <?php if ($this->session->flashdata('pesan_sukses')) { ?>
              <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('pesan_sukses') ?>
              </div>

            <?php } ?>
            <?php if ($this->session->flashdata('pesan_gagal')) { ?>
              <div class="alert alert-danger" role="alert">
                <?php echo $this->session->flashdata('pesan_gagal') ?>
              </div>

            <?php } ?>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 adress_cont margin_bottom_30">
              <img width="90px" src="<?php echo base_url('assets/template/img') ?>/logo/logodprdblitar.png" alt="logo" />

            </div>
            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 adress_cont ">
              <h3>KUISIONER KEPUASAN LAYANAN INFORMASI PUBLIK</h3>
              <p>Dinas Pekerjaan Umum Sumber Daya Air dan Penataan Ruang Provinsi Jawa Timur </p>

            </div>
          </div>
        </div>
        <hr size="12px" width="100%" align="center" style="margin-bottom: 40px">
        <div class="row">
          <div class="full">
            <?php echo form_open_multipart('Front/add_form_survey') ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 adress_cont margin_bottom_30">


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
                <label for="nama_alternatif" class=""><strong>E-mail</strong></label>
                <input name="email" id="email" type="email" autocomplete='off' class="form-control" required>
              </div>
              <div class="position-relative form-group">
                <label for="nama_alternatif" class=""><strong>Nomor Telp/WA</strong></label>
                <input name="no_telepon" id="no_telepon" type="text" autocomplete='off' class="form-control">
              </div>
              <div class="position-relative form-group">
                <label for="nama_alternatif" class=""><strong>Pekerjaan</strong></label>
                <input name="pekerjaan" id="pekerjaan" type="text" autocomplete='off' class="form-control" required></input>
              </div>
              <div class="position-relative form-group">
                <label for="nama_alternatif" class=""><strong>Jenis pelayanan</strong></label>
                <input name="jenis_pelayanan" id="jenis_pelayanan" type="text" autocomplete='off' class="form-control" required></input>
              </div>
              <div class="position-relative form-group">
                <label for="nama_alternatif" class=""><strong>Saran untuk peningkatan pelayanan informasi publik Dinas PUSDATARU Provinsi Jawa Timur</strong></label>
                <textarea name="saran" id="saran" type="text" autocomplete='off' class="form-control" required></textarea>
              </div>
              <div class="position-relative form-group">
                <label for="nama_alternatif" class=""><strong>Pilih salah satu parameter peniaian dari keseluruhan kuesioner dibawah ini:</strong></label>
                <div class="table table-bordered table-striped table-responsive">
                  <table style="width:100%">
                    <thead>
                      <tr>
                        <td rowspan="2" style="text-align: center;vertical-align:middle">Pertanyaan</td>
                        <td colspan="5" style="text-align: center;vertical-align:middle">Penilaian</td>
                      </tr>
                      <tr>
                        <td style="text-align: center;vertical-align:middle">Sangat bagus</td>
                        <td style="text-align: center;vertical-align:middle">Bagus</td>
                        <td style="text-align: center;vertical-align:middle">Biasa</td>
                        <td style="text-align: center;vertical-align:middle">Kurang</td>
                        <td style="text-align: center;vertical-align:middle">Kurang Sekali</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data_pertanyaan as $a) {
                        $pertanyaan = $a['pertanyaan'];
                        $id = $a['id'];
                      ?>
                        <tr>
                          <td><?php echo $pertanyaan ?></td>
                          <td style="text-align: center;vertical-align:middle"><input type="radio" name="soal[<?php echo $id ?>]" id="penilaian" value="5"></td>
                          <td style="text-align: center;vertical-align:middle"><input type="radio" name="soal[<?php echo $id ?>]" id="penilaian" value="4"></td>
                          <td style="text-align: center;vertical-align:middle"><input type="radio" name="soal[<?php echo $id ?>]" id="penilaian" value="3"></td>
                          <td style="text-align: center;vertical-align:middle"><input type="radio" name="soal[<?php echo $id ?>]" id="penilaian" value="2"></td>
                          <td style="text-align: center;vertical-align:middle"><input type="radio" name="soal[<?php echo $id ?>]" id="penilaian" value="1"></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>

              <!-- <div class="position-relative form-group">
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
				</div> -->

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