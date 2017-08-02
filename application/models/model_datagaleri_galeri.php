<?php
class model_datagaleri_galeri extends CI_Model 
{
	function getData($data,$table)
	{
		return $this->db->insert($table,$data);
	}
	function tampilFoto($table)
	{		
		return $this->db->order_by('namafile','ASC')->get($table);
	}
	function hapus_foto($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}