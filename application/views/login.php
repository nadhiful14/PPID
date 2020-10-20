<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Login | PPID Kabupaten Blitar</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- favicon
		============================================ -->
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
  <!-- Google Fonts
		============================================ -->
  <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
  <!-- Bootstrap CSS
		============================================ -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/css') ?>/bootstrap.min.css">
  <!-- Bootstrap CSS
		============================================ -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/css') ?>/font-awesome.min.css">
  <!-- owl.carousel CSS
		============================================ -->
  <!-- animate CSS
		============================================ -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/css') ?>/animate.css">
  <!-- normalize CSS
		============================================ -->
  <!-- main CSS
		============================================ -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/css') ?>/main.css">
  <!-- morrisjs CSS
		============================================ -->
  <!-- mCustomScrollbar CSS
		============================================ -->
  <!-- metisMenu CSS
		============================================ -->
  <!-- forms CSS
		============================================ -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/css') ?>/form/all-type-forms.css">
  <!-- style CSS
		============================================ -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template') ?>/style.css">
  <!-- responsive CSS
		============================================ -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/css') ?>/responsive.css">
  <!-- modernizr JS
		============================================ -->
  <script src="<?php echo base_url('assets/template/js') ?>/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
  <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
  <div class="error-pagewrap">
    <div class="error-page-int">
      <div class="text-center m-b-md custom-login">
        <h3>PLEASE LOGIN TO PPID APP</h3>
        <p>DPRD KABUPATEN BLITAR</p>
      </div>
      <div class="content-error">
        <div class="hpanel">
          <div class="panel-body">
            <form action="<?php echo site_url('login/masuk') ?>" method="post" id="loginForm">
              <div class="form-group">
                <label class="control-label" for="username">Username</label>
                <input type="text" placeholder="User" title="Please enter you username" required="" autocomplete="off" value="" name="username" id="username" class="form-control">
                <span class="help-block small">Your unique username to app</span>
              </div>
              <div class="form-group">
                <label class="control-label" for="password">Password</label>
                <input type="password" title="Please enter your password" placeholder="******" autocomplete="off" required="" value="" name="password" id="password" class="form-control">
                <span class="help-block small">Your strong password</span>
              </div>
              <div class="checkbox login-checkbox">
                <label>
                  <input type="checkbox" name="login_as" value="admin" class="i-checks text-right"> Remember Me </label>
                <!-- <p class="help-block small">(if this is a private computer)</p> -->
              </div>
              <button class="btn btn-success btn-block loginbtn">Login</button>
            </form>
          </div>
          <?php
          //mengeluarkan pesan eror
          if (validation_errors()) {
            echo "<div class='alert alert-danger' style='margin-top:5px;'>";
            echo '<center><b>' . validation_errors() . '</center></b>';
            echo '</div>';
          }
          ?>
        </div>
      </div>
      <div class="text-center login-footer">
        <p>Copyright © 2020. All rights reserved.</p>
      </div>
    </div>
  </div>
  <!-- jquery
		============================================ -->
  <script src="<?php echo base_url('assets/template/js') ?>/vendor/jquery-1.12.4.min.js"></script>
  <!-- bootstrap JS
		============================================ -->
  <script src="<?php echo base_url('assets/template/js') ?>/bootstrap.min.js"></script>
  <!-- wow JS
		============================================ -->
  <script src="<?php echo base_url('assets/template/js') ?>/icheck/icheck.min.js"></script>
  <script src="<?php echo base_url('assets/template/js') ?>/icheck/icheck-active.js"></script>
</body>

</html>