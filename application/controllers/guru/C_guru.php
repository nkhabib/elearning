<?php
class C_guru extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('guru/m_guru');
		$this->load->library('form_validation');
	}

	function get_guru ($offset=0)
	{
		$guru = $this->db->get("guru");

		$config['total_rows'] = $guru->num_rows();
		$config['base_url'] = base_url().'guru/c_guru/get_guru';
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

		$data['data'] = $this->m_guru->get_guru($config['per_page'],$offset);
		// $data['join'] = $this->m_murid->join();
		$data['judul'] = 'Tabel Guru';
		$this->load->view('template/header',$data);
		$this->load->view('guru/v_guru');
		$this->load->view('template/footer');
	}

	function tambah()
	{
		$this->form_validation->set_rules('nip','NIP','required|min_length[4]|is_unique[guru.nip]',
			[
				'required' => 'NIP Harus diisi',
				'min_length' => 'Minimal 4 Karakter',
				'is_unique' => 'NIP Sudah ada',
			]);
		$this->form_validation->set_rules('nama','Nama','required',
			[
				'required' => 'Isikan Nama',
			]);

		$this->form_validation->set_rules('hp','NO HP','required|min_length[10]|max_length[12]|numeric',
			[
				'required' => 'Isikan NO HP',
				'min_length' => 'Minimal 10 Digit',
				'max_length' => 'Maksimal 12 Digit',
				'numeric' => 'Masukan Berupa Angka',
			]);

		if ($this->form_validation->run()==FALSE) 
		{
			$data['judul'] = "Tambah Guru";
			$data['kelas'] = $this->db->get('kelas')->result();
			$this->load->view('template/header',$data);
			$this->load->view('guru/v_tambah');
			$this->load->view('template/footer');
		} else 
			{
				$post = $this->input->post();
				$data = array(
					'nip' => $post['nip'],
					'nama' => $post['nama'],
					'no_hp' => $post['hp'],
				);
				$add = $this->m_guru->tambah($data);
				if ($add) 
				{
					echo $this->session->set_flashdata('psn','<p>Guru Ditambahkan</p>');
					redirect('guru/c_guru/get_guru');
				} else 
					{
						echo $this->session->set_flashdata('gagal','<p>Gagal Ditambahkan</p>');
						redirect('login/home');
					}
			}
	}

	function edit($nip)
	{
		$data['judul'] = "Edit Guru";
		$data['data'] = $this->db->get_where('guru',['nip' => $nip])->result();
		$this->load->view('template/header',$data);
		$this->load->view('guru/v_edit');
		$this->load->view('template/footer');
	}

	function update()
	{
		$post = $this->input->post();
		$nip = $post['nip'];
		$data = array(
			'nama' => $post['nama'],
			'no_hp' => $post['hp'],
		);

		$update = $this->m_guru->update($data,$nip);
		if ($update) 
		{
			$this->session->set_flashdata('psn','Data Diupdate');
			redirect('guru/c_guru/get_guru');
		} else 
			{
				$this->session->set_flashdata('gagal','Data Gagal Diupdate');
				redirect('guru/c_guru/get_guru');
			}
	}

	function hapus($nip)
	{
		$hapus = $this->m_guru->hapus($nip);
		if ($hapus) 
		{
			$this->session->set_flashdata('psn','Guru Dihapus');
			redirect('guru/c_guru/get_guru');
		} else
			{
				$this->session->set_flashdata('gagal','Guru Gagal Dihapus');
				redirect('guru/c_guru/get_guru');
			}
	}

	function cari()
	{
		$data['cariberdasarkan']=$this->input->post('cariberdasarkan');
		$data['yangdicari']=$this->input->post('yangdicari');

		$data['guru']=$this->m_guru->cariguru($data['cariberdasarkan'],$data['yangdicari'])->result();
		$data['jumlah']=count($data["guru"]);

		$isi['judul'] = 'Hasil Pencarian';
		$this->load->view("template/header", $isi);
		$this->load->view("guru/v_cari",$data);
		$this->load->view("template/footer");
	}
}
?>