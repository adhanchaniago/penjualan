<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*Load all parser library*/
require "vendor/autoload.php";
use Sunra\PhpSimple\HtmlDomParser; // lib html parser
use stringEncode\Encode; // lib html parser
use PHPHtmlParser\Dom; // lib html parser
use FastSimpleHTMLDom\Document; // lib html parser
class Tagihan extends CI_Controller {

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

	public function daftar(){
		$user_id = $this->session->userdata('user_id');
		$query = "SELECT b.produk_id, b.bulan, b.tahun, b.tanggal, b.status, a.pembayaran_perbulan FROM pembelian a, tagihan b where a.user_id = b.user_id and a.produk_id = b.produk_id and b.user_id = $user_id";
		$result = $this->db->query($query)->result();
		$data['tagihan'] = $result;
 		$this->load->view('users/static_header', $data);
		$this->load->view('users/static_navbar', $data);
		$this->load->view('users/dynamic_tagihan', $data);
		$this->load->view('users/static_footer', $data);
	}
	
	public function index()
	{	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		$this->load->view('admin/static_header');
		$this->load->view('admin/static_navbar');
		$this->load->view('admin/content_pembelian');
		$this->load->view('admin/static_footer');
	}

	public function daftar_admin($param){
		$split = explode('-', $param);
		$query = "SELECT a.user_id, b.id, b.produk_id, b.bulan, b.tahun, b.tanggal, b.status, a.pembayaran_perbulan FROM pembelian a, tagihan b where a.user_id = b.user_id and a.produk_id = b.produk_id and b.user_id = $split[0] and b.produk_id = $split[1]";
		$result = $this->db->query($query)->result();
		$data['tagihan'] = $result;
 		$this->load->view('admin/static_header', $data);
		$this->load->view('admin/static_navbar', $data);
		$this->load->view('admin/dynamic_tagihan', $data);
		$this->load->view('admin/static_footer', $data);
	}

	// public function detail($id){
	// 	$query = "SELECT * FROM produk where id = $id";
	// 	$result = $this->db->query($query)->result();
	// 	$data['produk'] = $result;
 	// 	$this->load->view('users/static_header', $data);
	// 	$this->load->view('users/static_navbar', $data);
	// 	$this->load->view('users/dynamic_maindetail', $data);
	// 	$this->load->view('users/static_footer', $data);
	// }

	public function update_admin(){
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$user_id = $this->input->post('user_id');
		$send_status;
		if($status == true){
			$send_status = 'bayar';
		}else{
			$send_status = 'belum';
		}
		$data = array(
            'status' => $send_status,
		);
		$this->db->where('id', $id);
        $this->db->update('tagihan', $data);
		$affect_row = $this->db->affected_rows();
		if($affect_row > 0){
			echo 'ok';
		}else{

		}
	}


	public function update_admin2(){
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$user_id = $this->input->post('user_id');
		$data = array(
            'status' => 'belum',
		);
		$this->db->where('id', $id);
        $this->db->update('tagihan', $data);
		$affect_row = $this->db->affected_rows();
		if($affect_row > 0){
			echo 'ok';
		}else{
			
		}
	}
	
}
