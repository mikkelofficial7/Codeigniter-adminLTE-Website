<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller 
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
		$this->load->model('model_changePassword');
		$this->load->model('model_absence');
	}
 
	public function index()
	{
		$this->load->helper('url');
		if($this->session->userdata('status') == "login")
		{
			$this->load->model('model_absence');
			$data['karyawan'] = $this->model_absence->tampilDataKaryawan()->result();
			$data['compare'] = $this->model_absence->getDataCompare('compare_karyawan')->result();
			$data['compares'] = $this->model_absence->getDataCompare('compare_admin')->result();
			/*******************************************************************/
			$this->load->model('model_dataganti_profile');
			$where = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($where,'data_karyawan')->result(); 
			/******************************************************************/
			$this->load->view('admin/home',$data);
		}
		else
		{
			redirect(base_url("admin/login")); 
		}
	}
	public function watchDataKBM()
	{	
		$this->load->model('model_datakbm_SD');
		$this->load->model('model_datakbm_SMP');
		$this->load->model('model_datakbm_SMA');
		$kbm1 = $this->model_datakbm_SD->tampilData();
		$kbm2 = $this->model_datakbm_SMP->tampilData();
		$kbm3 = $this->model_datakbm_SMA->tampilData();

		if($kbm1->num_rows() > 0 || $kbm2->num_rows() || $kbm3->num_rows())
		{
			$output_kbm1 = $kbm1->num_rows();
			$output_kbm2 = $kbm2->num_rows();
			$output_kbm3 = $kbm3->num_rows();
		}
		else
		{
			$output_kbm1 = 0;
			$output_kbm2 = 0;
			$output_kbm3 = 0;
		}
		echo $output_kbm1 + $output_kbm2 + $output_kbm3;
		
	}
	public function watchDataSiswa()
	{
		$this->load->model('model_datasiswa_SD');
		$this->load->model('model_datasiswa_SMP');
		$this->load->model('model_datasiswa_SMA');
		$where = array('level' => 'SD');
		$siswa1 = $this->model_datasiswa_SD->tampilData($where,'data_siswa');
		$siswa2 = $this->model_datasiswa_SMP->tampilData('data_siswa');
		$siswa3 = $this->model_datasiswa_SMA->tampilData('data_siswa');

		if($siswa1->num_rows() > 0 || $siswa2->num_rows() || $siswa3->num_rows())
		{
			$output_siswa1 = $siswa1->num_rows();
			$output_siswa2 = $siswa2->num_rows();
			$output_siswa3 = $siswa3->num_rows();
		}
		else
		{
			$output_siswa1 = 0;
			$output_siswa2 = 0;
			$output_siswa3 = 0;
		}
		echo $output_siswa3 + $output_siswa2 + $output_siswa1;

	}
	public function watchDataGuru()
	{

		$this->load->model('model_dataguru_SD');
		$this->load->model('model_dataguru_SMP');
		$this->load->model('model_dataguru_SMA');
		$where = array('level' => 'SD');
		$guru1 = $this->model_dataguru_SD->tampilData($where,'data_guru');
		$guru2 = $this->model_dataguru_SMP->tampilData('data_guru');
		$guru3 = $this->model_dataguru_SMA->tampilData('data_guru');

		if($guru1->num_rows() > 0 || $guru2->num_rows() || $guru3->num_rows())
		{
			$output_guru1 = $guru1->num_rows();
			$output_guru2 = $guru2->num_rows();
			$output_guru3 = $guru3->num_rows();
		}
		else
		{
			$output_guru1 = 0;
			$output_guru2 = 0;
			$output_guru3 = 0;
		}
		echo $output_guru3 + $output_guru2 + $output_guru1;
	}
	public function watchDataHadir()
	{
		$this->load->model('model_datakehadiran_SD');
		$this->load->model('model_datakehadiran_SMP');
		$this->load->model('model_datakehadiran_SMA');
		$kehadiran1 = $this->model_datakehadiran_SD->tampilData();
		$kehadiran2 = $this->model_datakehadiran_SMP->tampilData();
		$kehadiran3 = $this->model_datakehadiran_SMA->tampilData();

		if($kehadiran1->num_rows() > 0 || $kehadiran2->num_rows() || $kehadiran2->num_rows())
		{
			$output_kehadiran1 = $kehadiran1->num_rows();
			$output_kehadiran2 = $kehadiran2->num_rows();
			$output_kehadiran3 = $kehadiran3->num_rows();
		}
		else
		{
			$output_kehadiran1 = 0;
			$output_kehadiran2 = 0;
			$output_kehadiran3 = 0;
		}
		echo $output_kehadiran3 + $output_kehadiran2 + $output_kehadiran1;
	}
	
	function setting()
	{

		$this->load->helper('url'); 
		$data['alert'] = 'not error';

		$data['karyawan'] = $this->model_absence->tampilDataKaryawan()->result();
		$data['compare'] = $this->model_absence->getDataCompare('compare_karyawan')->result();
		$data['compares'] = $this->model_absence->getDataCompare('compare_admin')->result();

		$where = array('username' => $this->session->userdata('nama'));
		$data['username'] = $this->model_changePassword->tampilUsername($where,'data_karyawan')->result();

		$this->load->model('model_dataganti_profile');
		$wheres = array('username' => $this->session->userdata('nama'));
		$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/setting',$data);
	}

	function countsalary()
	{
		$this->load->model('model_dataganti_profile');
		$wheres = array('username' => $this->session->userdata('nama'));
		$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		//HITUNG GAJI KARYAWAN
		/*************************************************************************************/

		$this->load->model('model_absence');
		$data['karyawan'] = $this->model_absence->tampilDataKaryawan()->result();
		$data['sumgaji'] = $this->model_absence->tampil_sum_data_karyawan()->result();
		$data['compare'] = $this->model_absence->getDataCompare('compare_karyawan')->result();
		$data['compares'] = $this->model_absence->getDataCompare('compare_admin')->result();

		foreach($data['sumgaji'] as $item)
		{
			foreach($data['compare'] as $compare)
			{
				if($item->id == $compare->id && $item->month == date('m') && $item->year == date('Y'))
				{
					$val= array(
						'id' => $item->id,
						'username' =>$item->username,
						'nama' =>$item ->nama,
						'tanggal' => date('Y-m-d'),
						'gaji' => $item->idtotal * $compare->gaji_makan,
						'status_gaji' => 'BELUM DITERIMA'
						);
					$this->model_absence->getSalaryAbsence($val,'data_gaji');
				}
			}
		}

		$data['gaji'] = $this->model_absence->tampilDataGaji('data_gaji')->result();
		foreach($data['gaji'] as $item)
		{
			foreach($data['compare'] as $compare)
			{
				if($item->id == $compare->id && $item->month == date('m') && $item->year == date('Y'))
				{
					$id = $item->id;
					$val = array(
						'gaji' => $item->gaji + $compare->gaji_pokok,
						);
					$this->model_absence->update_gaji($id, $val);
				}
			}
		}

		$data['alert'] = 'success3';

		$where = array('username' => $this->session->userdata('nama'));
		$data['username'] = $this->model_changePassword->tampilUsername($where,'data_karyawan')->result();
		
		//HITUNG GAJI GURU
		/*************************************************************************************/

		//  KBM  ***************************************************
		$this->load->model('model_absence');
		$data['sumgaji_sd_kbm'] = $this->model_absence->tampil_sum_data_Guru_kbm()->result();
		foreach($data['sumgaji_sd_kbm'] as $item)
		{
			if($item->level == 'SD' && $item->month == date('m') && $item->year == date('Y'))
			{
				$val= array(
					'id' => $item->id_tutor,
					'kelas' => $item->kelas,
					'level' => $item->level,
					'nama' =>$item ->nama_depan,
					'tanggal' => date('Y-m-d'),
					'gaji' => $item->idtotal_kbm * 35000
					);
				$this->model_absence->getSalaryAbsence($val,'data_gajiguru_temp');
			}
			else if($item->level == 'SMP' || $item->level == 'MTS' && $item->month == date('m') && $item->year == date('Y'))
			{
				$vals= array(
					'id' => $item->id_tutor,
					'kelas' => $item->kelas,
					'level' => $item->level,
					'nama' =>$item ->nama_depan,
					'tanggal' => date('Y-m-d'),
					'gaji' => $item->idtotal_kbm * 40000
					);
				$this->model_absence->getSalaryAbsence($vals,'data_gajiguru_temp');
			}
			else if($item->level == 'SMA' || $item->level == 'SMK' || $item->level == 'MA' && $item->month == date('m') && $item->year == date('Y'))
			{
				if($item->pelajaran == 'MATEMATIKA' || $item->pelajaran == 'FISIKA' || $item->pelajaran == 'KIMIA')
				{
					$vals= array(
						'id' => $item->id_tutor,
						'kelas' => $item->kelas,
						'level' => $item->level,
						'nama' =>$item ->nama_depan,
						'tanggal' => date('Y-m-d'),
						'gaji' => $item->idtotal_kbm * 50000
						);
					$this->model_absence->getSalaryAbsence($vals,'data_gajiguru_temp');
				}
				else
				{
					$vals= array(
						'id' => $item->id_tutor,
						'kelas' => $item->kelas,
						'level' => $item->level,
						'nama' =>$item ->nama_depan,
						'tanggal' => date('Y-m-d'),
						'gaji' => $item->idtotal_kbm * 45000
						);
					$this->model_absence->getSalaryAbsence($vals,'data_gajiguru_temp');
				}
			}
		}
		$data['alert'] = 'success3';

		$where = array('username' => $this->session->userdata('nama'));
		$data['username'] = $this->model_changePassword->tampilUsername($where,'data_karyawan')->result();

		//  KONSULTASI ***************************************************
		$this->load->model('model_absence');
		$data['sumgaji_sd_konsul'] = $this->model_absence->tampil_sum_data_Guru_konsultasi()->result();
		foreach($data['sumgaji_sd_konsul'] as $item)
		{
			if($item->level == 'SD' && $item->month == date('m') && $item->year == date('Y'))
			{
				$val= array(
					'id' => $item->id_tutor,
					'kelas' => '0',
					'level' => $item->level,
					'nama' =>$item ->nama_depan,
					'tanggal' => date('Y-m-d'),
					'gaji' => $item->idtotal_konsultasi * 25000
					);
				$this->model_absence->getSalaryAbsence($val,'data_gajiguru_temp');
			}
			else if($item->level == 'SMP' || $item->level == 'MTS' && $item->month == date('m') && $item->year == date('Y'))
			{
				$vals= array(
					'id' => $item->id_tutor,
					'kelas' => '0',
					'level' => $item->level,
					'nama' =>$item ->nama_depan,
					'tanggal' => date('Y-m-d'),
					'gaji' => $item->idtotal_konsultasi * 25000
					);
				$this->model_absence->getSalaryAbsence($vals,'data_gajiguru_temp');
			}
			else if($item->level == 'SMA' || $item->level == 'SMK' || $item->level == 'MA' && $item->month == date('m') && $item->year == date('Y'))
			{
				$vals= array(
					'id' => $item->id_tutor,
					'kelas' => '0',
					'level' => $item->level,
					'nama' =>$item ->nama_depan,
					'tanggal' => date('Y-m-d'),
					'gaji' => $item->idtotal_konsultasi * 25000
					);
				$this->model_absence->getSalaryAbsence($vals,'data_gajiguru_temp');
			}
		}
		$data['alert'] = 'success3';

		$where = array('username' => $this->session->userdata('nama'));
		$data['username'] = $this->model_changePassword->tampilUsername($where,'data_karyawan')->result();

		//  PENGGANTIAN GURU  ***************************************************
		$this->load->model('model_absence');
		$data['sumgaji_sd_ganti'] = $this->model_absence->tampil_sum_data_Guru_penggantian()->result();
		foreach($data['sumgaji_sd_ganti'] as $item)
		{
			if($item->level == 'SD' && $item->month == date('m') && $item->year == date('Y'))
			{
				$val= array(
					'id' => $item->id,
					'kelas' => $item->kelas,
					'level' => $item->level,
					'nama' =>$item ->nama_depan,
					'tanggal' => date('Y-m-d'),
					'gaji' => $item->idtotal_penggantian * 35000
					);
				$this->model_absence->getSalaryAbsence($val,'data_gajiguru_temp');
			}
			else if($item->level == 'SMP' || $item->level == 'MTS' && $item->month == date('m') && $item->year == date('Y'))
			{
				$vals= array(
					'id' => $item->id,
					'kelas' => $item->kelas,
					'level' => $item->level,
					'nama' =>$item ->nama_depan,
					'tanggal' => date('Y-m-d'),
					'gaji' => $item->idtotal_penggantian * 40000
					);
				$this->model_absence->getSalaryAbsence($vals,'data_gajiguru_temp');
			}
			else if($item->level == 'SMA' || $item->level == 'SMK' || $item->level == 'MA' && $item->month == date('m') && $item->year == date('Y'))
			{
				if($item->pelajaran == 'MATEMATIKA' || $item->pelajaran == 'FISIKA' || $item->pelajaran == 'KIMIA')
				{
					$vals= array(
						'id' => $item->id,
						'kelas' => $item->kelas,
						'level' => $item->level,
						'nama' =>$item ->nama_depan,
						'tanggal' => date('Y-m-d'),
						'gaji' => $item->idtotal_penggantian * 45000
						);
					$this->model_absence->getSalaryAbsence($vals,'data_gajiguru_temp');
				}
				else
				{
					$vals= array(
						'id' => $item->id,
						'kelas' => $item->kelas,
						'level' => $item->level,
						'nama' =>$item ->nama_depan,
						'tanggal' => date('Y-m-d'),
						'gaji' => $item->idtotal_penggantian * 50000
						);
					$this->model_absence->getSalaryAbsence($vals,'data_gajiguru_temp');
				}
			}
		}
		$data['alert'] = 'success3';

		$where = array('username' => $this->session->userdata('nama'));
		$data['username'] = $this->model_changePassword->tampilUsername($where,'data_karyawan')->result();

		/*INSERT TO REAL TABLE *****************************************/
		$this->load->model('model_absence');
		$data['sumgaji_sd_ganti'] = $this->model_absence->tampil_gajiguru_temp()->result();
		foreach($data['sumgaji_sd_ganti'] as $item)
		{
			if($item->level == 'SD' && $item->month == date('m') && $item->year == date('Y'))
			{
				$val= array(
					'id' => $item->id,
					'nama' =>$item ->nama,
					'level' =>$item ->level,
					'tanggal' => date('Y-m-d'),
					'gaji' => $item->gajitotal,
					'status_gaji' => 'BELUM DITERIMA'
					);
				$this->model_absence->getSalaryAbsence($val,'data_gajiguru');
			}
			else if($item->level == 'SMP' || $item->level == 'MTS' && $item->month == date('m') && $item->year == date('Y'))
			{
				$vals= array(
					'id' => $item->id,
					'nama' =>$item ->nama,
					'level' =>$item ->level,
					'tanggal' => date('Y-m-d'),
					'gaji' => $item->gajitotal,
					'status_gaji' => 'BELUM DITERIMA'
					);
				$this->model_absence->getSalaryAbsence($vals,'data_gajiguru');
			}
			else if($item->level == 'SMA' || $item->level == 'SMK' || $item->level == 'MA' && $item->month == date('m') && $item->year == date('Y'))
			{
				$vals= array(
					'id' => $item->id,
					'nama' =>$item ->nama,
					'level' =>$item ->level,
					'tanggal' => date('Y-m-d'),
					'gaji' => $item->gajitotal,
					'status_gaji' => 'BELUM DITERIMA'
					);
				$this->model_absence->getSalaryAbsence($vals,'data_gajiguru');
			}
		}
		$data['alert'] = 'success3';

		$where = array('username' => $this->session->userdata('nama'));
		$data['username'] = $this->model_changePassword->tampilUsername($where,'data_karyawan')->result();
		$this->load->view('admin/setting',$data);
	}
	/*=================================== PASSWORD ====================================================*/

	function initChangePassword()
	{
		$this->load->model('model_absence');
		$data['karyawan'] = $this->model_absence->tampilDataKaryawan()->result();
		$data['compares'] = $this->model_absence->getDataCompare('compare_admin')->result();

		$this->load->model('model_dataganti_profile');
		$wheres = array('username' => $this->session->userdata('nama'));
		$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$where = array('username' => $this->session->userdata('nama'));
		$data['data_karyawan'] = $this->model_changePassword->updateDataPass($where,'data_karyawan')->result();
		$this->load->view('admin/setting',$data);
	}

	function processChangePassword()
	{
		$this->load->helper('url'); 

		$this->load->model('model_absence');
		$data['karyawan'] = $this->model_absence->tampilDataKaryawan()->result();
		$data['compares'] = $this->model_absence->getDataCompare('compare_admin')->result();

		$this->load->model('model_dataganti_profile');
		$wheres = array('username' => $this->session->userdata('nama'));
		$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$where = array('username' => $this->session->userdata('nama'));
		$data['username'] = $this->model_changePassword->tampilUsername($where,'data_karyawan')->result();

		$password = $this->input->post('password');
	 	$confirm_password = $this->input->post('c_password');

	 	if($password != null || $confirm_password != null)
	 	{
		 	if($password == $confirm_password && strlen($password) >= 6 )
		 	{
				$val = array(
					'password' => md5($password),
				);
				$where = array('username' => $this->session->userdata('nama'));
				$this->model_changePassword->processUpdatePassword($where, $val,'data_karyawan');
				$data['alert'] = 'success';
				$this->load->view('admin/setting',$data);
			}
			else
			{
				$data['alert'] = 'errors';
				$this->load->view('admin/setting',$data);
			}
		}
		else
		{
			$data['alert'] = 'error';
			$this->load->view('admin/setting',$data);
		}
	}

	/*=================================== Email ====================================================*/

	function processChangeEmail()
	{
		$this->load->helper('url'); 

		$this->load->model('model_absence');
		$data['karyawan'] = $this->model_absence->tampilDataKaryawan()->result();
		$data['compares'] = $this->model_absence->getDataCompare('compare_admin')->result();

		$this->load->model('model_dataganti_profile');
		$wheres = array('username' => $this->session->userdata('nama'));
		$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$where = array('username' => $this->session->userdata('nama'));
		$data['username'] = $this->model_changePassword->tampilUsername($where,'data_karyawan')->result();

		$email = $this->input->post('newmail');

	 	if($email != null)
	 	{
		 	if(filter_var($email, FILTER_VALIDATE_EMAIL))
		 	{
		 		$where = array('email' => $email);
				$datas = $this->model_changePassword->tampilUsername($where,'data_karyawan')->num_rows();

	 			if($datas > 0)
	 			{
	 				$data['alert'] = 'errorEmail3';
					$this->load->view('admin/setting',$data);
	 			}
	 			else
	 			{
	 				$val = array(
						'email' => $email,
					);
					$where = array('username' => $this->session->userdata('nama'));
					$this->model_changePassword->processUpdateEmail($where, $val,'data_karyawan');

					$where = array('username' => $this->session->userdata('nama'));
					$data['username'] = $this->model_changePassword->tampilUsername($where,'data_karyawan')->result();

					$data['alert'] = 'successEmail';
					$this->load->view('admin/setting',$data);
	 			}
			}
			else
			{
				$data['alert'] = 'errorEmail2';
				$this->load->view('admin/setting',$data);
			}
		}
		else
		{
			$data['alert'] = 'errorEmail';
			$this->load->view('admin/setting',$data);
		}
	}
	
