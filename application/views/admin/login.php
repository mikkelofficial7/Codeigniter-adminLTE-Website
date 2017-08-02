<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Galileo Gasing Admin</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="<?php echo base_url(); ?>data_admin/bootstrap/css/bootstrap.min.css" />

  <link rel="stylesheet" href="<?php echo base_url(); ?>data_admin/bootstrap/css/snackbar.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>data_admin/dist/css/AdminLTE.min.css" />

  <link rel="icon" href="<?php echo base_url(); ?>data_admin/img/icon.ico" type="image/gif" sizes="16x16">

  <link rel="stylesheet" href="<?php echo base_url(); ?>data_admin/dist/css/skins/skin-red.min.css" />
    <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>data_admin/plugins/iCheck/square/blue.css">

  </head>
  <body class="bg-body-image" style="overflow: auto;">
	  <!-- Horizontal Form -->
	  <div class="box box-info box-login" id="image-content">
	    <div class="box-header with-border">
	      <img src="<?php echo base_url(); ?>data_admin/img/LogoG2_.png" alt="G2 Logo" id="img-logo-g2">
	      <center><h3 class="box-title-login">Admin Galileo Gasing</h3></center>
        <center><div id="snackbaron">Internet Terkoneksi</div></center>
        <center><div id="snackbaroff">Oops..Internet Terputus</div></center>
	    </div>
	    <!-- /.box-header -->
	    <!-- form start -->
	    <form class="form-horizontal" action="<?php echo base_url('admin/login/error'); ?>" method="post">
	      <input type="hidden" name="_token" value="{{ csrf_token }}">
	      <div class="box-body">
	          <br>
	            <div class="form-group has-feedback">
	              <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
	              <div class="col-sm-9">
	                <input type="text" class="form-control" id="username" name="username" placeholder="Email" autocomplete="off">
	                 <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
	              </div>
	            </div>
	            <div  class="form-group has-feedback">
	              <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
	              <span class="glyphicon glyphicon-eye-open" id="pass"></span>
	              <div class="col-sm-9">
	                <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
	                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
	              </div>
	            </div>
	    	</div>
	      <!-- /.box-body -->
	      <div class="box-footer">
	        <input type="submit" class="btn btn-info" name="login" value="Sign in">
	      </div>
	      <a class="forgot-pass" href="<?php echo site_url('admin/forgotPassword/s6MG02tcyl4sem5XIfHPKvmyQrDQSPuv4gTN7pPv') ?>">Lupa password?</a>
	      <!-- /.box-footer -->
	    </form>
	      <?php
		      if($alert == "error")
		      {
		   ?>
				 <div class="alert alert-danger alert-dismissible" id="login-alert">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <h4><i class="icon fa fa-ban"></i> Oops!</h4>
	                Email atau Password yang dimasukkan salah. Mohon periksa kembali inputan anda
	             </div>
	        <?php
	          }
           ?>
	    <form class="form-horizontal" id="secure-form" action="<?php echo base_url('admin/login/secure'); ?>" method="post">
	  	</form>
	  </div>
          <!-- /.box -->
<!-- ./wrapper -->
<script>
  (function() {
      try {
          var passwordField = document.getElementById('password');
          passwordField.type = 'text';
          passwordField.type = 'password';
          
          var togglePasswordField = document.getElementById('pass');
          togglePasswordField.addEventListener('click', uname_open, false);
          togglePasswordField.style.display = 'inline';
      }
      catch(err) {

      }

  })();
  function uname_open() 
  {
      var passwordField = document.getElementById('password');
      var value = passwordField.value;

      if(passwordField.type == 'password') {
        passwordField.type = 'text';
        $('#pass').removeClass();
        $('#pass').addClass('glyphicon glyphicon-eye-close');
      }
      else {
        passwordField.type = 'password';
        $('#pass').removeClass();
        $('#pass').addClass('glyphicon glyphicon-eye-open');
      }
      
      passwordField.value = value;
  }
</script>
<script src="<?php echo base_url(); ?>data_admin/bootstrap/js/snackbar.js"></script>
<script src="<?php echo base_url(); ?>data_admin/plugins/iCheck/icheck.min.js"></script>
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>data_admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url(); ?>data_admin/bootstrap/js/clear.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>data_admin/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>data_admin/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>data_admin/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>data_admin/dist/js/demo.js"></script>
</body>
</html>
