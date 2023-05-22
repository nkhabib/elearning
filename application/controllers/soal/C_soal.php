<?php

class C_soal extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$masuk = $this->session->userdata('masuk');
		if (!$masuk) 
		{
			$url = base_url();
			redirect($url);
		} else
			{
				$this->load->model('soal/m_soal');
				$this->load->library('form_validation');
			}
	}

	function tambah()
	{
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date("Y-m-d h:i:s");
		$post = $this->input->post();
		
		$ujian = array(
			'nip' => $post['nip'],
			'id_mapel' => $post['id_mapel'],
			'id_kelas' => $post['id_kelas'],
			'nama_soal' => $post['nama_soal'],
			'jenis' => $post['jenis'],
			'jumlah' => $post['jumlah'],
			'waktu' => $tgl,
		);
		
		$this->db->insert('ujian',$ujian);

		$this->db->order_by('id_soal','DESC');
		$soal = $this->db->get('ujian')->row_array();

		if ($post['jenis']=="Pilihan Ganda") 
		{
			foreach ($post['soal'] as $key => $value) 
			{
				$kunci = $post['kunci'];
				if ($kunci[$key]=='A') 
				{
					$jwb = $post['jawab1'];
				} elseif ($kunci[$key]=='B')
					{
						$jwb = $post['jawab2'];
					} elseif ($kunci[$key]=='C') 
						{
							$jwb = $post['jawab3'];
						} elseif ($kunci[$key]=='D') 
							{
								$jwb = $post['jawab4'];
							}

				$result[] = array(
					'id_soal' => $soal['id_soal'],
					'soal' => $post['soal'][$key],
					'jawaban1' => $post['jawab1'][$key],
					'jawaban2' => $post['jawab2'][$key],
					'jawaban3' => $post['jawab3'][$key],
					'jawaban4' => $post['jawab4'][$key],
					'kunci_jawaban' => $jwb[$key],
				);
			}

			$add = $this->m_soal->ganda($result);
			if ($add) 
			{
				$this->session->set_flashdata('psn','<p>Soal Ditambahkan</p>');
				redirect('ujian/c_ujian/lihat');
			} else
				{
					$this->session->set_flashdata('gagal','<p>Soal Gagal Ditambahkan</p>');
					redirect('ujian/c_ujian/lihat');
				}
		} else
			{
				foreach ($post['soal'] as $key => $value) 
				{
					$result[] = array(
						'id_soal' => $soal['id_soal'],
						'soal' => $post['soal'][$key],
					);
				}

				$add = $this->m_soal->essay($result);
				if ($add) 
				{
					$this->session->set_flashdata('psn','<p>Soal Ditambahkan</p>');
					redirect('ujian/c_ujian/lihat');
				} else
					{
						$this->session->set_flashdata('gagal','<p>Soal Gagal Ditambahkan</p>');
						redirect('ujian/c_ujian/lihat');
					}
			}
	}

	function edit($id_ganda)
	{
		$data['judul'] = "Edit Soal";
		$data['data'] = $this->db->get_where('ganda',['id_ganda'=>$id_ganda])->result();
		$this->load->view('template/header',$data);
		$this->load->view('soal/v_edit');
		$this->load->view('template/footer');
	}

	function edit_essay($id_essay)
	{
		$data['judul'] = "Edit Soal";
		$data['data'] = $this->db->get_where('essay',['id_essay'=>$id_essay])->result();
		$this->load->view('template/header',$data);
		$this->load->view('soal/v_edit_essay');
		$this->load->view('template/footer');
	}

	function update()
	{
		$post = $this->input->post();
		$id_ganda = $post['id'];
		if ($post['kunci']=='A') 
		{
			$kunci = $post['jawab1'];
		} elseif ($post['kunci']=='B') 
			{
				$kunci = $post['jawab2'];
			} elseif ($post['kunci']=='C') 
				{
					$kunci = $post['jawab3'];
				} elseif ($post['kunci']=='D') 
					{
						$kunci = $post['jawab4'];
					} else
						{
							$kunci = $post['kunci'];
						}

		$data = array(
			'soal' => $post['soal'],
			'jawaban1' => $post['jawab1'],
			'jawaban2' => $post['jawab2'],
			'jawaban3' => $post['jawab3'],
			'jawaban4' => $post['jawab4'],
			'kunci_jawaban' => $kunci,
		);

		$update = $this->m_soal->update($data,$id_ganda);
		if ($update) 
		{
			$this->session->set_flashdata('psn','<p>Soal Diupdate</p>');
			redirect('ujian/c_ujian/lihat');
		} else
			{
				$this->session->set_flashdata('gagal','<p>Soal Gagal Diupdate</p>');
				redirect('ujian/c_ujian/lihat');
			}
	}

	function update_essay()
	{
		$post = $this->input->post();
		$id_essay = $post['id'];
		$data = array(
			'soal' => $post['soal']
		);
		$update = $this->m_soal->update_essay($data,$id_essay);
		if ($update) 
		{
			$this->session->set_flashdata('psn','<p>Soal Diupdate</p>');
			redirect('ujian/c_ujian/lihat');
		} else
			{
				$this->session->set_flashdata('gagal','<p>Soal Gagal Diupdate</p>');
				redirect('ujian/c_ujian/lihat');
			}
	}
}
?>