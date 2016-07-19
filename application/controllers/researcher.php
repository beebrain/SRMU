<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Researcher extends CI_Controller
 {
 	public function __construct()
 	{

 		parent::__construct();
 		$this->load->model('researcherModel');
 		$this->load->model('majorModel');
 		$this->load->model('positionModel');
 	}
 	public function index()
 	{
		$id=$this->uri->segment(3);
		$data['menu']="researcher/menuResearcher";
		$data['main_content']="researcher/dataOneresearcher";
		$data['query']=$this->researcherModel->dataOneresearcher($id);//อ่านข้อมูลมาทั้งหมด
		$this->load->view('template', $data);
 	}
 public function editResearcher()
	{
		$id=$this->uri->segment(3);
		$sql="Select* from master_user where user_id=$id";
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
		$data['main_content']="researcher/editResearcher";
		$data['queryPosition']=$this->positionModel->position();//อ่านข้อมูลมาทั้งหมด
		$data['queryMajor']=$this->majorModel->major();
		//$data['query']=$this->researcherModel->dataAllresearcher();//อ่านข้อมูลมาทั้งหมด
		$this->load->view('template', $data);
	}
	public function editpass()
	{
		$id=$this->uri->segment(3);
		$data['menu']="researcher/menuResearcher";
		$data['main_content']="researcher/editpass";
		$this->load->view('template', $data);
	}
	public function update_researcher_pass()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('password_old', 'รหัสผ่านเดิม', 'required|callback_pass_check');
		$this->form_validation->set_rules('password_new', 'รหัสผ่านใหม่', 'trim|required');
		$this->form_validation->set_rules('password_confirm', 'ยืนยันรหัสผ่าน', 'trim|required|matches[password_new]|md5');
	
		if ($this->form_validation->run() == FALSE) {
	
			$data['menu']="researcher/menuresearcher";
			$data['main_content']="researcher/editpass";//อ่านข้อมูลมาทั้งหมด
			$this->load->view('template', $data);
		}
		else {
			$id=$this->uri->segment(3);
			$ara=array
			(
					'user_id' => $this->uri->segment(3),
					'password' => md5($this->input->post('password_new'))
			);
			$this->db->where("user_id",$id);
			$this->db->update("master_user",$ara);
			$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลรหัสผ่านเรียบร้อย </p></div>');
			redirect('researcher/index/'.$this->uri->segment(3),"refresh");
	
		}}
	
		public function pass_check($str)
		{	$id=$this->uri->segment(3);
		$sql ="
			SELECT *
			FROM master_user
			where  master_user.user_id='".$id."' and
				   master_user.password='".md5($str)."'
		";
	
		$query = $this->db->query($sql);
		$result=$query->result();
	
		if($query->num_rows() > 0)
		{
	
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('pass_check', 'กรุณากรอกข้อมูล %sให้ถูกต้อง');
			return FALSE;
	
		}
			
	
		}
	public function update_Researcher()
	{
	$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('name_th_value','ชื่อภาษาไทย','trim|required|xss_clean');
		$this->form_validation->set_rules('surname_th_value', 'นามสกุลภาษาไทย', 'trim|required|xss_clean');
		$this->form_validation->set_rules('major_value', 'ข้อมูลหลักสูตร', '|required|callback_combo_check');
		$this->form_validation->set_rules('email_value', 'Email', 'valid_email');
		if ($this->form_validation->run() == FALSE) {
				$id=$this->uri->segment(3);
		$sql="Select* from master_user where user_id=$id";
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
		$data['main_content']="researcher/editResearcher";
		$data['queryPosition']=$this->positionModel->position();//อ่านข้อมูลมาทั้งหมด
		$data['queryMajor']=$this->majorModel->major();
		//$data['query']=$this->researcherModel->dataAllresearcher();//อ่านข้อมูลมาทั้งหมด
		$this->load->view('template', $data);
		}
		else {
			$id=$this->uri->segment(3);
			if ($_FILES['photo']['name']==null){
				if($this->input->post('position_value'=="")){
					$data = array('position_id' => NULL);
				}else{
					$data = array('position_id' =>$this->input->post('position_value'));
				}
				$data = array(
					'user_id' => $this->uri->segment(3),
					'user_type_id' => $this->input->post('user_type_value'),
					'title' => $this->input->post('title_value'),
					'name_th' => $this->input->post('name_th_value'),
					'surname_th' => $this->input->post('surname_th_value'),
					'name_en' => $this->input->post('name_en_value'),
					'surname_en' => $this->input->post('surname_en_value'),
					'major_id' => $this->input->post('major_value'),
					'address' => $this->input->post('address_value'),
					'email' => $this->input->post('email_value'),
					'tel' => $this->input->post('tel_value'),
					'status_user' => $this->input->post('status_user_value')
				);
				$this->researcherModel->update_Researcher($id,$data);
				$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลผู้วิจัยเรียบร้อย </p></div>');
				redirect('researcher/index/'.$this->uri->segment(3),"refresh");
			}else{		
				$config['upload_path']="imgResearcher/";
				$config['allowed_types']="jpg|gif|png|";
				$config['max_size']=1024;
				$this->load->library('upload', $config);
                $this->upload->initialize($config);
				if ( ! $this->upload->do_upload('photo'))
				{
						$this->session->set_flashdata('msg', '<div class="n_warning">'.$this->upload->display_errors().'</div>');
						redirect("researcher/editResearcher/".$this->uri->segment(3),"refresh");
				}
				else
				{
					$file_data = $this->upload->data('photo');
					$filename = $file_data['file_name'];
					$config = array
					(
							'source_image' => $file_data['full_path'],
							'maintain_ratio' => false,
							'width' => 160,
							'height' => 190
					
					);
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					if($this->input->post('position_value'=="")){
						$data = array('position_id' => NULL);
					}else{
						$data = array('position_id' =>$this->input->post('position_value'));
					}
					$data = array(
					'user_id' => $this->uri->segment(3),
					'user_type_id' => $this->input->post('user_type_value'),
					'title' => $this->input->post('title_value'),
					'name_th' => $this->input->post('name_th_value'),
					'surname_th' => $this->input->post('surname_th_value'),
					'name_en' => $this->input->post('name_en_value'),
					'surname_en' => $this->input->post('surname_en_value'),
					'major_id' => $this->input->post('major_value'),
					'address' => $this->input->post('address_value'),
					'email' => $this->input->post('email_value'),
					'tel' => $this->input->post('tel_value'),
					'photo'=>$file_data['file_name'],
					'status_user' => $this->input->post('status_user_value')
					);
					$this->researcherModel->update_Researcher($id,$data);
					$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลผู้วิจัยเรียบร้อย </p></div>');
					redirect('researcher/index/'.$this->uri->segment(3),"refresh");
					}
				}
			}
	}
 	
	
 }