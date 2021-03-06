<!-- end header -->
<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="title-holder">
                        <div class="title-holder-cell text-left">
                            <h1 class="page-title">Pimpinan DPRD</h1>
                            <ol class="breadcrumb">
                                <li><a href="<?php echo site_url() ?>">Home</a></li>
                                <li class="active">Pimpinan DPRD</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end inner page banner -->
<!-- section -->
<div class="section padding_layout_1 blog_list">
    <div class="container">
        <!-- <h5 class="mb-4">Result : <?php echo $total_rows ?></h5> -->
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right">
                <div class="full">
                    <?php
                    foreach ($pimpinan_dprd as $berita) {
                        $judul = $berita['judul'];
                        $slug = $berita['slug'];
                        $isi = $berita['isi'];
                        $tanggal = $berita['tanggal'];
                        $penulis = $berita['fullname'];
                        $thumbnail = $berita['thumbnail'];
                        $kategori_id = $berita['nama'];
                        $username = $berita['fullname'];
                        // $tag = $berita['tag'];
                    ?>
                        <div class="blog_section margin_bottom_0">
                            <div class="blog_feature_img"> <img class="img-responsive" src="<?php echo base_url('assets/uploads/files/') . $thumbnail ?>" alt="#"> </div>
                            <div class="blog_feature_cantant">
                                <p class="blog_head"><?= $judul ?></p>
                                <div class="post_info ">
                                    <ul>
                                        <li><i class="fa fa-tag" aria-hidden="true"></i> <?php echo $kategori_id; ?></li>
                                        <li><i class="fa fa-user" aria-hidden="true"></i> <?php echo $username; ?></li>
                                        <li><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo date('l, d F Y, H:i', strtotime($tanggal));  ?></li>
                                    </ul>
                                </div>
                                <div class="table-responsive">
                                    <div class="table table-bordered table-striped" style="margin-top: 40px;text-align: justify;">
                                        <?php echo $isi ?>
                                    </div>
                                </div>
                                <!-- <div style="text-align: justify;">
                                    <p><?= $isi ?></p>
                                </div> -->
                            </div>


                            <div class="bottom_info margin_bottom_30_all">
                                <div class="pull-right">
                                    <div class="shr">Share: </div>
                                    <div class="social_icon">
                                        <ul>
                                            <li class="fb"><a href="https://www.facebook.com/sharer.php?u=<?php echo site_url() ?>Front/pimpinan_dprd/<?php echo $slug ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                            <li class="twi"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                            <li class="gp"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                            <li class="pint"><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-left">
                <div class="side_bar">
                    <div class="side_bar_blog">
                        <h4>RECENT POST</h4>
                        <div class="recent_post">
                            <?php
                            foreach ($recent_berita as $berita) {
                                $judul = $berita['judul'];
                                $slug = $berita['slug'];
                                $tanggal = $berita['tanggal'];
                                $thumbnail = $berita['thumbnail'];
                            ?>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="blog_feature_img mt-1"> <a href="<?php echo site_url('Front/detailBerita/') . $slug ?>"><img class="img-responsive" src="<?php echo base_url('assets/uploads/files/') . $thumbnail ?>" alt="#"> </a></div>
                                    </div>
                                    <div class="col-md-8">
                                        <ul>
                                            <li>
                                                <p class="post_head" style="text-align: justify;"><a href="<?php echo site_url('Front/detailBerita/') . $slug ?>"><?= $judul ?></a></p>
                                                <p class="post_date"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo date('l, d F Y', strtotime($tanggal));  ?></p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            <?php } ?>
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
                                    <li><a href="<?php echo site_url('Front/list_kategori/') . $slug ?>"><i class="fa fa-caret-right"></i> <?= $nama ?></a></li>
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