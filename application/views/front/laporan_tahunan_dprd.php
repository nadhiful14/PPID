<!-- end header -->
<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="title-holder">
                        <div class="title-holder-cell text-left">
                            <h1 class="page-title">Laporan Tahunan DPRD</h1>
                            <ol class="breadcrumb">
                                <li><a href="<?php echo site_url() ?>">Home</a></li>
                                <li class="active">Laporan Tahunan DPRD</li>
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
<div class="section mb-6 mt-6 blog_list">
    <div class="container">
        <div class="row">
            <div class="col-md-12 product_detail">
                <div class="full">
                    <div class="tab_bar_section" style="margin-top:0px">
                        <ul class="nav nav-tabs" role="tablist">
                            <?php foreach ($laporan_tahunan_dprd as $key => $laporan) {
                                $isi = $laporan['laporan'];
                                $tahun = $laporan['tahun'];
                            ?>
                                <li class="nav-item"> <a class="nav-link <?php echo ($key == 0) ? 'active' : '' ?>" data-toggle="tab" href="#<?php echo $tahun ?>"><?php echo $tahun ?></a> </li>
                            <?php } ?>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content" style="padding:0px ;">
                            <?php foreach ($laporan_tahunan_dprd as $key => $laporan) {
                                $isi = $laporan['laporan'];
                                $tahun = $laporan['tahun'];
                                $judul = $laporan['judul'];
                                // $dokumen = $laporan['upload_dokumen'];
                            ?>

                                <div id="<?php echo $tahun ?>" style="width: 100%;" class="tab-pane table table-responsive <?php echo ($key == 0) ? 'active' : '' ?>">
                                    <div class="text_align_center mt-4">
                                        <h3><?php echo $judul ?></h3>
                                    </div>
                                    <div class="table-striped table-bordered ppid">
                                        <p><?php echo $isi ?></p>
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