/*=================================== ABSENCE ====================================================*/
	function absence()
	{
		$this->load->model('model_absence');
		$data['karyawan'] = $this->model_absence->tampilDataKaryawan()->result();
		$data['compares'] = $this->model_absence->getDataCompare('compare_admin')->result();

		$this->load->model('model_dataganti_profile');
		$wheres = array('username' => $this->session->userdata('nama'));
		$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$where = array('username' => $this->session->userdata('nama'));
		$data['username'] = $this->model_changePassword->tampilUsername($where,'data_karyawan')->result();

		$this->load->helper('url'); 
		$nama = $this->input->post('name');
 		if($nama != null && $this->session->userdata('nama') == 'G2-ADM-m7hBLMzJLw')
	 	{
			$val = array(
				'id' => 'A-76cROKEqh0',
				'username' => $this->session->userdata('nama'),
				'nama' => $nama,
				'tgl_masuk' => date('Y-m-d'),
				'jam_masuk' => date('H:i:s')
				);
			$this->model_absence->getAbsence($val,'absen_karyawan');
			$data['alert'] = 'success2';
			$this->load->view('admin/setting',$data);
		}
		else if($nama != null && $this->session->userdata('nama') == 'G2-ADM-x7uJcdOuHM')
	 	{
			$val = array(
				'id' => 'A-EzPP8wkcyB',
				'username' => $this->session->userdata('nama'),
				'nama' => $nama,
				'tgl_masuk' => date('Y-m-d'),
				'jam_masuk' => date('H:i:s')
				);
			$this->model_absence->getAbsence($val,'absen_karyawan');
			$data['alert'] = 'success2';
			$this->load->view('admin/setting',$data);
		}
		else
		{
			$data['alert'] = 'error2';
			$this->load->view('admin/setting',$data);
		}
	}

	function absenceMaster()
	{
		$this->load->model('model_absence');
		$data['compares'] = $this->model_absence->getDataCompare('compare_admin')->result();
		$data['karyawan'] = $this->model_absence->tampilDataKaryawan()->result();

		$this->load->model('model_dataganti_profile');
		$this->load->model('model_absence');
		$wheres = array('username' => $this->session->userdata('nama'));
		$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$where = array('username' => $this->session->userdata('nama'));
		$data['username'] = $this->model_changePassword->tampilUsername($where,'data_karyawan')->result();

		$this->load->helper('url'); 
		$id = $this->input->post('id');

 		if($id != null)
	 	{
	 		$wheree = $id;
	 		$row = $this->model_absence->getDataKaryawan($wheree);
	 		$data['karyawans'] = $this->model_absence->getDataKaryawan($wheree);

	 		if($row->num_rows() > 0)
	 		{
		 		foreach($data['karyawans']->result() as $item)
		 		{
					$val = array(
						'id' => $id,
						'username' => $item->username,
						'nama' => $item->nama_depan." ".$item->nama_belakang." G2",
						'tgl_masuk' => date('Y-m-d'),
						'jam_masuk' => date('H:i:s')
						);
					$this->model_absence->getAbsence($val,'absen_karyawan');
					$data['alert'] = 'success4';
					$this->load->view('admin/setting',$data);
				}
			}
			else
			{
				$data['alert'] = 'error4';
				$this->load->view('admin/setting',$data);
			}
		}
		else
		{
			$data['alert'] = 'error4';
			$this->load->view('admin/setting',$data);
		}
	}

	function gantiProfil()
	{
		$this->load->model('model_absence');
		$data['karyawan'] = $this->model_absence->tampilDataKaryawan()->result();
		$data['compares'] = $this->model_absence->getDataCompare('compare_admin')->result();

		$this->load->model('model_dataganti_profile');
		$username = $this->session->userdata('nama');

		$fileurl = $_FILES['avatar']['name'];

		if(!$fileurl)
		{
			//redirect(base_url("admin/home/setting")); 
			$data['alert'] = 'errorProfile';

			$this->load->model('model_changePassword');
			$where = array('username' => $username);
			$data['username'] = $this->model_changePassword->tampilUsername($where,'data_karyawan')->result();

			$this->load->model('model_dataganti_profile');
			$where = array('username' => $username);
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($where,'data_karyawan')->result();

			$this->load->view('admin/setting', $data);
		}
		else
		{
			$arrurl = explode(".", $fileurl);

			$config['file_name'] 			= $username.".".$arrurl[1];
			$config['upload_path']          = './data_admin/karyawan_img/';
			$config['allowed_types']        = 'jpg';
			$config['max_size']             = 500;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;
			$config['overwrite']			= TRUE;
	 		
			$this->load->library('upload', $config);
	 
			if ( ! $this->upload->do_upload('avatar'))
			{
				$data = array('upload_data' => $this->upload->display_errors());
				$data['alert'] = 'errorProfile';
				$this->load->helper('url');

				$where = array('username' => $this->session->userdata('nama'));
				$data['username'] = $this->model_changePassword->tampilUsername($where,'data_karyawan')->result();

				$this->load->model('model_dataganti_profile');
				$where = array('username' => $this->session->userdata('nama'));
				$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($where,'data_karyawan')->result();

				$this->load->view('admin/setting', $data);
			}
			else
			{
				$data = $this->upload->data();
				$config['image_library'] = 'gd2';
				$config['source_image'] = $data['full_path'];
		        $config['maintain_ratio'] = TRUE;
		        $config['width']     = 250;
		        $config['height']   = 150;

		        $this->load->library('image_lib', $config); 

		        if (!$this->image_lib->resize()) {
	                $this->handle_error($this->image_lib->display_errors());
	            }

	            $arr_path = explode("/", $data['full_path']);

	            //dikosongkan dahulu filenya
	            $val = array(
						  'foto' => "",
						);

				$this->model_dataganti_profile->updateFotoDataKaryawan($username ,$val);

				sleep(5);

				$this->output->set_header("HTTP/1.0 200 OK");
				$this->output->set_header("HTTP/1.1 200 OK");
				$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
				$this->output->set_header("Cache-Control: post-check=0, pre-check=0");
				$this->output->set_header("Pragma: no-cache");

				sleep(5);

				//diisi kembali filenya
				$val = array(
						  'foto' => $arr_path[4]."/".$arr_path[5]."/".$arr_path[6],
						);

				$this->model_dataganti_profile->updateFotoDataKaryawan($username ,$val);

				$where = array('username' => $username);
				$data['username'] = $this->model_changePassword->tampilUsername($where,'data_karyawan')->result();

				$this->load->model('model_dataganti_profile');
				$where = array('username' => $username);
				$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($where,'data_karyawan')->result();

				$data['alert'] = 'successProfile';

				$this->output->set_header("HTTP/1.0 200 OK");
				$this->output->set_header("HTTP/1.1 200 OK");
				$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
				$this->output->set_header("Cache-Control: post-check=0, pre-check=0");
				$this->output->set_header("Pragma: no-cache");
				
				redirect('admin/home');
			}
		}
		
	}
	public function hapusProfil()
	{	
		$this->load->model('model_absence');
		$data['karyawan'] = $this->model_absence->tampilDataKaryawan()->result();
		$data['compares'] = $this->model_absence->getDataCompare('compare_admin')->result();

		$this->load->model('model_changePassword');
		$this->load->model('model_datakaryawan');
		$data['a']= $this->model_datakaryawan->tampilData()->result();
		foreach($data['a'] as $a)
		{
			if($a->username == $this->session->userdata('nama') && $a->foto != './data_admin/karyawan_img/female.jpg')
			{
				unlink($a->foto);
			}
		}
		$val = array(
			'foto' => "./data_admin/karyawan_img/female.jpg",
		);
		$where = array('username' => $this->session->userdata('nama'));
		$this->model_changePassword->updateEmptyProfil($where, $val,'data_karyawan');
		redirect('admin/home');
	}
	public function check_session()
	{
		$status = $this->session->userdata('status');
		if($status == 'login')
		{
			echo '1';
		}
		else
		{
			redirect(base_url("admin/login"));
			echo '0';
		}
	}
}
