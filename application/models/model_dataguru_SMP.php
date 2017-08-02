<?php
class model_dataguru_SMP extends CI_Model 
{
	function tampilData($table)
	{		
		return $this->db->order_by('id_tutor','ASC')->where('level','SMP')->or_where('level','MTS')->get($table);
	}
	function hitungJmlData()
	{
		return $this->db->where('level','SMP')->or_where('level','MTS')->get('data_guru')->num_rows();
	}
	function hapus_data($where,$table){
		$this->db->where($where)->group_start()->where('level','SMP')->or_where('level','MTS')->group_end()->delete($table);
	}
	function update_verif_SMP($id, $data)
	{
		$this->db->where('id_tutor', $id)->update('data_guru', $data);
	}
}