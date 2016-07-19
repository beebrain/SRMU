<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller 
{ 
	public function __construct() 
	{ 
		parent::__construct();
		$this->load->model('adminModel');
		$this->load->model('researcherModel');
		$this->load->model('researchModel');
		$this->load->model('whomodel');
		$this->load->model('staffModel');
	}
	 
	public function index() 
	{ 
		$data['menu']="admin/menuAdmin";
		$data['main_content']="admin/dataAdmin";
	
		$data['query']=$this->adminModel->dataAdmin();//อ่านข้อมูลมาทั้งหมด
		$this->load->view('template', $data);
	}
	public function dataAlluser()
	{
	
		$data['menu']="admin/menuAdmin";
		$data['main_content']="admin/dataAlluser";
		$data['query']=$this->adminModel->dataAlluser();//อ่านข้อมูลมาทั้งหมด
		$data['query1']=$this->adminModel->dataAllstaff();//อ่านข้อมูลมาทั้งหมด
		$data['query2']=$this->adminModel->dataAllresearcher();//อ่านข้อมูลมาทั้งหมด
		$this->load->view('template', $data);
	}

	public function dataListstaff()
	{
	
		$data['menu']="admin/menuAdmin";
		$data['main_content']="admin/dataListstaff";
		$data['query']=$this->adminModel->dataAllstaff();//อ่านข้อมูลมาทั้งหมด
		$this->load->view('template', $data);
	}
	public function dataListresearcher()
	{
	
		$config['base_url']=base_url()."admin/dataListresearcher/".$this->uri->segment(3).'/';
		$config['total_rows']=$this->db->count_all("master_user where master_user.user_type_id=3");
		$config['per_page'] =20;
		$config['full_tag_open'] = "<div class='pagination'>";
		$config['full_tag_close']="</div>";
		$config['first_link'] = 'หน้าแรก';
		$config['last_link'] = 'หน้าสุดท้าย';
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		
		$data['menu']="admin/menuAdmin";
		$data['main_content']="admin/dataListresearcher";
		$data['query']=$this->db->order_by('name_th', 'asc')->get_where('master_user', array('user_type_id' => 3),$config['per_page'],$this->uri->segment(3));
		$this->load->view('template', $data);
	}
	public function dataAdmin()
	{
	
		$data['menu']="admin/menuAdmin";
		$data['main_content']="admin/dataAdmin";
		$data['query']=$this->adminModel->dataAdmin();//อ่านข้อมูลมาทั้งหมด
		$this->load->view('template', $data);
	} 
	public function dataAllstaff()	
	{	
	
		$config['base_url']=base_url()."admin/dataAllstaff/".$this->uri->segment(3).'/';
		$config['total_rows']=$this->db->count_all("master_user where master_user.user_type_id=2");
		$config['per_page'] =10;
		$config['full_tag_open'] = "<div class='pagination'>";
		$config['full_tag_close']="</div>";
		$config['first_link'] = 'หน้าแรก';
		$config['last_link'] = 'หน้าสุดท้าย';
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		
		$data['menu']="admin/menuAdmin";
		$data['main_content']="admin/dataAllstaff";
		$data['query']=$this->db->order_by('name_th', 'asc')->get_where('master_user', array('user_type_id' => 2),$config['per_page'],$this->uri->segment(4));
		$this->load->view('template', $data);
			
	}
	
	public function dataOnestaff() 
	{
		$id=$this->uri->segment(4);
	
		$data['menu']="admin/menuAdmin";
		$data['main_content']="admin/dataOnestaff";
		$data['query']=$this->adminModel->dataOnestaff($id);//อ่านข้อมูลมาทั้งหมด
		$this->load->view('template', $data);
	}
	
	public function dataPermissionstaff()
	{
	
		$config['base_url']=base_url()."admin/dataPermissionstaff/".$this->uri->segment(3).'/';
		$config['total_rows']=$this->db->count_all("master_user where master_user.user_type_id=2");
		$config['per_page'] =10;
		$config['full_tag_open'] = "<div class='pagination'>";
		$config['full_tag_close']="</div>";
		$config['first_link'] = 'หน้าแรก';
		$config['last_link'] = 'หน้าสุดท้าย';
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		
		$data['menu']="admin/menuAdmin";
		$data['main_content']="admin/dataPermissionstaff";
		$data['query']=$this->db->order_by('name_th', 'asc')->get_where('master_user', array('user_type_id' => 2),$config['per_page'],$this->uri->segment(4));//อ่านข้อมูลมาทั้งหมด
		$this->load->view('template', $data);
	}
	
	public function dataPermissionresearcher()
	{
	
		$config['base_url']=base_url()."admin/dataPermissionresearcher/".$this->uri->segment(3).'/';
		$config['total_rows']=$this->db->count_all("master_user where master_user.user_type_id=3");
		$config['per_page'] =20;
		$config['full_tag_open'] = "<div class='pagination'>";
		$config['full_tag_close']="</div>";
		$config['first_link'] = 'หน้าแรก';
		$config['last_link'] = 'หน้าสุดท้าย';
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		
		$data['menu']="admin/menuAdmin";
		$data['main_content']="admin/dataPermissionresearcher";
		$this->db->select('*');
		$this->db->from('master_user');
		$this->db->join('ref_position', 'master_user.position_id = ref_position.position_id', 'inner');
		$this->db->limit($config['per_page'],$this->uri->segment(4));
		$data['query']=$this->db->order_by('name_th', 'asc')->get();
		$this->load->view('template', $data);
	}

	public function dataOneresearcher()
	{
	
		$id=$this->uri->segment(4);
		$data['menu']="admin/menuAdmin";
		$data['main_content']="admin/dataOneresearcher";
		$data['query']=$this->staffModel->dataOneresearcher($id);//อ่านข้อมูลมาทั้งหมด
		$this->load->view('template', $data);
	}
	public function dataOnestaffpermission()
	{
		$id=$this->uri->segment(4);
	
		$data['menu']="admin/menuAdmin";
		$data['main_content']="admin/dataOnestaffpermission";
		$data['query']=$this->adminModel->dataOnestaff($id);//อ่านข้อมูลมาทั้งหมด
		$this->load->view('template', $data);
	}
	public function dataOneresearcherpermission()
	{	$id=$this->uri->segment(4);
	
		$data['menu']="admin/menuAdmin";
		$data['main_content']="admin/dataOneresearcherpermission";
		$data['query']=$this->adminModel->dataOneresearcher($id);//อ่านข้อมูลมาทั้งหมด
		$this->load->view('template', $data);
	}

	public function addStaff()
	{
	
		$data['menu']="admin/menuAdmin";
		$data['main_content']="admin/addStaff";
		$this->load->view('template', $data);
	}
	public function savenew_Staff()
	{
	
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('username_value', 'ชื่อผู้ใช้งาน', 'callback_username_check');
		$this->form_validation->set_rules('password_value', 'รหัสผ่าน', 'trim|required|xss_clean');
		
		$this->form_validation->set_rules('name_th_value','ชื่อ','trim|required|xss_clean');
		$this->form_validation->set_rules('surname_th_value', 'นามสกุล', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email_value', 'Email', 'valid_email');

	if ($this->form_validation->run() == FALSE) {
		
		$data['menu']="admin/menuAdmin";
		$data['main_content']="admin/addStaff";
		$this->load->view('template', $data);
		} 
		else {
			$data = array(
			'user_id' => "",
			'user_type_id' => $this->input->post('user_type_value'),
			'username' => $this->input->post('username_value'),
			'password' => md5($this->input->post('password_value')),
			'title' => $this->input->post('title_value'),
			'position_id' => NULL,
			'name_th' => $this->input->post('name_th_value'),
			'surname_th' => $this->input->post('surname_th_value'),
			'name_en' =>NULL,
			'surname_en' => NULL,
			'major_id' => NULL,
			'address' => $this->input->post('address_value'),
			'email' => $this->input->post('email_value'),
			'tel' => $this->input->post('tel_value'),
			'photo' => NULL,
			'status_user' => $this->input->post('status_user_value')
			);
		
			$this->adminModel->savenew_staff($data) ;
	
			$this->session->set_flashdata('msg', '<div class="n_ok"><p>เพิ่มข้อมูลเจ้าหน้าที่เรียบร้อย </p></div>');
			redirect('admin/dataAllstaff/'.$this->uri->segment(3),"refresh");
	

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
	public function delete_Staff(){
	
		$this->adminModel->delete_staff($user_id=$this->uri->segment(4));
		$this->session->set_flashdata('msg', '<div class="n_ok"><p>ลบข้อมูลเจ้าหน้าที่เรียบร้อย </p></div>');
		redirect('admin/dataAllstaff/'.$this->uri->segment(3),"refresh");

	}
	public function edit_Staff()
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
			$data['menu']="admin/menuAdmin";
			$data['main_content']="admin/editStaff";
			$data['query']=$this->adminModel->dataAllstaff();//อ่านข้อมูลมาทั้งหมด
			$this->load->view('template', $data);
		
			
	}
	public function update_Staff($id)
	{
		$id=$this->uri->segment(4);
	
				$ara=array
				(
					'user_id' => $this->uri->segment(4),
					'user_type_id' => $this->input->post('user_type_value'),
					'username' => $this->input->post('username_value'),
					'title' => $this->input->post('title_value'),
					'position_id' => NULL,
					'name_th' => $this->input->post('name_th_value'),
					'surname_th' => $this->input->post('surname_th_value'),
					'name_en' => NULL,
					'surname_en' => NULL,
					'major_id' => NULL,
					'address' => $this->input->post('address_value'),
					'email' => $this->input->post('email_value'),
					'tel' => $this->input->post('tel_value'),
					'photo' => NULL,
					'status_user' => $this->input->post('status_user_value')
				);
				
				$this->db->where("user_id",$id);
				$this->db->update("master_user",$ara);
				$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลเจ้าหน้าที่เรียบร้อย </p></div>');
				redirect('admin/dataOnestaff/'.$this->uri->segment(3).'/'.$this->uri->segment(4),"refresh");
	
				
	}
	public function edit_Admin()
	{	$id=$this->uri->segment(3);
	
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
		$data['menu']="admin/menuAdmin";
		$data['main_content']="admin/editAdmin";
		$data['query']=$this->adminModel->dataAdmin();//อ่านข้อมูลมาทั้งหมด
		$this->load->view('template', $data);	
	}
	public function edit_pass()
	{	
	$data['menu']="admin/menuAdmin";
	$data['main_content']="admin/editpass";//อ่านข้อมูลมาทั้งหมด
	$this->load->view('template', $data);
	}
	public function update_Admin()
	{	$id=$this->uri->segment(3);
	
		$ara=array
		(
				'user_id' => $this->uri->segment(3),
				'user_type_id' => $this->input->post('user_type_value'),
				'username' => $this->input->post('username_value'),
				'title' => $this->input->post('title_value'),
				'name_th' => $this->input->post('name_th_value'),
				'surname_th' => $this->input->post('surname_th_value'),
				'address' => $this->input->post('address_value'),
				'email' => $this->input->post('email_value')
		);
	
		$this->db->where("user_id",$id);
		$this->db->update("master_user",$ara);

		$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลผู้ใช้งานเรียบร้อย </p></div>');
		redirect('admin/dataAdmin/'.$this->uri->segment(3),"refresh");
	}
	public function update_admin_pass()
	{	
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('password_old', 'รหัสผ่านเดิม', 'trim|required|callback_pass_check');
		$this->form_validation->set_rules('password_new', 'รหัสผ่านใหม่', 'trim|required');
		$this->form_validation->set_rules('password_confirm', 'ยืนยันรหัสผ่าน', 'trim|required|matches[password_new]|md5');

		if ($this->form_validation->run() == FALSE) {
			
			$data['menu']="admin/menuAdmin";
			$data['main_content']="admin/editpass";//อ่านข้อมูลมาทั้งหมด
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
			redirect('admin/dataAdmin/'.$this->uri->segment(3),"refresh");
		
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
	
	public function update_staff_pass()
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
			$data['menu']="admin/menuAdmin";
			$data['main_content']="admin/editStaff";
			$data['query']=$this->adminModel->dataAllstaff();//อ่านข้อมูลมาทั้งหมด
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
			$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลรหัสผ่านเจ้าหน้าที่เรียบร้อย </p></div>');
			redirect('admin/dataOnestaff/'.$this->uri->segment(3).'/'.$this->uri->segment(4),"refresh");
	
		}}
	
	public function permission_staff()
	{	$id=$this->uri->segment(4);
	
			$ara=array
			(
					'user_id' => $this->uri->segment(4),
					'status_user' => $this->input->post('status_user_value')
			);
			$this->db->where("user_id",$id);
			$this->db->update("master_user",$ara);
			$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลสิทธิ์การใช้งานเจ้าหน้าที่เรียบร้อย </p></div>');
			redirect('admin/dataPermissionstaff/'.$this->uri->segment(3),"refresh");
			
			
	}
	public function permission_researcher()

	{	$id=$this->uri->segment(4);
	
		$ara=array
		(
				'user_id' => $this->uri->segment(4),
				'status_user' => $this->input->post('status_user_value')
		);
		$this->db->where("user_id",$id);
		$this->db->update("master_user",$ara);
		$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลสิทธิ์การใช้งานผู้วิจัยเรียบร้อย </p></div>');
		redirect('admin/dataPermissionresearcher/'.$this->uri->segment(3),"refresh");
	

	}
	public function dataSearchstaff()
	{	$data['who']=$this->whomodel->all();
	
		if ($this->input->post('search')==null){
			$this->session->set_flashdata('msgSearch', '<div class="n_warning"><p>กรุณากรอกข้อมูลที่ต้องการค้นหา !</p></div>');
			redirect('admin/dataAllstaff/'.$this->uri->segment(3),"refresh");
		}else{
		$config['base_url']=base_url()."admin/dataAllstaff";
		$config['total_rows']=$this->db->count_all("master_user where master_user.user_type_id=2");
		$config['per_page'] =10;
		$config['full_tag_open'] = "<div class='pagination'>";
		$config['full_tag_close']="</div>";
		$config['first_link'] = 'หน้าแรก';
		$config['last_link'] = 'หน้าสุดท้าย';
		$this->pagination->initialize($config);
		
		$this->adminModel->searchStaff($search=$this->input->post('search'));	
		$data['menu']="admin/menuAdmin";
		$data['main_content']="admin/dataAllstaff";
		$data['query']=$this->adminModel->searchStaff($search);//อ่านข้อมูลมาทั้งหมด
		$this->load->view('template', $data);
		}
	}
	public function dataSearchstaffPremission()
	{$data['who']=$this->whomodel->all();
		if ($this->input->post('search')==null){
			$this->session->set_flashdata('msgSearch', '<div class="n_warning"><p>กรุณากรอกข้อมูลที่ต้องการค้นหา !</p></div>');
			redirect('admin/dataPermissionstaff/'.$this->uri->segment(3),"refresh");
	
				
		}else{
		$config['base_url']=base_url()."admin/dataAllstaff";
		$config['total_rows']=$this->db->count_all("master_user where master_user.user_type_id=2");
		$config['per_page'] =10;
		$config['full_tag_open'] = "<div class='pagination'>";
		$config['full_tag_close']="</div>";
		$this->pagination->initialize($config);
		$config['first_link'] = 'หน้าแรก';
		$config['last_link'] = 'หน้าสุดท้าย';
		$this->adminModel->searchStaff($search=$this->input->post('search'));	
		
		$data['menu']="admin/menuAdmin";
		$data['main_content']="admin/dataPermissionstaff";
		$data['query']=$this->adminModel->searchStaff($search);
		$this->load->view('template', $data);
		}
	}
	public function dataSearchresearcher()
	{$data['who']=$this->whomodel->all();
		if ($this->input->post('search')==null){
			$this->session->set_flashdata('msgSearch', '<div class="n_warning"><p>กรุณากรอกข้อมูลที่ต้องการค้นหา !</p></div>');
			redirect('admin/dataListresearcher/'.$this->uri->segment(3),"refresh");
		
		}else{
		$config['base_url']=base_url()."admin/dataListresearcher";
		$config['total_rows']=$this->db->count_all("master_user where master_user.user_type_id=3");
		$config['per_page'] =20;
		$config['full_tag_open'] = "<div class='pagination'>";
		$config['full_tag_close']="</div>";
		$config['first_link'] = 'หน้าแรก';
		$config['last_link'] = 'หน้าสุดท้าย';
		$this->pagination->initialize($config);
	
		$this->adminModel->searchResearcher($search=$this->input->post('search'));
		
		$data['menu']="admin/menuAdmin";
		$data['main_content']="admin/dataListresearcher";

		$data['query']=$this->adminModel->searchResearcher($search);//อ่านข้อมูลมาทั้งหมด
		$this->load->view('template', $data);
		}
	}
	public function dataSearchResearcherPremission()
	{$data['who']=$this->whomodel->all();
		if ($this->input->post('search')==null){
			$this->session->set_flashdata('msgSearch', '<div class="n_warning"><p>กรุณากรอกข้อมูลที่ต้องการค้นหา !</p></div>');
			redirect('admin/dataPermissionresearcher/'.$this->uri->segment(3),"refresh");
		}else{
		$config['base_url']=base_url()."admin/dataListresearcher";
		$config['total_rows']=$this->db->count_all("master_user where master_user.user_type_id=3");
		$config['per_page'] =20;
		$config['full_tag_open'] = "<div class='pagination'>";
		$config['full_tag_close']="</div>";
		$config['first_link'] = 'หน้าแรก';
		$config['last_link'] = 'หน้าสุดท้าย';
		$this->pagination->initialize($config);
	
		$this->adminModel->searchResearcher($search=$this->input->post('search'));
		
		$data['menu']="admin/menuAdmin";
		$data['main_content']="admin/dataPermissionresearcher";

		$data['query']=$this->adminModel->searchResearcher($search);
		$this->load->view('template', $data);
		}
	}
	
}
