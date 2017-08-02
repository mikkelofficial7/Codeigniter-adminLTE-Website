<?php
class model_databarang extends CI_Model 
{
	function tampilData($table)
	{		
		return $this->db->select('id, nama, tanggal, harga, jumlah , MONTH(tanggal) as month, YEAR(tanggal) as year' )->order_by('nama','ASC')->get($table);
	}
	function hitungTotalbarang($table)
	{		
		return $this->db->select('COUNT(id) as count, SUM(harga * jumlah) as total, MONTH(tanggal) as month, YEAR(tanggal) as year')->group_by(array("MONTH(tanggal)","YEAR(tanggal)"))->get($table);
	}
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	function getDataBarang($data,$table)
	{
		return $this->db->insert($table,$data);
	}
}