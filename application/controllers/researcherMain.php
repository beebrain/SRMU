<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class  researcherMain extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('staffModel');
			$this->load->model('researcherModel');
			$this->load->model('researchModel');
			$this->load->model('researcherAwardModel');

		}
	public function dataResearcher()
		{
			$config['base_url']=base_url()."researcherMain/dataResearcher/";
			$config['total_rows']=$this->db->count_all('researcherView');
			$config['per_page'] =10;
			$config['first_link'] = 'หน้าแรก';
			$config['last_link'] = 'หน้าสุดท้าย';
			$config['full_tag_open'] = "<div class='pagination'>";
			$config['full_tag_close']="</div>";
			$config['uri_segment'] = 3;
			$this->pagination->initialize($config);

			$this->staffModel->searchResearcher($search=$this->input->post('search'));
		
			$data['menu']="menu";
			$data['main_content']="researcherMain/dataResearcher";
			
			$data['query']=$this->db->order_by('name_th', 'asc')->get_where('master_user', array('user_type_id' => 3),$config['per_page'],$this->uri->segment(3));
			
			$this->load->view('template', $data);
			;
		
		}
		public function dataDetailResearcher()
		{  	$id=$this->uri->segment(3);
			$data['menu']="menu";
			$data['main_content']="researcherMain/dataDetailResearcher";
			$data['queryResearch']=$this->researcherModel->researcher_research($id);
			$data['partner_in_research']=$this->researcherModel->partner_in_research($id);
			$data['queryAward']=$this->researcherModel->researcher_award($id);
			$data['query']=$this->staffModel->dataOneresearcher($id);//อ่านข้อมูลมาทั้งหมด
			$this->load->view('template', $data);
		}
	public function dataSearchresearcher()
	{
		if ($this->input->post('search')==null){
			$this->session->set_flashdata('msgSearch', '<div class="n_warning"><p>กรุณากรอกข้อมูลที่ต้องการค้นหา</p></div>');
			redirect('researcherMain/dataResearcher/'.$this->uri->segment(3),"refresh");
		}else{

	
			$this->staffModel->searchResearcherMain($search=$this->input->post('search'));
	
			$data['menu']="menu";
			$data['main_content']="researcherMain/dataResearcher";
			$data['query']=$this->staffModel->searchResearcherMain($search);//อ่านข้อมูลมาทั้งหมด
			$this->load->view('template', $data);
		}
	}
		
	}

