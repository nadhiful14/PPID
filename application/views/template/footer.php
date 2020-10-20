<!-- section -->
<div class="section padding_layout_1 testmonial_section white_fonts">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="main_heading text_align_left">
            <h2 style="text-transform: none;">What Clients Say?</h2>
            <p class="large">Here are testimonials from clients..</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-7">
        <div class="full">
          <div id="testimonial_slider" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ul class="carousel-indicators">
              <li data-target="#testimonial_slider" data-slide-to="0" class="active"></li>
              <li data-target="#testimonial_slider" data-slide-to="1"></li>
              <li data-target="#testimonial_slider" data-slide-to="2"></li>
            </ul>
            <!-- The slideshow -->
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="testimonial-container">
                  <div class="testimonial-content"> You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first.
                    I am really satisfied with my first laptop service. </div>
                  <div class="testimonial-photo"> <img src="<?php echo base_url('assets/front') ?>/images/it_service/client1.jpg" class="img-responsive" alt="#" width="150" height="150"> </div>
                  <div class="testimonial-meta">
                    <h4>Maria Anderson</h4>
                    <span class="testimonial-position">CFO, Tech NY</span>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="testimonial-container">
                  <div class="testimonial-content"> You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first.
                    I am really satisfied with my first laptop service. </div>
                  <div class="testimonial-photo"> <img src="<?php echo base_url('assets/front') ?>/images/it_service/client2.jpg" class="img-responsive" alt="#" width="150" height="150"> </div>
                  <div class="testimonial-meta">
                    <h4>Maria Anderson</h4>
                    <span class="testimonial-position">CFO, Tech NY</span>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="testimonial-container">
                  <div class="testimonial-content"> You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first.
                    I am really satisfied with my first laptop service. </div>
                  <div class="testimonial-photo"> <img src="<?php echo base_url('assets/front') ?>/images/it_service/client3.jpg" class="img-responsive" alt="#" width="150" height="150"> </div>
                  <div class="testimonial-meta">
                    <h4>Maria Anderson</h4>
                    <span class="testimonial-position">CFO, Tech NY</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-5">
        <div class="full"> </div>
      </div>
    </div>
  </div>
</div>
<!-- end section -->
<!-- section -->
<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="contact_us_section">
            <div class="call_icon"> <img src="<?php echo base_url('assets/front') ?>/images/it_service/phone_icon.png" alt="#" /> </div>
            <div class="inner_cont">
              <h2>REQUEST A FREE QUOTE</h2>
              <p>Get answers and advice from people you want it from.</p>
            </div>
            <div class="button_Section_cont"> <a class="btn dark_gray_bt" href="<?php echo site_url('Front/kontak') ?>">Contact us</a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end section -->

<!-- section -->
<div class="section padding_layout_1" style="padding: 50px 0;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <ul class="brand_list">
            <?php foreach ($tampil_fraksi as $fraksi) {
              $logo_fraksi = $fraksi['foto'];
            ?>
              <li class="mb-25"><img width="80px" style=" object-fit: contain;" height="80px" src="<?php echo base_url('assets/uploads/files/') . $logo_fraksi ?>" alt="#" /></li>
            <?php } ?>
            <!--  -->
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end section -->
<!-- Modal -->
<div class="modal fade" id="search_bar" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-8 offset-lg-2 offset-md-2 offset-sm-2 col-xs-10 col-xs-offset-1">
            <div class="navbar-search">
              <form action="<?php echo base_url('Front/listBerita') ?>" method="get" id="search-global-form" class="search-global">
                <input type="text" placeholder="Type to search" name="keyword" autocomplete="off" class="search-global__input">
                <button class="search-global__btn"><i class="fa fa-search"></i></button>
                <div class="search-global__note">Begin typing your search above and press return to search.</div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Model search bar -->
<!--  footer  -->

