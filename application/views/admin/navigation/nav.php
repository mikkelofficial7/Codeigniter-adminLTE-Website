<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>data_admin/bootstrap/css/snackbar.css" />

<header class="main-header">
    <!-- Logo -->
    <center><div id="snackbaron">Internet Terkoneksi</div></center>
    <center><div id="snackbaroff">Oops..Internet Terputus</div></center>
    <a href="<?php echo site_url('admin/home') ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>G</b>2</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Galileo</b>Gasing</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <script>	
          $(document).ready(function(){
                /************** KONSULTASI SISWA *******************/
                setInterval(function() {
                  $.get("<?php echo site_url();?>"+"admin/home/check_session", function(sess) {
                          if(sess == '1')
                          {
                                $.get("<?php echo site_url();?>"+"admin/data_konsultasi_siswa/konsul", function (pesan_konsul) {
                                        $("#konsul-notif").html(pesan_konsul);
                                        $("#konsul-notif2").html(pesan_konsul);
                                        if(pesan_konsul <= 0)
                                        {
                                          $("#konsul-notif").css('visibility','hidden');
                                        }
                                        else
                                        {
                                          $("#konsul-notif").css('visibility','visible');
                                          $("#konsul-notif").css('font-size','13px');
                                        }
                                    });


                                $.get("<?php echo site_url();?>"+"admin/data_konsultasi_siswa/detail", function (pesan) {
                                        $("#detail-nama").html(pesan);
                                    });

                            /**************** USER ONLINE **********************/

                                $.get("<?php echo site_url();?>"+"admin/data_konsultasi_siswa/user", function (pesan_user) {
                                        $("#user-online").html(pesan_user);
                                        $("#user-online2").html(pesan_user);
                                        if(pesan_user <= 0)
                                        {
                                          $("#user-online").css('visibility','hidden');
                                        }
                                        else
                                        {
                                          $("#user-online").css('visibility','visible');
                                          $("#user-online").css('font-size','13px');
                                        }
                                    });


                                $.get("<?php echo site_url();?>"+"admin/data_konsultasi_siswa/user_detail", function (msg) {
                                        $("#detail-user").html(msg);
                                    });
                          }
                          else
                          {
                            $("#konsul-notif").css('display','none');
                            $("#konsul-notif2").css('display','none');
                            $("#user-online").css('display','none');
                            $("#user-online2").css('display','none');
                            $("#detail-nama").css('display','none');
                            $("#detail-user").css('display','none');
                          }
                      });
                }, 500);
	        });
          </script>
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span id="konsul-notif" class='label label-success'></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header" style="font-size: 13px">Ada <span id="konsul-notif2"></span> Pesan Konsultasi Belum Dikonfirmasi</li>
              <li class="content" style="height: 1px; overflow: auto;"><span id="detail-nama"></span></li>
              <li class="footer"><a href="<?php echo site_url('admin/data_konsultasi_siswa/home') ?>"><b>Lihat Pesan <i class="ion-chatbox-working"></i></b></a></li>
            </ul>
          </li>
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-users"></i>
              <span id="user-online" class='label label-warning'></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Tersedia <span id="user-online2"></span> User Online Sekarang</li>
              <li class="content" style="height: 1px; overflow: auto;"><span id="detail-user"></span></li>
            </ul>
          </li>

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php foreach($foto_profile as $post){?>
                <img src="<?php echo base_url(); ?><?php echo $post->foto?>" class="user-image" alt="User Image">
              <?php } ?>
              <span class="hidden-xs">Admin Galileo Gasing</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <?php foreach($foto_profile as $post){?>
                  <img src="<?php echo base_url(); ?><?php echo $post->foto?>" class="img-circle" alt="User Image">
                <?php } ?>
                <p>
                  Admin Galileo Gasing
                  <small>Pusat Bimbingan Belajar Galileo Gasing</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo site_url('admin/home/setting') ?>" class="btn btn-default btn-flat"><i class="fa fa-cog" aria-hidden="true"></i> Pengaturan</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('admin/login/logout'); ?>" class="btn btn-default btn-flat"><i class="fa fa-power-off" aria-hidden="true"></i> Keluar</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>data_admin/img/LogoG2_.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin Galileo Gasing</p>
          <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">HELLO, SELAMAT DATANG ADMIN</li>
        <li><a><i class="fa fa-clock-o"></i><span color="white"><span id="txt">clock</span></span></a></li>
        <li><a><i class="fa fa-calendar"></i><span color="white"><? echo date('Y-m-d'); ?></span></a></li>
        <br><br>
        <li class="active treeview">
          <a href="<?php echo site_url('admin/home') ?>">
            <i class="fa fa-home"></i><span>Beranda Utama</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Data Siswa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('admin/datasiswa/SD') ?>"><i class="fa fa-circle-o"></i> SD</a></li>
            <li><a href="<?php echo site_url('admin/datasiswa/SMP') ?>"><i class="fa fa-circle-o"></i> SMP</a></li>
            <li><a href="<?php echo site_url('admin/datasiswa/SMA') ?>"><i class="fa fa-circle-o"></i> SMA/SMK</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Data Ujian Siswa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('admin/dataujian/SD') ?>"><i class="fa fa-circle-o"></i> SD</a></li>
            <li><a href="<?php echo site_url('admin/dataujian/SMP') ?>"><i class="fa fa-circle-o"></i> SMP</a></li>
            <li><a href="<?php echo site_url('admin/dataujian/SMA') ?>"><i class="fa fa-circle-o"></i> SMA/SMK</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Data Tentor/Pengajar</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('admin/dataguru/SD') ?>"><i class="fa fa-circle-o"></i> SD</a></li>
            <li><a href="<?php echo site_url('admin/dataguru/SMP') ?>"><i class="fa fa-circle-o"></i> SMP</a></li>
            <li><a href="<?php echo site_url('admin/dataguru/SMA') ?>"><i class="fa fa-circle-o"></i> SMA/SMK</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="<?php echo site_url('admin/datakaryawan/karyawan') ?>">
            <i class="fa fa-user"></i>
            <span>Data Karyawan</span>
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo site_url('admin/absen_karyawan/dataEmployee') ?>">
            <i class="fa fa-paperclip"></i>
            <span>Absensi Karyawan</span>
          </a>
        </li>
        <li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-paperclip"></i>
            <span>Aktivitas KBM</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('admin/datakbm/SD') ?>"><i class="fa fa-circle-o"></i> SD</a></li>
            <li><a href="<?php echo site_url('admin/datakbm/SMP') ?>"><i class="fa fa-circle-o"></i> SMP</a></li>
            <li><a href="<?php echo site_url('admin/datakbm/SMA') ?>"><i class="fa fa-circle-o"></i> SMA/SMK</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-info-circle"></i>
            <span>Info Kehadiran Guru</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('admin/datakehadiran/SD') ?>"><i class="fa fa-circle-o"></i> SD</a></li>
            <li><a href="<?php echo site_url('admin/datakehadiran/SMP') ?>"><i class="fa fa-circle-o"></i> SMP</a></li>
            <li><a href="<?php echo site_url('admin/datakehadiran/SMA') ?>"><i class="fa fa-circle-o"></i> SMA/SMK</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="<?php echo site_url('admin/datakonsultasi/konsultasi') ?>">
            <i class="fa fa-info-circle"></i>
            <span>Info Konsultasi Guru-Siswa</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i>
            <span>Modul Belajar Siswa-Guru</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="<?php echo site_url('admin/datamodul/SD') ?>">
                <i class="fa fa-circle-o"></i>
                <span>SD</span>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/datamodul/SMP') ?>">
                <i class="fa fa-circle-o"></i>
                <span>SMP</span>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/datamodul/SMA') ?>">
                <i class="fa fa-circle-o"></i>
                <span>SMA/SMK</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>Data Gaji Guru</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="<?php echo site_url('admin/datagajiguru/SD') ?>">
                <i class="fa fa-circle-o"></i>
                <span>SD</span>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/datagajiguru/SMP') ?>">
                <i class="fa fa-circle-o"></i>
                <span>SMP</span>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/datagajiguru/SMA') ?>">
                <i class="fa fa-circle-o"></i>
                <span>SMA/SMK</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="<?php echo site_url('admin/datagaji/gaji') ?>">
            <i class="fa fa-money"></i>
            <span>Data Gaji Karyawan</span>
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo site_url('admin/databarang/barang') ?>">
            <i class="fa fa-area-chart"></i>
            <span>Laporan Biaya Barang</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-area-chart"></i>
            <span>Laporan Pembayaran Siswa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('admin/databayaran/home') ?>"><i class="fa fa-circle-o"></i>Input Data Pembayaran</a></li>
            <li><a href="<?php echo site_url('admin/databayaran/SD') ?>"><i class="fa fa-circle-o"></i> SD</a></li>
            <li><a href="<?php echo site_url('admin/databayaran/SMP') ?>"><i class="fa fa-circle-o"></i> SMP</a></li>
            <li><a href="<?php echo site_url('admin/databayaran/SMA') ?>"><i class="fa fa-circle-o"></i> SMA/SMK</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="<?php echo site_url('admin/datagaleri/galeri') ?>">
            <i class="fa fa-file-image-o"></i>
            <span>Galeri Kegiatan G2</span>
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo site_url('admin/datareminder/home') ?>">
            <i class="fa fa-bookmark"></i>
            <span>Reminder Info Seputar G2</span>
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo site_url('admin/datakelas/home') ?>">
            <i class="fa fa-bookmark"></i>
            <span>Lihat Jadwal Kelas</span>
          </a>
        </li>
          <li class="treeview">
            <a href="<?php echo site_url('admin/datacetak/home') ?>">
              <i class="fa fa-file-excel-o"></i>
              <span>Cetak Laporan (Excel)</span>
            </a>
          </li>
        <li class="treeview">
          <a href="<?php echo site_url('admin/databantuan/bantuan') ?>">
            <i class="fa fa-question-circle"></i>
            <span>Pusat Bantuan</span>
          </a>
        </li>
        <li class="header">Info Warna Notifikasi</li>
          <li><a><i class="fa fa-dot-circle-o text-green"></i> <span>Notifikasi Konsultasi Siswa</span></a></li>
          <li><a><i class="fa fa-dot-circle-o text-yellow"></i> <span>Notifikasi User Online</span></a></li>
      </ul>
    </section>
    <script src="<?php echo base_url(); ?>admin/bootstrap/js/snackbar.js"></script>
    <!-- /.sidebar -->
  </aside>