<!-- end header -->
<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="title-holder">
                        <div class="title-holder-cell text-left">
                            <h1 class="page-title">Profil PPID Pembantu</h1>
                            <ol class="breadcrumb">
                                <li><a href="<?php echo site_url() ?>">Home</a></li>
                                <li class="active">Profil PPID Pembantu</li>
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
        <?php
        foreach ($profil_ppid_pembantu as $tampil) {
            $nama = $tampil['nama'];
            $judul = $tampil['judul'];
            $sub_judul = $tampil['sub_judul'];
            $konten = $tampil['isi'];
            $kutipan = $tampil['kutipan'];
            $gambar = $tampil['gambar'];
        ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="main_heading text_align_center">
                            <h2><?php echo $judul ?></h2>
                            <p class="large"><?php echo $sub_judul ?></p>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="blog_feature_img "> <img style=" padding: 0 40px 0 40px; " class="img-responsive" src="<?php echo base_url('assets/uploads/files/') . $gambar ?>" alt=""> </div>
                </div>
                <div class="col-md-9">
                    <div>
                        <h3><?php echo $nama ?></h3>
                    </div>
                    <div class="textku" style="text-align: justify;">
                        <p style="border-left: thick solid #039ee3;padding-left: 15px; padding-right:40px; font-size:17px"><?php echo $kutipan ?></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="textku" style="text-align: justify; padding: 20px 40px 20px 40px; ">
                            <?php echo $konten ?>
                        </div>

                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<!-- end section -->