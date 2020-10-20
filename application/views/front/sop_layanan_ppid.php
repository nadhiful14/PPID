<!-- end header -->
<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="title-holder">
                        <?php
                        foreach ($sop_ppid as $tampil) {
                            $judul = $tampil['judul'];
                            $konten = $tampil['konten'];
                            $gambar = $tampil['gambar'];
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



<?php
foreach ($sop_ppid as $tampil) {
    $judul = $tampil['judul'];
    $konten = $tampil['konten'];
    $sub_judul = $tampil['sub_judul'];
    $gambar = $tampil['gambar'];
?>

    <div class="section mt-6">
        <div class="container">
            <!-- <h5 class="mb-4">Result : <?php echo $total_rows ?></h5> -->
            <div class="row">

                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pull-left">
                    <div class="side_bar">
                        <div class="side_bar_blog">
                            <div class="blog_feature_img "> <img style="margin: 20px 0px;" class="img-responsive border-gambar" src="<?php echo base_url('assets/uploads/files/') . $gambar ?>" alt="#"> </div>
                            <div>
                                <h4 style="border-bottom: 1px solid #c4c4c4;padding-bottom: 20px;"><?php echo $judul ?></h4>
                            </div>
                            <div class="post_time">
                                <p style="border-bottom: 1px solid #c4c4c4;padding-bottom: 20px;font-size:13px"><?php echo $sub_judul ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 pull-right">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="full">
                                <div class="judul-sop">
                                    <h3 style="margin-bottom:10px !important" class="text-uppercase "><?php echo $judul ?></h3>
                                </div>
                                <div class="table-responsive mb-6">
                                    <div class="table table-bordered table-striped lh" style="text-align: justify;">
                                        <p><?php echo $konten ?></p>
                                    </div>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end section -->