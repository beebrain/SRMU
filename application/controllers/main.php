<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class  Main extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();

		}
		
	public function index()
		{
			$data['menu']="menu";
			$data['main_content']="main";
			$data['queryNews']=$this->db->order_by('news_date', 'desc')->get_where('tb_news' ,array('status' => 1),7);
		
			$data['queryMOU']=$this->db->order_by('mou_name', 'asc')->get('tb_mou',7);
			$this->load->view('template', $data);
		}
	}