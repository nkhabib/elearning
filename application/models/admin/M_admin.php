<?php 

class M_admin extends CI_Model
{
	function tambah()
	{
		$id = $_POST['nis'];
		$nama = $_POST['nama'];
		$jab = $_POST['user'];
		$pass = $_POST['password'];

		$data = array(
			'id' => $id,
			'nama' => $nama,
			'level' => $jab,
			'password' => password_hash($pass, PASSWORD_DEFAULT),
		);

		return $this->db->insert('user',$data);
	}

	function get_admin($perpage,$offset)
	{
		return $this->db->get("user",$perpage,$offset)->result();
	}

	function hapus($id)
	{
		$this->db->where('id',$id);
		return $this->db->delete('user');
	}

	function edit($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('user')->result();
	}

	function update()
	{
		$id = $_POST['nik'];
		$nama = $_POST['nama'];
		$jab = $_POST['jabatan'];

		$data = array(
			'nama' => $nama,
			'level' => $jab,
		);

		$this->db->where('id',$id);
		return $this->db->update('user',$data);
	}

	function murid_list($kelas)
	{
		$kls = $this->db->get_where('kelas',['kelas' => $kelas])->row_array();

		$murid = $this->db->get_where('murid',['id_kelas' => $kls['id_kelas']])->result();

		if ($murid) 
		{
			$output = '<option value="">--Pilih Nis--</option>';
			foreach ($murid as $key) 
			{
				$output .= '<option value="'.$key->nis.'">'.$key->nis.' '.$key->nama.'</option>';
			}
			return $output;
		} else 
			{
				$zero = '<option value="">---Tidak Ada Data--</option>';
				return $zero;
			}
	}

	function guru_list($guru)
	{
		$data = $this->db->get('guru')->result();

		if ($data) 
		{
			$output = '<option value="">--Pilih Nis--</option>';
			foreach ($data as $key) 
			{
				$output .= '<option value="'.$key->nip.'">'.$key->nip.' '.$key->nama.'</option>';
			}
			return $output;
		} else 
			{
				$zero = '<option value="">---Tidak Ada Data--</option>';
				return $zero;
			}
	}

	function nama_admin($id)
	{
		$murid = $this->db->get_where('murid',['nis' => $id])->result();

		if ($murid) 
		{
			foreach ($murid as $key) 
			{
				$datam = array(
					'nama' => $key->nama,
				);
			}
			return $datam;
		} else
			{
				$guru = $this->db->get_where('guru',['nip' => $id])->result();
				foreach ($guru as $key) 
				{
					$datag = array(
						'nama' => $key->nama,
					);
				}
				return $datag;
			}
	}


	function profile()
	{
		$id = $this->session->userdata('ses_id');
		return $this->db->get_where('user',['id' => $id])->result();
	}

	function update_profile($data,$id)
	{
		$this->db->where('id',$id);
		return $this->db->update('user',$data);
	}
}
?>