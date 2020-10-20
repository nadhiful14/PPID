<!-- end header -->
<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="title-holder">
                        <div class="title-holder-cell text-left">
                            <h1 class="page-title">Daftar Anggota DPRD</h1>
                            <ol class="breadcrumb">
                                <li><a href="<?php echo site_url() ?>">Home</a></li>
                                <li class="active">Daftar Anggota DPRD</li>
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
<div class="section mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="main_heading text_align_center">
                        <h2>Anggota DPRD Kabupaten Blitar</h2>
                        <p class="large">Daftar anggota DPRD Kabupaten Blitar periode <?php echo $tampil_anggota_dprd[0]['periode_awal'] ?> – <?php echo $tampil_anggota_dprd[0]['periode_akhir'] ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php

            foreach ($tampil_anggota_dprd as $dprd) {
                $nama = $dprd['nama'];
                $jabatan = $dprd['jabatan'];
                $foto = $dprd['foto'];
                $fraksi = $dprd['fraksi'];
            ?>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 margin_bottom_30_all">
                    <div class="product_list">
                        <div class="product_img"> <img class="img-responsive img-transition-a" style="width: 500px;" src="<?php echo base_url('assets/uploads/files/') . $foto ?>" alt="#" /> </div>
                        <div class="product_detail_btm">
                            <div class="center">
                                <h4><a href="#"><?= $nama ?></a></h4>
                            </div>
                            <div class="starratin">
                                <div class="center"> <i aria-hidden="true" style="color: black;"><?= $jabatan ?></i> </div>
                            </div>
                            <div class="product_price margin_bottom_30_all">
                                <p><span><?= $fraksi ?></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>
<!-- end section -->