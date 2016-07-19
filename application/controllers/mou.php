<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mou extends CI_Controller {
		
	public function __construct()
		{
		 parent::__construct();
		 $this->load->model('mouModel');
		
		}
	public function dataMou()
		{
			$config['base_url']=base_url()."mou/dataMou/".$this->uri->segment(3).'/';
			$config['total_rows']=$this->db->count_all("tb_mou");
					$config['per_page'] =10;
		$config['first_link'] = 'หน้าแรก';
		$config['last_link'] = 'หน้าสุดท้าย';
		$config['full_tag_open'] = "<div class='pagination'>";
		$config['full_tag_close']="</div>";
		$config['uri_segment'] = 4;
		
			$this->pagination->initialize($config);
		
			$this->mouModel->searchMou($search=$this->input->post('search'));
			$data['menu']="staff/menustaff";
			$data['main_content']="mou/dataMou";
			$data['query']=$this->db->order_by('mou_name', 'asc')->get('tb_mou',$config['per_page'],$this->uri->segment(4));
			
			$this->load->view('template', $data);
		
		}
	public function addMou()
		{
			$data['menu']="staff/menuStaff";
			$data['main_content']="mou/addMou";
			$this->load->view('template', $data);
		}
		public function dataDetail()
		{
			$id=$this->uri->segment(4);
			$data['menu']="staff/menuStaff";
			$data['main_content']="mou/dataDetail";
			$data['query']=$this->mouModel->dataDetail($id);
			$this->load->view('template', $data);
		}
	public function savenew_Mou()
	{
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('mou_name_value', 'ชื่อบันทึกความร่วมมือด้านการวิจัย', 'trim|required|xss_clean');
			$this->form_validation->set_rules('mou_agencies_value', 'ชื่อหน่วยงานความร่วมมือด้านการวิจัย', 'required');
			if ($this->form_validation->run() == FALSE) {
		
				$data['menu']="staff/menuStaff";
				$data['main_content']="mou/addMou";
				$this->load->view('template', $data);
			}
			else {
				if ($_FILES['file_mou']['name']==null){
						$data = array(
								'mou_id' => "",
								'mou_name' => $this->input->post('mou_name_value'),
								'mou_detail' => $this->input->post('mou_detail_value'),
								'mou_agencies' => $this->input->post('mou_agencies_value'),
								'mou_file'  => ""
						);
						$this->mouModel->savenew_Mou($data);
						$this->session->set_flashdata('msg', '<div class="n_ok"><p>เพิ่มข้อมูลข่าวสารเรียบร้อย </p></div>');
						redirect("mou/dataMou/".$this->uri->segment(3),"refresh");
					}else{
						$config['upload_path']="fileMouUpload/";
						$config['allowed_types']="pdf";
						$config['max_size']=10240;
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						if ( ! $this->upload->do_upload('file_mou'))
						{
							$this->session->set_flashdata('msg', '<div class="n_warning">'.$this->upload->display_errors().'</div>');
							redirect("mou/dataMou/".$this->uri->segment(3),"refresh");
								
						}
						else
						{
							$file_data = $this->upload->data('file_mou');
							$data = array(
									'mou_id' => "",
									'mou_name' => $this->input->post('mou_name_value'),
									'mou_detail' => $this->input->post('mou_detail_value'),
									'mou_agencies' => $this->input->post('mou_agencies_value'),
									'mou_file' =>$file_data['file_name']
							);
							$this->mouModel->savenew_Mou($data);
							$this->session->set_flashdata('msg', '<div class="n_ok"><p>เพิ่มข้อมูลข่าวสารเรียบร้อย </p></div>');
							redirect("mou/dataMou/".$this->uri->segment(3),"refresh");
						}
							
					}

		}
	}
	
	public function editMou($id)
		{
			$id=$this->uri->segment(4);
			$sql="Select* from tb_mou where mou_id=$id";
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
			$data['main_content']="mou/editMou";
			$this->load->view('template', $data);
		
		}
	public function update_mou()
{
			$id=$this->uri->segment(4);
			if ($_FILES['file_mou']['name']==null){
					$data = array(
						'mou_id' => $this->uri->segment(4),
						'mou_name' => $this->input->post('mou_name_value'),
						'mou_detail' => $this->input->post('mou_detail_value'),
						'mou_agencies' => $this->input->post('mou_agencies_value')
					);
					$this->db->where("mou_id",$id);
					$this->db->update("tb_mou",$data);
					$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลข่าวสารเรียบร้อย</p></div>');
					redirect("mou/dataMou/".$this->uri->segment(3),"refresh");
				}else{		
				$config['upload_path']="fileMouUpload/";
				$config['allowed_types']="pdf";
				$config['max_size']=10240;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if ( ! $this->upload->do_upload('file_mou'))
				{
						$this->session->set_flashdata('msg', '<div class="n_warning">'.$this->upload->display_errors().'</div>');
						redirect("mou/editMou/".$this->uri->segment(3).'/'.$this->uri->segment(4),"refresh");
			
				}
				else
				{
					$file_data = $this->upload->data('file_mou');
					$data = array(
							'mou_id' =>$this->uri->segment(4),
							'mou_name' => $this->input->post('mou_name_value'),
							'mou_detail' => $this->input->post('mou_detail_value'),
							'mou_agencies' => $this->input->post('mou_agencies_value'),
							'mou_file' =>$file_data['file_name']
					);
					$this->db->where("mou_id",$id);
					$this->db->update("tb_mou",$data);
					$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลข่าวสารเรียบร้อย</p></div>');
					redirect("mou/dataMou/".$this->uri->segment(3),"refresh");

		}
				}
		}
	public function deleteMou(){
		$id=$this->uri->segment(4);
		$sql="Select mou_file from tb_mou where mou_id=$id";
		$query = $this->db->query($sql);
		$query=$query->row_array();
		$files=$query['mou_file'];
		if ($files==null)
		{
			$this->mouModel->deleteMou($mou_id=$this->uri->segment(4));
		}
		else
		{
			$file_dir="fileMouUpload/".$files;
			unlink($file_dir);
			$this->mouModel->deleteMou($mou_id=$this->uri->segment(4));
		}
		$this->session->set_flashdata('msg', '<div class="n_ok"><p>ลบข้อมูลความร่วมมือด้านการวิจัยเรียบร้อย</p></div>');
		redirect("mou/dataMou/".$this->uri->segment(3),"refresh");

		}
		public function datasearchMou()
		{	if ($this->input->post('search')==null){
			$this->session->set_flashdata('msgSearch', '<div class="n_warning"><p>กรุณากรอกข้อมูลที่ต้องการค้นหา</p></div>');
			redirect("mou/dataMou/".$this->uri->segment(3),"refresh");
		
		}else{

			$this->mouModel->searchMou($search=$this->input->post('search'));
			$data['menu']="staff/menustaff";
			$data['main_content']="mou/dataMou";
			$data['query']=$this->mouModel->searchMou($search);//อ่านข้อมูลมาทั้งหมด
			$this->load->view('template', $data);
		}
		}
}