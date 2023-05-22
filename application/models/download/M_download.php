<?php

class M_download extends CI_Model
{
	function data()
	{
		$nip = $this->session->userdata('ses_id');
		// $kelas = $this->db->get_where('nip',$nip)->result();
		$this->db->where('nip',$nip);
		$this->db->from('file');
		$this->db->join('kelas','kelas.id_kelas = file.id_kelas');
		// $this->db->join('guru','guru.nip = file.nip');
		$this->db->join('mapel','mapel.id_mapel = file.id_mapel');
		return $this->db->get('')->result();
	}


	function hapus($id)
	{
		$data = $this->db->get_where('file',['id' => $id])->row();

		unlink("./uploads/$data->nama_file");

		return $this->db->delete('file',['id' => $id]);
	}

	function hapus_tugas($id)
	{
		$data = $this->db->get_where('tugas',['id' => $id])->row();

		unlink("./uploads/murid/$data->nama_file");

		return $this->db->delete('tugas',['id' => $id]);
	}

	function murid()
	{
		$nis = $this->session->userdata('ses_id');
		$kelas = $this->db->get_where('murid',['nis' => $nis])->row();
		$this->db->where('id_kelas',$kelas->id_kelas);
		$this->db->from('file');
		$this->db->join('mapel','mapel.id_mapel = file.id_mapel');
		// $this->db->join('kelas','kelas.id_kelas = file.id_kelas');
		return $this->db->get('')->result();
	}

	function tugas_murid()
	{
		$nis = $this->session->userdata('ses_id');
		$this->db->where('nis',$nis);
		$this->db->from('tugas');
		$this->db->join('mapel','mapel.id_mapel = tugas.id_mapel');
		$this->db->join('guru','guru.nip = tugas.nip');
		return $this->db->get('')->result();
	}
}
?>