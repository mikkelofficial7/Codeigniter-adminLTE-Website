<?php
class model_datasiswa_SMA extends CI_Model 
{
	function tampilData($table)
	{		
		return $this->db->where('level','SMA')->or_where('level','SMK')->or_where('level','MA')->get($table);
	}
	function hitungJmlData()
	{
		return $this->db->where('level','SMA')->or_where('level','SMK')->or_where('level','MA')->get('data_siswa')->num_rows();
	}
	function hapus_data($where,$table){
		$this->db->where($where)->group_start()->where('level','SMA')->or_where('level','SMK')->or_where('level','MA')->group_end()->delete($table);
	}
	function update_tempo_SMA($id, $data)
	{
		$this->db->where('id_siswa', $id)->update('data_siswa', $data);
	}
	function update_verif_SMA($id, $data)
	{
		$this->db->where('id_siswa', $id)->update('data_siswa', $data);
	}
}