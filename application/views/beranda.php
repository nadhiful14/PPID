<div class="analytics-sparkle-area">
    <div class="container-fluid">
        <div class="row">
            <div style="margin-top: 20px;">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line reso-mg-b-30">
                        <div class="analytics-content">
                            <h5>Total Articles</h5>
                            <h2><span class="counter"><?= $total_artikel ?></span> <span class="tuition-fees">Articles</span></h2>
                            <!-- <span class="text-success">20%</span>
                            <div class="progress m-b-0">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:20%;"> <span class="sr-only">20% Complete</span> </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line reso-mg-b-30">
                        <div class="analytics-content">
                            <h5>Total Anggota DPRD</h5>
                            <h2><span class="counter"><?= $total_anggota_dprd ?></span> <span class="tuition-fees">Anggota</span></h2>
                            <!-- <span class="text-danger">30%</span>
                            <div class="progress m-b-0">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:30%;"> <span class="sr-only">230% Complete</span> </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
                        <div class="analytics-content">
                            <h5>Total Permohonan Informasi</h5>
                            <h2><span class="counter"><?= $total_permohonan_informasi ?></span> <span class="tuition-fees">Data</span></h2>
                            <!-- <span class="text-info">60%</span>
                            <div class="progress m-b-0">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:60%;"> <span class="sr-only">20% Complete</span> </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
                        <div class="analytics-content">
                            <h5>Total Pengajuan Keberatan</h5>
                            <h2><span class="counter"><?= $total_pengajuan_keberatan ?></span> <span class="tuition-fees">Data</span></h2>
                            <!-- <span class="text-inverse">80%</span>
                            <div class="progress m-b-0">
                                <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:80%;"> <span class="sr-only">230% Complete</span> </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="product-sales-area ">
    <div class="container-fluid">
        <div class="row">
            <?php
            foreach ($last_article as $berita) {
                $judul = $berita['judul'];
                $jdl = strip_tags(str_word_count($judul) > 12 ? substr($judul, 0, 60) . "..." : $judul);
                $tanggal = $berita['tanggal'];
                $penulis = $berita['fullname'];
                $thumbnail = $berita['thumbnail'];
                $visitor = $berita['visitor'];
                // $kategori_id = $berita['nama'];
            ?>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mg-tb-30">
                    <div class="white-box">
                        <div style="color: #303030; margin-top: 0px;">
                            <h2 style="font-size: 16px;">Artikel terbaru</h2>
                        </div>
                        <div class="courses-title">
                            <img src="<?php echo base_url('assets/uploads/files/') . $thumbnail ?>" alt="">
                            <h2><?= $jdl ?></h2>
                        </div>
                        <div class="courses-alaltic">
                            <!-- <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-user"></i></span> <?= $penulis ?></span> -->
                            <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-clock-o"></i></span> <?php echo date(' d F Y ', strtotime($tanggal));  ?></span>
                            <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-eye"></i></span> <?= $visitor . ' View' ?> </span>
                        </div>
                        <div class="course-des">
                            <table style="line-height: 28px; width:100%">
                                <tr>
                                    <td><b>Author :</b></td>
                                    <td style="text-align:right"><?= $penulis ?></td>
                                </tr>
                                <tr>
                                    <td><b>Total Komentar :</b></td>
                                    <td style="text-align:right"><?= $komentar['jumlah'] . ' Komentar' ?></td>
                                </tr>
                            </table>
                            <!-- <p><span><i class="fa fa-clock"></i></span> <b>Author:</b> <?= $penulis ?></p>
                            <p><span><i class="fa fa-clock"></i></span> <b>Professor:</b> Jane Doe</p>
                            <p><span><i class="fa fa-clock"></i></span> <b>Students:</b> 100+</p> -->
                        </div>
                        <!-- <div class="product-buttons">
                            <button type="button" class="button-default cart-btn">Read More</button>
                        </div> -->
                    </div>
                </div>
            <?php } ?>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mg-tb-30">
                <div class="white-box">
                    <h3 class="box-title">Browser Status</h3>
                    <ul class="basic-list">
                        <li>Google Chrome <span class="pull-right label-danger label-1 label">95.8%</span></li>
                        <li>Mozila Firefox <span class="pull-right label-purple label-2 label">85.8%</span></li>
                        <li>Apple Safari <span class="pull-right label-success label-3 label">23.8%</span></li>
                        <li>Internet Explorer <span class="pull-right label-info label-4 label">55.8%</span></li>
                        <li>Opera mini <span class="pull-right label-warning label-5 label">28.8%</span></li>
                        <li>Mozila Firefox <span class="pull-right label-purple label-6 label">26.8%</span></li>
                        <li>Safari <span class="pull-right label-purple label-7 label">31.8%</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mg-tb-30">
                <div class="white-box">
                    <h3 class="box-title">Visits from countries</h3>
                    <ul class="country-state">
                        <li>
                            <h2><span class="counter">1250</span></h2> <small>From Australia</small>
                            <div class="pull-right">75% <i class="fa fa-level-up text-danger ctn-ic-1"></i></div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger ctn-vs-1" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:75%;"> <span class="sr-only">75% Complete</span></div>
                            </div>
                        </li>
                        <li>
                            <h2><span class="counter">1050</span></h2> <small>From USA</small>
                            <div class="pull-right">48% <i class="fa fa-level-up text-success ctn-ic-2"></i></div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-info ctn-vs-2" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:48%;"> <span class="sr-only">48% Complete</span></div>
                            </div>
                        </li>
                        <li>
                            <h2><span class="counter">6350</span></h2> <small>From Canada</small>
                            <div class="pull-right">55% <i class="fa fa-level-up text-success ctn-ic-3"></i></div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-success ctn-vs-3" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:55%;"> <span class="sr-only">55% Complete</span></div>
                            </div>
                        </li>
                        <li>
                            <h2><span class="counter">950</span></h2> <small>From India</small>
                            <div class="pull-right">33% <i class="fa fa-level-down text-success ctn-ic-4"></i></div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-success ctn-vs-4" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:33%;"> <span class="sr-only">33% Complete</span></div>
                            </div>
                        </li>
                        <li>
                            <h2><span class="counter">3250</span></h2> <small>From Bangladesh</small>
                            <div class="pull-right">60% <i class="fa fa-level-up text-success ctn-ic-5"></i></div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-inverse ctn-vs-5" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:60%;"> <span class="sr-only">60% Complete</span></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>