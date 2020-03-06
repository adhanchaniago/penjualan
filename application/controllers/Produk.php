<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*Load all parser library*/
require "vendor/autoload.php";
use Sunra\PhpSimple\HtmlDomParser; // lib html parser
use stringEncode\Encode; // lib html parser
use PHPHtmlParser\Dom; // lib html parser
use FastSimpleHTMLDom\Document; // lib html parser
class Produk extends CI_Controller {

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
			$query = "SELECT * FROM produk where status = 'ready'";
			$result = $this->db->query($query)->result();
			$data['produk'] = $result;
			$data['navbar'] = 'produk';
			$this->load->view('admin/static_header', $data);
			$check_role = $this->session->userdata('role');
			if($check_role == 'pimpinan'){
			  $this->load->view('admin/static_navbar_pimpinan.php', $data);
			}else{
			  $this->load->view('admin/static_navbar', $data);
			}
			$this->load->view('admin/content_produk', $data);
			$this->load->view('admin/static_footer', $data);
		}
	}


	public function add(){
        $nama = $this->input->post('nama');
        $tipe = $this->input->post('tipe');
		$harga = $this->input->post('harga');
		$harga_pokok = $this->input->post('harga_pokok');
        $luas_tanah = $this->input->post('luas_tanah');
		$sertifikat = $this->input->post('sertifikat');
		$foto = $_FILES['upload_image'];

		$keuntungan = $harga - $harga_pokok;

		// $image_path = "";
        // $config['upload_path'] = './assets/produk/';
        // $config['allowed_types'] = 'jpg|png|gif';
        // $this->load->library('upload', $config);
        // if(!$this->upload->do_upload('upload_image')){
        //   echo 'Gagal upload';
        // }else{
        //   $image_path = $this->upload->data('file_name');
        // }

        $data = array(
            'nama' => $nama,
            'tipe' => $tipe,
			'harga' => $harga,
			'harga_pokok' => $harga_pokok,
			'keuntungan' => $keuntungan,
			'thumbnail' => '',
			'lokasi' => 'Kota Palembang',
            'luas_tanah' => $luas_tanah,
			'sertifikasi' => $sertifikat,
			'tanggal_ditambahkan' => date("Y-m-d H:i:s")
          );
      
          $this->db->insert('produk', $data);
          $affect_row = $this->db->affected_rows();
          if($affect_row > 0){
            $this->session->set_flashdata('message', 'Berhasil menambahkan konten');
          }else{
            $this->session->set_flashdata('error', 'Gagal menambahkan konten');
          }
          redirect(base_url("produk"));
    }
	
}
