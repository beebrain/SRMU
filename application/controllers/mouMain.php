<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class  mouMain extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('mouModel');
		}
		

	public function dataMou()
		{
			$config['base_url']=base_url()."mouMain/dataMou/";
			$config['total_rows']=$this->db->count_all("tb_mou");
			$config['per_page'] =10;
			$config['first_link'] = 'หน้าแรก';
			$config['last_link'] = 'หน้าสุดท้าย';
			$config['full_tag_open'] = "<div class='pagination'>";
			$config['full_tag_close']="</div>";
			$config['uri_segment'] = 3;
			$this->pagination->initialize($config);
			$this->mouModel->searchMou($search=$this->input->post('search'));
			$data['menu']="menu";
			$data['main_content']="mouMain/dataMou";
			$data['query']=$this->db->order_by('mou_name', 'asc')->get('tb_mou',$config['per_page'],$this->uri->segment(3));
			$this->load->view('template', $data);
		}
		public function dataDetailMou()
		{
			$id=$this->uri->segment(3);
			$data['menu']="menu";
			$data['main_content']="mouMain/dataDetailMou";
			$data['query']=$this->mouModel->dataDetail($id);
			$this->load->view('template', $data);
		}
		public function datasearchMou()
		{	if ($this->input->post('search')==null){
			$this->session->set_flashdata('msgSearch', '<div class="n_warning"><p>กรุณากรอกข้อมูลที่ต้องการค้นหา</p></div>');
			redirect("mouMain/dataMou/".$this->uri->segment(3),"refresh");
		
		}else{
		
			$this->mouModel->searchMou($search=$this->input->post('search'));
			$data['menu']="menu";
			$data['main_content']="mouMain/dataMou";
			$data['query']=$this->mouModel->searchMou($search);//อ่านข้อมูลมาทั้งหมด
			$this->load->view('template', $data);
		}
		}

		
	}
