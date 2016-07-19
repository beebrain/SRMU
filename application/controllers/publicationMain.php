<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class publicationMain extends CI_Controller {
		
	public function __construct()
		{
		 parent::__construct();

		 $this->load->model('publicationModel');
		 $this->load->model('researchModel');
		}
	public function datapublication()
		{
			$config['base_url']=base_url()."publicationMain/datapublication/";
			$config['total_rows']=$this->db->count_all("tb_publication");
			$config['per_page'] =10;
			$config['full_tag_open'] = "<div class='pagination'>";
			$config['full_tag_close']="</div>";
			$config['first_link'] = 'หน้าแรก';
			$config['last_link'] = 'หน้าสุดท้าย';
			$config['uri_segment'] = 3;
			$this->pagination->initialize($config);

			$data['menu']="menu";
			$data['main_content']="publicationMain/datapublication";
			$data['query']=$this->db->order_by('publication_name', 'asc')->get('tb_publication',$config['per_page'],$this->uri->segment(3));
			
			
			$this->load->view('template', $data);

		}

		public function datadetailpublication()
		{
			$id=$this->uri->segment(3);
			$data['menu']="menu";
			$data['main_content']="publicationMain/datadetailpublication";
			$data['queryPart']=$this->publicationModel->dataDetailPart($id);
			$data['query']=$this->publicationModel->dataDetail($id);
			$this->load->view('template', $data);
		}
	
		public function datasearchpublication()
		{	if ($this->input->post('search')==null){
			$this->session->set_flashdata('msgSearch', '<div class="n_warning"><p>กรุณากรอกข้อมูลที่ต้องการค้นหา</p></div>');
			redirect("publicationMain/datapublication/".$this->uri->segment(3),"refresh");
		
		}else{
			$this->publicationModel->searchpublication($search=$this->input->post('search'));
			$data['menu']="menu";
			$data['main_content']="publicationMain/datapublication";
			$data['query']=$this->publicationModel->searchpublication($search);//อ่านข้อมูลมาทั้งหมด
			$this->load->view('template', $data);
		}
		}
}
