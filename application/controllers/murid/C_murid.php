<?php

class C_murid extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('murid/m_murid');
		$this->load->library('form_validation');
		if ($this->session->userdata('masuk')==FALSE) 
		{
			$url = base_url();
			redirect($url);
		}
	}

	function get_murid($offset=0)
	{
		$murid = $this->db->get("murid");

		$config['total_rows'] = $murid->num_rows();
		$config['base_url'] = base_url().'murid/c_murid/get_murid';
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

		$data['data'] = $this->m_murid->get_murid($config['per_page'],$offset);
		$this->db->order_by('id_kelas','ASC');
		$data['kelas'] = $this->db->get('kelas')->result();
		$data['judul'] = 'Tabel Murid';
		$this->load->view('template/header',$data);
		$this->load->view('murid/v_murid');
		$this->load->view('template/footer');
	}

	function murid_anda()
	{
		$nip = $this->session->userdata('ses_id');
		$data['judul'] = "Murid Yang Anda Ajar";
		$data['data'] = $this->m_murid->murid_anda($nip);
		$this->load->view('template/header',$data);
		$this->load->view('murid/v_murid_anda');
		$this->load->view('template/footer');
	}

	function tambah()
	{
		$this->form_validation->set_rules('nis','NIS','required|trim|numeric|is_unique[murid.nis]',
			[
				'required' => 'Masukan NIS',
				'numeric' => 'Hanya Berupa Angka',
				'is_unique' => 'NIS Sudah Ada',
			]);

		$this->form_validation->set_rules('nama','Nama','required|trim',
			[
				'required' => 'Masukan Nama',
			]);

		$this->form_validation->set_rules('kelas','Kelas','required|trim',
			[
				'required' => 'Pilih Kelas',
			]);

		$this->form_validation->set_rules('hp','Nomor HP','required|trim|numeric|min_length[10]|max_length[12]',
			[
				'required' => 'Masukan Nomor HP',
				'numeric' => 'Hanya Berupa Angka',
				'min_length' => 'Minimal 10 Digit',
				'max_length' => 'Maksimal 12 Digit',
			]);

		if ($this->form_validation->run()==FALSE) 
		{
			$data['kelas'] = $this->db->get('kelas')->result();
			$data['judul'] = "Tambah Murid";
			$this->load->view('template/header',$data);
			$this->load->view('murid/v_input');
			$this->load->view('template/footer');
		} else
			{
				$nis = $_POST['nis'];
				$nama = $_POST['nama'];
				$kls = $_POST['kelas'];
				$hp = $_POST['hp'];

				$murid = array(
					'nis' => $nis,
					'nama' => $nama,
					'id_kelas' => $kls,
					'no_hp' => $hp,
				);
				$add = $this->m_murid->tambah($murid);

				if ($add) 
				{
					$this->session->set_flashdata('psn','Murid Berhasil Ditambahkan');
					redirect('murid/c_murid/get_murid');
				}
			}
	}

	function edit($nis)
	{
		$data['data'] = $this->m_murid->edit($nis);
		$data['kelas'] = $this->db->get('kelas')->result();
		$data['judul'] = "Edit Murid";
		$this->load->view('template/header',$data);
		$this->load->view('murid/v_edit');
		$this->load->view('template/footer');

	}

	function update()
	{
		$post = $this->input->post();
		$nis = $post['nis'];
		$data = array(
			'nama' => $post['nama'],
			'id_kelas' => $post['kelas'],
			'no_hp' => $post['hp'],
		);

		$update = $this->m_murid->update($data,$nis);
		if ($update) 
		{
			$this->session->set_flashdata('psn','Murid Diupdate');
			redirect('murid/c_murid/get_murid');
		} else
			{
				$this->session->set_flashdata('gagal','Murid Diupdate');
				redirect('login/home');
			}
	}

	function cari()
	{
		$data['cariberdasarkan']=$this->input->post('cariberdasarkan');
		$data['yangdicari']=$this->input->post('yangdicari');

		$data['murid']=$this->m_murid->carimurid($data['cariberdasarkan'],$data['yangdicari'])->result();
		$data['jumlah']=count($data["murid"]);

		$isi['judul'] = 'Hasil Pencarian';
		$this->load->view("template/header", $isi);
		$this->load->view("murid/v_cari",$data);
		$this->load->view("template/footer");
	}

	function kelas($id_kelas,$offset=0)
	{
		$murid = $this->db->get_where("murid",['id_kelas'=>$id_kelas]);

		$config['total_rows'] = $murid->num_rows();
		$config['base_url'] = base_url().'murid/c_murid/kelas';
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

		$data['data'] = $this->m_murid->kelas($config['per_page'],$offset,$id_kelas);
		$this->db->order_by('id_kelas','ASC');
		$data['kelas'] = $this->db->get('kelas')->result();
		$kelas = $this->db->get_where('kelas',['id_kelas'=>$id_kelas])->row_array();
		$data['judul'] = 'Kelas '.$kelas['kelas'];
		$this->load->view('template/header',$data);
		$this->load->view('murid/v_murid');
		$this->load->view('template/footer');
	}

	function hapus($nis)
	{
		$hapus = $this->m_murid->hapus($nis);
		if ($hapus) 
		{
			$this->session->set_flashdata('psn','Data Murid Dihapus');
			redirect('murid/c_murid/get_murid');
		} else
			{
				$this->session->set_flashdata('gagal','Data Murid Gagal Dihapus');
				redirect('murid/c_murid/get_murid');
			}
	}


}
?>