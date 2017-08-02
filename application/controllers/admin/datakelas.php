<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class datakelas extends CI_Controller 
{
	function __construct()
	{
		date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
		if($this->session->userdata('status') != "login")
		{
			//kalau masih ada session login dia langsung masuk, kalau tidak ada langsung ke halaman login
			redirect(base_url("admin/login")); 
		}
	}
	
	/*========================================SD=======================================================*/
	public function home()
	{
		$this->load->helper('url');
		$this->load->model('model_datakelas_home');
		$data['data_guru'] = $this->model_datakelas_home->tampilGuru('data_guru')->result();
		$data['data_kelas'] = $this->model_datakelas_home->tampilData('jadwal_bimbel')->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_kelas/home',$data);
	}

	public function kirim()
	{
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('url');
		$this->load->model('model_datakelas_home');

		$this->load->helper('url'); 
		$jadwal = $this->input->post('jadwal');
		$hari = $this->input->post('hari');
		$jadwal = $this->input->post('jadwal');
		$kelas = $this->input->post('kelas');
		$jam = $this->input->post('jam');
		$guru = $this->input->post('guru');
			$val = array(
				'id_jadwal' => uniqid(),
				'jadwal' => $jadwal,
				'kelas' => $kelas,
				'hari' => $hari,
				'jam' => $jam,
				'tutor' => $guru
				);
			$this->model_datakelas_home->insertKelas($val,'jadwal_bimbel');
			$data['alert'] = 'success';
			redirect('admin/datakelas/home');

			$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();
	}
	public function hapus_kelas($id)
	{
			$this->load->helper('url');
			$this->load->model('model_datakelas_home');
			$val = array(
				'id_jadwal' => $id
				);
			$this->model_datakelas_home->deleteKelas($val,'jadwal_bimbel');
			$data['alert'] = 'success';
			redirect('admin/datakelas/home');

			$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();
	}
}