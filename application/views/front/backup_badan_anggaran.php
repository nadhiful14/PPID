<!-- end header -->
<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="title-holder">
                        <div class="title-holder-cell text-left">
                            <h1 class="page-title">Badan Anggaran</h1>
                            <ol class="breadcrumb">
                                <li><a href="index.html">Home</a></li>
                                <li class="active">Badan Anggaran</li>
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
<div class="section padding_layout_1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="main_heading text_align_center">
                        <h2>Badan Anggaran Kabupaten Blitar</h2>
                        <p class="large">Daftar Badan Anggaran Kabupaten Blitar periode 2019 – 2024</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php

            $no = 0;
            foreach ($badan_anggaran as $dprd) {
                $nama = $dprd['nama'];
                $jabatan = $dprd['jabatan'];
                $fraksi = $dprd['fraksi'];

                $no++;
            ?>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin_bottom_30_all">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama</td>
                                <td>Jabatan</td>
                                <td>Fraksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $nama ?></td>
                                <td><?php echo $jabatan ?></td>
                                <td><?php echo $fraksi ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php } ?>

        </div>
    </div>
</div>
<!-- end section -->

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
                                    <div class="testimonial-photo"> <img src="images/it_service/client1.jpg" class="img-responsive" alt="#" width="150" height="150"> </div>
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
                                    <div class="testimonial-photo"> <img src="images/it_service/client2.jpg" class="img-responsive" alt="#" width="150" height="150"> </div>
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
                                    <div class="testimonial-photo"> <img src="images/it_service/client3.jpg" class="img-responsive" alt="#" width="150" height="150"> </div>
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
                        <div class="call_icon"> <img src="images/it_service/phone_icon.png" alt="#" /> </div>
                        <div class="inner_cont">
                            <h2>REQUEST A FREE QUOTE</h2>
                            <p>Get answers and advice from people you want it from.</p>
                        </div>
                        <div class="button_Section_cont"> <a class="btn dark_gray_bt" href="it_contact.html">Contact us</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end section -->