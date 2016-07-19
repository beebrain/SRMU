<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Institution extends CI_Controller {
		
	public function __construct()
		{
		 parent::__construct();
		 $this->load->model('institutionModel');
		}
	public function dataInstitution()
		{
			$config['base_url']=base_url()."institution/dataInstitution/".$this->uri->segment(3).'/';
			$config['total_rows']=$this->db->count_all("ref_institution");
					$config['per_page'] =10;
		$config['first_link'] = 'หน้าแรก';
		$config['last_link'] = 'หน้าสุดท้าย';
		$config['full_tag_open'] = "<div class='pagination'>";
		$config['full_tag_close']="</div>";
		$config['uri_segment'] = 4;
			
			$this->pagination->initialize($config);
			$this->institutionModel->searchInstitution($search=$this->input->post('search'));
			$data['menu']="staff/menustaff";
			$data['main_content']="institution/dataInstitution";
			$data['query']=$this->db->get('ref_institution',$config['per_page'],$this->uri->segment(4));
		
			$this->load->view('template', $data);
				
		}
	public function addInstitution()
	{
		$data['menu']="staff/menuStaff";
		$data['main_content']="institution/addInstitution";
		$this->load->view('template', $data);
	}
	public function savenew_Institution()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('institution_value', 'สถาบันการศึกษา', 'trim|required|xss_clean');
	
		if ($this->form_validation->run() == FALSE) {
	
			$data['menu']="staff/menuStaff";
			$data['main_content']="institution/addInstitution";
			$this->load->view('template', $data);
		}
		else {
			$data = array(
					'institution_id' => "",
					'institution_name' => $this->input->post('institution_value')
			);
			$this->institutionModel->savenew_Institution($data);
	
				$this->session->set_flashdata('msg', '<div class="n_ok"><p>เพิ่มข้อมูลสถาบันการศึกษาเรียบร้อย</p></div>');
				redirect("institution/dataInstitution/".$this->uri->segment(3),"refresh");
		}
	}
	public function editInstitution()
	{
		$id=$this->uri->segment(4);
		$sql="Select* from ref_institution where institution_id=$id";
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
		$data['main_content']="institution/editInstitution";
		$this->load->view('template', $data);
		
	}
	public function update_Institution()
	{
		$id=$this->uri->segment(4);
		$ara=array
		(
				'institution_id' => $this->uri->segment(4),
				'institution_name' => $this->input->post('institution_value')
		);
	
		$this->db->where("institution_id",$id);
		$this->db->update("ref_institution",$ara);
		
		$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลสถาบันการศึกษาเรียบร้อย</p></div>');
		redirect("institution/dataInstitution/".$this->uri->segment(3),"refresh");
	
	}
	public function deleteInstitution(){

		$this->institutionModel->deleteInstitution($institution_id=$this->uri->segment(4));
		$this->session->set_flashdata('msg', '<div class="n_ok"><p>ลบข้อมูลสถาบันการศึกษาเรียบร้อย</p></div>');
		redirect("institution/dataInstitution/".$this->uri->segment(3),"refresh");
	}
	public function dataSearchinstitution()
	{	if ($this->input->post('search')==null){
		$this->session->set_flashdata('msgSearch', '<div class="n_warning"><p>กรุณากรอกข้อมูลที่ต้องการค้นหา</p></div>');
		redirect("institution/dataInstitution/".$this->uri->segment(3),"refresh");
	
	}else{
	
		$this->institutionModel->searchInstitution($search=$this->input->post('search'));

			$data['menu']="staff/menuStaff";
			$data['main_content']="institution/dataInstitution";
			$data['query']=$this->institutionModel->searchInstitution($search);
			$this->load->view('template', $data);
	}
	}
}