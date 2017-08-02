<?php
class Model_reset_password extends CI_Model 
{
	function tampilDataPassword($table,$where)
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
}