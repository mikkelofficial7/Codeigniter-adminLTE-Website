<?php
class Model_absence extends CI_Model 
{
	function getSalaryAbsence($data,$table)
	{
		return $this->db->insert($table,$data);
	}
	function tampilDataGaji($table)
	{		
		date_default_timezone_set('Asia/Jakarta');
		return $this->db->select('id, gaji, MONTH(tanggal) as month, YEAR(tanggal) as year')->where('MONTH(tanggal)',date('m'))->where('YEAR(tanggal)',date('Y'))->group_by('id','MONTH(tanggal)','YEAR(tanggal)')->get('data_gaji');
	}
	function update_gaji($id, $data)
	{
		$this->db->where('id', $id)->update('data_gaji', $data);
	}
	function getAbsence($data,$table)
	{
		return $this->db->insert($table,$data);
	}
	function tampil_data()
	{
		return $this->db->order_by('tgl_masuk','DESC')->order_by('jam_masuk','DESC')->get('absen_karyawan');
	}
	function tampil_sum_data_karyawan()
	{
		date_default_timezone_set('Asia/Jakarta');
		return $this->db->select('id, COUNT(id) as idtotal, nama, username, MONTH(tgl_masuk) as month, YEAR(tgl_masuk) as year')->where('MONTH(tgl_masuk)',date('m'))->where('YEAR(tgl_masuk)',date('Y'))->group_by('id','MONTH(tgl_masuk)','YEAR(tgl_masuk)')->get('absen_karyawan');
	}
	/*******************************************/
	function tampil_sum_data_Guru_kbm()
	{
		date_default_timezone_set('Asia/Jakarta');
		return $this->db->select('a.nama_depan, b.pelajaran, b.id_tutor, b.level, b.kelas, COUNT(b.id_tutor) as idtotal_kbm, MONTH(b.tanggal) as month, YEAR(b.tanggal) as year' )->join('data_guru a', 'a.id_tutor = b.id_tutor', 'left')->where('a.status','sudah')->where('b.status_hadir','hadir')->where('MONTH(b.tanggal)',date('m'))->where('YEAR(b.tanggal)',date('Y'))->group_by(array('b.id_tutor','b.level','MONTH(b.tanggal)', 'YEAR(b.tanggal)' ))->get('data_kbm b');
	}
	function tampil_sum_data_Guru_konsultasi()
	{
		date_default_timezone_set('Asia/Jakarta');
		return $this->db->select('a.nama_depan, b.id_tutor, b.level, COUNT(b.id_tutor) as idtotal_konsultasi, MONTH(b.tanggal) as month, YEAR(b.tanggal) as year')->join('data_guru a', 'a.id_tutor = b.id_tutor', 'left')->where('a.status','sudah')->where('b.status_konsultasi','DITERIMA')->where('MONTH(b.tanggal)',date('m'))->where('YEAR(b.tanggal)',date('Y'))->where('b.status_konsultasi','diterima')->group_by(array('b.id_tutor','b.level','MONTH(b.tanggal)', 'YEAR(b.tanggal)'))->get('data_konsultasi b');
	}
	function tampil_sum_data_Guru_penggantian()
	{
		date_default_timezone_set('Asia/Jakarta');
		return $this->db->select('a.nama_depan, b.pelajaran, b.id, b.level, b.kelas, COUNT(b.id) as idtotal_penggantian, MONTH(b.tanggal) as month, YEAR(b.tanggal) as year')->join('data_guru a', 'a.id_tutor = b.id', 'left')->where('a.status','sudah')->where('MONTH(b.tanggal)',date('m'))->where('YEAR(b.tanggal)',date('Y'))->group_by(array('b.id','b.level','MONTH(b.tanggal)', 'YEAR(b.tanggal)'))->get('data_penggantian b');
	}

	/******************************************/
	function tampil_gajiguru_temp()
	{
		date_default_timezone_set('Asia/Jakarta');
		return $this->db->select('a.nama, a.id, b.level, a.kelas, SUM(a.gaji) as gajitotal, MONTH(a.tanggal) as month, YEAR(a.tanggal) as year')->where('MONTH(a.tanggal)',date('m'))->where('YEAR(a.tanggal)',date('Y'))->join('data_guru b', 'a.id = b.id_tutor', 'left')->group_by(array('a.id', 'MONTH(a.tanggal)', 'YEAR(a.tanggal)'))->get('data_gajiguru_temp a');
	}
	function hapus_absensi($where,$table){
		$this->db->where($where);
		return $this->db->delete($table);
	}
	public function getDataKaryawan($id)
	{
		return $this->db->where('id',$id)->get('data_karyawan');
	}
	public function tampilDataKaryawan()
	{
		return $this->db->get('data_karyawan');
	}
	public function getDataCompare($table)
	{
		return $this->db->get($table);
	}
	public function getNamaCompare()
	{
		return $this->db->select('a.id, a.nama_depan, a.nama_belakang, b.gaji_pokok, b.gaji_makan')->join('compare_karyawan b', 'a.id = b.id', 'left')->get('data_karyawan a');
	}
}