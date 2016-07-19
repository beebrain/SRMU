<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class researcherAward extends CI_Controller {
		
	public function __construct()
		{
		 parent::__construct();
		 $this->load->model('researcherAwardModel');
		}
	public function dataResearcherAward()
		{
			$config['base_url']=base_url()."researcherAward/dataResearcherAward/".$this->uri->segment(3).'/';
			$config['total_rows']=$this->db->count_all("tb_researcher_award where user_id=".$this->uri->segment(3));
			$config['per_page'] =10;
			$config['full_tag_open'] = "<div class='pagination'>";
			$config['full_tag_close']="</div>";
			$config['first_link'] = 'หน้าแรก';
			$config['last_link'] = 'หน้าสุดท้าย';
			$config['uri_segment'] = 4;
			$this->pagination->initialize($config);
		
			$this->researcherAwardModel->searchResearcherAward($search=$this->input->post('search'));
			$data['menu']="researcher/menuResearcher";
			$data['main_content']="researcherAward/data";
			$data['query']=$this->db->order_by('researcherAward_name', 'asc')->get_where('tb_researcher_award', array('user_id' => $this->uri->segment(3)),$config['per_page'],$this->uri->segment(4));
			
			//$data['query']=$this->researcherAwardModel->searchResearcherAward($search);//อ่านข้อมูลมาทั้งหมด
			$this->load->view('template', $data);

		}
	public function addResearcherAward()
		{
			$data['menu']="researcher/menuResearcher";
			$data['main_content']="researcherAward/add";
			$this->load->view('template', $data);
	
		}
		public function dataDetail()
		{
			$id=$this->uri->segment(4);
			$data['menu']="researcher/menuResearcher";
			$data['main_content']="researcherAward/detail";
			$data['query']=$this->researcherAwardModel->dataDetail($id);
			$this->load->view('template', $data);
		}
public function savenew_ResearcherAward()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('researcherAward_name_value', 'ชื่อรางวัลที่ได้รับ', 'trim|required|xss_clean');
			$this->form_validation->set_rules('researcherAward_meeting_value', 'ชื่อการประชุมทางวิชาการ', 'required');
			$this->form_validation->set_rules('researcherAward_agencies_value', 'หน่วยงานที่มอบรางวัล', 'required');
		
			if ($this->form_validation->run() == FALSE) {

				$data['menu']="researcher/menuResearcher";
				$data['main_content']="researcherAward/add";
				$this->load->view('template', $data);
			}
			else {
				if ($_FILES['researcherAward_file']['name']==null){
					$data = array(
						'researcherAward_id' => "",
						'researcherAward_name' => $this->input->post('researcherAward_name_value'),
						'researcherAward_meeting' => $this->input->post('researcherAward_meeting_value'),
						'researcherAward_branch' => $this->input->post('researcherAward_branch_value'),
						'researcherAward_detail'  => $this->input->post('researcherAward_detail_value'),
						'researcherAward_agencies'  => $this->input->post('researcherAward_agencies_value'),
						'researcherAward_date'  => $this->input->post('researcherAward_date_value'),
						'researcherAward_file'  =>"",
						'user_id'  => $this->uri->segment(3)
					);
					
					$this->researcherAwardModel->savenew_ResearcherAward($data);
				$this->session->set_flashdata('msg', '<div class="n_ok"><p>เพิ่มข้อมูลรางวัลผลงานผู้วิจัยเรียบร้อย </p></div>');
					redirect("researcherAward/dataResearcherAward/".$this->uri->segment(3),"refresh");
				}else{		
				$config['upload_path']="fileResearcherAwardUpload/";
				$config['allowed_types']="pdf";
				$config['max_size']=10240; 
				$this->load->library('upload', $config);
                $this->upload->initialize($config);
				if ( ! $this->upload->do_upload('researcherAward_file'))
				{
					$this->session->set_flashdata('msg', '<div class="n_warning">'.$this->upload->display_errors().'</div>');
						redirect("researcherAward/add/".$this->uri->segment(3),"refresh");
			
				}
				else
				{
					$file_data = $this->upload->data('researcherAward_file');
					$data = array(
							'researcherAward_id' => "",
							'researcherAward_name' => $this->input->post('researcherAward_name_value'),
							'researcherAward_meeting' => $this->input->post('researcherAward_meeting_value'),
							'researcherAward_branch' => $this->input->post('researcherAward_branch_value'),
							'researcherAward_detail'  => $this->input->post('researcherAward_detail_value'),
							'researcherAward_agencies'  => $this->input->post('researcherAward_agencies_value'),
							'researcherAward_date'  => $this->input->post('researcherAward_date_value'),
							'researcherAward_file' =>$file_data['file_name'],
							'user_id'  => $this->uri->segment(3)
						
					);

					$this->researcherAwardModel->savenew_ResearcherAward($data);
					$this->session->set_flashdata('msg', '<div class="n_ok"><p>เพิ่มข้อมูลรางวัลผลงานผู้วิจัยเรียบร้อย</p></div>');
					redirect("researcherAward/dataResearcherAward/".$this->uri->segment(3),"refresh");
					}
					
				}
			
				}
		
			}

	public function editResearcherAward()

		{
			$id=$this->uri->segment(4);
			$sql="Select* from tb_researcher_award where researcherAward_id=$id";
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
			$data['main_content']="researcherAward/edit";
			$this->load->view('template', $data);
		
		}
	public function update_ResearcherAward()
		{
			$id=$this->uri->segment(4);
			if ($_FILES['file_researcherAward']['name']==null){
					$data = array(
						'researcherAward_id' => $this->uri->segment(4),
						'researcherAward_name' => $this->input->post('researcherAward_name_value'),
						'researcherAward_meeting' => $this->input->post('researcherAward_meeting_value'),
						'researcherAward_branch' => $this->input->post('researcherAward_branch_value'),
						'researcherAward_detail'  => $this->input->post('researcherAward_detail_value'),
						'researcherAward_agencies'  => $this->input->post('researcherAward_agencies_value'),
						'researcherAward_date'  => $this->input->post('researcherAward_date_value'),
						'user_id'  => $this->uri->segment(3)
						
					);
					$this->db->where("researcherAward_id",$id);
					$this->db->update("tb_researcher_award",$data);
					$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลรางวัลผลงานผู้วิจัย</p></div>');
					redirect("researcherAward/dataResearcherAward/".$this->uri->segment(3),"refresh");
				}else{		
				$config['upload_path']="fileresearcherAwardUpload/";
				$config['allowed_types']="pdf";
				$config['max_size']=10240; 
				$this->load->library('upload', $config);
                $this->upload->initialize($config);
				if ( ! $this->upload->do_upload('file_researcherAward'))
				{
					$this->session->set_flashdata('msg', '<div class="n_warning">'.$this->upload->display_errors().'</div>');
						redirect("researcherAward/editResearcherAward/".$this->uri->segment(3).'/'.$this->uri->segment(4),"refresh");
			
				}
				else
				{
					$file_data = $this->upload->data('file_researcherAward');
					$data = array(
							'researcherAward_id' =>$this->uri->segment(4),
							'researcherAward_name' => $this->input->post('researcherAward_name_value'),
							'researcherAward_meeting' => $this->input->post('researcherAward_meeting_value'),
							'researcherAward_branch' => $this->input->post('researcherAward_branch_value'),
							'researcherAward_detail'  => $this->input->post('researcherAward_detail_value'),
							'researcherAward_agencies'  => $this->input->post('researcherAward_agencies_value'),
							'researcherAward_date'  => $this->input->post('researcherAward_date_value'),
							'researcherAward_file' =>$file_data['file_name'],
							'user_id'  => $this->uri->segment(3)
					);
					$this->db->where("researcherAward_id",$id);
					$this->db->update("tb_researcher_award",$data);
					$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลรางวัลผลงานผู้วิจัย</p></div>');
					redirect("researcherAward/dataResearcherAward/".$this->uri->segment(3),"refresh");
		}
				}
		}
	public function deleteResearcherAward(){
			$id=$this->uri->segment(4);
			$sql="Select researcherAward_file from tb_researcher_award where researcherAward_id=$id";
			$query = $this->db->query($sql);
			$query=$query->row_array();
			$files=$query['researcherAward_file'];
			if ($files==null)
			{
				$this->researcherAwardModel->deleteResearcherAward($researcherAward_id=$this->uri->segment(4));
			}
			else
			{
				$file_dir="fileresearcherAwardUpload/".$files;
				unlink($file_dir);
				$this->researcherAwardModel->deleteResearcherAward($researcherAward_id=$this->uri->segment(4));
			}
			$this->session->set_flashdata('msg', '<div class="n_ok"><p>ลบข้อมูลรางวัลผลงานผู้วิจัย</p></div>');
			redirect("researcherAward/dataResearcherAward/".$this->uri->segment(3),"refresh");
		}
		public function datasearchResearcherAward()
		{	if ($this->input->post('search')==null){
			$this->session->set_flashdata('msgSearch', '<div class="n_warning"><p>กรุณากรอกข้อมูลที่ต้องการค้นหา</p></div>');
			redirect("researcherAward/dataResearcherAward/".$this->uri->segment(3),"refresh");
		
		}else{
			$this->researcherAwardModel->searchResearcherAward($search=$this->input->post('search'));
			$data['menu']="researcher/menuResearcher";
			$data['main_content']="researcherAward/dataResearcherAward";
			$data['query']=$this->researcherAwardModel->searchResearcherAward($search);//อ่านข้อมูลมาทั้งหมด
			$this->load->view('template', $data);
		}
		}
}