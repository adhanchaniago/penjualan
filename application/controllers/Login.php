<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*Load all parser library*/
require "vendor/autoload.php";
use Sunra\PhpSimple\HtmlDomParser; // lib html parser
use stringEncode\Encode; // lib html parser
use PHPHtmlParser\Dom; // lib html parser
use FastSimpleHTMLDom\Document; // lib html parser
class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

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
        $this->load->view('dynamic_login');
    }
    
    public function submit_login(){
        $username = $this->input->post('p_username', TRUE);
        $password = $this->input->post('p_password', TRUE);
        $encrypted_mypassword=md5($password);
    
        $query="SELECT * FROM users where username = '$username' AND password = '$encrypted_mypassword'";
        $query_result = $this->db->query($query)->result_array();
        if(count($query_result) > 0){
          for($i=0; $i<count($query_result); $i++){
            $data_session = array(
              'name' => $username,
              'user_id' => $query_result[$i]['user_id'],
              'username' => $query_result[$i]['username'],
              'fullname' =>  $query_result[$i]['fullname'],
              'email' =>  $query_result[$i]['email'],
              'role' => $query_result[$i]['role'],
              'status' => 'login'
            );
          }
          $this->session->set_flashdata('key', 1);
                $this->session->set_userdata($data_session);	
          redirect(base_url('main'));
        }else{
          if($username == ''){
            $this->session->set_flashdata('error', 'Maaf, Login Gagal');
                    redirect(base_url("login"));
          }
          $this->session->set_flashdata('error', 'Maaf, Login Gagal');
                redirect(base_url("login"));
        }
      }

      public function submit_logout(){
        $this->session->unset_userdata($newdata);
        $this->session->sess_destroy();
        redirect(base_url("login"));
      }
  }   
