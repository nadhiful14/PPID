<!-- end header -->
<!-- section -->
<div id="slider" class="section main_slider">
  <div class="container-fuild">
    <div class="row">
      <div id="rev_slider_4_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="classicslider1" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
        <!-- START REVOLUTION SLIDER 5.0.7 auto mode -->
        <div id="rev_slider_4_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.0.7">
          <ul>
            <?php foreach ($master_image_slider as $gambar) {
              $judul_slider = $gambar['judul'];
              $gambar_slider = $gambar['gambar'];
              $sub_judul = $gambar['sub_judul'];



            ?>

              <li data-index="rs-<?php echo rand(1, 1000) ?>" data-transition="zoomin" data-slotamount="7" data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000" data-thumb="<?php echo base_url('assets/uploads/files/') . $gambar_slider ?>" data-rotate="0" data-saveperformance="off" data-title="<?php echo $judul_slider ?>" data-description="">
                <!-- MAIN IMAGE -->
                <img src="<?php echo base_url('assets/uploads/files/') . $gambar_slider ?>" alt="#" data-bgposition="center center" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                <!-- LAYERS -->
                <!-- LAYER NR. BG -->
                <div class="tp-caption tp-shape tp-shapewrapper   rs-parallaxlevel-0" id="slide-270-layer-<?php echo rand(1, 1000) ?>" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-width="full" data-height="full" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;" data-transform_out="s:300;s:300;" data-start="750" data-basealign="slide" data-responsive_offset="on" data-responsive="off" style="z-index: 5;background-color:rgba(0, 0, 0, 0.25);border-color:rgba(0, 0, 0, 0.50);"> </div>
                <!-- LAYER NR. 1 -->
                <div class="tp-caption tp-shape tp-shapewrapper   tp-resizeme rs-parallaxlevel-0" id="slide-18-layer-<?php echo rand(1, 1000) ?>" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['15','15','15','15']" data-width="500" data-height="140" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power4.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_in="x:0px;y:0px;" data-mask_out="x:inherit;y:inherit;" data-start="2000" data-responsive_offset="on" style="z-index: 5;background-color:rgba(29, 29, 29, 0.85);border-color:rgba(0, 0, 0, 0.50);"> </div>
                <!-- LAYER NR. 2 -->
                <div class="tp-caption NotGeneric-Title   tp-resizeme rs-parallaxlevel-0" id="slide-18-layer-<?php echo rand(1, 1000) ?>" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-fontsize="['70','70','70','35']" data-lineheight="['70','70','70','50']" data-width="none" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="y:[-100%];z:0;rZ:35deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="1000" data-splitin="chars" data-splitout="none" data-responsive_offset="on" data-elementdelay="0.05" style="z-index: 6; white-space: nowrap;"><?php echo $judul_slider ?> </div>
                <!-- LAYER NR. 3 -->
                <div class="tp-caption NotGeneric-SubTitle   tp-resizeme rs-parallaxlevel-0" id="slide-18-layer-<?php echo rand(1, 1000) ?>" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['52','51','51','31']" data-width="none" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="1500" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="z-index: 7; white-space: nowrap;"><?php echo $sub_judul ?></div>
              </li>

            <?php } ?>






          </ul>
          <div class="tp-static-layers"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end section -->

