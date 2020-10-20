<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="breadcome-list">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="breadcome-heading">
                        <h4><b>Selamat Datang <?php echo $this->session->userdata('skpi_admin_nama') ?></b></h4>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-left">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- bagian atas -->
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="analytics-sparkle-line reso-mg-b-30">
            <div class="analytics-content">
                <h5>Pengajuan Hari Ini</h5>
                <h2><span class="counter"><?php echo (empty($hariIni)) ? 0 : $hariIni ?></span> <span class="tuition-fees">Pengajuan</span></h2>
                <span class="text-success"><?php echo $jumlahHariIni = (empty($hariIni)) ? 0 : round($hariIni / $jumlahMhsAktif, 3) ?>%</span>
                <div class="progress m-b-0">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $jumlahHariIni ?>%;"> <span class="sr-only">10% Complete</span> </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="analytics-sparkle-line reso-mg-b-30">
            <div class="analytics-content">
                <h5>Pengajuan Bulan Ini</h5>
                <h2><span class="counter"><?php echo (empty($bulanIni)) ? 0 : $bulanIni ?></span> <span class="tuition-fees">Pengajuan</span></h2>
                <span class="text-danger"><?php echo $jumlahBulanIni = (empty($bulanIni)) ? 0 : round($bulanIni / $jumlahMhsAktif, 3) ?>%</span>
                <div class="progress m-b-0">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $jumlahBulanIni ?>%;"> <span class="sr-only">230% Complete</span> </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
            <div class="analytics-content">
                <h5>Pengajuan Tahun Ini</h5>
                <h2><span class="counter"><?php echo (empty($tahunIni)) ? 0 : $tahunIni ?></span> <span class="tuition-fees">Pengajuan</span></h2>
                <span class="text-info"><?php echo $jumlahTahunIni = (empty($tahunIni)) ? 0 : round($tahunIni / $jumlahMhsAktif, 3) ?>%</span>
                <div class="progress m-b-0">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?php $jumlahTahunIni ?>%;"> <span class="sr-only">20% Complete</span> </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
            <div class="analytics-content">
                <h5>Pengajuan Tahun Lalu</h5>
                <h2><span class="counter"><?php echo (empty($tahunLalu)) ? 0 : $tahunLalu ?></span> <span class="tuition-fees">Pengajuan</span></h2>
                <span class="text-inverse"><?php echo $jumlahTahunLalu = (empty($tahunLalu)) ? 0 : round($tahunLalu / $jumlahMhsAktif, 3) ?>%</span>
                <div class="progress m-b-0">
                    <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $jumlahTahunLalu ?>%;"> <span class="sr-only">230% Complete</span> </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- grafik  -->
