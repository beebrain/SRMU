<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  CheckLogin extends CI_Controller 
{ 		
	function __construct() 
	{ 
		parent::__construct();
	}
	 
	function index() 
	{ 
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('username', 'ชื่อผู้ใช้งาน', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'รหัสผ่าน', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			$data['menu']="menu";
			$data['main_content']="login";
			$this->load->view('template', $data);
		}
		else {
		$sql ="
			SELECT *
			FROM master_user 
			where  master_user.username='".$_POST['username']."' and
				   master_user.password='".md5($_POST['password'])."' and
			 	   master_user.status_user='1'
		";
		
		$query = $this->db->query($sql);
		$result=$query->result();

		if($query->num_rows() > 0)
		{
			$query=$query->row_array();
			$id=$query['user_id'];
			$type=$query['user_type_id'];
		
			if($type=='1'){
				redirect("admin/index/".$id,"refresh");
			}
			else if($type=='2'){
				redirect("staff/index/".$id,"refresh");
			}
			else if($type=='3'){
				redirect("researcher/index/".$id,"refresh");
			}
			else 
			{
			$this->session->set_flashdata('msg', '<div class="n_error"><p>กรุณาตรวจสอบชื่อผู้ใช้  รหัสผ่าน และสิทธิ์การเข้าใช้ระบบให้ถูกต้อง !</p></div>');
			redirect("login","refresh");

			}
		}
		else
		{
			$this->session->set_flashdata('msg', '<div class="n_error"><p>กรุณาตรวจสอบชื่อผู้ใช้  รหัสผ่าน และสิทธิ์การเข้าใช้ระบบให้ถูกต้อง !</p></div>');
			redirect("login","refresh");

		}

	} 

	}
}