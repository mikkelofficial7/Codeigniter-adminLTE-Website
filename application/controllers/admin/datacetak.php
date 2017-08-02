<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class datacetak extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('status') != "login")
		{
			//kalau masih ada session login dia langsung masuk, kalau tidak ada langsung ke halaman login
			redirect(base_url("admin/login")); 
		}
		$this->load->library("excel");
	}
	
	/*========================================barang=======================================================*/
	public function home()
	{
		$this->load->model('model_dataganti_profile');
		$wheres = array('username' => $this->session->userdata('nama'));
		$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_cetak/cetak',$data);
	}
	public function dataguru()
	{

		$this->excel->setActiveSheetIndex(0);
        $this->load->model('model_datacetak');
        $data = $this->model_datacetak->tampilDataGuru();
		$this->excel->stream('Data_Guru_Tentor.xls', $data);
        $this->load->view('admin/datacetak/cetak');
	}
	public function datasiswa()
	{

		$this->excel->setActiveSheetIndex(0);
        $this->load->model('model_datacetak');
        $data = $this->model_datacetak->tampilDataSiswa();
		$this->excel->stream('Data_Siswa_Tentor.xls', $data);
        $this->load->view('admin/datacetak/cetak');
	}
	public function datakaryawan()
	{

		$this->excel->setActiveSheetIndex(0);
        $this->load->model('model_datacetak');
        $data = $this->model_datacetak->tampilDataKaryawan();
		$this->excel->stream('Data_Karyawan_Tentor.xls', $data);
        $this->load->view('admin/datacetak/cetak');
	}
	public function gajikaryawan()
	{

		$this->excel->setActiveSheetIndex(0);
        $this->load->model('model_datacetak');
        $data = $this->model_datacetak->tampilGajiKaryawan();
		$this->excel->stream('Data_Gaji_Karyawan_Tentor.xls', $data);
        $this->load->view('admin/datacetak/cetak');
	}
	public function gajiguru()
	{

		$this->excel->setActiveSheetIndex(0);
        $this->load->model('model_datacetak');
        $data = $this->model_datacetak->tampilGajiGuru();
		$this->excel->stream('Data_Gaji_Guru_Tentor.xls', $data);
        $this->load->view('admin/datacetak/cetak');
	}
	public function absenguru()
	{

		$this->excel->setActiveSheetIndex(0);
        $this->load->model('model_datacetak');
        $data = $this->model_datacetak->tampilAbsenGuru();
		$this->excel->stream('Data_Absen_KBM_Guru_Tentor.xls', $data);
		$data = $this->model_datacetak->tampilPenggantianGuru();
		$this->excel->stream('Data_Penggantian_Guru_Izin_Tentor.xls', $data);
        $this->load->view('admin/datacetak/cetak');
	}
	public function absenkaryawan()
	{

		$this->excel->setActiveSheetIndex(0);
        $this->load->model('model_datacetak');
        $data = $this->model_datacetak->tampilAbsenPegawai();
		$this->excel->stream('Data_Absen_Karyawan_Tentor.xls', $data);
        $this->load->view('admin/datacetak/cetak');
	}
	public function konsultasiguru()
	{

		$this->excel->setActiveSheetIndex(0);
        $this->load->model('model_datacetak');
        $data = $this->model_datacetak->tampilKonsultasiGuru();
		$this->excel->stream('Data_Konsul_Guru_Tentor.xls', $data);
        $this->load->view('admin/datacetak/cetak');
	}
	public function bayaransiswa()
	{

		$this->excel->setActiveSheetIndex(0);
        $this->load->model('model_datacetak');
        $data = $this->model_datacetak->tampilBayaranSiswa();
		$this->excel->stream('Data_Pembayaran_Siswa_Tentor.xls', $data);
        $this->load->view('admin/datacetak/cetak');
	}
	public function barang()
	{

		$this->excel->setActiveSheetIndex(0);
        $this->load->model('model_datacetak');
        $data = $this->model_datacetak->tampilDataBarang();
		$this->excel->stream('Data_Barang_Tentor.xls', $data);
        $this->load->view('admin/datacetak/cetak');
	}
	public function ujian()
	{

		$this->excel->setActiveSheetIndex(0);
        $this->load->model('model_datacetak');
        $data = $this->model_datacetak->tampilDataUjian();
		$this->excel->stream('Data_Ujian_Siswa.xls', $data);
        $this->load->view('admin/datacetak/cetak');
	}
}