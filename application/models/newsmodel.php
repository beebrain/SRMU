<?php class newsModel extends CI_Model
{
	function __construct() 
	{ 
		parent::__construct();

	}
	public function news()
	{
		$sql="select *
			  from tb_news 
			  order by news_title";
		$query = $this->db->query($sql);
		//return $query->result();
		return $query;
	}
	public function  dataDetail($id)
	{
		//  เตรียมคำาสั่ง
		$sql = "
		select *
			from tb_news
			where news_id=?
		";
		// execute  คำาสั่ง SELECT  และกำาหนดข้อมูลที่ได้ให้กับตัวแปร $query
		$query = $this->db->query($sql, array( $id) );
		//  ส่งผลลัพท์กลับไปยังผู้เรียก
		return $query;
	}
	public function savenew_News($data)
	{
		$this->db->insert('tb_news', $data);
		$report=array();
		$report['error']=$this->db->_error_number();
		$report['message']=$this->db->_error_message();
		if($report !== 0){
			return TRUE;
		}else
			return FALSE;
	}
	public function deleteNews($id)
	{
		$sql = "
		Delete
		From tb_news
		where news_id=$id
		";
		$query = $this->db->query($sql);
	
	}
	public function searchNews($search)
	{
		$sql="select *
		from tb_news
		where news_title like '%$search%'
	
		";
		$query = $this->db->query($sql, array( $search) );
		//  ส่งผลลัพท์กลับไปยังผู้เรียก
		return $query;
	}
}