<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Galileo Gasing | Data Cetak Laporan</title>
  <link rel="icon" href="<?php echo base_url(); ?>data_admin/img/icon.ico" type="image/gif" sizes="16x16">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>data_admin/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>data_admin/bootstrap/css/bootstrap.css">
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
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-file-excel-o"></i> Unduh dan back-up data dalam bentuk Excel(.xls)</h3>
            </div>
            <br>
            <!-- /.box-header -->
            <div class="box-body table-responsive" style="width:auto; max-width: 400px; overflow:auto;">
              <table class="table table-bordered table-striped bg-table">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Keterangan</th>
                  <th>Unduh/Download</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                       <td>1</td>
                       <td><span class="badge bg-blue">Laporan Biodata Guru</span></td>
                        <td>
                          <form role="form" method="POST" action="<?php echo base_url('admin/datacetak/dataguru'); ?>">
                            <button type="submit" name="changepass" id="btn-report" class="btn btn-danger"><i class="ion-ios-download-outline"></i> Unduh</button>
                          </form>
                        </td>
                    </tr> 
                    <tr>
                       <td>2</td>
                       <td><span class="badge bg-blue">Laporan Biodata Siswa</span></td>
                       <td>
                          <form role="form" method="POST" action="<?php echo base_url('admin/datacetak/datasiswa'); ?>">
                             <button type="submit" name="changepass" id="btn-report" class="btn btn-danger"><i class="ion-ios-download-outline"></i> Unduh</button>
                          </form>
                        </td>
                    </tr>
                    <tr>
                       <td>3</td>
                       <td><span class="badge bg-blue">Laporan Biodata Karyawan</span></td>
                       <td>
                          <form role="form" method="POST" action="<?php echo base_url('admin/datacetak/datakaryawan'); ?>">
                             <button type="submit" name="changepass" id="btn-report" class="btn btn-danger"><i class="ion-ios-download-outline"></i> Unduh</button>
                          </form>
                        </td>
                    </tr>
                    <tr>
                       <td>4</td>
                       <td><span class="badge bg-yellow">Laporan Gaji Guru</span></td>
                       <td>
                          <form role="form" method="POST" action="<?php echo base_url('admin/datacetak/gajiguru'); ?>">
                             <button type="submit" name="changepass" id="btn-report" class="btn btn-danger"><i class="ion-ios-download-outline"></i> Unduh</button>
                          </form>
                        </td>
                    </tr>
                    <tr>
                       <td>5</td>
                       <td><span class="badge bg-yellow">Laporan Gaji Karyawan</span></td>
                       <td>
                          <form role="form" method="POST" action="<?php echo base_url('admin/datacetak/gajikaryawan'); ?>">
                             <button type="submit" name="changepass" id="btn-report" class="btn btn-danger"><i class="ion-ios-download-outline"></i> Unduh</button>
                          </form>
                        </td>
                    </tr> 
                    <tr>
                       <td>6</td>
                       <td><span class="badge bg-green">Laporan Absensi dan KBM Guru</span></td>
                       <td>
                          <form role="form" method="POST" action="<?php echo base_url('admin/datacetak/absenguru'); ?>">
                             <button type="submit" name="changepass" id="btn-report" class="btn btn-danger"><i class="ion-ios-download-outline"></i> Unduh</button>
                          </form>
                        </td>
                    </tr>
                    <tr>
                       <td>7</td>
                       <td><span class="badge bg-green">Laporan Absensi Karyawan</span></td>
                       <td>
                          <form role="form" method="POST" action="<?php echo base_url('admin/datacetak/absenkaryawan'); ?>">
                             <button type="submit" name="changepass" id="btn-report" class="btn btn-danger"><i class="ion-ios-download-outline"></i> Unduh</button>
                          </form>
                        </td>
                    </tr>
                    <tr>
                       <td>8</td>
                       <td><span class="badge bg-green">Laporan Konsultasi Guru</span></td>
                       <td>
                          <form role="form" method="POST" action="<?php echo base_url('admin/datacetak/konsultasiguru'); ?>">
                             <button type="submit" name="changepass" id="btn-report" class="btn btn-danger"><i class="ion-ios-download-outline"></i> Unduh</button>
                          </form>
                        </td>
                    </tr> 
                    <tr>
                       <td>9</td>
                       <td><span class="badge bg-black">Laporan Pembayaran Siswa</span></td>
                       <td>
                          <form role="form" method="POST" action="<?php echo base_url('admin/datacetak/bayaransiswa'); ?>">
                             <button type="submit" name="changepass" id="btn-report" class="btn btn-danger"><i class="ion-ios-download-outline"></i> Unduh</button>
                          </form>
                        </td>
                    </tr>
                    <tr>
                       <td>10</td>
                       <td><span class="badge bg-black">Laporan Biaya Input-Output</span></td>
                       <td>
                          <form role="form" method="POST" action="<?php echo base_url('admin/datacetak/barang'); ?>">
                             <button type="submit" name="changepass" id="btn-report" class="btn btn-danger"><i class="ion-ios-download-outline"></i> Unduh</button>
                          </form>
                        </td>
                    </tr>
                    <tr>
                       <td>11</td>
                       <td><span class="badge bg-black">Data Nilai dan Ujian Siswa</span></td>
                       <td>
                          <form role="form" method="POST" action="<?php echo base_url('admin/datacetak/ujian'); ?>">
                             <button type="submit" name="changepass" id="btn-report" class="btn btn-danger"><i class="ion-ios-download-outline"></i> Unduh</button>
                          </form>
                        </td>
                    </tr>       
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
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
