<?php

class C_ujian extends CI_Controller
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
				$this->load->model('ujian/m_ujian');
			}

		$this->load->library('form_validation');
	}

	function tambah()
	{

		$this->form_validation->set_rules('kelas','Kelas','required',
			[
				'required' => 'Pilih',
			]);

		if ($this->form_validation->run()==FALSE) 
		{
			$data['judul'] = "Tambah Soal Ujian";
			$data['data'] = $this->m_ujian->mapel();
			$this->load->view('template/header',$data);
			$this->load->view('ujian/v_tambah');
			$this->load->view('template/footer');
		} else
			{				
				$post = $this->input->post();
				$nip = $this->session->userdata('ses_id');
				$data['ujian'] =  array(
					'nip' => $nip,
					'id_mapel' => $post['mapel'],
					'id_kelas' => $post['kelas'],
					'nama_soal' => $post['soal'],
					'jenis' => $post['jenis'],
					'jumlah' => $post['jumlah'],
				);

				if ($post['jenis']=="Pilihan Ganda") 
				{
					$data['judul'] = "Tambah Soal Pilihan Ganda";
					$data['jumlah'] = $post['jumlah'];
					$this->load->view('ujian/v_tambah_ganda',$data);
				} else
					{
						$data['judul'] = "Tambah Soal Essay";
						$data['jumlah'] = $post['jumlah'];
						$this->load->view('ujian/v_tambah_essay',$data);
					}
			}

	}

	function lihat($offset=0)
	{
		$nip = $this->session->userdata('ses_id');
		$ujian = $this->db->get("ujian");

		$config['total_rows'] = $ujian->num_rows();
		$config['base_url'] = base_url().'ujian/c_ujian/lihat';
		$config['per_page'] = 5;

		////configurasi bootstrap

		$config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative;top:-25px'>";
		$config['full_tag_close'] = "</ul>";
		$config['num_tag_open'] = "<li>";
		$config['num_tag_close'] = "</li>";
		$config['cur_tag_open'] = "<li class='disable'><li class='active'><a href=''>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tag_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tag_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tag_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tag_close'] = "</li>";

		$this->pagination->initialize($config);

		$data['halaman'] = $this->pagination->create_links();
		$data['offset'] = $offset;

		$data['data'] = $this->m_ujian->lihat($config['per_page'],$offset,$nip);
		$data['judul'] = 'Daftar Ujian';
		$this->load->view('template/header',$data);
		$this->load->view('ujian/v_lihat');
		$this->load->view('template/footer');
	}

	function lihat_soal($id_soal)
	{
		$jenis = $this->db->get_where('ujian',['id_soal'=>$id_soal])->row_array();

		if ($jenis['jenis']=="Pilihan Ganda") 
		{
			$this->db->join('mapel','mapel.id_mapel = ujian.id_mapel');
			$this->db->join('kelas','kelas.id_kelas = ujian.id_kelas');
			$soal = $this->db->get_where('ujian',['ujian.id_soal'=>$id_soal])->row_array();
			$data['judul'] = "Soal Ujian ".$soal['nama_soal']." MAPEL ".$soal['mapel']." Kelas ".$soal['kelas'];
			$data['data'] = $this->m_ujian->lihat_soal($id_soal);
			$this->load->view('template/header',$data);
			$this->load->view('ujian/v_lihat_soal');
			$this->load->view('template/footer');
		} else
			{
				$this->db->join('mapel','mapel.id_mapel = ujian.id_mapel');
				$this->db->join('kelas','kelas.id_kelas = ujian.id_kelas');
				$soal = $this->db->get_where('ujian',['ujian.id_soal'=>$id_soal])->row_array();
				$data['judul'] = "Soal Ujian ".$soal['nama_soal']." MAPEL ".$soal['mapel']." Kelas ".$soal['kelas'];
				$data['data'] = $this->m_ujian->lihat_essay($id_soal);
				$this->load->view('template/header',$data);
				$this->load->view('ujian/v_lihat_essay');
				$this->load->view('template/footer');	
			}
	}

	function kerjakan($id_soal)
	{
		$this->db->join('kelas','kelas.id_kelas = ujian.id_kelas');
		$soal = $this->db->get_where('ujian',['ujian.id_soal'=>$id_soal])->row_array();
		$data['judul']="Ujian Soal ".$soal['nama_soal']." Kelas ".$soal['kelas'];

		$data['data'] = $this->m_ujian->soal_murid($id_soal);
		$data['id_soal'] = $id_soal;
		$this->load->view('template/header',$data);
		if ($soal['jenis']=="Pilihan Ganda") 
		{
			$this->load->view('ujian/v_ujian_ganda');
		} else
			{
				$this->load->view('ujian/v_ujian_essay');
			}
		$this->load->view('template/footer');
	}

	function jawab()
	{
		$post=$this->input->post();
		$nis = $this->session->userdata('ses_id');

		$id_soal = $post['id_soal'];
		$id_ganda = $post['id_ganda'];
		$total = count($id_ganda);
		$nilai = 100/$total;
		$result=array();
		$no =1;
		foreach ($post['id_ganda'] as $key) 
		{
			$kunci = $this->db->get_where('ganda',['id_ganda' => $key])->row_array();
			if ($post['jawab'.$no]==$kunci['kunci_jawaban']) 
			{
				$hasil = $nilai;
			} else
				{
					$hasil = 0;
				}
			$result[] = array(
					"id_ganda" => $key,
					"id_soal" => $id_soal,
					"nis" => $nis,
					"jawaban" => $post['jawab'.$no],
					"nilai" => $hasil
				);
			$no++;
		}

		$addjawab = $this->m_ujian->jawab($result,$id_soal,$nis);
		if ($addjawab) 
		{
			$this->session->set_flashdata('psn','<p>Jawaban Sudah Dikirim</p>');
			redirect('ujian/c_ujian/lihat');
		} else
			{
				$this->session->set_flashdata('gagal','<p>Jawaban Gagal Dikirim</p>');
				redirect('ujian/c_ujian/lihat');
			}
	}

	function jawab_essay()
	{
		$post = $this->input->post();
		$nis = $this->session->userdata('ses_id');
		$id_soal = $post['id_soal'];
		$result = array();

		foreach ($post['id_essay'] as $essay) 
		{
			$result[] = array(
				'id_essay' => $essay,
				'id_soal' => $id_soal,
				'nis' => $nis,
				'jawaban' => $post['jawab']
			);
		}

		$add = $this->m_ujian->jawab_essay($result,$id_soal,$nis);
		if ($add) 
		{
			$this->session->set_flashdata('psn','<p>Jawaban Sudah Dikirim</p>');
			redirect('ujian/c_ujian/lihat');
		} else
			{
				$this->session->set_flashdata('gagal','<p>Jawaban Gagal Dikirim</p>');
				redirect('ujian/c_ujian/lihat');
			}

	}

	function hasil_mapel($id_soal)
	{
		$nama_mapel = $this->m_ujian->nama_mapel($id_soal);

		$data['data'] = $this->m_ujian->hasil_mapel($id_soal);
		$data['judul'] = "Hasil Ujian ".$nama_mapel['mapel'];
		$this->load->view('template/header',$data);
		$this->load->view('ujian/v_hasil_mapel');
		$this->load->view('template/footer');
	}

	function hasil()
	{
		$data['judul'] = "Hasil Semua Ujian";
		$data['data'] = $this->m_ujian->hasil();
		$this->load->view('template/header',$data);
		$this->load->view('ujian/v_hasil');
		$this->load->view('template/footer');
	}

	function hasil_ujian($id_soal)
	{
		$this->db->join('mapel','mapel.id_mapel = ujian.id_mapel');
		$this->db->join('kelas','kelas.id_kelas = ujian.id_kelas');
		$ujian = $this->db->get_where('ujian',['ujian.id_soal'=>$id_soal])->row_array();
		$data['judul'] = "Hasul Ujian ".$ujian['jenis']." ".$ujian['nama_soal']." Kelas ".$ujian['kelas'];
		$data['data'] = $this->m_ujian->hasil_ujian($id_soal);
		$this->load->view('template/header',$data);
		$this->load->view('ujian/v_hasil_ujian');
		$this->load->view('template/footer');
	}

	function tambah_nilai()
	{
		$post = $this->input->post();
		$id_soal = $post['id_soal'];
		$nis = $post['nis'];
		$nama = $this->db->get_where('murid',['nis'=>$nis])->row_array();
		$this->db->join('mapel','mapel.id_mapel = ujian.id_mapel');
		$soal = $this->db->get_where('ujian',['ujian.id_soal'=>$id_soal])->row_array();
		$data['nis'] = $nis;
		$data['id_soal'] = $id_soal;
		$data['judul'] = "Tetapkan nilai Ujian Untuk ".$nama['nama']." MAPEL ".$soal['mapel']." Soal ".$soal['nama_soal'];
		$data['data'] = $this->m_ujian->tambah_nilai($id_soal,$nis);
		$this->load->view('template/header',$data);
		$this->load->view('ujian/v_tambah_nilai');
		$this->load->view('template/footer');
	}

	function nilai()
	{
		$post = $this->input->post();

		$jawab = $post['id_jawaban_essay'];
		$nis = $post['nis'];
		$id_soal = $post['id_soal'];

		$total = count($jawab);
		$nilai = 100/$total;
		$result = array();
		$no=1;
		foreach ($jawab as $key) 
		{
			if ($post["hasil".$no]==1) 
			{
				$hasil = $nilai;
			} else
				{
					$hasil = 0;
				}

			$result[]=array(
				'id_jawab_essay' => $key,
				'nilai' => $hasil
			);
			$no++;
		}

		$add = $this->m_ujian->nilai($result,$nis,$id_soal);

		if ($add) 
		{
			$this->session->set_flashdata('psn','<p>Nilai Ditetapkan</p>');
			redirect('ujian/c_ujian/lihat');
		} else
			{
				$this->session->set_flashdata('gagak','<p>Nilai Gagal Ditetapkan</p>');
				redirect('ujian/c_ujian/lihat');
			}
	}


	function mapel_list()
	{
		$kelas = $this->input->post('kelas');
		$this->load->model('upload/m_upload');
		echo $this->m_upload->list_mapel($kelas);
	}
}
?>