<?php
class model_dataguru_SD extends CI_Model 
{
	function tampilData($where,$table)
	{		
		return $this->db->order_by('id_tutor','ASC')->get_where($table,$where);
	}
	function hitungJmlData()
	{
		return $this->db->where('level','SD')->get('data_guru')->num_rows();
	}
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	function update_verif_SD($id, $data)
	{
		$this->db->where('id_tutor', $id)->update('data_guru', $data);
	}
}