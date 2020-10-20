<!-- end header -->
<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="title-holder">
                        <div class="title-holder-cell text-left">
                            <h3 class="text-uppercase " style="color: white;">Peraturan</h3>
                            <p class="large" style="color: white; font-size:17px">Dinas PUSDATARU Provinsi Jawa Timur</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end inner page banner -->


<div class="section mt-6 mb-6">
    <div class="container">
        <!-- <h5 class="mb-4">Result : <?php echo $total_rows ?></h5> -->
        <div class="row">

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-left">
                <div class="grey-light-bga shipping-cont mb-4">
                    <div class="heading-line h3-line">
                        <h3 style="text-transform: uppercase; padding:10px 0px;margin-bottom:0px !important">BENTUK PRODUK HUKUM</h3>
                    </div>
                    <div id="sidenav">
                        <ul class="list-unstyled">
                            <?php
                            foreach ($bentuk as $tampil) {
                                $bentuk_hukum = $tampil['judul'];
                                $slug = $tampil['slug'];
                            ?>
                                <li>
                                    <a href="<?php echo site_url('Front/peraturan_daerah') . "?bentuk=$slug"; ?>" method="GET" title="Lihat Peraturan Daerah">&nbsp;<i class="fa fa-dot-circle-o mr-2 mt-2"></i> <?php echo $bentuk_hukum ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right ">
                <div class="grey-light-bga shipping-cont">
                    <div class="heading-line h3-line">
                        <h3 style="text-transform: uppercase; padding:10px 0px;margin-bottom:0px !important">TAHUN PRODUK HUKUM</h3>
                    </div>
                    <table class="table table-striped" style="margin-bottom:0px;">
                        <tbody>
                            <?php
                            $noTahun = 0;
                            $indexTahun = 0;
                            foreach ($tahun_peraturan as $tampil) {

                                if ($noTahun % 3 == 0) {
                                    $indexTahun++;
                                    $dataTahun[$indexTahun][] = $tampil['tahun'];
                                } else {
                                    $dataTahun[$indexTahun][] = $tampil['tahun'];
                                }
                                $noTahun++;
                            }
                            // $this->general->testPre($dataTahun);
                            ?>
                            <?php foreach ($dataTahun as $keyT => $at) {

                                $thun1 = $dataTahun[$keyT][0];
                                $thun2 = $dataTahun[$keyT][1];
                                $thun3 = $dataTahun[$keyT][2];
                            ?>
                                <tr>
                                    <td>
                                        <b><a href="<?php echo site_url('/Front/peraturan_daerah') . "?bentuk=" . $this->input->get('bentuk') . "&tahun=" . $thun1 ?>" method="GET" title="lihat data"><?php echo $thun1 ?></a><small title="34 data"><span class="slash-divider">/</span> (<?php echo $total_tahun[$thun1] ?>)</small></b>
                                    </td>
                                    <td>
                                        <b><a href="<?php echo site_url('/Front/peraturan_daerah') . "?bentuk=" . $this->input->get('bentuk') . "&tahun=" . $thun2 ?>" method="GET" title="lihat data"><?php echo $thun2 ?></a><small title="76 data"><span class="slash-divider">/</span> (<?php echo $total_tahun[$thun2] ?>)</small></b>
                                    </td>
                                    <td>
                                        <b><a href="<?php echo site_url('/Front/peraturan_daerah') . "?bentuk=" . $this->input->get('bentuk') . "&tahun=" . $thun3 ?>" method="GET" title="lihat data"><?php echo $thun3 ?></a><small title="90 data"><span class="slash-divider">/</span> (<?php echo $total_tahun[$thun3] ?>)</small></b>
                                    </td>
                                </tr>
                            <?php
                                $thun1 = '';
                                $thun2 = '';
                                $thun3 = '';
                            } ?>

                        </tbody>
                    </table>
                    <div class="mb-2 text-center">
                        <button type="submit" value="CARI" class="btn sqaure_bt" data-loading-text="Loading...">SELENGKAPNYA</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end section -->