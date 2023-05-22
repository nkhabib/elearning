<?php 
class M_guru extends CI_Model
{
	function get_guru($perpage,$offset)
	{
		return $this->db->get('guru',$perpage,$offset)->result();
	}

	function tambah($data)
	{
		return $this->db->insert('guru',$data);
	}

	function update($data,$nip)
	{
		$this->db->where('nip',$nip);
		return $this->db->update('guru',$data);
	}

	function hapus($nip)
	{
		$this->db->where('nip',$nip);
		return $this->db->delete('guru');
	}

	function cariguru($berdasarkan,$yangdicari)
	{
		$this->db->from('guru');

		switch ($berdasarkan) 
		{
			case '':
			$this->db->like('nip',$yangdicari);
			$this->db->or_like('nama',$yangdicari);
				
				break;

				case 'nis':
				$this->db->where($berdasarkan,$yangdicari);
			
			default:
			$this->db->like($berdasarkan,$yangdicari);
		}
		return $this->db->get();
	}
}
?>