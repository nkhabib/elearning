<?php
class C_admin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/m_admin');
		$this->load->library('form_validation');
		$masuk = $this->session->userdata('masuk');
		if (!$masuk) 
		{
			$url = base_url();
			redirect($url);
		}
	}

	function tambah()
	{
		$this->form_validation->set_rules('user','User','required',
			[
				'required' => 'Pilih Guru/ Murid',
			]);

		$this->form_validation->set_rules('nis','NIK','required|trim|min_length[4]|is_unique[user.id]',
			[
				'is_unique' => 'NIK Sudah Ada',
				'required' => 'Masukan NIK',
				'min_length' => 'Minimal 4 Diigit',
			]);
		$this->form_validation->set_rules('nama','Nama','required|trim',
			[
				'required' => 'Masukan Nama',
			]);

		$this->form_validation->set_rules('password','Password','required|trim|min_length[3]',
			[
				'required' => 'Masukan Password',
				'min_length' => 'Minimal 3 Karakter',
			]);
		if ($this->form_validation->run() == FALSE) 
		{
			// $this->db->select('kelas');
			$kelas = $this->db->get('kelas')->result();
			$data['kelas'] = $kelas;
			$data['judul'] = "Tambah User";
			$this->load->view('template/header',$data);
			$this->load->view('admin/v_input');
			$this->load->view('template/footer');
		} else
			{
				$tambah = $this->m_admin->tambah();

				if ($tambah) 
				{
					echo $this->session->set_flashdata('psn','<p>Data Berhasil Ditambahkan</p>');
					redirect('admin/C_admin/get_admin');
				}
			}
	}

	function get_admin($offset=0)
	{
		$admin = $this->db->get("user");

		$config['total_rows'] = $admin->num_rows();
		$config['base_url'] = base_url().'admin/C_admin/get_admin';
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

		$data['data'] = $this->m_admin->get_admin($config['per_page'],$offset);
		$data['judul'] = 'Tabel User';
		$this->load->view('template/header',$data);
		$this->load->view('admin/v_admin');
		$this->load->view('template/footer');
	}

	function hapus($id)
	{
		$hapus = $this->m_admin->hapus($id);
		if ($hapus) 
		{
			$this->session->set_flashdata('psn','Data Dihapus');
			redirect('admin/C_admin/get_admin');
		} else
			{
				$this->session->set_flashdata('gagal','Data Gagal Dihapus');
				redirect('admin/C_admin/get_admin');
			}
	}

	function edit($id)
	{
		$edit = $this->m_admin->edit($id);
		if ($edit) 
		{
			$data['judul'] = "Edit User";
			$data['data'] = $edit;
			$this->load->view('template/header',$data);
			$this->load->view('admin/v_edit');
			$this->load->view('template/footer');
		}
	}

	function update()
	{
		$this->form_validation->set_rules('nik','NIK','required|trim|min_length[4]',
			[
				'required' => 'Masukan NIK',
				'min_length' => 'Minimal 4 Diigit',
			]);
		$this->form_validation->set_rules('nama','Nama','required|trim',
			[
				'required' => 'Masukan Nama',
			]);
		$this->form_validation->set_rules('jabatan','Jabatan','required|trim',
			[
				'required' => 'Pilih Jabatan',
			]);

		if ($this->form_validation->run()==FALSE) 
		{
			$id = $_POST['nik'];
			$admin = $this->db->get_where('user',['id' => $id])->result();
			$data['judul'] = "Edit Admin";
			$data['data'] = $admin;
			$this->load->view('template/header',$data);
			$this->load->view('admin/v_edit');
			$this->load->view('template/footer');
		} else
			{
				$update = $this->m_admin->update();
				if ($update) 
				{
					$this->session->set_flashdata('psn','Data Berhasil Update');
					redirect('admin/c_admin/get_admin');
				} else 
					{
						$this->session->set_flashdata('psn','Data Gagal Update');
						redirect('admin/c_admin/get_admin');
					}
			}
	}


	function murid_list()
	{
		$kelas = $this->input->post('kelas');
		echo $this->m_admin->murid_list($kelas);
	}

	function guru_list()
	{
		$guru = $this->input->post('user');
		echo $this->m_admin->guru_list($guru);
	}

	function nama_admin()
	{
		$id = $this->input->post('nis');
		$data = $this->m_admin->nama_admin($id);
		echo json_encode($data);
	}


	function profile()
	{
		$data['judul'] = "Profile User";
		$data['data'] = $this->m_admin->profile();
		$this->load->view('template/header',$data);
		$this->load->view('admin/v_profile');
		$this->load->view('template/footer');
	}

	function update_profile()
	{
		$this->form_validation->set_rules('nama','Nama','required',
			[
				'required' => "Masukan Nama",
			]);

		$this->form_validation->set_rules('password','Password','trim|matches[password2]',
			[
				'matches' => 'Password Tidak Sama',
			]);

		$this->form_validation->set_rules('password2','Password','trim|matches[password]',
			[
				'matches' => 'Password Tidak Sama',
			]);

		if ($this->form_validation->run()==FALSE) 
		{
			$data['data'] = $this->m_admin->profile();
			$data['judul'] = "Profile User";
			$this->load->view('template/header',$data);
			$this->load->view('admin/v_profile');
			$this->load->view('template/footer');
		} else
			{
				$post = $this->input->post();

				$id = $post['id'];
				$pass = $post['password'];
				$nama = $post['nama'];
				if ($pass == "") 
				{
					$data = array(
						'nama' => $nama,
					);

					$update = $this->m_admin->update_profile($data,$id);

					if ($update) 
					{
						$this->session->set_flashdata('psn','Profile Diupdate');
						redirect('login/home');
					} else
						{
							$this->session->set_flashdata('gagal','Profile Gagal Diupdate');
							redirect('login/home');
						}
				} else
					{
						$data = array(
							'nama' => $nama,
							'password' => password_hash($pass, PASSWORD_DEFAULT),
						);

						$update = $this->m_admin->update_profile($data,$id);

						if ($update) 
						{
							$this->session->set_flashdata('psn','Profile Diupdate');
							redirect('login/home');
						} else
							{
								$this->session->set_flashdata('gagal','Profile Gagal Diupdate');
								redirect('login/home');
							}
					}
			}
	}
}
?>