<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class  researchAwardMain extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('researchModel');
			$this->load->model('researchAwardModel');

		}
		public function dataResearchAward()
		{
			$config['base_url']=base_url()."researchAwardMain/dataResearchAward/";
			$config['total_rows']=$this->db->count_all("tb_research_award");
			$config['per_page'] =10;
			$config['full_tag_open'] = "<div class='pagination'>";
			$config['full_tag_close']="</div>";
			$config['first_link'] = 'หน้าแรก';
			$config['last_link'] = 'หน้าสุดท้าย';
			$config['uri_segment'] = 3;
			$this->pagination->initialize($config);
		
			$this->researchAwardModel->searchResearchAward($search=$this->input->post('search'));
			$data['menu']="menu";
			$data['main_content']="researchAwardMain/dataResearchAward";
			$data['query']=$this->db->order_by('researchAward_name', 'asc')->get('tb_research_award',$config['per_page'],$this->uri->segment(3));
				
			
			$this->load->view('template', $data);
		
		}
		public function dataDetailResearchAward()
		{
			$id=$this->uri->segment(3);
			$data['menu']="menu";
			$data['main_content']="researchAwardMain/dataDetailResearchAward";
			$data['query']=$this->researchAwardModel->dataDetail($id);
			$this->load->view('template', $data);
		}
		
		public function dataSearchRsearchAward()
		{	if ($this->input->post('search')==null){
			$this->session->set_flashdata('msgSearch', '<div class="n_warning"><p>กรุณากรอกข้อมูลที่ต้องการค้นหา</p></div>');
			redirect("researchAwardMain/dataResearchAward/".$this->uri->segment(3),"refresh");
		
		}else{
			$this->researchAwardModel->searchresearchAward($search=$this->input->post('search'));
			$data['menu']="menu";
			$data['main_content']="researchAwardMain/dataResearchAward";
			$data['query']=$this->researchAwardModel->searchresearchAward($search);//อ่านข้อมูลมาทั้งหมด
			$this->load->view('template', $data);
		}
		}
	}