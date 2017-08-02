<?php
class model_datasiswa_SD extends CI_Model 
{
	function tampilData($where,$table)
	{		
		return $this->db->order_by('id_siswa','ASC')->get_where($table,$where);
	}
	function hitungJmlData()
	{
		return $this->db->where('level','SD')->get('data_siswa')->num_rows();
	}
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	function update_tempo_SD($id, $data)
	{
		$this->db->where('id_siswa', $id)->update('data_siswa', $data);
	}
	function update_verif_SD($id, $data)
	{
		$this->db->where('id_siswa', $id)->update('data_siswa', $data);
	}
}