<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class fund extends CI_Controller {
		
	public function __construct()
		{
		 parent::__construct();
		 $this->load->model('fundModel');
		 $this->load->model('whomodel');

		}
	public function dataFund()
		{	
			$config['base_url']=base_url()."fund/dataFund/".$this->uri->segment(3).'/';
			$config['total_rows']=$this->db->count_all("ref_fund");
				$config['per_page'] =10;
		$config['first_link'] = 'หน้าแรก';
		$config['last_link'] = 'หน้าสุดท้าย';
		$config['full_tag_open'] = "<div class='pagination'>";
		$config['full_tag_close']="</div>";
		$config['uri_segment'] = 4;
				
			$this->pagination->initialize($config);
			
			$this->fundModel->searchFund($search=$this->input->post('search'));
	
			$data['menu']="staff/menuStaff";
			$data['main_content']="fund/dataFund";
			$data['query']=$this->db->order_by('fund_name', 'asc')->get('ref_fund',$config['per_page'],$this->uri->segment(4));
			$this->load->view('template', $data);
				
		}
	public function addFund()
	{	
		$data['menu']="staff/menuStaff";
		$data['main_content']="fund/addFund";
		$this->load->view('template', $data);
	}
	public function savenew_Fund()
	{	
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('fund_name_value', 'แหล่งทุนวิจัย', 'trim|required|xss_clean');
	
		if ($this->form_validation->run() == FALSE) {
	
			$data['menu']="staff/menuStaff";
			$data['main_content']="fund/addFund";
			$this->load->view('template', $data);
		}
		else {
			$data = array(
					'fund_id' =>"",
					'fund_name' => $this->input->post('fund_name_value'),
					'fund_type' => $this->input->post('fund_type_value'),
			);
			$this->fundModel->savenew_Fund($data);
	
				$this->session->set_flashdata('msg', '<div class="n_ok"><p>เพิ่มข้อมูลแหล่งทุนวิจัยเรียบร้อย</p></div>');
				redirect("fund/dataFund/".$this->uri->segment(3),"refresh");
		}
	}
	public function editFund()
	{	
		$id=$this->uri->segment(4);
		$sql="Select* from ref_fund where fund_id=$id";
		$rs=$this->db->query($sql);
			
		if ($rs->num_rows() == 0)
		{
			$data['rs']=array();
		}
		else
		{
			$data['rs']=$rs->row_array();
		}
		$data['menu']="staff/menuStaff";
		$data['main_content']="fund/editFund";
		$this->load->view('template', $data);
		
	}
	public function update_Fund()
	{	
		$id=$this->uri->segment(4);
		$ara=array
		(
				'fund_id' => $this->uri->segment(4),
				'fund_name' => $this->input->post('fund_name_value'),
				'fund_type' => $this->input->post('fund_type_value'),
		);
	
		$this->db->where("fund_id",$id);
		$this->db->update("ref_fund",$ara);
		
		$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลแหล่งทุนวิจัยเรียบร้อย</p></div>');
		redirect("fund/dataFund/".$this->uri->segment(3),"refresh");
	
	}
	public function deleteFund(){

		$this->fundModel->deleteFund($fund_id=$this->uri->segment(4));
		$this->session->set_flashdata('msg', '<div class="n_ok"><p>ลบข้อมูลแหล่งทุนวิจัยเรียบร้อย</p></div>');
		redirect("fund/dataFund/".$this->uri->segment(3),"refresh");
	}
	public function datasearchFund()
	{
		if ($this->input->post('search')==null){
		$this->session->set_flashdata('msgSearch', '<div class="n_warning"><p>กรุณากรอกข้อมูลที่ต้องการค้นหา</p></div>');
		redirect("fund/dataFund/".$this->uri->segment(3),"refresh");
	
	}else{

		$this->fundModel->searchFund($search=$this->input->post('search'));

			$data['menu']="staff/menuStaff";
			$data['main_content']="fund/dataFund";
			$data['query']=$this->fundModel->searchFund($search);
			$this->load->view('template', $data);
	}
	}
}