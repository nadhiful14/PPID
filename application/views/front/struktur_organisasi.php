<!-- end header -->
<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="title-holder">
                        <div class="title-holder-cell text-left">
                            <h1 class="page-title">Struktur Organisasi</h1>
                            <ol class="breadcrumb">
                                <li><a href="<?php echo site_url() ?>">Home</a></li>
                                <li class="active">Struktur Organisasi</li>
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
            <div class="col-md-12">
                <div class="full">
                    <div class="main_heading text_align_center">
                        <?php
                        foreach ($struktur_organisasi as $tampil) {
                            $judul = $tampil['judul'];
                            $konten = $tampil['struktur_organisasi'];
                            $gambar = $tampil['gambar'];
                        ?>

                            <h2>Struktur Organisasi</h2>
                            <p class="large"><?php echo $judul ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <?php
                    foreach ($struktur_organisasi as $tampil) {
                        $judul = $tampil['judul'];
                        $konten = $tampil['struktur_organisasi'];
                        $gambar = $tampil['gambar'];
                    ?>
                        <div class="blog_feature_img " style=" padding: 20px"> <img style=" padding: 3px" class="img-responsive border-gambar" src="<?php echo base_url('assets/uploads/files/') . $gambar ?>" alt="#"> </div>

                        <div class="textku" style="text-align: justify; padding: 20px">
                            <?php echo $konten ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end section -->