<!-- end header -->
<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="title-holder">
                        <div class="title-holder-cell text-left">
                            <h1 class="page-title">Kontak</h1>
                            <ol class="breadcrumb">
                                <li><a href="<?php echo site_url() ?>">Home</a></li>
                                <li class="active">Kontak</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="section padding_layout_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12"></div>
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="full">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="main_heading text_align_center">
                                <h2>CONTACT US</h2>
                            </div>
                        </div>
                        <div class="contact_information">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 adress_cont">
                                <div class="information_bottom text_align_center">
                                    <div class="ukuran-ikon"> <i class="fa fa-road" aria-hidden="true"></i> </div>
                                    <div class="info_cont">
                                        <h3>Alamat</h3>
                                        <?php foreach ($alamat as $a) {
                                            $alamat = $a['alamat'];
                                        ?>
                                            <p><?php echo $alamat ?></p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 adress_cont">
                                <div class="information_bottom text_align_center">
                                    <div class="ukuran-ikon"> <i class="fa fa-envelope" aria-hidden="true"></i> </div>
                                    <div class="info_cont">
                                        <h3>E-Mail</h3>
                                        <?php foreach ($email as $a) {
                                            $email = $a['email'];
                                        ?>
                                            <p><?php echo $email ?></p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 adress_cont">
                                <div class="information_bottom text_align_center">
                                    <div class="ukuran-ikon"> <i class="fa fa-user" aria-hidden="true"></i> </div>
                                    <div class="info_cont">
                                        <h3>Nomor Telepon</h3>
                                        <?php foreach ($kontak as $a) {
                                            $kontak = $a['no_kontak'];
                                        ?>
                                            <p><?php echo $kontak ?></p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 contant_form">
                            <h2 class="text_align_center">SEND MESSAGER</h2>
                            <div class="form_section">
                                <form class="form_contant" action="index.html">
                                    <fieldset>
                                        <div class="row">
                                            <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <input class="field_custom" placeholder="Websire URL" type="text">
                                            </div>
                                            <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <input class="field_custom" placeholder="Your name" type="text">
                                            </div>
                                            <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <input class="field_custom" placeholder="Email adress" type="email">
                                            </div>
                                            <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <input class="field_custom" placeholder="Phone number" type="text">
                                            </div>
                                            <div class="field col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <textarea class="field_custom" placeholder="Messager"></textarea>
                                            </div>
                                            <div class="center"><a class="btn main_bt" href="#">SUBMIT NOW</a></div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end section -->