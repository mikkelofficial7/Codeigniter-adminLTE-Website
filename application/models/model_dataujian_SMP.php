<?php
class model_dataujian_SMP extends CI_Model 
{
	function tampilData()
	{		
		return $this->db->order_by('waktu DESC', 'nilai DESC')->group_start()->where('level','SMP')->or_where('level','MTS')->group_end()->get('data_ujian');
	}
	function hitungJmlData()
	{
		return $this->db->where('level','SMP')->or_where('level','MTS')->get('data_siswa')->num_rows();
	}
	function hapus_data($where,$table){
		$this->db->where($where)->delete($table);
	}
}