<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class  researcherAwardMain extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();

			$this->load->model('researcherAwardModel');
			$this->load->model('researchModel');

		}
		

		public function dataResearcherAward()
		{
			$config['base_url']=base_url()."researcherAwardMain/dataResearcherAward/";
			$config['total_rows']=$this->db->count_all("tb_researcher_award");
			$config['per_page'] =10;
			$config['full_tag_open'] = "<div class='pagination'>";
			$config['full_tag_close']="</div>";
			$config['first_link'] = 'หน้าแรก';
			$config['last_link'] = 'หน้าสุดท้าย';
			$config['uri_segment'] = 3;
			$this->pagination->initialize($config);
		
			$this->researcherAwardModel->searchResearcherAward($search=$this->input->post('search'));
			$data['menu']="menu";
			$data['main_content']="researcherAwardMain/dataResearcherAward";
			$data['query']=$this->db->order_by('researcherAward_date',' asc')->get('tb_researcher_award',$config['per_page'],$this->uri->segment(3));
				
			
			$this->load->view('template', $data);
		
		}
		public function dataDetailResearcherAward()
		{
			$id=$this->uri->segment(3);
			$iPosition=$this->uri->segment(4);
			$data['menu']="menu";
			$data['main_content']="researcherAwardMain/dataDetailResearcherAward";
			$data['queryPosition']=$this->researchModel->position($iPosition);
			$data['query']=$this->researcherAwardModel->dataDetail($id);
			$this->load->view('template', $data);
		}
		public function datasearchResearcherAward()
		{	if ($this->input->post('search')==null){
			$this->session->set_flashdata('msgSearch', '<div class="n_warning"><p>กรุณากรอกข้อมูลที่ต้องการค้นหา</p></div>');
			redirect("researcherAwardMain/dataResearcherAward/".$this->uri->segment(3),"refresh");
		
		}else{
			$this->researcherAwardModel->searchResearcherAward($search=$this->input->post('search'));
			$data['menu']="menu";
			$data['main_content']="researcherAwardMain/dataResearcherAward";
			$data['query']=$this->researcherAwardModel->searchResearcherAward($search);//อ่านข้อมูลมาทั้งหมด
			$this->load->view('template', $data);
		}
		}
	}