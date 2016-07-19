<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class publication extends CI_Controller {
		
	public function __construct()
		{
		 parent::__construct();
		 $this->load->model('researchModel');
		 $this->load->model('publicationModel');
		}
	public function datapublication()
		{
			$config['base_url']=base_url()."publication/datapublication/".$this->uri->segment(3).'/';
			$config['total_rows']=$this->db->count_all("tb_publication where user_id=".$this->uri->segment(3));
			$config['per_page'] =10;
			$config['full_tag_open'] = "<div class='pagination'>";
			$config['full_tag_close']="</div>";
			$config['first_link'] = 'หน้าแรก';
			$config['last_link'] = 'หน้าสุดท้าย';
			$config['uri_segment'] = 4;
			$this->pagination->initialize($config);
		
			//$this->publicationModel->searchpublication($search=$this->input->post('search'));
			$data['menu']="researcher/menuResearcher";
			$data['main_content']="publication/data";
			$data['query']=$this->db->order_by('publication_name', 'asc')->get_where('tb_publication', array('user_id' => $this->uri->segment(3)),$config['per_page'],$this->uri->segment(4));
			
			//$data['query']=$this->publicationModel->searchpublication($search);//อ่านข้อมูลมาทั้งหมด
			$this->load->view('template', $data);

		}
	public function addpublication()
		{
			$id=$this->uri->segment(4);
			$data['menu']="researcher/menuResearcher";
			$data['main_content']="publication/add";
			$data['queryResearch']=$data['query']=$this->db->get_where('tb_research', array('user_id' => $this->uri->segment(3)));
 		
			$this->load->view('template', $data);
	
		}
		public function dataDetail()
		{
			$id=$this->uri->segment(4);
			$data['menu']="researcher/menuResearcher";
			$data['main_content']="publication/detail";
			
			$data['query']=$this->publicationModel->dataDetail($id);
			$this->load->view('template', $data);
		}
	public function savenew_publication()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('research_id', 'โครงการวิจัย', 'required');
			$this->form_validation->set_rules('publication_name', 'ชื่อบทความทีได้รับการตีพิมพ์', 'required');
			$this->form_validation->set_rules('journal_name', 'ชื่อวารสารทางวิชาการ', 'required');
			$this->form_validation->set_rules('publication_link', 'ลิงค์เชื่อมโยงผลงานตีพิมพ์ ', 'valid_url');
			
		
			if ($this->form_validation->run() == FALSE) {
			$id=$this->uri->segment(4);
			$data['menu']="researcher/menuResearcher";
			$data['main_content']="publication/add";
			$data['queryResearch']=$data['query']=$this->db->get_where('tb_research', array('user_id' => $this->uri->segment(3)));
			$this->load->view('template', $data);
			}
			else {
				if ($_FILES['publication_file']['name']==null){
					$data = array(
						'publication_id' => "",
						'research_id'=> $this->input->post('research_id'),
						'publication_name' => $this->input->post('publication_name'),
						'journal_name' => $this->input->post('journal_name'),
						'publication_years' => $this->input->post('publication_years'),
						'publication_no' => $this->input->post('publication_no'),
						'publication_page' => $this->input->post('publication_page'),
						'publication_keyword'  => $this->input->post('publication_keyword'),
						'publication_type'  => $this->input->post('publication_type'),
						'ISSN_code'  => $this->input->post('ISSN_code'),
						'publication_abstract'  => $this->input->post('publication_abstract'),
						'publication_link'  => $this->input->post('publication_link'),
						'publication_file'  =>"",
						'user_id'  => $this->uri->segment(3)
					);
					
					$this->publicationModel->savenew_publication($data);
					$this->session->set_flashdata('msg', '<div class="n_ok"><p>เพิ่มข้อมูลผลงานตีพิมพ์ทางวิชาการเรียบร้อย </p></div>');
					redirect("publication/datapublication/".$this->uri->segment(3),"refresh");
				}else{		
				$config['upload_path']="filepublicationUpload/";
				$config['allowed_types']="pdf";
				$config['max_size']=10240; 
				$this->load->library('upload', $config);
                $this->upload->initialize($config);
				if ( ! $this->upload->do_upload('publication_file'))
				{
											$this->session->set_flashdata('msg', '<div class="n_warning">'.$this->upload->display_errors().'</div>');
						redirect("publication/add/".$this->uri->segment(3),"refresh");
			
				}
				else
				{
					$file_data = $this->upload->data('publication_file');
					$data = array(
							'publication_id' => "",
						'research_id'=> $this->input->post('research_id'),
						'publication_name' => $this->input->post('publication_name'),
						'journal_name' => $this->input->post('journal_name'),
						'publication_years' => $this->input->post('publication_years'),
						'publication_no' => $this->input->post('publication_no'),
						'publication_page' => $this->input->post('publication_page'),
						'publication_keyword'  => $this->input->post('publication_keyword'),
						'ISSN_code'  => $this->input->post('ISSN_code'),
						'publication_abstract'  => $this->input->post('publication_abstract'),
						'publication_link'  => $this->input->post('publication_link'),
						'publication_file' =>$file_data['file_name'],
						'user_id'  => $this->uri->segment(3)
						
					);

				$this->publicationModel->savenew_publication($data);
					$this->session->set_flashdata('msg', '<div class="n_ok"><p>เพิ่มข้อมูลผลงานตีพิมพ์ทางวิชาการเรียบร้อย</p></div>');
					redirect("publication/datapublication/".$this->uri->segment(3),"refresh");
					}
					
				}
			
				}
		
			}

	public function editpublication()

		{
			$id=$this->uri->segment(4);
			$sql="Select* from tb_publication where publication_id=$id";
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
			$data['main_content']="publication/edit";
			$this->load->view('template', $data);
		
		}
	public function update_publication()
		{
			$id=$this->uri->segment(4);
			if ($_FILES['publication_file']['name']==null){
					$data = array(
						'publication_id' => $this->uri->segment(4),
						'research_id'=> $this->input->post('research_id'),
						'publication_name' => $this->input->post('publication_name'),
						'journal_name' => $this->input->post('journal_name'),
						'publication_years' => $this->input->post('publication_years'),
						'publication_no' => $this->input->post('publication_no'),
						'publication_page' => $this->input->post('publication_page'),
						'publication_keyword'  => $this->input->post('publication_keyword'),
						'ISSN_code'  => $this->input->post('ISSN_code'),
						'publication_abstract'  => $this->input->post('publication_abstract'),
						'publication_link'  => $this->input->post('publication_link'),
						'user_id'  => $this->uri->segment(3)
					);
					$this->db->where("publication_id",$id);
					$this->db->update("tb_publication",$data);
					$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลผลงานตีพิมพ์ทางวิชาการ</p></div>');
					redirect("publication/datapublication/".$this->uri->segment(3),"refresh");
				}else{		
				$config['upload_path']="filepublicationUpload/";
				$config['allowed_types']="pdf";
				$config['max_size']=10240; 
				$this->load->library('upload', $config);
                $this->upload->initialize($config);
				if ( ! $this->upload->do_upload('publication_file'))
				{
					$this->session->set_flashdata('msg', '<div class="n_warning">'.$this->upload->display_errors().'</div>');
						redirect("publication/editpublication/".$this->uri->segment(3).'/'.$this->uri->segment(4),"refresh");
			
				}
				else
				{
					$file_data = $this->upload->data('publication_file');
					$data = array(
						'publication_id' => $this->uri->segment(4),
						'research_id'=> $this->input->post('research_id'),
						'publication_name' => $this->input->post('publication_name'),
						'journal_name' => $this->input->post('publication_meeting'),
						'publication_years' => $this->input->post('journal_name'),
						'publication_no' => $this->input->post('publication_no'),
						'publication_page' => $this->input->post('publication_page'),
						'publication_keyword'  => $this->input->post('publication_keyword'),
						'ISSN_code'  => $this->input->post('ISSN_code'),
						'publication_abstract'  => $this->input->post('publication_abstract'),
						'publication_link'  => $this->input->post('publication_link'),
						'publication_file' =>$file_data['file_name'],
						'user_id'  => $this->uri->segment(3)

					);
					$this->db->where("publication_id",$id);
					$this->db->update("tb_publication",$data);
					$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลผลงานตีพิมพ์ทางวิชาการ</p></div>');
					redirect("publication/datapublication/".$this->uri->segment(3),"refresh");
		}
				}
		}
	public function deletepublication(){
			$id=$this->uri->segment(4);
			$sql="Select publication_file from tb_publication where publication_id=$id";
			$query = $this->db->query($sql);
			$query=$query->row_array();
			$files=$query['publication_file'];
			if ($files==null)
			{
				$this->publicationModel->deletepublication($publication_id=$this->uri->segment(4));
			}
			else
			{
				$file_dir="filepublicationUpload/".$files;
				unlink($file_dir);
				$this->publicationModel->deletepublication($publication_id=$this->uri->segment(4));
			}
			$this->session->set_flashdata('msg', '<div class="n_ok"><p>ลบข้อมูลผลงานตีพิมพ์ทางวิชาการ</p></div>');
			redirect("publication/datapublication/".$this->uri->segment(3),"refresh");
		}
		public function datasearchpublication()
		{	if ($this->input->post('search')==null){
			$this->session->set_flashdata('msgSearch', '<div class="n_warning"><p>กรุณากรอกข้อมูลที่ต้องการค้นหา</p></div>');
			redirect("publication/datapublication/".$this->uri->segment(3),"refresh");
		
		}else{
			$this->publicationModel->searchpublication($search=$this->input->post('search'));
			$data['menu']="researcher/menuResearcher";
			$data['main_content']="publication/data";
			$data['query']=$this->publicationModel->searchpublication($search);//อ่านข้อมูลมาทั้งหมด
			$this->load->view('template', $data);
		}
		}
}