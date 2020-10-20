<!-- end header -->
<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="title-holder">
                        <div class="title-holder-cell text-left">
                            <h1 class="page-title">Badan Kehormatan</h1>
                            <ol class="breadcrumb">
                                <li><a href="<?php echo site_url() ?>">Home</a></li>
                                <li class="active">Badan Kehormatan</li>
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
                        foreach ($badan_kehormatan as $tampil) {
                            $judul = $tampil['judul'];
                            $konten = $tampil['konten'];
                        ?>

                            <h2>Badan Kehormatan Kabupaten Blitar</h2>
                            <p class="large"><?php echo $judul ?></p>
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
                            foreach ($badan_kehormatan as $tampil) {
                                $judul = $tampil['judul'];
                                $konten = $tampil['konten'];
                            ?>
                                <?php echo $konten ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end section -->