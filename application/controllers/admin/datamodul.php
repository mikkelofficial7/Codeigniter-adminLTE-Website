<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class datamodul extends CI_Controller 
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
	
	/*========================================SD=======================================================*/
	public function SD()
	{
		$this->load->helper('url');
		$this->load->model('model_datamodul');
		$data['modul'] = $this->model_datamodul->tampilDataSD('data_link_modul')->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_modul/SD',$data);
	}

	/*========================================SMP=======================================================*/
	
	public function SMP()
	{
		$this->load->helper('url');
		$this->load->model('model_datamodul');
		$data['modul'] = $this->model_datamodul->tampilDataSMP('data_link_modul')->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_modul/SMP',$data);
	}

	/*========================================SMA=======================================================*/
	public function SMA()
	{
		$this->load->helper('url');
		$this->load->model('model_datamodul');
		$data['modul'] = $this->model_datamodul->tampilDataSMA('data_link_modul')->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();
			
		$this->load->view('admin/data_modul/SMA',$data);
	}
}