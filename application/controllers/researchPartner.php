<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class researchPartner extends CI_Controller
 {
 	public function __construct()
 	{
 		parent::__construct();
 		$this->load->model('institutionModel');
 		$this->load->model('positionModel');
 		$this->load->model('fundModel');
 		$this->load->model('researchModel');
 	}
 	public function dataResearchPartner()
 	{
 		$config['base_url']=base_url()."ResearchPartner/dataResearchPartner/".$this->uri->segment(3).'/';
 		$config['total_rows']=$this->db->count_all("tb_ResearchPartner where user_id=".$this->uri->segment(3));
		$config['per_page'] =10;
		$config['full_tag_open'] = "<div class='pagination'>";
		$config['full_tag_close']="</div>";
		$config['first_link'] = 'หน้าแรก';
		$config['last_link'] = 'หน้าสุดท้าย';
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
 		//$this->ResearchPartnerModel->searchResearchPartner($search=$this->input->post('search'));
 		$data['menu']="ResearchPartnerer/menuResearchPartnerer";
 		$data['main_content']="ResearchPartner/dataResearchPartner";
 		$data['query']=$this->db->get_where('tb_ResearchPartner', array('user_id' => $this->uri->segment(3)));
 		
 		//$data['query']=$this->ResearchPartnerModel->searchResearchPartner($search);//อ่านข้อมูลมาทั้งหมด
 		$this->load->view('template', $data);
 	
 	}
 	public function addResearchPartner()
 	{	
 		
 		$data['menu']="researcher/menuResearcher";
 		$data['main_content']="researchPartner/add";
 		$data['queryResearch']=$data['query']=$this->db->get_where('tb_research', array('user_id' => $this->uri->segment(3)));
 		$data['queryPosition']=$this->positionModel->position();
 		$data['queryInstitution']=$this->institutionModel->institution();
 		$this->load->view('template', $data);
 			
 	}
 
 	public function dataDetail()
 	{
 		$id=$this->uri->segment(4);
 		$data['menu']="ResearchPartnerer/menuResearchPartnerer";
 		$data['main_content']="ResearchPartner/dataDetail";
 		$data['query']=$this->ResearchPartnerModel->dataDetail($id);
 		$this->load->view('template', $data);
 	}
 	public function savenew_ResearchPartner()
 	{
 		$this->load->library('form_validation');
 		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules ('ResearchPartner_name_th', 'ชื่อโครงการวิจัยภาษาไทย', 'trim|required|xss_clean' );
		$this->form_validation->set_rules('ResearchPartner_kind', 'ประเภทโครงการวิจัย', 'required');
		$this->form_validation->set_rules('ResearchPartner_status', 'สถานะการดำเนินโครงการวิจัย', 'required');
		if ($this->form_validation->run() == FALSE) {
				$data['menu']="ResearchPartnerer/menuResearchPartnerer";
		 		$data['main_content']="ResearchPartner/addResearchPartner";
		 		$data['queryPosition']=$this->positionModel->position();
		 		$data['queryInstitution']=$this->institutionModel->institution();
		 		$data['queryFundIN']=$this->fundModel->fundIN();
		 		$data['queryFundOUT']=$this->fundModel->fundOUT();
		 		$this->load->view('template', $data);
		}else {
				if ($_FILES['file_news']['name']==null){
					$data = array(
						'ResearchPartner_id' => "",
	 					'ResearchPartner_name_th' => $this->input->post('ResearchPartner_name_th'),
	 					'ResearchPartner_name_en' => $this->input->post('ResearchPartner_name_en'),
	 					'ResearchPartner_kind' => $this->input->post('ResearchPartner_kind'),
	 					'fund_id' => $this->input->post('fund_in_id'),
	 					'fund_id' => $this->input->post('fund_out_id'),
	 					'budget_year' => $this->input->post('budget_year'),
	 					'budget' => $this->input->post('budget'),
	 					'ResearchPartner_status' => $this->input->post('ResearchPartner_status'),
	 					'date_start' => $this->input->post('date_start'),
	 					'date_end' => $this->input->post('date_end'),
	 					'file_abstract' => "",
	 					'user_id'=> $this->uri->segment(3)
					);
					$this->ResearchPartnerModel->savenew_ResearchPartner($data);
					$this->session->set_flashdata('msg', '<div class="n_ok"><p>เพิ่มข้อมูลโครงการวิจัยเรียบร้อย</p></div>');
					redirect("ResearchPartner/dataResearchPartner/".$this->uri->segment(3),"refresh");
				}else{		
				$config['upload_path']="fileAbstract/";
				$config['allowed_types']="pdf";
				$config['max_size']=10240; 
				$this->load->library('upload', $config);
                $this->upload->initialize($config);
				if ( ! $this->upload->do_upload('file_news'))
				{
						$this->session->set_flashdata('msg', '<div class="n_warning"><p>กรุณาตรวจสอบชนิดและขนาดของไฟล์ที่อนุญาติให้ทำการอัพโหลด</p></div>');
						redirect("ResearchPartner/addResearchPartner/".$this->uri->segment(3),"refresh");
			
				}
				else
				{
					$file_data = $this->upload->data('file_news');
					$data = array(
							'ResearchPartner_id' => "",
	 					'ResearchPartner_name_th' => $this->input->post('ResearchPartner_name_th'),
	 					'ResearchPartner_name_en' => $this->input->post('ResearchPartner_name_en'),
	 					'ResearchPartner_kind' => $this->input->post('ResearchPartner_kind'),
	 					'fund_id' => $this->input->post('fund_in_id'),
	 					'fund_id' => $this->input->post('fund_out_id'),
	 					'budget_year' => $this->input->post('budget_year'),
	 					'budget' => $this->input->post('budget'),
	 					'ResearchPartner_status' => $this->input->post('ResearchPartner_status'),
	 					'date_start' => $this->input->post('date_start'),
	 					'date_end' => $this->input->post('date_end'),
	 					'file_abstract' => $file_data['file_name'],
	 					'user_id'=> $this->uri->segment(3)
					);
				}
					$this->ResearchPartnerModel->savenew_ResearchPartner($data);
			$this->session->set_flashdata('msg', '<div class="n_ok"><p>เพิ่มข้อมูลโครงการวิจัยเรียบร้อย</p></div>');
			redirect("ResearchPartner/dataResearchPartner/".$this->uri->segment(3),"refresh");
				}
 				
 			}
 	}
 	public function editResearchPartner()
 	
 	{
 		$id=$this->uri->segment(4);
 		$sql="Select* from tb_ResearchPartner where ResearchPartner_id=$id";
 		$rs=$this->db->query($sql);
 	
 		if ($rs->num_rows() == 0)
 		{
 			$data['rs']=array();
 		}
 		else
 		{
 			$data['rs']=$rs->row_array();
 		}
 		$data['menu']="ResearchPartnerer/menuResearchPartnerer";
 		$data['main_content']="ResearchPartner/editResearchPartner";
 		$this->load->view('template', $data);
 	
 	}
 	public function update_ResearchPartner()
 	{
 		$id=$this->uri->segment(4);
 		$ara=array
 		(
 				'ResearchPartner_id' => $this->uri->segment(4),
 				'ResearchPartner_title' => $this->input->post('ResearchPartner_title_value'),
 				'ResearchPartner_detail' => $this->input->post('ResearchPartner_detail_value'),
 				'ResearchPartner_date' => $this->input->post('ResearchPartner_date_value')
 		);
 	
 		$this->db->where("ResearchPartner_id",$id);
 		$this->db->update("tb_ResearchPartner",$ara);
 		$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลข่าวสารเรียบร้อย</p></div>');
 		redirect("ResearchPartner/dataResearchPartner/".$this->uri->segment(3),"refresh");
 	}
 	public function deleteResearchPartner(){
 		$this->ResearchPartnerModel->deleteResearchPartner($ResearchPartner_id=$this->uri->segment(4));
 		$this->session->set_flashdata('msg', '<div class="n_ok"><p>ลบข้อมูลข่าวสารเรียบร้อย</p></div>');
 		redirect("ResearchPartner/dataResearchPartner/".$this->uri->segment(3),"refresh");
 	}
 	public function datasearchResearchPartner()
 	{	if ($this->input->post('search')==null){
 		$this->session->set_flashdata('msgSearch', '<div class="n_warning"><p>กรุณากรอกข้อมูลที่ต้องการค้นหา</p></div>');
 		redirect("ResearchPartner/dataResearchPartner/".$this->uri->segment(3),"refresh");
 	
 	}else{
 		$this->ResearchPartnerModel->searchResearchPartner($search=$this->input->post('search'));
 		$data['menu']="ResearchPartnerer/menuResearchPartnerer";
 		$data['main_content']="ResearchPartner/dataResearchPartner";
 		$data['query']=$this->ResearchPartnerModel->searchResearchPartner($search);//อ่านข้อมูลมาทั้งหมด
 		$this->load->view('template', $data);
 	}
 	}
 }
