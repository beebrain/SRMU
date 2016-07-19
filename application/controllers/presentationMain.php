<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class presentationMain extends CI_Controller {
		
	public function __construct()
		{
		 parent::__construct();
		 $this->load->model('presentationModel');
		 $this->load->model('researchModel');
		}
	public function dataPresentation()
		{
			$config['base_url']=base_url()."presentationMain/dataPresentation/";
			$config['total_rows']=$this->db->count_all("tb_presentation");
			$config['per_page'] =10;
			$config['full_tag_open'] = "<div class='pagination'>";
			$config['full_tag_close']="</div>";
			$config['first_link'] = 'หน้าแรก';
			$config['last_link'] = 'หน้าสุดท้าย';
			$config['uri_segment'] = 3;
			$this->pagination->initialize($config);
		
			//$this->presentationModel->searchpresentation($search=$this->input->post('search'));
			$data['menu']="menu";
			$data['main_content']="presentationMain/dataPresentation";
			$data['query']=$this->db->order_by('presentation_name', 'asc')->get('tb_presentation',$config['per_page'],$this->uri->segment(3));
			
			//$data['query']=$this->presentationModel->searchpresentation($search);//อ่านข้อมูลมาทั้งหมด
			$this->load->view('template', $data);

		}

		public function dataDetailPresentation()
		{
			$id=$this->uri->segment(3);
			$data['menu']="menu";
			$data['main_content']="presentationMain/dataDetailPresentation";
			$data['queryPart']=$this->presentationModel->dataDetailPart($id);
			$data['query']=$this->presentationModel->dataDetail($id);
			$this->load->view('template', $data);
		}
	
		public function datasearchPresentation()
		{	if ($this->input->post('search')==null){
			$this->session->set_flashdata('msgSearch', '<div class="n_warning"><p>กรุณากรอกข้อมูลที่ต้องการค้นหา</p></div>');
			redirect("presentationMain/dataPresentation/".$this->uri->segment(3),"refresh");
		
		}else{
			$this->presentationModel->searchPresentation($search=$this->input->post('search'));
			$data['menu']="menu";
			$data['main_content']="presentationMain/dataPresentation";
			$data['query']=$this->presentationModel->searchPresentation($search);//อ่านข้อมูลมาทั้งหมด
			$this->load->view('template', $data);
		}
		}
}
