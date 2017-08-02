<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Galileo Gasing | Welcome Home</title>
  <link rel="icon" href="<?php echo base_url(); ?>data_admin/img/icon.ico" type="image/gif" sizes="16x16">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
      <section class="content-header">
          <?php foreach($foto_profile as $post){?>
             <h1>Selamat Datang Di Halaman Utama Admin, <b><?php echo $post->nama_belakang?></b><small>Halaman Admin</small></h1>
          <?php } ?>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo site_url('admin/home') ?>"><i class="fa fa-home"></i>Home</a></li>
          <li class="active">Beranda</li>
        </ol>
      </section>
      <br><br>
      <script>	
          $(document).ready(function(){
          		/************** DAFTAR *******************/
              setInterval(function() {
                $.get("<?php echo site_url();?>"+"admin/home/check_session", function (session) {
                          if(session == '1')
                          {
                              $.get("<?php echo site_url();?>"+"admin/home/watchDataKBM", function (kbm) {
                                      $("#kbm").html(kbm);
                                  });
                              $.get("<?php echo site_url();?>"+"admin/home/watchDataSiswa", function (siswa) {
                                      $("#siswa").html(siswa);
                                  });

                              $.get("<?php echo site_url();?>"+"admin/home/watchDataGuru", function (guru) {
                                      $("#guru").html(guru);
                                  });
                              $.get("<?php echo site_url();?>"+"admin/home/watchDataHadir", function (kehadiran) {
                                      $("#kehadiran").html(kehadiran);
                                  });
                          }
                          else
                          {
                            $("#kbm").css('display','none');
                            $("#siswa").css('display','none');
                            $("#guru").css('display','none');
                            $("#kehadiran").css('display','none');
                          }
                  });
              }, 500);
	        });
	  </script>
	  <section class="content">
        <div class="row">
          	  <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3 id="kbm"></h3>

                    <p>Total KBM</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-ios-book"></i>
                  </div>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                  <div class="small-box bg-yellow">
                    <div class="inner">
                      <h3 id="siswa"></h3>

                      <p>Total Siswa</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person-stalker"></i>
                    </div>
                  </div>
              </div>
              <div class="col-lg-3 col-xs-6">
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3 id="guru"></h3>

                      <p>Total Guru</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-ios-people"></i>
                    </div>
                  </div>
              </div>
              <div class="col-lg-3 col-xs-6">
                  <div class="small-box bg-blue">
                    <div class="inner">
                      <h3 id="kehadiran"></h3>

                      <p>Total Kehadiran Guru</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-ios-paper"></i>
                    </div>
                  </div>
              </div>
            <div class="col-lg-9 col-xs-6" id="big-banner">
              	<img src="<?php echo base_url(); ?>data_admin/img/banner_G2.png" class="center-big-logo"/>
              	<br><br>
            </div>
            <div class="col-lg-3 col-xs-6" id="clocks">
    			     <canvas id="canvas" width="250" height="250" style="float: right;"></canvas>
        	  </div>
        </div>
      	<div class="row">
	        <div class="col-md-12">
	          <div class="boxs box box-default">
	            <div class="box-header with-border">
	              <i class="fa fa-info"></i>
	              <h3 class="box-title">Informasi Halaman Web Admin</h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <div class="callout callout-danger">
	                <h4>Data siswa, guru, karyawan</h4>
    				<p>Memantau serta melakukan pengecekan terhadap data siswa (SD, SMP, SMA), guru (SD, SMP, SMA), maupun karyawan yang terlibat</p>
	              </div>
	              <div class="callout callout-info">
	                <h4>Kegiatan belajar mengajar</h4>
	    			<p>Memantau kegiatan belajar mengajar per harinya meliputi materi hari ini serta absensi guru dan siswa</p>
	              </div>
	              <div class="callout callout-warning">
	                <h4>Modul soal siswa</h4>
	    			<p>Menyediakan modul-modul pembelajaran siswa yang nanti dapat diunduh oleh guru maupun siswa</p>
	              </div>
	              <div class="callout callout-success">
	                <h4>Sistem penggajian</h4>
	    			<p>Melakukan pencetakan sekaligus pengecekan daftar gaji guru serta karyawan</p>
	              </div>
	              <div class="callout callout-success" id="callout-bg2">
	                <h4>Konsultasi siswa</h4>
	    			<p>Memantau siswa yang ingin mengadakan konsultasi kepada guru mereka atau membuat kesepakatan untuk pelajaran tambahan</p>
	              </div>
	            </div>
	            <!-- /.box-body -->
	          </div>
	          <!-- /.box -->
	        </div>
	    </div>
      </section>
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

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
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
<script>
	var canvas = document.getElementById("canvas");
	var ctx = canvas.getContext("2d");
	var radius = canvas.height / 2;
	ctx.translate(radius, radius);
	radius = radius * 0.90
	setInterval(drawClock, 1000);

	function drawClock() {
	  drawFace(ctx, radius);
	  drawNumbers(ctx, radius);
	  drawTime(ctx, radius);
	}

	function drawFace(ctx, radius) {
	  var grad;
	  ctx.beginPath();
	  ctx.arc(0, 0, radius, 0, 2*Math.PI);
	  ctx.fillStyle = 'white';
	  ctx.fill();
	  grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
	  grad.addColorStop(0, 'red');
	  grad.addColorStop(0.5, 'white');
	  grad.addColorStop(1, 'black');
	  ctx.strokeStyle = grad;
	  ctx.lineWidth = radius*0.1;
	  ctx.stroke();
	  ctx.beginPath();
	  ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
	  ctx.fillStyle = 'black';
	  ctx.fill();
	}

	function drawNumbers(ctx, radius) {
	  var ang;
	  var num;
	  ctx.font = radius*0.15 + "px arial";
	  ctx.textBaseline="middle";
	  ctx.textAlign="center";
	  for(num = 1; num < 13; num++){
	    ang = num * Math.PI / 6;
	    ctx.rotate(ang);
	    ctx.translate(0, -radius*0.85);
	    ctx.rotate(-ang);
	    ctx.fillText(num.toString(), 0, 0);
	    ctx.rotate(ang);
	    ctx.translate(0, radius*0.85);
	    ctx.rotate(-ang);
	  }
	}

	function drawTime(ctx, radius){
	    var now = new Date();
	    var hour = now.getHours();
	    var minute = now.getMinutes();
	    var second = now.getSeconds();
	    //hour
	    hour=hour%12;
	    hour=(hour*Math.PI/6)+
	    (minute*Math.PI/(6*60))+
	    (second*Math.PI/(360*60));
	    drawHand(ctx, hour, radius*0.5, radius*0.07);
	    //minute
	    minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
	    drawHand(ctx, minute, radius*0.8, radius*0.07);
	    // second
	    second=(second*Math.PI/30);
	    drawHand(ctx, second, radius*0.9, radius*0.02);
	}

	function drawHand(ctx, pos, length, width) {
	    ctx.beginPath();
	    ctx.lineWidth = width;
	    ctx.lineCap = "round";
	    ctx.moveTo(0,0);
	    ctx.rotate(pos);
	    ctx.lineTo(0, -length);
	    ctx.stroke();
	    ctx.rotate(-pos);
	}
</script>
<!-- Bootstrap 3.3.6 -->
</body>
</html>