<footer class="footer_style_2">
  <div class="container-fuild">
    <div class="row">
      <div class="map_section">
        <div id="map" class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.8352789858227!2d112.66880601432773!3d-7.912269680943812!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd62bf5dddb0daf%3A0x3cab0640bc2bc3d!2sNF%20Komputer!5e0!3m2!1sid!2sid!4v1602080202511!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
      </div>
      <div class="footer_blog">
        <div class="row">
          <div class="col-md-6">
            <div class="main-heading left_text">
              <h2>Tentang Sekretariat DPRD</h2>
            </div>
            <?php foreach ($tentang as $web) {
              $isi = $web['sekretariat_dprd'];
            ?>
              <p style="text-align: justify;"><?php echo strip_tags($isi) ?></p>
            <?php } ?>
            <ul class="social_icons">
              <li class="social-icon fb"><a href="<?php echo base_url('assets/front') ?>/#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li class="social-icon tw"><a href="<?php echo base_url('assets/front') ?>/#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li class="social-icon gp"><a href="<?php echo base_url('assets/front') ?>/#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
            </ul>
          </div>
          <div class="col-md-6">
            <div class="main-heading left_text">
              <h2>Website Terkait</h2>
            </div>
            <ul class="footer-menu">
              <?php foreach ($website as $web) {
                $isi = $web['website'];
                $link = $web['link_website'];
              ?>
                <li><a href="<?php echo $link ?>"><i class="fa fa-angle-right"></i> <?php echo $isi ?></a></li>
              <?php } ?>

            </ul>
          </div>
          <div class="col-md-6">
            <div class="main-heading left_text">
              <h2>Services</h2>
            </div>
            <ul class="footer-menu">
              <li><a href="<?php echo base_url('assets/front') ?>/it_data_recovery.html"><i class="fa fa-angle-right"></i> Data recovery</a></li>
              <li><a href="<?php echo base_url('assets/front') ?>/it_computer_repair.html"><i class="fa fa-angle-right"></i> Computer repair</a></li>
              <li><a href="<?php echo base_url('assets/front') ?>/it_mobile_service.html"><i class="fa fa-angle-right"></i> Mobile service</a></li>
              <li><a href="<?php echo base_url('assets/front') ?>/it_network_solution.html"><i class="fa fa-angle-right"></i> Network solutions</a></li>
              <li><a href="<?php echo base_url('assets/front') ?>/it_techn_support.html"><i class="fa fa-angle-right"></i> Technical support</a></li>
            </ul>
          </div>
          <div class="col-md-6">
            <div class="main-heading left_text">
              <h2>Contact us</h2>
            </div>
            <?php foreach ($alamat as $web) {
              $isi = $web['alamat'];
            ?>
              <p><?php echo $isi ?> </p>
            <?php } ?>

            <?php foreach ($kontak as $web) {
              $isi = $web['no_kontak'];
            ?>
              <p>No Kontak: <a href="tel:<?php echo $isi ?>"><?php echo $isi ?></a><br> </p>
            <?php } ?>
            <div class="footer_mail-section">
              <form>
                <fieldset>
                  <div class="field">
                    <input placeholder="Email" type="text">
                    <button class="button_custom"><i class="fa fa-envelope" aria-hidden="true"></i></button>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="cprt">
        <p>ItNext © Copyrights 2019 Design by html.design</p>
      </div>
    </div>
  </div>
