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


                <div class="grey-light-bg shipping-cont mb-4">
                    <div class="heading-line h3-line">
                        <h3 style="text-transform: uppercase; padding:10px 0px;margin-bottom:0px !important">Form Pencarian</h3>
                    </div>


                    <form action="<?php echo site_url('Front/peraturan_daerah'); ?>" class="form" method="GET" style="">

                        <div class="position-relative form-group mt-3">
                            <select name="bentuk" id="bentuk" class="form-control">
                                <option value="">BENTUK PRODUK HUKUM</option>
                                <?php
                                foreach ($bentuk as $tampil) {
                                    $bentuk_hukum = $tampil['judul'];
                                    $slug = $tampil['slug'];
                                ?>
                                    <option value="<?php echo $slug ?>"><?php echo $bentuk_hukum ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="position-relative form-group">
                            <input name="nomor" id="nomor" type="text" autocomplete='off' placeholder="NOMOR" class="form-control">
                        </div>

                        <div class="position-relative form-group">
                            <select name="tahun" id="tahun" class="form-control">
                                <option value="">TAHUN</option>
                                <?php
                                foreach ($tahun as $tampil) {
                                    $tahunTampil = $tampil['tahun'];
                                ?>
                                    <option value="<?php echo $tahunTampil ?>"><?php echo $tahunTampil ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="position-relative form-group">
                            <input name="tentang" id="tentang" type="text" autocomplete='off' placeholder="TENTANG" class="form-control">
                        </div>
                        <div class="mb-4 text-center">
                            <button type="submit" value="CARI" class="btn sqaure_bt" data-loading-text="Loading...">CARI</button>
                        </div>
                    </form>

                </div>


                <!-- <div class="">
                    <h3>FORM PENCARIAN</h3>
                </div>
                <form action="<?php echo base_url('Front/listBerita') ?>" method="get">
                    <div class="position-relative form-group">
                        <select name="bentuk" id="bentuk" class="form-control">
                            <option value="">BENTUK PRODUK HUKUM</option>
                        </select>
                    </div>
                    <div class="position-relative form-group">
                        <input name="nomor" id="nomor" type="text" autocomplete='off' placeholder="NOMOR" class="form-control">
                    </div>
                    <div class="position-relative form-group">
                        <select name="tahun" id="tahun" class="form-control">
                            <option value="">TAHUN</option>
                        </select>
                    </div>
                    <div class="position-relative form-group">
                        <input name="tentang" id="tentang" type="text" autocomplete='off' placeholder="TENTANG" class="form-control">
                    </div>
                </form> -->



            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right ">
                <div class="grey-light-bga shipping-cont mb-4">
                    <div class="heading-line h3-line">
                        <h3 style="text-transform: uppercase; padding:10px 0px;margin-bottom:0px !important">BENTUK PRODUK HUKUM</h3>
                    </div>
                    <div id="sidenav" class="mb-3">
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

                <div class="grey-light-bga shipping-cont">
                    <div class="heading-line h3-line">
                        <h3 style="text-transform: uppercase; padding:10px 0px;margin-bottom:0px !important">TAHUN PRODUK HUKUM</h3>
                    </div>
                    <table class="table table-striped" style="margin-bottom:0px;">
                        <tbody>
                            <?php
                            $noTahun = 0;
                            $indexTahun = 0;
                            foreach ($tahun as $tampil) {

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
                        <!-- <button type="submit" value="CARI" class="btn sqaure_bt" data-loading-text="Loading...">SELENGKAPNYA</button> -->
                        <a type="button" href="<?php echo site_url() ?>Front/tahun_peraturan/" class="btn sqaure_bt">SELENGKAPNYA</a>
                    </div>
                </div>
            </div>

        </div>
        <div class="row mt-6">
            <div class="col-md-12">
                <div class="table table-striped table-responsive">
                    <table id="tampil" class="table-bordered" style="width:100%">
                        <thead style="background:#039ee3; color:#fff">
                            <tr>
                                <td style="vertical-align: middle ;text-align:center">No</td>
                                <td style="vertical-align: middle ;text-align:center">Bentuk Produk Hukum</td>
                                <td style="vertical-align: middle ;text-align:center">No Peraturan</td>
                                <td style="vertical-align: middle ;text-align:center">Tahun</td>
                                <td style="vertical-align: middle ;text-align:center">Tentang</td>
                                <td style="vertical-align: middle ;text-align:center;width: 222px;">Selengkapnya</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($peraturan_daerah as $tampil) {
                                $no++;
                                $id = $tampil['id'];
                                $bentuk_hukum = $tampil['judul'];
                                $tahun = $tampil['tahun'];
                                $no_peraturan = $tampil['no_peraturan'];
                                $tentang = $tampil['tentang'];
                                $upload_dokumen = $tampil['upload_dokumen'];
                            ?>
                                <tr>
                                    <td style="text-align:center"><?php echo $no ?></td>
                                    <td><?php echo $bentuk_hukum ?></td>
                                    <td style="text-align:center"><?php echo $no_peraturan ?></td>
                                    <td style="text-align:center"><?php echo $tahun ?></td>
                                    <td><?php echo $tentang ?></td>
                                    <td>
                                        <a type="button" href="<?php echo site_url() ?>Front/download_peraturan/<?php echo $upload_dokumen ?>" style="padding-top: 7px; margin-right:5px" class=" a-kastem-a">Download</a>
                                        <a type="button" href="<?php echo site_url() ?>Front/view_peraturan_daerah/<?php echo $id ?>" style="padding-top: 7px;" class=" a-kastem-b">Detail</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end section -->