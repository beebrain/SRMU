<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class researchAward extends CI_Controller {
		
	public function __construct()
		{
		 parent::__construct();
		 $this->load->model('researchModel');
		 $this->load->model('researchAwardModel');
		}
	public function dataresearchAward()
		{
			$config['base_url']=base_url()."researchAward/dataresearchAward/".$this->uri->segment(3).'/';
			$config['total_rows']=$this->db->count_all("tb_research_award where user_id=".$this->uri->segment(3));
			$config['per_page'] =10;
			$config['full_tag_open'] = "<div class='pagination'>";
			$config['full_tag_close']="</div>";
			$config['first_link'] = 'หน้าแรก';
			$config['last_link'] = 'หน้าสุดท้าย';
			$config['uri_segment'] = 4;
			$this->pagination->initialize($config);
		
			//$this->researchAwardModel->searchresearchAward($search=$this->input->post('search'));
			$data['menu']="researcher/menuResearcher";
			$data['main_content']="researchAward/data";
			$data['query']=$this->db->order_by('researchAward_name', 'asc')->get_where('tb_research_award', array('user_id' => $this->uri->segment(3)),$config['per_page'],$this->uri->segment(4));
			
			//$data['query']=$this->researchAwardModel->searchresearchAward($search);//อ่านข้อมูลมาทั้งหมด
			$this->load->view('template', $data);

		}
	public function addresearchAward()
		{
			$id=$this->uri->segment(4);
			$data['menu']="researcher/menuResearcher";
			$data['main_content']="researchAward/add";
			$data['queryResearch']=$data['query']=$this->db->get_where('tb_research', array('user_id' => $this->uri->segment(3)));
 		
			$this->load->view('template', $data);
	
		}
		public function dataDetail()
		{
			$id=$this->uri->segment(4);
			$data['menu']="researcher/menuResearcher";
			$data['main_content']="researchAward/detail";
			
			$data['query']=$this->researchAwardModel->dataDetail($id);
			$this->load->view('template', $data);
		}
	public function savenew_researchAward()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('research_id', 'โครงการวิจัย', 'required');
			$this->form_validation->set_rules('researchAward_name', 'ชื่อรางวัลผลงานโครงการวิจัย', 'required');
			$this->form_validation->set_rules('researchAward_meeting', 'ชื่อการประชุมทางวิชาการ', 'required');
			$this->form_validation->set_rules('researchAward_agencies', 'หน่วยงานที่มอบรางวัล', 'required');
		
			if ($this->form_validation->run() == FALSE) {
			$id=$this->uri->segment(4);
			$data['menu']="researcher/menuResearcher";
			$data['main_content']="researchAward/add";
			$data['queryResearch']=$data['query']=$this->db->get_where('tb_research', array('user_id' => $this->uri->segment(3)));
			$this->load->view('template', $data);
			}
			else {
				if ($_FILES['researchAward_file']['name']==null){
					$data = array(
						'researchAward_id' => "",
						'research_id'=> $this->input->post('research_id'),
						'researchAward_name' => $this->input->post('researchAward_name'),
						'researchAward_meeting' => $this->input->post('researchAward_meeting'),
						'researchAward_branch' => $this->input->post('researchAward_branch'),
						'researchAward_detail'  => $this->input->post('researchAward_detail'),
						'researchAward_agencies'  => $this->input->post('researchAward_agencies'),
						'researchAward_date'  => $this->input->post('researchAward_date'),
						'researchAward_file'  =>"",
						'user_id'  => $this->uri->segment(3)
					);
					
					$this->researchAwardModel->savenew_researchAward($data);
					$this->session->set_flashdata('msg', '<div class="n_ok"><p>เพิ่มข้อมูลรางวัลโครงการวิจัยเรียบร้อย </p></div>');
					redirect("researchAward/dataresearchAward/".$this->uri->segment(3),"refresh");
				}else{		
				$config['upload_path']="fileresearchAwardUpload/";
				$config['allowed_types']="pdf";
				$config['max_size']=10240; 
				$this->load->library('upload', $config);
                $this->upload->initialize($config);
				if ( ! $this->upload->do_upload('researchAward_file'))
				{
					$this->session->set_flashdata('msg', '<div class="n_warning">'.$this->upload->display_errors().'</div>');
						redirect("researchAward/add/".$this->uri->segment(3),"refresh");
			
				}
				else
				{
					$file_data = $this->upload->data('researchAward_file');
					$data = array(
							'researchAward_id' => "",
							'research_id'=>$this->input->post('research_id'),
							'researchAward_name' => $this->input->post('researchAward_name'),
							'researchAward_meeting' => $this->input->post('researchAward_meeting'),
							'researchAward_branch' => $this->input->post('researchAward_branch'),
							'researchAward_detail'  => $this->input->post('researchAward_detail'),
							'researchAward_agencies'  => $this->input->post('researchAward_agencies'),
							'researchAward_date'  => $this->input->post('researchAward_date'),
							'researchAward_file' =>$file_data['file_name'],
							'user_id'  => $this->uri->segment(3)
						
					);

				$this->researchAwardModel->savenew_researchAward($data);
					$this->session->set_flashdata('msg', '<div class="n_ok"><p>เพิ่มข้อมูลรางวัลโครงการวิจัยเรียบร้อย</p></div>');
					redirect("researchAward/dataresearchAward/".$this->uri->segment(3),"refresh");
					}
					
				}
			
				}
		
			}

	public function editresearchAward()

		{
			$id=$this->uri->segment(4);
			$sql="Select* from tb_research_award where researchAward_id=$id";
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
			$data['queryResearch']=$data['query']=$this->db->get_where('tb_research', array('user_id' => $this->uri->segment(3)));
			$data['main_content']="researchAward/edit";
			$this->load->view('template', $data);
		
		}
	public function update_researchAward()
		{
			$id=$this->uri->segment(4);
			if ($_FILES['file_researchAward']['name']==null){
					$data = array(
						'researchAward_id' =>  $this->uri->segment(4),
						'research_id'=> $this->input->post('research_id'),
						'researchAward_name' => $this->input->post('researchAward_name'),
						'researchAward_meeting' => $this->input->post('researchAward_meeting'),
						'researchAward_branch' => $this->input->post('researchAward_branch'),
						'researchAward_detail'  => $this->input->post('researchAward_detail'),
						'researchAward_agencies'  => $this->input->post('researchAward_agencies'),
						'researchAward_date'  => $this->input->post('researchAward_date'),
						'user_id'  => $this->uri->segment(3)
					);
					$this->db->where("researchAward_id",$id);
					$this->db->update("tb_research_award",$data);
					$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลรางวัลโครงการวิจัย</p></div>');
					redirect("researchAward/dataresearchAward/".$this->uri->segment(3),"refresh");
				}else{		
				$config['upload_path']="fileresearchAwardUpload/";
				$config['allowed_types']="pdf";
				$config['max_size']=10240; 
				$this->load->library('upload', $config);
                $this->upload->initialize($config);
				if ( ! $this->upload->do_upload('file_researchAward'))
				{
					$this->session->set_flashdata('msg', '<div class="n_warning">'.$this->upload->display_errors().'</div>');
						redirect("researchAward/editresearchAward/".$this->uri->segment(3).'/'.$this->uri->segment(4),"refresh");
			
				}
				else
				{
					$file_data = $this->upload->data('file_researchAward');
					$data = array(
							'researchAward_id' => $this->uri->segment(4),
							'research_id'=>$this->input->post('research_id'),
							'researchAward_name' => $this->input->post('researchAward_name'),
							'researchAward_meeting' => $this->input->post('researchAward_meeting'),
							'researchAward_branch' => $this->input->post('researchAward_branch'),
							'researchAward_detail'  => $this->input->post('researchAward_detail'),
							'researchAward_agencies'  => $this->input->post('researchAward_agencies'),
							'researchAward_date'  => $this->input->post('researchAward_date'),
							'researchAward_file' =>$file_data['file_name'],
							'user_id'  => $this->uri->segment(3)

					);
					$this->db->where("researchAward_id",$id);
					$this->db->update("tb_research_award",$data);
					$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลรางวัลโครงการวิจัย</p></div>');
					redirect("researchAward/dataresearchAward/".$this->uri->segment(3),"refresh");
		}
				}
		}
	public function deleteresearchAward(){
			$id=$this->uri->segment(4);
			$sql="Select researchAward_file from tb_research_award where researchAward_id=$id";
			$query = $this->db->query($sql);
			$query=$query->row_array();
			$files=$query['researchAward_file'];
			if ($files==null)
			{
				$this->researchAwardModel->deleteresearchAward($researchAward_id=$this->uri->segment(4));
			}
			else
			{
				$file_dir="fileresearchAwardUpload/".$files;
				unlink($file_dir);
				$this->researchAwardModel->deleteresearchAward($researchAward_id=$this->uri->segment(4));
			}
			$this->session->set_flashdata('msg', '<div class="n_ok"><p>ลบข้อมูลรางวัลโครงการวิจัย</p></div>');
			redirect("researchAward/dataresearchAward/".$this->uri->segment(3),"refresh");
		}
		public function dataSearchRsearchAward()
		{	if ($this->input->post('search')==null){
			$this->session->set_flashdata('msgSearch', '<div class="n_warning"><p>กรุณากรอกข้อมูลที่ต้องการค้นหา</p></div>');
			redirect("researchAward/dataresearchAward/".$this->uri->segment(3),"refresh");
		
		}else{
			$this->researchAwardModel->searchresearchAward($search=$this->input->post('search'));
			$data['menu']="researcher/menuResearcher";
			$data['main_content']="researchAward/data";
			$data['query']=$this->researchAwardModel->searchresearchAward($search);//อ่านข้อมูลมาทั้งหมด
			$this->load->view('template', $data);
		}
		}
}