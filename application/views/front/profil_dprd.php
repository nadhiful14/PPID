<!-- end header -->
<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="title-holder">
                        <div class="title-holder-cell text-left">
                            <h1 class="page-title">Profil DPRD</h1>
                            <ol class="breadcrumb">
                                <li><a href="<?php echo site_url() ?>">Home</a></li>
                                <li class="active">Profil DPRD</li>
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
                        <?php
                        foreach ($profil_dprd as $tampil) {
                            $judul = $tampil['judul'];
                            $sub_judul = $tampil['sub_judul'];
                            $konten = $tampil['konten'];
                            // $gambar = $tampil['gambar'];
                        ?>

                            <h2><?php echo $judul ?></h2>
                            <p class="large"><?php echo $sub_judul ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <?php
                    foreach ($profil_dprd as $tampil) {
                        $judul = $tampil['judul'];
                        $sub_judul = $tampil['sub_judul'];
                        $konten = $tampil['konten'];
                        // $gambar = $tampil['gambar'];
                    ?>
                        <!-- <div class="blog_feature_img "> <img style=" padding: 20px" class="img-responsive" src="<?php echo base_url('assets/uploads/files/') . $gambar ?>" alt=""> </div> -->

                        <div class="mb-6" style="text-align: justify; padding: 0px 20px">
                            <p style=""><?php echo $konten ?></p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end section -->