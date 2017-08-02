<?php
class model_datagaji_SD extends CI_Model 
{
	function tampilData($table,$where)
	{		
		return $this->db->order_by('id','ASC')->get_where($table, $where);
	}
	function hitungTotalGaji($table)
	{		
		return $this->db->select('SUM(gaji) as total , MONTH(tanggal) as month, YEAR(tanggal) as year ')->where('level','SD')->group_by(array("MONTH(tanggal)","YEAR(tanggal)"))->get($table);
	}
	function hitungJmlData()
	{
		return $this->db->get('data_gajiguru')->num_rows();
	}
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	function ubah_data($id,$data){
		$this->db->where('id', $id)->where('level','SD')->update('data_gajiguru',$data);
	}
}