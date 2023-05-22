<?php 

class M_murid extends CI_Model
{

	function get_murid($perpage,$offset)
	{
		$this->db->order_by('murid.id_kelas', 'ASC');
		$this->db->from('murid',$perpage,$offset);
		$this->db->join('kelas','kelas.id_kelas = murid.id_kelas');
		// $data = $this->db->get();
		// return $data;
		return $this->db->get('',$perpage,$offset)->result();
	}

	function murid_anda($nip)
	{
		$kelas = $this->db->get_where('mengajar',['nip' => $nip])->result();
		$uniq = array_unique(array_column($kelas, 'id_kelas'));
		return $uniq;
	}

	function join()
	{
		$this->db->select('*');
		$this->db->from('kelas');
		$this->db->join('murid','murid.id_kelas = kelas.id_kelas');
		$data = $this->db->get();
		return $data;
	}

	function tambah($murid)
	{
		return $this->db->insert('murid',$murid);
	}

	function hapus($nis)
	{
		$this->db->where('nis',$nis);
		return $this->db->delete('murid');
	}

	function edit($nis)
	{
		// $this->db->order_by('kelas', 'ASC');
		$this->db->where('nis',$nis);
		$this->db->from('murid');
		$this->db->join('kelas','kelas.id_kelas = murid.id_kelas');
		// $data = $this->db->get();
		// return $data;
		return $this->db->get('')->result();
		// return $this->db->get_where('murid',['nis' => $nis])->result();
	}

	function update($data,$nis)
	{
		$this->db->where('nis',$nis);
		return $this->db->update('murid',$data);

	}

	function carimurid($berdasarkan,$yangdicari)
	{
		$this->db->from('murid');
		$this->db->join('kelas','kelas.id_kelas = murid.id_kelas');

		switch ($berdasarkan) 
		{
			case '':
			$this->db->like('nis',$yangdicari);
			$this->db->or_like('nama',$yangdicari);
				
				break;

				case 'nis':
				$this->db->where($berdasarkan,$yangdicari);
			
			default:
			$this->db->like($berdasarkan,$yangdicari);
		}
		return $this->db->get();
	}

	function kelas($perpage,$offset,$id_kelas)
	{
		$this->db->order_by('murid.id_kelas', 'ASC');
		$this->db->from('murid',$perpage,$offset);
		$this->db->where('murid.id_kelas',$id_kelas);
		$this->db->join('kelas','kelas.id_kelas = murid.id_kelas');
		return $this->db->get('',$perpage,$offset)->result();
	}
}
?>