<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class likasitMain extends CI_Controller {
		
	public function __construct()
		{
		 parent::__construct();
		 $this->load->model('partentModel');
		 $this->load->model('researchModel');
		}
	public function datalikasit()
		{
			$config['base_url']=base_url()."likasitMain/datalikasit/";
			$config['total_rows']=$this->db->count_all("tb_partent where partent_type=3");
			$config['per_page'] =10;
			$config['full_tag_open'] = "<div class='pagination'>";
			$config['full_tag_close']="</div>";
			$config['first_link'] = 'หน้าแรก';
			$config['last_link'] = 'หน้าสุดท้าย';
			$config['uri_segment'] = 3;
			$this->pagination->initialize($config);
		
			
			$data['menu']="menu";
			$data['main_content']="likasitMain/datalikasit";
			$data['query']=$this->db->order_by('partent_name', 'asc')->get_where('tb_partent', array('partent_type' => 3),$config['per_page'],$this->uri->segment(3));
			
			$this->load->view('template', $data);

		}
	
		public function datadetaillikasit()
		{
			$id=$this->uri->segment(3);
			$data['menu']="menu";
			$data['main_content']="likasitMain/datadetaillikasit";
			$data['queryPart']=$this->partentModel->dataDetailPart($id);
			$data['query']=$this->partentModel->dataDetail($id);
			$this->load->view('template', $data);
		}
	
		public function datasearchlikasit()
		{	if ($this->input->post('search')==null){
			$this->session->set_flashdata('msgSearch', '<div class="n_warning"><p>กรุณากรอกข้อมูลที่ต้องการค้นหา</p></div>');
			redirect("likasitMain/datalikasit/","refresh");
		
		}else{
			$this->partentModel->searchpartent3($search=$this->input->post('search'));
			$data['menu']="menu";
			$data['main_content']="likasitMain/datalikasit";
			$data['query']=$this->partentModel->searchpartent3($search);//อ่านข้อมูลมาทั้งหมด
			$this->load->view('template', $data);
		}
		}
}