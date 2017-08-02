<?php
class model_datagaji extends CI_Model 
{
	function tampilData($table)
	{		
		return $this->db->order_by('id','ASC')->get($table);
	}
	function hitungTotalGaji($table)
	{		
		return $this->db->select('SUM(gaji) as total, MONTH(tanggal) as month, YEAR(tanggal) as year ')->group_by(array("MONTH(tanggal)","YEAR(tanggal)"))->get($table);
	}
	function hitungJmlData()
	{
		return $this->db->get('data_gaji')->num_rows();
	}
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	function ubah_data($id,$data){
		$this->db->where('id', $id)->update('data_gaji',$data);
	}
}