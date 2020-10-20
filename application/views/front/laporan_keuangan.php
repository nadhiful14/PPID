<!-- end header -->
<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="title-holder">
                        <div class="title-holder-cell text-left">
                            <h1 class="page-title">LAPORAN KEUANGAN</h1>
                            <ol class="breadcrumb">
                                <li><a href="<?php echo site_url() ?>">Home</a></li>
                                <li class="active">Laporan Keuangan</li>
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
<div class="section padding_layout_1">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right">
                <div class="full">
                    <?php
                    foreach ($laporan_keuangan as $key => $laporan) {
                        $isi = $laporan['isi'];
                        $tahun = $laporan['tahun'];
                    ?>
                        <div id="<?php echo $tahun ?>" class="table table-responsive <?php echo ($key == 0) ? 'active' : '' ?>">
                            <div class="table-striped table-bordered ppid">
                                <p><?php echo $isi ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-left mt-3">
                <div class="side_bar">
                    <div class="side_bar_blog">
                        <h4>SEARCH</h4>
                        <div class="side_bar_search">
                            <form action="<?php echo base_url('Front/listBerita') ?>" method="get">
                                <div class="input-group stylish-input-group">
                                    <input class="form-control" placeholder="Type to Search" type="text" name="keyword" autocomplete="off">
                                    <span class="input-group-addon">
                                        <button type="submit" style="cursor:pointer"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </div>
                                </span>
                            </form>
                        </div>
                    </div>
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
                                        <div class="blog_feature_img mt-1"> <a href="<?php echo site_url('Front/detailBerita/') . $slug ?>"><img class="img-responsive img-opacity" src="<?php echo base_url('assets/uploads/files/') . $thumbnail ?>" alt="#"> </a></div>
                                    </div>
                                    <div class="col-md-8">
                                        <ul>
                                            <li>
                                                <p class="post_head" style="text-align: justify;"><a class="teks-hover-biru" href="<?php echo site_url('Front/detailBerita/') . $slug ?>"><?= $judul ?></a></p>
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