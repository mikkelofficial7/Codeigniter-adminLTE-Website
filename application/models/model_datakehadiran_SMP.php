<?php
class model_datakehadiran_SMP extends CI_Model 
{
	function tampilData()
	{		
		return $this->db->select('b.id_tutor, a.nama_depan, a.nama_belakang, b.materi, b.kelas, b.level, b.pelajaran, b.jam_masuk, b.jam_keluar, b.tanggal, b.status_hadir')->join('data_guru a','a.id_tutor = b.id_tutor', 'left')->order_by('b.tanggal DESC')->group_start()->where('b.level','MTS')->or_where('b.level','SMP')->group_end()->get('data_kbm b');
	}
	function hitungJmlData()
	{
		return $this->db->where('level','SMP')->or_where('level','MTS')->get('data_kbm');
	}
	function hapus_data($where,$table){
		$this->db->where($where)->group_start()->where('level','SMP')->or_where('level','MTS')->group_end()->delete($table);
	}
	/*******************************************************************************/
	function getIzin($data,$table)
	{
		return $this->db->insert($table,$data);
	}
	function tampil_izin()
	{
		return $this->db->order_by('tanggal','DESC')->where('level','SMP')->or_where('level','MTS')->get('data_penggantian');
	}
	function hapus_izin($where,$table){
		$this->db->where($where)->group_start()->where('level','SMP')->or_where('level','MTS')->group_end()->delete($table);
	}
	function tampilDropdownIzin()
	{		
		return $this->db->select('b.id_tutor, a.nama_depan, a.nama_belakang, b.materi, b.kelas, b.level, b.pelajaran, b.jam_masuk, b.jam_keluar, b.tanggal, b.status_hadir')->join('data_guru a','a.id_tutor = b.id_tutor', 'left')->order_by('b.tanggal DESC')->where('MONTH(b.tanggal)', date('m'))->where('YEAR(b.tanggal)', date('Y'))->group_start()->where('b.level','SMP')->or_where('b.level','MTS')->group_end()->where('status_hadir','tidak hadir')->get('data_kbm b');
	}
	function tampilDropdownHadir()
	{		
		date_default_timezone_set('Asia/Jakarta');
		return $this->db->get('data_guru');
	}
}