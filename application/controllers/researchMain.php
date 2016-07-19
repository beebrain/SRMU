<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class  researchMain extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();

			$this->load->model('researcherModel');
			$this->load->model('researchModel');

		}

		public function dataResearch()
		{
			$config['base_url']=base_url()."researchMain/dataResearch";
			$config['total_rows']=$this->db->count_all("tb_research");
			$config['per_page'] =20;
			$config['full_tag_open'] = "<div class='pagination'>";
			$config['full_tag_close']="</div>";
			$config['first_link'] = 'หน้าแรก';
			$config['last_link'] = 'หน้าสุดท้าย';
			$config['uri_segment'] = 3;
			$this->pagination->initialize($config);
			
			$data['menu']="menu";
			$data['main_content']="researchMain/dataResearch";
			//$data['query']=$this->db->get('tb_research',$config['per_page'],$this->uri->segment(3));
			//$this->load->view('template', $data);
			$this->db->select('*');
			$this->db->from('tb_research');
			$this->db->order_by('budget_year desc,research_name_th asc');
			$this->db->limit($config['per_page'],$this->uri->segment(3));
			$data['query']=$this->db->get();
			
			$this->load->view('template', $data);
			;
		
		}
		public function dataDetailResearch()
		{
			$id=$this->uri->segment(3);
			//$iPosition=$this->uri->segment(4);
			$data['menu']="menu";
			$data['main_content']="researchMain/dataDetailResearch";
			$data['queryPartner']=$this->researchModel->dataDetailPartner($id);
 			$data['query']=$this->researchModel->dataDetail($id);
			$data['queryAward']=$this->researchModel->research_award($id);
			$data['queryPre']=$this->researchModel->research_presentation($id);
			$data['queryPub']=$this->researchModel->research_publication($id);
			$data['queryPar']=$this->researchModel->research_partent($id);

			$this->load->view('template', $data);
		}
		public function datasearchResearch()
		{	if ($this->input->post('search')==null){
			$this->session->set_flashdata('msgSearch', '<div class="n_warning"><p>กรุณากรอกข้อมูลที่ต้องการค้นหา</p></div>');
			redirect("main/dataResearch/","refresh");
		
		}else{
			$this->researchModel->searchResearchMain($search=$this->input->post('search'));
			$data['menu']="menu";
			$data['main_content']="researchMain/dataResearch";
			$data['query']=$this->researchModel->searchResearchMain($search);//อ่านข้อมูลมาทั้งหมด
			$this->load->view('template', $data);
			}
		}
		
	}
