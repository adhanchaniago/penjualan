<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*Load all parser library*/
require "vendor/autoload.php";
use Sunra\PhpSimple\HtmlDomParser; // lib html parser
use stringEncode\Encode; // lib html parser
use PHPHtmlParser\Dom; // lib html parser
use FastSimpleHTMLDom\Document; // lib html parser
class Register extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('form_validation');
		date_default_timezone_set('Asia/Jakarta'); // default time zone indonesia
	}
	
	public function index()
	{
        $this->load->view('static_header');
        $this->load->view('dynamic_register');
    }
    
    public function submit_register(){
      
      
      $username = $this->input->post('p_username', TRUE);
      $nama = $this->input->post('p_nama', TRUE);
      $email = $this->input->post('p_email', TRUE);
      $password = $this->input->post('p_password', TRUE);
      $q_check = "SELECT * FROM users where username = '$username' ";
      $result = $this->db->query($q_check)->result();
      $check1 = $this->db->affected_rows() > 0;
      if(count($result) > 0){
        $this->session->set_flashdata('message', 'Mohon maaf username sudah terdaftar');
        redirect(site_url('register'));
      }else{
        $data = array(
          'username' => ''.$username,
          'email' => ''.$email,
          'fullname' => ''.$nama,
          'password' => ''.md5($password),
          'role' => 'common'
        );
  
        $this->db->insert('users', $data);
        $check = $this->db->affected_rows() > 0;
        if($check){
          $this->session->set_flashdata('message', 'Registrasi Berhasil - Silahkan Login untuk melanjutkan');
          redirect(base_url('login'));
        }
      }

      }
    }   
