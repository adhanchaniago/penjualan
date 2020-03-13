<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*Load all parser library*/
require "vendor/autoload.php";
use Sunra\PhpSimple\HtmlDomParser; // lib html parser
use stringEncode\Encode; // lib html parser
use PHPHtmlParser\Dom; // lib html parser
use FastSimpleHTMLDom\Document; // lib html parser
class Pembelian extends CI_Controller {

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
	{	$check_role = $this->session->userdata('role');
		if($check_role == "admin"){
			$data['navbar'] = 'pembelian';
			$this->load->view('admin/static_header');
			$this->load->view('admin/static_navbar');
			$this->load->view('admin/content_pembelian');
			$this->load->view('admin/static_footer');
		}else if($check_role == "pimpinan"){
			$data['navbar'] = 'pembelian';
			$this->load->view('users/static_header');
			$this->load->view('users/static_navbar_pimpinan');
			$this->load->view('users/content_pembelian');
			$this->load->view('users/static_footer');
		}else{
			$data['navbar'] = 'pembelian';
			$this->load->view('users/static_header');
			$this->load->view('users/static_navbar');
			$this->load->view('users/content_pembelian');
			$this->load->view('users/static_footer');
		}
	}

	public function daftar(){
		$user_id = $this->session->userdata('user_id');
		$query = "SELECT * FROM produk a, pembelian b where a.id = b.produk_id and b.user_id = $user_id";
		$result = $this->db->query($query)->result();
		$data['pembelian'] = $result;
		$data['navbar'] = 'pembelian';
 		$this->load->view('users/static_header', $data);
		$check_role = $this->session->userdata('role');
		if($check_role == "admin"){
			$data['navbar'] = 'pembelian';
			$this->load->view('admin/static_header');
			$this->load->view('admin/static_navbar');
			$this->load->view('admin/dynamic_pembelian');
			$this->load->view('admin/static_footer');
		}else if($check_role == "pimpinan"){
			$data['navbar'] = 'pembelian';
			$this->load->view('users/static_header');
			$this->load->view('users/static_navbar_pimpinan');
			$this->load->view('users/dynamic_pembelian');
			$this->load->view('users/static_footer');
		}else{
			$data['navbar'] = 'pembelian';
			$this->load->view('users/static_header');
			$this->load->view('users/static_navbar');
			$this->load->view('users/dynamic_pembelian');
			$this->load->view('users/static_footer');
		}
	}


	public function daftar_admin(){
		$query = "SELECT *, a.id as produk_id , c.fullname as nama_pembeli FROM produk a, pembelian b, users c where a.id = b.produk_id and c.user_id = b.user_id";
		$result = $this->db->query($query)->result();

		// $query2 = "SELECT * FROM pembelian ORDER BY tanggal_ditambahkan ASC"

		$data['pembelian'] = $result;
		$data['navbar'] = 'pembelian';
 		$this->load->view('admin/static_header', $data);
		 $check_role = $this->session->userdata('role');
		 if($check_role == 'pimpinan'){
		   $this->load->view('admin/static_navbar_pimpinan.php', $data);
		 }else{
		   $this->load->view('admin/static_navbar', $data);
		 }
		$this->load->view('admin/dynamic_pembelian', $data);
		$this->load->view('admin/static_footer', $data);
	}


	public function add(){
		$get_pembelian = $this->input->post('pembelian');
		$get_tagihan = $this->input->post('tagihan');
		$tagihan_decode = json_decode($get_tagihan);
		$pembelian_decode = json_decode($get_pembelian);

		$this->db->insert('pembelian', $pembelian_decode);
		$affect_row = $this->db->affected_rows();
		if($affect_row > 0){
			for ($x = 0; $x < sizeof($tagihan_decode); $x++) {
				$this->db->insert('tagihan', $tagihan_decode[$x]);
			}

			// update product status menjadi terjual
			$data_produk = array(
				'status' => 'terjual',
				'tanggal_ditambahkan' =>  date("Y-m-d H:i:s")
			);
			$this->db->where('id', $pembelian_decode->produk_id);
			$this->db->update('produk', $data_produk);

			// send response status ok ke frontend
			$data = array(
				'status' => 'ok'
			);
			echo json_encode($data);
		}else{
			$data = array(
				'status' => 'error'
			);
			echo json_encode($data);
		}
	}
	
}
