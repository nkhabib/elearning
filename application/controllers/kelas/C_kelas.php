<?php
class C_kelas extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('kelas/m_kelas');
		$this->load->library('form_validation');
		$masuk = $this->session->userdata('masuk');
		if (!$masuk) 
		{
			$url = base_url();
			redirect($url);
		}
	}

	function get_kelas()
	{
		$data['judul'] = 'Tabel Kelas';
		$data['data'] = $this->m_kelas->get_kelas();
		$this->load->view('template/header',$data);
		$this->load->view('kelas/v_kelas');
		$this->load->view('template/footer');
	}

	function tambah()
	{
		$this->form_validation->set_rules('kelas','Kelas','required',
			[
				'required' => 'Pilih Kelas',
			]);

		$this->form_validation->set_rules('subkelas','Sub Kelas','required',
			[
				'required' => 'Pilih Sub Kelas',
			]);

		if ($this->form_validation->run()==FALSE) 
		{
			$data['judul'] = "Tambah Kelas";
			$this->load->view('template/header',$data);
			$this->load->view('kelas/v_tambah');
			$this->load->view('template/footer');
		} else {
			$post = $this->input->post();
			$kelas = $post['kelas'];
			$ins = $post['subkelas'];
			$jadi = "$kelas $ins";
			$gkelas = $this->db->get_where('kelas',['kelas' => $jadi])->row_array();

			if ($gkelas['kelas'] == $jadi) 
			{
				$this->session->set_flashdata('gagal','Kelas Sudah Ada');
				redirect('kelas/c_kelas/tambah');
			} else
				{
					$data = array(
						'kelas' => $jadi, 
					);

					$add = $this->m_kelas->tambah($data);

					if ($add) 
					{
						$this->session->set_flashdata('psn','Kelas Ditambahkan');
						redirect('kelas/c_kelas/get_kelas');
					}

				}
		}
	}

	function edit($id)
	{
		$data['data'] = $this->m_kelas->edit($id);
		$data['judul'] = "Edit Kelas";
		$this->load->view('template/header',$data);
		$this->load->view('kelas/v_edit');
		$this->load->view('template/footer');
	}

	function update()
	{
		$post = $this->input->post();
		$id_kelas = $post['id_kelas'];
		$data = array(
			'kelas' => $post['kelas'],
		);

		$update = $this->m_kelas->update($data,$id_kelas);
		if ($update) 
		{
			$this->session->set_flashdata('psn','Kelas Diupdate');
			redirect('kelas/c_kelas/get_kelas');
		} else
			{
				$this->session->set_flashdata('gagal','Kelas Gagal Diupdate');
				redirect('kelas/c_kelas/get_kelas');
			}
	}

	function hapus($id)
	{
		$del = $this->m_kelas->hapus($id);

		if ($del) 
		{
			$this->session->set_flashdata('psn','Kelas Dihapus');
			redirect('kelas/c_kelas/get_kelas');
		} else
			{
				$this->session->set_flashdata('gagal','Kelas Gagal Dihapus');
				redirect('kelas/c_kelas/get_kelas');
			}
	}

	function lihat($id_kelas,$offset=0)
	{
		$this->db->where('murid.id_kelas',$id_kelas);
		$this->db->from('murid');
		$this->db->join('kelas','kelas.id_kelas = murid.id_kelas');
		$murid = $this->db->get("");

		$config['total_rows'] = $murid->num_rows();
		$config['base_url'] = base_url().'kelas/C_kelas/lihat/'.$id_kelas;
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

		$kela = $this->db->get_where('kelas',['id_kelas' => $id_kelas])->row_array();
		$data['data'] = $this->m_kelas->lihat($config['per_page'],$offset,$id_kelas);
		$data['judul'] = 'Lihat Kelas '.$kela['kelas'];
		$this->load->view('template/header',$data);
		$this->load->view('kelas/v_lihat');
		$this->load->view('template/footer');
	}
}
?>