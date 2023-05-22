<?php
class C_mapel extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('mapel/m_mapel');
		$this->load->library('form_validation');
		$masuk = $this->session->userdata('masuk');
		if (!$masuk) 
		{
			$url = base_url();
			redirect($url);
		}
	}

	function get_mapel ($offset=0)
	{
		$mapel = $this->db->get("mengajar");

		$config['total_rows'] = $mapel->num_rows();
		$config['base_url'] = base_url().'mapel/c_mapel/get_mapel';
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

		$this->db->order_by('id_kelas','ASC');
		$data['kelas'] = $this->db->get('kelas')->result();
		$data['data'] = $this->m_mapel->get_mapel($config['per_page'],$offset);
		$data['judul'] = 'Tabel MAPEL';
		$this->load->view('template/header',$data);
		$this->load->view('mapel/v_mapel');
		$this->load->view('template/footer');
	}

	function get_noguru($offset=0)
	{
		$mapel = $this->db->get("mapel");

		$config['total_rows'] = $mapel->num_rows();
		$config['base_url'] = base_url().'mapel/c_mapel/get_noguru';
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

		$data['data'] = $this->m_mapel->get_noguru($config['per_page'],$offset);
		$data['judul'] = 'Tabel MAPEL Belum Ada Guru';
		$this->load->view('template/header',$data);
		$this->load->view('mapel/v_noguru');
		$this->load->view('template/footer');
	}

	function lihat($id_mapel)
	{
		$mapel = $this->db->get_where('mapel',['id_mapel' => $id_mapel])->row_array();
		$data['judul'] = "Lihat MAPEL ".$mapel['mapel'];
		$data['guru'] = $this->m_mapel->guru($id_mapel);
		$data['murid'] = $this->m_mapel->murid($id_mapel);

		$this->load->view('template/header',$data);
		$this->load->view('mapel/v_lihat');
		$this->load->view('template/footer');

	}

	function tambah()
	{
		$this->form_validation->set_rules('mapel','MAPEL','required|is_unique[mapel.mapel]',
			[
				'required' => 'Isi MAPEL',
				'is_unique' => 'Nama MAPEL Sudah Ada',
			]);

		$this->form_validation->set_rules('kelas','Kelas','required',
			[
				'required' => 'Pilih Kelas',
			]);

		$this->form_validation->set_rules('guru','Guru','required',
			[
				'required' => 'Pilih Guru MAPEL',
			]);

		if ($this->form_validation->run()==FALSE) 
		{
			$data['guru'] = $this->db->get('guru')->result();
			$data['kelas'] = $this->db->get('kelas')->result();
			$data['judul'] = "Tambah MAPEL";
			$this->load->view('template/header',$data);
			$this->load->view('mapel/v_tambah');
			$this->load->view('template/footer');
		} else {
			$post = $this->input->post();
			$add = $this->m_mapel->tambah($post);
			if ($add) 
			{
				$this->session->set_flashdata('psn','MAPEL Ditambahkan');
				redirect('mapel/c_mapel/get_mapel');
			} else {
				$this->session->set_flashdata('gagal','MAPEL Gagal Ditambahkan');
				redirect('mapel/c_mapel/tambah');
			}
		}

	}

	function edit($id_mengajar)
	{
		$data['kelas'] = $this->db->get('kelas')->result();
		$data['data'] = $this->m_mapel->edit($id_mengajar);
		$data['guru'] = $this->db->get('guru')->result();
		$data['judul'] = "Edit MAPEL";
		$this->load->view('template/header',$data);
		$this->load->view('mapel/v_edit');
		$this->load->view('template/footer');
	}

	function update()
	{
		$post = $this->input->post();
		$id = $post['id_mengajar'];
		$mapel = $post['id_mapel'];
		$kelas = $post['kelas'];
		$guru = $post['guru'];

		$data = array(
			'nip' => $guru,
			'id_mapel' => $mapel,
			'id_kelas' => $kelas,
			 );

		$update = $this->m_mapel->update($id,$data);
		if ($update) 
		{
			$this->session->set_flashdata('psn','Mapel Diupdate');
			redirect('mapel/c_mapel/get_mapel');
		} else
			{
				$this->session->set_flashdata('gagal','Mapel Gagal Diupdate');
				redirect('login/home');
			}
	}


	function edit_noguru($id_mapel)
	{
		$data['judul'] = "Edit MAPEL Belum Ada Guru";
		$data['data'] = $this->db->get_where('mapel',['id_mapel' => $id_mapel])->result();
		$data['guru'] = $this->db->get('guru')->result();
		$data['kelas'] = $this->db->get('kelas')->result();

		$this->load->view('template/header',$data);
		$this->load->view('mapel/v_editnoguru');
		$this->load->view('template/footer');
	}


	function update_ngr()
	{
		$post = $this->input->post();
		$id_mapel = $post['id_mapel'];
		$data = array(
			'nip' => $post['guru'],
			'id_mapel' => $post['id_mapel'],
			'id_kelas' => $post['kelas'],
		);

		$mapel = array(
			'mapel' => $post['mapel'],
		);

		$update = $this->m_mapel->update_ngr($data,$id_mapel,$mapel);
		if ($data) 
		{
			$this->session->set_flashdata('psn','MAPEL Diupdate');
			redirect('mapel/c_mapel/get_noguru');
		} else
			{
				$this->session->set_flashdata('gagal','MAPEL Gagal Diupdate');
				redirect('login/home');
			}
	}


	function hapus($id_mapel)
	{
		$hapus = $this->m_mapel->hapus($id_mapel);
		if ($hapus) 
		{
			$this->session->set_flashdata('psn','MAPEL Dihapus');
			redirect('mapel/c_mapel/get_mapel');
		} else 
			{
				$this->session->set_flashdata('gagal','MAPEL Gagal Dihapus');
				redirect('mapel/c_mapel/get_mapel');
			}
	}

	function kelas ($id_kelas,$offset=0)
	{
		$mapel = $this->db->get_where("mengajar",['id_kelas'=>$id_kelas]);

		$config['total_rows'] = $mapel->num_rows();
		$config['base_url'] = base_url().'mapel/c_mapel/kelas';
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

		$this->db->order_by('id_kelas','ASC');
		$data['kelas'] = $this->db->get('kelas')->result();
		$data['data'] = $this->m_mapel->kelas($config['per_page'],$offset,$id_kelas);
		$kelas = $this->db->get_where('kelas',['id_kelas'=>$id_kelas])->row_array();
		$data['judul'] = 'Kelas '.$kelas['kelas'];
		$this->load->view('template/header',$data);
		$this->load->view('mapel/v_mapel');
		$this->load->view('template/footer');
	}
}
?>