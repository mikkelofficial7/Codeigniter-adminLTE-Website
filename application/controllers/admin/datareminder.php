<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class datareminder extends CI_Controller 
{
	function __construct()
	{
		date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
		if($this->session->userdata('status') != "login")
		{
			//kalau masih ada session login dia langsung masuk, kalau tidak ada langsung ke halaman login
			redirect(base_url("admin/login")); 
		}
	}
	
	/*========================================home=======================================================*/
	public function home()
	{
		$data['alert'] = '';

		$this->load->model('model_dataganti_profile');
		$wheres = array('username' => $this->session->userdata('nama'));
		$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->model('model_datareminder_home');
		$data['data_guru'] = $this->model_datareminder_home->tampilDropdownGuru()->result();
		$data['data_siswa'] = $this->model_datareminder_home->tampilDropdownSiswa()->result();

		$this->load->view('admin/data_reminder/home',$data);
	}
	public function send()
	{
		$uname_sender = "galileogasing@gmail.com";
		$pass_sender = "airhujan1";
		$this->load->helper('url');
		$this->load->model('model_datareminder_home');

		$data['data_guru'] = $this->model_datareminder_home->tampilDropdownGuru()->result();
		$data['data_siswa'] = $this->model_datareminder_home->tampilDropdownSiswa()->result();

		$tipe = $this->input->post('tipe');
		$nama = $this->input->post('nama');
		$arrnama = explode("&", $nama);
		$penerima = $this->input->post('penerima');
		$judul = $this->input->post('judul_pesan');
		$isi = $this->input->post('isi');
		$kelas = $this->input->post('kelas');
		$level = $this->input->post('level');
		$penerima = $this->input->post('penerima');
		$expr = $this->input->post('tgl_pesan');
		$arrlevel = explode(" ", $level);
		$arrkelas = explode(" ", $kelas);

		if($tipe == "plural")
		{

	 		if(strlen($isi) != 0 && strlen($judul) != 0 && strlen($kelas) != 0 && strlen($penerima) != 0 && strlen($expr) != 0 && $expr >= date('Y-m-d') && $penerima == 'Siswa')
		 	{
		 		if($expr == date('Y-m-d'))
		 		{
				 		if(($arrlevel[0] == 'SMP' || $arrlevel[0] == 'MTS') && $kelas <= 3)
				 		{
							$val = array(
								'id_pengumuman' =>  uniqid(),
								'id_user' =>  $arrlevel[1],
								'nama' => 'Kolektif Group',
								'judul' => $judul,
								'isi' => $isi,
								'kelas' => $kelas,
								'level' => $arrlevel[0],
								'penerima' => $penerima,
								'tanggal_buat' => date('Y-m-d'),
								'tanggal_selesai' => $expr,
								'waktu' => '23:59:59'
								);
							$this->model_datareminder_home->getData($val,'data_reminder');
							$data['alert'] = 'success';

							$this->load->model('model_dataganti_profile');
							$wheres = array('username' => $this->session->userdata('nama'));
							$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

							$this->load->view('admin/data_reminder/home',$data);
						}
						else if(($arrlevel[0] == 'SMA' || $arrlevel[0] == 'SMK' || $arrlevel[0] == 'MA') && $kelas <= 3)
				 		{
							$val = array(
								'id_pengumuman' =>  uniqid(),
								'id_user' =>  $arrlevel[1],
								'nama' => 'Kolektif Group',
								'judul' => $judul,
								'isi' => $isi,
								'kelas' => $kelas,
								'level' => $arrlevel[0],
								'penerima' => $penerima,
								'tanggal_buat' => date('Y-m-d'),
								'tanggal_selesai' => $expr,
								'waktu' => '23:59:59'
								);
							$this->model_datareminder_home->getData($val,'data_reminder');
							$data['alert'] = 'success';

							$this->load->model('model_dataganti_profile');
							$wheres = array('username' => $this->session->userdata('nama'));
							$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

							$this->load->view('admin/data_reminder/home',$data);
						}
						else if($arrlevel[0] == 'SD' && $kelas <= 6)
				 		{
							$val = array(
								'id_pengumuman' =>  uniqid(),
								'id_user' =>  $arrlevel[1],
								'nama' => 'Kolektif Group',
								'judul' => $judul,
								'isi' => $isi,
								'kelas' => $kelas,
								'level' => $arrlevel[0],
								'penerima' => $penerima,
								'tanggal_buat' => date('Y-m-d'),
								'tanggal_selesai' => $expr,
								'waktu' => '23:59:59'
								);
							$this->model_datareminder_home->getData($val,'data_reminder');
							$data['alert'] = 'success';

							$this->load->model('model_dataganti_profile');
							$wheres = array('username' => $this->session->userdata('nama'));
							$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

							$this->load->view('admin/data_reminder/home',$data);
						}
						else
						{
							$data['alert'] = 'error';

							$this->load->model('model_dataganti_profile');
							$wheres = array('username' => $this->session->userdata('nama'));
							$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();
							
							$this->load->view('admin/data_reminder/home',$data);
						}
				}
				else
				{
					if(($arrlevel[0] == 'SMP' || $arrlevel[0] == 'MTS') && $kelas <= 3)
				 		{
							$val = array(
								'id_pengumuman' =>  uniqid(),
								'id_user' =>  $arrlevel[1],
								'nama' => 'Kolektif Group',
								'judul' => $judul,
								'isi' => $isi,
								'kelas' => $kelas,
								'level' => $arrlevel[0],
								'penerima' => $penerima,
								'tanggal_buat' => date('Y-m-d'),
								'tanggal_selesai' => $expr,
								'waktu' => date('H:i:s')
								);
							$this->model_datareminder_home->getData($val,'data_reminder');
							$data['alert'] = 'success';

							$this->load->model('model_dataganti_profile');
							$wheres = array('username' => $this->session->userdata('nama'));
							$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

							$this->load->view('admin/data_reminder/home',$data);
						}
						else if(($arrlevel[0] == 'SMA' || $arrlevel[0] == 'SMK' || $arrlevel[0] == 'MA') && $kelas <= 3)
				 		{
							$val = array(
								'id_pengumuman' =>  uniqid(),
								'id_user' =>  $arrlevel[1],
								'nama' => 'Kolektif Group',
								'judul' => $judul,
								'isi' => $isi,
								'kelas' => $kelas,
								'level' => $arrlevel[0],
								'penerima' => $penerima,
								'tanggal_buat' => date('Y-m-d'),
								'tanggal_selesai' => $expr,
								'waktu' => date('H:i:s')
								);
							$this->model_datareminder_home->getData($val,'data_reminder');
							$data['alert'] = 'success';

							$this->load->model('model_dataganti_profile');
							$wheres = array('username' => $this->session->userdata('nama'));
							$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

							$this->load->view('admin/data_reminder/home',$data);
						}
						else if($arrlevel[0] == 'SD' && $kelas <= 6)
				 		{
							$val = array(
								'id_pengumuman' =>  uniqid(),
								'id_user' =>  $arrlevel[1],
								'nama' => 'Kolektif Group',
								'judul' => $judul,
								'isi' => $isi,
								'kelas' => $kelas,
								'level' => $arrlevel[0],
								'penerima' => $penerima,
								'tanggal_buat' => date('Y-m-d'),
								'tanggal_selesai' => $expr,
								'waktu' => date('H:i:s')
								);
							$this->model_datareminder_home->getData($val,'data_reminder');
							$data['alert'] = 'success';

							$this->load->model('model_dataganti_profile');
							$wheres = array('username' => $this->session->userdata('nama'));
							$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

							$this->load->view('admin/data_reminder/home',$data);
						}
						else
						{
							$data['alert'] = 'error';

							$this->load->model('model_dataganti_profile');
							$wheres = array('username' => $this->session->userdata('nama'));
							$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();
							
							$this->load->view('admin/data_reminder/home',$data);
						}
				}

			}
			else if(strlen($isi) != 0 && strlen($judul) != 0 && strlen($kelas) != 0 && strlen($penerima) != 0 && strlen($expr) != 0 && $expr >= date('Y-m-d') && $penerima == 'Guru')
		 	{
		 		if($expr == date('Y-m-d'))
		 		{
					$val = array(
						'id_pengumuman' =>  uniqid(),
						'id_user' =>  $arrkelas[2],
						'nama' => 'Kolektif Group',
						'judul' => $judul,
						'isi' => $isi,
						'kelas' => $arrkelas[0],
						'level' => $arrkelas[1],
						'penerima' => $penerima,
						'tanggal_selesai' => $expr,
						'tanggal_buat' => date('Y-m-d'),
						'waktu' => '23:59:59'
						);
					$this->model_datareminder_home->getData($val,'data_reminder');
					$data['alert'] = 'success';

					$this->load->model('model_dataganti_profile');
					$wheres = array('username' => $this->session->userdata('nama'));
					$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

					$this->load->view('admin/data_reminder/home',$data);
				}
				else
				{
					$val = array(
						'id_pengumuman' =>  uniqid(),
						'id_user' =>  $arrkelas[2],
						'nama' => 'Kolektif Group',
						'judul' => $judul,
						'isi' => $isi,
						'kelas' => $arrkelas[0],
						'level' => $arrkelas[1],
						'penerima' => $penerima,
						'tanggal_selesai' => $expr,
						'tanggal_buat' => date('Y-m-d'),
						'waktu' => date('H:i:s')
						);
					$this->model_datareminder_home->getData($val,'data_reminder');
					$data['alert'] = 'success';

					$this->load->model('model_dataganti_profile');
					$wheres = array('username' => $this->session->userdata('nama'));
					$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

					$this->load->view('admin/data_reminder/home',$data);
				}
			}
			else
			{
				$data['alert'] = 'error';

				$this->load->model('model_dataganti_profile');
				$wheres = array('username' => $this->session->userdata('nama'));
				$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();
				
				$this->load->view('admin/data_reminder/home',$data);
			}
		}
		else if($tipe == "singular")
		{
			if(strlen($isi) != 0 && strlen($judul) != 0 && strlen($expr) != 0 && strlen($nama) != 0 && $expr >= date('Y-m-d'))
		 	{
		 		if($expr == date('Y-m-d'))
		 		{
			 		if($arrnama[2] != '0')
			 		{
			 			$val = array(
						'id_pengumuman' =>  uniqid(),
						'id_user' =>  $arrnama[6],
						'nama' => $arrnama[0]." ".$arrnama[1],
						'judul' => $judul,
						'isi' => $isi,
						'kelas' => $arrnama[2],
						'level' => $arrnama[3],
						'penerima' => $arrnama[4],
						'tanggal_selesai' => $expr,
						'tanggal_buat' => date('Y-m-d'),
						'waktu' => '23:59:59'
						);
						$this->model_datareminder_home->getData($val,'data_reminder');
						$data['alert'] = 'success';

						$this->load->model('model_dataganti_profile');
						$wheres = array('username' => $this->session->userdata('nama'));
						$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

						$this->load->library('email');
						$config['protocol'] = 'smtp';
						$config['smtp_host'] = 'ssl://smtp.gmail.com';
						$config['smtp_port'] = '465';
						$config['smtp_timeout'] = '7';
						$config['smtp_user'] = $uname_sender;
						$config['smtp_pass'] = $pass_sender;
						$config['charset'] = 'utf-8';
						$config['newline'] = "\r\n";
						$config['mailtype'] = 'html';
						$config['validation'] = TRUE;
						$this->email->initialize($config);

						$this->email->to($arrnama[5]);
						$this->email->from('galileogasing@gmail.com','data_karyawan Galileo Gasing');
						$this->email->subject($judul);
						$this->email->message($isi);
						$this->email->send();

						$this->load->view('admin/data_reminder/home',$data);
			 		}
			 		else
			 		{
			 			$val = array(
						'id_pengumuman' =>  uniqid(),
						'id_user' =>  $arrnama[6],
						'nama' => $arrnama[0]." ".$arrnama[1],
						'judul' => $judul,
						'isi' => $isi,
						'kelas' => " ",
						'level' => $arrnama[3],
						'penerima' => $arrnama[4],
						'tanggal_selesai' => $expr,
						'tanggal_buat' => date('Y-m-d'),
						'waktu' => '23:59:59'
						);
						$this->model_datareminder_home->getData($val,'data_reminder');
						$data['alert'] = 'success';

						$this->load->model('model_dataganti_profile');
						$wheres = array('username' => $this->session->userdata('nama'));
						$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

						$this->load->library('email');
						$config['protocol'] = 'smtp';
						$config['smtp_host'] = 'ssl://smtp.gmail.com';
						$config['smtp_port'] = '465';
						$config['smtp_timeout'] = '7';
						$config['smtp_user'] = $uname_sender;
						$config['smtp_pass'] = $pass_sender;
						$config['charset'] = 'utf-8';
						$config['newline'] = "\r\n";
						$config['mailtype'] = 'html';
						$config['validation'] = TRUE;
						$this->email->initialize($config);

						$this->email->to($arrnama[5]);
						$this->email->from('galileogasing@gmail.com','data_karyawan Galileo Gasing');
						$this->email->subject($judul);
						$this->email->message($isi);
						$this->email->send();

						$this->load->view('admin/data_reminder/home',$data);
			 		}
		 		}
		 		else
		 		{
		 			if($arrnama[2] != '0')
			 		{
			 			$val = array(
						'id_pengumuman' =>  uniqid(),
						'id_user' =>  $arrnama[6],
						'nama' => $arrnama[0]." ".$arrnama[1],
						'judul' => $judul,
						'isi' => $isi,
						'kelas' => $arrnama[2],
						'level' => $arrnama[3],
						'penerima' => $arrnama[4],
						'tanggal_selesai' => $expr,
						'tanggal_buat' => date('Y-m-d'),
						'waktu' => date('H:i:s')
						);
						$this->model_datareminder_home->getData($val,'data_reminder');
						$data['alert'] = 'success';

						$this->load->model('model_dataganti_profile');
						$wheres = array('username' => $this->session->userdata('nama'));
						$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

						$this->load->library('email');
						$config['protocol'] = 'smtp';
						$config['smtp_host'] = 'ssl://smtp.gmail.com';
						$config['smtp_port'] = '465';
						$config['smtp_timeout'] = '7';
						$config['smtp_user'] = $uname_sender;
						$config['smtp_pass'] = $pass_sender;
						$config['charset'] = 'utf-8';
						$config['newline'] = "\r\n";
						$config['mailtype'] = 'html';
						$config['validation'] = TRUE;
						$this->email->initialize($config);

						$this->email->to($arrnama[5]);
						$this->email->from('galileogasing@gmail.com','data_karyawan Galileo Gasing');
						$this->email->subject($judul);
						$this->email->message($isi);
						$this->email->send();

						$this->load->view('admin/data_reminder/home',$data);
			 		}
			 		else
			 		{
			 			$val = array(
						'id_pengumuman' =>  uniqid(),
						'id_user' =>  $arrnama[6],
						'nama' => $arrnama[0]." ".$arrnama[1],
						'judul' => $judul,
						'isi' => $isi,
						'kelas' => " ",
						'level' => $arrnama[3],
						'penerima' => $arrnama[4],
						'tanggal_selesai' => $expr,
						'tanggal_buat' => date('Y-m-d'),
						'waktu' => date('H:i:s')
						);
						$this->model_datareminder_home->getData($val,'data_reminder');
						$data['alert'] = 'success';

						$this->load->model('model_dataganti_profile');
						$wheres = array('username' => $this->session->userdata('nama'));
						$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

						$this->load->library('email');
						$config['protocol'] = 'smtp';
						$config['smtp_host'] = 'ssl://smtp.gmail.com';
						$config['smtp_port'] = '465';
						$config['smtp_timeout'] = '7';
						$config['smtp_user'] = $uname_sender;
						$config['smtp_pass'] = $pass_sender;
						$config['charset'] = 'utf-8';
						$config['newline'] = "\r\n";
						$config['mailtype'] = 'html';
						$config['validation'] = TRUE;
						$this->email->initialize($config);

						$this->email->to($arrnama[5]);
						$this->email->from('galileogasing@gmail.com','data_karyawan Galileo Gasing');
						$this->email->subject($judul);
						$this->email->message($isi);
						$this->email->send();

						$this->load->view('admin/data_reminder/home',$data);
			 		}
		 		}
				
			}
			else
			{
				$data['alert'] = 'error';

				$this->load->model('model_dataganti_profile');
				$wheres = array('username' => $this->session->userdata('nama'));
				$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();
				
				$this->load->view('admin/data_reminder/home',$data);
			}
		}
		else
		{
			$data['alert'] = 'error';

			$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();
			
			$this->load->view('admin/data_reminder/home',$data);
		}
	}
}