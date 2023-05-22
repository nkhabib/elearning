<?php

class Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
		$this->load->library('form_validation');
	}

	function index()
	{
		$this->load->view('login');
	}

	function login()
	{
		$this->form_validation->set_rules('username','Username','required|trim',
			[
				'required' => 'Masukan Username',
			]);	
		$this->form_validation->set_rules('password','Password','required|trim',
			[
				'required' => 'Masukan Password',
			]);
		if ($this->form_validation->run()==FALSE) 
		{
			$this->load->view('login');
		} else 
			{
				$username = strip_tags($_POST['username']);
				$password = strip_tags($_POST['password']);
				$user = $this->db->get_where('user',['id' => $username])->row_array();
				if ($user) 
				{
					// $pass = $this->db->get_where('user',['password' => $password])->row_array();
					if (password_verify($password, $user['password']))
					{
						$this->db->where('id',$username);
						$this->db->set('status','1');
						$this->db->update('user');
						$this->session->set_userdata('masuk',TRUE);
						if ($user['level']=='Admin') 
						{
							$this->session->set_userdata('masuk','admin');
							$this->session->set_userdata('ses_nama',$user['nama']);
							$this->session->set_userdata('ses_id',$user['id']);
							redirect('login/home');
						} elseif($user['level']=='Guru')
							{
								$this->session->set_userdata('masuk','guru');
								$this->session->set_userdata('ses_nama',$user['nama']);
								$this->session->set_userdata('ses_id',$user['id']);
								redirect('login/home');
							} elseif ($user['level']=='Murid') 
								{
									$this->session->set_userdata('masuk','murid');
									$this->session->set_userdata('ses_nama',$user['nama']);
									$this->session->set_userdata('ses_id',$user['id']);
									redirect('login/home');
								}
					} else
						{
							$this->session->set_flashdata('loginp','Password Salah');
							$this->load->view('login');
						}
				} else
					{
						$this->session->set_flashdata('loginu','Username salah');
						$this->load->view('login');
					}
			}
	}

	function home()
	{
		$murid = $this->db->get('murid')->result();
		$guru = $this->db->get('guru')->result();
		$kelas = $this->db->get('kelas')->result();
		$data['judul'] = 'Home';
		$data['murid'] = count($murid);
		$data['guru'] = count($guru);
		$data['kelas'] = count($kelas);
		$this->load->view('template/header',$data);
		$this->load->view('dashbor');
		$this->load->view('template/footer');
	}

	function keluar()
	{
		$id = $this->session->userdata('ses_id');
		$this->db->where('id',$id);
		$this->db->set('status','0');
		$this->db->update('user');
		$this->session->sess_destroy();
		$user = base_url();
		redirect($url);
	}
}
?>