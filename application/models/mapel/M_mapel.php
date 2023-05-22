<?php

class M_mapel extends CI_Model
{
	function get_mapel($perpage,$offset)
	{
		$masuk = $this->session->userdata('masuk');
		if ($masuk == 'murid') 
		{
			$nis = $this->session->userdata('ses_id');
			$murid = $this->db->get('murid')->row_array();
			// $this->db->order_by('kelas', 'ASC');
			$this->db->where('id_kelas',$murid['id_kelas']);
			$this->db->from('mengajar',$perpage,$offset);
			$this->db->join('mapel','mapel.id_mapel = mengajar.id_mapel');
			// $this->db->join('kelas','kelas.id_kelas = mengajar.id_kelas');
			$this->db->join('guru','guru.nip = mengajar.nip');
			return $this->db->get('',$perpage,$offset)->result();	
		} else
			{
				$this->db->order_by('kelas', 'ASC');
				$this->db->from('mengajar',$perpage,$offset);
				$this->db->join('mapel','mapel.id_mapel = mengajar.id_mapel');
				$this->db->join('kelas','kelas.id_kelas = mengajar.id_kelas');
				$this->db->join('guru','guru.nip = mengajar.nip');
				return $this->db->get('',$perpage,$offset)->result();
			}
	}

	function tambah($post)
	{
		$mapel = array(
			'mapel' => $post['mapel'],
		);

		$this->db->insert('mapel',$mapel);

		$new_mapel = $this->db->get_where('mapel',['mapel' => $post['mapel']])->row_array();
		$mengajar = array(
			'nip' => $post['guru'],
			'id_mapel' => $new_mapel['id_mapel'],
			'id_kelas' => $post['kelas'],
		);

		return $this->db->insert('mengajar',$mengajar);
	}

	function get_noguru($perpage,$offset)
	{
		$id_mengajar = $this->db->get('mengajar')->result();
		$not = array();
		foreach ($id_mengajar as $key) 
		{
			array_push($not, $key->id_mapel);
		}

		$this->db->from('mapel',$perpage,$offset);
		$this->db->where_not_in('id_mapel',$not);
		return $this->db->get('',$perpage,$offset)->result();
		
	}

	function edit($id_mengajar)
	{
		$this->db->where('id_mengajar',$id_mengajar);
		$this->db->from('mengajar');
		$this->db->join('mapel','mapel.id_mapel = mengajar.id_mapel');
		$this->db->join('kelas','kelas.id_kelas = mengajar.id_kelas');
		$this->db->join('guru','guru.nip = mengajar.nip');
		return $this->db->get('')->result();
		// $this->db->join('kelas');
		// return $this->db->get_where('mapel',['id_mapel' => $id_mapel])->result();
	}

	function update($id,$data)
	{
		$this->db->where('id_mengajar',$id);
		return $this->db->update('mengajar',$data);
	}


	function update_ngr($data,$id_mapel,$mapel)
	{
		$this->db->where('id_mapel',$id_mapel);
		$this->db->update('mapel',$mapel);
		return $this->db->insert('mengajar',$data);
	}


	function hapus($id_mapel)
	{
		$this->db->where('id_mapel',$id_mapel);
		$this->db->delete('mengajar');

		$file = $this->db->get_where('file',['id_mapel' => $id_mapel])->result();
		foreach ($file as $fl) 
		{
			unlink("./uploads/".$fl->nama_file);
			$this->db->where('id_mapel',$fl->id_mapel);
			$this->db->delete('file');

		}

		$tugas = $this->db->get_where('tugas',['id_mapel' => $id_mapel])->result();
		foreach ($tugas as $tg) 
		{
			unlink("./uploads/murid/$tg->nama_file");
			$this->db->where('id_mapel',$tg->id_mapel);
			$this->db->delete('tugas');

		}


		$this->db->where('id_mapel',$id_mapel);
		return $this->db->delete('mapel');
	}

	function guru($id_mapel)
	{
		$this->db->from('mengajar');
		$this->db->join('guru','guru.nip = mengajar.nip');
		$this->db->join('mapel','mapel.id_mapel = mengajar.id_mapel');
		$guru = $this->db->get_where('',['mengajar.id_mapel' => $id_mapel])->result();
		return $unique = array_unique(array_column($guru, 'nama'));
	}

	function murid($id_mapel)
	{
		return $this->db->get_where('mengajar',['id_mapel' => $id_mapel])->result();
	}

	function kelas($perpage,$offset,$id_kelas)
	{
		$this->db->order_by('kelas', 'ASC');
		$this->db->from('mengajar',$perpage,$offset);
		$this->db->where('mengajar.id_kelas',$id_kelas);
		$this->db->join('mapel','mapel.id_mapel = mengajar.id_mapel');
		$this->db->join('kelas','kelas.id_kelas = mengajar.id_kelas');
		$this->db->join('guru','guru.nip = mengajar.nip');
		return $this->db->get('',$perpage,$offset)->result();
	}
}
?>