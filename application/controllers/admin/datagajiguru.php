<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class datagajiguru extends CI_Controller 
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
	
	/*========================================gaji SD=======================================================*/
	public function SD()
	{
		$this->load->helper('url');
		$this->load->model('model_datagaji_SD');
		$where = array('level' => 'SD');
		$data['data_gaji'] = $this->model_datagaji_SD->tampilData('data_gajiguru', $where)->result();
		$data['total_gaji'] = $this->model_datagaji_SD->hitungTotalGaji('data_gajiguru')->result();

		$this->load->model('model_dataganti_profile');
		$wheres = array('username' => $this->session->userdata('nama'));
		$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_gajiguru/SD',$data);
	}
	public function hapus_gajiSD($id){
		$this->load->model('model_datagaji_SD');
		$where = array('id' => $id);
		$this->model_datagaji_SD->hapus_data($where,'data_gajiguru');
		$this->model_datagaji_SD->hapus_data($where,'data_gajiguru_temp');
		redirect('admin/datagajiguru/SD');
	}
	public function ubah_gajiSD($id){
		$this->load->model('model_datagaji_SD');
		$where = array('status_gaji' => 'DITERIMA');
		$this->model_datagaji_SD->ubah_data($id,$where);
		redirect('admin/datagajiguru/SD');
	}
	public function jml_gajiSD()
	{
		$this->load->model('model_datagaji_SD');
		$this->load->helper('url');
		$data['data_gaji'] = $this->model_datagaji_SD->hitungJmlData()->result();

		$this->load->model('model_dataganti_profile');
		$wheres = array('username' => $this->session->userdata('nama'));
		$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_gajiguru/SD',$data);
	}



	/*========================================gaji SMP=======================================================*/
	public function SMP()
	{
		$this->load->helper('url');
		$this->load->model('model_datagaji_SMP');
		$where = array('level' => 'SMP');
		$data['data_gaji'] = $this->model_datagaji_SMP->tampilData('data_gajiguru', $where)->result();
		$data['total_gaji'] = $this->model_datagaji_SMP->hitungTotalGaji('data_gajiguru')->result();

		$this->load->model('model_dataganti_profile');
		$wheres = array('username' => $this->session->userdata('nama'));
		$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_gajiguru/SMP',$data);
	}
	public function hapus_gajiSMP($id){
		$this->load->model('model_datagaji_SMP');
		$where = array('id' => $id);
		$this->model_datagaji_SMP->hapus_data($where,'data_gajiguru');
		$this->model_datagaji_SMP->hapus_data($where,'data_gajiguru_temp');
		redirect('admin/datagajiguru/SMP');
	}
	public function ubah_gajiSMP($id){
		$this->load->model('model_datagaji_SMP');
		$where = array('status_gaji' => 'DITERIMA');
		$this->model_datagaji_SMP->ubah_data($id,$where);
		redirect('admin/datagajiguru/SMP');
	}
	public function jml_gajiSMP()
	{
		$this->load->model('model_datagaji_SMP');
		$this->load->helper('url');
		$data['data_gaji'] = $this->model_datagaji_SMP->hitungJmlData()->result();

		$this->load->model('model_dataganti_profile');
		$wheres = array('username' => $this->session->userdata('nama'));
		$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_gajiguru/SMP',$data);
	}




	/*========================================gaji SMA=======================================================*/
	public function SMA()
	{
		$this->load->helper('url');
		$this->load->model('model_datagaji_SMA');
		$where = array('level' => 'SMA');
		$data['data_gaji'] = $this->model_datagaji_SMA->tampilData('data_gajiguru', $where)->result();
		$data['total_gaji'] = $this->model_datagaji_SMA->hitungTotalGaji('data_gajiguru')->result();

		$this->load->model('model_dataganti_profile');
		$wheres = array('username' => $this->session->userdata('nama'));
		$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_gajiguru/SMA',$data);
	}
	public function hapus_gajiSMA($id){
		$this->load->model('model_datagaji_SMA');
		$where = array('id' => $id);
		$this->model_datagaji_SMA->hapus_data($where,'data_gajiguru');
		$this->model_datagaji_SMA->hapus_data($where,'data_gajiguru_temp');

		redirect('admin/datagajiguru/SMA');
	}
	public function ubah_gajiSMA($id){
		$this->load->model('model_datagaji_SMA');
		$where = array('status_gaji' => 'DITERIMA');
		$this->model_datagaji_SMA->ubah_data($id,$where);
		redirect('admin/datagajiguru/SMA');
	}
	public function jml_gajiSMA()
	{
		$this->load->model('model_datagaji_SMA');
		$this->load->helper('url');
		$data['data_gaji'] = $this->model_datagaji_SMA->hitungJmlData()->result();

		$this->load->model('model_dataganti_profile');
		$wheres = array('username' => $this->session->userdata('nama'));
		$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();
			
		$this->load->view('admin/data_gajiguru/SMA',$data);
	}
}