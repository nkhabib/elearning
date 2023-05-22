<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_chat extends CI_Controller {
 function __construct()
  {
    parent::__construct();
    $masuk = $this->session->userdata('masuk');
    if (!$masuk) 
    {
      $url = base_url();
      redirect($url);
    }
  }
  /* The default function that gets called when visiting the page */
  public function chat() {
    $online = $this->db->get_where('user',['status' => 1])->result();
    $jml = count($online);
    $data['online'] = $jml;
    $data['judul'] = "Chat Kelas";
    $this->load->view('template/header',$data);
    $this->load->view('chat/v_chat');
    $this->load->view('template/footer');
  }
   
  public function get_chats() {
    /* Connect to the mySQL database - config values can be found at:
    /application/config/database.php */
    $dbconnect = $this->load->database();
     
    //  Load the database model:
    // /application/models/simple_model.php 
    $this->load->model('chat/M_chat');
     
    /* Create a table if it doesn't exist already */
    $this->M_chat->create_table();
     
    echo json_encode($this->M_chat->get_chat_after($_REQUEST["time"]));
  }
   
  public function insert_chat() {
    /* Connect to the mySQL database - config values can be found at:
    /application/config/database.php */
    $dbconnect = $this->load->database();
     
    /* Load the database model:
    /application/models/simple_model.php */
    $this->load->model('chat/M_chat');
     
    /* Create a table if it doesn't exist already */
    $this->M_chat->create_table();
 
    $this->M_chat->insert_message($_REQUEST["message"]); 
  }
   
  public function time() {
    echo "[{\"time\":" +  time() + "}]";
  }
   
}?>