<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class datasiswa extends CI_Controller 
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
		$this->load->model('model_datasiswa_SD');
		$where = array('level' => 'SD');
		$data['data_siswa'] = $this->model_datasiswa_SD->tampilData($where,'data_siswa')->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_siswa/SD',$data);
	}
	public function hapus_SD($id){
		$this->load->model('model_datasiswa_SD');
		$where = array('id_siswa' => $id, 'level' => 'SD');
		$this->model_datasiswa_SD->hapus_data($where,'data_siswa');
		redirect('admin/datasiswa/SD');
	}
	public function jml_SD()
	{
		$this->load->model('model_datasiswa_SD');
		$this->load->helper('url');
		$data['data_siswa'] = $this->model_datasiswa_SD->hitungJmlData()->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_siswa/SD',$data);
	}

	public function tempo_SD($id)
	{
		$this->load->model('model_datasiswa_SD');
		$tanggal = $this->input->post('exp_date');
		//update tanggal bayaran
		$val = array(
			'tanggal_jatuh_tempo' => $tanggal,
			);
		$this->model_datasiswa_SD->update_tempo_SD($id, $val);
		redirect(base_url("admin/datasiswa/SD")); 
	}
	public function verif_SD($id)
	{
		$this->load->model('model_datasiswa_SD');
		$val = array(
			'status' => 'SUDAH',
			);
		$this->model_datasiswa_SD->update_verif_SD($id, $val);
		redirect(base_url("admin/datasiswa/SD"));
	}

	/*========================================SMP=======================================================*/
	
	public function SMP()
	{
		$this->load->helper('url');
		$this->load->model('model_datasiswa_SMP');
		$data['data_siswa'] = $this->model_datasiswa_SMP->tampilData('data_siswa')->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_siswa/SMP',$data);
	}
	public function hapus_SMP($id){
		$this->load->model('model_datasiswa_SMP');
		$where = array('id_siswa' => $id);
		$this->model_datasiswa_SMP->hapus_data($where,'data_siswa');
		redirect('admin/datasiswa/SMP');
	}
	public function jml_SMP()
	{
		$this->load->model('model_datasiswa_SMP');
		$this->load->helper('url');
		$data['data_siswa'] = $this->model_datasiswa_SMP->hitungJmlData()->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_siswa/SMP',$data);
	}

	public function tempo_SMP($id)
	{
		$this->load->model('model_datasiswa_SMP');
		$tanggal = $this->input->post('exp_date');
		//update tanggal bayaran
		$val = array(
			'tanggal_jatuh_tempo' => $tanggal,
			);
		$this->model_datasiswa_SMP->update_tempo_SMP($id, $val);
		redirect(base_url("admin/datasiswa/SMP")); 
	}
	public function verif_SMP($id)
	{
		$this->load->model('model_datasiswa_SMP');
		$val = array(
			'status' => 'SUDAH',
			);
		$this->model_datasiswa_SMP->update_verif_SMP($id, $val);
		redirect(base_url("admin/datasiswa/SMP"));
	}


	/*========================================SMA=======================================================*/
	public function SMA()
	{
		$this->load->helper('url');
		$this->load->model('model_datasiswa_SMA');
		$data['data_siswa'] = $this->model_datasiswa_SMA->tampilData('data_siswa')->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_siswa/SMA',$data);
	}
	public function hapus_SMA($id){
		$this->load->model('model_datasiswa_SMA');
		$where = array('id_siswa' => $id);
		$this->model_datasiswa_SMA->hapus_data($where,'data_siswa');
		redirect('admin/datasiswa/SMA');
	}
	public function jml_SMA()
	{
		$this->load->model('model_datasiswa_SMA');
		$this->load->helper('url');
		$data['data_siswa'] = $this->model_datasiswa_SMA->hitungJmlData()->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();
			
		$this->load->view('admin/data_siswa/SMA',$data);
	}

	public function tempo_SMA($id)
	{
		$this->load->model('model_datasiswa_SMA');
		$tanggal = $this->input->post('exp_date');
		//update tanggal bayaran
		$val = array(
			'tanggal_jatuh_tempo' => $tanggal,
			);
		$this->model_datasiswa_SMA->update_tempo_SMA($id, $val);
		redirect(base_url("admin/datasiswa/SMA")); 
	}
	public function verif_SMA($id)
	{
		$this->load->model('model_datasiswa_SMA');
		$val = array(
			'status' => 'SUDAH',
			);
		$this->model_datasiswa_SMA->update_verif_SMA($id, $val);
		redirect(base_url("admin/datasiswa/SMA"));
	}
}