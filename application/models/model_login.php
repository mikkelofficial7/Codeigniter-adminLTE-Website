<?php 
class Model_login extends CI_Model{	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}
	function update_online_status($where,$data,$table){		
		$this->db->where($where);
		return $this->db->update($table,$data);
	}
	function getData($table){		
		return $this->db->get($table);
	}	
	function updateData($where,$data,$table)
	{
		$this->db->where($where);
		return $this->db->update($table,$data);
	}
}