<!-- section -->
<div class="section padding_layout_1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="main_heading text_align_center">
            <h2>JOIN WITH US</h2>
            <p class="large">DPRD Kabupaten Blitar</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row" style="margin-bottom: 75px !important;">
      <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
        <div class="full text_align_center margin_bottom_30">
          <div class="center">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 center">
              <div class="ih-item circle effect1"><a href="<?php echo $facebook['link_sosial_media']; ?>">
                  <div class="spinner"></div>
                  <div class="img"><img src="<?php echo base_url() ?>assets/uploads/files/fbb.png" alt="img"></div>
                  <div class="info">
                    <div class="info-back">
                      <h3>Akun Facebook</h3>
                      <p><?php echo $facebook['akun']; ?></p>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <h4 class="theme_color">Facebook</h4>
          <p>Gabung bersama media sosial kami! Silakan klik Facebook di atas untuk mengikuti akun sosial media Facebook DPRD Kabupaten Blitar</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
        <div class="full text_align_center margin_bottom_30">
          <div class="center">
            <div class="ih-item circle effect1 "><a href="<?php echo $instagram['link_sosial_media']; ?>">
                <div class="spinner "></div>
                <div class="img"><img src="<?php echo base_url() ?>assets/uploads/files/ins.png" alt="img"></div>
                <div class="info">
                  <div class="info-back">
                    <h3>Akun Instagram</h3>
                    <p><?php echo $instagram['akun']; ?></p>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <h4 class="theme_color">Instagram</h4>
          <p>Gabung bersama media sosial kami! Silakan klik Instagram di atas untuk mengikuti akun sosial media Instagram DPRD Kabupaten Blitar</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
        <div class="full text_align_center margin_bottom_30">
          <div class="center">
            <div class="ih-item circle effect1 "><a href="<?php echo $twitter['link_sosial_media']; ?>">
                <div class="spinner "></div>
                <div class="img"><img src="<?php echo base_url() ?>assets/uploads/files/aaaa.png" alt="img"></div>
                <div class="info">
                  <div class="info-back">
                    <h3>Akun Twitter</h3>
                    <p><?php echo $twitter['akun']; ?></p>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <h4 class="theme_color">Twitter</h4>
          <p>Gabung bersama media sosial kami! Silakan klik Twitter di atas untuk mengikuti akun sosial media Twitter DPRD Kabupaten Blitar</p>
        </div>
      </div>
    </div>
    <!-- <div class="row" style="margin-top: 35px">
      <div class="col-md-8">
        <div class="full margin_bottom_30">
          <div class="accordion border_circle">
            <div class="bs-example">
              <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><i class="fa fa-bar-chart" aria-hidden="true"></i> Complete Recovery from Local & External Drive<i class="fa fa-angle-down"></i></a> </p>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it
                        over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words,
                        consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. </p>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><i class="fa fa-plane"></i> Recovery Photo, Image, Video and Audio<i class="fa fa-angle-down"></i></a> </p>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it
                        over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words,
                        consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. </p>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><i class="fa fa-star"></i> Mobile Phone Recovery<i class="fa fa-angle-down"></i></a> </p>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it
                        over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words,
                        consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. </p>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><i class="fa fa-bar-chart" aria-hidden="true"></i> Complete Recovery from Local & External Drive<i class="fa fa-angle-down"></i></a> </p>
                  </div>
                  <div id="collapseFour" class="panel-collapse collapse in">
                    <div class="panel-body">
                      <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it
                        over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words,
                        consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="full" style="margin-top: 35px;">
          <h3>Need file recovery?</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et
            quasi architecto beatae vitae dicta sunt explicabo.. </p>
          <p><a class="btn main_bt" href="<?php echo base_url('assets/front') ?>/#">Read More</a></p>
        </div>
      </div>
    </div> -->
  </div>
