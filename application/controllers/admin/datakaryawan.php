<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class datakaryawan extends CI_Controller 
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
	
	/*========================================karyawan=======================================================*/
	public function karyawan()
	{
		$this->load->helper('url');
		$this->load->model('model_datakaryawan');
		$data['data_karyawan'] = $this->model_datakaryawan->tampilData()->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_karyawan/karyawan',$data);
	}
	public function hapus_karyawan($id){
		$this->load->model('model_datakaryawan');
		$where = array('id' => $id);

		$data['data_karyawan'] = $this->model_datakaryawan->tampilData()->result();
		foreach($data['data_karyawan'] as $item)
		{
			if($item->id == $id)
			{
				unlink($item->foto);
			}
		}
		$this->model_datakaryawan->hapus_data($where,'data_karyawan');
		redirect('admin/datakaryawan/karyawan');
	}
	public function jml_karyawan()
	{
		$this->load->model('model_datakaryawan');
		$this->load->helper('url');
		$data['data_karyawan'] = $this->model_datakaryawan->hitungJmlData()->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();
			
		$this->load->view('admin/data_karyawan/karyawan',$data);
	}
}