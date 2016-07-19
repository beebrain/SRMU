<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class position extends CI_Controller {
		
	public function __construct()
		{
		 parent::__construct();
		 $this->load->model('positionModel');
		}
	public function dataPosition()
		{
			$this->positionModel->searchPosition($search=$this->input->post('search'));
			$data['menu']="staff/menuStaff";
			$data['main_content']="position/dataPosition";
			$data['query']=$this->positionModel->position();
			$this->load->view('template', $data);	
		}
	public function addPosition()
	{
		$data['menu']="staff/menuStaff";
		$data['main_content']="position/addPosition";
		$this->load->view('template', $data);
	}
	public function savenew_Position()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('position_value', 'ตำแหน่งทางวิชาการ (TH)', 'trim|required|xss_clean');
		$this->form_validation->set_rules('position_value_EN', 'ตำแหน่งทางวิชาการ (EN)', 'trim|required|xss_clean');
	
		if ($this->form_validation->run() == FALSE) {
	
			$data['menu']="staff/menuStaff";
			$data['main_content']="position/addPosition";
			$this->load->view('template', $data);
		}
		else {
			$data = array(
					'position_id' => "",
					'position_name' => $this->input->post('position_value'),
					'position_name_EN' => $this->input->post('position_value_EN')
			);
			$this->positionModel->savenew_Position($data);
	
				$this->session->set_flashdata('msg', '<div class="n_ok"><p>เพิ่มข้อมูลตำแหน่งทางวิชาการเรียบร้อย</p></div>');
				redirect("position/dataPosition/".$this->uri->segment(3),"refresh");
		}
	}
	public function editPosition()
	{
		$id=$this->uri->segment(4);
		$sql="Select* from ref_position where position_id=$id";
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
		$data['main_content']="position/editPosition";
		$this->load->view('template', $data);
		
	}
	public function update_Position()
	{
		$id=$this->uri->segment(4);
		$ara=array
		(
				'position_id' => $this->uri->segment(4),
				'position_name' => $this->input->post('position_value'),
				'position_name_EN' => $this->input->post('position_value_EN')
		);
	
		$this->db->where("position_id",$id);
		$this->db->update("ref_position",$ara);
		
		$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลตำแหน่งทางวิชาการเรียบร้อย</p></div>');
		redirect("position/dataPosition/".$this->uri->segment(3),"refresh");
	
	}
	public function deletePosition(){

		$this->positionModel->deletePosition($position_id=$this->uri->segment(4));
		$this->session->set_flashdata('msg', '<div class="n_ok"><p>ลบข้อมูลตำแหน่งทางวิชาการเรียบร้อย</p></div>');
		redirect("position/dataPosition/".$this->uri->segment(3),"refresh");
	}
	public function datasearchPosition()
	{	if ($this->input->post('search')==null){
		$this->session->set_flashdata('msgSearch', '<div class="n_warning"><p>กรุณากรอกข้อมูลที่ต้องการค้นหา</p></div>');
		redirect("position/dataPosition/".$this->uri->segment(3),"refresh");
	
	}else{
		$this->positionModel->searchPosition($search=$this->input->post('search'));
			$data['menu']="staff/menuStaff";
			$data['main_content']="position/dataPosition";
			$data['query']=$this->positionModel->searchPosition($search);
			$this->load->view('template', $data);
	}
	}
}
