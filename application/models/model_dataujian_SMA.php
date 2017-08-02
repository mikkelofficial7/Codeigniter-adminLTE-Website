<?php
class model_dataujian_SMA extends CI_Model 
{
	function tampilData()
	{		
		return $this->db->order_by('waktu DESC', 'nilai DESC')->group_start()->where('level','SMA')->or_where('level','MA')->or_where('level','SMK')->group_end()->get('data_ujian');
	}
	function hitungJmlData()
	{
		return $this->db->where('level','SMA')->or_where('level','SMK')->or_where('level','MA')->get('data_siswa')->num_rows();
	}
	function hapus_data($where,$table){
		$this->db->where($where)->delete($table);
	}
}