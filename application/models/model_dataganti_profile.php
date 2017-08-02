<?php
class model_dataganti_profile extends CI_Model 
{
	function updateFotoDataKaryawan($uname,$data)
	{
		$this->db->where('username', $uname)->update('data_karyawan', $data);
	}
	function tampilFoto($where,$table)
	{		
		return $this->db->order_by('id','ASC')->get_where($table,$where);
	}
}