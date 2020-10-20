<?php 
// $this->general->testPre($dataLaporan) ?>
<div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Jam Masuk</h5>
                                <h2><span class="counter"><?php echo (empty(@$dataLaporan['laporan'][0]->masuk))?'00:00:00':@$dataLaporan['laporan'][0]->masuk ?></span> <span class="tuition-fees">WIB</span></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Terlambat</h5>
                                <h2><span class="counter"><?php echo (empty(@$dataLaporan['laporan'][0]->terlambat))?'00:00:00':@$dataLaporan['laporan'][0]->terlambat ?></span> <span class="tuition-fees"> Menit</span></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
                            <div class="analytics-content">
                                <h5>Pulang</h5>
                                <h2><span class="counter"><?php echo (empty(@$dataLaporan['laporan'][0]->keluar))?'00:00:00':@$dataLaporan['laporan'][0]->keluar; ?></span> <span class="tuition-fees">WIB</span></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
                            <div class="analytics-content">
                                <h5>PSW</h5>
                                <h2><span class="counter"><?php echo empty(@$dataLaporan['laporan'][0]->pulang_cepat)?'00:00:00':@$dataLaporan['laporan'][0]->pulang_cepat ?></span> <span class="tuition-fees">Menit</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- gambar foto -->
    

        <div class="library-book-area mg-t-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="single-cards-item">
                            <div class="single-product-image" style="text-align:center">
                                <a href="#"><img style="width:550px" src="<?php echo base_url('assets/template/img/product/profile-bg.jpg') ?>" alt=""></a>
                            </div>
                            <div class="single-product-text">
                                <img src="<?php echo base_url('assets/uploads/files') ?>/<?php echo $this->session->userdata('sipot_foto') ?>" alt="">
                                <h4><a class="cards-hd-dn" href="javascript:void(0)"><?php echo $this->session->userdata('sipot_nama') ?></a></h4>
                                <h5><?php echo @$this->session->userdata('nip') ?></h5>
                                <p class="ctn-cards">Uin Maulana Malik Ibrahim</p>
                                <a class="follow-cards" href="<?php echo site_url('staff/editProfile') ?>">Ubah Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		<div class="library-book-area mg-t-30">
            <div class="container-fluid">
                <div class="row">
					                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30 alert alert-danger">
                            <div class="analytics-content">
                                <h5>Sisa Cuti</h5>
                                <h2><span class="counter"><?php echo (empty($dataLaporan['sisa_cuti']->sisa))?0:@$dataLaporan['sisa_cuti']->sisa ?></span> <span class="tuition-fees">Hari</span></h2>
                            </div>
                        </div>
                    </div>
					<?php 
					$dataPresensi = array();
					foreach($dataLaporan['infoPresensi'] as $kInfo=>$vInfo){ ?>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30 alert alert-danger">
                            <div class="analytics-content">
                                <h5><?php echo $vInfo->nama ?></h5>
                                <h2><span class="counter"><?php echo $dataPresensi[]=(empty($vInfo->jumlah))? '0':$vInfo->jumlah ?></span> <span class="tuition-fees">Hari</span></h2>
                            </div>
                        </div>
                    </div>
					<?php } 
					$jadwal_aktif=$this->session->userdata('sipot_jadwal');
					$is_satpam = $this->lp->is_satpam($jadwal_aktif);
					$tahunIni = date('Y').'-01-01';
					$hariIni = date('Y-m-d');
					// $hariIni = '2020-01-10';
					$get_hari_masuk = $this->lp->getHariMasuk($tahunIni,$hariIni,$is_satpam);
					$total_hari_masuk = array_sum($dataPresensi);
					$total_hari_kerja=$get_hari_masuk;
									if(!$is_satpam){
					?>		
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30 alert alert-danger">
                            <div class="analytics-content">
                                <h5>Alpha</h5>
                                <h2><span class="counter"><?php echo @$total_hari_kerja-@$total_hari_masuk ?></span> <span class="tuition-fees">Hari</span></h2>
                            </div>
                        </div>
                    </div>	
					<?php }//jika satpam tidak usah tampil ?>
		           </div>
            </div>
        </div>
		
		
        <?php 
		// $this->general->testPre($dataLaporan); ?>