</div>
<!-- end section -->
<!-- section -->
<div class="section padding_layout_1 light_silver gross_layout">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="main_heading text_align_left">
            <h2>INFORMASI PUBLIK</h2>
            <!-- <p class="large">Easy and effective way to get your device repaired.</p> -->
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <div class="row">

          <div class="col-lg-4 col-md-6 col-sm-6 card-hv">
            <a href="<?php echo site_url() ?>Front/informasi_berkala">
              <div class="full">
                <div class="service_blog_inner">
                  <div class="icon text_align_left"><img src="<?php echo base_url('assets/front') ?>/images/it_service/si1.png" alt="#" /></div>
                  <h4 class="service-heading">INFORMASI BERKALA</h4>
                  <p>Informasi Publik Berkala yang disediakan oleh PPID Dinas PUSDATARU Provinsi Jawa Timur</p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6 card-hv">
            <a href="<?php echo site_url() ?>Front/informasi_serta_merta">
              <div class="full">
                <div class="service_blog_inner">
                  <div class="icon text_align_left"><img src="<?php echo base_url('assets/front') ?>/images/it_service/si2.png" alt="#" /></div>
                  <h4 class="service-heading">INFORMASI SERTA MERTA</h4>
                  <p>Informasi Publik Serta Merta yang disediakan oleh PPID Dinas PUSDATARU Provinsi Jawa Timur</p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6 card-hv">
            <a href="<?php echo site_url() ?>Front/informasi_setiap_saat">
              <div class="full">
                <div class="service_blog_inner">
                  <div class="icon text_align_left"><img src="<?php echo base_url('assets/front') ?>/images/it_service/si3.png" alt="#" /></div>
                  <h4 class="service-heading">INFORMASI SETIAP SAAT</h4>
                  <p>Informasi Publik setiap saat yang disediakan oleh PPID Dinas PUSDATARU Provinsi Jawa Timur</p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6 card-hv">
            <a href="<?php echo site_url() ?>Front/informasi_dikecualikan">
              <div class="full">
                <div class="service_blog_inner">
                  <div class="icon text_align_left"><img src="<?php echo base_url('assets/front') ?>/images/it_service/si4.png" alt="#" /></div>
                  <h4 class="service-heading">INFORMASI DIKECUALIKAN</h4>
                  <p>Informasi Publik Dikecualikan yang ditetapkan oleh PPID Dinas PUSDATARU Provinsi Jawa Timur</p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6 card-hv">
            <a href="<?php echo site_url() ?>Front/formulir_permohonan_online">
              <div class="full">
                <div class="service_blog_inner">
                  <div class="icon text_align_left"><img src="<?php echo base_url('assets/front') ?>/images/it_service/si5.png" alt="#" /></div>
                  <h4 class="service-heading">FORM PERMOHONAN</h4>
                  <p>Download Form Permohonan Informasi (Online) yang disediakan oleh PPID Dinas PUSDATARU Provinsi Jawa Timur</p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6 card-hv">
            <a href="<?php echo site_url() ?>Front/formulirOffline">
              <div class="full">
                <div class="service_blog_inner">
                  <div class="icon text_align_left"><img src="<?php echo base_url('assets/front') ?>/images/it_service/si6.png" alt="#" /></div>
                  <h4 class="service-heading">FORM PERMOHONAN</h4>
                  <p>Download Form Permohonan Informasi (Offline) yang disediakan oleh PPID Dinas PUSDATARU Provinsi Jawa Timur</p>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end section -->
<!-- <div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
</div> -->

