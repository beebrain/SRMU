<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sitiMain extends CI_Controller {
		
	public function __construct()
		{
		 parent::__construct();
		 $this->load->model('partentModel');
		 $this->load->model('researchModel');
		}
	public function datasiti()
		{
			$config['base_url']=base_url()."sitiMain/datasiti/";
			$config['total_rows']=$this->db->count_all("tb_partent where partent_type=1");
			$config['per_page'] =10;
			$config['full_tag_open'] = "<div class='pagination'>";
			$config['full_tag_close']="</div>";
			$config['first_link'] = 'หน้าแรก';
			$config['last_link'] = 'หน้าสุดท้าย';
			$config['uri_segment'] = 3;
			$this->pagination->initialize($config);
		
			
			$data['menu']="menu";
			$data['main_content']="sitiMain/datasiti";
			$data['query']=$this->db->order_by('partent_name', 'asc')->get_where('tb_partent', array('partent_type' => 1),$config['per_page'],$this->uri->segment(3));
			
			$this->load->view('template', $data);

		}
	
		public function datadetailsiti()
		{
			$id=$this->uri->segment(3);
			$data['menu']="menu";
			$data['main_content']="sitiMain/datadetailsiti";
			$data['queryPart']=$this->partentModel->dataDetailPart($id);
			$data['query']=$this->partentModel->dataDetail($id);
			$this->load->view('template', $data);
		}
	
		public function datasearchsiti()
		{	if ($this->input->post('search')==null){
			$this->session->set_flashdata('msgSearch', '<div class="n_warning"><p>กรุณากรอกข้อมูลที่ต้องการค้นหา</p></div>');
			redirect("sitiMain/datasiti/","refresh");
		
		}else{
			$this->partentModel->searchpartent1($search=$this->input->post('search'));
			$data['menu']="menu";
			$data['main_content']="sitiMain/datasiti";
			$data['query']=$this->partentModel->searchpartent1($search);//อ่านข้อมูลมาทั้งหมด
			$this->load->view('template', $data);
		}
		}
}