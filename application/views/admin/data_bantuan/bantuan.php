<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Galileo Gasing | Pusat Bantuan</title>
  <link rel="icon" href="<?php echo base_url(); ?>data_admin/img/icon.ico" type="image/gif" sizes="16x16">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>data_admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>data_admin/plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>data_admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>data_admin/dist/css/skins/_all-skins.min.css">

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
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
              <div class="container">
                <h3>Berikut adalah contoh tutorial singkat penggunaan halaman admin</h3> 
                <br> 
	                <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width:60%;">
	                  <!-- Indicators -->
	                  <ol class="carousel-indicators">
	                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	                    <li data-target="#myCarousel" data-slide-to="1"></li>
	                    <li data-target="#myCarousel" data-slide-to="2"></li>
	                    <li data-target="#myCarousel" data-slide-to="3"></li>
	                    <li data-target="#myCarousel" data-slide-to="4"></li>
	                    <li data-target="#myCarousel" data-slide-to="5"></li>
	                    <li data-target="#myCarousel" data-slide-to="6"></li>
	                  </ol>

	                  <!-- Wrapper for slides -->
	                  <div class="carousel-inner">
	                    <div class="item active">
	                      <img src="<?php echo base_url(); ?>data_admin\gambar_tutorial/main_tutorial.png" alt="Main Tutorial" style="width:100%;">
	                    </div>

	                    <div class="item">
	                      <img src="<?php echo base_url(); ?>data_admin\gambar_tutorial/tutorial_1.png" alt="Detail Tutorial 1" style="width:100%;">
	                    </div>
	                  
	                    <div class="item">
	                      <img src="<?php echo base_url(); ?>data_admin\gambar_tutorial/tutorial_2.png" alt="Detail Tutorial 2" style="width:100%;">
	                    </div>

	                    <div class="item">
	                      <img src="<?php echo base_url(); ?>data_admin\gambar_tutorial/tutorial_3.png" alt="Detail Tutorial 3" style="width:100%;">
	                    </div>

	                    <div class="item">
	                      <img src="<?php echo base_url(); ?>data_admin\gambar_tutorial/tutorial_4.png" alt="Detail Tutorial 4" style="width:100%;">
	                    </div>

	                    <div class="item">
	                      <img src="<?php echo base_url(); ?>data_admin\gambar_tutorial/tutorial_5.png" alt="Detail Tutorial 5" style="width:100%;">
	                    </div>
	                    <div class="item">
	                      <img src="<?php echo base_url(); ?>data_admin\gambar_tutorial/tutorial_6.png" alt="Detail Tutorial 6" style="width:100%;">
	                    </div>
	                  </div>

	                  <!-- Left and right controls -->
	                  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
	                    <span class="glyphicon glyphicon-chevron-left"></span>
	                    <span class="sr-only">Previous</span>
	                  </a>
	                  <a class="right carousel-control" href="#myCarousel" data-slide="next">
	                    <span class="glyphicon glyphicon-chevron-right"></span>
	                    <span class="sr-only">Next</span>
	                  </a>
	                </div>
	                <br><br>
		          <!-- Custom Tabs -->
		          <div class="nav-tabs-custom data-bantuan">
		            <ul class="nav nav-tabs">
		              <li class="active"><a href="#tab_1" data-toggle="tab">Visi Dan Misi Kami</a></li>
		              <li><a href="#tab_2" data-toggle="tab">Alamat Dan Kontak Kami</a></li>
		            </ul>
		            <div class="tab-content">
		              <div class="tab-pane active" id="tab_1">
		                <b>Visi</b>
		                <p>Membangun generasi unggul untuk menjawab tantangan global.</p>

		                <b>Misi</b>
		                <p>Menjadi Partner siswa dalam memecah masalah belajar, membantu pemahaman materi pelajaran meningkatkan kemampuan akademik peserta didik untuk menghasilkan siswa yang berprestasi. Membina pengembangan didik siswa menjadi pribadi yang mandiri, kreatif, inovatif, jujur dan berakhlak. Menjadikan G2 sebagai wadah bagi siswa, sehingga dapat belajar dengan gampang, asik dan menyenangkan.</p>
		              </div>
		              <!-- /.tab-pane -->
		              <div class="tab-pane" id="tab_2">
		                <b><i class="ion-android-pin"></i>&nbsp;&nbsp; Alamat </b>
		                <p>Ruko Pasadena R2/ Tim. Tim., Mutiara Gading Timur Blok G V No.11 Kel. Mustika Jaya
        						Kec. Mustikajaya Kota Bekasi Prov. Jawa Barat 17158 Indonesia. <a href="https://www.google.com/maps/dir//''/@-6.2868398,106.963833,12z/data=!3m1!4b1!4m8!4m7!1m0!1m5!1m1!1s0x2e698e23d7062979:0xbd75c300e9973228!2m2!1d107.0338736!2d-6.2868445">Lihat Lokasi <i class = "ion-location"></i></a></p>
        						<b><i class="ion-android-call"></i>&nbsp;&nbsp; Kontak </b>
        						<p><b>(021)</b> 29250780</p>
		              </div>
		              <!-- /.tab-pane -->
		            </div>
		            <!-- /.tab-content -->
		          </div>
		          <!-- nav-tabs-custom -->
              </div>
          </div>
          <!-- /.box -->
        </div>
            <!-- /.box-body -->
     </div>
          <!-- /.box -->
    </section>
    <!-- /.content -->
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

<script src="<?php echo base_url(); ?>data_admin/bootstrap/js/clock.js"></script>
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>data_admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>data_admin/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>data_admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>data_admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>data_admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>data_admin/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>data_admin/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>data_admin/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
