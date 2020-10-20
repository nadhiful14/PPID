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
                            foreach ($struktur_ppid as $tampil) {
                                $judul = $tampil['judul'];
                                $sub_judul = $tampil['sub_judul'];
                            ?>
                                <h3 class="text-uppercase " style="color: white;"><?php echo $judul ?></h3>
                                <p class="large" style="color: white; font-size:17px"><?php echo $sub_judul ?></p>
                            <?php } ?>
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
                    foreach ($struktur_ppid as $tampil) {
                        $judul = $tampil['judul'];
                        $konten = $tampil['image'];
                        $sub_judul = $tampil['sub_judul'];
                    ?>
                        <div class="blog_feature_img center"> <img style="width:950px" class="img-responsive" src="<?php echo base_url('assets/uploads/files/') . $konten ?>" alt="#"> </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end section -->