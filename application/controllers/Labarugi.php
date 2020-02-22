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
            // $query = "SELECT SUM(a.down_payment) as total_dp FROM pembelian a";
            // $result = $this->db->query($query)->result();   
            // $data['total_dp'] = $result;

            // $query1 = "SELECT SUM(a.total_sisa_bayar) as total_tagihan FROM pembelian a, tagihan b WHERE a.produk_id = b.produk_id and b.status = 'bayar'";
            // $result1 = $this->db->query($query1)->result();   
            // $data['total_tagihan'] = $result1;

            // $query2 = "SELECT b.bulan as bulan, b.tahun as tahun, b.tanggal as tanggal_tagihan FROM pembelian a, tagihan b WHERE a.produk_id = b.produk_id and b.status = 'bayar' ORDER BY bulan desc limit 1";
            // $result2 = $this->db->query($query2)->result();   
            // $data['tanggal_akhir'] = $result2;

            // $query3 = "SELECT a.pembayaran_perbulan, b.tanggal as tanggal_tagihan,  c.nama,  b.bulan as bulan, b.tahun as tahun FROM pembelian a, tagihan b, produk c WHERE a.produk_id = b.produk_id and b.status = 'bayar' and c.id = a.produk_id ORDER BY bulan";
            // $result3 = $this->db->query($query3)->result();   
            // $data['daftar_jurnal'] = $result3;

            // SELECT sum(harga) as total_harga_jual, sum(harga_pokok) as total_harga_pokok from produk

            $query = "SELECT sum(harga) as total_harga_jual, sum(harga_pokok) as total_harga_pokok from produk";
            $result = $this->db->query($query)->result();   
            $data['labarugi'] = $result;

            $this->load->view('admin/static_header', $data);
            $this->load->view('admin/static_navbar', $data);
            $this->load->view('admin/dynamic_labarugi', $data);
            $this->load->view('admin/static_footer', $data);
        }
    }

}   
