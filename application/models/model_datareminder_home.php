<?php
class model_datareminder_home extends CI_Model 
{
	function getData($data,$table)
	{
		return $this->db->insert($table,$data);
	}
	function tampilDropdownGuru()
	{		
		return $this->db->get('data_guru');
	}
	function tampilDropdownSiswa()
	{		
		return $this->db->get('data_siswa');
	}
}