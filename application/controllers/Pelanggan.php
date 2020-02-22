<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*Load all parser library*/
require "vendor/autoload.php";
use Sunra\PhpSimple\HtmlDomParser; // lib html parser
use stringEncode\Encode; // lib html parser
use PHPHtmlParser\Dom; // lib html parser
use FastSimpleHTMLDom\Document; // lib html parser
class Pelanggan extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper('url');
		$this->load->library('form_validation');	
		$this->load->helper('form');
		$this->load->library('form_validation');
    date_default_timezone_set('Asia/Jakarta'); // default time zone indonesia
    if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
	
	public function index()
	{	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}else{
      $query = "SELECT * FROM users where role !='admin ' ";
      $result = $this->db->query($query)->result();
      $data['users'] = $result;
      $data['navbar'] = 'pelanggan';
      $this->load->view('admin/static_header', $data);
      $this->load->view('admin/static_navbar', $data);
      $this->load->view('admin/content_pelanggan', $data);
      $this->load->view('admin/static_footer', $data);
    }
  }   
  
  
  public function add(){
      $nama = $this->input->post('nama');
      $nik = $this->input->post('nik');
      $telepon = $this->input->post('telepon');
      $email = $this->input->post('email');
      $alamat = $this->input->post('alamat');
      $data = array(
          'email' => $email,
          'fullname' => $nama,
          'role' => 'common',
          'nik' => $nik,
          'telepon' => $telepon,
          'alamat' => $alamat,
        );
    
        $this->db->insert('users', $data);
        $affect_row = $this->db->affected_rows();
        if($affect_row > 0){
          $this->session->set_flashdata('message', 'Berhasil menambahkan konten');
        }else{
          $this->session->set_flashdata('error', 'Gagal menambahkan konten');
        }
        redirect(base_url("pelanggan"));
  }
    


	
	
}
