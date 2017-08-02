<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Galileo Gasing | Reminder Info</title>
  <link rel="icon" href="<?php echo base_url(); ?>data_admin/img/icon.ico" type="image/gif" sizes="16x16">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

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
    <section class="content-header">
      <h1>
        Informasikan sesuatu yang penting disini
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('admin/datareminder/home') ?>">Data reminder</a></li>
        <li class="active">Home</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <script>
              $(document).ready(function(){
                  $("#penerima").prop("disabled", "disabled");
                  $("#penerima").css("color", "#b3b6bc");

                  $("#nama").prop("disabled", "disabled");
                  $("#nama").css("color", "#b3b6bc");

                  $("#kelas").prop("disabled", "disabled");
                  $("#kelas").css("color", "#b3b6bc");
                  
                  $("#level").prop("disabled", "disabled");
                  $("#level").css("color", "#b3b6bc");

                  $('#tipe').change(function(){ 
                        var selectedValue = $(this).val(); 

                        switch(selectedValue)
                        {
                          case 'none':
                              $("#penerima").prop("disabled", "disabled");
                              $("#penerima").css("color", "#b3b6bc");

                              $("#nama").prop("disabled", "disabled");
                              $("#nama").css("color", "#b3b6bc");

                              $("#kelas").prop("disabled", "disabled");
                              $("#kelas").css("color", "#b3b6bc");

                              $("#level").prop("disabled", "disabled");
                              $("#level").css("color", "#b3b6bc");
                              break;
                          case 'singular':

                              $("#penerima").prop("disabled", "disabled");
                              $("#penerima").css("color", "#b3b6bc");

                              $("#nama").prop("disabled", false);
                              $("#nama").css("color", "black");

                              $("#kelas").prop("disabled", "disabled");
                              $("#kelas").css("color", "#b3b6bc");

                              $("#level").prop("disabled", "disabled");
                              $("#level").css("color", "#b3b6bc");

                              break;
                          case 'plural':

                              $("#penerima").prop("disabled", false);
                              $("#penerima").css("color", "black");

                              $("#nama").prop("disabled", "disabled");
                              $("#nama").css("color", "#b3b6bc");

                              $("#kelas").prop("disabled", false);
                              $("#kelas").css("color", "black");

                              $("#level").prop("disabled", "disabled");
                              $("#level").css("color", "#b3b6bc");

                              break;
                          default:
                              $("#penerima").prop("disabled", "disabled");
                              $("#penerima").css("color", "#b3b6bc");

                              $("#nama").prop("disabled", "disabled");
                              $("#nama").css("color", "#b3b6bc");

                              $("#kelas").prop("disabled", "disabled");
                              $("#kelas").css("color", "#b3b6bc");

                              $("#level").prop("disabled", "disabled");
                              $("#level").css("color", "#b3b6bc");

                              break;
                        }

                  });
                  $('#penerima').change(function(){ 
                        var selectedValue = $(this).val(); 

                        switch(selectedValue)
                        {
                        	case 'Guru':
                        		$("#level").prop("disabled", "disabled");
                              	$("#level").css("color", "#b3b6bc");
                              	break;
                            case 'Siswa':
                            	$("#level").prop("disabled", false);
                              	$("#level").css("color", "black");
                              	break;
                            default : 
                            	$("#level").prop("disabled", "disabled");
                              	$("#level").css("color", "#b3b6bc");
                              	break;
                        }
                  });
              });
            </script>
            <div class="col-md-6">
                <h4><i class="fa fa-book" aria-hidden="true"></i> Form Pengisian Pesan : </h4>
               <form role="form" method="POST" action="<?php echo base_url('admin/datareminder/send'); ?>">
                    <div class="box-body">
                    <label for="exampleInputPassword1">Tipe Pengiriman</label>
                      <div class="form-group form-group-changepass">
                        <select name="tipe" id="tipe" onchange="getkelas()" class="reminder">
                          <option value="none">Pilih Tipe Pengiriman</option>
                          <option value="singular">Personal</option>
                          <option value="plural">Grup</option>
                        </select>
                      </div>
                      <label for="exampleInputPassword1">Penerima</label>
                      <div class="form-group form-group-changepass">
                        <select name="penerima" id="penerima" onchange="getkelas()" class="reminder">
                          <option value="Guru">Guru</option>
                          <option value="Siswa">Siswa</option>
                        </select>
                      </div>
                      <script>
                          function getkelas() {
                              var getPenerima = document.getElementById("penerima").value;
                              var getTipe = document.getElementById("tipe").value;
                              if(getPenerima == "Guru")
                              {
                                document.getElementById("kelas").innerHTML = '<option value="0 SD SD-123456">SD</option><option value="0 SMP SMP-123">SMP</option><option value="0 MTS SMA-123">MTS</option><option value="0 SMA SMA-123">SMA</option><option value="0 SMK SMA-123">SMK</option><option value="0 MA SMA-123">MA</option>';
                              }
                              else if(getTipe == "plural")
                              {
                              	document.getElementById("kelas").innerHTML = '<option value="0">Semua</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option>';
                                document.getElementById("level").innerHTML = '<option value="SD SD-123456">SD</option><option value="SMP SMP-123">SMP</option><option value="MTS SMP-123">MTS</option><option value="SMA SMA-123">SMA</option><option value="SMK SMA-123">SMK</option><option value="MA SMA-123">MA</option>';
                              }
                              else
                              {
                              	document.getElementById("kelas").innerHTML = '<option value="0">Semua</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option>';
                                document.getElementById("level").innerHTML = '<option value="SD SD-123456">SD</option><option value="SMP SMP-123">SMP</option><option value="MTS SMP-123">MTS</option><option value="SMA SMA-123">SMA</option><option value="SMK SMA-123">SMK</option><option value="MA SMA-123">MA</option>';
                              }
                          }
                      </script>
                      <label for="exampleInputPassword1">Kelas</label>
                      <div class="form-group form-group-changepass">
                        <select name="kelas" id="kelas" class="reminder kehadiran-hadir">
                        </select>
                        <select name="level" id="level" class="reminder kehadiran-hadir">
                        </select>
                      </div>
                      <label for="exampleInputPassword1">Nama Personal</label>
                      <div class="form-group form-group-changepass">
                        <select name="nama" id="nama" class="reminder">
                            <?php foreach($data_siswa as $post){ echo "<option value='$post->nama_depan&$post->nama_belakang&$post->kelas&$post->level&$post->status_pekerjaan&$post->email&$post->id_siswa'>".$post->nama_depan." ".$post->nama_belakang." (".$post->username.") - ".$post->kelas." ".$post->level."</option>"; } ?>
                            <?php foreach($data_guru as $post){ echo "<option value='$post->nama_depan&$post->nama_belakang&$post->kelas&$post->level&$post->status_pekerjaan&$post->email&$post->id_tutor'>".$post->nama_depan." ".$post->nama_belakang." (".$post->username.") - ".$post->status_pekerjaan."</option>"; } ?>
                        </select>
                      </div>
                      <label for="exampleInputEmail1">Judul Pesan</label>
                      <div class="form-group form-group-changepass">
                        <input type="text" name="judul_pesan" class = "reminder" required>
                      </div>
                      <label for="exampleInputEmail1">Isi pesan/informasi</label>
                      <div class="form-group form-group-changepass">
                        <textarea rows="4" cols="50" id="isi" class="isi reminder" name="isi" placeholder="Silahkan isi disini" required></textarea>
                      </div>
                      <label for="exampleInputEmail1">Tanggal Expired Pesan</label>
                      <div class="form-group form-group-changepass">
                        <input type="date" name="tgl_pesan" class="reminder" required>
                      </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer form-group-changepass">
                      <input type="submit" name="changereminder" class="btn btn-danger" value="Kirim sekarang">
                    </div>
                  </form>
                  <?php if($alert == "error"){ ?>
                        <div class="alert alert-danger alert-dismissible" id="pass-alert">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-ban"></i> Oops!</h4>
                          Kolom tidak boleh kosong atau salah format
                       </div>
                  <?php }else if($alert == "success"){?>
                      <div class="alert alert-success alert-dismissible" id="pass-alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        Berhasil dikirim
                      </div>
                  <?php } else if($alert == "") { }?>
            </div>
            <div class="col-md-6">
               <h4><i class = "ion-calendar"></i> Kalender Liburan Bulan Ini : </h4>
               <br>
               <div class="holiday-calendar-widget">
           	      <div align="left"><iframe src="http://widget.calendarlabs.com/v1/calendar.php?cid=1002&uid=790111019&c=22&l=en&cbg=CC9966&cfg=990000&hfg=990000&hfg1=990000&ct=60&cb=0&cbc=990000&cf=verdana&cp=bottom&sw=1&hp=t&ib=1&ibc=5C0201&i=images/fruits.jpg" align="left" width="183" height="373" marginwidth=0 marginheight=0 frameborder=no scrolling=no allowtransparency='true'>Loading...</iframe>
               </div>
            </div>

          </div>
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
