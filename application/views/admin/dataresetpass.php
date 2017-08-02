<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Galileo Gasing Admin</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="<?php echo base_url(); ?>data_admin/bootstrap/css/bootstrap.min.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>data_admin/bootstrap/css/snackbar.css" />

  <link rel="icon" href="<?php echo base_url(); ?>data_admin/img/icon.ico" type="image/gif" sizes="16x16">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>data_admin/dist/css/AdminLTE.min.css" />

  <link rel="stylesheet" href="<?php echo base_url(); ?>data_admin/dist/css/skins/skin-red.min.css" />

  </head>
  <body class="bg-body-image">
    <!-- Horizontal Form -->
    <div class="box box-info box-login-forgots" id="image-content">
      <!-- /.box-header -->
      <!-- form start -->
      <center><div id="snackbaron">Internet Terkoneksi</div></center>
      <center><div id="snackbaroff">Oops..Internet Terputus</div></center>
      <form class="form-horizontal" action="<?php echo base_url('admin/forgotPassword/gJiXAeoa1MwGE0JTHocO8l6kcoUQ2E0GPZIcx7Fu'); ?>" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token }}">
        <div class="box-body">
          <div class="form-group has-feedback">
            <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
            <span class="glyphicon glyphicon-eye-open" id="pass"></span>
            <div class="col-sm-9">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              <span id="result"></span>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label for="inputPassword3" class="col-sm-2 control-label">Konfirm Password</label>
            <span class="glyphicon glyphicon-eye-open" id="pass-confirm"></span>
            <div class="col-sm-9">
              <input type="password" class="form-control" id="password-confirm" name="c_password" placeholder="Konfirmasi Password">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              <span id="result-confirm"></span>
            </div>
          </div>
          <span id="match"></span>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <input type="submit" class="btn btn-info" name="resetpass" value="Reset">
        </div>
        <a class="forgot-pass" href="<?php echo site_url('admin/login') ?>">Kembali ke halaman utama</a>
        <!-- /.box-footer -->
      </form>
      <?php if($alert == "error"){ ?>
            <div class="alert alert-danger alert-dismissible" id="login-alert-reset">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-ban"></i> Oops!</h4>
              Password tidak sama atau kosong
           </div>
      <?php }else if($alert == "errors"){ ?>
            <div class="alert alert-danger alert-dismissible" id="login-alert-reset">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-ban"></i> Oops!</h4>
              Password dan Konfirmasinya harus lebih dari 6 karakter
           </div>
      <?php }else if($alert == "success"){?>
          <div class="alert alert-success alert-dismissible" id="login-alerts">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            Password berhasil diganti
          </div>
      <?php } ?>
    </div>
          <!-- /.box -->
<!-- ./wrapper -->
<script src="<?php echo base_url(); ?>data_admin/bootstrap/js/snackbar.js"></script>
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>data_admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>data_admin/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>data_admin/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>data_dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>data_dist/js/demo.js"></script>

