<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class research extends CI_Controller
 {
 	public function __construct()
 	{
 		parent::__construct();
 		$this->load->model('researcherModel');
 		$this->load->model('institutionModel');
 		$this->load->model('positionModel');
 		$this->load->model('fundModel');
 		$this->load->model('researchModel');	
 		$this->load->model('autoresearcher');
 	}
 	public function dataResearch()
 	{
 		$config['base_url']=base_url()."research/dataResearch/".$this->uri->segment(3).'/';
 		$config['total_rows']=$this->db->count_all("tb_research where user_id=".$this->uri->segment(3));
		$config['per_page'] =10;
		$config['full_tag_open'] = "<div class='pagination'>";
		$config['full_tag_close']="</div>";
		$config['first_link'] = 'หน้าแรก';
		$config['last_link'] = 'หน้าสุดท้าย';
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
 		$this->researchModel->searchResearch($search=$this->input->post('search'));
 		$data['menu']="researcher/menuResearcher";
 		$data['main_content']="research/dataResearch";
 		$this->db->select('*');
 		$this->db->from('tb_research');
 		$this->db->where(array('user_id' => $this->uri->segment(3)));
 		$this->db->limit($config['per_page'],$this->uri->segment(4));
 		$data['query']=$this->db->order_by('budget_year desc,research_name_th asc')->get();
 		
 		$this->load->view('template', $data);
 	
 	}


 	public function addResearch()
 	{
 		$data['menu']="researcher/menuResearcher";
 		$data['main_content']="research/addResearch";
 		$data['queryPosition']=$this->positionModel->position();
 		$data['queryInstitution']=$this->institutionModel->institution();
 		$data['queryFund']=$this->fundModel->fund();
 		$this->load->view('template', $data);
 			
 	}

 	public function addResearchGroup()
 	{
 		$data['menu']="researcher/menuResearcher";
 		$data['main_content']="research/addResearchGroup";
 		$data['queryPosition']=$this->positionModel->position();
 		$data['queryResearcher']=$this->autoresearcher->get_research();
 		$data['queryFund']=$this->fundModel->fund();

 		$this->load->view('template', $data);
 	
 	}
 	public function dataDetail()
 	{
 		$id=$this->uri->segment(4);
 		$data['menu']="researcher/menuResearcher";
 		$data['main_content']="research/dataDetail";
 		$data['queryPartner']=$this->researchModel->dataDetailPartner($id);
 		$data['query']=$this->researchModel->dataDetail($id);
 		$this->load->view('template', $data);
 	}
 	public function savenew_research()
 	{
 		$this->load->library('form_validation');
 		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
 		$this->form_validation->set_rules('research_status', 'สถานะการดำเนินโครงการวิจัย', 'required');
		$this->form_validation->set_rules ('research_name_th', 'ชื่อโครงการวิจัยภาษาไทย', 'trim|required|xss_clean' );
		$this->form_validation->set_rules('research_kind', 'ประเภทโครงการวิจัย', 'required');
		$this->form_validation->set_rules('fund_id', 'ชื่อแหล่งทุนวิจัย', 'required');
		$this->form_validation->set_rules('budget_year', 'ปีงบประมาณ', 'min_length[4]|max_length[4]');
		$this->form_validation->set_rules('budget', 'จำนวนเงินงบประมาณ ', 'numeric');
		if ($this->form_validation->run() == FALSE) {
				$data['menu']="researcher/menuResearcher";
 		$data['main_content']="research/addResearch";
 		$data['queryPosition']=$this->positionModel->position();
 		$data['queryInstitution']=$this->institutionModel->institution();
 		$data['queryFund']=$this->fundModel->fund();
 		$this->load->view('template', $data);
		 		
			}else {
				if ($_FILES['file_abstract']['name']==null)
				{
					$data = array(
								'research_id' => "",
								'research_type'=> $this->input->post('research_type'),
								'research_name_th' => $this->input->post('research_name_th'),
								'research_name_en' => $this->input->post('research_name_en'),
								'research_kind' => $this->input->post('research_kind'),
								'fund_id' => $this->input->post('fund_id'),
								'budget_year' => $this->input->post('budget_year'),
								'budget' => $this->input->post('budget'),
								'research_status' => $this->input->post('research_status'),
								'date_start' => $this->input->post('date_start'),
								'date_end' => $this->input->post('date_end'),
								'file_abstract' => "",
								'user_id'=> $this->uri->segment(3));
				
					$this->researchModel->savenew_Research($data);
					$this->session->set_flashdata('msg', '<div class="n_ok"><p>เพิ่มข้อมูลโครงการวิจัยเรียบร้อย</p></div>');
					redirect("research/dataResearch/".$this->uri->segment(3),"refresh");
			}else{		
				$config['upload_path']="fileAbstract/";
				$config['allowed_types']="pdf";
				$config['max_size']=10240; 
				$this->load->library('upload', $config);
                $this->upload->initialize($config);
				if ( ! $this->upload->do_upload('file_abstract'))
				{
											$this->session->set_flashdata('msg', '<div class="n_warning">'.$this->upload->display_errors().'</div>');
						redirect("research/addResearch/".$this->uri->segment(3),"refresh");
			
				}
				else
				{
					$file_data = $this->upload->data('file_abstract');
					$data = array(
						'research_id' => "",
						'research_type'=> $this->input->post('research_type'),
	 					'research_name_th' => $this->input->post('research_name_th'),
	 					'research_name_en' => $this->input->post('research_name_en'),
	 					'research_kind' => $this->input->post('research_kind'),
	 					'fund_id' => $this->input->post('fund_id'),
	 					'budget_year' => $this->input->post('budget_year'),
	 					'budget' => $this->input->post('budget'),
	 					'research_status' => $this->input->post('research_status'),
	 					'date_start' => $this->input->post('date_start'),
	 					'date_end' => $this->input->post('date_end'),
	 					'file_abstract' => $file_data['file_name'],
	 					'user_id'=> $this->uri->segment(3)
					);
				}
			
					$this->researchModel->savenew_Research($data);
			$this->session->set_flashdata('msg', '<div class="n_ok"><p>เพิ่มข้อมูลโครงการวิจัยเรียบร้อย</p></div>');
			redirect("research/dataResearch/".$this->uri->segment(3),"refresh");
				}
 				
		}
 	}

 			public function savenew_ResearchGroup()
 			{
 			
				if ($_FILES['file_abstract']['name']==null)
				{
					$data = array(
								'research_id' => "",
								'research_type'=> $this->input->post('research_type'),
								'research_name_th' => $this->input->post('research_name_th'),
								'research_name_en' => $this->input->post('research_name_en'),
								'research_kind' => $this->input->post('research_kind'),
								'fund_id' => $this->input->post('fund_id'),
								'budget_year' => $this->input->post('budget_year'),
								'budget' => $this->input->post('budget'),
								'research_status' => $this->input->post('research_status'),
								'date_start' => $this->input->post('date_start'),
								'date_end' => $this->input->post('date_end'),
								'user_id'=> $this->uri->segment(3));
					
					if(count($_POST['h_item_id'])>0){ 
						$partner_in = array();
        			foreach($_POST['h_item_id'] as $key_data=>$value_data){	
        				array_push($partner_in,$_POST['data1'][$key_data]);
        			}
					}
 					$partner =array(
 							'partner_id' => "",
 							'fullname' => $this->input->post('fullname'),
 							'fullname_2' => $this->input->post('fullname_2'),
 							'fullname_3' => $this->input->post('fullname_3'),
 							'organ' => $this->input->post('organ'),
 							'organ_2' => $this->input->post('organ_2'),
 							'organ_3' => $this->input->post('organ_3'),
 					);

 				$this->researchModel->savenew_Research_Partner($data,$partner,$partner_in);

 				$this->session->set_flashdata('msg', '<div class="n_ok"><p>เพิ่มข้อมูลชุดโครงการวิจัยเรียบร้อย</p></div>');
 				redirect("research/dataResearch/".$this->uri->segment(3),"refresh");
 				
 					
 				}else{
 					$config['upload_path']="fileAbstract/";
 					$config['allowed_types']="pdf";
 					$config['max_size']=10240;
 					$this->load->library('upload', $config);
 					$this->upload->initialize($config);
 					if ( ! $this->upload->do_upload('file_abstract'))
 					{
 						$this->session->set_flashdata('msg', '<div class="n_warning"><p>กรุณาตรวจสอบชนิดและขนาดของไฟล์ที่อนุญาติให้ทำการอัพโหลด</p></div>');
 						redirect("research/addResearch/".$this->uri->segment(3),"refresh");
 							
 					}
 					else
 					{
 						$file_data = $this->upload->data('file_abstract');
 						$data = array(
 								'research_id' => "",
 								'research_type'=> $this->input->post('research_type'),
 								'research_name_th' => $this->input->post('research_name_th'),
 								'research_name_en' => $this->input->post('research_name_en'),
 								'research_kind' => $this->input->post('research_kind'),
 								'fund_id' => $this->input->post('fund_id'),
 								'budget_year' => $this->input->post('budget_year'),
 								'budget' => $this->input->post('budget'),
 								'research_status' => $this->input->post('research_status'),
 								'date_start' => $this->input->post('date_start'),
 								'date_end' => $this->input->post('date_end'),
 								'file_abstract' => $file_data['file_name'],
 								'user_id'=> $this->uri->segment(3)
 						);
 	
 						$partner =array(
 								'partner_id' => "",
 								'fullname' => $this->input->post('fullname'),
 								'fullname_2' => $this->input->post('fullname_2'),
 								'fullname_3' => $this->input->post('fullname_3'),
 								'organ' => $this->input->post('organ'),
 								'organ_2' => $this->input->post('organ_2'),
 								'organ_3' => $this->input->post('organ_3'),
 						);
 						if(count($_POST['h_item_id'])>0){ 
						$partner_in = array();
        			foreach($_POST['h_item_id'] as $key_data=>$value_data){	
        				array_push($partner_in,$_POST['data1'][$key_data]);
        			}
					}
 						$this->researchModel->savenew_Research_Partner($data,$partner,$partner_in);
 						$this->session->set_flashdata('msg', '<div class="n_ok"><p>เพิ่มข้อมูลชุดโครงการวิจัยเรียบร้อย</p></div>');
 						redirect("research/dataResearch/".$this->uri->segment(3),"refresh");
 					}
 						
 				 			}
		
}
 	public function editResearch()
 	{
 		$id=$this->uri->segment(4);
 		$sql="Select* from tb_research where research_id=$id";
 		$rs=$this->db->query($sql);
 	
 		if ($rs->num_rows() == 0)
 		{
 			$data['rs']=array();
 		}
 		else
 		{
 			$data['rs']=$rs->row_array();
 		}
 		$data['menu']="researcher/menuResearcher";
 		$data['main_content']="research/editResearch";
 		$data['queryFund']=$this->fundModel->fund();
 		$this->load->view('template', $data);
 	}
 	public function editResearchGroup()
 	{
 		$id=$this->uri->segment(4);
 		$sql="SELECT `tb_research`.*,tb_research_partner.*,research_researcher.*
		FROM (`tb_research` INNER JOIN tb_research_partner ON `tb_research`.research_id = tb_research_partner.research_id)
			Left JOIN research_researcher ON `tb_research`.research_id = research_researcher.research_id
 		where tb_research.research_id=$id";
 		$rs=$this->db->query($sql);
 	
 		if ($rs->num_rows() == 0)
 		{
 			$data['rs']=array();
 		}
 		else
 		{
 			$data['rs']=$rs->row_array();
 		}
 		$data['menu']="researcher/menuResearcher";
 		$data['queryFund']=$this->fundModel->fund();
 		$data['queryResearcher']=$this->autoresearcher->get_research();
 		$data['main_content']="research/editResearchGroup";
 		$this->load->view('template', $data);

 	}
 public function update_ResearchGroup()
		{
			$id=$this->uri->segment(4);
			if ($_FILES['file_abstract']['name']==null)
			{
				$data = array(
						'research_id' => $this->uri->segment(4),
						'research_type'=> $this->input->post('research_type'),
						'research_name_th' => $this->input->post('research_name_th'),
						'research_name_en' => $this->input->post('research_name_en'),
						'research_kind' => $this->input->post('research_kind'),
						'fund_id' => $this->input->post('fund_id'),
						'budget_year' => $this->input->post('budget_year'),
						'budget' => $this->input->post('budget'),
						'research_status' => $this->input->post('research_status'),
						'date_start' => $this->input->post('date_start'),
						'date_end' => $this->input->post('date_end'),
						'user_id'=> $this->uri->segment(3));
				$partner =array(
						'research_id' => $this->uri->segment(4),
						'fullname' => $this->input->post('fullname'),
						'fullname_2' => $this->input->post('fullname_2'),
						'fullname_3' => $this->input->post('fullname_3'),
						'organ' => $this->input->post('organ'),
						'organ_2' => $this->input->post('organ_2'),
						'organ_3' => $this->input->post('organ_3'),
				);
				
				if(count($_POST['h_item_id'])>0){
					$partner_in = array();
					foreach($_POST['h_item_id'] as $key_data=>$value_data){
						array_push($partner_in,$_POST['data1'][$key_data]);
					}
				}
					$this->db->where("research_id",$id);
					$this->db->update("tb_research",$data);
					
					$this->db->where("research_id",$id);
					$this->db->update("tb_research_partner",$partner);
					
					$this->db->delete('research_researcher', array('research_id' => $this->uri->segment(4)));
					
					for ($i=0;$i<sizeof($partner_in);$i++){
						$data2['research_id'] = $this->uri->segment(4);
						$data2['researcher_id'] = $partner_in[$i];
						$this->db->insert('research_researcher', $data2);
					}
					
					
					$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลโครงการวิจัยเรียบร้อย</p></div>');
					redirect("research/dataDetail/".$this->uri->segment(3).'/'.$this->uri->segment(4),"refresh");
				}else{		
				$config['upload_path']="fileAbstract/";
				$config['allowed_types']="pdf";
				$config['max_size']=10240; 
				$this->load->library('upload', $config);
                $this->upload->initialize($config);
				if ( ! $this->upload->do_upload('file_abstract'))
				{
											$this->session->set_flashdata('msg', '<div class="n_warning">'.$this->upload->display_errors().'</div>');
						redirect("research/addResearch/".$this->uri->segment(3),"refresh");
			
				}
				else
				{
					$file_data = $this->upload->data('file_abstract');
					$data = array(
						'research_id' => $this->uri->segment(4),
						'research_type'=> $this->input->post('research_type'),
	 					'research_name_th' => $this->input->post('research_name_th'),
	 					'research_name_en' => $this->input->post('research_name_en'),
	 					'research_kind' => $this->input->post('research_kind'),
	 					'fund_id' => $this->input->post('fund_id'),
	 					'budget_year' => $this->input->post('budget_year'),
	 					'budget' => $this->input->post('budget'),
	 					'research_status' => $this->input->post('research_status'),
	 					'date_start' => $this->input->post('date_start'),
	 					'date_end' => $this->input->post('date_end'),
	 					'file_abstract' => $file_data['file_name'],
	 					'user_id'=> $this->uri->segment(3)
					);
				}
			
					$partner =array(
						
						'research_id' => $this->uri->segment(4),
						'fullname' => $this->input->post('fullname'),
						'fullname_2' => $this->input->post('fullname_2'),
						'fullname_3' => $this->input->post('fullname_3'),
						'organ' => $this->input->post('organ'),
						'organ_2' => $this->input->post('organ_2'),
						'organ_3' => $this->input->post('organ_3'),
				);
					if(count($_POST['h_item_id'])>0){ 
						$partner_in = array();
        			foreach($_POST['h_item_id'] as $key_data=>$value_data){	
        				array_push($partner_in,$_POST['data1'][$key_data]);
        			}
					}

					$this->db->where("research_id",$id);
					$this->db->update("tb_research",$data);
					
					$this->db->where("research_id",$id);
					$this->db->update("tb_research_partner",$partner);
					
				$this->db->delete('research_researcher', array('research_id' => $this->uri->segment(4)));
					
					for ($i=0;$i<sizeof($partner_in);$i++){
						$data2['research_id'] = $this->uri->segment(4);
						$data2['researcher_id'] = $partner_in[$i];
						$this->db->insert('research_researcher', $data2);
					}
					$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลโครงการวิจัยเรียบร้อย</p></div>');
					redirect("research/dataDetail/".$this->uri->segment(3).'/'.$this->uri->segment(4),"refresh");

		}
				}
	public function update_Research()
				{
					$id=$this->uri->segment(4);
					if ($_FILES['file_abstract']['name']==null)
					{
						$data = array(
								'research_id' => $this->uri->segment(4),
								'research_type'=> $this->input->post('research_type'),
								'research_name_th' => $this->input->post('research_name_th'),
								'research_name_en' => $this->input->post('research_name_en'),
								'research_kind' => $this->input->post('research_kind'),
								'fund_id' => $this->input->post('fund_id'),
								'budget_year' => $this->input->post('budget_year'),
								'budget' => $this->input->post('budget'),
								'research_status' => $this->input->post('research_status'),
								'date_start' => $this->input->post('date_start'),
								'date_end' => $this->input->post('date_end'),
								'user_id'=> $this->uri->segment(3));
				
						$this->db->where("research_id",$id);
						$this->db->update("tb_research",$data);
						$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลโครงการวิจัยเรียบร้อย</p></div>');
						redirect("research/dataDetail/".$this->uri->segment(3).'/'.$this->uri->segment(4),"refresh");
					}else{
						$config['upload_path']="fileAbstract/";
						$config['allowed_types']="pdf";
						$config['max_size']=10240;
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						if ( ! $this->upload->do_upload('file_abstract'))
						{
					$this->session->set_flashdata('msg', '<div class="n_warning">'.$this->upload->display_errors().'</div>');
							redirect("research/addResearch/".$this->uri->segment(3),"refresh");
								
						}
						else
						{
							$file_data = $this->upload->data('file_abstract');
							$data = array(
									'research_id' => $this->uri->segment(4),
									'research_type'=> $this->input->post('research_type'),
									'research_name_th' => $this->input->post('research_name_th'),
									'research_name_en' => $this->input->post('research_name_en'),
									'research_kind' => $this->input->post('research_kind'),
									'fund_id' => $this->input->post('fund_id'),
									'budget_year' => $this->input->post('budget_year'),
									'budget' => $this->input->post('budget'),
									'research_status' => $this->input->post('research_status'),
									'date_start' => $this->input->post('date_start'),
									'date_end' => $this->input->post('date_end'),
									'file_abstract' => $file_data['file_name'],
									'user_id'=> $this->uri->segment(3)
							);
						}
							
						$this->db->where("research_id",$id);
						$this->db->update("tb_research",$data);
						$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลโครงการวิจัยเรียบร้อย</p></div>');
						redirect("research/dataDetail/".$this->uri->segment(3).'/'.$this->uri->segment(4),"refresh");
				
					}
				}
	public function deleteResearch(){
		$id=$this->uri->segment(4);
		$sql="Select file_abstract from tb_research where research_id=$id";
		$query = $this->db->query($sql);
		$query=$query->row_array();
		$files=$query['file_abstract'];
		if ($files==null)
		{
			$this->researchModel->deleteResearch($research_id=$this->uri->segment(4));
		}
		else
		{
			$file_dir="fileAbstract/".$files;
			unlink($file_dir);
			$this->researchModel->deleteResearch($research_id=$this->uri->segment(4));
		}
		
 		$this->session->set_flashdata('msg', '<div class="n_ok"><p>ลบข้อมูลโครงการวิจัยเรียบร้อย</p></div>');
 		redirect("research/dataResearch/".$this->uri->segment(3),"refresh");
 	}
 	
 	public function deleteResearchGroup(){
 		$id=$this->uri->segment(4);
 		$sql="SELECT file_abstract 
FROM (`tb_research` INNER JOIN tb_research_partner ON `tb_research`.research_id = tb_research_partner.research_id) 
where tb_research.research_id and tb_research_partner.research_id=$id";
 		$query = $this->db->query($sql);
 		$query=$query->row_array();
 		$files=$query['file_abstract'];
 		if ($files==null)
 		{
 			$this->researchModel->deleteResearchGroup($research_id=$this->uri->segment(4));
 		}
 		else
 		{
 			$file_dir="fileAbstract/".$files;
 			unlink($file_dir);
 			$this->researchModel->deleteResearchGroup($research_id=$this->uri->segment(4));
 		}
 	
 		$this->session->set_flashdata('msg', '<div class="n_ok"><p>ลบข้อมูลโครงการวิจัยเรียบร้อย</p></div>');
 		redirect("research/dataResearch/".$this->uri->segment(3),"refresh");
 	}
 	
 	
 	public function datasearchResearch()
 	{	if ($this->input->post('search')==null){
 		$this->session->set_flashdata('msgSearch', '<div class="n_warning"><p>กรุณากรอกข้อมูลที่ต้องการค้นหา</p></div>');
 		redirect("research/dataResearch/".$this->uri->segment(3),"refresh");
 	
 	}else{
 		$this->researchModel->searchResearch($search=$this->input->post('search'));
 		$data['menu']="researcher/menuResearcher";
 		$data['main_content']="research/dataResearch";
 		$data['query']=$this->researchModel->searchResearch($search);//อ่านข้อมูลมาทั้งหมด
 		$this->load->view('template', $data);
 	}
 	}
 }
