<form action="<?php echo site_url('staff/updateProfile') ?>"  enctype="multipart/form-data" method="post" id="frm-update">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline8-list mt-b-30">
                            <div class="sparkline8-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="basic-login-inner">
                                                <h3>Update Profile</h3>
                                                    <div class="form-group-inner">
                                                        <label>Password</label>
                                                        <a href="javascript:void(0)" onclick="changePassword()" class="btn-ubah btn btn-primary" style="margin:10px;">Ubah Password</a>
                                                        <input type=hidden name="password" value="<?php echo @$dataProfile->password ?>">
                                                        <input type="text" id="changePassword" class="form-control" style="display:none" name="changePassword" placeholder="password">
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <label>Foto</label>
                                                        <input type="file" class="form-control" name="image">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="basic-login-inner" style="text-align:center">
                                                    <h3>Anda Yakin?</h3>
                                                    <p>Akan Melakukan Perubahan Profile:</p>
                                                    <div class="create-account-sign">
                                                        <a href="javascript:void(0)" onclick="$('#frm-update').submit()"><i class="fa fa-sign-in big-icon"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <script>
                    function changePassword(){
                        $("#changePassword").toggle('show');
                        var caption=$(".btn-ubah").text();
                        if(caption=='Ubah Password'){
                            $(".btn-ubah").text('Batalkan Perubahan');
                        }else{
                            $(".btn-ubah").text('Ubah Password');
                            $("#changePassword").val("");
                        }
                    }</script>