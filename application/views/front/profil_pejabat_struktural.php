<!-- end header -->
<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="title-holder">
                        <div class="title-holder-cell text-left">
                            <h1 class="page-title">Profil Pejabat Struktural</h1>
                            <ol class="breadcrumb">
                                <li><a href="<?php echo site_url() ?>">Home</a></li>
                                <li class="active">Profil Pejabat Struktural</li>
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
                        <h2>Profil Pejabat Struktural</h2>
                        <p class="large">Daftar Profil Pejabat Struktural Kabupaten Blitar Jawa Timur</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            foreach ($profil_pejabat_struktural as $profil_pejabat) {
                $id = $profil_pejabat['id'];
                $nama = $profil_pejabat['nama'];
                $alamat = $profil_pejabat['alamat'];
                $tempat_lahir = $profil_pejabat['tempat_lahir'];
                $tanggal_lahir = $profil_pejabat['tanggal_lahir'];
                $pendidikan_terakhir = $profil_pejabat['pendidikan_terakhir'];
                $nip = $profil_pejabat['nip'];
                $no_sk = $profil_pejabat['no_sk'];
                $jabatan = $profil_pejabat['jabatan'];
                $jabatan_lengkap = $profil_pejabat['jabatan_lengkap'];
                $pangkat_golongan = $profil_pejabat['pangkat_golongan'];
                $pensiun = $profil_pejabat['pensiun'];
                $diklat_penjenjangan = $profil_pejabat['diklat_penjenjangan'];
                $penghargaan = $profil_pejabat['penghargaan'];
                $foto = $profil_pejabat['foto'];

            ?>
                <div class="col-md-3 col-sm-4" data-toggle="modal" data-target=".bd-example-modal-lg<?php echo $id ?>">
                    <div class="full team_blog_colum">
                        <div class="it_team_img"> <img class="img-responsive" src="<?php echo base_url('assets/uploads/files/') . $foto ?>" alt="#"> </div>
                        <div class="team_feature_head">
                            <h4><?php echo $nama ?></h4>
                        </div>
                        <div class="product_price">
                            <p><span><?= $jabatan ?></span></p>
                        </div>
                    </div>
                </div>
            <?php } ?>


        </div>
    </div>
</div>
<!-- end section -->

<!-- Modal -->
<?php
foreach ($profil_pejabat_struktural as $profil_pejabat) {
    $id = $profil_pejabat['id'];
    $nama = $profil_pejabat['nama'];
    $alamat = $profil_pejabat['alamat'];
    $tempat_lahir = $profil_pejabat['tempat_lahir'];
    $tanggal_lahir = $profil_pejabat['tanggal_lahir'];
    $pendidikan_terakhir = $profil_pejabat['pendidikan_terakhir'];
    $nip = $profil_pejabat['nip'];
    $no_sk = $profil_pejabat['no_sk'];
    $jabatan = $profil_pejabat['jabatan'];
    $jabatan_lengkap = $profil_pejabat['jabatan_lengkap'];
    $pangkat_golongan = $profil_pejabat['pangkat_golongan'];
    $pensiun = $profil_pejabat['pensiun'];
    $diklat_penjenjangan = $profil_pejabat['diklat_penjenjangan'];
    $penghargaan = $profil_pejabat['penghargaan'];
    $foto = $profil_pejabat['foto'];

?>
    <div class="modal fade bd-example-modal-lg<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $jabatan_lengkap ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="it_team_img"> <img class="img-responsive" src="<?php echo base_url('assets/uploads/files/') . $foto ?>" alt="#"> </div>
                        </div>
                        <div class="col-md-7 texta" style="border-left: 2px solid #eee;">

                            <table>
                                <tr style="margin-bottom: 600px;">
                                    <td> <strong>Nama</strong></td>
                                    <td style="padding-left: 20px;padding-right:8px">:</td>
                                    <td><?php echo $nama ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Tempat, Tanggal Lahir</strong></td>
                                    <td style="padding-left: 20px;padding-right:8px">:</td>
                                    <td><?php echo $tempat_lahir . ', ' . $tanggal_lahir ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Alamat</strong></td>
                                    <td style="padding-left: 20px;padding-right:8px">:</td>
                                    <td><?php echo $alamat ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Pendidikan Terakhir</strong></td>
                                    <td style="padding-left: 20px;padding-right:8px">:</td>
                                    <td><?php echo $pendidikan_terakhir ?></td>
                                </tr>
                                <tr>
                                    <td><strong>NIP</strong></td>
                                    <td style="padding-left: 20px;padding-right:8px">:</td>
                                    <td><?php echo $nip ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Nomor SK</strong></td>
                                    <td style="padding-left: 20px;padding-right:8px">:</td>
                                    <td><?php echo $no_sk ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Pangkat, Golongan</strong></td>
                                    <td style="padding-left: 20px;padding-right:8px">:</td>
                                    <td><?php echo $pangkat_golongan ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Pensiun</strong></td>
                                    <td style="padding-left: 20px;padding-right:8px">:</td>
                                    <td><?php echo $pensiun ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Diklat Penjenjangan</strong></td>
                                    <td style="padding-left: 20px;padding-right:8px">:</td>
                                    <td><?php echo $diklat_penjenjangan ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Penghargaan</strong></td>
                                    <td style="padding-left: 20px;padding-right:8px">:</td>
                                    <td><?php echo $penghargaan ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-primary" data-dismiss="modal" value="Close"></input>
                </div>
            </div>
        </div>
    </div>
<?php } ?>