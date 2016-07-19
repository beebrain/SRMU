<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends CI_Controller {

	public function __construct()
		{
		 parent::__construct();
		 $this->load->model('newsModel');
		 $this->load->model('mouModel');
		}
	public function index()
		{
			/*$config['base_url']=base_url()."news/dataNews/".$this->uri->segment(3).'/';
			$config['total_rows']=$this->db->count_all("tb_news");
			$config['per_page'] =10;
			$config['full_tag_open'] = "<div class='pagination'>";
			$config['full_tag_close']="</div>";
		
			$this->pagination->initialize($config);*/
			$data['menu']="menu";
			$data['main_content']="dataNews";
			$data['query']=$this->db->get('tb_news');
			//$data['query']=$this->newsModel->searchNews($search);//อ่านข้อมูลมาทั้งหมด
			$this->load->view('template', $data);
		}
		public function mou()
		{
			$data['menu']="menu";
			$data['main_content']="dataMou";
			$data['query']=$this->db->get('tb_mou');
			//$data['query']=$this->newsModel->searchNews($search);//อ่านข้อมูลมาทั้งหมด
			$this->load->view('template', $data);
		}	

	
}
