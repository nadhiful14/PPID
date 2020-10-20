<!-- end header -->
<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="title-holder">
                        <div class="title-holder-cell text-left">
                            <h3 class="text-uppercase " style="color: white;">Rencana Kerja & Kegiatan PPID</h3>
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
                <div class="full">
                    <div class="tab_bar_section" style="margin-top:0px">
                        <ul class="nav nav-tabs" role="tablist">
                            <?php foreach ($rencana_ppid as $key => $laporan) {
                                $isi = $laporan['kegiatan'];
                                $tahun = $laporan['tahun'];
                            ?>
                                <li class="nav-item"> <a class="nav-link <?php echo ($key == 0) ? 'active' : '' ?>" data-toggle="tab" href="#<?php echo $tahun ?>"><?php echo $tahun ?></a> </li>
                            <?php } ?>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content" style="padding:0px ;">
                            <?php foreach ($rencana_ppid as $key => $laporan) {
                                $isi = $laporan['kegiatan'];
                                $tahun = $laporan['tahun'];
                            ?>

                                <div id="<?php echo $tahun ?>" style="width: 100%;" class="tab-pane table table-responsive <?php echo ($key == 0) ? 'active' : '' ?>">
                                    <div class="table-striped table-bordered ppid">
                                        <p><?php echo $isi ?></p>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
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