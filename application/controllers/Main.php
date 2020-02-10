<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*Load all parser library*/
require "vendor/autoload.php";
use Sunra\PhpSimple\HtmlDomParser; // lib html parser
use stringEncode\Encode; // lib html parser
use PHPHtmlParser\Dom; // lib html parser
use FastSimpleHTMLDom\Document; // lib html parser
class Main extends CI_Controller {
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
		$check_role = $this->session->userdata('role');
		if($check_role == 'admin'){
			$query = "SELECT * FROM users";
			$result = $this->db->query($query)->result();
			$data['users'] = $result;

			$query1 = "SELECT * FROM produk";
			$result1 = $this->db->query($query1)->result();
			$data['produk'] = $result1;

			$query2 = "SELECT * FROM pembelian";
			$result2 = $this->db->query($query2)->result();
			$data['pembelian'] = $result2;

			$this->load->view('admin/static_header', $data);
			$this->load->view('admin/static_navbar', $data);
			$this->load->view('admin/dynamic_main', $data);
			$this->load->view('admin/static_footer', $data);
		}else{
			$query = "SELECT * FROM produk where status='ready'";
			$result = $this->db->query($query)->result();
			$data['produk'] = $result;
			$this->load->view('users/static_header', $data);
			$this->load->view('users/static_navbar', $data);
			$this->load->view('users/dynamic_main', $data);
			$this->load->view('users/static_footer', $data);
		}
	}

	public function detail($id){
		$query = "SELECT * FROM produk where id = $id";
		$result = $this->db->query($query)->result();
		$data['produk'] = $result;
 		$this->load->view('users/static_header', $data);
		$this->load->view('users/static_navbar', $data);
		$this->load->view('users/dynamic_maindetail', $data);
		$this->load->view('users/static_footer', $data);
	}
	
}
