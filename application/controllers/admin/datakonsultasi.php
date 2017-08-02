<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class datakonsultasi extends CI_Controller 
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
	
	/*========================================home=======================================================*/
	public function konsultasi()
	{
		$data['alert'] = '';
		$this->load->helper('url');

		$this->load->model('model_datakonsultasi');

		$data['data_konsultasi'] = $this->model_datakonsultasi->tampilNamaGuruSemua('data_konsultasi')->result();

		$data['data_guru'] = $this->model_datakonsultasi->tampilNamaGuruSemua('data_guru')->result();

		$data['data_guru_semua'] = $this->model_datakonsultasi->tampilNamaGuruSemua('data_guru')->result_array();

		$data['data_siswa_semua'] = $this->model_datakonsultasi->tampilNamaSiswaSemua('data_siswa')->result_array();

		$data['data_guru_sd'] = $this->model_datakonsultasi->tampilNamaGuruSD('data_guru')->result_array();

		$data['data_guru_smp'] = $this->model_datakonsultasi->tampilNamaGuruSMP('data_guru')->result_array();

		$data['data_guru_sma'] = $this->model_datakonsultasi->tampilNamaGuruSMA('data_guru')->result_array();

		$data['data_siswa_sd'] = $this->model_datakonsultasi->tampilNamaSiswaSD('data_siswa')->result_array();

		$data['data_siswa_smp'] = $this->model_datakonsultasi->tampilNamaSiswaSMP('data_siswa')->result_array();

		$data['data_siswa_sma'] = $this->model_datakonsultasi->tampilNamaSiswaSMA('data_siswa')->result_array();

		$data['alert'] = '';

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_konsultasi/konsultasi',$data);

	}
	public function kirim()
	{
		date_default_timezone_set('Asia/Jakarta');
		$data['alert'] = '';

		$this->load->helper('url');

		$this->load->model('model_datakonsultasi');

		$data['data_konsultasi'] = $this->model_datakonsultasi->tampilNamaGuruSemua('data_konsultasi')->result();
		
		$data['data_guru'] = $this->model_datakonsultasi->tampilNamaGuruSemua('data_guru')->result();

		$data['data_guru_semua'] = $this->model_datakonsultasi->tampilNamaGuruSemua('data_guru')->result_array();

		$data['data_siswa_semua'] = $this->model_datakonsultasi->tampilNamaSiswaSemua('data_siswa')->result_array();

		$data['data_guru_sd'] = $this->model_datakonsultasi->tampilNamaGuruSD('data_guru')->result_array();

		$data['data_guru_smp'] = $this->model_datakonsultasi->tampilNamaGuruSMP('data_guru')->result_array();

		$data['data_guru_sma'] = $this->model_datakonsultasi->tampilNamaGuruSMA('data_guru')->result_array();

		$data['data_siswa_sd'] = $this->model_datakonsultasi->tampilNamaSiswaSD('data_siswa')->result_array();

		$data['data_siswa_smp'] = $this->model_datakonsultasi->tampilNamaSiswaSMP('data_siswa')->result_array();

		$data['data_siswa_sma'] = $this->model_datakonsultasi->tampilNamaSiswaSMA('data_siswa')->result_array();

		$guru = $this->input->post('guru');
		$arrguru = explode(" ", $guru);
		$siswa = $this->input->post('siswa');
		$arrsiswa = explode(" ", $siswa);
		$level = $this->input->post('kelas');
		$bidang = $this->input->post('bidang');
		$isi =  $this->input->post('keterangan');
		$tgl =  $this->input->post('tanggal');
		$jam =  $this->input->post('jam');

 		if(strlen($isi) != 0 && strlen($guru) != 0 && strlen($siswa) != 0 && strlen($level) != 0 && $tgl >= date('Y-m-d'))
	 	{
			$val = array(
				'id_tutor' => $arrguru[2],
				'id_siswa' => $arrsiswa[2],
				'nama_guru' => $arrguru[0]." ".$arrguru[1],
				'nama_siswa' => $arrsiswa[0]." ".$arrsiswa[1],
				'pelajaran' => $bidang,
				'kelas' => $arrsiswa[3],
				'level' => $level,
				'materi' => $isi,
				'tanggal' => $tgl,
				'jam' => $jam,
				'tanggal_kirim' => date('Y-m-d H:i:s'),
				'status_konsultasi' => 'BELUM DITERIMA'
				);
			$this->model_datakonsultasi->insertData($val,'data_konsultasi');
			$data['alert'] = 'success';

			$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

			//$this->load->view('admin/data_konsultasi/konsultasi',$data);
			redirect(base_url("admin/datakonsultasi/konsultasi")); 
		}
 		else if(strlen($isi) != 0 && strlen($guru) != 0 && strlen($siswa) != 0 && strlen($level) != 0 && $tgl < date('Y-m-d'))
	 	{
			$data['alert'] = 'errorss';

			$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();
			
			$this->load->view('admin/data_konsultasi/konsultasi',$data);
		}
		else
		{
			$data['alert'] = 'error';

			$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();
			
			$this->load->view('admin/data_konsultasi/konsultasi',$data);
		}
	}
}