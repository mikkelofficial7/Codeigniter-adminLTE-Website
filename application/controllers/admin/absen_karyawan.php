<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class absen_karyawan extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('status') != "login")
		{
			//kalau masih ada session login dia langsung masuk, kalau tidak ada langsung ke halaman login
			redirect(base_url("admin/login")); 
			$this->load->model('model_absence');
		}	
	}

	function dataEmployee()
	{
		$this->load->model('model_absence');
		$data['employee'] = $this->model_absence->tampil_data()->result();

		$this->load->model('model_dataganti_profile');
		$wheres = array('username' => $this->session->userdata('nama'));
		$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();
		
		$this->load->view('admin/absen_pegawai/pegawai',$data);
	}
	public function hapus_absen($username)
	{
		$this->load->model('model_absence');
		$where = array('username' => $username);
		$this->model_absence->hapus_absensi($where,'absen_karyawan');
		redirect('admin/absen_karyawan/dataEmployee');
	}

}
