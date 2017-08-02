<?php
class model_tambahpegawai extends CI_Model 
{
	function insertData($data,$table)
	{
		return $this->db->insert($table,$data);
	}
	function updateData($data,$val)
	{
		$this->db->where('id', $data)->update('compare_karyawan',$val);
	}
}