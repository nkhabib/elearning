<?php

class M_soal extends CI_Model
{
	function ganda($result = array())
	{
		$this->db->insert_batch('ganda',$result,'id_soal');
	}

	function essay($result = array())
	{
		$this->db->insert_batch('essay',$result,'id_soal');
	}

	function update($data,$id_ganda)
	{
		$this->db->where('id_ganda',$id_ganda);
		return $this->db->update('ganda',$data);
	}

	function update_essay($data,$id_essay)
	{
		$this->db->where('id_essay',$id_essay);
		return $this->db->update('essay',$data);
	}
}
?>