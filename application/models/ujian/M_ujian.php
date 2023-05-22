<?php

class M_ujian extends CI_Model
{
	function mapel()
	{
		$id = $this->session->userdata('ses_id');
		$this->db->from('mengajar');
		$this->db->where('mengajar.nip',$id);
		$this->db->join('kelas','kelas.id_kelas = mengajar.id_kelas');
		// $this->db->join('mapel','mapel.id_mapel = mengajar.id_mapel');
		return $this->db->get('')->result();
	}

	function tambah($ujian)
	{
		$this->db->insert('ujian',$ujian);
	}

	function lihat($perpage,$offset,$nip)
	{
		if ($this->session->userdata('masuk')=='guru') 
		{
			$this->db->join('mapel','mapel.id_mapel = ujian.id_mapel');
			$this->db->join('kelas','kelas.id_kelas = ujian.id_kelas');
			$this->db->where('ujian.nip',$nip);
			return $this->db->get('ujian',$perpage,$offset)->result();
		} else
			{
				$kelas = $this->db->get_where('murid',['nis'=>$nip])->row_array();

				$this->db->join('mapel','mapel.id_mapel = ujian.id_mapel');
				$this->db->join('kelas','kelas.id_kelas = ujian.id_kelas');
				$this->db->where('ujian.id_kelas',$kelas['id_kelas']);
				return $this->db->get('ujian',$perpage,$offset)->result();
			}
	}

	function lihat_essay($id_soal)
	{
		return $this->db->get_where('essay',['id_soal'=>$id_soal])->result();
	}

	function lihat_soal($id_soal)
	{
		return $this->db->get_where('ganda',['id_soal'=>$id_soal])->result();
	}

	function soal_murid($id_soal)
	{
		$jenis = $this->db->get_where('ujian',['id_soal'=>$id_soal])->row_array();
		if ($jenis['jenis']=="Pilihan Ganda") 
		{
			return $this->db->get_where('ganda',['id_soal'=>$id_soal])->result();
		} else
			{
				return $this->db->get_where('essay',['id_soal'=>$id_soal])->result();
			}
	}

	function jawab($result=array(),$id_soal,$nis)
	{
		$this->db->insert_batch('jawab_ganda',$result,'id_ganda');
		$nis = $this->session->userdata('ses_id');
		$nilai = $this->db->get_where('jawab_ganda',['id_soal'=>$id_soal,'nis'=>$nis])->result();

		date_default_timezone_set('Asia/Jakarta');
		$tgl = date("Y-m-d h:i:s");
		
		$brp = 0;
		foreach ($nilai as $total) 
		{
			$brp += $total->nilai;
		}

		$kerjakan = array(
			'id_soal' => $id_soal,
			'nis' => $nis,
			'status' => 1,
			'tanggal' => $tgl,
			'nilai' => $brp
		);

		return $this->db->insert('kerjakan',$kerjakan);
	}

	function jawab_essay($result=array(),$id_soal,$nis)
	{
		$this->db->insert_batch('jawab_essay',$result,'id_essay');
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date("Y-m-d h:i:s");

		$kerjakan = array(
			'id_soal' => $id_soal,
			'nis' => $nis,
			'status' => 1,
			'tanggal' => $tgl
		);

		return $this->db->insert('kerjakan',$kerjakan);
	}

	function hasil_mapel($id_soal)
	{
		$nis = $this->session->userdata('ses_id');
		$this->db->from('kerjakan');
		$this->db->join('ujian','ujian.id_soal = kerjakan.id_soal');
		$this->db->join('kelas','kelas.id_kelas = ujian.id_kelas');
		$this->db->join('mapel','mapel.id_mapel = ujian.id_mapel');
		$this->db->where('kerjakan.id_soal',$id_soal);
		$this->db->where('kerjakan.nis',$nis);
		return $this->db->get('')->result();
	}

	function hasil()
	{
		$nis = $this->session->userdata('ses_id');
		$kelas = $this->db->get_where('murid',['nis'=>$nis])->row_array();

		$this->db->from('kerjakan');
		$this->db->where('ujian.id_kelas',$kelas['id_kelas']);
		$this->db->where('nis',$nis);
		$this->db->join('ujian','ujian.id_soal = kerjakan.id_soal');
		$this->db->join('mapel','mapel.id_mapel = ujian.id_mapel');
		$this->db->join('kelas','kelas.id_kelas = ujian.id_kelas');
		return $this->db->get('')->result();
	}

	function hasil_ujian($id_soal)
	{
		$this->db->from('kerjakan');
		$this->db->join('murid','murid.nis = kerjakan.nis');
		$this->db->join('ujian','ujian.id_soal = kerjakan.id_soal');
		$this->db->join('mapel','mapel.id_mapel = ujian.id_mapel');
		$this->db->join('kelas','kelas.id_kelas = ujian.id_kelas');
		$this->db->where('kerjakan.id_soal',$id_soal);
		return $this->db->get('')->result();
	}

	function tambah_nilai($id_soal,$nis)
	{
		$this->db->from('jawab_essay');
		$this->db->where('jawab_essay.id_soal',$id_soal);
		$this->db->where('jawab_essay.nis',$nis);
		$this->db->join('essay','essay.id_essay = jawab_essay.id_essay');
		return $this->db->get('')->result();
	}

	function nilai($result=array(),$nis,$id_soal)
	{
		$this->db->update_batch('jawab_essay',$result,'id_jawab_essay');

		$nilai = $this->db->get_where('jawab_essay',['id_soal'=>$id_soal, 'nis'=>$nis])->result();

		$brp = 0;
		foreach ($nilai as $total) 
		{
			$brp += $total->nilai;
		}

		$data = array(
			'nilai' => $brp
		);

		$this->db->where('id_soal',$id_soal);
		$this->db->where('nis',$nis);
		return $this->db->update('kerjakan',$data);

	}

	function nama_mapel($id_soal)
	{
		$this->db->join('mapel','mapel.id_mapel = ujian.id_mapel');
		return $this->db->get_where('ujian',['id_soal'=>$id_soal])->row_array();
	}
}
?>