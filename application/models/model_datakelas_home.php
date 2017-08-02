<?php
class model_datakelas_home extends CI_Model 
{
	function tampilData($table)
	{		
		return $this->db->order_by('id_jadwal','ASC')->get($table);
	}
	function tampilGuru($table)
	{		
		return $this->db->order_by('id_tutor','ASC')->get($table);
	}
	function insertKelas($data, $table)
	{		
		$this->db->insert($table, $data);
	}
	function deleteKelas($id, $table)
	{		
		$this->db->where($id)->delete($table);
	}
}