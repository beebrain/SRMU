<?php class researcherAwardModel extends CI_Model
{
	function __construct() 
	{ 
		parent::__construct();

	}
	public function researcherAward()
	{
		$sql="select *
			  from tb_researcher_award 
			  order by researcherAward_title";
		$query = $this->db->query($sql);
		//return $query->result();
		return $query;
	}
	public function  dataDetail($id)
	{
		//  เตรียมคำาสั่ง
		$sql = "
		select tb_researcher_award.*,`master_user`.*
		from tb_researcher_award INNER JOIN master_user ON `tb_researcher_award`.user_id = master_user.user_id
			where researcherAward_id=?
		";
		// execute  คำาสั่ง SELECT  และกำาหนดข้อมูลที่ได้ให้กับตัวแปร $query
		$query = $this->db->query($sql, array( $id) );
		//  ส่งผลลัพท์กลับไปยังผู้เรียก
		return $query;
	}
	public function savenew_researcherAward($data)
	{
		$this->db->insert('tb_researcher_award', $data);
		$report=array();
		$report['error']=$this->db->_error_number();
		$report['message']=$this->db->_error_message();
		if($report !== 0){
			return TRUE;
		}else
			return FALSE;
	}
	public function deleteresearcherAward($id)
	{
		$sql = "
		Delete
		From tb_researcher_award
		where researcherAward_id=$id
		";
		$query = $this->db->query($sql);
	
	}
	public function searchResearcherAward($search)
	{
		$sql="select tb_researcher_award.*,`master_user`.*
		from tb_researcher_award INNER JOIN master_user ON `tb_researcher_award`.user_id = master_user.user_id
		where tb_researcher_award.researcherAward_name like '%$search%' or tb_researcher_award.researcherAward_branch like '%$search%' or master_user.name_th like '%$search%' or master_user.surname_th like '%$search%' or master_user.name_en like '%$search%' or master_user.surname_en like '%$search%'
	
		";
		$query = $this->db->query($sql, array( $search) );
		//  ส่งผลลัพท์กลับไปยังผู้เรียก
		return $query;
	}
}
