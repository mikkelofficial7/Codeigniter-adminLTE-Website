<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tambah Karyawan Baru</title>
  <link rel="icon" href="<?php echo base_url(); ?>data_admin/img/icon.ico" type="image/gif" sizes="16x16">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
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
  <link rel="stylesheet" href="<?php echo base_url(); ?>data_admin/bootstrap/css/gallery.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>data_admin/bootstrap/css/upload.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>data_admin/dist/css/skins/_all-skins.min.css">
    <!-- Main content -->
</head>
<body>
    <section class="content-header">
      <h1>
        Form Input Karyawan Baru <font size="3"><a href="<?php echo base_url('admin/home/setting'); ?>"> [Kembali Ke Pengaturan]</a></font>
      </h1>
    </section>
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="col-md-6">
               <form role="form" method="POST" enctype='multipart/form-data' action="<?php echo base_url('admin/tambahpegawai/input'); ?>">
                    <div class="box-body">
                    <label for="exampleInputEmail1">Nama Depan *</label>
                        <input type="text" class="form-control kehadiran" id="exampleInputEmail1" name="namadepan" required>
                    <label for="exampleInputEmail1">Nama Belakang</label>
                        <input type="text" class="form-control kehadiran" id="exampleInputEmail1" name="namabelakang">
                      <label for="exampleInputPassword1">Jenis Kelamin *</label>
                      <div class="form-group form-group-changepass">
                        <select name="jeniskelamin" id="kelas" class="kehadiran" required>
                           <option value="Pria" >Pria</option>
                           <option value="Wanita" >Wanita</option>
                        </select>
                      </div>
                      <label for="exampleInputPassword1">Posisi Pilihan *</label>
                      <div class="form-group form-group-changepass">
                        <select name="posisi" id="kelas" class="kehadiran" required>
                        	 <option value="KEPALA" >Kepala Cabang</option>
          	               <option value="MARKETING" >Marketing</option>
                           <option value="PEGAWAI" >Karyawan Lainnya</option>
                           <option value="FREELANCER" >Freelancer</option>
                        </select>
                      </div>
                      <label for="exampleInputPassword1">Telepon *</label>
                        <input type="text" maxlength="15" class="form-control kehadiran" id="exampleInputEmail1" name="telp" placeholder="misal 083871979961" required>
                        <br>
                      <label for="exampleInputPassword1">Gaji Pokok Yang Diinginkan *</label>
                        <input type="text" class="form-control kehadiran" id="exampleInputEmail1" name="gaji" placeholder="misal 4300000" required>
                      <br>
                      <label for="exampleInputPassword1">Uang Transport *</label>
                        <input type="text" class="form-control kehadiran" id="exampleInputEmail1" name="transport" placeholder="misal 25000" required>
                      <br>
                      <div class="form-group form-group-changepass">
                        <label class="myUploadAva">
                          <button class="btn-upload">Ambil Foto atau Seret Gambar Kesini</button>
                          <input type="file" name="photo" id="fileToUpload">
                        </label>
                      </div>
                      <br>
                      <div class="form-group-changepass">
                        <input type="submit" name="changejadwal" class="btn btn-danger kehadiran" value="Tambah">
                      </div>
                  </form>
                </div>
                <?php if($alert == "errorgaji"){?>
                <div class="alert alert-success alert-dismissible" id="pass-alert">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                  Format Gaji Salah
                </div>
            <?php }else if($alert == "errorfoto"){?>
                <div class="alert alert-success alert-dismissible" id="pass-alert">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                  Maximum ukuran Foto 1024 X 768 
                </div>
            <?php }else if($alert == "errortelp"){?>
                <div class="alert alert-success alert-dismissible" id="pass-alert">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                  Format Nomor Telepon Tidak Sesuai
                </div>
            <?php }else if($alert == "success"){?>
                <div class="alert alert-success alert-dismissible" id="pass-alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                  Berhasil ditambahkan
                </div>
            <?php } else if($alert == "") { }?>
          </div>
          <div class="box">
              <h4>
                  Form Edit Gaji dan Tunjangan Baru
              </h4>
                <div class="col-md-6">
                     <form role="form" method="POST" action="<?php echo base_url('admin/tambahpegawai/editgaji'); ?>">
                          <div class="box-body">
                          <label for="exampleInputEmail1">Nama Pegawai</label>
                            <div class="form-group form-group-changepass">
                              <select name="id" id="ids" class="kehadiran" required>
                                <option value="" >Pilih Nama</option>
                                <?php foreach($compare as $item){ ?>
                                    <option value="<?php echo $item->id." ".$item->gaji_pokok." ".$item->gaji_makan; ?>" ><?php echo $item->nama_depan." ".$item->nama_belakang; ?></option>
                                 <?php } ?>
                              </select>
                            </div>
                          <label for="exampleInputEmail1">Gaji Pokok Sekarang</label>
                              <input type="text" class="form-control kehadiran" id="gaji" name="gaji" value="" required>
                            <label for="exampleInputPassword1">Uang Transport Sekarang</label>
                              <input type="text" class="form-control kehadiran" id="transport" name="transport" value="" required>
                              <br>
                            <div class="form-group-changepass">
                              <input type="submit" name="changejadwal" class="btn btn-danger kehadiran" value="Ubah">
                            </div>
                        </form>
                </div>
                <?php if($alert == "error1"){ ?>
                        <div class="alert alert-danger alert-dismissible" id="pass-alert">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-ban"></i> Oops!</h4>
                          Format Gaji Atau Transport Salah
                       </div>
                  <?php }else if($alert == "error2"){?>
                      <div class="alert alert-success alert-dismissible" id="pass-alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        Format Nama Tidak Boleh Kosong
                      </div>
                  <?php }else if($alert == "successs"){?>
                      <div class="alert alert-success alert-dismissible" id="pass-alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        Berhasil ditambahkan
                      </div>
                  <?php } else if($alert == "") { }?>
          </div>
        </div>
      </div>
      <!-- /.box -->
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
           $('#ids').focusout(function(){
              var a = $('#ids').val();
              var b = a.split(" ");
              $('#gaji').val(b[1]);
              $('#transport').val(b[2]);
           });
      });
    </script>
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
