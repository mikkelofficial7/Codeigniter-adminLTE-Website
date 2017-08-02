<?php
class model_datakaryawan extends CI_Model 
{
	function tampilData()
	{		
		return $this->db->order_by('id','ASC')->get('data_karyawan');
	}
	function hitungJmlData()
	{
		return $this->db->get('data_karyawan')->num_rows();
	}
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}