<!-- end header -->
<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="title-holder">
                        <div class="title-holder-cell text-left">
                            <h1 class="page-title">Informasi Berkala</h1>
                            <ol class="breadcrumb">
                                <li><a href="<?php echo site_url() ?>">Home</a></li>
                                <li class="active">Informasi Berkala</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="inner_banner" class="section mb-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <!-- <div class="holder">
                        <blockquote> <i class="fa fa-quote-left" style="font-size: 36px;float:inline-start"></i>
                            <h3 style="text-align: center;"> Setiap Badan Publik mempunyai kewajiban untuk membuka akses atas Informasi Publik yang berkaitan dengan Badan Publik tersebut untuk masyarakat luas.</h3><i class="fa fa-quote-right" style="font-size: 36px; float:inline-end"></i>
                        </blockquote>
                    </div> -->
                    <div class="full testimonial_simple_say margin_bottom_30_all" style="margin-top:0;">
                        <div class="qoute_testimonial"><i class="fa fa-quote-left" aria-hidden="true"></i></div>
                        <?php
                        foreach ($tampil_informasi_berkala as $tampil) {
                            $kutipan_teks = $tampil['kutipan_teks'];
                        ?>
                            <p class="margin_bottom_0" style="line-height: 30px;"><i><?php echo $kutipan_teks ?></i></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end inner page banner -->

<!-- section -->
<div class="section mb-6">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="main_heading text_align_center">
                        <?php
                        foreach ($tampil_informasi_berkala as $tampil) {
                            $judul = $tampil['judul'];
                            $sub_judul = $tampil['sub_judul'];
                            $kutipan_teks = $tampil['kutipan_teks'];
                            $isi = $tampil['isi'];
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
                    <div class="table-responsive">
                        <div class="table table-bordered table-striped">
                            <?php
                            foreach ($tampil_informasi_berkala as $tampil) {
                                $judul = $tampil['judul'];
                                $sub_judul = $tampil['sub_judul'];
                                $kutipan_teks = $tampil['kutipan_teks'];
                                $isi = $tampil['isi'];
                            ?>
                                <?php echo $isi ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end section -->