<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*Load all parser library*/
require "vendor/autoload.php";
use Sunra\PhpSimple\HtmlDomParser; // lib html parser
use stringEncode\Encode; // lib html parser
use PHPHtmlParser\Dom; // lib html parser
use FastSimpleHTMLDom\Document; // lib html parser
class Labarugi extends CI_Controller {

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
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }else{
            $query = "SELECT sum(harga) as total_harga_jual, sum(harga_pokok) as total_harga_pokok from produk where status = 'terjual' ";
            $result = $this->db->query($query)->result();   
            $data['labarugi'] = $result;
            $data['navbar'] = 'labarugi';
            $this->load->view('admin/static_header', $data);
            $check_role = $this->session->userdata('role');
            if($check_role == 'pimpinan'){
              $this->load->view('admin/static_navbar_pimpinan.php', $data);
            }else{
              $this->load->view('admin/static_navbar', $data);
            }
            $this->load->view('admin/dynamic_labarugi', $data);
            $this->load->view('admin/static_footer', $data);
        }
    }

}   
