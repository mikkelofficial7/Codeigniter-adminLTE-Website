<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class datagaleri extends CI_Controller 
{
	function __construct()
	{
		date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('model_datagaleri_galeri');
		if($this->session->userdata('status') != "login")
		{
			//kalau masih ada session login dia langsung masuk, kalau tidak ada langsung ke halaman login
			redirect(base_url("admin/login")); 
		}
	}
	
	/*========================================galeri=======================================================*/
	public function galeri()
	{
		$data['alert'] = '';

		$this->load->helper('url');
		$this->load->model('model_datagaleri_galeri');
		$data['data_foto'] = $this->model_datagaleri_galeri->tampilFoto('data_galeri')->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_galeri/galeri',$data);
	}
	public function uploading()
	{
		$this->load->model('model_datagaleri_galeri');

		$desc = $this->input->post('desc');
		$fileurl = $_FILES['berkas']['name'];
		if(!$fileurl)
		{
			redirect(base_url("admin/datagaleri/galeri")); 
		}

		$config['upload_path']          = './data_admin/gambar_gallery/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 500;
		$config['max_width']            = 1200;
		$config['max_height']           = 800;
 
		$this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload('berkas')){
			$data = array('upload_data' => $this->upload->display_errors());
			$data['alert'] = 'error';
			$this->load->helper('url');
			$this->load->model('model_datagaleri_galeri');
			$data['data_foto'] = $this->model_datagaleri_galeri->tampilFoto('data_galeri')->result();

			$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

			$this->load->view('admin/data_galeri/galeri', $data);
		}else{
			$data = array('upload_data' => $this->upload->data());
			$val = array(
				'namafile' => $fileurl,
				'deskripsi' => $desc,
				'tanggal' => date('Y-m-d')
				);
			$this->model_datagaleri_galeri->getData($val,'data_galeri');
			$data['alert'] = 'success';
			$data['data_foto'] = $this->model_datagaleri_galeri->tampilFoto('data_galeri')->result();

			$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();
			
			$this->load->view('admin/data_galeri/galeri',$data);
		}
	}

	public function hapus_foto($namafile){
		$path = "admin/gambar_gallery/".$namafile;
		$this->load->model('model_datagaleri_galeri');
		$where = array('namafile' => $namafile);
		unlink($path); 
		$this->model_datagaleri_galeri->hapus_foto($where,'data_galeri');
		redirect('admin/datagaleri/galeri');
	}
}