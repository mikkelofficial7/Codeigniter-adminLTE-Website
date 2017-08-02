<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tambahpegawai extends CI_Controller 
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
	
	/*========================================barang=======================================================*/
	public function index()
	{
		$this->load->model('model_absence');
		$data['compare'] = $this->model_absence->getNamaCompare('compare_karyawan')->result();
		$data['alert'] = '';	
		$this->load->view('admin/tambah_pegawai/home', $data);
	}
	public function editgaji()
	{
		$this->load->model('model_absence');
		$data['compare'] = $this->model_absence->getNamaCompare()->result();

		$this->load->model('model_tambahpegawai');
		$id =  $this->input->post('id');
		$arrid = explode(" ", $id);
		$gaji = $this->input->post('gaji');
		$transport = $this->input->post('transport');
		if(is_numeric($gaji) == false || is_numeric($transport) == false)
		{
			$data['alert'] = 'error1';
			$this->load->view('admin/tambah_pegawai/home', $data);
		}
		else if($arrid[0] == "")
		{
			$data['alert'] = 'error2';
			$this->load->view('admin/tambah_pegawai/home', $data);
		}
		else
		{
			$val = array(
				'gaji_pokok' => $gaji,
				'gaji_makan' => $transport
				);
			$this->model_tambahpegawai->updateData($arrid[0], $val);

			$this->load->model('model_absence');
			$data['compare'] = $this->model_absence->getNamaCompare()->result();

			$data['alert'] = 'successs';
			$this->load->view('admin/tambah_pegawai/home', $data);
		}
	}
	public function input()
	{
		$this->load->model('model_tambahpegawai');

		$this->load->model('model_absence');
		$data['compare'] = $this->model_absence->getNamaCompare()->result();

		$this->load->helper('url'); 
		$namadepan = $this->input->post('namadepan');
		$namabelakang = $this->input->post('namabelakang');
		$posisi = $this->input->post('posisi');
		$jeniskelamin = $this->input->post('jeniskelamin');
		$telp = $this->input->post('telp');
		$gaji = $this->input->post('gaji');
		$transport = $this->input->post('transport');

		$fileurl = $_FILES['photo']['name'];

		if($fileurl == null)
		{
			$foto = "";

			if($jeniskelamin == "Pria")
			{
				$foto = "./data_admin/karyawan_img/male.jpg";
			}
			else
			{
				$foto = "./data_admin/karyawan_img/female.jpg";
			}

			if(is_numeric($telp) == false)
			{
				$data['alert'] = 'errortelp';
				$this->load->view('admin/tambah_pegawai/home', $data);
			}
			else if(is_numeric($gaji) == false || is_numeric($transport) == false)
			{
				$data['alert'] = 'errorgaji';
				$this->load->view('admin/tambah_pegawai/home', $data);
			}
			else
			{

				if($posisi == 'KEPALA')
				{
					$id = "K-".uniqid();
					$username = "G2-Kepala-".uniqid();
					$val = array(
						'id' => $id,
						'nama_depan' => $namadepan,
						'nama_belakang' => $namabelakang,
						'username' => $username,
						'password' => md5(uniqid()),
						'email' => "G2-K-".substr($id,10)."@gmail.com",
						'jenis_kelamin' => $jeniskelamin,
						'telp' => $telp,
						'foto' => $foto,
						'status_online' => 'ONLINE'
						);
					$this->model_tambahpegawai->insertData($val, 'data_karyawan');
					$val = array(
						'id' => $id,
						'gaji_pokok' => $gaji,
						'gaji_makan' => $transport
						);
					$this->model_tambahpegawai->insertData($val, 'compare_karyawan');
					$data['alert'] = 'success';	
					$this->load->view('admin/tambah_pegawai/home', $data);
				}
				else if($posisi == 'MARKETING')
				{
					$id = "M-".uniqid();
					$username = "G2-Marketing-".uniqid();
					$val = array(
						'id' => $id,
						'nama_depan' => $namadepan,
						'nama_belakang' => $namabelakang,
						'username' => $username,
						'password' => md5(uniqid()),
						'email' => "G2-M-".substr($id,10)."@gmail.com",
						'jenis_kelamin' => $jeniskelamin,
						'telp' => $telp,
						'foto' => $foto,
						'status_online' => 'ONLINE'
						);
					$this->model_tambahpegawai->insertData($val, 'data_karyawan');
					$val = array(
						'id' => $id,
						'gaji_pokok' => $gaji,
						'gaji_makan' => $transport
						);
					$this->model_tambahpegawai->insertData($val, 'compare_karyawan');
					$data['alert'] = 'success';	
					$this->load->view('admin/tambah_pegawai/home', $data);
				}
				else if($posisi == 'PEGAWAI')
				{
					$id = "P-".uniqid();
					$username = "G2-Pegawai-".uniqid();
					$val = array(
						'id' => $id,
						'nama_depan' => $namadepan,
						'nama_belakang' => $namabelakang,
						'username' => $username,
						'password' => md5(uniqid()),
						'email' => "G2-P-".substr($id,10)."@gmail.com",
						'jenis_kelamin' => $jeniskelamin,
						'telp' => $telp,
						'foto' => $foto,
						'status_online' => 'ONLINE'
						);
					$this->model_tambahpegawai->insertData($val, 'data_karyawan');
					$val = array(
						'id' => $id,
						'gaji_pokok' => $gaji,
						'gaji_makan' => $transport
						);
					$this->model_tambahpegawai->insertData($val, 'compare_karyawan');
					$data['alert'] = 'success';	
					$this->load->view('admin/tambah_pegawai/home', $data);
				}
				else if($posisi == 'FREELANCER')
				{
					$id = "F-".uniqid();
					$username = "G2-Freelancer-".uniqid();
					$val = array(
						'id' => $id,
						'nama_depan' => $namadepan,
						'nama_belakang' => $namabelakang,
						'username' => $username,
						'password' => md5(uniqid()),
						'email' => "G2-F-".substr($id,10)."@gmail.com",
						'jenis_kelamin' => $jeniskelamin,
						'telp' => $telp,
						'foto' => $foto,
						'status_online' => 'ONLINE'
						);
					$this->model_tambahpegawai->insertData($val, 'data_karyawan');
					$val = array(
						'id' => $id,
						'gaji_pokok' => $gaji,
						'gaji_makan' => $transport
						);
					$this->model_tambahpegawai->insertData($val, 'compare_karyawan');
					$data['alert'] = 'success';	
					$this->load->view('admin/tambah_pegawai/home', $data);
				}
			}
		}
		else
		{
			if(is_numeric($telp) == false)
			{
				$data['alert'] = 'errortelp';
				$this->load->view('admin/tambah_pegawai/home', $data);
			}
			else if(is_numeric($gaji) == false || is_numeric($transport) == false)
			{
				$data['alert'] = 'errorgaji';
				$this->load->view('admin/tambah_pegawai/home', $data);
			}
			else
			{									
				if($posisi == 'KEPALA')
				{
					$id = "K-".uniqid();
					$username = "G2-Kepala-".uniqid();

					$arrurl = explode(".", $fileurl);

					$config['file_name'] 			= $id.".".$arrurl[1];
					$config['upload_path']          = './data_admin/karyawan_img/';
					$config['allowed_types']        = 'jpg|png|gif|jpeg';
					$config['max_size']             = 500;
					$config['max_width']            = 1024;
					$config['max_height']           = 768;

					$this->load->library('upload', $config);
			 
					if ($this->upload->do_upload('photo') == null || $config['max_width'] > 1024 || $config['max_height'] > 768)
					{
						$data = array('upload_data' => $this->upload->display_errors());
						$data['alert'] = 'errorfoto';
						$this->load->helper('url');
						$this->load->view('admin/tambah_pegawai/home', $data);
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());

						$data = $this->upload->data();
						$config['image_library'] = 'gd2';
						$config['source_image'] = $data['full_path'];
				        $config['maintain_ratio'] = TRUE;
				        $config['width']     = 250;
				        $config['height']   = 150;

				        $this->load->library('image_lib', $config); 

				        if (!$this->image_lib->resize()) {
			                $this->handle_error($this->image_lib->display_errors());
			            }


						$val = array(
							'id' => $id,
							'nama_depan' => $namadepan,
							'nama_belakang' => $namabelakang,
							'username' => $username,
							'password' => md5(uniqid()),
							'email' => "G2-K-".substr($id,10)."@gmail.com",
							'jenis_kelamin' => $jeniskelamin,
							'telp' => $telp,
							'foto' => $config['upload_path'].$id.".".$arrurl[1],
							'status_online' => 'ONLINE'
							);
						$this->model_tambahpegawai->insertData($val, 'data_karyawan');
						$val = array(
							'id' => $id,
							'gaji_pokok' => $gaji,
							'gaji_makan' => $transport
							);
						$this->model_tambahpegawai->insertData($val, 'compare_karyawan');
						$data['alert'] = 'success';	
						$this->load->view('admin/tambah_pegawai/home', $data);
			        }
				}
				else if($posisi == 'MARKETING')
				{
					$id = "M-".uniqid();
					$username = "G2-Marketing-".uniqid();

					$arrurl = explode(".", $fileurl);

					$config['file_name'] 			= $id.".".$arrurl[1];
					$config['upload_path']          = './data_admin/karyawan_img/';
					$config['allowed_types']        = 'jpg|png|gif|jpeg';
					$config['max_size']             = 500;
					$config['max_width']            = 1024;
					$config['max_height']           = 768;

					$this->load->library('upload', $config);
			 
					if ($this->upload->do_upload('photo') == null || $config['max_width'] > 1024 || $config['max_height'] > 768)
					{
						$data = array('upload_data' => $this->upload->display_errors());
						$data['alert'] = 'errorfoto';
						$this->load->helper('url');
						$this->load->view('admin/tambah_pegawai/home', $data);
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());

						$data = $this->upload->data();
						$config['image_library'] = 'gd2';
						$config['source_image'] = $data['full_path'];
				        $config['maintain_ratio'] = TRUE;
				        $config['width']     = 250;
				        $config['height']   = 150;

				        $this->load->library('image_lib', $config); 

				        if (!$this->image_lib->resize()) {
			                $this->handle_error($this->image_lib->display_errors());
			            }


						$val = array(
							'id' => $id,
							'nama_depan' => $namadepan,
							'nama_belakang' => $namabelakang,
							'username' => $username,
							'password' => md5(uniqid()),
							'email' => "G2-M-".substr($id,10)."@gmail.com",
							'jenis_kelamin' => $jeniskelamin,
							'telp' => $telp,
							'foto' => $config['upload_path'].$id.".".$arrurl[1],
							'status_online' => 'ONLINE'
							);
						$this->model_tambahpegawai->insertData($val, 'data_karyawan');
						$val = array(
							'id' => $id,
							'gaji_pokok' => $gaji,
							'gaji_makan' => $transport
							);
						$this->model_tambahpegawai->insertData($val, 'compare_karyawan');
						$data['alert'] = 'success';	
						$this->load->view('admin/tambah_pegawai/home', $data);
			        }
				}
				else if($posisi == 'PEGAWAI')
				{
					$id = "P-".uniqid();
					$username = "G2-Pegawai-".uniqid();

					$arrurl = explode(".", $fileurl);

					$config['file_name'] 			= $id.".".$arrurl[1];
					$config['upload_path']          = './data_admin/karyawan_img/';
					$config['allowed_types']        = 'jpg|png|gif|jpeg';
					$config['max_size']             = 500;
					$config['max_width']            = 1024;
					$config['max_height']           = 768;

					$this->load->library('upload', $config);
			 
					if ($this->upload->do_upload('photo') == null || $config['max_width'] > 1024 || $config['max_height'] > 768)
					{
						$data = array('upload_data' => $this->upload->display_errors());
						$data['alert'] = 'errorfoto';
						$this->load->helper('url');
						$this->load->view('admin/tambah_pegawai/home', $data);
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());

						$data = $this->upload->data();
						$config['image_library'] = 'gd2';
						$config['source_image'] = $data['full_path'];
				        $config['maintain_ratio'] = TRUE;
				        $config['width']     = 250;
				        $config['height']   = 150;

				        $this->load->library('image_lib', $config); 

				        if (!$this->image_lib->resize()) {
			                $this->handle_error($this->image_lib->display_errors());
			            }


						$val = array(
							'id' => $id,
							'nama_depan' => $namadepan,
							'nama_belakang' => $namabelakang,
							'username' => $username,
							'password' => md5(uniqid()),
							'email' => "G2-P-".substr($id,10)."@gmail.com",
							'jenis_kelamin' => $jeniskelamin,
							'telp' => $telp,
							'foto' => $config['upload_path'].$id.".".$arrurl[1],
							'status_online' => 'ONLINE'
							);
						$this->model_tambahpegawai->insertData($val, 'data_karyawan');
						$val = array(
							'id' => $id,
							'gaji_pokok' => $gaji,
							'gaji_makan' => $transport
							);
						$this->model_tambahpegawai->insertData($val, 'compare_karyawan');
						$data['alert'] = 'success';	
						$this->load->view('admin/tambah_pegawai/home', $data);
			        }
				}
				else if($posisi == 'FREELANCER')
				{
					$id = "F-".uniqid();
					$username = "G2-Freelancer-".uniqid();

					$arrurl = explode(".", $fileurl);

					$config['file_name'] 			= $id.".".$arrurl[1];
					$config['upload_path']          = './data_admin/karyawan_img/';
					$config['allowed_types']        = 'jpg|png|gif|jpeg';
					$config['max_size']             = 500;
					$config['max_width']            = 1024;
					$config['max_height']           = 768;

					$this->load->library('upload', $config);
			 
					if ($this->upload->do_upload('photo') == null || $config['max_width'] > 1024 || $config['max_height'] > 768)
					{
						$data = array('upload_data' => $this->upload->display_errors());
						$data['alert'] = 'errorfoto';
						$this->load->helper('url');
						$this->load->view('admin/tambah_pegawai/home', $data);
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());

						$data = $this->upload->data();
						$config['image_library'] = 'gd2';
						$config['source_image'] = $data['full_path'];
				        $config['maintain_ratio'] = TRUE;
				        $config['width']     = 250;
				        $config['height']   = 150;

				        $this->load->library('image_lib', $config); 

				        if (!$this->image_lib->resize()) {
			                $this->handle_error($this->image_lib->display_errors());
			            }


						$val = array(
							'id' => $id,
							'nama_depan' => $namadepan,
							'nama_belakang' => $namabelakang,
							'username' => $username,
							'password' => md5(uniqid()),
							'email' => "G2-F-".substr($id,10)."@gmail.com",
							'jenis_kelamin' => $jeniskelamin,
							'telp' => $telp,
							'foto' => $config['upload_path'].$id.".".$arrurl[1],
							'status_online' => 'ONLINE'
							);
						$this->model_tambahpegawai->insertData($val, 'data_karyawan');
						$val = array(
							'id' => $id,
							'gaji_pokok' => $gaji,
							'gaji_makan' => $transport
							);
						$this->model_tambahpegawai->insertData($val, 'compare_karyawan');
						$data['alert'] = 'success';	
						$this->load->view('admin/tambah_pegawai/home', $data);
			        }
				}
			}
		}
	}
}