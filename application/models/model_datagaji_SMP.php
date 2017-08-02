<?php
class model_datagaji_SMP extends CI_Model 
{
	function tampilData($table)
	{		
		return $this->db->order_by('id','ASC')->where('level','SMP')->or_where('level','MTS')->get($table);
	}
	function hitungTotalGaji($table)
	{		
		return $this->db->select('SUM(gaji) as total , MONTH(tanggal) as month, YEAR(tanggal) as year ')->where('level','SMP')->or_where('level','MTS')->group_by(array("MONTH(tanggal)","YEAR(tanggal)"))->get($table);
	}
	function hitungJmlData()
	{
		return $this->db->get('data_gajiguru')->num_rows();
	}
	function hapus_data($where,$table){
		$this->db->where($where)->delete($table);
	}
	function ubah_data($id,$data){
		$this->db->where('id', $id)->group_start()->where('level','SMP')->or_where('level','MTS')->group_end()->update('data_gajiguru',$data);
	}
}