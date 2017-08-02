<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class databayaran extends CI_Controller 
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
		$this->load->helper('url');
		$this->load->model('model_databayaran_SD');
		$data['data_siswa'] = $this->model_databayaran_SD->tampilData('data_bayaran')->result();
		$data['data_total'] = $this->model_databayaran_SD->hitungJmlDataBulanIni('data_bayaran')->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_bayaran/SD',$data);
	}
	public function hapus_SD($id){
		$this->load->model('model_databayaran_SD');
		$where = array('id' => $id, 'level' => 'SD');
		$this->model_databayaran_SD->hapus_data($where,'data_bayaran');
		redirect('admin/databayaran/SD');
	}
	public function jml_SD()
	{
		$this->load->model('model_databayaran_SD');
		$this->load->helper('url');
		$data['data_siswa'] = $this->model_databayaran_SD->hitungJmlData()->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_bayaran/SD',$data);
	}

	/*========================================SMP=======================================================*/
	
	public function SMP()
	{
		$this->load->helper('url');
		$this->load->model('model_databayaran_SMP');
		$data['data_siswa'] = $this->model_databayaran_SMP->tampilData('data_bayaran')->result();
		$data['data_total'] = $this->model_databayaran_SMP->hitungJmlDataBulanIni('data_bayaran')->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_bayaran/SMP',$data);
	}
	public function hapus_SMP($id){
		$this->load->model('model_databayaran_SMP');
		$where = array('id' => $id);
		$this->model_databayaran_SMP->hapus_data($where,'data_bayaran');
		redirect('admin/databayaran/SMP');
	}
	public function jml_SMP()
	{
		$this->load->model('model_databayaran_SMP');
		$this->load->helper('url');
		$data['data_siswa'] = $this->model_databayaran_SMP->hitungJmlData()->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_bayaran/SMP',$data);
	}

	/*========================================SMA=======================================================*/
	public function SMA()
	{
		$this->load->helper('url');
		$this->load->model('model_databayaran_SMA');
		$data['data_siswa'] = $this->model_databayaran_SMA->tampilData('data_bayaran')->result();
		$data['data_total'] = $this->model_databayaran_SMA->hitungJmlDataBulanIni('data_bayaran')->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_bayaran/SMA',$data);
	}
	public function hapus_SMA($id){
		$this->load->model('model_databayaran_SMA');
		$where = array('id' => $id);
		$this->model_databayaran_SMA->hapus_data($where,'data_bayaran');
		redirect('admin/databayaran/SMA');
	}
	public function jml_SMA()
	{
		$this->load->model('model_databayaran_SMA');
		$this->load->helper('url');
		$data['data_siswa'] = $this->model_databayaran_SMA->hitungJmlData()->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_bayaran/SMA',$data);
	}




	public function home()
	{
		$data['alert'] = '';

		$this->load->helper('url');

		$this->load->model('model_databayaran_input');
		$data['data_siswa'] = $this->model_databayaran_input->tampilData('data_siswa')->result();

		$this->load->model('model_databayaran_input');
		$data['data_biaya'] = $this->model_databayaran_input->tampilDataBiayaLes('rincian_biaya_les')->result();

		$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

		$this->load->view('admin/data_bayaran/input_data',$data);
	}
	public function input()
	{
		$this->load->helper('url');
		$this->load->model('model_databayaran_input');

		$nama = $this->input->post('nama');
		$biaya = $this->input->post('biaya');
		$tanggal = $this->input->post('tanggal');
		$tempo = $this->input->post('tanggal_tempo');
		$arrtempo = explode("-", $tempo);
		$status = $this->input->post('status');

 		if(strlen($nama) != 0 && strlen($biaya) != 0 && strlen($tanggal) != 0 && strlen($status) != 0)
	 	{
	 		$arrnama = explode("&", $nama);

	 		if(is_numeric($biaya) == true && $tempo > date('Y-m-d') && $tanggal <= date('Y-m-d') && $arrtempo[1] > date('m'))
	 		{
					$val = array(
						'id' => $arrnama[0],
						'nama_depan' => $arrnama[1],
						'nama_belakang' => $arrnama[2],
						'kelas' => $arrnama[3],
						'level' => $arrnama[4],
						'tanggal_bayaran' => $tanggal,
						'tanggal_jatuh_tempo' => $tempo,
						'jumlah_biaya' => $biaya,
						'status_bayaran' => $status
						);
					$this->model_databayaran_input->getData($val,'data_bayaran');

					//update tanggal bayaran
					$val = array(
						'tanggal_jatuh_tempo' => $tempo,
						);
					$this->model_databayaran_input->updateData($arrnama[0],$val);

					$data['alert'] = 'success';

					$this->load->model('model_databayaran_input');
					$data['data_biaya'] = $this->model_databayaran_input->tampilDataBiayaLes('rincian_biaya_les')->result();

					$data['data_siswa'] = $this->model_databayaran_input->tampilData('data_siswa')->result();

					$this->load->model('model_dataganti_profile');
					$wheres = array('username' => $this->session->userdata('nama'));
					$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();
			
					$this->load->view('admin/data_bayaran/input_data',$data);
			}
			else
			{
				$data['alert'] = 'error';
				$this->load->model('model_databayaran_input');
				$data['data_siswa'] = $this->model_databayaran_input->tampilData('data_siswa')->result();

				$this->load->model('model_databayaran_input');
				$data['data_biaya'] = $this->model_databayaran_input->tampilDataBiayaLes('rincian_biaya_les')->result();

				$this->load->model('model_dataganti_profile');
				$wheres = array('username' => $this->session->userdata('nama'));
				$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();

				$this->load->view('admin/data_bayaran/input_data',$data);
			}
		}
		else
		{
			$data['alert'] = 'error';

			$this->load->model('model_databayaran_input');
			$data['data_siswa'] = $this->model_databayaran_input->tampilData('data_siswa')->result();

			$this->load->model('model_databayaran_input');
			$data['data_biaya'] = $this->model_databayaran_input->tampilDataBiayaLes('rincian_biaya_les')->result();

			$this->load->model('model_dataganti_profile');
			$wheres = array('username' => $this->session->userdata('nama'));
			$data['foto_profile'] = $this->model_dataganti_profile->tampilFoto($wheres,'data_karyawan')->result();
				
			$this->load->view('admin/data_bayaran/input_data',$data);
		}
	}
}