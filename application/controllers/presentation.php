<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class presentation extends CI_Controller {
		
	public function __construct()
		{
		 parent::__construct();
		 $this->load->model('researchModel');
		 $this->load->model('presentationModel');
		}
	public function dataPresentation()
		{
			$config['base_url']=base_url()."presentation/dataPresentation/".$this->uri->segment(3).'/';
			$config['total_rows']=$this->db->count_all("tb_presentation where user_id=".$this->uri->segment(3));
			$config['per_page'] =10;
			$config['full_tag_open'] = "<div class='pagination'>";
			$config['full_tag_close']="</div>";
			$config['first_link'] = 'หน้าแรก';
			$config['last_link'] = 'หน้าสุดท้าย';
			$config['uri_segment'] = 4;
			$this->pagination->initialize($config);
		
			//$this->presentationModel->searchpresentation($search=$this->input->post('search'));
			$data['menu']="researcher/menuResearcher";
			$data['main_content']="presentation/data";
			$data['query']=$this->db->order_by('presentation_name', 'asc')->get_where('tb_presentation', array('user_id' => $this->uri->segment(3)),$config['per_page'],$this->uri->segment(4));
			
			//$data['query']=$this->presentationModel->searchpresentation($search);//อ่านข้อมูลมาทั้งหมด
			$this->load->view('template', $data);

		}
	public function addPresentation()
		{
			$id=$this->uri->segment(4);
			$data['menu']="researcher/menuResearcher";
			$data['main_content']="presentation/add";
			$data['queryResearch']=$data['query']=$this->db->get_where('tb_research', array('user_id' => $this->uri->segment(3)));
 		
			$this->load->view('template', $data);
	
		}
		public function dataDetail()
		{
			$id=$this->uri->segment(4);
			$data['menu']="researcher/menuResearcher";
			$data['main_content']="presentation/detail";
			
			$data['query']=$this->presentationModel->dataDetail($id);
			$this->load->view('template', $data);
		}
	public function savenew_presentation()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('research_id', 'โครงการวิจัย', 'required');
			$this->form_validation->set_rules('presentation_name', 'ชื่อผลงานนำเสนอในการประชุมวิชาการ', 'required');
			$this->form_validation->set_rules('presentation_meeting', 'ชื่อการประชุมทางวิชาการ', 'required');
			$this->form_validation->set_rules('location_name', 'สถานที่นำเสนอ ', 'required');
			$this->form_validation->set_rules('country_name', 'ประเทศที่นำเสนอ', 'required');
			
		
			if ($this->form_validation->run() == FALSE) {
			$id=$this->uri->segment(4);
			$data['menu']="researcher/menuResearcher";
			$data['main_content']="presentation/add";
			$data['queryResearch']=$data['query']=$this->db->get_where('tb_research', array('user_id' => $this->uri->segment(3)));
			$this->load->view('template', $data);
			}
			else {
				if ($_FILES['presentation_file']['name']==null){
					$data = array(
						'presentation_id' => "",
						'research_id'=> $this->input->post('research_id'),
						'presentation_name' => $this->input->post('presentation_name'),
						'presentation_meeting' => $this->input->post('presentation_meeting'),
						'presentation_type' => $this->input->post('presentation_type'),
						'presentation_kind' => $this->input->post('presentation_kind'),
						'location_name' => $this->input->post('location_name'),
						'country_name'  => $this->input->post('country_name'),
						'presentation_date'  => $this->input->post('presentation_date'),
						'presentation_file'  =>"",
						'user_id'  => $this->uri->segment(3)
					);
					
					$this->presentationModel->savenew_presentation($data);
					$this->session->set_flashdata('msg', '<div class="n_ok"><p>เพิ่มข้อมูลรางวัลโครงการวิจัยเรียบร้อย </p></div>');
					redirect("presentation/dataPresentation/".$this->uri->segment(3),"refresh");
				}else{		
				$config['upload_path']="filepresentationUpload/";
				$config['allowed_types']="pdf";
				$config['max_size']=10240; 
				$this->load->library('upload', $config);
                $this->upload->initialize($config);
				if ( ! $this->upload->do_upload('presentation_file'))
				{
											$this->session->set_flashdata('msg', '<div class="n_warning">'.$this->upload->display_errors().'</div>');
						redirect("presentation/add/".$this->uri->segment(3),"refresh");
			
				}
				else
				{
					$file_data = $this->upload->data('presentation_file');
					$data = array(
						'presentation_id' => "",
						'research_id'=> $this->input->post('research_id'),
						'presentation_name' => $this->input->post('presentation_name'),
						'presentation_meeting' => $this->input->post('presentation_meeting'),
						'presentation_type' => $this->input->post('presentation_type'),
						'presentation_kind' => $this->input->post('presentation_kind'),
						'location_name' => $this->input->post('location_name'),
						'country_name'  => $this->input->post('country_name'),
						'presentation_date'  => $this->input->post('presentation_date'),
						'presentation_file' =>$file_data['file_name'],
						'user_id'  => $this->uri->segment(3)
						
					);

				$this->presentationModel->savenew_presentation($data);
					$this->session->set_flashdata('msg', '<div class="n_ok"><p>เพิ่มข้อมูลรางวัลโครงการวิจัยเรียบร้อย</p></div>');
					redirect("presentation/dataPresentation/".$this->uri->segment(3),"refresh");
					}
					
				}
			
				}
		
			}

	public function editPresentation()

		{
			$id=$this->uri->segment(4);
			$sql="Select* from tb_presentation where presentation_id=$id";
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
			$data['main_content']="presentation/edit";
			$this->load->view('template', $data);
		
		}
	public function update_presentation()
		{
			$id=$this->uri->segment(4);
			if ($_FILES['file_presentation']['name']==null){
					$data = array(
						'presentation_id' => $this->uri->segment(4),
						'research_id'=> $this->input->post('research_id'),
						'presentation_name' => $this->input->post('presentation_name'),
						'presentation_meeting' => $this->input->post('presentation_meeting'),
						'presentation_type' => $this->input->post('presentation_type'),
						'presentation_kind' => $this->input->post('presentation_kind'),
						'location_name' => $this->input->post('location_name'),
						'country_name'  => $this->input->post('country_name'),
						'presentation_date'  => $this->input->post('presentation_date'),
						'user_id'  => $this->uri->segment(3)
					);
					$this->db->where("presentation_id",$id);
					$this->db->update("tb_presentation",$data);
					$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลรางวัลโครงการวิจัย</p></div>');
					redirect("presentation/dataPresentation/".$this->uri->segment(3),"refresh");
				}else{		
				$config['upload_path']="filepresentationUpload/";
				$config['allowed_types']="pdf";
				$config['max_size']=10240; 
				$this->load->library('upload', $config);
                $this->upload->initialize($config);
				if ( ! $this->upload->do_upload('file_presentation'))
				{
					$this->session->set_flashdata('msg', '<div class="n_warning">'.$this->upload->display_errors().'</div>');
						redirect("presentation/editpresentation/".$this->uri->segment(3).'/'.$this->uri->segment(4),"refresh");
			
				}
				else
				{
					$file_data = $this->upload->data('file_presentation');
					$data = array(
						'presentation_id' => $this->uri->segment(4),
						'research_id'=> $this->input->post('research_id'),
						'presentation_name' => $this->input->post('presentation_name'),
						'presentation_meeting' => $this->input->post('presentation_meeting'),
						'presentation_type' => $this->input->post('presentation_type'),
						'presentation_kind' => $this->input->post('presentation_kind'),
						'location_name' => $this->input->post('location_name'),
						'country_name'  => $this->input->post('country_name'),
						'presentation_date'  => $this->input->post('presentation_date'),
						'presentation_file' =>$file_data['file_name'],
						'user_id'  => $this->uri->segment(3)

					);
					$this->db->where("presentation_id",$id);
					$this->db->update("tb_presentation",$data);
					$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลรางวัลโครงการวิจัย</p></div>');
					redirect("presentation/dataPresentation/".$this->uri->segment(3),"refresh");
		}
				}
		}
	public function deletePresentation(){
			$id=$this->uri->segment(4);
			$sql="Select presentation_file from tb_presentation where presentation_id=$id";
			$query = $this->db->query($sql);
			$query=$query->row_array();
			$files=$query['presentation_file'];
			if ($files==null)
			{
				$this->presentationModel->deletepresentation($presentation_id=$this->uri->segment(4));
			}
			else
			{
				$file_dir="filepresentationUpload/".$files;
				unlink($file_dir);
				$this->presentationModel->deletepresentation($presentation_id=$this->uri->segment(4));
			}
			$this->session->set_flashdata('msg', '<div class="n_ok"><p>ลบข้อมูลรางวัลโครงการวิจัย</p></div>');
			redirect("presentation/dataPresentation/".$this->uri->segment(3),"refresh");
		}
		public function datasearchPresentation()
		{	if ($this->input->post('search')==null){
			$this->session->set_flashdata('msgSearch', '<div class="n_warning"><p>กรุณากรอกข้อมูลที่ต้องการค้นหา</p></div>');
			redirect("presentation/dataPresentation/".$this->uri->segment(3),"refresh");
		
		}else{
			$this->presentationModel->searchPresentation($search=$this->input->post('search'));
			$data['menu']="researcher/menuResearcher";
			$data['main_content']="presentation/data";
			$data['query']=$this->presentationModel->searchPresentation($search);//อ่านข้อมูลมาทั้งหมด
			$this->load->view('template', $data);
		}
		}
}