<script>
  $(document).ready(function() {
    /********** MAIN PASSWORD *************/
    $('#password').keyup(function() {
       $('#result').html(checkStrength($('#password').val()))
    })
    function checkStrength(password) {
      var strength = 0
       if (password.length <= 0)
      {
        $("#result").css("display","none");
        $('#result').removeClass()
        $('#result').addClass('short')
        $('#result').css('color','red')
        $("#result").css('font-weight','bold')
        $('.box-login-forgots').css('height','320px')
        if ($(window).width() >= 767) {  
            $('.box-login-forgots').css('height','280px')
        } 
        return 'Terlalu Pendek, minimal 6 digit'
      }
      else if (password.length < 6 && password.length > 0)
      {
        $('#result').removeClass()
        $('#result').addClass('short')
        $('#result').css('color','red')
        $("#result").css('font-weight','bold')
        $('.box-login-forgots').css('height','320px')
        if ($(window).width() >= 767) {  
            $('.box-login-forgots').css('height','280px')
        } 
        return 'Terlalu Pendek, minimal 6 digit'
      }
      if (password.length > 7) strength += 1
      // If password contains both lower and uppercase characters, increase strength value.
      if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
      // If it has numbers and characters, increase strength value.
      if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
      // If it has one special character, increase strength value.
      if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
      // If it has two special characters, increase strength value.
      if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
      // Calculated strength value, we can return messages
      // If value is less than 2
      if (strength < 2) 
      {
        $("#result").css("display","inline");
        $('#result').removeClass()
        $('#result').addClass('weak')
        $('#result').css('color','#a2ad11')
        $("#result").css('font-weight','bold')
        $('.box-login-forgots').css('height','320px')
        if ($(window).width() >= 767) {  
            $('.box-login-forgots').css('height','280px')
        } 
        return 'Lemah'
      }
      else if (strength == 2)
      {
        $("#result").css("display","inline");
        $('#result').removeClass()
        $('#result').addClass('good')
        $('#result').css('color','green')
        $("#result").css('font-weight','bold')
        $('.box-login-forgots').css('height','320px')
        if ($(window).width() >= 767) {  
            $('.box-login-forgots').css('height','280px')
        } 
        return 'Sedang'
      }
      else
      {
        $("#result").css("display","inline");
        $('#result').removeClass()
        $('#result').addClass('strong')
        $('#result').css('color','blue')
        $("#result").css('font-weight','bold')
        $('.box-login-forgots').css('height','320px')
        if ($(window).width() >= 767) {  
            $('.box-login-forgots').css('height','280px')
        } 
        return 'Rumit'
      }
    }

    /********** KONFIRMASI PASSWORD *************/
    $('#password-confirm').keyup(function() {
       $('#result-confirm').html(checkStrengths($('#password-confirm').val()))
    })
    function checkStrengths(password) {
      var strength = 0
      if (password.length <= 0)
      {
        $("#result-confirm").css("display","none");
        $('#result-confirm').removeClass()
        $('#result-confirm').addClass('short')
        $('#result-confirm').css('color','red')
        $("#result-confirm").css('font-weight','bold')
        $('.box-login-forgots').css('height','320px')
        if ($(window).width() >= 767) {  
            $('.box-login-forgots').css('height','280px')
        } 
        return 'Terlalu Pendek, minimal 6 digit'
      }
      else if (password.length < 6 && password.length > 0)
      {
        $("#result-confirm").css("display","inline");
        $('#result-confirm').removeClass()
        $('#result-confirm').addClass('short')
        $('#result-confirm').css('color','red')
        $("#result-confirm").css('font-weight','bold')
        $('.box-login-forgots').css('height','320px')
        if ($(window).width() >= 767) {  
            $('.box-login-forgots').css('height','280px')
        } 
        return 'Terlalu Pendek, minimal 6 digit'
      }
      if (password.length > 7) strength += 1
      // If password contains both lower and uppercase characters, increase strength value.
      if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
      // If it has numbers and characters, increase strength value.
      if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
      // If it has one special character, increase strength value.
      if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
      // If it has two special characters, increase strength value.
      if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
      // Calculated strength value, we can return messages
      // If value is less than 2
      if (strength < 2) 
      {
        $("#result-confirm").css("display","inline");
        $('#result-confirm').removeClass()
        $('#result-confirm').addClass('weak')
        $('#result-confirm').css('color','#a2ad11')
        $("#result-confirm").css('font-weight','bold')
        $('.box-login-forgots').css('height','320px')
        if ($(window).width() >= 767) {  
            $('.box-login-forgots').css('height','280px')
        } 
        return 'Lemah'
      }
      else if (strength == 2)
      {
        $("#result-confirm").css("display","inline");
        $('#result-confirm').removeClass()
        $('#result-confirm').addClass('good')
        $('#result-confirm').css('color','green')
        $("#result-confirm").css('font-weight','bold')
        $('.box-login-forgots').css('height','320px')
        if ($(window).width() >= 767) {  
            $('.box-login-forgots').css('height','280px')
        } 
        return 'Sedang'
      }
      else
      {
        $("#result-confirm").css("display","inline");
        $('#result-confirm').removeClass()
        $('#result-confirm').addClass('strong')
        $('#result-confirm').css('color','blue')
        $("#result-confirm").css('font-weight','bold')
        $('.box-login-forgots').css('height','320px')
        if ($(window).width() >= 767) {  
            $('.box-login-forgots').css('height','280px')
        } 
        return 'Rumit'
      }
    }
        /********** PASSWORD MATCH *************/
        function checkPasswordMatch() {
            var password = $("#password").val();
            var confirmPassword = $("#password-confirm").val();

            if (password != confirmPassword)
            {
                $("#match").css("display","inline");
                $("#match").html("Password Tidak Cocok.");
                $("#match").css('color','#82140a');
                $("#match").css('font-weight','bold');
                $("#match").css('padding','3px');
                $("#match").css('background','#f45041');
                $("#match").css('border-radius','5px');
            }
            else if(password == "" || confirmPassword == "")
            {
                $("#match").css("display","none");
                $('.box-login-forgots').css('height','270px')
                if ($(window).width() >= 767) {  
                    $('.box-login-forgots').css('height','230px')
                }   
            }
            else
            {
                $("#match").css("display","inline");
                $("#match").html("Password Cocok.");
                $("#match").css('color','green');
                $("#match").css('font-weight','bold');
                $("#match").css('padding','3px');
                $("#match").css('background','#50f442');
                $("#match").css('border-radius','5px');
            }
        }
        $("#password, #password-confirm").keyup(checkPasswordMatch);
  });
</script>
<script>
  (function() {
      try {
          var passwordField = document.getElementById('password');
          passwordField.type = 'text';
          passwordField.type = 'password';

          var passwordField2 = document.getElementById('password-confirm');
          passwordField2.type = 'text';
          passwordField2.type = 'password';
          
          var togglePasswordField = document.getElementById('pass');
          togglePasswordField.addEventListener('click', uname_open, false);
          togglePasswordField.style.display = 'inline';

          var togglePasswordField2 = document.getElementById('pass-confirm');
          togglePasswordField2.addEventListener('click', uname_open2, false);
          togglePasswordField2.style.display = 'inline';
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
  function uname_open2() 
  {
      var passwordField2 = document.getElementById('password-confirm');
      var value2 = passwordField2.value;

      if(passwordField2.type == 'password') {
        passwordField2.type = 'text';
        $('#pass-confirm').removeClass();
        $('#pass-confirm').addClass('glyphicon glyphicon-eye-close');
      }
      else {
        passwordField2.type = 'password';
        $('#pass-confirm').removeClass();
        $('#pass-confirm').addClass('glyphicon glyphicon-eye-open');
      }
      
      passwordField2.value = value2;
  }
</script>
</body>
</html>