</footer>
<!-- end footer ------------------------------------------------------------------------------
<!-- js section -->
<script src="<?php echo base_url('assets/front') ?>/js/jquery.min.js"></script>
<script src="<?php echo base_url('assets/front') ?>/js/bootstrap.min.js"></script>
<!-- menu js -->
<script src="<?php echo base_url('assets/front') ?>/js/menumaker.js"></script>
<!-- wow animation -->
<script src="<?php echo base_url('assets/front') ?>/js/wow.js"></script>
<!-- custom js -->
<script src="<?php echo base_url('assets/front') ?>/js/custom.js"></script>
<!-- PDF Viewer -->
<script src="<?php echo base_url('assets/front') ?>/js/pdfviewer.js"></script>
<script src="<?php echo base_url('assets/front') ?>/js/pdf.js"></script>
<script src="<?php echo base_url('assets/front') ?>/js/pdf.worker.js"></script>
<!-- revolution js files -->
<script src="<?php echo base_url('assets/front') ?>/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="<?php echo base_url('assets/front') ?>/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="<?php echo base_url('assets/front') ?>/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="<?php echo base_url('assets/front') ?>/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="<?php echo base_url('assets/front') ?>/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="<?php echo base_url('assets/front') ?>/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="<?php echo base_url('assets/front') ?>/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="<?php echo base_url('assets/front') ?>/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="<?php echo base_url('assets/front') ?>/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="<?php echo base_url('assets/front') ?>/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="<?php echo base_url('assets/front') ?>/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script src="<?php echo base_url('assets/front') ?>/datatables/datatables.js"></script>
<script src="<?php echo base_url('assets/front') ?>/datatables/datatables.min.js"></script>
<!-- map js -->
<!-- <iframe src="http://ppid.nad/assets/front/download/e33ab-sk_ppid_2019_v3.pdf"></iframe>
<iframe src="http://ppid.nad/assets/front/download/5ea2a-sk_ppid_agustus_2020.pdf"></iframe> -->
<!-- <script>
  var view = $("#tslshow");
  var move = "100px";
  var sliderLimit = -750;

  $("#rightArrow").click(function() {

    var currentPosition = parseInt(view.css("left"));
    if (currentPosition >= sliderLimit) view.stop(false, true).animate({
      left: "-=" + move
    }, {
      duration: 400
    })

  });

  $("#leftArrow").click(function() {

    var currentPosition = parseInt(view.css("left"));
    if (currentPosition < 0) view.stop(false, true).animate({
      left: "+=" + move
    }, {
      duration: 400
    });

  });
</script> -->
<script type="text/javascript">
  $(document).ready(function() {
    //find div
    var div = $('div.showcase');
    //find ul width
    var liNum = $(div).find('ul').children('li').length;
    var speed = 500;
    var containerWidth = 848;
    var itemWidth = 212;
    //Remove scrollbars
    $(div).css({
      overflow: 'hidden'
    });
    $('div.right-arrow').click(function(e) {
      if (($(div).scrollLeft() + containerWidth) < (liNum * itemWidth)) {
        $(div).animate({
          scrollLeft: '+=' + containerWidth
        }, speed);
      }
    });
    $('div.left-arrow').click(function(e) {
      if (($(div).scrollLeft() + containerWidth) > containerWidth) {
        $(div).animate({
          scrollLeft: '-=' + containerWidth
        }, speed);
      }
    });
  });
</script>
<script>
  $(document).ready(function() {

    $(".filter-button").click(function() {
      var value = $(this).attr('data-filter');

      if (value == "all") {
        //$('.filter').removeClass('hidden');
        $('.filter').show('1000');
      } else {
        //            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
        //            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
        $(".filter").not('.' + value).hide('3000');
        $('.filter').filter('.' + value).show('3000');

      }
    });

    if ($(".filter-button").removeClass("active")) {
      $(this).removeClass("active");
    }
    $(this).addClass("active");

  });