<div class="product-sales-area mg-tb-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="product-sales-chart">
                    <div class="portlet-title">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="caption pro-sl-hd">
                                    <span class="caption-subject"><b>SKPI Tiap Bulan</b></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="actions graph-rp graph-rp-dl">
                                    <p>Data Yang Telah Diverifikasi Pada Tahun Berjalan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="list-inline cus-product-sl-rp">
                        <li>
                            <h5><i class="fa fa-circle" style="color: #006DF0;"></i>Prestasi</h5>
                        </li>
                        <li>
                            <h5><i class="fa fa-circle" style="color: #933EC5;"></i>Organisasi</h5>
                        </li>
                        <li>
                            <h5><i class="fa fa-circle" style="color: #65b12d;"></i>Sertifikat</h5>
                        </li>
                        <li>
                            <h5><i class="fa fa-circle" style="color: #F54019;"></i>Magang</h5>
                        </li>
                    </ul>

                    <div id="grafik-skpi" style="height: 356px;"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 res-mg-t-30 table-mg-t-pro-n tb-sm-res-d-n dk-res-t-d-n">
                    <h3 class="box-title">Total Prestasi</h3>
                    <ul class="list-inline two-part-sp">
                        <li>
                            <div id="sparklinedash"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas></div>
                        </li>
                        <li class="text-right sp-cn-r"><span class="counter text-success"><?php echo (empty($dataTiapJenis[1])) ? 0 : $dataTiapJenis[1] ?></span></li>
                    </ul>
                </div>
                <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 tb-sm-res-d-n dk-res-t-d-n">
                    <h3 class="box-title">Total Organisasi</h3>
                    <ul class="list-inline two-part-sp">
                        <li>
                            <div id="sparklinedash2"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas></div>
                        </li>
                        <li class="text-right graph-two-ctn"><span class="counter text-purple"><?php echo (empty($dataTiapJenis[2])) ? 0 : $dataTiapJenis[2] ?></span></li>
                    </ul>
                </div>
                <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 tb-sm-res-d-n dk-res-t-d-n">
                    <h3 class="box-title">Total Sertifikat</h3>
                    <ul class="list-inline two-part-sp">
                        <li>
                            <div id="sparklinedash3"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas></div>
                        </li>
                        <li class="text-right graph-three-ctn"><span class="counter text-info"><?php echo (empty($dataTiapJenis[3])) ? 0 : $dataTiapJenis[3] ?></span></li>
                    </ul>
                </div>
                <div class="white-box analytics-info-cs table-dis-n-pro tb-sm-res-d-n dk-res-t-d-n">
                    <h3 class="box-title">Total Magang</h3>
                    <ul class="list-inline two-part-sp">
                        <li>
                            <div id="sparklinedash4"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas></div>
                        </li>
                        <li class="text-right graph-four-ctn"> <span class="text-danger"><span class="counter"><?php echo (empty($dataTiapJenis[4])) ? 0 : $dataTiapJenis[4] ?></span></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php //$this->general->testPre($dataGrafik); 
?>
<script>
    $(function() {
        const months = ["", "Jan", "Feb", "Mar", "Apr", "May", "Jun",
            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
        ];
        Morris.Area({
            element: 'grafik-skpi',
            data: [
                <?php for ($i = 1; $i <= 12; $i++) {
                    $bulanIni = substr("0" . $i, -2);
                    $periode = $this->general->konversiBulanKeNama($bulanIni);
                    $periode = date('Y') . "-" . $bulanIni;
                    //jika array kosong semua
                    if (empty($dataGrafik[$bulanIni])) {
                        $prestasi = '0';
                        $organisasi = '0';
                        $sertifikat = '0';
                        $magang = '0';
                    } else {
                        $prestasi = (empty($dataGrafik[$bulanIni][1])) ? '0' : $dataGrafik[$bulanIni][1];
                        $organisasi = (empty($dataGrafik[$bulanIni][2])) ? '0' : $dataGrafik[$bulanIni][2];
                        $sertifikat = (empty($dataGrafik[$bulanIni][3])) ? '0' : $dataGrafik[$bulanIni][3];
                        $magang = (empty($dataGrafik[$bulanIni][4])) ? '0' : $dataGrafik[$bulanIni][4];
                    }
                ?> {
                        period: '<?php echo $periode ?>',
                        Prestasi: <?php echo $prestasi ?>,
                        Organisasi: <?php echo $organisasi ?>,
                        Sertifikat: <?php echo $sertifikat ?>,
                        Magang: <?php echo $magang ?>
                    },
                <?php } ?>

            ],
            xkey: 'period',
            ykeys: ['Prestasi', 'Organisasi', 'Sertifikat', 'Magang'],
            labels: ['Prestasi', 'Organisasi', 'Sertifikat', 'Magang'],
            xLabelFormat: function(x) {
                // var index = parseInt(x.src.y);
                // return monthNames[index];
                return months[x.getMonth()];
            },
            pointSize: 3,
            fillOpacity: 0,
            pointStrokeColors: ['#006DF0', '#933EC5', '#65b12d', '#F54019'],
            behaveLikeLine: true,
            gridLineColor: '#e0e0e0',
            lineWidth: 1,
            hideHover: 'auto',
            lineColors: ['#006DF0', '#933EC5', '#65b12d', '#F54019'],
            resize: true

        });
    });
</script>