<?php

class C_download extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('download/m_download');
		$masuk = $this->session->userdata('masuk');
		if (!$masuk) 
		{
			$url = base_url();
			redirect($url);
		}
	}


	function unduh()
	{
		$data['data'] = $this->m_download->data();
		$data['judul'] = "Download Tugas / Materi";
		$this->load->view('template/header',$data);
		$this->load->view('download/v_download');
		$this->load->view('template/footer');
	}


	function download($id)
	{
		$this->load->helper('download');
		$data = $this->db->get_where('file',['id' => $id])->row_array();

		force_download('./uploads/'.$data['nama_file'],NULL);

	}

	function download_tugas($id)
	{
		$this->load->helper('download');
		$data = $this->db->get_where('tugas',['id' => $id])->row_array();

		force_download('./uploads/murid/'.$data['nama_file'],NULL);

	}

	function hapus($id)
	{
		$del = $this->m_download->hapus($id);
		if ($del) 
		{
			$this->session->set_flashdata('psn','File Dihapus');
			redirect('download/C_download/unduh');
		} else
			{
				$this->session->set_flashdata('gagal','File Gagal Dihapus');
				redirect('download/C_download/unduh');
			}
	}

	function hapus_tugas($id)
	{
		$del = $this->m_download->hapus_tugas($id);
		if ($del) 
		{
			$this->session->set_flashdata('psn','File Dihapus');
			redirect('download/C_download/tugas_murid');
		} else
			{
				$this->session->set_flashdata('gagal','File Gagal Dihapus');
				redirect('download/C_download/tugas_murid');
			}
	}

	function murid()
	{
		$data['data'] = $this->m_download->murid();
		$data['judul'] = "Tabel Materi dan Tugas";
		$this->load->view('template/header',$data);
		$this->load->view('download/v_murid');
		$this->load->view('template/footer');
	}

	function tugas_murid()
	{
		$data['judul'] = "Tugas Dikerjakan";
		$data['data'] = $this->m_download->tugas_murid();
		$this->load->view('template/header',$data);
		$this->load->view('download/v_dikerjakan');
		$this->load->view('template/footer');
	}
}
?>