<?php
class M_upload extends CI_Model
{
	function list_mapel($kelas)
	{
		$nip = $this->session->userdata('ses_id');
		$this->db->where('id_kelas',$kelas);
		$this->db->where('nip',$nip);
		$this->db->from('mengajar');
		// $this->db->join('kelas','kelas.id_kelas = mengajar.id_kelas');
		$this->db->join('mapel','mapel.id_mapel = mengajar.id_mapel');
		// $data = $this->db->get('')->result();

		$data = $this->db->get('')->result();

		if ($data) 
		{
			$output = "<option value=''>--Pilih--</option>";
			foreach ($data as $kls) 
			{
				$output .= '<option value="'.$kls->id_mapel.'">'.$kls->mapel.'</option>';
			}
			return $output;
		} else
			{
				$zero = "<option value=''>--Tidak Ada MAPEL untuk Kelas--</option>";
				return $zero;
			}
	}

	function mapel($id)
	{
		$this->db->where('id',$id);
		$this->db->from('file');
		$this->db->join('mapel','mapel.id_mapel = file.id_mapel');
		$this->db->join('guru','guru.nip = file.nip');
		return $this->db->get('')->result();
	}
}
?>