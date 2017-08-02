<?php
class model_dataujian_SD extends CI_Model 
{
	function tampilData()
	{		
		return $this->db->order_by('waktu DESC', 'nilai DESC')->where('level','SD')->get('data_ujian');
	}
	function hitungJmlData()
	{
		return $this->db->order_by('waktu DESC', 'nilai DESC')->where('level','SD')->num_rows();
	}
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}