<?php
class model_datasiswa_SMP extends CI_Model 
{
	function tampilData($table)
	{		
		return $this->db->where('level','SMP')->or_where('level','MTS')->get($table);
	}
	function hitungJmlData()
	{
		return $this->db->where('level','SMP')->or_where('level','MTS')->get('data_siswa')->num_rows();
	}
	function hapus_data($where,$table){
		$this->db->where($where)->group_start()->where('level','SMP')->or_where('level','MTS')->group_end()->delete($table);
	}
	function update_tempo_SMP($id, $data)
	{
		$this->db->where('id_siswa', $id)->update('data_siswa', $data);
	}
	function update_verif_SMP($id, $data)
	{
		$this->db->where('id_siswa', $id)->update('data_siswa', $data);
	}
}