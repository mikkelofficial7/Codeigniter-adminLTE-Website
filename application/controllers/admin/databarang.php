<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class databarang extends CI_Controller 
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
	
	/*========================================barang=======================================================*/
	public function barang()
	{
		$this->load->helper('url');
		$this->load->model('model_databarang');
		$data['data_barang'] = $this->model_databarang->tampilData('data_barangmasuk')->result();
		$data['data_total_barang'] = $this->model_databarang->hitungTotalbarang('data_barangmasuk')->result();
		$data['alert'] = '';

		$this->load->model('model_dataganti_profile');
		$wheres = array('username' => $this->session->userdata('nama'));
		$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_barang/barang',$data);
	}
	public function hapus_barang($nama){
		$this->load->model('model_databarang');
		$where = array('id' => $nama);
		$this->model_databarang->hapus_data($where,'data_barangmasuk');
		redirect('admin/databarang/barang');
	}
	function masukDataBarang()
	{
		$this->load->model('model_databarang');
		$data['data_barang'] = $this->model_databarang->tampilData('data_barangmasuk')->result();
		$this->load->model('model_databarang');
		$this->load->helper('url'); 
		$nama = $this->input->post('nama');
		$jumlah = $this->input->post('jumlah');
		$harga = $this->input->post('harga');
		$tanggal = $this->input->post('tanggal');
 		if($nama != null && $jumlah != null && $harga != null && $tanggal != null)
	 	{
	 		if(is_numeric($jumlah) == true && is_numeric($harga) == true)
	 		{
				$val = array(
					'id' =>  uniqid(),
					'nama' => $nama,
					'jumlah' => $jumlah,
					'harga' => $harga,
					'tanggal' => $tanggal
					);
				$this->model_databarang->getDataBarang($val,'data_barangmasuk');
				$data['alert'] = 'success';
				redirect('admin/databarang/barang');
			}
			else
			{
				$data['alert'] = 'error';
				$data['data_total_barang'] = $this->model_databarang->hitungTotalbarang('data_barangmasuk')->result();

				$this->load->model('model_dataganti_profile');
				$wheres = array('username' => $this->session->userdata('nama'));
				$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

				$this->load->view('admin/data_barang/barang',$data);
			}
		}
		else
		{
			$data['alert'] = 'error';
			$data['data_total_barang'] = $this->model_databarang->hitungTotalbarang('data_barangmasuk')->result();

			$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

			$this->load->view('admin/data_barang/barang',$data);
		}
	}
}