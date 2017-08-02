<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dataguru extends CI_Controller 
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
		$this->load->model('model_dataguru_SD');
		$where = array('level' => 'SD');
		$data['data_guru'] = $this->model_dataguru_SD->tampilData($where,'data_guru')->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_guru/SD',$data);
	}
	public function hapus_SD($id){
		$this->load->model('model_dataguru_SD');
		$where = array('id_tutor' => $id, 'level' => 'SD');
		$this->model_dataguru_SD->hapus_data($where,'data_guru');
		redirect('admin/dataguru/SD');
	}
	public function jml_SD()
	{
		$this->load->model('model_dataguru_SD');
		$this->load->helper('url');
		$data['data_guru'] = $this->model_dataguru_SD->hitungJmlData()->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_guru/SD',$data);
	}
	public function verif_SD($id)
	{
		$this->load->model('model_dataguru_SD');
		$val = array(
			'status' => 'SUDAH',
			);
		$this->model_dataguru_SD->update_verif_SD($id, $val);
		redirect(base_url("admin/dataguru/SD"));
	}

	/*========================================SMP=======================================================*/
	
	public function SMP()
	{
		$this->load->helper('url');
		$this->load->model('model_dataguru_SMP');
		$data['data_guru'] = $this->model_dataguru_SMP->tampilData('data_guru')->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_guru/SMP',$data);
	}
	public function hapus_SMP($id){
		$this->load->model('model_dataguru_SMP');
		$where = array('id_tutor' => $id);
		$this->model_dataguru_SMP->hapus_data($where,'data_guru');
		redirect('admin/dataguru/SMP');
	}
	public function jml_SMP()
	{
		$this->load->model('model_dataguru_SMP');
		$this->load->helper('url');
		$data['data_guru'] = $this->model_dataguru_SMP->hitungJmlData()->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_guru/SMP',$data);
	}
	public function verif_SMP($id)
	{
		$this->load->model('model_dataguru_SMP');
		$val = array(
			'status' => 'SUDAH',
			);
		$this->model_dataguru_SMP->update_verif_SMP($id, $val);
		redirect(base_url("admin/dataguru/SMP"));
	}

	/*========================================SMA=======================================================*/
	public function SMA()
	{
		$this->load->helper('url');
		$this->load->model('model_dataguru_SMA');
		$data['data_guru'] = $this->model_dataguru_SMA->tampilData('data_guru')->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_guru/SMA',$data);
	}
	public function hapus_SMA($id){
		$this->load->model('model_dataguru_SMA');
		$where = array('id_tutor' => $id);
		$this->model_dataguru_SMA->hapus_data($where,'data_guru');
		redirect('admin/dataguru/SMA');
	}
	public function jml_SMA()
	{
		$this->load->model('model_dataguru_SMA');
		$this->load->helper('url');
		$data['data_guru'] = $this->model_dataguru_SMA->hitungJmlData()->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();
			
		$this->load->view('admin/data_guru/SMA',$data);
	}
	public function verif_SMA($id)
	{
		$this->load->model('model_dataguru_SMA');
		$val = array(
			'status' => 'SUDAH',
			);
		$this->model_dataguru_SMA->update_verif_SMA($id, $val);
		redirect(base_url("admin/dataguru/SMA"));
	}
}