<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SKPI | Surat Keterangan Pendamping Ijazah</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/css') ?>/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/css') ?>/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/css') ?>/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/template/css') ?>/owl.theme.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/template/css') ?>/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/css') ?>/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/css') ?>/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/css') ?>/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/css') ?>/main.css">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/css') ?>/educate-custon-icon.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/css') ?>/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/css') ?>/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/css') ?>/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/template/css') ?>/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <!-- <link rel="stylesheet" href="<?php echo base_url('assets/template/css') ?>/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/template/css') ?>/calendar/fullcalendar.print.min.css"> -->
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/style.css') ?>">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/css') ?>/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="<?php echo base_url('assets/template/js') ?>/vendor/modernizr-2.8.3.min.js"></script>
</head>
<style>
    .gc-container {
        padding: 12px 25px;
    }

    .table-section {
        /* padding:12px 10px; */
    }

    .mCustomScrollbar {
        margin-top: 27px !important;
    }
</style>

<body style="background-color:#F6F8FA">
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="javascript:void(0)"><img class="main-logo" src="<?php echo base_url('assets/template/img') ?>/logo/logo.png" style="width:160px; margin-left:-40px !important;" alt="" /></a>
                <strong><a href="javascript:void(0)"><img src="<?php echo base_url('assets/template/img') ?>/logo/logosn.png" alt="" style="margin-top:-8px" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li class="<?php echo @$berandaActive ?>">
                            <a title="Landing Page" href="<?php echo site_url('mahasiswa') ?>" aria-expanded="false"><span class="educate-icon educate-home icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Home</span></a>
                        </li>
                        <li class="<?php echo @$pengumumanActive ?>">
                            <a class="has-arrow" href="javascript:void(0)">
                                <span class="educate-icon  educate-bell icon-wrap"></span>
                                <span class="mini-click-non">Pengumuman</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a href="<?php echo site_url('mahasiswa/taskMhs') ?>"><span class="mini-sub-pro">Task Aktif</span></a></li>
                                <li><a href="<?php echo site_url('mahasiswa/level') ?>"><span class="mini-sub-pro">Level</span></a></li>
                            </ul>
                        </li>
                        <li class="<?php echo @$transaksiActive ?>">
                            <a class="has-arrow" href="javascript:void(0)">
                                <span class="educate-icon  educate-library icon-wrap"></span>
                                <span class="mini-click-non">Transaksi</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a href="<?php echo site_url('mahasiswa/tr_skpi_mhs') ?>"><span class="mini-sub-pro">Input SKPI</span></a></li>
                                <li><a href="<?php echo site_url('mahasiswa/skpi_pengembalian_mhs') ?>"><span class="mini-sub-pro">Pengembalian</span></a></li>
                            </ul>
                        </li>
                        <li class="<?php echo @$laporanActive ?>">
                            <a class="has-arrow" href="javascript:void(0)">
                                <span class="educate-icon  educate-data-table icon-wrap"></span>
                                <span class="mini-click-non">Laporan</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a href="<?php echo site_url('mahasiswa/prestasi_mhs') ?>"><span class="mini-sub-pro">Prestasi/Penghargaan</span></a></li>
                                <li><a href="<?php echo site_url('mahasiswa/organisasi_mhs') ?>"><span class="mini-sub-pro">Organisasi</span></a></li>
                                <li><a href="<?php echo site_url('mahasiswa/sertifikat_mhs') ?>"><span class="mini-sub-pro">Sertifikat Keahlian</span></a></li>
                                <li><a href="<?php echo site_url('mahasiswa/magang_mhs') ?>"><span class="mini-sub-pro">Kerja Praktek Magang</span></a></li>
                            </ul>
                        </li>
                        <li class="<?php echo @$pengaturanActive ?>">
                            <a class="has-arrow" href="javascript:void(0)">
                                <span class="educate-icon  educate-settings icon-wrap"></span>
                                <span class="mini-click-non">Pengaturan</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a href="<?php echo site_url('mahasiswa/user') ?>"><span class="mini-sub-pro">User</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="javascript:void(0)">
                            <img class="main-logo" src="<?php echo base_url('assets/template/img') ?>/logo/logo.png" alt="" style="width:150px !important;" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                <i class="educate-icon educate-nav"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <!-- tempat untuk appname -->
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li id="navbar-nav-satu" class="nav-item dropdown">
                                                <li id="navbar-nav-dua" class="nav-item dropdown">
                                                </li>
                                                <!-- notif satu -->
                                                <!-- notif dua -->

                                                <!-- batas notif-->
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                        <img src="<?php echo base_url('assets/uploads/files') ?>/default.png" alt="" />
                                                        <span class="admin-name"><?php echo $this->session->userdata('skpi_nama') ?></span>
                                                        <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                    </a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <!-- <li><a href="#"><span class="edu-icon edu-user-rounded author-log-ic"></span>My Profile</a>
                                                        </li> -->
                                                        <li><a href="<?php echo site_url('login/keluar') ?>"><span class="edu-icon edu-locked author-log-ic"></span>Log Out</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item nav-setting-open"><a href="#" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-menu"></i></a>

                                                    <div role="menu" class="admintab-wrap menu-setting-wrap menu-setting-wrap-bg dropdown-menu animated zoomIn">
                                                        <ul class="nav nav-tabs custon-set-tab">
                                                            <li class="active"><a data-toggle="tab" href="#Notes">Notes</a>
                                                            </li>
                                                            <li><a data-toggle="tab" href="#Projects">Projects</a>
                                                            </li>
                                                            <li><a data-toggle="tab" href="#Settings">Settings</a>
                                                            </li>
                                                        </ul>

                                                        <div class="tab-content custom-bdr-nt">
                                                            <div id="Notes" class="tab-pane fade in active">
                                                                <div class="notes-area-wrap">
                                                                    <div class="note-heading-indicate">
                                                                        <h2><i class="fa fa-comments-o"></i> Latest Notes</h2>
                                                                        <p>You have 10 new message.</p>
                                                                    </div>
                                                                    <div class="notes-list-area notes-menu-scrollbar">
                                                                        <ul class="notes-menu-list">
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="<?php echo base_url('assets/template/img') ?>/contact/4.jpg" alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45 pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="<?php echo base_url('assets/template/img') ?>/contact/1.jpg" alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45 pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="<?php echo base_url('assets/template/img') ?>/contact/2.jpg" alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45 pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="<?php echo base_url('assets/template/img') ?>/contact/3.jpg" alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45 pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="<?php echo base_url('assets/template/img') ?>/contact/4.jpg" alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45 pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="<?php echo base_url('assets/template/img') ?>/contact/1.jpg" alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45 pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="<?php echo base_url('assets/template/img') ?>/contact/2.jpg" alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45 pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="<?php echo base_url('assets/template/img') ?>/contact/1.jpg" alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45 pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="<?php echo base_url('assets/template/img') ?>/contact/2.jpg" alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45 pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="<?php echo base_url('assets/template/img') ?>/contact/3.jpg" alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45 pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="Projects" class="tab-pane fade">
                                                                <div class="projects-settings-wrap">
                                                                    <div class="note-heading-indicate">
                                                                        <h2><i class="fa fa-cube"></i> Latest projects</h2>
                                                                        <p> You have 20 projects. 5 not completed.</p>
                                                                    </div>
                                                                    <div class="project-st-list-area project-st-menu-scrollbar">
                                                                        <ul class="projects-st-menu-list">
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div class="projects-st-heading">
                                                                                            <h2>Web Development</h2>
                                                                                            <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                            <span class="project-st-time">1 hours ago</span>
                                                                                        </div>
                                                                                        <div class="projects-st-content">
                                                                                            <p>Completion with: 28%</p>
                                                                                            <div class="progress progress-mini">
                                                                                                <div style="width: 28%;" class="progress-bar progress-bar-danger hd-tp-1"></div>
                                                                                            </div>
                                                                                            <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div class="projects-st-heading">
                                                                                            <h2>Software Development</h2>
                                                                                            <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                            <span class="project-st-time">2 hours ago</span>
                                                                                        </div>
                                                                                        <div class="projects-st-content project-rating-cl">
                                                                                            <p>Completion with: 68%</p>
                                                                                            <div class="progress progress-mini">
                                                                                                <div style="width: 68%;" class="progress-bar hd-tp-2"></div>
                                                                                            </div>
                                                                                            <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div class="projects-st-heading">
                                                                                            <h2>Graphic Design</h2>
                                                                                            <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                            <span class="project-st-time">3 hours ago</span>
                                                                                        </div>
                                                                                        <div class="projects-st-content">
                                                                                            <p>Completion with: 78%</p>
                                                                                            <div class="progress progress-mini">
                                                                                                <div style="width: 78%;" class="progress-bar hd-tp-3"></div>
                                                                                            </div>
                                                                                            <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div class="projects-st-heading">
                                                                                            <h2>Web Design</h2>
                                                                                            <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                            <span class="project-st-time">4 hours ago</span>
                                                                                        </div>
                                                                                        <div class="projects-st-content project-rating-cl2">
                                                                                            <p>Completion with: 38%</p>
                                                                                            <div class="progress progress-mini">
                                                                                                <div style="width: 38%;" class="progress-bar progress-bar-danger hd-tp-4"></div>
                                                                                            </div>
                                                                                            <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div class="projects-st-heading">
                                                                                            <h2>Business Card</h2>
                                                                                            <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                            <span class="project-st-time">5 hours ago</span>
                                                                                        </div>
                                                                                        <div class="projects-st-content">
                                                                                            <p>Completion with: 28%</p>
                                                                                            <div class="progress progress-mini">
                                                                                                <div style="width: 28%;" class="progress-bar progress-bar-danger hd-tp-5"></div>
                                                                                            </div>
                                                                                            <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div class="projects-st-heading">
                                                                                            <h2>Ecommerce Business</h2>
                                                                                            <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                            <span class="project-st-time">6 hours ago</span>
                                                                                        </div>
                                                                                        <div class="projects-st-content project-rating-cl">
                                                                                            <p>Completion with: 68%</p>
                                                                                            <div class="progress progress-mini">
                                                                                                <div style="width: 68%;" class="progress-bar hd-tp-6"></div>
                                                                                            </div>
                                                                                            <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div class="projects-st-heading">
                                                                                            <h2>Woocommerce Plugin</h2>
                                                                                            <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                            <span class="project-st-time">7 hours ago</span>
                                                                                        </div>
                                                                                        <div class="projects-st-content">
                                                                                            <p>Completion with: 78%</p>
                                                                                            <div class="progress progress-mini">
                                                                                                <div style="width: 78%;" class="progress-bar"></div>
                                                                                            </div>
                                                                                            <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div class="projects-st-heading">
                                                                                            <h2>Wordpress Theme</h2>
                                                                                            <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                            <span class="project-st-time">9 hours ago</span>
                                                                                        </div>
                                                                                        <div class="projects-st-content project-rating-cl2">
                                                                                            <p>Completion with: 38%</p>
                                                                                            <div class="progress progress-mini">
                                                                                                <div style="width: 38%;" class="progress-bar progress-bar-danger"></div>
                                                                                            </div>
                                                                                            <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="Settings" class="tab-pane fade">
                                                                <div class="setting-panel-area">
                                                                    <div class="note-heading-indicate">
                                                                        <h2><i class="fa fa-gears"></i> Settings Panel</h2>
                                                                        <p> You have 20 Settings. 5 not completed.</p>
                                                                    </div>
                                                                    <ul class="setting-panel-list">
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Show notifications</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example">
                                                                                            <label class="onoffswitch-label" for="example">
                                                                                                <span class="onoffswitch-inner"></span>
                                                                                                <span class="onoffswitch-switch"></span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Disable Chat</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example3">
                                                                                            <label class="onoffswitch-label" for="example3">
                                                                                                <span class="onoffswitch-inner"></span>
                                                                                                <span class="onoffswitch-switch"></span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Enable history</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example4">
                                                                                            <label class="onoffswitch-label" for="example4">
                                                                                                <span class="onoffswitch-inner"></span>
                                                                                                <span class="onoffswitch-switch"></span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Show charts</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example7">
                                                                                            <label class="onoffswitch-label" for="example7">
                                                                                                <span class="onoffswitch-inner"></span>
                                                                                                <span class="onoffswitch-switch"></span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Update everyday</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox" name="collapsemenu" checked="" class="onoffswitch-checkbox" id="example2">
                                                                                            <label class="onoffswitch-label" for="example2">
                                                                                                <span class="onoffswitch-inner"></span>
                                                                                                <span class="onoffswitch-switch"></span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Global search</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox" name="collapsemenu" checked="" class="onoffswitch-checkbox" id="example6">
                                                                                            <label class="onoffswitch-label" for="example6">
                                                                                                <span class="onoffswitch-inner"></span>
                                                                                                <span class="onoffswitch-switch"></span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Offline users</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox" name="collapsemenu" checked="" class="onoffswitch-checkbox" id="example5">
                                                                                            <label class="onoffswitch-label" for="example5">
                                                                                                <span class="onoffswitch-inner"></span>
                                                                                                <span class="onoffswitch-switch"></span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li class="<?php echo @$berandaActive ?>">
                                            <a title="Landing Page" href="<?php echo site_url('mahasiswa') ?>" aria-expanded="false"><span class="educate-icon educate-home icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Home</span></a>
                                        </li>
                                        <li class="<?php echo @$pengumumanActive ?>">
                                            <a class="has-arrow" href="javascript:void(0)">
                                                <span class="educate-icon  educate-bell icon-wrap"></span>
                                                <span class="mini-click-non">Pengumuman</span>
                                            </a>
                                            <ul class="submenu-angle" aria-expanded="true">
                                                <li><a href="<?php echo site_url('mahasiswa/taskMhs') ?>"><span class="mini-sub-pro">Task Aktif</span></a></li>
                                                <li><a href="<?php echo site_url('mahasiswa/level') ?>"><span class="mini-sub-pro">Level</span></a></li>
                                            </ul>
                                        </li>
                                        <li class="<?php echo @$transaksiActive ?>">
                                            <a class="has-arrow" href="javascript:void(0)">
                                                <span class="educate-icon  educate-library icon-wrap"></span>
                                                <span class="mini-click-non">Transaksi</span>
                                            </a>
                                            <ul class="submenu-angle" aria-expanded="true">
                                                <li><a href="<?php echo site_url('mahasiswa/tr_skpi_mhs') ?>"><span class="mini-sub-pro">Input SKPI</span></a></li>
                                                <li><a href="<?php echo site_url('mahasiswa/skpi_pengembalian_mhs') ?>"><span class="mini-sub-pro">Pengembalian</span></a></li>
                                            </ul>
                                        </li>
                                        <li class="<?php echo @$laporanActive ?>">
                                            <a class="has-arrow" href="javascript:void(0)">
                                                <span class="educate-icon  educate-data-table icon-wrap"></span>
                                                <span class="mini-click-non">Laporan</span>
                                            </a>
                                            <ul class="submenu-angle" aria-expanded="true">
                                                <li><a href="<?php echo site_url('mahasiswa/prestasi_mhs') ?>"><span class="mini-sub-pro">Prestasi/Penghargaan</span></a></li>
                                                <li><a href="<?php echo site_url('mahasiswa/organisasi_mhs') ?>"><span class="mini-sub-pro">Organisasi</span></a></li>
                                                <li><a href="<?php echo site_url('mahasiswa/sertifikat_mhs') ?>"><span class="mini-sub-pro">Sertifikat Keahlian</span></a></li>
                                                <li><a href="<?php echo site_url('mahasiswa/magang_mhs') ?>"><span class="mini-sub-pro">Kerja Praktek Magang</span></a></li>
                                            </ul>
                                        </li>
                                        <li class="<?php echo @$pengaturanActive ?>">
                                            <a class="has-arrow" href="javascript:void(0)">
                                                <span class="educate-icon  educate-settings icon-wrap"></span>
                                                <span class="mini-click-non">Pengaturan</span>
                                            </a>
                                            <ul class="submenu-angle" aria-expanded="true">
                                                <li><a href="<?php echo site_url('mahasiswa/user') ?>"><span class="mini-sub-pro">User</span></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if (!empty($css_files)) {
            foreach ($css_files as $file) : ?>
                <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach;
        } ?>
        <?php
        if (!empty($js_files)) {
            foreach ($js_files as $file) : ?>
                <script src="<?php echo $file; ?>"></script>
            <?php endforeach;
        } else {
            ?>
            <script src="<?php echo base_url('assets/template/js') ?>/vendor/jquery-1.12.4.min.js"></script>
        <?php
        } ?>
        <div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <?php echo @$output; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2020. All rights reserved. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .gc-container {
            width: 100%;
            background: white;
        }

        .crud-form {
            margin-top: 16px;
        }
    </style>
    <!-- jquery
    ============================================ -->
    <!-- bootstrap JS
    ============================================ -->
    <script src="<?php echo base_url('assets/template/js') ?>/bootstrap.min.js"></script>
    <!-- wow JS
    ============================================ -->
    <script src="<?php echo base_url('assets/template/js') ?>/wow.min.js"></script>
    <!-- price-slider JS
    ============================================ -->
    <script src="<?php echo base_url('assets/template/js') ?>/jquery-price-slider.js"></script>
    <!-- meanmenu JS
    ============================================ -->
    <script src="<?php echo base_url('assets/template/js') ?>/jquery.meanmenu.js"></script>
    <!-- emodal  -->
    <script src="<?php echo base_url() ?>/assets/grocery_crud/js/jquery_plugins/eModal.min.js"></script>
    <!-- owl.carousel JS
    ============================================ -->
    <script src="<?php echo base_url('assets/template/js') ?>/owl.carousel.min.js"></script>
    <!-- sticky JS
    ============================================ -->
    <script src="<?php echo base_url('assets/template/js') ?>/jquery.sticky.js"></script>
    <!-- scrollUp JS
    ============================================ -->
    <script src="<?php echo base_url('assets/template/js') ?>/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
    ============================================ -->
    <script src="<?php echo base_url('assets/template/js') ?>/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?php echo base_url('assets/template/js') ?>/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
    ============================================ -->
    <script src="<?php echo base_url('assets/template/js') ?>/metisMenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url('assets/template/js') ?>/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
    ============================================ -->
    <script src="<?php echo base_url('assets/template/js') ?>/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url('assets/template/js') ?>/sparkline/jquery.charts-sparkline.js"></script>
    <!-- calendar JS
    ============================================ -->
    <script src="<?php echo base_url('assets/template/js') ?>/calendar/moment.min.js"></script>
    <script src="<?php echo base_url('assets/template/js') ?>/calendar/fullcalendar.min.js"></script>
    <script src="<?php echo base_url('assets/template/js') ?>/calendar/fullcalendar-active.js"></script>
    <!-- plugins JS
    ============================================ -->
    <script src="<?php echo base_url('assets/template/js') ?>/plugins.js"></script>
    <!-- main JS
    ============================================ -->
    <script src="<?php echo base_url('assets/template/js') ?>/main.js"></script>
    <!-- tawk chat JS
    ============================================ -->
    <!-- <script src="<?php echo base_url('assets/template/js') ?>/tawk-chat.js"></script> -->

    <?php echo @$js_tambahan; ?>
    <?php echo ajax_return_html_one_id('getNotifPengembalian', 'mahasiswa/getNotifPengembalian', 'navbar-nav-dua', null); ?>
    <script>
        function emodal(url, title) {
            eModal.iframe(url, title);
        }

        function getNotif() {
            getNotifPengembalian();
        }
        $(function() {
            getNotifPengembalian();
        });
    </script>
    <?php echo $this->load->view('button/call_function_hide_modal', array('namaFungsi' => 'getNotif'), true); ?>
</body>

</html>