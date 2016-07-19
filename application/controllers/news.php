<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {
		
	public function __construct()
		{
		 parent::__construct();
		 $this->load->model('newsModel');
		}
	public function dataNews()
		{
			$config['base_url']=base_url()."news/dataNews/".$this->uri->segment(3).'/';
			$config['total_rows']=$this->db->count_all("tb_news");
			$config['per_page'] =10;
			$config['first_link'] = 'หน้าแรก';
			$config['last_link'] = 'หน้าสุดท้าย';
			$config['full_tag_open'] = "<div class='pagination'>";
			$config['full_tag_close']="</div>";
			$config['uri_segment'] = 4;
		
			$this->pagination->initialize($config);
		
			$this->newsModel->searchNews($search=$this->input->post('search'));
			$data['menu']="staff/menustaff";
			$data['main_content']="news/dataNews";
			$data['query']=$this->db->order_by('news_date', 'desc')->get('tb_news',$config['per_page'],$this->uri->segment(4));
			//$data['query']=$this->newsModel->searchNews($search);//อ่านข้อมูลมาทั้งหมด
			$this->load->view('template', $data);

		}
	public function addNews()
		{
			$data['menu']="staff/menuStaff";
			$data['main_content']="news/addNews";
			$this->load->view('template', $data);
	
		}
		public function dataDetail()
		{
			$id=$this->uri->segment(4);
			$data['menu']="staff/menuStaff";
			$data['main_content']="news/dataDetail";
			$data['query']=$this->newsModel->dataDetail($id);
			$this->load->view('template', $data);
		}
public function savenew_News()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('news_title_value', 'หัวข้อข่าวประชาสัมพันธ์', 'trim|required|xss_clean');
			$this->form_validation->set_rules('news_date_value', 'วันที่ประกาศข่าวสาร', 'required');
		
			if ($this->form_validation->run() == FALSE) {

				$data['menu']="staff/menuStaff";
				$data['main_content']="news/addNews";
				$this->load->view('template', $data);
			}
			else {
				if ($_FILES['file_news']['name']==null){
					$data = array(
						'news_id' => "",
						'news_title' => $this->input->post('news_title_value'),
						'news_detail' => $this->input->post('news_detail_value'),
						'news_date' => $this->input->post('news_date_value'),
						'news_file'  => ""	
					);
					$this->newsModel->savenew_News($data);
					$this->session->set_flashdata('msg', '<div class="n_ok"><p>เพิ่มข้อมูลข่าวสารเรียบร้อย </p></div>');
					redirect("news/dataNews/".$this->uri->segment(3),"refresh");
				}else{		
				$config['upload_path']="fileNewsUpload/";
				$config['allowed_types']="pdf";
				$config['max_size']=10240; 
				$this->load->library('upload', $config);
                $this->upload->initialize($config);
				if ( ! $this->upload->do_upload('file_news'))
				{
						$this->session->set_flashdata('msg', '<div class="n_warning">'.$this->upload->display_errors().'</div>');
						redirect("news/addNews/".$this->uri->segment(3),"refresh");
			
				}
				else
				{
					$file_data = $this->upload->data('file_news');
					$data = array(
							'news_id' => "",
							'news_title' => $this->input->post('news_title_value'),
							'news_detail' => $this->input->post('news_detail_value'),
							'news_date' => $this->input->post('news_date_value'),
							'news_file' =>$file_data['file_name']
					);

					$this->newsModel->savenew_News($data);
					$this->session->set_flashdata('msg', '<div class="n_ok"><p>เพิ่มข้อมูลข่าวสารเรียบร้อย </p></div>');
					redirect("news/dataNews/".$this->uri->segment(3),"refresh");
					}
					
				}
			
				}
		
			}

	public function editNews()

		{
			$id=$this->uri->segment(4);
			$sql="Select* from tb_news where news_id=$id";
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
			$data['main_content']="news/editNews";
			$this->load->view('template', $data);
		
		}
	public function update_News()
		{
			$id=$this->uri->segment(4);
			if ($_FILES['file_news']['name']==null){
					$data = array(
						'news_id' => $this->uri->segment(4),
						'news_title' => $this->input->post('news_title_value'),
						'news_detail' => $this->input->post('news_detail_value'),
						'news_date' => $this->input->post('news_date_value'),
						'status' => $this->input->post('status_value')
						
					);
					$this->db->where("news_id",$id);
					$this->db->update("tb_news",$data);
					$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลข่าวสารเรียบร้อย</p></div>');
					redirect("news/dataNews/".$this->uri->segment(3),"refresh");
				}else{		
				$config['upload_path']="fileNewsUpload/";
				$config['allowed_types']="pdf";
				$config['max_size']=10240; 
				$this->load->library('upload', $config);
                $this->upload->initialize($config);
				if ( ! $this->upload->do_upload('file_news'))
				{
						$this->session->set_flashdata('msg', '<div class="n_warning">'.$this->upload->display_errors().'</div>');
						redirect("news/editNews/".$this->uri->segment(3).'/'.$this->uri->segment(4),"refresh");
			
				}
				else
				{
					$file_data = $this->upload->data('file_news');
					$data = array(
							'news_id' =>$this->uri->segment(4),
							'news_title' => $this->input->post('news_title_value'),
							'news_detail' => $this->input->post('news_detail_value'),
							'news_date' => $this->input->post('news_date_value'),
							'status' => $this->input->post('status_value'),
							'news_file' =>$file_data['file_name']
					);
					$this->db->where("news_id",$id);
					$this->db->update("tb_news",$data);
					$this->session->set_flashdata('msg', '<div class="n_ok"><p>แก้ไขข้อมูลข่าวสารเรียบร้อย</p></div>');
					redirect("news/dataNews/".$this->uri->segment(3),"refresh");

		}
				}
		}
	public function deleteNews(){
			$id=$this->uri->segment(4);
			$sql="Select news_file from tb_news where news_id=$id";
			$query = $this->db->query($sql);
			$query=$query->row_array();
			$files=$query['news_file'];
			if ($files==null)
			{
				$this->newsModel->deleteNews($news_id=$this->uri->segment(4));
			}
			else
			{
				$file_dir="fileNewsUpload/".$files;
				unlink($file_dir);
				$this->newsModel->deleteNews($news_id=$this->uri->segment(4));
			}
			$this->session->set_flashdata('msg', '<div class="n_ok"><p>ลบข้อมูลข่าวสารเรียบร้อย</p></div>');
			redirect("news/dataNews/".$this->uri->segment(3),"refresh");
		}
		public function dataSearchnews()
		{	if ($this->input->post('search')==null){
			$this->session->set_flashdata('msgSearch', '<div class="n_warning"><p>กรุณากรอกข้อมูลที่ต้องการค้นหา</p></div>');
			redirect("news/dataNews/".$this->uri->segment(3),"refresh");
		
		}else{
			$this->newsModel->searchNews($search=$this->input->post('search'));
			$data['menu']="staff/menustaff";
			$data['main_content']="news/dataNews";
			$data['query']=$this->newsModel->searchNews($search);//อ่านข้อมูลมาทั้งหมด
			$this->load->view('template', $data);
		}
		}
}