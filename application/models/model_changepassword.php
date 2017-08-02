<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_changepassword extends CI_Model {
	
	function tampilUsername($where,$table)
	{
		return $this->db->get_where($table,$where);
	}
	function updateDataPass($where,$table)
	{		
		return $this->db->get_where($table,$where);
	}
	function processUpdatePassword($where,$data,$table)
	{
		$this->db->where($where);
		return $this->db->update($table,$data);
	}
	function processUpdateEmail($where,$data,$table)
	{
		$this->db->where($where);
		return $this->db->update($table,$data);
	}
	function updateEmptyProfil($where,$data,$table)
	{
		$this->db->where($where);
		return $this->db->update($table,$data);
	}
}