<!-- section -->
<div class="section padding_layout_1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="text_align_left">
            <h2 style="float: left; padding-bottom: 15px; margin-bottom: 40px; border-bottom: 5px #039ee3 solid;">Popular Post</h2>
            <a style="float: right;" class="btn sqaure_bt" href="<?php echo site_url() ?>Front/popular">View All</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <?php

      // $this->general->testPre($tampil_berita);

      foreach ($tampil_berita_popular as $berita) {
        $judul = $berita['judul'];
        $slug = $berita['slug'];
        $isi = $berita['isi'];
        $brt = (str_word_count($isi) > 60 ? substr($isi, 0, 250) . "[..]" : $isi);
        $tanggal = $berita['tanggal'];
        $penulis = $berita['fullname'];
        $thumbnail = $berita['thumbnail'];
        $kategori_id = $berita['nama'];
      ?>

        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 margin_bottom_30_all">
          <div class="product_list">
            <div class="product_img"> <img class="img-responsive img-opacity image-thumbn" src="<?php echo base_url('assets/uploads/files/') . $thumbnail ?>" alt="#" /> </div>
            <div class="product_detail_btm">
              <div class="center">
                <h4><a class="teks-hover-biru" href="<?php echo site_url() ?>/Front/detailBerita/<?php echo $slug ?>"><?= $judul ?></a></h4>
              </div>
              <div class="starratin">
                <div class="center"> <i aria-hidden="true" style="color: black;">Baca Lebih...</i> </div>
              </div>
              <div class="product_price margin_bottom_30_all">
                <p><span><?php echo date('l, d F Y, H:i', strtotime($tanggal));  ?></span></p>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>

    </div>
  </div>
</div>
<!-- end section -->
<!-- section -->
<div class="section padding_layout_1 light_silver gross_layout right_gross_layout">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="main_heading text_align_right">
            <h2>Our Feedback</h2>
            <p class="large">Easy and effective way to get your device repaired.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row counter">
      <div class="col-md-4"> </div>
      <div class="col-md-8">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin_bottom_50">
            <div class="text_align_right"><i class="fa fa-smile-o"></i></div>
            <div class="text_align_right">
              <p class="counter-heading text_align_right">Happy Customers</p>
            </div>
            <h5 class="counter-count">2150</h5>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin_bottom_50">
            <div class="text_align_right"><i class="fa fa-laptop"></i></div>
            <div class="text_align_right">
              <p class="counter-heading text_align_right">Laptop Repaired</p>
            </div>
            <h5 class="counter-count">1280</h5>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin_bottom_50">
            <div class="text_align_right"><i class="fa fa-desktop"></i></div>
            <div class="text_align_right">
              <p class="counter-heading">Computer Repaired</p>
            </div>
            <h5 class="counter-count">848</h5>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin_bottom_50">
            <div class="text_align_right"><i class="fa fa-windows"></i></div>
            <div class="text_align_right">
              <p class="counter-heading">OS Installed</p>
            </div>
            <h5 class="counter-count">450</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end section -->
<!-- section -->
<div class="section padding_layout_1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="text_align_left">
            <h2 style="float: left; padding-bottom: 15px; margin-bottom: 40px; border-bottom: 5px #039ee3 solid;">Recent Post</h2>
            <a style="float: right" class="btn sqaure_bt" href="<?php echo site_url() ?>Front/listBerita">View All</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <?php

      // $this->general->testPre($tampil_berita);

      foreach ($tampil_berita as $berita) {
        $judul = $berita['judul'];
        $slug = $berita['slug'];
        $isi = $berita['isi'];
        $brt = strip_tags(str_word_count($isi) > 60 ? substr($isi, 0, 250) . "[..]" : $isi);
        $tanggal = $berita['tanggal'];
        $penulis = $berita['fullname'];
        $thumbnail = $berita['thumbnail'];
        $kategori_id = $berita['nama'];
      ?>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">

          <div class="full blog_colum">
            <div class="blog_feature_img">
              <a href="<?php echo site_url() ?>/Front/detailBerita/<?php echo $slug ?>"><img class="img-responsive img-opacity image-thumb" src="<?php echo base_url('assets/uploads/files/') . $thumbnail ?>" alt="#" /></a>
            </div>
            <div class="post_time">
              <p><i class="fa fa-clock-o"></i> <?php echo date('l, d F Y, H:i', strtotime($tanggal));  ?></p>
            </div>
            <div class="blog_feature_head">
              <h4 style="text-align: justify;"><a class="teks-hover-biru" href="<?php echo site_url() ?>/Front/detailBerita/<?php echo $slug ?>"><?= $judul ?></a></h4>
            </div>
            <div class="blog_feature_cont" style="text-align: justify !important;">
              <p><?php echo ($brt) ?></p>
              <!--  <p>Lorem ipsum dolor sit amet, consectetur quam justo, pretium adipiscing elit. Vestibulum quam justo, pretium eu tempus ut, ...</p> -->

            </div>
          </div>

        </div>
      <?php } ?>
    </div>






  </div>
</div>
</div>
<!-- end section -->