<!-- end header -->
<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="title-holder">
                        <div class="title-holder-cell text-left">
                            <h3 class="text-uppercase " style="color: white;">Peraturan</h3>
                            <p class="large" style="color: white; font-size:17px">Dinas PUSDATARU Provinsi Jawa Timur</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end inner page banner -->





<div class="section mt-6 mb-6">
    <div class="container">
        <!-- <h5 class="mb-4">Result : <?php echo $total_rows ?></h5> -->
        <div class="row">

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-left">

                <div class="grey-light-bga shipping-cont mb-4">
                    <div class="heading-line h3-line">
                        <h3 style="text-transform: uppercase; padding:10px 0px;margin-bottom:0px !important">BENTUK PRODUK HUKUM</h3>
                    </div>
                    <div id="sidenav">
                        <ul class="list-unstyled">
                            <?php
                            foreach ($bentuk as $tampil) {
                                $bentuk_hukum = $tampil['judul'];
                                $slug = $tampil['slug'];
                            ?>
                                <li>
                                    <a href="<?php echo site_url('Front/peraturan_daerah') . "?bentuk=$slug"; ?>" method="GET" title="Lihat Peraturan Daerah">&nbsp;<i class="fa fa-dot-circle-o mr-2 mt-2"></i> <?php echo $bentuk_hukum ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

                <div class="grey-light-bga shipping-cont mb-4">
                    <div class="heading-line h3-line">
                        <h3 style="text-transform: uppercase; padding:10px 0px;margin-bottom:0px !important">TAHUN PRODUK HUKUM</h3>
                    </div>
                    <table class="table table-striped" style="margin-bottom:0px;">
                        <tbody>
                            <?php
                            $noTahun = 0;
                            $indexTahun = 0;
                            foreach ($tahun as $tampil) {

                                if ($noTahun % 3 == 0) {
                                    $indexTahun++;
                                    $dataTahun[$indexTahun][] = $tampil['tahun'];
                                } else {
                                    $dataTahun[$indexTahun][] = $tampil['tahun'];
                                }
                                $noTahun++;
                            }
                            // $this->general->testPre($dataTahun);
                            ?>
                            <?php foreach ($dataTahun as $keyT => $at) {

                                $thun1 = $dataTahun[$keyT][0];
                                $thun2 = $dataTahun[$keyT][1];
                                $thun3 = $dataTahun[$keyT][2];
                            ?>
                                <tr>
                                    <td>
                                        <b><a href="<?php echo site_url('/Front/peraturan_daerah') . "?bentuk=" . $this->input->get('bentuk') . "&tahun=" . $thun1 ?>" method="GET" title="lihat data"><?php echo $thun1 ?></a><small title="34 data"><span class="slash-divider">/</span> (<?php echo $total_tahun[$thun1] ?>)</small></b>
                                    </td>
                                    <td>
                                        <b><a href="<?php echo site_url('/Front/peraturan_daerah') . "?bentuk=" . $this->input->get('bentuk') . "&tahun=" . $thun2 ?>" method="GET" title="lihat data"><?php echo $thun2 ?></a><small title="76 data"><span class="slash-divider">/</span> (<?php echo $total_tahun[$thun2] ?>)</small></b>
                                    </td>
                                    <td>
                                        <b><a href="<?php echo site_url('/Front/peraturan_daerah') . "?bentuk=" . $this->input->get('bentuk') . "&tahun=" . $thun3 ?>" method="GET" title="lihat data"><?php echo $thun3 ?></a><small title="90 data"><span class="slash-divider">/</span> (<?php echo $total_tahun[$thun3] ?>)</small></b>
                                    </td>
                                </tr>
                            <?php
                                $thun1 = '';
                                $thun2 = '';
                                $thun3 = '';
                            } ?>

                        </tbody>
                    </table>
                    <div class="mb-2 text-center">
                        <a type="button" href="<?php echo site_url() ?>Front/tahun_peraturan/" class="btn sqaure_bt">SELENGKAPNYA</a>
                    </div>
                </div>

                <div class="grey-light-bg shipping-cont mb-4">
                    <div class="heading-line h3-line">
                        <h3 style="text-transform: uppercase; padding:10px 0px;margin-bottom:0px !important">Form Pencarian</h3>
                    </div>


                    <form action="<?php echo site_url('Front/peraturan_daerah'); ?>" class="form" method="GET" style="">

                        <div class="position-relative form-group mt-3">
                            <select name="bentuk" id="bentuk" class="form-control">
                                <option value="">BENTUK PRODUK HUKUM</option>
                                <?php
                                foreach ($bentuk as $tampil) {
                                    $bentuk_hukum = $tampil['judul'];
                                    $slug = $tampil['slug'];
                                ?>
                                    <option value="<?php echo $slug ?>"><?php echo $bentuk_hukum ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="position-relative form-group">
                            <input name="nomor" id="nomor" type="text" autocomplete='off' placeholder="NOMOR" class="form-control">
                        </div>

                        <div class="position-relative form-group">
                            <select name="tahun" id="tahun" class="form-control">
                                <option value="">TAHUN</option>
                                <?php
                                foreach ($tahun as $tampil) {
                                    $tahunTampil = $tampil['tahun'];
                                ?>
                                    <option value="<?php echo $tahunTampil ?>"><?php echo $tahunTampil ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="position-relative form-group">
                            <input name="tentang" id="tentang" type="text" autocomplete='off' placeholder="TENTANG" class="form-control">
                        </div>
                        <div class="mb-4 text-center">
                            <button type="submit" value="CARI" class="btn sqaure_bt" data-loading-text="Loading...">CARI</button>
                        </div>
                    </form>

                </div>

            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right ">
                <div class="grey-light-bga shipping-cont mb-4">
                    <div class="heading-line h3-line">
                        <h3 style="text-transform: uppercase; padding:10px 0px;margin-bottom:0px !important">DETAIL</h3>
                    </div>
                    <div id="sidenav">
                        <?php foreach ($peraturan_daerah as $a) {
                            $kategori = $a['judul'];
                            $slug = $a['slug'];
                            $nomor = $a['no_peraturan'];
                            $periode = $a['tahun'];
                            $tentang = $a['tentang'];
                            $tanggal = $a['tanggal'];
                            $dokumen = $a['upload_dokumen'];
                        ?>
                            <h4><?php echo $kategori ?> Nomor <?php echo $nomor ?> Tahun <?php echo $periode ?></h4>
                            <div class="row">
                                <div class="col-md-2">
                                    <a type="button" href="<?php echo site_url() ?>/Front/download_peraturan/<?php echo $dokumen ?>" style="padding-top: 7px; margin-right:5px" class=" a-kastem-a">Download</a>
                                </div>
                                <div class="col-md-10">
                                    <p><?php echo $tentang ?></p>
                                    <div class="table table-striped">
                                        <table width="100%">
                                            <tr>
                                                <td>Kategori</td>
                                                <td><?php echo $kategori ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nomor/Tahun</td>
                                                <td><?php echo $nomor ?>/<?php echo $periode ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Unggah</td>
                                                <td><?php echo date('d F Y', strtotime($tanggal)) ?></td>
                                            </tr>
                                        </table>
                                    </div>

                                </div>
                            </div>


                    </div>
                </div>
                <div class="embed-responsive embed-responsive-16by9">

                    <iframe height="700px" class="embed-responsive-item" src="https://docs.google.com/viewer?url=<?php echo base_url('assets/uploads/files/') . $dokumen . '&embedded=true' ?>"></iframe>

                    <!-- <embed src="/assets/uploads/files/'<?php echo $dokumen ?>#toolbar=0" width="500" height="375" type="application/pdf"> -->
                    <!-- <object data="<?php echo base_url() . '/assets/uploads/files/' . $dokumen ?>" type="application/pdf" width="700px" height="700px"> -->
                    <!-- <iframe src="<?php echo base_url() . '/assets/uploads/files/' . $dokumen ?>#toolbar=0" width="100%" height="500px"> -->
                    </iframe>
                    <!-- <iframe height="700px" class="embed-responsive-item" src="https://docs.google.com/viewer?url=http://stimata.ac.id/media/2018/07/011-FORMULIR-PENGAJUAN-SURAT.pdf&embedded=true"></iframe> -->

                </div>
            <?php } ?>


            </div>

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