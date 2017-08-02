<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class datakehadiran extends CI_Controller 
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
	public function SD()
	{
		$data['alert'] = '';

		$this->load->helper('url');
		$this->load->model('model_datakehadiran_SD');
		
		$data['data_kehadiran'] = $this->model_datakehadiran_SD->tampilData()->result();
		$data['data_izin'] = $this->model_datakehadiran_SD->tampilDropdownIzin()->result();
		$data['data_ganti'] = $this->model_datakehadiran_SD->tampilDropdownHadir()->result();

		$this->load->helper('url');
		$this->load->model('model_datakehadiran_SD');
		$data['ganti'] = $this->model_datakehadiran_SD->tampil_izin()->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_kehadiran/SD',$data);
	}
	public function hapus_SD($tanggal){
		$this->load->model('model_datakehadiran_SD');
		$where = array('tanggal' => $tanggal, 'level' => 'SD');
		$this->model_datakehadiran_SD->hapus_data($where,'data_kbm');
		redirect('admin/datakehadiran/SD');
	}
	public function jml_SD()
	{
		$this->load->model('model_datakehadiran_SD');
		$this->load->helper('url');
		$data['data_kehadiran'] = $this->model_datakehadiran_SD->hitungJmlData()->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_kehadiran/SD',$data);
	}
	/**************************************/
	public function gantiGuruSD()
	{
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('url');
		$this->load->model('model_datakehadiran_SD');
		$data['data_izin'] = $this->model_datakehadiran_SD->tampilDropdownIzin()->result();
		$data['data_ganti'] = $this->model_datakehadiran_SD->tampilDropdownHadir()->result();
		$data['ganti'] = $this->model_datakehadiran_SD->tampil_izin()->result();
		$data['data_kehadiran'] = $this->model_datakehadiran_SD->hitungJmlData()->result();

		$this->load->helper('url'); 
		$nama1 = $this->input->post('newname');
		$arrname1 = explode('&', $nama1);
		$nama2 = $this->input->post('oldname');
		$arrname2 = explode('&', $nama2);
		$kelas = $this->input->post('kelas');
		$arrkelas = explode("-", $kelas);
		$materi = $this->input->post('materi');
		$arrmateri = explode("-", $materi);
		$tgl = $this->input->post('tanggal');
		$jam = $this->input->post('jam');
		if($nama1 != null && $nama2 != null && $kelas != null && $materi != null && $tgl != null && $jam != null && $tgl >= date('Y-m-d') && $arrname1[1] != $arrname2[1])
		{
			$val = array(
				'id' => $arrname2[1],
				'nama_depan1' => $arrname1[0],
				'nama_depan2' => $arrname2[0],
				'kelas' => $arrkelas[0],
				'pelajaran' => $arrmateri[0],
				'materi' => $arrmateri[1],
				'level' => $arrkelas[1],
				'tanggal' => $tgl,
				'jam' => $jam,
				'tanggal_kirim' => date('Y-m-d H:i:s')
				);
			$this->model_datakehadiran_SD->getIzin($val,'data_penggantian');
			$data['alert'] = 'success';
			redirect('admin/datakehadiran/SD');

			$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

			$this->load->view('admin/data_kehadiran/SD',$data);
		}
		else if($nama1 != null && $nama2 != null && $kelas != null && $materi != null && $tgl != null && $jam != null && $tgl >= date('Y-m-d') && $arrname1[1] == $arrname2[1])
		{

			$data['data_kehadiran'] = $this->model_datakehadiran_SD->tampilData()->result();
			$data['ganti'] = $this->model_datakehadiran_SD->tampil_izin()->result();
			$data['alert'] = 'errorsama';

			$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();
			
			$this->load->view('admin/data_kehadiran/SD',$data);
		}
		else
		{
			$data['alert'] = 'error';
			$data['data_kehadiran'] = $this->model_datakehadiran_SD->tampilData()->result();
			$data['ganti'] = $this->model_datakehadiran_SD->tampil_izin()->result();

			$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

			$this->load->view('admin/data_kehadiran/SD',$data);
		}
	}
	public function hapusGantiSD($tanggal)
	{
		$this->load->model('model_datakehadiran_SD');
		$where = array('tanggal' => $tanggal, 'level' => 'SD');
		$this->model_datakehadiran_SD->hapus_izin($where,'data_penggantian');
		redirect('admin/datakehadiran/SD');
	}





	
	/*========================================SMP=======================================================*/
	
	public function SMP()
	{
		$data['alert'] = '';
		$this->load->helper('url');
		$this->load->model('model_datakehadiran_SMP');
		$data['data_kehadiran'] = $this->model_datakehadiran_SMP->tampilData()->result();
		$data['data_izin'] = $this->model_datakehadiran_SMP->tampilDropdownIzin()->result();
		$data['data_ganti'] = $this->model_datakehadiran_SMP->tampilDropdownHadir()->result();

		$this->load->helper('url');
		$this->load->model('model_datakehadiran_SMP');
		$data['ganti'] = $this->model_datakehadiran_SMP->tampil_izin()->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_kehadiran/SMP',$data);
	}
	public function hapus_SMP($tanggal){
		$this->load->model('model_datakehadiran_SMP');
		$where = array('tanggal' => $tanggal);
		$this->model_datakehadiran_SMP->hapus_data($where,'data_kbm');
		redirect('admin/datakehadiran/SMP');
	}
	public function jml_SMP()
	{
		$this->load->model('model_datakehadiran_SMP');
		$this->load->helper('url');
		$data['data_kehadiran'] = $this->model_datakehadiran_SMP->hitungJmlData()->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_kehadiran/SMP',$data);
	}
	/**************************************/
	public function gantiGuruSMP()
	{
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('url');
		$this->load->model('model_datakehadiran_SMP');
		$data['data_izin'] = $this->model_datakehadiran_SMP->tampilDropdownIzin()->result();
		$data['data_ganti'] = $this->model_datakehadiran_SMP->tampilDropdownHadir()->result();
		$data['ganti'] = $this->model_datakehadiran_SMP->tampil_izin()->result();
		$data['data_kehadiran'] = $this->model_datakehadiran_SMP->hitungJmlData()->result();

		$this->load->helper('url'); 
		$nama1 = $this->input->post('newname');
		$arrname1 = explode('&', $nama1);
		$nama2 = $this->input->post('oldname');
		$arrname2 = explode('&', $nama2);
		$kelas = $this->input->post('kelas');
		$arrkelas = explode("-", $kelas);
		$materi = $this->input->post('materi');
		$arrmateri = explode("-", $materi);
		$tgl = $this->input->post('tanggal');
		$jam = $this->input->post('jam');
		if($nama1 != null && $nama2 != null && $kelas != null && $materi != null && $tgl != null && $jam != null && $tgl >= date('Y-m-d') && $arrname1[1] != $arrname2[1])
		{
			$val = array(
				'id' => $arrname2[1],
				'nama_depan1' => $arrname1[0],
				'nama_depan2' => $arrname2[0],
				'kelas' => $arrkelas[0],
				'pelajaran' => $arrmateri[0],
				'materi' => $arrmateri[1],
				'level' => $arrkelas[1],
				'tanggal' => $tgl,
				'jam' => $jam,
				'tanggal_kirim' => date('Y-m-d H:i:s')
				);
			$this->model_datakehadiran_SMP->getIzin($val,'data_penggantian');
			$data['alert'] = 'success';
			redirect('admin/datakehadiran/SMP');

			$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

			$this->load->view('admin/data_kehadiran/SMP',$data);
		}
		else if($nama1 != null && $nama2 != null && $kelas != null && $materi != null && $tgl != null && $jam != null && $tgl >= date('Y-m-d') && $arrname1[1] == $arrname2[1])
		{

			$data['data_kehadiran'] = $this->model_datakehadiran_SMP->tampilData()->result();
			$data['ganti'] = $this->model_datakehadiran_SMP->tampil_izin()->result();
			$data['alert'] = 'errorsama';

			$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();
			
			$this->load->view('admin/data_kehadiran/SMP',$data);
		}
		else
		{
			$data['data_kehadiran'] = $this->model_datakehadiran_SMP->tampilData()->result();
			$data['ganti'] = $this->model_datakehadiran_SMP->tampil_izin()->result();
			$data['alert'] = 'error';

			$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();
			
			$this->load->view('admin/data_kehadiran/SMP',$data);
		}
	}
	public function hapusGantiSMP($tanggal)
	{
		$this->load->model('model_datakehadiran_SMP');
		$where = array('tanggal' => $tanggal);
		$this->model_datakehadiran_SMP->hapus_izin($where,'data_penggantian');
		redirect('admin/datakehadiran/SMP');
	}









	/*========================================SMA=======================================================*/
	public function SMA()
	{
		$data['alert'] = '';
		$this->load->helper('url');
		$this->load->model('model_datakehadiran_SMA');
		$data['data_kehadiran'] = $this->model_datakehadiran_SMA->tampilData()->result();
		$data['data_izin'] = $this->model_datakehadiran_SMA->tampilDropdownIzin()->result();
		$data['data_ganti'] = $this->model_datakehadiran_SMA->tampilDropdownHadir()->result();

		$this->load->helper('url');
		$data['ganti'] = $this->model_datakehadiran_SMA->tampil_izin()->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_kehadiran/SMA',$data);
	}
	public function hapus_SMA($tanggal){
		$this->load->model('model_datakehadiran_SMA');
		$where = array('tanggal' => $tanggal);
		$this->model_datakehadiran_SMA->hapus_data($where,'data_kbm');
		redirect('admin/datakehadiran/SMA');
	}
	public function jml_SMA()
	{
		$this->load->model('model_datakehadiran_SMA');
		$this->load->helper('url');
		$data['data_kehadiran'] = $this->model_datakehadiran_SMA->hitungJmlData()->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_kehadiran/SMA',$data);
	}
	/**************************************/
	public function gantiGuruSMA()
	{
		date_default_timezone_set('Asia/Jakarta');

		$this->load->helper('url');
		$this->load->model('model_datakehadiran_SMA');
		$data['data_izin'] = $this->model_datakehadiran_SMA->tampilDropdownIzin()->result();
		$data['data_ganti'] = $this->model_datakehadiran_SMA->tampilDropdownHadir()->result();

		$data['data_kehadiran'] = $this->model_datakehadiran_SMA->hitungJmlData()->result();

		$this->load->helper('url'); 
		$nama1 = $this->input->post('newname');
		$arrname1 = explode('&', $nama1);
		$nama2 = $this->input->post('oldname');
		$arrname2 = explode('&', $nama2);
		$bidang = $this->input->post('bidang');
		$kelas = $this->input->post('kelas');
		$arrkelas = explode("-", $kelas);
		$materi = $this->input->post('materi');
		$arrmateri = explode("-", $materi);
		$tgl = $this->input->post('tanggal');
		$jam = $this->input->post('jam');
		if($nama1 != null && $nama2 != null && $kelas != null && $materi != null && $tgl != null && $jam != null && $tgl >= date('Y-m-d') && $arrname1[1] != $arrname2[1])
		{
			$val = array(
				'id' => $arrname2[1],
				'nama_depan1' =>$arrname1[0],
				'nama_depan2' => $arrname2[0],
				'kelas' => $arrkelas[0],
				'pelajaran' => $arrmateri[0],
				'materi' => $arrmateri[1],
				'level' => $arrkelas[1],
				'tanggal' => $tgl,
				'jam' => $jam,
				'tanggal_kirim' => date('Y-m-d H:i:s')
				);
			$this->model_datakehadiran_SMA->getIzin($val,'data_penggantian');
			$data['alert'] = 'success';
			redirect('admin/datakehadiran/SMA');

			$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

			$this->load->view('admin/data_kehadiran/SMA',$data);
		}
		else if($nama1 != null && $nama2 != null && $kelas != null && $materi != null && $tgl != null && $jam != null && $tgl >= date('Y-m-d') && $arrname1[1] == $arrname2[1])
		{

			$data['data_kehadiran'] = $this->model_datakehadiran_SMA->tampilData()->result();
			$data['ganti'] = $this->model_datakehadiran_SMA->tampil_izin()->result();
			$data['alert'] = 'errorsama';

			$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();
			
			$this->load->view('admin/data_kehadiran/SMA',$data);
		}
		else
		{
			$data['data_kehadiran'] = $this->model_datakehadiran_SMA->tampilData()->result();
			$data['ganti'] = $this->model_datakehadiran_SMA->tampil_izin()->result();
			$data['alert'] = 'error';

			$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();
			
			$this->load->view('admin/data_kehadiran/SMA',$data);
		}
	}
	public function hapusGantiSMA($tanggal)
	{
		$this->load->model('model_datakehadiran_SMA');
		$where = array('tanggal' => $tanggal);
		$this->model_datakehadiran_SMA->hapus_izin($where,'data_penggantian');
		redirect('admin/datakehadiran/SMA');
	}
}