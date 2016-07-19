<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class  newsMain extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('newsModel');
		}

		public function dataNews()
		{
			$config['base_url']=base_url()."newsMain/dataNews/";
			$config['total_rows']=$this->db->count_all("tb_news");
			$config['per_page'] =10;
			$config['first_link'] = 'หน้าแรก';
			$config['last_link'] = 'หน้าสุดท้าย';
			$config['full_tag_open'] = "<div class='pagination'>";
			$config['full_tag_close']="</div>";
			$config['uri_segment'] = 3;
			$this->pagination->initialize($config);
		
			$this->newsModel->searchNews($search=$this->input->post('search'));
			$data['menu']="menu";
			$data['main_content']="newsMain/dataNews";
			$data['query']=$this->db->order_by('news_date', 'desc')->get_where('tb_news' ,array('status' => 1),$config['per_page'],$this->uri->segment(3));
			$this->load->view('template', $data);

		}
	public function dataDetailNews()
		{
			$id=$this->uri->segment(3);
			$data['menu']="menu";
			$data['main_content']="newsMain/dataDetailNews";
			$data['query']=$this->newsModel->dataDetail($id);
			$this->load->view('template', $data);
		}
		
		public function dataSearchnews()
		{	if ($this->input->post('search')==null){
			$this->session->set_flashdata('msgSearch', '<div class="n_warning"><p>กรุณากรอกข้อมูลที่ต้องการค้นหา</p></div>');
			redirect("newsMain/dataNews/".$this->uri->segment(3),"refresh");
		
		}else{
			$this->newsModel->searchNews($search=$this->input->post('search'));
			$data['menu']="menu";
			$data['main_content']="newsMain/dataNews";
			$data['query']=$this->newsModel->searchNews($search);//อ่านข้อมูลมาทั้งหมด
			$this->load->view('template', $data);
		}
		}
		
		
	}
