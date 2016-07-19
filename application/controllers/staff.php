<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class staff extends CI_Controller {

	public function __construct()
		{
		 parent::__construct();
		 $this->load->model('staffModel');
		 $this->load->model('majorModel');
		 $this->load->model('positionModel');
		 $this->load->model('whomodel');
		}
public function index()
		{
		$id=$this->uri->segment(3);
	
		$data['menu']="staff/menuStaff";
		$data['main_content']="staff/dataStaff";
		$data['query']=$this->staffModel->dataStaff($id);//อ่านข้อมูลมาทั้งหมด
		$this->load->view('template', $data);
		}	
	public function dataStaff()
		{
			$id=$this->uri->segment(3);
		
			$data['menu']="staff/menuStaff";
			$data['main_content']="staff/dataStaff";
			$data['query']=$this->staffModel->dataStaff($id);//อ่านข้อมูลมาทั้งหมด
			$this->load->view('template', $data);
		}
	public function editpass()
		{
		
			$id=$this->uri->segment(3);
			$data['menu']="staff/menuStaff";
			$data['main_content']="staff/editpass";
			$data['query']=$this->staffModel->dataStaff($id);//อ่านข้อมูลมาทั้งหมด
			$this->load->view('template', $data);
		}
	public function editStaff()
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
		$data['menu']="staff/menuStaff";
		$data['main_content']="staff/editStaff";
		$data['query']=$this->staffModel->dataAllstaff();//อ่านข้อมูลมาทั้งหมด
		$this->load->view('template', $data);		
	}
	
	public function update_Staff($id)
	{
	
			$ara=array
		(
				'user_id' => $this->uri->segment(3),
				'user_type_id' => $this->input->post('user_type_value'),
				'username' => $this->input->post('username_value'),
				'password' => md5($this->input->post('password_value')),
				'title' => $this->input->post('title_value'),
				'position_id' => NULL,
				'name_th' => $this->input->post('name_th_value'),
				'surname_th' => $this->input->post('surname_th_value'),
				'name_en' => $this->input->post('name_en_value'),
				'surname_en' => $this->input->post('surname_en_value'),
				'major_id' => NULL,
				'address' => $this->input->post('address_value'),
				'email' => $this->input->post('email_value'),
				'tel' => $this->input->post('tel_value'),
				'photo' => $this->input->post('photo_value'),
				'status_user' => $this->input->post('status_user_value')
		);
	
		$this->db->where("user_id",$id);
		$this->db->update("master_user",$ara);

		$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลเกี่ยวกับผู้ใช้งานเรียบร้อย </p></div>');
		redirect('staff/index/'.$this->uri->segment(3),"refresh");
	}
	public function update_staff_pass()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('password_old', 'รหัสผ่านเดิม', 'required|callback_pass_check');
		$this->form_validation->set_rules('password_new', 'รหัสผ่านใหม่', 'trim|required');
		$this->form_validation->set_rules('password_confirm', 'ยืนยันรหัสผ่าน', 'trim|required|matches[password_new]|md5');
	
		if ($this->form_validation->run() == FALSE) {
				
			$data['menu']="staff/menuStaff";
			$data['main_content']="staff/editpass";//อ่านข้อมูลมาทั้งหมด
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
			redirect('staff/dataStaff/'.$this->uri->segment(3),"refresh");
	
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
	public function dataListresearcher()
	{
	
		$config['base_url']=base_url()."staff/dataListresearcher/".$this->uri->segment(3).'/';
		$config['total_rows']=$this->db->count_all('researcherView');
		$config['per_page'] =20;
		$config['first_link'] = 'หน้าแรก';
		$config['last_link'] = 'หน้าสุดท้าย';
		$config['full_tag_open'] = "<div class='pagination'>";
		$config['full_tag_close']="</div>";
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);

		$this->staffModel->searchResearcher($search=$this->input->post('search'));
		
		$data['menu']="staff/menuStaff";
		$data['main_content']="staff/dataListresearcher";
		$this->db->select('*');
		$this->db->from('master_user');
		$this->db->join('ref_position', 'master_user.position_id = ref_position.position_id', 'left');
		$this->db->where(array('user_type_id' => 3));
		$this->db->limit($config['per_page'],$this->uri->segment(4));
		$data['query']=$this->db->order_by('name_th', 'asc')->get();
		$this->load->view('template', $data);
		;
		
	}
	public function dataSearchresearcher()
	{
	
		if ($this->input->post('search')==null){
			$this->session->set_flashdata('msgSearch', '<div class="n_warning"><p>กรุณากรอกข้อมูลที่ต้องการค้นหา</p></div>');
			redirect('staff/dataListresearcher/'.$this->uri->segment(3),"refresh");
		}else{

	
			$this->staffModel->searchResearcher($search=$this->input->post('search'));
	
			$data['menu']="staff/menuStaff";
			$data['main_content']="Staff/dataListresearcher";
			//$data['queryTotal']=$config['total_rows'];
			$data['query']=$this->staffModel->searchResearcher($search);//อ่านข้อมูลมาทั้งหมด
			$this->load->view('template', $data);
		}
	}
	public function dataOneresearcher()
	{
	
		$id=$this->uri->segment(4);
		$data['menu']="staff/menuStaff";
		$data['main_content']="staff/dataOneresearcher";
		$data['query']=$this->staffModel->dataOneresearcher($id);//อ่านข้อมูลมาทั้งหมด
		$this->load->view('template', $data);
	}

	public function addResearcher()
	{
		$data['menu']="staff/menuStaff";
		$data['queryPosition']=$this->positionModel->position();//อ่านข้อมูลมาทั้งหมด
		$data['queryMajor']=$this->majorModel->major();
		$data['main_content']="staff/addResearcher";
		$this->load->view('template', $data);
	}
