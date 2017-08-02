<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class databantuan extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('status') != "login")
		{
			//kalau masih ada session login dia langsung masuk, kalau tidak ada langsung ke halaman login
			redirect(base_url("admin/login")); 
		}
		$this->load->library("excel");
	}
	
	/*========================================barang=======================================================*/
	public function bantuan()
	{
		$this->load->model('model_dataganti_profile');
		$wheres = array('username' => $this->session->userdata('nama'));
		$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_bantuan/bantuan',$data);
	}
}