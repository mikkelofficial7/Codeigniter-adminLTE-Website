<?php
class model_datamodul extends CI_Model 
{
	function tampilDataSD($table)
	{		
		return $this->db->order_by('id','ASC')->where('level','SD')->get($table);
	}
	function tampilDataSMP($table)
	{		
		return $this->db->order_by('id','ASC')->where('level','SMP')->get($table);
	}
	function tampilDataSMA($table)
	{		
		return $this->db->order_by('id','ASC')->where('level','SMA')->or_where('level','SMK')->get($table);
	}
}