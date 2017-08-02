<?php
class model_datacetak extends CI_Model 
{
	function tampilDataGuru()
	{		
       $this->db->select('*');
       $this->db->from('data_guru');
       $query = $this->db->get();
       return $query->result();
	}
	function tampilDataSiswa()
	{		
       $this->db->select('*');
       $this->db->from('data_siswa');
       $query = $this->db->get();
       return $query->result();
	}
	function tampilDataKaryawan()
	{		
       $this->db->select('*');
       $this->db->from('data_karyawan');
       $query = $this->db->get();
       return $query->result();
	}
	function tampilGajiKaryawan()
	{		
       $this->db->select('*');
       $this->db->from('data_gaji');
       $query = $this->db->get();
       return $query->result();
	}
	function tampilGajiGuru()
	{		
       $this->db->select('*');
       $this->db->from('data_gajiguru');
       $query = $this->db->get();
       return $query->result();
	}
	function tampilAbsenGuru()
	{		
       $this->db->select('*');
       $this->db->from('data_kbm');
       $query = $this->db->get();
       return $query->result();
	}
	function tampilAbsenPegawai()
	{		
       $this->db->select('*');
       $this->db->from('absen_karyawan');
       $query = $this->db->get();
       return $query->result();
	}
	function tampilKonsultasiGuru()
	{		
       $this->db->select('*');
       $this->db->from('data_konsultasi');
       $query = $this->db->get();
       return $query->result();
	}
	function tampilPenggantianGuru()
	{		
       $this->db->select('*');
       $this->db->from('data_penggantian');
       $query = $this->db->get();
       return $query->result();
	}
	function tampilBayaranSiswa()
	{		
       $this->db->select('*');
       $this->db->from('data_bayaran');
       $query = $this->db->get();
       return $query->result();
	}
	function tampilDataBarang()
	{		
       $this->db->select('*');
       $this->db->from('data_barangmasuk');
       $query = $this->db->get();
       return $query->result();
	}
       function tampilDataUjian()
       {             
       $query = $this->db->select('a.id_soal, a.id_siswa, a.nilai, a.waktu, a.kategori, b.nama_depan, b.nama_belakang, a.kelas, a.level')->join('data_siswa b','a.id_siswa = b.id_siswa', 'left')->order_by('a.waktu DESC', 'a.nilai DESC')->get('data_ujian a');
       return $query->result();
       }
}