<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class forgotPassword extends CI_Controller {

	protected $username;

	function __construct()
	{
		parent::__construct();		
		$this->load->model('model_reset_password');
	}

	public function s6MG02tcyl4sem5XIfHPKvmyQrDQSPuv4gTN7pPv()
	{
		$this->load->helper('url'); //untuk menarik link CSS
		$data['alert'] = 'not error';
		$this->load->view('admin/lupaPassword', $data);
	}
	public function VzOYiaXOge7DAIEXg31qtF8XRB3BDEGk6NXQIAaI()
	{
		$username = $this->input->post('username');
		$where = array( 'email' => $username);
		$cek = $this->model_reset_password->tampilDataPassword("data_karyawan",$where)->num_rows();
		$data['result'] = $this->model_reset_password->tampilDataPassword("data_karyawan",$where)->result();

		if($cek > 0)
		{
			foreach($data['result'] as $result)
 			{
				$data_session = array('nama' => $result->username);
				$this->session->set_userdata($data_session);
				/*kalau ada dia langsung ke halaman ganti password*/
				$val['password'] = $this->model_reset_password->tampilDataPassword("data_karyawan",$where)->result();
				$data['alert'] = 'not error';			
				$this->load->view('admin/dataresetpass',$data);
			}
		}
		else
		{
			$data['alert'] = 'error';
			$this->load->view('admin/lupaPassword', $data);
		}
	}

	/*======================================================= RESET PASSWORD =================================================================================*/

	function initChangePassword()
	{
		$where = array('username' =>  $this->session->userdata('nama'));
		$data['data_karyawan'] = $this->model_reset_password->updateDataPass($where,'data_karyawan')->result();
		$this->load->view('admin/dataresetpass',$data);
	}

	function gJiXAeoa1MwGE0JTHocO8l6kcoUQ2E0GPZIcx7Fu()
	{
		$this->load->helper('url'); 
		$password = $this->input->post('password');
	 	$confirm_password = $this->input->post('c_password');

	 	if($password != null || $confirm_password != null)
	 	{
		 	if($password == $confirm_password && strlen($password) >= 6)
		 	{
				$val = array(
					'password' => md5($password),
				);

				$where = array('username' =>  $this->session->userdata('nama'));
				$this->model_reset_password->processUpdatePassword($where, $val,'data_karyawan');
				$this->model_reset_password->processUpdatePassword($where, $val,'data_karyawan');

				$data['alert'] = 'success';
				$this->session->sess_destroy();
				$this->load->view('admin/dataresetpass',$data);
			}
			else
			{
				$data['alert'] = 'errors';
				$this->load->view('admin/dataresetpass',$data);
			}
		}
		else
		{
			$data['alert'] = 'error';
			$this->load->view('admin/dataresetpass',$data);
		}
	}

}
