<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class partent extends CI_Controller {
		
	public function __construct()
		{
		 parent::__construct();
		 $this->load->model('researchModel');
		 $this->load->model('partentModel');
		}
	public function datapartent()
		{
			$config['base_url']=base_url()."partent/datapartent/".$this->uri->segment(3).'/';
			$config['total_rows']=$this->db->count_all("tb_partent where user_id=".$this->uri->segment(3));
			$config['per_page'] =10;
			$config['full_tag_open'] = "<div class='pagination'>";
			$config['full_tag_close']="</div>";
			$config['first_link'] = 'หน้าแรก';
			$config['last_link'] = 'หน้าสุดท้าย';
			$config['uri_segment'] = 4;
			$this->pagination->initialize($config);
		
			//$this->partentModel->searchpartent($search=$this->input->post('search'));
			$data['menu']="researcher/menuResearcher";
			$data['main_content']="partent/data";
			$data['query']=$this->db->get_where('tb_partent', array('user_id' => $this->uri->segment(3)),$config['per_page'],$this->uri->segment(4));
			
			//$data['query']=$this->partentModel->searchpartent($search);//อ่านข้อมูลมาทั้งหมด
			$this->load->view('template', $data);

		}
	public function addpartent()
		{
			$id=$this->uri->segment(4);
			$data['menu']="researcher/menuResearcher";
			$data['main_content']="partent/add";
			$data['queryResearch']=$data['query']=$this->db->get_where('tb_research', array('user_id' => $this->uri->segment(3)));
 		
			$this->load->view('template', $data);
	
		}
		public function dataDetail()
		{
			$id=$this->uri->segment(4);
			$data['menu']="researcher/menuResearcher";
			$data['main_content']="partent/detail";
			
			$data['query']=$this->partentModel->dataDetail($id);
			$this->load->view('template', $data);
		}
	public function savenew_partent()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('research_id', 'โครงการวิจัย', 'required');
			$this->form_validation->set_rules('partent_name', 'ชื่อบทความทีได้รับการตีพิมพ์', 'required');
			$this->form_validation->set_rules('partent_type', 'ชื่อวารสารทางวิชาการ', 'required');
			$this->form_validation->set_rules('partent_agencies', 'หน่วยงานที่ดำเนินการขอความคุ้มครองทรัพย์สินทางปัญญา', 'required');
			
		
			if ($this->form_validation->run() == FALSE) {
			$id=$this->uri->segment(4);
			$data['menu']="researcher/menuResearcher";
			$data['main_content']="partent/add";
			$data['queryResearch']=$data['query']=$this->db->get_where('tb_research', array('user_id' => $this->uri->segment(3)));
			$this->load->view('template', $data);
			}
			else {
				if ($_FILES['partent_file']['name']==null){
					$data = array(
						'partent_id' => "",
						'research_id'=> $this->input->post('research_id'),
						'partent_name' => $this->input->post('partent_name'),
						'partent_type'  => $this->input->post('partent_type'),
						'partent_no'  => $this->input->post('partent_no'),
						'partent_agencies'  => $this->input->post('partent_agencies'),
						'partent_date'  => $this->input->post('partent_date'),
						'partent_file'  =>"",
						'user_id'  => $this->uri->segment(3)
					);
					
					$this->partentModel->savenew_partent($data);
					$this->session->set_flashdata('msg', '<div class="n_ok"><p>เพิ่มข้อมูลผลงานตีพิมพ์ทางวิชาการเรียบร้อย </p></div>');
					redirect("partent/datapartent/".$this->uri->segment(3),"refresh");
				}else{		
				$config['upload_path']="filepartentUpload/";
				$config['allowed_types']="pdf";
				$config['max_size']=10240; 
				$this->load->library('upload', $config);
                $this->upload->initialize($config);
				if ( ! $this->upload->do_upload('partent_file'))
				{
						$this->session->set_flashdata('msg', '<div class="n_warning"><p>กรุณาตรวจสอบชนิดและขนาดของไฟล์ที่อนุญาติให้ทำการอัพโหลด</p></div>');
						redirect("partent/add/".$this->uri->segment(3),"refresh");
			
				}
				else
				{
					$file_data = $this->upload->data('partent_file');
					$data = array(
						'partent_id' => "",
						'research_id'=> $this->input->post('research_id'),
						'partent_name' => $this->input->post('partent_name'),
						'partent_type'  => $this->input->post('partent_type'),
						'partent_no'  => $this->input->post('partent_no'),
						'partent_agencies'  => $this->input->post('partent_agencies'),
						'partent_date'  => $this->input->post('partent_date'),
						'partent_file' =>$file_data['file_name'],
						'user_id'  => $this->uri->segment(3)
						
					);

				$this->partentModel->savenew_partent($data);
					$this->session->set_flashdata('msg', '<div class="n_ok"><p>เพิ่มข้อมูลผลงานตีพิมพ์ทางวิชาการเรียบร้อย</p></div>');
					redirect("partent/datapartent/".$this->uri->segment(3),"refresh");
					}
					
				}
			
				}
		
			}

	public function editpartent()

		{
			$id=$this->uri->segment(4);
			$sql="Select* from tb_partent where partent_id=$id";
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
			$data['main_content']="partent/edit";
			$this->load->view('template', $data);
		
		}
	public function update_partent()
		{
			$id=$this->uri->segment(4);
			if ($_FILES['file_partent']['name']==null){
					$data = array(
						'partent_id' =>$this->uri->segment(4),
						'research_id'=> $this->input->post('research_id'),
						'partent_name' => $this->input->post('partent_name'),
						'partent_type'  => $this->input->post('partent_type'),
						'partent_no'  => $this->input->post('partent_no'),
						'partent_agencies'  => $this->input->post('partent_agencies'),
						'partent_date'  => $this->input->post('partent_date'),
						'user_id'  => $this->uri->segment(3)
					);
					$this->db->where("partent_id",$id);
					$this->db->update("tb_partent",$data);
					$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลผลงานตีพิมพ์ทางวิชาการ</p></div>');
					redirect("partent/datapartent/".$this->uri->segment(3),"refresh");
				}else{		
				$config['upload_path']="filepartentUpload/";
				$config['allowed_types']="pdf";
				$config['max_size']=10240; 
				$this->load->library('upload', $config);
                $this->upload->initialize($config);
				if ( ! $this->upload->do_upload('file_partent'))
				{
						$this->session->set_flashdata('msg', '<div class="n_warning">'.$this->upload->display_errors().'</div>');
						redirect("partent/editpartent/".$this->uri->segment(3).'/'.$this->uri->segment(4),"refresh");
			
				}
				else
				{
					$file_data = $this->upload->data('file_partent');
					$data = array(
						'partent_id' =>$this->uri->segment(4),
						'research_id'=> $this->input->post('research_id'),
						'partent_name' => $this->input->post('partent_name'),
						'partent_type'  => $this->input->post('partent_type'),
						'partent_no'  => $this->input->post('partent_no'),
						'partent_agencies'  => $this->input->post('partent_agencies'),
						'partent_date'  => $this->input->post('partent_date'),
						'partent_file' =>$file_data['file_name'],
						'user_id'  => $this->uri->segment(3)

					);
					$this->db->where("partent_id",$id);
					$this->db->update("tb_partent",$data);
					$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลผลงานตีพิมพ์ทางวิชาการ</p></div>');
					redirect("partent/datapartent/".$this->uri->segment(3),"refresh");
		}
				}
		}
	public function deletepartent(){
			$id=$this->uri->segment(4);
			$sql="Select partent_file from tb_partent where partent_id=$id";
			$query = $this->db->query($sql);
			$query=$query->row_array();
			$files=$query['partent_file'];
			if ($files==null)
			{
				$this->partentModel->deletepartent($partent_id=$this->uri->segment(4));
			}
			else
			{
				$file_dir="filepartentUpload/".$files;
				unlink($file_dir);
				$this->partentModel->deletepartent($partent_id=$this->uri->segment(4));
			}
			$this->session->set_flashdata('msg', '<div class="n_ok"><p>ลบข้อมูลผลงานตีพิมพ์ทางวิชาการ</p></div>');
			redirect("partent/datapartent/".$this->uri->segment(3),"refresh");
		}
		public function datasearchpartent()
		{	if ($this->input->post('search')==null){
					$this->session->set_flashdata('msg', '<div class="n_warning">'.$this->upload->display_errors().'</div>');
			redirect("partent/datapartent/".$this->uri->segment(3),"refresh");
		
		}else{
			$this->partentModel->searchpartent($search=$this->input->post('search'));
			$data['menu']="researcher/menuResearcher";
			$data['main_content']="partent/data";
			$data['query']=$this->partentModel->searchpartent($search);//อ่านข้อมูลมาทั้งหมด
			$this->load->view('template', $data);
		}
		}
}