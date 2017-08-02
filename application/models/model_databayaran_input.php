<?php
class model_databayaran_input extends CI_Model 
{
	function getData($data,$table)
	{
		return $this->db->insert($table,$data);
	}
	function tampilDataBiayaLes($table)
	{
		return $this->db->order_by('id','ASC')->get($table);
	}
	function tampilData($table)
	{	
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d');
		$arrdate = explode("-", $date);
		return $this->db->order_by('id_siswa','ASC')->where('MONTH(tanggal_jatuh_tempo)', $arrdate[1])->where('DAY(tanggal_jatuh_tempo) >=', $arrdate[2])->get($table);
	}
	function updateData($id,$data)
	{
		$this->db->where('id_siswa', $id)->update('data_siswa', $data);
	}
}