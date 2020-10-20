<!-- end header -->
<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="title-holder">
                        <div class="title-holder-cell text-left">
                            <?php
                            foreach ($daftar_informasi_publik as $tampil) {
                                $judul = $tampil['judul'];
                                $tahun = $tampil['tahun'];
                            ?>
                                <h1 class="page-title"><?php echo $judul ?> TAHUN <?php echo $tahun ?></h1>
                            <?php } ?>
                            <ol class="breadcrumb">
                                <li><a href="<?php echo site_url() ?>">Home</a></li>
                                <li class="active">Daftar Informasi Publik</li>
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
<div class="section mt-6 mb-6">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <?php
                    foreach ($daftar_informasi_publik as $tampil) {
                        $judul = $tampil['judul'];
                        $tahun = $tampil['tahun'];
                        $isi = $tampil['isi'];
                        $upload_dokumen = $tampil['upload_dokumen'];
                    ?>
                        <div class="text_align_center">
                            <a style="" class="btn sqaure_bt " href="<?php echo site_url() ?>/Front/download_dip/<?php echo $upload_dokumen ?>">Download PDF</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="full">
                    <div class="table-responsive">
                        <div class="table table-bordered table-striped">
                            <?php
                            foreach ($daftar_informasi_publik as $tampil) {
                                $judul = $tampil['judul'];
                                $tahun = $tampil['tahun'];
                                $isi = $tampil['isi'];
                                $upload_dokumen = $tampil['upload_dokumen'];
                            ?>
                                <?php echo $isi ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-6 mt-4">
            <div class="col-md-12">
                <div class="full">
                    <div class="text_align_center">
                        <a style="padding-left:20px;padding-right:20px" class="btn sqaure_bt " href="<?php echo site_url() ?>/Front/informasi_dikecualikan">Informasi Publik Yang Dikecualikan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end section -->