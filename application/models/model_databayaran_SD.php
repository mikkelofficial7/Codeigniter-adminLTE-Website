<?php
class model_databayaran_SD extends CI_Model 
{
	function tampilData($table)
	{		
		return $this->db->where('level','SD')->order_by('tanggal_jatuh_tempo','DESC')->get($table);
	}
	function hitungJmlData()
	{
		return $this->db->where('level','SD')->get('data_siswa')->num_rows();
	}
	function hitungJmlDataBulanIni($table)
	{
		return $this->db->select('SUM(jumlah_biaya) as total, MONTH(tanggal_bayaran) as month, YEAR(tanggal_bayaran) as year')->where('level','SD')->group_by(array("MONTH(tanggal_bayaran)","YEAR(tanggal_bayaran)"))->get($table);
	}
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}