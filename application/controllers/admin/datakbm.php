<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class datakbm extends CI_Controller 
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
		$this->load->model('model_datakbm_SD');
		$data['data_kbm'] = $this->model_datakbm_SD->tampilData()->result();

		$this->load->model('model_dataganti_profile');
		$wheres = array('username' => $this->session->userdata('nama'));
		$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_kbm/SD',$data);
	}
	public function hapus_SD($tahun){
		$this->load->model('model_datakbm_SD');
		$where = array('tanggal' => $tahun, 'level' => 'SD');
		$this->model_datakbm_SD->hapus_data($where,'data_kbm');
		redirect('admin/datakbm/SD');
	}
	public function jml_SD()
	{
		$this->load->model('model_datakbm_SD');
		$this->load->helper('url');
		$data['data_kbm'] = $this->model_datakbm_SD->hitungJmlData()->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_kbm/SD',$data);
	}

	/*========================================SMP=======================================================*/
	
	public function SMP()
	{
		$this->load->helper('url');
		$this->load->model('model_datakbm_SMP');
		$data['data_kbm'] = $this->model_datakbm_SMP->tampilData()->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_kbm/SMP',$data);
	}
	public function hapus_SMP($tahun){
		$this->load->model('model_datakbm_SMP');
		$where = array('tanggal' => $tahun);
		$this->model_datakbm_SMP->hapus_data($where,'data_kbm');
		redirect('admin/datakbm/SMP');
	}
	public function jml_SMP()
	{
		$this->load->model('model_datakbm_SMP');
		$this->load->helper('url');
		$data['data_kbm'] = $this->model_datakbm_SMP->hitungJmlData()->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_kbm/SMP',$data);
	}

	/*========================================SMA=======================================================*/
	public function SMA()
	{
		$this->load->helper('url');
		$this->load->model('model_datakbm_SMA');
		$data['data_kbm'] = $this->model_datakbm_SMA->tampilData()->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_kbm/SMA',$data);
	}
	public function hapus_SMA($tahun){
		$this->load->model('model_datakbm_SMA');
		$where = array('tanggal' => $tahun);
		$this->model_datakbm_SMA->hapus_data($where,'data_kbm');
		redirect('admin/datakbm/SMA');
	}
	public function jml_SMA()
	{
		$this->load->model('model_datakbm_SMA');
		$this->load->helper('url');
		$data['data_kbm'] = $this->model_datakbm_SMA->hitungJmlData()->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();
			
		$this->load->view('admin/data_kbm/SMA',$data);
	}
}