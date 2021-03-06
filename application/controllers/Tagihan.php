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
		$query = "SELECT  b.id, b.bukti, b.produk_id, b.bulan, b.tahun, b.tanggal, b.status, a.pembayaran_perbulan FROM pembelian a, tagihan b where a.user_id = b.user_id and a.produk_id = b.produk_id and b.user_id = $user_id";
		$result = $this->db->query($query)->result();
		$data['tagihan'] = $result;
		$data['navbar'] = 'tagihan';
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
		$data['navbar'] = 'tagihan';
		$this->load->view('admin/static_header');
		$this->load->view('admin/static_navbar');
		$this->load->view('admin/content_pembelian');
		$this->load->view('admin/static_footer');
	}

	public function daftar_admin($param){
		$split = explode('-', $param);
		$query = "SELECT a.user_id, b.id, b.bukti, b.produk_id, b.bulan, b.tahun, b.tanggal, b.status, a.pembayaran_perbulan FROM pembelian a, tagihan b where a.user_id = b.user_id and a.produk_id = b.produk_id and b.user_id = $split[0] and b.produk_id = $split[1]";
		$result = $this->db->query($query)->result();

		$query2 = "SELECT *, a.id as produk_id, c.fullname as nama_pembeli FROM produk a, pembelian b, users c where a.id = b.produk_id and a.id = $split[1] and c.user_id = b.user_id;";
		$result2 = $this->db->query($query2)->result();

		$data['tagihan'] = $result;
		$data['pembelian'] = $result2;

		$data['navbar'] = 'tagihan';
		$check_role = $this->session->userdata('role');
		if($check_role == 'pimipinan'){
			$this->load->view('admin/static_navbar_pimpinan', $data);
		}else{
			$this->load->view('admin/static_navbar', $data);
		}
 		$this->load->view('admin/static_header', $data);
		$this->load->view('admin/dynamic_tagihan', $data);
		$this->load->view('admin/static_footer', $data);
	}

	public function upload_bukti($param){
		$foto = $_FILES['upload_image'];
		$image_path = "";
        $config['upload_path'] = './assets/proof/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('upload_image')){
          echo 'Gagal upload';
        }else{
          $image_path = $this->upload->data('file_name');
		}
		$data = array(
            'bukti' => $image_path,
		);
		$this->db->where('id', $param);
        $this->db->update('tagihan', $data);
		$affect_row = $this->db->affected_rows();
		if($affect_row > 0){
			redirect(base_url("tagihan"));
		}else{

		}
	}

	public function upload_bukti2(){
        $config['upload_path'] = './assets/proof/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
		$this->load->library('upload', $config);
        if(!$this->upload->do_upload('upload_image')){
			return json_encode('gagal');
        }else{
			header('Content-Type: application/json');
			$data = array(
				'status' => 'berhasil'
			);
			return json_encode($data);
		}
	}


	public function update_admin(){
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$user_id = $this->input->post('user_id');
		$send_status = '';
		if($status == true){
			$send_status = 'bayar';
		}else{
			$send_status = 'belum';
		}
		$data = array(
			'status' => $send_status,
			'tanggal' => date("Y-m-d H:i:s")
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
			'tanggal' => '0000-00-00 00:00:00'
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
