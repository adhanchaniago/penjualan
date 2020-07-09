<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usersetting extends CI_Controller {
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
        }
        $query = "SELECT * FROM users where role != 'common' ";
        $result = $this->db->query($query)->result();
        $data['navbar'] = 'users';
        $data['userlist'] = $result;
		$this->load->view('superadmin/static_header', $data);
		$this->load->view('superadmin/static_navbar', $data);
		$this->load->view('superadmin/dynamic_main', $data);
		$this->load->view('superadmin/static_footer', $data);
    }
    
    public function add()
	{
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
        }
        $query = "SELECT * FROM users where role != 'common' ";
        $result = $this->db->query($query)->result();
        $data['navbar'] = 'users';
        $data['userlist'] = $result;
		$this->load->view('superadmin/static_header', $data);
		$this->load->view('superadmin/static_navbar', $data);
		$this->load->view('superadmin/dynamic_create_user', $data);
		$this->load->view('superadmin/static_footer', $data);
    }
    
    public function addsubmit(){
        $username = $this->input->post('username');
        $fullname = $this->input->post('fullname');
        $email = $this->input->post('email');
		$role = $this->input->post('role');
		$data = array(
			'username' => $username,
			'email' => $email,
			'fullname' => $fullname,
			'password' => '827ccb0eea8a706c4c34a16891f84e7b',
			'role' => $role,
		  );
		    
		  $this->db->insert('users', $data);
		  $affect_row = $this->db->affected_rows();
		  if($affect_row > 0){
			$this->session->set_flashdata('message', 'Berhasil menambahkan konten');
		  }else{
			$this->session->set_flashdata('error', 'Gagal menambahkan konten');
		  }
		  redirect(base_url("users"));
	}

	public function delete($id = null){
        if($this->session->userdata('status') != "login"){
          redirect(base_url("login"));
        }else{
          if(!isset($id)){
            redirect(base_url("users"));
          }
    
          $this->db->delete('users', array('user_id' => $id)); 
          redirect(base_url("users"));
        }
	}

	public function edit($id = null){
    if($this->session->userdata('status') != "login"){
        redirect(base_url("login"));
    }else{
        if(!isset($id)){
          redirect(base_url("users"));
        }
        
        $query = "SELECT * FROM users where user_id = $id";
        $result = $this->db->query($query)->result();
        $data['title_bar'] = "Daftar Terhubung | Admin";
        $data['header_page'] = "";
            $data['navbar'] = 'users';
        $data['users'] = $result;
        $this->load->view('superadmin/static_header', $data);
        $this->load->view('superadmin/static_navbar', $data);
        $this->load->view('superadmin/dynamic_edit_user', $data);
        $this->load->view('superadmin/static_footer', $data);
        }
  }

  public function editsubmit(){
    $username = $this->input->post('username');
    $fullname = $this->input->post('fullname');
    $email = $this->input->post('email');
    $user_id = $this->input->post('user_id');
    $data = array(
      'username' => $username,
			'email' => $email,
			'fullname' => $fullname,
    );
    
    $this->db->where('user_id', $user_id);
    $this->db->update('users', $data);
    $affect_row = $this->db->affected_rows();
    if($affect_row > 0){
      $this->session->set_flashdata('message', 'Berhasil update konten');
    }else{
      $this->session->set_flashdata('error', 'Gagal update konten');
    }
    redirect(base_url("users"));
  }
}
