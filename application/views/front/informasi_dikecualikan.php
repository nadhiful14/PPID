<!-- end header -->
<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="title-holder">
                        <?php
                        foreach ($informasi_dikecualikan as $tampil) {
                            $tahun = $tampil['tahun'];
                        ?>
                            <div class="title-holder-cell text-left">
                                <h3 class="text-uppercase " style="color: white;">Informasi Yang Dikecualikan Tahun <?php echo $tahun ?></h3>
                                <p class="large" style="color: white; font-size:17px">Dinas PUSDATARU Provinsi Jawa Timur</p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end inner page banner -->

<div class="section mt-6 mb-6">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 pull-left">
                <div class="row mr-2 ml-2">
                    <div id="main_area" style="margin-top: 41px !important; width:100%">
                        <!-- Slider -->
                        <div class="row">
                            <div class="col-xs-12" id="slider">
                                <!-- Top part of the slider -->
                                <div class="row">
                                    <div class="col-sm-12" id="carousel-bounding-box">
                                        <div class="carousel slide" id="myCarousel">
                                            <!-- Carousel items -->
                                            <div class="carousel-inner">
                                                <?php foreach ($foto_informasi_dikecualikan as $key => $gambar) {
                                                    $id = $gambar['id'];
                                                    $tahun = $gambar['tahun'];
                                                    $foto = $gambar['foto'];
                                                ?>
                                                    <div class="<?php echo ($key == 0) ? 'active' : '' ?> carousel-item" data-slide-number="<?php echo $key ?>">

                                                        <img style="width: 100%;; height:400px;object-fit: cover" src="<?php echo base_url('assets/front/download/') . $foto ?>">
                                                    </div>
                                                <?php } ?>
                                            </div>

                                            <!-- Carousel nav -->
                                            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                                <span class="glyphicon glyphicon-chevron-left"></span>
                                            </a>
                                            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                                <span class="glyphicon glyphicon-chevron-right"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/Slider-->

                        <div class="row hidden-xs" id="slider-thumbs">
                            <!-- Bottom switcher of slider -->
                            <ul class="hide-bullets">
                                <?php foreach ($foto_informasi_dikecualikan as $key => $gambar) {
                                    $id = $gambar['id'];
                                    $tahun = $gambar['tahun'];
                                    $foto = $gambar['foto'];
                                ?>
                                    <li class="col-sm-2" style="float:left !important">
                                        <a class="thumbnail" id="carousel-selector-<?php echo $key ?>"><img style="width: 100%; height:45px;object-fit: cover" src="<?php echo base_url('assets/front/download/') . $foto ?>"></a>
                                    </li>
                                <?php } ?>

                            </ul>
                        </div>
                    </div>
                    <style>
                        .hide-bullets {
                            list-style: none;
                            margin-left: -40px;
                            margin-top: 20px;
                        }
                    </style>

                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">


                </div>
            </div>
            <?php
            foreach ($informasi_dikecualikan as $tampil) {
                $hari = $tampil['hari'];
                $tanggal = $tampil['tanggal'];
                $jam = $tampil['jam'];
                $tempat = $tampil['tempat'];
                $tahun = $tampil['tahun'];
                $informasi_dikecualikan = $tampil['informasi_dikecualikan'];
                $uji_konsekuensi = $tampil['uji_konsekuensi'];
                $naskah_pertimbangan = $tampil['naskah_pertimbangan'];
                $sk_informasi = $tampil['sk_informasi_dikecualikan'];
            ?>
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 pull-right">
                    <?php if ($informasi_dikecualikan >= 1) : ?>
                        <div class="mb-4">
                            <div class="full judul-info mb-3">
                                <h3 style="margin-bottom:10px !important" class="text-uppercase ">Informasi yang di Kecualikan Tahun <?php echo $tahun ?></h3>
                            </div>
                            <table style="line-height: 25px;">
                                <tr>
                                    <td width="30px"><i class="fa fa-download"></i></td>
                                    <td width="200px">Informasi yang di Kecualikan Tahun <?php echo $tahun ?></td>
                                    <td style="padding: 0px 10px;"> : </td>
                                    <td><a type="button" href="/Front/download/<?php echo $informasi_dikecualikan ?>" class=" a-kastem">Download</a></td>
                                </tr>
                            </table>
                        </div>
                    <?php endif ?>

                    <div class="mb-4">
                        <div class="full judul-info mb-3">
                            <h3 style="margin-bottom:10px !important" class="text-uppercase ">Uji Konsekuensi Tahun <?php echo $tahun ?></h3>
                        </div>
                        <table style="line-height: 25px;">
                            <tr>
                                <td width="30px"><i class="fa fa-calendar"></i></td>
                                <td width="200px">Tanggal</td>
                                <td style="padding: 0px 10px;"> : </td>
                                <td><?php echo $hari ?>, <?php echo $tanggal ?></td>
                            </tr>
                            <tr>
                                <td width="30px"><i class="fa fa-clock-o "></i></td>
                                <td width="200px">Jam</td>
                                <td style="padding: 0px 10px;"> : </td>
                                <td><?php echo $hari ?>, <?php echo $jam ?></td>
                            </tr>
                            <tr>
                                <td width="30px"><i class="fa fa-home"></i></td>
                                <td width="200px" class=".vcenter">Tempat</td>
                                <td style="padding: 0px 10px;"> : </td>
                                <td><?php echo $tempat ?></td>
                            </tr>
                            <?php if ($uji_konsekuensi >= 1) : ?>
                                <tr>
                                    <td width="30px"><i class="fa fa-download"></i></td>
                                    <td width="200px">Draft Uji Konsekuensi Tahun <?php echo $tahun ?></td>
                                    <td style="padding: 0px 10px;"> : </td>
                                    <td><a type="button" href="/Front/download/<?php echo $uji_konsekuensi ?>" class=" a-kastem">Download</a></td>
                                </tr>
                            <?php endif ?>
                            <?php if ($naskah_pertimbangan >= 1) : ?>
                                <tr>
                                    <td width="30px"><i class="fa fa-download"></i></td>
                                    <td width="200px">Dokumen Naskah Pertimbangan <?php echo $tahun ?></td>
                                    <td style="padding: 0px 10px;"> : </td>
                                    <td><a type="button" href="/Front/download/<?php echo $naskah_pertimbangan ?>" class=" a-kastem">Download</a></td>
                                </tr>
                            <?php endif ?>
                            <tr>
                                <td width="30px"><i class="fa fa-download"></i></td>
                                <td width="200px">SK Kepala Dinas Tentang Penetapan Informasi yang Dikecualikan <?php echo $tahun ?></td>
                                <td style="padding: 0px 10px;"> : </td>
                                <td><a type="button" href="/Front/download/<?php echo $sk_informasi ?>" class=" a-kastem">Download</a></td>
                            </tr>

                        </table>
                    </div>
                    <div class="mb-4">
                        <div class="full judul-info mb-3">
                            <h3 style="margin-bottom:10px !important" class="text-uppercase ">Arsip Uji Konsekuensi</h3>
                        </div>
                        <table style="line-height: 25px;">
                            <?php foreach ($data_tahun as $th) {
                                $tahun = $th['tahun'];
                            ?>
                                <tr>
                                    <td width="30px"><i class="fa fa-download"></i></td>
                                    <td width="200px"><?php echo $tahun ?></td>
                                    <td style="padding: 0px 10px;"> : </td>
                                    <td><a type="button" href="/Front/informasi_yang_dikecualikan/<?php echo $tahun ?>" class=" a-kastem">Detail</a></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <div class="mb-4">
                        <div class="full judul-info mb-3">
                            <h3 style="margin-bottom:10px !important" class="text-uppercase ">Arsip Naskah Pertimbangan</h3>
                        </div>
                        <table style="line-height: 25px;">
                            <?php foreach ($data_tahun as $tampil) {
                                $hari = $tampil['hari'];
                                $tanggal = $tampil['tanggal'];
                                $jam = $tampil['jam'];
                                $tempat = $tampil['tempat'];
                                $tahun = $tampil['tahun'];
                                $informasi_dikecualikan = $tampil['informasi_dikecualikan'];
                                $uji_konsekuensi = $tampil['uji_konsekuensi'];
                                $naskah_pertimbangan = $tampil['naskah_pertimbangan'];
                                $sk_informasi = $tampil['sk_informasi_dikecualikan'];
                            ?>
                                <?php if ($naskah_pertimbangan >= 1) : ?>
                                    <tr>
                                        <td width="30px"><i class="fa fa-download"></i></td>
                                        <td width="200px"><?php echo $tahun ?></td>
                                        <td style="padding: 0px 10px;"> : </td>
                                        <td><a type="button" href="/Front/downloads/<?php echo $naskah_pertimbangan . '/' . $tahun ?>" class=" a-kastem">Download</a></td>
                                    </tr>
                                <?php endif ?>
                            <?php } ?>
                        </table>
                    </div>
                    <div class="mb-4">
                        <div class="full judul-info mb-3">
                            <h3 style="margin-bottom:10px !important" class="text-uppercase ">Arsip Informasi yang di Kecualikan</h3>
                        </div>
                        <table style="line-height: 25px;">
                            <?php foreach ($data_tahun as $tampil) {
                                $hari = $tampil['hari'];
                                $tanggal = $tampil['tanggal'];
                                $jam = $tampil['jam'];
                                $tempat = $tampil['tempat'];
                                $tahun = $tampil['tahun'];
                                $informasi_dikecualikan = $tampil['informasi_dikecualikan'];
                                $uji_konsekuensi = $tampil['uji_konsekuensi'];
                                $naskah_pertimbangan = $tampil['naskah_pertimbangan'];
                                $sk_informasi = $tampil['sk_informasi_dikecualikan'];
                            ?>
                                <?php if ($informasi_dikecualikan >= 1) : ?>
                                    <tr>
                                        <td width="30px"><i class="fa fa-download"></i></td>
                                        <td width="200px"><?php echo $tahun ?></td>
                                        <td style="padding: 0px 10px;"> : </td>
                                        <td><a type="button" href="/Front/document/<?php echo $informasi_dikecualikan . '/' . $tahun ?>" class=" a-kastem">Download</a></td>
                                    </tr>
                                <?php endif ?>
                            <?php } ?>
                        </table>
                    </div>

                    <!-- <div class="col-md-12">
                                <div class="full">
                                    <div class="judul-sop">
                                        <h3 style="margin-bottom:10px !important" class="text-uppercase "><?php echo $judul ?></h3>
                                    </div>
                                    <div class="table-responsive mb-6">
                                        <div class="table table-bordered table-striped" style="text-align: justify;">
                                            <p><?php echo $konten ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                </div>
            <?php } ?>

        </div>
    </div>
</div>
<!-- end section -->

<!-- section -->
<div class="section padding_layout_1 testmonial_section white_fonts">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="main_heading text_align_left">
                        <h2 style="text-transform: none;">What Clients Say?</h2>
                        <p class="large">Here are testimonials from clients..</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="full">
                    <div id="testimonial_slider" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#testimonial_slider" data-slide-to="0" class="active"></li>
                            <li data-target="#testimonial_slider" data-slide-to="1"></li>
                            <li data-target="#testimonial_slider" data-slide-to="2"></li>
                        </ul>
                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="testimonial-container">
                                    <div class="testimonial-content"> You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first.
                                        I am really satisfied with my first laptop service. </div>
                                    <div class="testimonial-photo"> <img src="images/it_service/client1.jpg" class="img-responsive" alt="#" width="150" height="150"> </div>
                                    <div class="testimonial-meta">
                                        <h4>Maria Anderson</h4>
                                        <span class="testimonial-position">CFO, Tech NY</span>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="testimonial-container">
                                    <div class="testimonial-content"> You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first.
                                        I am really satisfied with my first laptop service. </div>
                                    <div class="testimonial-photo"> <img src="images/it_service/client2.jpg" class="img-responsive" alt="#" width="150" height="150"> </div>
                                    <div class="testimonial-meta">
                                        <h4>Maria Anderson</h4>
                                        <span class="testimonial-position">CFO, Tech NY</span>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="testimonial-container">
                                    <div class="testimonial-content"> You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first.
                                        I am really satisfied with my first laptop service. </div>
                                    <div class="testimonial-photo"> <img src="images/it_service/client3.jpg" class="img-responsive" alt="#" width="150" height="150"> </div>
                                    <div class="testimonial-meta">
                                        <h4>Maria Anderson</h4>
                                        <span class="testimonial-position">CFO, Tech NY</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="full"> </div>
            </div>
        </div>
    </div>
</div>
<!-- end section -->
<!-- section -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="contact_us_section">
                        <div class="call_icon"> <img src="images/it_service/phone_icon.png" alt="#" /> </div>
                        <div class="inner_cont">
                            <h2>REQUEST A FREE QUOTE</h2>
                            <p>Get answers and advice from people you want it from.</p>
                        </div>
                        <div class="button_Section_cont"> <a class="btn dark_gray_bt" href="it_contact.html">Contact us</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end section -->