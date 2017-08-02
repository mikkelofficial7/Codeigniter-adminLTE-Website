<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Galileo Gasing Admin</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="<?php echo base_url(); ?>data_admin/bootstrap/css/snackbar.css" />

  <link rel="stylesheet" href="<?php echo base_url(); ?>data_admin/bootstrap/css/bootstrap.min.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

  <link rel="icon" href="<?php echo base_url(); ?>data_admin/img/icon.ico" type="image/gif" sizes="16x16">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>data_admin/dist/css/AdminLTE.min.css" />

  <link rel="stylesheet" href="<?php echo base_url(); ?>data_admin/dist/css/skins/skin-red.min.css" />

  </head>
  <body class="bg-body-image">
      <!-- Horizontal Form -->
      <center><div id="snackbaron">Internet Terkoneksi</div></center>
      <center><div id="snackbaroff">Oops..Internet Terputus</div></center>
      <div class="box box-info box-login-forgot" id="image-content">
        <div class="box-header with-border">
          <img src="<?php echo base_url(); ?>data_admin/img/LogoG2_.png" alt="G2 Logo" id="img-logo-g2">
          <center><h3 class="box-title-login">Admin Galileo Gasing</h3></center>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" action="<?php echo base_url('admin/forgotPassword/VzOYiaXOge7DAIEXg31qtF8XRB3BDEGk6NXQIAaI'); ?>" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token }}">
          <div class="box-body">
            <div class="form-group has-feedback">
              <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" name="username" placeholder="Email" autocomplete="off">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <input type="submit" class="btn btn-info" name="login" value="Cari Email">
          </div>
          <!-- /.box-footer -->
          <?php
              if($alert == "error")
              {
           ?>
             <div class="alert alert-danger alert-dismissible" id="login-alerts">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Oops!</h4>
                Maaf Email yang dicari tidak ada
             </div>
          <?php
            }
           ?>
        </form>
      </div>
          <!-- /.box -->
<!-- ./wrapper -->
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>data_admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>data_admin/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>data_admin/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>data_admin/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>data_admin/dist/js/demo.js"></script>

<script src="<?php echo base_url(); ?>data_admin/bootstrap/js/snackbar.js"></script>
</body>
</html>