public function savenew_Researcher()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('username_value', 'ชื่อผู้ใช้งาน', 'trim|required|callback_username_check');
		$this->form_validation->set_rules('password_value', 'รหัสผ่าน', 'trim|required|xss_clean');
		$this->form_validation->set_rules('name_th_value','ชื่อภาษาไทย','trim|required|xss_clean');
		$this->form_validation->set_rules('surname_th_value', 'นามสกุลภาษาไทย', 'trim|required|xss_clean');
		$this->form_validation->set_rules('major_value', 'หลักสูตร', 'required');
		$this->form_validation->set_rules('email_value', 'Email', 'valid_email');
		if ($this->form_validation->run() == FALSE) {
			$data['menu']="staff/menuStaff";
			$data['queryPosition']=$this->positionModel->position();//อ่านข้อมูลมาทั้งหมด
			$data['queryMajor']=$this->majorModel->major();
			$data['main_content']="staff/addResearcher";
			$this->load->view('template', $data);
		}
		else {
			if ($_FILES['photo']['name']==null){
				if($this->input->post('position_value'=="")){
					$data = array('position_id' => NULL);
				}else{
					$data = array('position_id' =>$this->input->post('position_value'));
				} 
				$data = array(
					'user_id' => "",
					'user_type_id' => $this->input->post('user_type_value'),
					'username' => $this->input->post('username_value'),
					'password' => md5($this->input->post('password_value')),
					'title' => $this->input->post('title_value'),
					
					'name_th' => $this->input->post('name_th_value'),
					'surname_th' => $this->input->post('surname_th_value'),
					'name_en' => $this->input->post('name_en_value'),
					'surname_en' => $this->input->post('surname_en_value'),
					'major_id' => $this->input->post('major_value'),
					'address' => $this->input->post('address_value'),
					'email' => $this->input->post('email_value'),
					'tel' => $this->input->post('tel_value'),
					'photo'=>"",
					'status_user' => $this->input->post('status_user_value')
				);
				$this->staffModel->savenew_Researcher($data) ;
				$this->session->set_flashdata('msg', '<div class="n_ok"><p>เพิ่มข้อมูลผู้วิจัยเรียบร้อย </p></div>');
				redirect('staff/dataListresearcher/'.$this->uri->segment(3),"refresh");
			}else{		
				$config['upload_path']="imgResearcher/";
				$config['allowed_types']="jpg|gif|png|";
				$config['max_size']=1024;
				$this->load->library('upload', $config);
                $this->upload->initialize($config);
				if ( ! $this->upload->do_upload('photo'))
				{
											$this->session->set_flashdata('msg', '<div class="n_warning">'.$this->upload->display_errors().'</div>');
						redirect("staff/addResearcher/".$this->uri->segment(3),"refresh");
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
					'user_id' => "",
					'user_type_id' => $this->input->post('user_type_value'),
					'username' => $this->input->post('username_value'),
					'password' => md5($this->input->post('password_value')),
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

					$this->staffModel->savenew_Researcher($data) ;
					$this->session->set_flashdata('msg', '<div class="n_ok"><p>เพิ่มข้อมูลผู้วิจัยเรียบร้อย </p></div>');
					redirect('staff/dataListresearcher/'.$this->uri->segment(3),"refresh");
					}
				}
			}
		}
		function username_check($str)
		{
			if ($this->whomodel->checkUsername($str))
			{
				$this->form_validation->set_message('username_check', '%sนี้มีอยู่ในระบบแล้วกรุณาเปลี่ยนข้อมูลชื่อผู้ใช้งาน');
				return FALSE;
			}
			else
			{
				return true;
			}
		}
	public function deleteResearcher(){
	
		$id=$this->uri->segment(4);
		$sql="Select photo from master_user where user_id=$id";
		$query = $this->db->query($sql);
		$query=$query->row_array();
		$files=$query['photo'];
		if ($files==null)
		{
			$this->staffModel->deleteResearcher($user_id=$this->uri->segment(4));
		}
		else
		{
			$file_dir="imgResearcher/".$files;
			unlink($file_dir);
			$this->staffModel->deleteResearcher($user_id=$this->uri->segment(4));
		}
		$this->session->set_flashdata('msg', '<div class="n_ok"><p>ลบข้อมูลผู้วิจัยเรียบร้อย </p></div>');
		redirect('staff/dataListresearcher/'.$this->uri->segment(3),"refresh");
	}
	public function editResearcher()

	{
	
		$id=$this->uri->segment(4);
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
		$data['menu']="staff/menuStaff";
		$data['main_content']="staff/editResearcher";
		$data['queryPosition']=$this->positionModel->position();//อ่านข้อมูลมาทั้งหมด
		$data['queryMajor']=$this->majorModel->major();
		$data['query']=$this->staffModel->dataAllresearcher();//อ่านข้อมูลมาทั้งหมด
		$this->load->view('template', $data);
	}
	public function update_researcher_pass()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
	
		$this->form_validation->set_rules('password_new', 'รหัสผ่านใหม่', 'trim|required');
		$this->form_validation->set_rules('password_confirm', 'ยืนยันรหัสผ่าน', 'trim|required|matches[password_new]|md5');
	
		if ($this->form_validation->run() == FALSE) {
			
		$id=$this->uri->segment(4);
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
		$data['menu']="staff/menuStaff";
		$data['main_content']="staff/editResearcher";
		$data['queryPosition']=$this->positionModel->position();//อ่านข้อมูลมาทั้งหมด
		$data['queryMajor']=$this->majorModel->major();
		$data['query']=$this->staffModel->dataAllresearcher();//อ่านข้อมูลมาทั้งหมด
		$this->load->view('template', $data);
		}
		else {
			$id=$this->uri->segment(4);
			$ara=array
			(
					'user_id' => $this->uri->segment(4),
					'password' => md5($this->input->post('password_new'))
			);
			$this->db->where("user_id",$id);
			$this->db->update("master_user",$ara);
			$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลรหัสผ่านผู้วิจัยเรียบร้อย </p></div>');
			redirect('staff/dataOneresearcher/'.$this->uri->segment(3).'/'.$this->uri->segment(4),"refresh");
	
		}}
	
	public function update_Researcher()
	{
	$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('username_value', 'ชื่อผู้ใช้งาน', 'trim|required|xss_clean');
		$this->form_validation->set_rules('name_th_value','ชื่อภาษาไทย','trim|required|xss_clean');
		$this->form_validation->set_rules('surname_th_value', 'นามสกุลภาษาไทย', 'trim|required|xss_clean');
		
		$this->form_validation->set_rules('major_value', 'ข้อมูลหลักสูตร', '|required|callback_combo_check');
		$this->form_validation->set_rules('email_value', 'Email', 'valid_email');
		if ($this->form_validation->run() == FALSE) {
			$id=$this->uri->segment(4);
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
		$data['menu']="staff/menuStaff";
		$data['main_content']="staff/editResearcher";
		$data['queryPosition']=$this->positionModel->position();//อ่านข้อมูลมาทั้งหมด
		$data['queryMajor']=$this->majorModel->major();
		$data['query']=$this->staffModel->dataAllresearcher();//อ่านข้อมูลมาทั้งหมด
		$this->load->view('template', $data);
		}
		else {
			$id=$this->uri->segment(4);
			if ($_FILES['photo']['name']==null){
				if($this->input->post('position_value'=="")){
					$data = array('position_id' => NULL);
				}else{
					$data = array('position_id' =>$this->input->post('position_value'));
				}
				$data = array(
					'user_id' => $this->uri->segment(4),
					'user_type_id' => $this->input->post('user_type_value'),
					'username' => $this->input->post('username_value'),
				
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
				$this->staffModel->update_Researcher($id,$data);
				$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลผู้วิจัยเรียบร้อย </p></div>');
				redirect('staff/dataOneresearcher/'.$this->uri->segment(3).'/'.$this->uri->segment(4),"refresh");
			}else{		
				$config['upload_path']="imgResearcher/";
				$config['allowed_types']="jpg|gif|png|";
				$config['max_size']=1024;
				$this->load->library('upload', $config);
                $this->upload->initialize($config);
				if ( ! $this->upload->do_upload('photo'))
				{
						$this->session->set_flashdata('msg', '<div class="n_warning">'.$this->upload->display_errors().'</div>');
						redirect("staff/editResearcher/".$this->uri->segment(3),"refresh");
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
					'user_id' => $this->uri->segment(4),
					'user_type_id' => $this->input->post('user_type_value'),
					'username' => $this->input->post('username_value'),
				
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
					$this->staffModel->update_Researcher($id,$data);
					$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลผู้วิจัยเรียบร้อย </p></div>');
					redirect('staff/dataOneresearcher/'.$this->uri->segment(3).'/'.$this->uri->segment(4),"refresh");
					}
				}
			}
	}
	
}
