<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  staffpass extends CI_Controller 
{ 		
	function __construct() 
	{ 
		parent::__construct();
		$this->load->model('adminModel');
	}
	 
public function update_staff_pass()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('password_old', 'รหัสผ่านเดิม', 'trim|required|callback_pass_staff_check');
		$this->form_validation->set_rules('password_new', 'รหัสผ่านใหม่', 'trim|required');
		$this->form_validation->set_rules('password_confirm', 'ยืนยันรหัสผ่าน', 'trim|required|matches[password_new]|md5');
	
		if ($this->form_validation->run() == FALSE) {
			$id=$this->uri->segment(4);
			$sql="Select* from master_user where user_id=$id";
			$rs=$this->db->query($sql);
			if ($rs->num_rows() == 0)
			{
				$data['rs']=array();
			}
			else
			{
				$data['rs']=$rs->row_array();
			}
			$data['menu']="admin/menuAdmin";
			$data['main_content']="admin/editStaff";
			$data['query']=$this->adminModel->dataAllstaff();//อ่านข้อมูลมาทั้งหมด
			$this->load->view('template', $data);
		}
		else {
			$id=$this->uri->segment(4);
			$ara=array
			(
					'user_id' => $this->uri->segment(4),
					'password' => md5($this->input->post('password_new'))
			);
			$this->db->where("user_id",$id);
			$this->db->update("master_user",$ara);
			$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลรหัสผ่านเจ้าหน้าที่เรียบร้อย </p></div>');
			redirect('admin/dataOnestaff/'.$this->uri->segment(3).'/'.$this->uri->segment(4),"refresh");
	
		}}
	
		public function pass_staff_check($str_staff)
		{
			$who=$this->whomodel->all();
			foreach($who->result() as $rowStaff){
				if ($rowStaff->user_id = $this->uri->segment(4) && md5($str_staff) == $rowStaff->password){
		
			return TRUE; 
			}
			else
			{
			//echo $rowStaff->user_id;
			$this->form_validation->set_message('pass_staff_check', 'กรุณากรอกข้อมูล %sให้ถูกต้อง');
			return FALSE;
			}
			}
		}
}