<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class error404 extends CI_Controller {
	
	public function index()
	{
		$this->load->view('admin/error404');
	}
}