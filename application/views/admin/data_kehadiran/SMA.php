<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Galileo Gasing | Data Kehadiran SMA</title>
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
  <div class="content-wrapper" style="overflow: auto;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tabel Data Kehadiran dan Penggantian Guru SMA
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('admin/datakehadiran/SMA') ?>">Data Kehadiran</a></li>
        <li class="active">SMA</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <br>
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-user-secret" aria-hidden="true"></i> Total Kehadiran Guru: <?php echo count($data_kehadiran);?></h3>
            </div>
            <br>
            <!-- /.box-header -->
            <div class="box-body table-responsive" style="overflow:auto;">
              <table id="example1" class="table table-bordered table-striped bg-table">
                <thead>
                <tr>
                  <th>ID guru</th>
                  <th>Nama guru</th>
                  <th>Kelas</th>
                  <th>Pelajaran</th>
                  <th>Materi</th>
                  <th>Tanggal</th>
                  <th>Jam Mulai</th>
                  <th>Jam Selesai</th>
                  <th>Status Hadir</th>
                  <th>Operasi</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($data_kehadiran as $post){?>
                    <tr>
                       <td><?php echo $post->id_tutor?></td>
                       <td><?php echo $post->nama_depan." ".$post->nama_belakang?></td>
                       <td><?php echo $post->kelas." ".$post->level?></td>
                       <td><?php echo $post->pelajaran?></td>
                       <td><?php echo $post->materi?></td>
                       <td><?php echo $post->tanggal?></td>
                       <td><?php echo $post->jam_masuk;?></td>
                       <td><?php echo $post->jam_keluar?></td>
                       <?php if($post->status_hadir == "HADIR"){ ?>
                            <td><span class="label label-success"><?php echo $post->status_hadir?></span></td>
                       <?php }else { ?>
                            <td><span class="label label-danger"><?php echo $post->status_hadir?></span></td>
                        <?php } ?>
                       <td><?php echo anchor('admin/datakehadiran/hapus_SMA/'.$post->tanggal,'<i class="ion-trash-a"></i> Hapus'); ?></td>
                    </tr>    
                  <?php }?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
          <!-- /.box-body -->

          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title"><i class="fa fa-user-secret" aria-hidden="true"></i> Data Guru Berhalangan Yang Telah Digantikan</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive" style="overflow:auto;">
                <table id="example2" class="table table-bordered table-striped bg-table">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama Guru Berhalangan</th>
                    <th>Nama Guru Pengganti</th>
                    <th>Pelajaran</th>
                    <th>Materi</th>
                    <th>Kelas</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Tanggal Kirim</th>
                    <th>Operasi</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php foreach($ganti as $post){?>
                      <tr>
                         <td><?php echo $post->id?></td>
                         <td><?php echo $post->nama_depan1?></td>
                         <td><?php echo $post->nama_depan2?></td>
                         <td><?php echo $post->pelajaran?></td>
                         <td><?php echo $post->materi?></td>
                         <td><?php echo $post->kelas." ".$post->level?></td>
                         <td><?php echo $post->tanggal?></td>
                         <td><?php echo $post->jam?></td>
                         <td><?php echo $post->tanggal_kirim?></td>
                         <td><?php echo anchor('admin/datakehadiran/hapusGantiSMA/'.$post->tanggal,'<i class="ion-trash-a"></i> Hapus'); ?></td>
                      </tr>    
                    <?php }?>
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
       </div>
     </div>
     <div class="col-md-6">
         <form role="form" method="POST" action="<?php echo base_url('admin/datakehadiran/gantiGuruSMA'); ?>">
              <div class="box-body">
              <label for="exampleInputEmail1">Guru Berhalangan</label>
                <div class="form-group form-group-changepass">
                  <?php 
                    echo '<select name="newname" class="kehadiran" id="newname">';
                    echo '<option value = "">Pilih Guru</option>';
                        $result = array();
                        foreach($data_izin as $post)
                        { 
                          $result[] = array('id' => $post->id_tutor, 'nama_depan' => $post->nama_depan, 'nama_belakang' => $post->nama_belakang);
                          //echo "<option value='$post->nama_depan&$post->id'>".$post->nama_depan." ".$post->nama_belakang."</option>"; 
                        } 
                        $array = array_map("unserialize", array_unique(array_map("serialize", $result)));
                        for($i = 0; $i < count($result) ; $i++)
                        {
                          if($array[$i]['id'] == "")
                          {
                            print_r("<option style='display:none' value='".$array[$i]['nama_depan']."&".$array[$i]['id']."'>".$array[$i]['nama_depan']." ".$array[$i]['nama_belakang']."</option>");
                          }
                          else
                          {
                            print_r("<option value='".$array[$i]['nama_depan']."&".$array[$i]['id']."'>".$array[$i]['nama_depan']." ".$array[$i]['nama_belakang']."</option>");
                          }
                        }
                    echo '</select>';
                    ?>
                </div>
                <script>
                  $(document).ready(function(){
                      $("#oldname").prop("disabled", "disabled");
                      $("#oldname").css("color", "#b3b6bc");
                      $("#kelas").prop("disabled", "disabled");
                      $("#kelas").css("color", "#b3b6bc");
                      $("#materi").prop("disabled", "disabled");
                      $("#materi").css("color", "#b3b6bc");
                      $("#level").prop("disabled", "disabled");
                      $("#level").css("color", "#b3b6bc");

                      var previous;
                      $("#newname").click(function () {
                          // Store the current value on focus, before it changes
                          $("#oldname").prop("disabled", false);
                          $("#oldname").css("color", "black");
                          $("#kelas").prop("disabled", false);
                          $("#kelas").css("color", "black");
                          $("#materi").prop("disabled", false);
                          $("#materi").css("color", "black");
                          $("#level").prop("disabled", false);
                          $("#level").css("color", "black");

                          previous = document.getElementById("newname").value;
                          previous = previous.split("&");
                          previous = previous[1];
                          $("#"+previous).hide();

                      }).change(function() {
                          // Do soomething with the previous value after the change
                          //alert(previous);
                          $("#"+previous).show();
                          previous = this.value;
                      });
                      $("#newname").click(function () {
                          now = this.value;
                          switch(now)
                          {
                            case '':
                                $("#oldname").prop("disabled", "disabled");
                                $("#oldname").css("color", "#b3b6bc");
                                $("#kelas").prop("disabled", "disabled");
                                $("#kelas").css("color", "#b3b6bc");
                                $("#materi").prop("disabled", "disabled");
                                $("#materi").css("color", "#b3b6bc");
                                $("#level").prop("disabled", "disabled");
                                $("#level").css("color", "#b3b6bc");
                                $("#none").prop("selected", true);
                                break;
                            default:
                                 $("#oldname").prop("disabled", false);
                                 $("#oldname").css("color", "black");
                                 $("#none").prop("selected", true);
                                 $("#kelas").prop("disabled", false);
                                 $("#kelas").css("color", "black");
                                  $("#materi").prop("disabled", false);
                                  $("#materi").css("color", "black");
                                  $("#level").prop("disabled", false);
                                  $("#level").css("color", "black");
                                 break;
                          }
                        });
                   });
                </script>
                <label for="exampleInputPassword1">Guru Pengganti</label>
                <div class="form-group form-group-changepass">
                  <?php 
                    echo '<select name="oldname" id="oldname" class="kehadiran">';
                    echo '<option id="none" value = "">Pilih Guru</option>';
                        $result = array();
                        foreach($data_ganti as $post)
                        { 
                          $result[] = array('id' => $post->id_tutor, 'nama_depan' => $post->nama_depan, 'nama_belakang' => $post->nama_belakang);
                          //echo "<option value='$post->nama_depan&$post->id'>".$post->nama_depan." ".$post->nama_belakang."</option>"; 
                        } 
                        $array = array_map("unserialize", array_unique(array_map("serialize", $result)));
                        for($i = 0; $i < count($result) ; $i++)
                        {
                          if($array[$i]['id'] == "")
                          {
                            print_r("<option id='".$array[$i]['id']."' style='display:none' value='".$array[$i]['nama_depan']."&".$array[$i]['id']."'>".$array[$i]['nama_depan']." ".$array[$i]['nama_belakang']."</option>");
                          }
                          else
                          {
                            print_r("<option id='".$array[$i]['id']."' value='".$array[$i]['nama_depan']."&".$array[$i]['id']."'>".$array[$i]['nama_depan']." ".$array[$i]['nama_belakang']."</option>");
                          }
                        }
                    echo '</select>';
                    ?>
                </div>
                <label for="exampleInputPassword1">Kelas</label>
                <div class="form-group form-group-changepass">
                 <select name="kelas" id="kelas" class="kehadiran">
                  <option id="none" value = "">Pilih Kelas</option>
                      <script type="text/javascript">
                        $(document).ready(function(){
                          var val;
                          var res;
                          var array = new Array();
                          var comparer = 0;
                          var comparer2 = "";
                           $("#newname").focusout(function () {
                             val = document.getElementById("newname").value;
                             val = val.split("&");
                             val = val[1];
                             <?php foreach($data_izin as $post){ ?>
                                if(val == '<?php echo $post->id_tutor; ?>')
                                {
                                    array.push('<?php echo $post->kelas." ".$post->level?>');
                                } 
                            <?php } ?>
                            array.sort();
                            for(var i = 0; i < array.length ; i++)
                            {
                              if((comparer + " " + comparer2) != array[i])
                              {
                                  res = array[i].split(" ");
                                  comparer = res[0];
                                  comparer2 = res[1];
                                  document.getElementById("kelas").innerHTML += '<option value="' + res[0] + "-" +res[1] + '">' + res[0] + " " +res[1] + '</option>';
                              }
                            }
                          }).change(function() {
                                comparer = 0;
                                comparer2 = "";
                                array = [];
                                document.getElementById("kelas").innerHTML = "";
                                document.getElementById("kelas").innerHTML = '<option id="none" value = "">Pilih Kelas</option>';
                          }).focusin(function() {
                              comparer = 0;
                              comparer2 = "";
                              array = [];
                              document.getElementById("kelas").innerHTML = "";
                              document.getElementById("kelas").innerHTML = '<option id="none" value = "">Pilih Kelas</option>';
                          });
                        });
                      </script>
                    </select>
                </div>
                 <label for="exampleInputPassword1">Materi</label>
                 <div class="form-group form-group-changepass">
                  <select name="materi" id="materi" class="kehadiran">
                    <option id="none" value = "">Pilih Materi</option>
                    <script type="text/javascript">
                      $(document).ready(function(){
                        var val;
                         $("#newname").focusout(function () {
                           val = document.getElementById("newname").value;
                           val = val.split("&");
                               val = val[1];
                           <?php foreach($data_izin as $post){ ?>
                            if(val == '<?php echo $post->id_tutor; ?>')
                            {
                                document.getElementById("materi").innerHTML += '<option value="<? echo $post->pelajaran."-".$post->materi ?>"><?php echo $post->pelajaran." - ".$post->materi?></option>';
                              } 
                          <?php }?>
                        }).change(function() {
                                document.getElementById("materi").innerHTML = "";
                                document.getElementById("materi").innerHTML = '<option id="none" value = "">Pilih Materi</option>';
                        }).focusin(function() {
                              document.getElementById("materi").innerHTML = "";
                              document.getElementById("materi").innerHTML = '<option id="none" value = "">Pilih Materi</option>';
                        });
                        });
                    </script>
                  </select>
                </div>
                <div class="form-group form-group-changepass">
                  <label for="exampleInputEmail1">Tanggal</label>
                  <input type="date" class="form-control kehadiran" id="exampleInputEmail1" name="tanggal" placeholder="misal 13/09/1996" required>
                </div>
                <div class="form-group form-group-changepass">
                  <label for="exampleInputEmail1">Jam</label>
                  <input type="time" class="form-control kehadiran" id="exampleInputEmail1" name="jam" placeholder="misal : 12:30:00" required>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer form-group-changepass">
                <input type="submit" name="changeguru" class="btn btn-danger" value="Ganti Guru">
              </div>
            </form>
            <?php if($alert == "error"){ ?>
                  <div class="alert alert-danger alert-dismissible" id="pass-alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Oops!</h4>
                    Field tidak boleh kosong atau format penulisan salah
                 </div>
            <?php }else if($alert == "errorsama"){?>
                <div class="alert alert-success alert-dismissible" id="pass-alert">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                  Nama guru izin dan pengganti tidak boleh sama
                </div>
            <?php }else if($alert == "success"){?>
                <div class="alert alert-success alert-dismissible" id="pass-alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                  Berhasil ditambahkan
                </div>
            <?php } else if($alert == "") { }?>
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
