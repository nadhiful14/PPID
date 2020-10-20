<!-- end header -->
<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="title-holder">
                        <?php
                        foreach ($peraturan_keterbukaan_informasi as $tampil) {
                            $judul = $tampil['judul'];
                            $konten = $tampil['konten'];
                            $sub_judul = $tampil['sub_judul'];
                        ?>
                            <div class="title-holder-cell text-left">
                                <h3 class="text-uppercase " style="color: white;"><?php echo $judul ?></h3>
                                <p class="large" style="color: white; font-size:17px"><?php echo $sub_judul ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end inner page banner -->





<div class="section padding_layout_1">
    <div class="container">
        <!-- <h5 class="mb-4">Result : <?php echo $total_rows ?></h5> -->
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right">
                <div class="row">
                    <div class="col-md-12">
                        <div class="full">
                            <div class="table-responsive">
                                <div class="table table-bordered table-striped" style="text-align: justify;">
                                    <?php
                                    foreach ($peraturan_keterbukaan_informasi as $tampil) {
                                        $judul = $tampil['judul'];
                                        $konten = $tampil['konten'];
                                        $sub_judul = $tampil['sub_judul'];
                                    ?>
                                        <?php echo $konten ?>
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
                        <a href="<?php echo site_url('Front/formulirOffline');  ?>"><strong>DOWNLOAD</strong></a>
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