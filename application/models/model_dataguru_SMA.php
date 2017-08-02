<?php
class model_dataguru_SMA extends CI_Model 
{
	function tampilData($table)
	{		
		return $this->db->order_by('id_tutor','ASC')->where('level','SMA')->or_where('level','SMK')->or_where('level','MA')->get($table);
	}
	function hitungJmlData()
	{
		return $this->db->where('level','SMA')->or_where('level','SMK')->or_where('level','MA')->get('data_guru')->num_rows();
	}
	function hapus_data($where,$table){
		$this->db->where($where)->group_start()->where('level','SMA')->or_where('level','SMK')->or_where('level','MA')->group_end()->delete($table);
	}
	function update_verif_SMA($id, $data)
	{
		$this->db->where('id_tutor', $id)->update('data_guru', $data);
	}
}