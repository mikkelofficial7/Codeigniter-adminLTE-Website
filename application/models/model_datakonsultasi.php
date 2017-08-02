<?php
class model_datakonsultasi extends CI_Model 
{
	function tampilNamaGuruSemua($table)
	{		
		return $this->db->order_by('id_tutor','ASC')->get_where($table);
	}
	function tampilNamaSiswaSemua($table)
	{		
		return $this->db->order_by('id_siswa','ASC')->get_where($table);
	}
	function tampilNamaGuruSD($table)
	{		
		return $this->db->order_by('id_tutor','ASC')->where('status','sudah')->where('level','SD')->get_where($table);
	}
	function tampilNamaGuruSMP($table)
	{		
		return $this->db->order_by('id_tutor','ASC')->where('status','sudah')->group_start()->where('level','SMP')->or_where('level','MTS')->group_end()->get($table);
	}
	function tampilNamaGuruSMA($table)
	{		
		return $this->db->order_by('id_tutor','ASC')->where('status','sudah')->group_start()->where('level','SMA')->or_where('level','SMK')->or_where('level','MA')->group_end()->get($table);
	}
	function tampilNamaSiswaSMA($table)
	{		
		return $this->db->order_by('id_siswa','ASC')->where('status','sudah')->group_start()->where('level','SMA')->or_where('level','SMK')->or_where('level','MA')->group_end()->get($table);
	}
	function tampilNamaSiswaSMP($table)
	{		
		return $this->db->order_by('id_siswa','ASC')->where('status','sudah')->group_start()->where('level','SMP')->or_where('level','MTS')->group_end()->get($table);
	}
	function tampilNamaSiswaSD($table)
	{		
		return $this->db->order_by('id_siswa','ASC')->where('status','sudah')->group_start()->where('level','SD')->group_end()->get($table);
	}
	function insertData($data,$table)
	{
		return $this->db->insert($table,$data);
	}
}