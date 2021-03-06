<?php
class model_datakbm_SMA extends CI_Model 
{
	function tampilData()
	{		
		return $this->db->select('a.id_tutor, a.nama_depan, a.nama_belakang, b.pelajaran, b.materi, b.kelas, b.level, b.jam_masuk, b.jam_keluar, b.tanggal, b.status_hadir')->join('data_guru a','a.id_tutor = b.id_tutor', 'left')->order_by('b.tanggal DESC')->group_start()->where('b.level','MA')->or_where('b.level','SMK')->or_where('b.level','SMA')->group_end()->where('b.status_hadir','hadir')->get('data_kbm b');
	}
	function hitungJmlData()
	{
		return $this->db->select('a.id_tutor, a.nama_depan, a.nama_belakang, b.pelajaran, b.materi, b.kelas, b.level, b.jam_masuk, b.jam_keluar, b.tanggal, b.status_hadir')->join('data_guru a','a.id_tutor = b.id_tutor', 'left')->order_by('b.tanggal DESC')->group_start()->where('b.level','MA')->or_where('b.level','SMK')->or_where('b.level','SMA')->group_end()->where('b.status_hadir','hadir')->get('data_kbm b')->num_rows();
	}
	function hapus_data($where,$table){
		$this->db->where($where)->where('status_hadir','hadir')->group_start()->where('level','SMA')->or_where('level','SMK')->or_where('level','MA')->group_end()->delete($table);
	}
}