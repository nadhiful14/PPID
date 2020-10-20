<!-- end header -->
<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="title-holder">
                        <div class="title-holder-cell text-left">
                            <h3 class="text-uppercase " style="color: white;">Ringkasan Laporan Keuangan</h3>
                            <p class="large" style="color: white; font-size:17px">Dinas PUSDATARU Provinsi Jawa Timur</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end inner page banner -->

<div class="section padding_layout_1 blog_list">
    <div class="container">
        <!-- <h5 class="mb-4">Result : <?php echo $total_rows ?></h5> -->
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right product_detail">
                <?php

                // $this->general->testPre($tampil_berita);

                foreach ($laporan_keuangan as $data) {
                    $ringkasan = $data['ringkasan'];
                    $ringkas = strip_tags(str_word_count($ringkasan) > 60 ? substr($ringkasan, 0, 250) . "[..]" : $ringkasan);
                    $tanggal = $data['tanggal'];
                    $isi = $data['isi'];
                    $id = $data['id'];
                    $judul = $data['judul'];
                    $thumbnail = $data['thumbnail'];
                ?>
                    <div class="full">
                        <div class="grey-light-bga shipping-cont mb-4" style="border-radius: 3px; box-shadow: 0px 0px 3px 1px rgba(0,0,0,0.24) !important;">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="blog_column" style="margin: 10px 0px;">
                                        <div class="blog_feature_img ">
                                            <img class="img-responsive img-laporan" src="<?php echo base_url('assets/front/download/') . $thumbnail ?>" alt="#" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="full">

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                            <div class="full blog_colum">
                                                <div class="blog_feature_head mt-3">
                                                    <h4 style="text-align: justify;"><a class="teks-hover-biru" href="<?php echo site_url() ?>Front/detail_laporan_keuangan/<?php echo $id ?>"><?= $judul ?></a></h4>
                                                </div>
                                                <div class="blog_feature_cont" style="text-align: justify !important;">
                                                    <p><?php echo ($ringkas) ?></p>
                                                    <a type="button" href="<?php echo site_url() ?>Front/detail_laporan_keuangan/<?php echo $id ?>" style="padding-top: 7px;" class=" detail-kastem">Detail</a>
                                                </div>
                                                <div class="post_time">
                                                    <p><i class="fa fa-clock-o"></i> <?php echo date('l, d F Y, H:i', strtotime($tanggal));  ?></p>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-left">
                <div class="side_bar">
                    <div class="side_bar_blog">
                        <h4>FORMULIR</h4>
                        <h5>Formulir Informasi Publik</h5>
                        <p>Formulir Permohonan Informasi Publik PPID Kabupaten Blitar Provinsi Jawa Timur</p>
                        <a href="<?php echo base_url('Front/formulirOffline');  ?>"><strong>DOWNLOAD</strong></a>
                    </div>
                    <div class="side_bar_blog">
                        <h4>INFORMASI PUBLIK</h4>
                        <div class="categary">
                            <ul>
                                <li><a href="<?php echo site_url('Front/daftar_informasi_publik');  ?>"><i class="fa fa-caret-right"></i> Daftar Informasi Publik</a></li>
                                <li><a href="<?php echo site_url('Front/profil_badan_publik') ?>"><i class="fa fa-caret-right"></i> Profik Badan Publik</a></li>
                                <li><a href="<?php echo site_url('Front/informasi_berkala');  ?>"><i class="fa fa-caret-right"></i> Informasi Berkala</a></li>
                                <li><a href="<?php echo site_url('Front/informasi_dikecualikan');  ?>"><i class="fa fa-caret-right"></i> Informasi Dikecualian</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="side_bar_blog">
                        <h4>CATEGORIES</h4>
                        <div class="categary">
                            <ul>
                                <?php
                                foreach ($tampil_kategori as $kategori) {
                                    $nama = $kategori['nama'];
                                    $slug = $kategori['slug'];
                                ?>
                                    <li><a href="<?php echo base_url('Front/list_kategori/') . $slug ?>"><i class="fa fa-caret-right"></i> <?= $nama ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end section -->