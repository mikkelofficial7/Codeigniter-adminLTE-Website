<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Galileo Gasing | Konsultasi</title>
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
        Konsultasi antara guru dengan siswa
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('admin/datakonsultasi/konsultasi') ?>">Data Konsultasi</a></li>
        <li class="active">Konsultasi</li>
      </ol>
    </section>
    <br><br>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <script>
              $(document).ready(function(){
                  var sd = <?php echo json_encode($data_guru_sd); ?>;
                  var smp = <?php echo json_encode($data_guru_smp); ?>;
                  var sma = <?php echo json_encode($data_guru_sma); ?>;

                  var sd2 = <?php echo json_encode($data_siswa_sd); ?>;
                  var smp2 = <?php echo json_encode($data_siswa_smp); ?>;
                  var sma2 = <?php echo json_encode($data_siswa_sma); ?>;

                  var semua = <?php echo json_encode($data_guru_semua); ?>;
                  var semua2 = <?php echo json_encode($data_siswa_semua); ?>;

                  $("#guru").prop("disabled", "disabled");
                  $("#guru").css("color", "#b3b6bc");

                  $("#siswa").prop("disabled", "disabled");
                  $("#siswa").css("color", "#b3b6bc");
                  
                  $('#kelas').change(function(){ 
                        var selectedValue = $(this).val(); 

                        switch(selectedValue)
                        {
                          case 'none':
                              $("#guru").css("color", "#b3b6bc");
                              $("#guru").prop("disabled", "disabled");

                              $("#siswa").prop("disabled", "disabled");
                              $("#siswa").css("color", "#b3b6bc");
                              break;
                          case 'SD':
                              $("#guru").prop("disabled", false);
                              $("#guru").css("color", "black");
                              $("#siswa").prop("disabled", false);
                              $("#siswa").css("color", "black");
                              list(sd);
                              lists(sd2);
                              break;
                          case 'SMP':
                              $("#guru").prop("disabled", false);
                              $("#guru").css("color", "black");
                              $("#siswa").prop("disabled", false);
                              $("#siswa").css("color", "black");
                              list(smp);
                              lists(smp2);
                              break;
                          case 'SMA':
                              $("#guru").prop("disabled", false);
                              $("#guru").css("color", "black");
                              $("#siswa").prop("disabled", false);
                              $("#siswa").css("color", "black");
                              list(sma);
                              lists(sma2);
                              break;
                          case 'GABUNG':
                              $("#guru").prop("disabled", false);
                              $("#guru").css("color", "black");
                              $("#siswa").prop("disabled", false);
                              $("#siswa").css("color", "black");
                              list(semua);
                              lists(semua2);
                              break;
                          default:
                              $("#guru").prop("disabled", "disabled");
                              $("#guru").css("color", "#b3b6bc");

                              $("#siswa").prop("disabled", "disabled");
                              $("#siswa").css("color", "#b3b6bc");
                              break;
                        }

                  });
                  function list(array_list) {
                      $("#guru").html(""); //reset child options
                      $(array_list).each(function (i) { //populate child options
                          $("#guru").append("<option value='"+array_list[i].nama_depan+" "+array_list[i].nama_belakang+" "+array_list[i].id_tutor+"'>"+array_list[i].nama_depan+" "+array_list[i].nama_belakang+" - "+array_list[i].username+"</option>");
                      });
                  }
                  function lists(array_list) {
                      $("#siswa").html(""); //reset child options
                      $(array_list).each(function (i) { //populate child options
                          $("#siswa").append("<option value='"+array_list[i].nama_depan+" "+array_list[i].nama_belakang+" "+array_list[i].id_siswa+" "+array_list[i].kelas+"'>"+array_list[i].nama_depan+" "+array_list[i].nama_belakang+" - "+array_list[i].username+"</option>");
                      });
                  }
              });
            </script>
            <div class="col-md-6">
               <form role="form" method="POST" action="<?php echo base_url('admin/datakonsultasi/kirim'); ?>">
                    <div class="box-body">
                    <label for="exampleInputPassword1">Kelas</label>
                      <div class="form-group form-group-changepass">
                        <select name="kelas" id="kelas" class="konsul">
                          <option value="none">Pilih kelas</option>
                          <option value="SD">SD</option>
                          <option value="SMP">SMP</option>
                          <option value="SMA">SMA/K</option>
                          <option value="GABUNG">Lainnya</option>
                        </select>
                      </div>
                      <label for="exampleInputPassword1">Nama Guru/Pengajar</label>
                      <div class="form-group form-group-changepass">
                        <select name="guru" id="guru" class="konsul">
                        </select>
                      </div>
                      <label for="exampleInputPassword1">Nama Siswa</label>
                      <div class="form-group form-group-changepass">
                        <select name="siswa" id="siswa" class="konsul">
                        </select>
                      </div>
                      <label for="exampleInputPassword1">Mata Pelajaran</label>
                      <div class="form-group form-group-changepass">
                        <select name="bidang" id="bidang" class="konsul">
                          <option value="UMUM">Umum</option>
                          <option value="IPA">IPA</option>
                          <option value="IPS">IPS</option>
                          <option value="Matematika">Matematika</option>
                          <option value="Inggris">Inggris</option>
                          <option value="Akuntansi">Akuntansi</option>
                          <option value="Indonesia">Indonesia</option>
                          <option value="Fisika">Fisika</option>
                          <option value="Kimia">Kimia</option>
                          <option value="Biologi">Biologi</option>
                          <option value="Ekonomi">Ekonomi</option>
                          <option value="Sosiologi">Sosiologi</option>
                          <option value="Geografi">Geografi</option>
                          <option value="Sejarah">Sejarah</option>
                          <option value="Lainnya">Lainnya</option>
                        </select>
                      </div>
                      <div class="form-group form-group-changepass">
                        <label for="exampleInputEmail1">Masukkan penjelasan materi</label>
                        <textarea rows="4" cols="50" id="isi" class="isi konsul" name="keterangan" placeholder="Silahkan isi disini" required></textarea>
                      </div>
                      <label for="exampleInputEmail1">Tentukan Tanggal</label>
                      <div class="form-group form-group-changepass">
                        <input type="date" name="tanggal" class="konsul" required></textarea>
                      </div>
                      <label for="exampleInputEmail1">Tentukan Jam</label>
                      <div class="form-group form-group-changepass">
                        <input type="time" name="jam" class="konsul" required></textarea>
                      </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer form-group-changepass">
                      <input type="submit" name="changekonsultasi" class="btn btn-danger" value="Buat janji">
                    </div>
                  </form>
                  <?php if($alert == "error"){ ?>
                        <div class="alert alert-danger alert-dismissible" id="pass-alert">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-ban"></i> Oops!</h4>
                          Kolom tidak boleh kosong
                       </div>
                  <?php }else if($alert == "success"){?>
                      <div class="alert alert-success alert-dismissible" id="pass-alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        Berhasil dikirim
                      </div>
                  <?php }else if($alert == "errorss"){?>
                      <div class="alert alert-danger alert-dismissible" id="pass-alert">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-ban"></i> Oops!</h4>
                        Tanggal tidak boleh tanggal kemarin
                      </div>
                  <?php } else if($alert == "") { }?>
            </div>

            <div class="box-body table-responsive" style="overflow: auto;">
              <table id="example1" class="table table-bordered table-striped bg-table">
                <thead>
                <tr>
                  <th>ID guru</th>
                  <th>Nama guru</th>
                  <th>Email</th>
                  <th>Kelas</th>
                  <th>Telp</th>
                  <th><i class="fa fa-phone" aria-hidden="true"></i></th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($data_guru as $posts){?>
                    <tr>
                       <td><?php echo $posts->id_tutor?></td>
                       <td><?php echo $posts->nama_depan." ".$posts->nama_belakang?></td>
                       <td><?php echo $posts->email?></td>
                       <td><?php echo $posts->level;?></td>
                       <td><?php echo $posts->telepon?></td>
                       <td><a href="tel:<?php echo $posts->telepon?>"><i class="fa fa-phone-square" aria-hidden="true"></i></a></td>
                    </tr>    
                  <?php }?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <br>
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title"><i class="fa fa-user" aria-hidden="true"></i>&nbsp&nbsp Data Konsultasi Guru</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive">
                <table id="example2" class="table table-bordered table-striped bg-table">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama Guru</th>
                    <th>Nama siswa</th>
                    <th>Kelas</th>
                    <th>Pelajaran</th>
                    <th>Materi konsultasi</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Status Konsultasi</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php foreach($data_konsultasi as $post){?>
                      <tr>
                         <td><?php echo $post->id_tutor?></td>
                         <td><?php echo $post->nama_guru?></td>
                         <td><?php echo $post->nama_siswa?></td>
                         <td><?php echo $post->kelas." ".$post->level?></td>
                         <td><?php echo $post->pelajaran?></td>
                         <td><?php echo $post->materi?></td>
                         <td><?php echo $post->tanggal?></td>
                         <td><?php echo $post->jam?></td>
                         <?php if($post->status_konsultasi == 'diterima'){?>
                         <td><span class='label label-success'><?php echo $post->status_konsultasi?></span></td>
                         <?php } else if($post->status_konsultasi == 'ditolak') {?>
                         <td><span class='label label-danger'><?php echo $post->status_konsultasi?></span></td>
                         <?php } else {?>
                         <td><span class='label label-primary'><?php echo $post->status_konsultasi?></span></td>
                         <?php } ?>
                      </tr>    
                    <?php }?>
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
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
