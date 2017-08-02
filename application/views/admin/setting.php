<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Galileo Gasing | Setting Akun</title>
  <link rel="icon" href="<?php echo base_url(); ?>data_admin/img/icon.ico" type="image/gif" sizes="16x16">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="<?php echo base_url(); ?>data_admin/bootstrap/css/upload.css" />
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>data_admin/bootstrap/css/bootstrap.min.css" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>data_admin/dist/css/AdminLTE.min.css" />
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>data_admin/dist/css/skins/_all-skins.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>data_admin/plugins/iCheck/flat/blue.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>data_admin/plugins/morris/morris.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>data_admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>data_admin/plugins/datepicker/datepicker3.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>data_admin/plugins/daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>data_admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini" onload="startTime()">
<div class="wrapper">
  <?php $this->load->view('admin/navigation/nav'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <div class="box box-primary">
        <div class="box-header with-border">
            <b><h1 class="box-title">Email  : <?php foreach($username as $user){ echo '<input type="text" id="username-admin" value="'.$user->email.'" readonly>'; }?>&nbsp;&nbsp;<span class="glyphicon glyphicon-ok-sign" id="uname-admin"></span></h1></b>
        </div>
        <div class="col-md-6">
              <div class="boxs box-header with-border">
                <h3 class="box-title"><i class="fa fa-unlock" aria-hidden="true"></i> Ganti Password</h3>
              </div>
              <form role="form" method="POST" action="<?php echo base_url('admin/home/processChangePassword'); ?>">
                <div class="box-body">
                  <div class="form-group has-feedback form-group-changepass">
                    <label for="exampleInputEmail1">Password </label>&nbsp;&nbsp;<span class="glyphicon glyphicon-eye-open" id="pass"></span>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <span id="result"></span>
                  </div>
                  <div class="form-group has-feedback form-group-changepass">
                    <label for="exampleInputPassword1">Konfirmasi Password </label>&nbsp;&nbsp;<span class="glyphicon glyphicon-eye-open" id="pass-confirm"></span>
                    <input type="password" onChange="checkPasswordMatch();" class="form-control" id="password-confirm" name="c_password" placeholder="Konfirmasi Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <span id="result-confirm"></span>
                  </div>
                  <span id="match"></span>
                </div>
                <!-- /.box-body -->
                <div class="box-footer form-group-changepass">
                  <input type="submit" name="changepass" class="btn btn-danger" value="Ganti Password">
                </div>
              </form>
              <?php if($alert == "error"){ ?>
                    <div class="alert alert-danger alert-dismissible" id="pass-alert">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h4><i class="icon fa fa-ban"></i> Oops!</h4>
                      Password dengan Konfirmasinya kosong atau tidak sama
                   </div>
              <?php }else if($alert == "errors"){ ?>
                    <div class="alert alert-danger alert-dismissible" id="pass-alert">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h4><i class="icon fa fa-ban"></i> Oops!</h4>
                      Password dengan Konfirmasinya kurang dari 6 karakter atau lebih
                   </div>
              <?php }else if($alert == "success"){?>
                  <div class="alert alert-success alert-dismissible" id="pass-alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    Password berhasil diganti
                  </div>
              <?php } ?>
              <br>
              <div class="boxs box-header with-border">
                <h3 class="box-title"><i class="fa fa-envelope-o" aria-hidden="true"></i> Ganti Alamat Email</h3>
              </div>
              <form role="form" method="POST" action="<?php echo base_url('admin/home/processChangeEmail'); ?>">
                <div class="box-body">
                  <div class="form-group has-feedback form-group-changepass">
                    <label for="exampleInputEmail1">Email Baru </label>
                    <input type="text" class="form-control" id="password" name="newmail" placeholder="misal : galileo@gmail.com" autocomplete="off">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer form-group-changepass">
                  <input type="submit" name="changepass" class="btn btn-danger" value="Ganti Email">
                </div>
              </form>
              <?php if($alert == "errorEmail"){ ?>
                    <div class="alert alert-danger alert-dismissible" id="pass-alert">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h4><i class="icon fa fa-ban"></i> Oops!</h4>
                      Field email kosong
                   </div>
              <?php }else if($alert == "errorEmail2"){?>
                  <div class="alert alert-danger alert-dismissible" id="pass-alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    Format email salah
                  </div>
              <?php }else if($alert == "errorEmail3"){?>
                  <div class="alert alert-danger alert-dismissible" id="pass-alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    Email sudah pernah digunakan, coba yg lainnya
                  </div>
              <?php } else if($alert == "successEmail"){?>
                  <div class="alert alert-success alert-dismissible" id="pass-alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    Email berhasil diganti
                  </div>
              <?php } ?>
              <br>
              <form role="form" method="POST" enctype='multipart/form-data' action="<?php echo base_url('admin/home/gantiProfil'); ?>">
                  <div class="box-body">
                  	<div class="boxs box-header with-border">
		                <h3 class="box-title"><i class="fa fa-picture-o" aria-hidden="true"></i> Pilih Gambar Untuk Profile</h3>
		             </div>
                    <div class="form-group form-group-changepass">
                        <br>
                        <label class="myUploadAva">
                          <button class="btn-upload">Ambil Foto atau Seret Gambar Kesini</button>&nbsp;&nbsp;<i class="fa fa-spinner fa-spin" id="profilespin"></i>
                          <input type="file" name="avatar" id="fileToUpload">
                        </label>
                    </div>
                  </div>
                  <div class="box-footer form-group-changepass">
                    <input type="submit" name="changeprofil" class="btn btn-danger" id="submit-profile" value="Ganti Foto Profil">
                    &nbsp;&nbsp;<span id="profilespin-wait"><i class="fa fa-spinner fa-spin"></i> Mohon tunggu</span>
                  </div>
              </form>
              <form role="form" method="POST" action="<?php echo base_url('admin/home/hapusProfil'); ?>">
                  <div class="box-footer form-group-changepass">
                    <button type="submit" name="changeprofil" class="btn btn-danger" id="submit-profile"><i class="fa fa-times" aria-hidden="true"></i>
                    &nbsp&nbspHapus Foto Profil</button>
                  </div>
              </form>
              <?php if($alert == "errorProfile"){ ?>
                    <div class="alert alert-danger alert-dismissible" id="pass-alert">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h4><i class="icon fa fa-ban"></i> Oops!</h4>
                      Format File harus .jpg atau ukuran size maximum 1024 x 768
                   </div>
              <?php } else if($alert == "successProfile"){?>
                  <div class="alert alert-success alert-dismissible" id="pass-alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    Foto profile berhasil diganti
                    <br><br>
                    <p style="font-size: 13px">*Jika foto profil belum terganti, foto profil akan otomatis terganti ± 5 menit</p>
                  </div>
              <?php } ?>
         </div>
      </div>
      <div class="box box-primary">
        <div class="col-md-6">
              	  <div class="boxs box-header with-border">
                    <h3 class="box-title"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp;Absensi Kehadiran Admin</h3>
                  </div>
                  <form role="form" method="POST" action="<?php echo base_url('admin/home/absence'); ?>">
                    <div class="box-body">
                      <div class="form-group form-group-changepass has-feedback">
                        <label for="exampleInputEmail1">Masukkan Nama Depan </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="masukkan nama depan ">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                      </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer form-group-changepass">
                      <input type="submit" name="absence" class="btn btn-danger" value="Absen Sekarang">
                    </div>
                  </form>
                  <?php if($alert == "error2"){ ?>
                        <div class="alert alert-danger alert-dismissible" id="pass-alert">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-ban"></i> Oops!</h4>
                          Kolom kosong atau salah format pengisian
                       </div>
                  <?php }else if($alert == "success2"){?>
                      <div class="alert alert-success alert-dismissible" id="pass-alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        Berhasil Diabsen
                      </div>
                  <?php } ?>
                  <br>
                  <div class="boxs box-header with-border">
                      <h3 class="box-title"><i class="fa fa-file" aria-hidden="true"></i>&nbsp;&nbsp;Absensi Kehadiran (Pegawai Lainnya)</h3>
                  </div>
                  <div class="box-body">
                    <label for="exampleInputEmail1">Masukkan ID Pegawai</label>
                    <p>Keterangan : </p>
                    <?php 
                      $i = -1;
                      foreach($karyawan as $post){ 
                         foreach($compares as $item){ 
                      if($post->id != $item->id_pertama && $post->id != $item->id_kedua){
                    ?>
                        <p><span id="p<?php echo $i; ?>"><b><?php echo $post->id; ?></b></span> = <?php echo $post->nama_depan." ".$post->nama_belakang; ?> <button class="copy<?php echo $i; ?>" id="copy<?php echo $i; ?>" onclick="copyToClipboard('#p<?php echo $i; ?>');pasteToTextbox('#p<?php echo $i; ?>');"><i class="fa fa-clone" aria-hidden="true"></i> <b>Copy</b></button></p>
                    <?php 
                          }
                          $i+=1;
                        }
                      } 
                    ?>
                  <form role="form" method="POST" action="<?php echo base_url('admin/home/absenceMaster'); ?>">
                      <div class="form-group form-group-changepass has-feedback">
                        <input type="text" style="font-size: 16px" maxlength="7" class="form-control" name="id" id="id-peg" placeholder="masukkan ID pegawai">
                        <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                      </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer form-group-changepass">
                      <input type="submit" name="absenceMaster" class="btn btn-danger" value="Absen Sekarang">
                    </div>
                  </form>

                  <?php if($alert == "error4"){ ?>
                        <div class="alert alert-danger alert-dismissible" id="pass-alert">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-ban"></i> Oops!</h4>
                          Kolom kosong atau salah format pengisian
                       </div>
                  <?php }else if($alert == "success4"){?>
                      <div class="alert alert-success alert-dismissible" id="pass-alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        Berhasil Diabsen
                      </div>
                  <?php } ?>

                  <form role="form" method="POST" action="<?php echo base_url('admin/home/countsalary'); ?>">
                    <div class="box-footer form-group-changepass">
                      <input type="submit" name="salary" id="salary" class="btn-lg btn-danger" value="Hitung Gaji Guru Dan Karyawan">
                    </div>
                  </form>
                  <?php if($alert == "error3"){ ?>
                        <div class="alert alert-danger alert-dismissible" id="pass-alert">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-ban"></i> Oops!</h4>
                          Tombol Error
                       </div>
                  <?php }else if($alert == "success3"){?>
                      <div class="alert alert-success alert-dismissible" id="pass-alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        Berhasil Ditotal
                      </div>
                  <?php } ?>
                  <div class="box-footer form-group-changepass">
						<a class="btn btn-danger" href="<?php echo base_url('admin/tambahpegawai'); ?>">[+] Tambah Karyawan Baru</a>
                    </div>
            </div>
      </div>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Developed by <a>Galileo Gasing</a>.</strong> All Rights Reserved
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>data_admin/plugins/jQuery/jquery-2.2.3.min.js"></script>

<script src="<?php echo base_url(); ?>https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
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
        return 'Terlalu Pendek, minimal 6 digit'
      }
			else if (password.length < 6 && password.length > 0)
			{
        $("#result").css("display","inline");
				$('#result').removeClass()
				$('#result').addClass('short')
				$('#result').css('color','red')
        $("#result").css('font-weight','bold')
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
				return 'Lemah'
			}
			else if (strength == 2)
			{
        $("#result").css("display","inline");
				$('#result').removeClass()
				$('#result').addClass('good')
				$('#result').css('color','green')
        $("#result").css('font-weight','bold')
				return 'Sedang'
			}
			else
			{
        $("#result").css("display","inline");
				$('#result').removeClass()
				$('#result').addClass('strong')
				$('#result').css('color','blue')
        $("#result").css('font-weight','bold')
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
        return 'Terlalu Pendek, minimal 6 digit'
      }
			else if (password.length < 6 && password.length > 0)
			{
        $("#result-confirm").css("display","inline");
				$('#result-confirm').removeClass()
				$('#result-confirm').addClass('short')
				$('#result-confirm').css('color','red')
        $("#result-confirm").css('font-weight','bold')
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
				return 'Lemah'
			}
			else if (strength == 2)
			{
         $("#result-confirm").css("display","inline");
				$('#result-confirm').removeClass()
				$('#result-confirm').addClass('good')
				$('#result-confirm').css('color','green')
        $("#result-confirm").css('font-weight','bold')
				return 'Sedang'
			}
			else
			{
        $("#result-confirm").css("display","inline");
				$('#result-confirm').removeClass()
				$('#result-confirm').addClass('strong')
				$('#result-confirm').css('color','blue')
        $("#result-confirm").css('font-weight','bold')
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

          var passwordField3 = document.getElementById('username-admin');
          passwordField3.type = 'text';
          passwordField3.type = 'password';
          
          var togglePasswordField = document.getElementById('pass');
          togglePasswordField.addEventListener('click', uname_open, false);
          togglePasswordField.style.display = 'inline';

          var togglePasswordField2 = document.getElementById('pass-confirm');
          togglePasswordField2.addEventListener('click', uname_open2, false);
          togglePasswordField2.style.display = 'inline';

           var togglePasswordField3 = document.getElementById('uname-admin');
          togglePasswordField3.addEventListener('click', uname_open3, false);
          togglePasswordField3.style.display = 'inline';
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
  function uname_open3() 
  {
      var passwordField3 = document.getElementById('username-admin');
      var value3 = passwordField3.value;

      if(passwordField3.type == 'password') {
        passwordField3.type = 'text';
        $('#uname-admin').removeClass();
        $('#uname-admin').addClass('glyphicon glyphicon-remove-sign');
      }
      else {
        passwordField3.type = 'password';
        $('#uname-admin').removeClass();
        $('#uname-admin').addClass('glyphicon glyphicon-ok-sign');
      }
      
      passwordField3.value = value3;
  }
</script>
<script>
     $(function() {
        var i;
        for(i = -1; i< <?php echo count($karyawan);?> ; i++)
        {
          
           $(".copy"+i+"").css('background-color','transparent');
           $(".copy"+i+"").css('border-style','none');

           $("#notifcopy"+i+"").css('visibility','hidden');

           $(".copy"+i+"").click(function (){
             $("#notifcopy"+i+"").css('visibility','visible');
             setTimeout(function(){ $("#notifcopy"+i+"").css('visibility','hidden'); }, 100);
           });
       }

      });
    function copyToClipboard(element) {
      var $temp = $("<input>");
      $("body").append($temp);
      $temp.val($(element).text()).select();
      document.execCommand("copy");
      $temp.remove();
    }
    function pasteToTextbox(id)
    {
      var str = id.substring(1,3);
      var getdata = "";
      getdata = document.getElementById(str).innerText;
      console.log(getdata);
      document.getElementById("id-peg").value = getdata;
    }
</script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script type="text/javascript">
    $(function() {
       $("#profilespin").css('visibility','hidden');
       $("#profilespin-wait").css('visibility','hidden');

       $("#fileToUpload").change(function (){
         $("#profilespin").css('visibility','visible');
         setTimeout(function(){ $("#profilespin").css('visibility','hidden'); }, 1000);
       });

       $("#submit-profile").click(function (){
         $("#profilespin-wait").css('visibility','visible');
         setTimeout(function(){ $("#profilespin-wait").css('visibility','hidden'); }, 11000);
       });
    });
</script>
<script src="<?php echo base_url(); ?>data_admin/bootstrap/js/clock.js"></script>
<script src="<?php echo base_url(); ?>data_admin/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url(); ?>data_admin/plugins/morris/morris.min.js"></script>
<script src="<?php echo base_url(); ?>data_admin/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url(); ?>data_admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>data_admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?php echo base_url(); ?>data_admin/plugins/knob/jquery.knob.js"></script>
<script src="<?php echo base_url(); ?>data_admin/https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url(); ?>data_admin/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>data_admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>data_admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<?php echo base_url(); ?>data_admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>data_admin/plugins/fastclick/fastclick.js"></script>
<script src="<?php echo base_url(); ?>data_admin/dist/js/app.min.js"></script>
<script src="<?php echo base_url(); ?>data_admin/dist/js/pages/dashboard.js"></script>
<script src="<?php echo base_url(); ?>data_admin/dist/js/demo.js"></script>
<!-- Bootstrap 3.3.6 -->
</body>
</html>
