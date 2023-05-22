<?php

class M_kelas extends CI_Model
{
	
	function tambah($data)
	{
		return $this->db->insert('kelas',$data);
	}

	function get_kelas()
	{
		$tujua = $this->db->get_where('murid',['id_kelas' => 1])->result();
		$jml_tujua = count($tujua);

		$delapana = $this->db->get_where('murid',['id_kelas' => 2])->result();
		$jml_delapana = count($delapana);

		$delapanb = $this->db->get_where('murid',['id_kelas' => 3])->result();
		$jml_delapanb = count($delapanb);

		$sembilana = $this->db->get_where('murid',['id_kelas' => 4])->result();
		$jml_sembilana = count($sembilana);

		$sembilanb = $this->db->get_where('murid',['id_kelas' => 9])->result();
		$jml_sembilanb = count($sembilanb);


		$data = $this->db->get('kelas')->result();

		// $a= array_push($data,array(
		// 	'jml_tujua' => $jml_tujua,
		// 	'jml_delapana' => $jml_delapana,
		// 	'jml_delapanb' => $jml_delapanb,
		// 	'jml_sembilana' => $jml_sembilana,
		// 	'jml_sembilanbl' => $jml_sembilanb,
		// ));

		return $data;

	}

	function jml_murid()
	{
		$tujua = $this->db->get_where('murid',['id_kelas' => 1])->result();
		$jml_tujua = count($tujua);

		$delapana = $this->db->get_where('murid',['id_kelas' => 2])->result();
		$jml_delapana = count($delapana);

		$delapanb = $this->db->get_where('murid',['id_kelas' => 3])->result();
		$jml_delapanb = count($delapanb);

		$sembilana = $this->db->get_where('murid',['id_kelas' => 4])->result();
		$jml_sembilana = count($sembilana);

		$sembilanb = $this->db->get_where('murid',['id_kelas' => 9])->result();
		$jml_sembilanb = count($sembilanb);

		$jml = array(
			'tujua' => $jml_tujua,
			'delapana' => $jml_delapana,
			'delapanb' => $jml_delapanb,
			'sembilana' => $jml_sembilana,
			'sembilanb' => $jml_sembilanb,
		);

		return $jml;
	}

	function edit($id)
	{
		return $this->db->get_where('kelas',['id_kelas' => $id])->result();
	}

	function update($data,$id_kelas)
	{
		$this->db->where('id_kelas',$id_kelas);
		return $this->db->update('kelas',$data);
	}

	function hapus($id)
	{
		$mengajar = $this->db->get_where('mengajar',['id_kelas' => $id])->result();

		foreach ($mengajar as $mgj) 
		{
			$this->db->where('id_kelas',$mgj->id_kelas);
			$this->db->delete('mengajar');
		}

		$murid = $this->db->get_where('murid',['id_kelas' => $id])->result();

		foreach ($murid as $mrd) 
		{
			$this->db->where('id_kelas',$mrd->id_kelas);
			$this->db->delete('murid');
		}

		$tugas = $this->db->get_where('tugas',['id_kelas' => $id])->result();

		foreach ($tugas as $tgs) 
		{
			$this->db->where('id_kelas',$tgs->id_kelas);
			$this->db->delete('tugas');
		}

		$file = $this->db->get_where('file',['id_kelas' => $id])->result();

		foreach ($file as $fl) 
		{
			$this->db->where('id_kelas',$fl->id_kelas);
			$this->db->delete('file');
		}

		$this->db->where('id_kelas',$id);
		return $this->db->delete('kelas');
	}

	function lihat($perpage,$offset,$id_kelas)
	{
		$this->db->where('murid.id_kelas',$id_kelas);
		$this->db->from('murid');
		$this->db->join('kelas','kelas.id_kelas = murid.id_kelas');
		return $this->db->get("",$perpage,$offset)->result();
	}
}
?>