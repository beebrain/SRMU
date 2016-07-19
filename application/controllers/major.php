<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class major extends CI_Controller {
		
	public function __construct()
		{
		 parent::__construct();
		 $this->load->model('majorModel');
		 $this->load->model('departmentModel');
		 $this->load->model('whomodel');
		}
	public function dataMajor()
		{
			$config['base_url']=base_url()."major/dataMajor/".$this->uri->segment(3).'/';
			$config['total_rows']=$this->db->count_all("ref_major");
					$config['per_page'] =10;
		$config['first_link'] = 'หน้าแรก';
		$config['last_link'] = 'หน้าสุดท้าย';
		$config['full_tag_open'] = "<div class='pagination'>";
		$config['full_tag_close']="</div>";
		$config['uri_segment'] = 4;
			
			$this->pagination->initialize($config);
			$this->majorModel->searchMajor($search=$this->input->post('search'));
			$data['menu']="staff/menuStaff";
			$data['main_content']="major/dataMajor";
			$this->db->select('*');
			$this->db->from('ref_major');
			$this->db->join('ref_department', 'ref_department.department_id = ref_major.department_id', 'inner');
			$this->db->limit($config['per_page'],$this->uri->segment(4));
			$data['query']=$this->db->order_by('major_name', 'asc')->get();
			$this->load->view('template', $data);	
		}
	public function addMajor()
	{
		$data['menu']="staff/menuStaff";
		$data['queryDepartment']=$this->departmentModel->department();
		$data['main_content']="major/addMajor";
		$this->load->view('template', $data);
	}
	public function  savenew_Major()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('department_value', 'ชื่อภาควิชา', 'trim|required|xss_clean');
		$this->form_validation->set_rules('major_name_value', 'ชื่อหลักสูตร', 'trim|required|xss_clean');
	
		if ($this->form_validation->run() == FALSE) {
		$data['menu']="staff/menuStaff";
		$data['queryDepartment']=$this->departmentModel->department();
		$data['main_content']="major/addMajor";
		$this->load->view('template', $data);
		}
		else {
			$data = array(
					'major_id' => "",
					'major_name' => $this->input->post('major_name_value'),
					'department_id' => $this->input->post('department_value')
			);
			$this->majorModel->savenew_Major($data);
	
				$this->session->set_flashdata('msg', '<div class="n_ok"><p>เพิ่มข้อมูลหลักสูตรเรียบร้อย</p></div>');
				redirect("major/dataMajor/".$this->uri->segment(3),"refresh");
		}
	}
	public function editMajor()
	{
		$id=$this->uri->segment(4);
		$sql="SELECT * 
		FROM (`ref_major`) 
		INNER JOIN `ref_department` ON `ref_department`.`department_id` = `ref_major`.`department_id`
		where major_id=$id";
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
		$data['main_content']="major/editMajor";
		$data['queryDepartment']=$this->departmentModel->department();
		$this->load->view('template', $data);
		
	}
	public function update_Major()
	{
		$id=$this->uri->segment(4);
		$ara=array
		(
					'major_id' => $this->uri->segment(4),
					'major_name' => $this->input->post('major_name_value'),
					'department_id' => $this->input->post('department_value')
		);
	
		$this->db->where("major_id",$id);
		$this->db->update("ref_major",$ara);
		
		$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลหลักสูตรเรียบร้อย</p></div>');
		redirect("major/dataMajor/".$this->uri->segment(3),"refresh");
	
	}
	public function deleteMajor(){

		$this->majorModel->deleteMajor($major_id=$this->uri->segment(4));
		$this->session->set_flashdata('msg', '<div class="n_ok"><p>ลบข้อมูลหลักสูตรเรียบร้อย</p></div>');
		redirect("major/dataMajor/".$this->uri->segment(3),"refresh");
	}
	public function datasearchMajor()
	{	if ($this->input->post('search')==null){
		$this->session->set_flashdata('msgSearch', '<div class="n_warning"><p>กรุณากรอกข้อมูลที่ต้องการค้นหา</p></div>');
		redirect("major/dataMajor/".$this->uri->segment(3),"refresh");
	
	}else{
	
			$this->majorModel->searchMajor($search=$this->input->post('search'));
			$data['menu']="staff/menuStaff";
			$data['main_content']="major/dataMajor";
			$data['query']=$this->majorModel->searchMajor($search);
			$this->load->view('template', $data);
	}
	}
}