</script>
<script>
  function downloadFile() {
    <?php
    $file_sk = $this->db->get('sk_ppid')->result_array();
    foreach ($file_sk as $file) {
    ?>
      $(this).load('<?php echo base_url('assets/front/download/' . $file['upload_dokumen']) ?>');
    <?php } ?>
  }
  // This example adds a marker to indicate the position of Bondi Beach in Sydney,
  // Australia.
  function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 11,
      center: {
        lat: 40.645037,
        lng: -73.880224
      },
      styles: [{
          elementType: 'geometry',
          stylers: [{
            color: '#fefefe'
          }]
        },
        {
          elementType: 'labels.icon',
          stylers: [{
            visibility: 'off'
          }]
        },
        {
          elementType: 'labels.text.fill',
          stylers: [{
            color: '#616161'
          }]
        },
        {
          elementType: 'labels.text.stroke',
          stylers: [{
            color: '#f5f5f5'
          }]
        },
        {
          featureType: 'administrative.land_parcel',
          elementType: 'labels.text.fill',
          stylers: [{
            color: '#bdbdbd'
          }]
        },
        {
          featureType: 'poi',
          elementType: 'geometry',
          stylers: [{
            color: '#eeeeee'
          }]
        },
        {
          featureType: 'poi',
          elementType: 'labels.text.fill',
          stylers: [{
            color: '#757575'
          }]
        },
        {
          featureType: 'poi.park',
          elementType: 'geometry',
          stylers: [{
            color: '#e5e5e5'
          }]
        },
        {
          featureType: 'poi.park',
          elementType: 'labels.text.fill',
          stylers: [{
            color: '#9e9e9e'
          }]
        },
        {
          featureType: 'road',
          elementType: 'geometry',
          stylers: [{
            color: '#eee'
          }]
        },
        {
          featureType: 'road.arterial',
          elementType: 'labels.text.fill',
          stylers: [{
            color: '#3d3523'
          }]
        },
        {
          featureType: 'road.highway',
          elementType: 'geometry',
          stylers: [{
            color: '#eee'
          }]
        },
        {
          featureType: 'road.highway',
          elementType: 'labels.text.fill',
          stylers: [{
            color: '#616161'
          }]
        },
        {
          featureType: 'road.local',
          elementType: 'labels.text.fill',
          stylers: [{
            color: '#9e9e9e'
          }]
        },
        {
          featureType: 'transit.line',
          elementType: 'geometry',
          stylers: [{
            color: '#e5e5e5'
          }]
        },
        {
          featureType: 'transit.station',
          elementType: 'geometry',
          stylers: [{
            color: '#000'
          }]
        },
        {
          featureType: 'water',
          elementType: 'geometry',
          stylers: [{
            color: '#c8d7d4'
          }]
        },
        {
          featureType: 'water',
          elementType: 'labels.text.fill',
          stylers: [{
            color: '#b1a481'
          }]
        }
      ]
    });

    var image = 'images/it_service/location_icon_map_cont.png';
    var beachMarker = new google.maps.Marker({
      position: {
        lat: 40.645037,
        lng: -73.880224
      },
      map: map,
      icon: image
    });
  }
</script>
<!-- google map js -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script> -->
<!-- end google map js -->
<!-- zoom effect -->
<script src='<?php echo base_url('assets/front') ?>/js/hizoom.js'></script>
<script>
  $('.hi1').hiZoom({
    width: 300,
    position: 'right'
  });
  $('.hi2').hiZoom({
    width: 400,
    position: 'right'
  });
</script>
<script>
  $(document).ready(function($) {
    //set here the speed to change the slides in the carousel
    $('#myCarousel').carousel({
      interval: 5000
    });

    //Loads the html to each slider. Write in the "div id="slide-content-x" what you want to show in each slide
    $('#carousel-text').html($('#slide-content-0').html());

    //Handles the carousel thumbnails
    $('[id^=carousel-selector-]').click(function() {
      var id = this.id.substr(this.id.lastIndexOf("-") + 1);
      var id = parseInt(id);
      $('#myCarousel').carousel(id);
    });


    // When the carousel slides, auto update the text
    $('#myCarousel').on('slid.bs.carousel', function(e) {
      var id = $('.item.active').data('slide-number');
      $('#carousel-text').html($('#slide-content-' + id).html());
    });
  });
</script>
<script>
  $(document).ready(function() {
    $('#tampil').DataTable({

    });
  });
</script>

</body>

</html>