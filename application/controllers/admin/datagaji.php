<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class datagaji extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('status') != "login")
		{
			//kalau masih ada session login dia langsung masuk, kalau tidak ada langsung ke halaman login
			redirect(base_url("admin/login")); 
		}
	}
	
	/*========================================gaji=======================================================*/
	public function gaji()
	{
		$this->load->helper('url');
		$this->load->model('model_datagaji');
		$data['data_total_gaji'] = $this->model_datagaji->tampilData('data_gaji')->result();
		$data['data_gaji'] = $this->model_datagaji->hitungTotalGaji('data_gaji')->result();

		$this->load->model('model_dataganti_profile');
		$wheres = array('username' => $this->session->userdata('nama'));
		$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_gaji/data',$data);
	}
	public function hapus_gaji($id){
		$this->load->model('model_datagaji');
		$where = array('id' => $id);
		$this->model_datagaji->hapus_data($where,'data_gaji');
		redirect('admin/datagaji/gaji');
	}

	public function ubah_gaji($id){
		$this->load->model('model_datagaji');
		$where = array('status_gaji' => 'DITERIMA');
		$this->model_datagaji->ubah_data($id,$where);
		redirect('admin/datagaji/gaji');
	}

	public function jml_gaji()
	{
		$this->load->model('model_datagaji');
		$this->load->helper('url');
		$data['data_gaji'] = $this->model_datagaji->hitungJmlData()->result();

		$this->load->model('model_dataganti_profile');
		$wheres = array('username' => $this->session->userdata('nama'));
		$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_gaji/data',$data);
	}
	public function total_gaji()
	{
		$this->load->model('model_datagaji');
		$this->load->helper('url');
		$data['data_gaji'] = $this->model_datagaji->hitungTotalGaji()->result();

		$this->load->model('model_dataganti_profile');
		$wheres = array('username' => $this->session->userdata('nama'));
		$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();
			
		$this->load->view('admin/data_gaji/data',$data);
	}
}