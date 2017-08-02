<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();		
		$this->load->model('model_login');
 
	}
 
	public function index()
	{
		$this->load->helper('url'); //untuk menarik link CSS
		if($this->session->userdata('status') == "login")
		{
			redirect(base_url("admin/home")); 
		}
		else
		{
			$this->load->model('model_login');
			$val = array(
						'status_online' => 'OFFLINE',
					);
			$where = array('username' => $this->session->userdata('nama'));
			$this->model_login->update_online_status($where, $val,'data_karyawan');
			$data['alert'] = " ";
			$this->load->view('admin/login', $data);
		}
	}
 
	function error()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$where = array(
			'email' => $username,
			'password' => $password
			);//check username dan password dari file data_karyawan
		$cek = $this->model_login->cek_login("data_karyawan",$where)->num_rows();
		$data['result'] = $this->model_login->cek_login("data_karyawan",$where)->result();
		if($cek > 0)
		{
 			foreach($data['result'] as $result)
 			{
 				$data_session = array(
				'nama' => $result->username,
				'status' => "login"
				);
 
				$this->session->set_userdata($data_session);
	 			
	 			$val = array(
						'status_online' => 'ONLINE',
					);
				$where = array('username' => $this->session->userdata('nama'));
				$this->model_login->update_online_status($where, $val,'data_karyawan');

	 			//kalau username dan password benar dia langsung ke halaman home
				redirect(base_url("admin/home"));
 			}
		}
		else
		{
			$data['alert'] = "error";
			$this->load->view('admin/login', $data);
			//kalau username dan password salah dia kembali ke halaman login
             //redirect(base_url("admin/home"));
		}
	}
 
	function logout(){
		$this->load->model('model_login');

		$val = array(
					'status_online' => 'OFFLINE',
				);
		$where = array('username' => $this->session->userdata('nama'));
		$this->model_login->update_online_status($where, $val,'data_karyawan');

		//destroy session di home
		$this->session->sess_destroy();
		redirect(base_url('admin/login'));
	}

	function logoutBrowser(){

		$config['sess_expire_on_close'] = TRUE;
		$config['sess_expiration'] = 1; 

		$this->load->model('model_login');

		$val = array(
					'status_online' => 'OFFLINE',
				);
		$where = array('username' => $this->session->userdata('nama'));
		$this->model_login->update_online_status($where, $val,'data_karyawan');

		//destroy session di home
		$this->session->sess_destroy();
		redirect(base_url('admin/login'));
	}
	function secure()
	{
		$this->load->model('model_login');
		$data['karyawan'] = $this->model_login->getData("data_karyawan")->result();
		$i = 0;
		foreach($data['karyawan'] as $item)
		{
			$val = array(
				'id' => uniqid(),
			);
			$vals = array(
				'username' => uniqid(),
			);
			$vals = array(
				'password' => uniqid(),
			);
			$where = array('id' => $item->id);
			$this->model_login->updateData($where, $val,'absen_karyawan');
			$this->model_login->updateData($where, $vals,'absen_karyawan');
			$this->model_login->updateData($where, $val,'data_gaji');
			$this->model_login->updateData($where, $vals,'data_gaji');
			$this->model_login->updateData($where, $val,'data_karyawan');
			$this->model_login->updateData($where, $vals,'data_karyawan');
			$this->model_login->updateData($where, $val,'compare_karyawan');
			$i += 1;
		}
		redirect(base_url('admin/login'));
	}
}
