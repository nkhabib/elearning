<?php

class C_upload extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$masuk = $this->session->userdata('masuk');
		$this->load->model('upload/m_upload');
		if (!$masuk) 
		{
			$url = base_url();
			redirect($url);
		}
	}

	function tambah()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx|xls|xlsx|xlsb|xlsm|xml';
		$config['max_size'] = 0;
		$config['max_width'] = 0;
		$config['max_height'] = 0;
		$this->load->library('upload',$config);
		if (!$this->upload->do_upload('nama_file')) 
		{
			$error = array('error' => $this->upload->display_errors());
			$data['kelas'] = $this->db->get('kelas')->result();
			$data['mapel'] = $this->db->get('mapel')->result();
			$data['judul'] = "Upload Tugas / Materi";
			$this->load->view('template/header',$data);
			$this->load->view('upload/v_tambah',$error);
			$this->load->view('template/footer');
		} else {
			$up['nama_tm'] = $this->input->post('nama');
			$up['nama_file'] = $this->upload->data('file_name');
			$up['id_kelas'] = $this->input->post('kelas');
			$up['nip'] = $this->session->userdata('ses_id');
			$up['jenis'] = $this->input->post('kategori');
			$up['id_mapel'] = $this->input->post('mapel');
			$up['waktu_upload'] = date("Y-m-d h:i:s");

			$this->db->insert('file',$up);
			redirect('login/home');
		}
	}

	function mapel_list()
	{
		$kelas = $this->input->post('kelas');

		echo $this->m_upload->list_mapel($kelas);
	}


	function tugas($id)
	{
		// $config['upload_path'] = './uploads/murid/';
		// $config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx|xls|xlsx|xlsb|xlsm|xml';
		// $config['max_size'] = 0;
		// $config['max_width'] = 0;
		// $config['max_height'] = 0;
		// $this->load->library('upload',$config);
		// if (!$this->upload->do_upload('nama_file')) 
		// {
			// $error = array('error' => $this->upload->display_errors());
			$data['judul'] = "Upload Tugas";
			$data['data'] = $this->m_upload->mapel($id);
			$this->load->view('template/header',$data);
			$this->load->view('upload/v_tambah_tugas');
			$this->load->view('template/footer');
		// } else {
			// $up['nama_tugas'] = $this->input->post('nama');
			// $up['nama_file'] = $this->upload->data('file_name');
			// $up['id_kelas'] = $this->input->post('id_kelas');
			// $up['nis'] = $this->session->userdata('ses_id');
			// $up['id_mapel'] = $this->input->post('id_mapel');
			// $up['nip'] = $this->input->post('nip');
			// $up['waktu_upload'] = time();

		// 	$this->db->insert('tugas',$up);
		// 	redirect('download/c_download/tugas_murid');
		// }
	}

	function upload_tugas()
	{
		$id = $this->input->post('id');
		$config['upload_path'] = './uploads/murid/';
		$config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx|xls|xlsx|xlsb|xlsm|xml';
		$config['max_size'] = 0;
		$config['max_width'] = 0;
		$config['max_height'] = 0;
		$this->load->library('upload',$config);
		if (!$this->upload->do_upload('nama_file')) 
		{
			$error = array('error' => $this->upload->display_errors());
			$data['judul'] = "Upload Tugas";
			$data['data'] = $this->m_upload->mapel($id);
			$this->load->view('template/header',$data);
			$this->load->view('upload/v_tambah_tugas_error',$error);
			$this->load->view('template/footer');
		} else {
			$up['nama_tugas'] = $this->input->post('nama');
			$up['nama_file'] = $this->upload->data('file_name');
			$up['id_kelas'] = $this->input->post('id_kelas');
			$up['nis'] = $this->session->userdata('ses_id');
			$up['id_mapel'] = $this->input->post('id_mapel');
			$up['nip'] = $this->input->post('nip');
			date_default_timezone_set('Asia/Jakarta');
			$tgl = date("Y-m-d h:i:s");
			$up['waktu_upload'] = $tgl;

			$this->db->insert('tugas',$up);
			redirect('download/c_download/tugas_murid');
		}
	}
}
?>