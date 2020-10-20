<?php if(!empty($notifPengembalian)){ ?>
<!-- <li class="nav-item dropdown pesan-notif"> -->
    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-bell edu-chat-pro" aria-hidden="true"></i><span class="indicator-ms"></span></a>
    <div role="menu" class="author-message-top dropdown-menu animated zoomIn">
        <div class="message-single-top">
            <h1 style="margin-left: 18px;text-align:left !important;font-size: 14px;font-weight: bold;display: block;">Pengembalian Pengajuan SKPI</h1>
        </div>
        <ul class="message-menu" style="margin-top:0px !important;overflow:auto;">
        <?php  
            foreach($notifPengembalian as $key=>$val){
                $jenis = $val->jenis_id;
                //gen gambar
                if($jenis==1){
                    $gambar = 'prestasi.png';
                }else if($jenis==2){
                    $gambar = 'organisasi.png';
                }else if($jenis==3){
                    $gambar = 'sertifikat.png';
                }else{
                    $gambar = 'magang.png';
                }
                ?>
            <li style="width:100% !important">
                <a href="javascript:void(0)" onclick="emodal('<?php echo site_url('admin/notif_skpi/'.$val->id) ?>','SKPI Pengembalian')" >
                    <div class="message-img">
                        <img src="<?php echo base_url('assets/template/img') ?>/notification/<?php echo @$gambar ?>" width="130px" alt="">
                    </div>
                    <div class="message-content">
                        <span class="message-date"><?php echo substr($val->tgl_isi_saja,-5) ?></span>
                        <h2><?PHP echo @$val->nama_mhs ?></h2>
                        <p><?php echo substr($val->nama_task,0,50) ?> </p>
                    </div>
                </a>
            </li>
        <?php 
        }//end foreach
    ?>

        </ul>
        <!-- <div class="message-view">
                                                            <a href="#"></a>
                                                        </div> -->
    </div>
<!-- </li> -->
    <?php } ?>