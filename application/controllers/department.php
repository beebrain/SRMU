<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class department extends CI_Controller {
		
	public function __construct()
		{
		 parent::__construct();
		 $this->load->model('departmentModel');
		 $this->load->model('whomodel');
		}
	public function dataDepartment()
		{
		
			$data['menu']="staff/menuStaff";
			$data['main_content']="department/dataDepartment";
			$data['query']=$this->departmentModel->department();
			$this->load->view('template', $data);	
		}
	public function addDepartment()
	{
	
		$data['menu']="staff/menuStaff";
		$data['main_content']="department/addDepartment";
		$this->load->view('template', $data);
	}
	public function savenew_Department()
	{
	
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('department_value', 'ภาควิชา', 'trim|required|xss_clean');
	
		if ($this->form_validation->run() == FALSE) {
	
			$data['menu']="staff/menuStaff";
			$data['main_content']="department/addDepartment";
			$this->load->view('template', $data);
		}
		else {
			$data = array(
					'department_id' => "",
					'department_name' => $this->input->post('department_value')
			);
			$this->departmentModel->savenew_Department($data);
	
				$this->session->set_flashdata('msg', '<div class="n_ok"><p>เพิ่มข้อมูลภาควิชาเรียบร้อย</p></div>');
				redirect("department/dataDepartment/".$this->uri->segment(3),"refresh");
		}
	}
	public function editdepartment()
	{
	
		$id=$this->uri->segment(4);
		$sql="Select* from ref_department where department_id=$id";
		$rs=$this->db->query($sql);
			
		if ($rs->num_rows() == 0)
		{
			$data['rs']=array();
		}
		else
		{
			$data['rs']=$rs->row_array();
		}
		$data['menu']="staff/menuStaff";
		$data['main_content']="department/editdepartment";
		$this->load->view('template', $data);
		
	}
	public function update_department()
	{
	
		$id=$this->uri->segment(4);
		$ara=array
		(
				'department_id' => $this->uri->segment(4),
				'department_name' => $this->input->post('department_value')
		);
	
		$this->db->where("department_id",$id);
		$this->db->update("ref_department",$ara);
		
		$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลภาควิชาเรียบร้อย</p></div>');
		redirect("department/dataDepartment/".$this->uri->segment(3),"refresh");
	
	}
	public function deletedepartment(){

		$this->departmentModel->deletedepartment($department_id=$this->uri->segment(4));
		$this->session->set_flashdata('msg', '<div class="n_ok"><p>ลบข้อมูลภาควิชาเรียบร้อย</p></div>');
		redirect("department/dataDepartment/".$this->uri->segment(3),"refresh");
	}
	public function datasearchDepartment()
	{		
		if ($this->input->post('search')==null){
		$this->session->set_flashdata('msgSearch', '<div class="n_warning"><p>กรุณากรอกข้อมูลที่ต้องการค้นหา</p></div>');
		redirect("department/dataDepartment/".$this->uri->segment(3),"refresh");
	
	}else{
	
		$this->departmentModel->searchDepartment($search=$this->input->post('search'));

			$data['menu']="staff/menuStaff";
			$data['main_content']="department/dataDepartment";
			$data['query']=$this->departmentModel->searchDepartment($search);
			$this->load->view('template', $data);
	}
	}
}