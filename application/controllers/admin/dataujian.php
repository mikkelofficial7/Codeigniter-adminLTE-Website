<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dataujian extends CI_Controller 
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
		$this->load->model('model_dataujian_SD');
		$data['data_siswa'] = $this->model_dataujian_SD->tampilData()->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_ujian/SD',$data);
	}
	public function hapus_SD($id){
		$this->load->model('model_dataujian_SD');
		$where = array('id_soal' => $id);
		$this->model_dataujian_SD->hapus_data($where,'data_ujian');
		redirect('admin/dataujian/SD');
	}
	public function jml_SD()
	{
		$this->load->model('model_dataujian_SD');
		$this->load->helper('url');
		$data['data_siswa'] = $this->model_dataujian_SD->hitungJmlData()->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_ujian/SD',$data);
	}

	/*========================================SMP=======================================================*/
	
	public function SMP()
	{
		$this->load->helper('url');
		$this->load->model('model_dataujian_SMP');
		$data['data_siswa'] = $this->model_dataujian_SMP->tampilData()->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_ujian/SMP',$data);
	}
	public function hapus_SMP($id){
		$this->load->model('model_dataujian_SMP');
		$where = array('id_soal' => $id);
		$this->model_dataujian_SMP->hapus_data($where,'data_ujian');
		redirect('admin/dataujian/SMP');
	}
	public function jml_SMP()
	{
		$this->load->model('model_dataujian_SMP');
		$this->load->helper('url');
		$data['data_siswa'] = $this->model_dataujian_SMP->hitungJmlData()->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_ujian/SMP',$data);
	}

	/*========================================SMA=======================================================*/
	public function SMA()
	{
		$this->load->helper('url');
		$this->load->model('model_dataujian_SMA');
		$data['data_siswa'] = $this->model_dataujian_SMA->tampilData()->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_ujian/SMA',$data);
	}
	public function hapus_SMA($id){
		$this->load->model('model_dataujian_SMA');
		$where = array('id_soal' => $id);
		$this->model_dataujian_SMA->hapus_data($where,'data_ujian');
		redirect('admin/dataujian/SMA');
	}
	public function jml_SMA()
	{
		$this->load->model('model_dataujian_SMA');
		$this->load->helper('url');
		$data['data_siswa'] = $this->model_dataujian_SMA->hitungJmlData()->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();
			
		$this->load->view('admin/data_ujian/SMA',$data);
	}
}