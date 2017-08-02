<?php
class model_databayaran_SMA extends CI_Model 
{
	function tampilData($table)
	{		
		return $this->db->where('level','SMA')->or_where('level','SMK')->or_where('level','MA')->order_by('tanggal_jatuh_tempo','DESC')->get($table);
	}
	function hitungJmlData()
	{
		return $this->db->where('level','SMA')->or_where('level','SMK')->or_where('level','MA')->get('data_bayaran')->num_rows();
	}
	function hitungJmlDataBulanIni($table)
	{
		return $this->db->select('SUM(jumlah_biaya) as total, MONTH(tanggal_bayaran) as month, YEAR(tanggal_bayaran) as year')->where('level','SMA')->or_where('level','MA')->or_where('level','SMK')->group_by(array("MONTH(tanggal_bayaran)","YEAR(tanggal_bayaran)"))->get($table);
	}
	function hapus_data($where,$table){
		$this->db->where($where)->group_start()->where('level','SMA')->or_where('level','SMK')->or_where('level','MA')->group_end()->delete($table);
	}
}