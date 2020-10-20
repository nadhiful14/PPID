<!-- end header -->
<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="title-holder">
            <div class="title-holder-cell text-left">
              <h1 class="page-title">Detail Berita</h1>
              <ol class="breadcrumb">
                <li><a href="<?php echo site_url() ?>">Home</a></li>
                <li><a href="<?php echo site_url('Front/listBerita');  ?>">List Berita</a></li>
                <?php
                $berita = $detail_berita;
                // foreach ($detail_berita as $berita) {
                $judul = $berita['judul'];
                ?>
                <li class="active">Detail Berita</li>
                <?php
                // }
                ?>
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


<div class="section padding_layout_1 blog_grid">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right">
        <div class="full">
          <?php
          $list_id = [];
          foreach ($tampil_berita as $key => $t) {
            $list_id[$key]['slug'] = $t['slug'];
            $list_id[$key]['thumbnail'] = $t['thumbnail'];
            // array_push($list_id, $t['slug']);
          }
          // $this->general->testPre($list_id);
          ?>
          <?php
          //foreach ($detail_berita as $berita) {

          $id = $berita['id'];
          $judul = $berita['judul'];
          $slug = $berita['slug'];
          $isi = $berita['isi'];
          $tanggal = $berita['tanggal'];
          $penulis = $berita['fullname'];
          $thumbnail = $berita['thumbnail'];
          $kategori_id = $berita['nama'];
          $username = $berita['fullname'];
          ?>
          <div class="blog_section margin_bottom_0">
            <div class="blog_feature_img"> <img class="img-responsive" src="<?php echo base_url('assets/uploads/files/') . $thumbnail ?>" alt="#"> </div>
            <div class="blog_feature_cantant">
              <p class="blog_head"><?= $judul ?></p>
              <div style="margin-bottom: 80px;">
                <div class="post_info">
                  <ul>
                    <li><i class="fa fa-tag" aria-hidden="true"></i> <?php echo $kategori_id; ?></li>
                    <li><i class="fa fa-user" aria-hidden="true"></i> <?php echo $username; ?></li>
                    <li><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo date('l, d F Y, H:i', strtotime($tanggal));  ?></li>
                  </ul>
                </div>
              </div>
              <div style="text-align: justify; " class="padd">
                <?= $isi ?>
              </div>
            </div>


            <div class="bottom_info margin_bottom_30_all">
              <div class="pull-right">
                <div class="shr">Share: </div>
                <div class="social_icon">
                  <ul>
                    <li class="fb"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li class="twi"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li class="gp"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    <li class="pint"><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>

            <?php

            $key = array_search($slug, array_column($list_id, 'slug'));
            $max = count($list_id) - 1;
            $ono_next = false;
            $ono_pref = false;
            if ($max == $key) {
              $ono_pref = true;
              $keyNex = $key - 1;
              $prev = $list_id[$keyNex]['slug'];
              $img_prev = $list_id[$keyNex]['thumbnail'];
              //posisi paling akhir => dia gak no next
            } else if ($key == 0) {
              $ono_next = true;
              $keyNex = $key + 1;
              $next = $list_id[$keyNex]['slug'];
              $img_next = $list_id[$keyNex]['thumbnail'];
              //posisi paling awal => dia gak no pref
            } else {
              //poisisi ditengah2
              $ono_next = true;
              $ono_pref = true;
              $keyPref = $key - 1;
              $prev = $list_id[$keyPref]['slug'];

              $keyNex = $key + 1;
              $next = $list_id[$keyNex]['slug'];
              $img_prev = $list_id[$keyPref]['thumbnail'];
              $img_next = $list_id[$keyNex]['thumbnail'];
            }
            ?>

            <div class="comment_section">
              <?php if ($ono_pref) : ?>
                <div class="pull-left text_align_left">
                  <div class="full">
                    <div class="preview_commt"> <a class="comment_cantrol preview_commat" href="<?php echo site_url('/Front/detailBerita/') . $prev ?>"> <img class="img-responsive" src="<?php echo base_url('assets/uploads/files/') . $img_prev ?>" alt="#"> <span><i class="fa fa-angle-left"></i> Previous</span> </a> </div>
                  </div>
                </div>
              <?php endif; ?>


              <?php if ($ono_next) : ?>
                <div class="pull-right text_align_right">
                  <div class="full">
                    <div class="next_commt"> <a class="comment_cantrol preview_commat" href="<?php echo site_url('/Front/detailBerita/') . $next ?>"> <img class="img-responsive" src="<?php echo base_url('assets/uploads/files/') . $img_next ?>" alt="#"> <span>Next <i class="fa fa-angle-right"></i></span> </a> </div>
                  </div>
                </div>
              <?php endif; ?>
            </div>
            <?php
            //}

            ?>
            <?php
            foreach ($komentar as $komen) {
              $id = $komen['id'];
              $nama = $komen['nama'];
              $email = $komen['email'];
              $id_berita = $komen['id_berita'];
              $komentar = $komen['komentar'];
              $tanggal = $komen['tanggal'];

            ?>
              <div class="view_commant">
                <!-- <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                  <div class="full"> <img class="img-responsive" style="max-width:100px" src="images/it_service/client1.png" alt="#"> </div>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                  <div class="full theme_bg white_fonts command_cont">
                    <p class="comm_head">Christian Perez <span>April 27,2018</span><a class="rply" href="it_blog_detail.html">Reply</a></p>
                    <p>magine you are 10 years into the future but this time it’s different. Why? Because starting today you actually
                      begin making changes in your life. Specific intentional changes are not easy. They are intentional because these
                      changes are changes that you are choosing and they are the changes that will cause you to live the life you want
                      to live and dream. </p>
                  </div>
                  <div class="full">
                    <div class="row">
                      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                        <div class="full"> <img class="img-responsive" style="max-width:100px" src="images/it_service/client2.png" alt="#"> </div>
                      </div>
                      <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                        <div class="full command_cont margin_bottom_0">
                          <p class="comm_head">Christian Perez <span>April 27,2018</span><a class="rply" href="it_blog_detail.html">Reply</a></p>
                          <p>magine you are 10 years into the future but this time it’s different. Why? Because starting today you actually
                            begin making changes in your life. Specific intentional changes are not easy. They are
                            intentional because these changes are changes. </p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                        <div class="full"> <img class="img-responsive" style="max-width:100px" src="images/it_service/client3.png" alt="#"> </div>
                      </div>
                      <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                        <div class="full command_cont">
                          <p class="comm_head">Christian Perez <span>April 27,2018</span><a class="rply" href="it_blog_detail.html">Reply</a></p>
                          <p>magine you are 10 years into the future but this time it’s different. Why? Because starting today you actually
                            begin making changes in your life. Specific intentional changes are not easy. They are
                            intentional because these changes are changes. </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->

                <div class="row">
                  <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                    <div class="full"> <img class="img-responsive img-lingkaran" style="max-width:100px" src="<?php echo base_url('assets/uploads/files/') ?>userKomen.jpg" alt="#"> </div>
                  </div>
                  <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                    <div class="full theme_bg white_fonts command_cont">

                      <p class="comm_head"><?php echo $nama ?> <span><?php echo date('d F Y', strtotime($tanggal));  ?></span></p>
                      <p><?php echo $komentar ?></p>

                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>


            <div class="post_commt_form">
              <h4>TINGGALKAN KOMENTAR</h4>
              <div class="form_section">
                <?php echo form_open_multipart('Front/add_komentar') ?>
                <div class="row">
                  <?php
                  // foreach ($detail_berita as $berita) {
                  $id = $berita['id'];
                  $slug = $berita['slug'];
                  ?>
                  <input autocomplete="off" placeholder="id" type="hidden" value="<?php echo $slug ?>" name="id_berita" id="id_berita" required>
                  <?php
                  // }
                  ?>
                  <div class="field col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <input class="field_custom" autocomplete="off" placeholder="Nama" type="text" name="nama" id="nama" required>
                  </div>
                  <div class="field col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <input class="field_custom" placeholder="Email" type="email" name="email" id="email" autocomplete="off" required>
                  </div>
                  <div class="field col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <textarea class="field_custom" placeholder="Komentar" name="komentar" id="komentar" required></textarea>
                  </div>
                  <div class="center">
                    <button class="btn main_bt">KIRIM KOMENTAR</button>
                  </div>
                </div>
                <?php echo form_close(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>



      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-left">
        <div class="side_bar">
          <div class="side_bar_blog">
            <h4>SEARCH</h4>
            <div class="side_bar_search">
              <div class="input-group stylish-input-group">
                <input class="form-control" placeholder="Search" type="text">
                <span class="input-group-addon">
                  <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </span> </div>
            </div>
          </div>
          <div class="side_bar_blog">
            <?php
            // foreach ($detail_berita as $berita) {
            $deskripsi = $berita['deskripsi'];
            ?>
            <h4>ABOUT AUTHOR</h4>
            <p><?php echo $deskripsi; ?></p>
            <?php
            // }
            ?>
          </div>
          <div class="side_bar_blog">
            <h4>RECENT POST</h4>
            <div class="recent_post">
              <?php
              foreach ($recent_berita as $berita) {
                $judul = $berita['judul'];
                $slug = $berita['slug'];
                $tanggal = $berita['tanggal'];
                $thumbnail = $berita['thumbnail'];
              ?>
                <div class="row">
                  <div class="col-md-4">
                    <div class="blog_feature_img mt-1"> <a href="<?php echo site_url('Front/detailBerita/') . $slug ?>"><img class="img-responsive img-opacity" src="<?php echo base_url('assets/uploads/files/') . $thumbnail ?>" alt="#"> </a></div>
                  </div>
                  <div class="col-md-8">
                    <ul>
                      <li>
                        <p class="post_head" style="text-align: justify;"><a class="teks-hover-biru" href="<?php echo site_url('Front/detailBerita/') . $slug ?>"><?= $judul ?></a></p>
                        <p class="post_date"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo date('l, d F Y', strtotime($tanggal));  ?></p>
                      </li>
                    </ul>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
          <div class="side_bar_blog">
            <h4>CATEGORIES</h4>
            <div class="categary">
              <ul>
                <?php
                foreach ($tampil_kategori as $kategori) {
                  $nama = $kategori['nama'];
                  $slug = $kategori['slug'];
                ?>
                  <li><a href="<?php echo site_url('Front/list_kategori/') . $slug ?>"><i class="fa fa-caret-right"></i> <?= $nama ?></a></li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <div class="side_bar_blog">
            <h4>TAG</h4>
            <div class="tags">
              <ul>
                <?php
                // foreach ($detail_berita as $berita) {
                $berita = $detail_berita;
                $kategori_id = $berita['nama'];
                $tag = $berita['tag'];
                $tagi = explode(",", $tag);
                foreach ($tagi as $t) {
                ?>
                  <li><a href="#"><?php echo $t ?></a></li>
                <?php }
                // }
                ?>
              </ul>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<!-- end section -->