<!DOCTYPE html>
<html lang="en">

<head>
  <!-- basic -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <!-- site metas -->
  <title><?php echo @$tittle_head ?>PPID DPRD Kabupaten Blitar</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- site icons -->
  <link rel="icon" href="<?php echo base_url('assets/front') ?>/images/fevicon/fevicon.png" type="image/gif" />
  <!-- bootstrap css -->
  <link rel="stylesheet" href="<?php echo base_url('assets/front') ?>/css/bootstrap.min.css" />
  <!-- Site css -->
  <link rel="stylesheet" href="<?php echo base_url('assets/front') ?>/css/style.css" />
  <!-- iHover -->
  <link rel="stylesheet" href="<?php echo base_url('assets/front') ?>/css/ihover.css" />
  <!-- responsive css -->
  <link rel="stylesheet" href="<?php echo base_url('assets/front') ?>/css/responsive.css" />
  <!-- colors css -->
  <link rel="stylesheet" href="<?php echo base_url('assets/front') ?>/css/colors1.css" />
  <!-- custom css -->
  <link rel="stylesheet" href="<?php echo base_url('assets/front') ?>/css/custom.css" />
  <!-- wow Animation css -->
  <link rel="stylesheet" href="<?php echo base_url('assets/front') ?>/css/animate.css" />
  <!-- zoom effect -->
  <link rel='stylesheet' href='<?php echo base_url('assets/front') ?>/css/hizoom.css'>
  <!-- PDF wiewer -->
  <link rel='stylesheet' href='<?php echo base_url('assets/front') ?>/css/pdfviewer.css'>
  <!-- datatables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/front') ?>/datatables/datatables.min.css" />
  <!-- revolution slider css -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front') ?>/revolution/css/settings.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front') ?>/revolution/css/layers.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front') ?>/revolution/css/navigation.css" />
  <!--[if lt IE 9]>
      <script src="<?php echo base_url('assets/front') ?>/https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="<?php echo base_url('assets/front') ?>/https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body id="default_theme" class="it_service">
  <!-- loader -->
  <div class="bg_load"> <img class="loader_animation" src="<?php echo base_url('assets/front') ?>/images/loaders/loader_1.png" alt="#" /> </div>
  <!-- end loader -->
  <!-- header -->
  <header id="default_header" class="header_style_1">
    <!-- header top -->
    <div class="header_top">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="full">
              <div class="topbar-left">
                <ul class="list-inline">
                  <?php foreach ($alamat as $alm) {
                    $alamat = $alm['alamat']; ?>
                    <li> <span class="topbar-label"><i class="fa  fa-home"></i></span> <span class="topbar-hightlight"><?php echo $alamat ?></span> </li>
                  <?php } ?>
                  <?php foreach ($email as $eml) {
                    $email = $eml['email']; ?>
                    <li> <span class="topbar-label"><i class="fa fa-envelope-o"></i></span> <span class="topbar-hightlight"><a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></span> </li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-4 right_section_header_top">
            <div class="float-left">
              <div class="social_icon">
                <ul class="list-inline">
                  <li><a class="fa fa-facebook" href="<?php echo $facebook['link_sosial_media']; ?>" title="Facebook" target="_blank"></a></li>
                  <li><a class="fa fa-twitter" href="<?php echo $twitter['link_sosial_media']; ?>" title="Twitter" target="_blank"></a></li>
                  <li><a class="fa fa-instagram" href="<?php echo $twitter['link_sosial_media']; ?>" title="Instagram" target="_blank"></a></li>
                  <!-- <li><a class="fa fa-google-plus" href="<?php echo base_url('assets/front') ?>/https://plus.google.com/" title="Google+" target="_blank"></a></li> -->
                </ul>
              </div>
            </div>
            <div class="float-right">
              <div class="make_appo"> <a class="btn white_btn" href="<?php echo site_url('Front/formulir_permohonan_online');  ?>">PERMOHONAN INFORMASI</a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end header top -->
    <!-- header bottom -->
    <div class="header_bottom">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
            <!-- logo start -->
            <div class="logo"> <a href="<?php echo base_url('Front');  ?>"><img src="<?php echo base_url('assets/template/img') ?>/logo/dprd.png" alt="logo" /></a> </div>
            <!-- logo end -->
          </div>
          <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
            <!-- menu start -->
            <div class="menu_side">
              <div id="navbar_menu">
                <ul class="first-ul">
                  <li> <a class="<?php echo @$home_active ?>" href="<?php echo site_url('Front');  ?>">Home</a>
                    <!--ul>
                    <li><a href="<?php echo site_url('assets/front') ?>/it_home.html">It Home Page2222</a></li>
                    <li><a href="<?php echo site_url('assets/front') ?>/it_home_dark.html">It Dark Home Page</a></li>
                  </ul-->
                  </li>
                  <li><a class="<?php echo @$profile_active ?>" href="#">Profil</a>
                    <ul>
                      <li> <a href="<?php echo site_url('Front/profil_dprd');  ?>"">Profil DPRD</a></li>
                      <li><a href=" <?php echo site_url('Front/anggota_dprd');  ?>">Daftar Anggota DPRD</a></li>
                      <li><a href="#">Sekretariat DPRD</a>
                        <ul>
                          <li> <a href="<?php echo site_url('Front/tugas_dan_fungsi') ?>">Tugas dan Fungsi</a></li>
                          <li> <a href="<?php echo site_url('Front/struktur_organisasi') ?>">Struktur Organisasi</a></li>
                          <li> <a href="<?php echo site_url('Front/profil_pejabat_struktural') ?>">Profil Pejabat Struktural</a></li>
                        </ul>
                      </li>
                      <li><a href="#">Alat Kelengkapan DPRD</a>
                        <ul>
                          <li> <a href="<?php echo site_url('Front/pimpinan_dprd') ?>">Pimpinan DPRD</a></li>
                          <li> <a href="<?php echo site_url('Front/komisi_komisi') ?>">Komisi-Komisi</a></li>
                          <li> <a href="<?php echo site_url('Front/badan_anggaran');  ?>">Badan Anggaran</a></li>
                          <li> <a href="<?php echo site_url('Front/badan_musyawarah');  ?>">Badan Musyawarah</a></li>
                          <li> <a href="<?php echo site_url('Front/badan_pembentuk_perda') ?>">Badan Pembentukan Perda</a></li>
                          <li> <a href="<?php echo site_url('Front/badan_kehormatan') ?>">Badan Kehormatan</a></li>
                        </ul>
                      </li>
                      <li><a href="<?php echo site_url('Front/tata_tertib_dprd') ?>">Tata Tertib DPRD</a>
                      <li><a href="<?php echo site_url('Front/agenda_kerja') ?>">Agenda Kerja DPRD</a>
                    </ul>
                  </li>
                  <li> <a class="<?php echo @$ppid_active ?>" href="#">PPID</a>
                    <ul>
                      <li><a href="<?php echo site_url('Front/pedoman_ppid_pembantu') ?>">Pedoman Umum PPID Pembantu</a></li>
                      <li><a href="#">Regulasi Keterbukaan Informasi Publik</a>
                        <ul>
                          <li> <a href="<?php echo site_url('Front/peraturan_keterbukaan_informasi') ?>">Peraturan Tentang Keterbukaan Informasi Publik</a></li>
                          <li> <a href="<?php echo site_url('Front/peraturan_daerah') . "?bentuk=peraturan-dprd-122"; ?>">Peraturan DPRD</a></li>
                          <li> <a href="<?php echo site_url('Front/peraturan_daerah') ?>">Peraturan Daerah</a></li>
                          <li> <a href="<?php echo site_url('Front/peraturan_daerah') . "?bentuk=peraturan-bupati-13"; ?>" method="GET"">Peraturan Bupati</a></li>
                        </ul>
                      </li>
                      <li><a href=" <?php echo site_url('Front/profil_badan_publik') ?>">Profil Badan Publik</a></li>
                          <li><a href="<?php echo site_url('Front/profil_ppid_pembantu') ?>">Profil PPID Pembantu</a></li>
                          <!-- <li><a href="<?php echo site_url('Front/download_sk_ppid') ?>">SK PPID Pembantu</a></li> -->
                          <li><a href="javascript:void(0)" onclick="downloadFile()">SK PPID Pembantu</a></li>
                          <li><a href="<?php echo site_url('Front/struktur_ppid') ?>">Struktur PPID Pembantu</a></li>
                          <li><a href="<?php echo site_url('Front/rencana_ppid') ?>">Rencana Kerja & Kegiatan PPID</a></li>
                        </ul>
                      </li>
                      <li> <a class="<?php echo @$informasi_active ?>" href=" <?php echo site_url('assets/front') ?>/#">INFORMASI PUBLIK</a>
                        <ul>
                          <li><a href="<?php echo site_url('Front/daftar_informasi_publik');  ?>">Daftar Informasi Publik (DIP)</a></li>
                          <li><a href="<?php echo site_url('Front/sop_layanan_ppid');  ?>">SOP Layanan PPID</a></li>
                          <li><a href="#">Formulir Layanan</a>
                            <ul>
                              <li><a href="<?php echo site_url('Front/formulirOffline');  ?>">Formulir Permohonan Informasi Off-line</a></li>
                              <li><a href="<?php echo site_url('Front/formulir_permohonan_online');  ?>">Formulir Permohonan Informasi On-line</a></li>
                              <li><a href="<?php echo site_url('Front/formulir_pengajuan_keberatan');  ?>">Formulir Pengajuan Keberatan</a></li>
                              <li><a href="<?php echo site_url('Front/formulir_survey_pelayanan');  ?>">Formulir Survey Pelayanan</a></li>
                              <li><a href="<?php echo site_url('Front/formulir_kepuasan_masyarakat');  ?>">Formulir Indeks Kepuasan Masyarakat</a></li>
                            </ul>
                          </li>
                          <li><a href="#">Ragam Informasi</a>
                            <ul>
                              <li><a href="<?php echo site_url('Front/informasi_berkala');  ?>">Informasi Berkala</a></li>
                              <li><a href="<?php echo site_url('Front/informasi_serta_merta');  ?>">Informasi Serta Merta</a></li>
                              <li><a href="<?php echo site_url('Front/informasi_setiap_saat');  ?>">Informasi Setiap Saat</a></li>
                              <li><a href="<?php echo site_url('Front/informasi_dikecualikan');  ?>">Informasi Dikecualikan</a></li>
                            </ul>
                          </li>
                        </ul>
                      </li>
                      <li> <a class="<?php echo @$laporan_active ?>"" href=" #">RINGKASAN LAPORAN</a>
                        <ul>
                          <li><a href="<?php echo site_url('Front/laporan_keuangan');  ?>">Ringkasan Laporan Keuangan</a></li>
                          <li><a href="<?php echo site_url('assets/front') ?>/it_shop_detail.html">Sakip</a></li>
                          <li><a href="<?php echo site_url('assets/front') ?>/it_cart.html">LKjIP</a></li>
                          <li><a href="<?php echo site_url('Front/laporan_tahunan_dprd');  ?>">Laporan Tahunan DPRD</a></li>
                        </ul>
                      </li>
                      <li> <a class="<?php echo @$kontak_active ?>" href=" <?php echo site_url('Front/kontak');  ?>">KONTAK</a></li>
                    </ul>
              </div>
              <div class="search_icon">
                <ul>
                  <li><a href="<?php echo base_url('assets/front') ?>/#" data-toggle="modal" data-target="#search_bar"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                </ul>
              </div>
            </div>
            <!-- menu end -->
          </div>
        </div>
      </div>
    </div>
    <!-- header bottom end -->
  </header>