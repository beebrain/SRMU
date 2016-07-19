<?php class researchAwardModel extends CI_Model
{
	function __construct() 
	{ 
		parent::__construct();

	}
	public function researchAward()
	{
		$sql="select *
			  from tb_research_award 
			  order by researchAward_id";
		$query = $this->db->query($sql);
		//return $query->result();
		return $query;
	}
	public function  dataDetail($id)
	{
		//  เตรียมคำาสั่ง
		$sql = "
		SELECT `tb_research_award`.*,tb_research.research_name_th
		FROM (`tb_research_award` INNER JOIN tb_research ON `tb_research_award`.research_id = tb_research.research_id)
			where  researchAward_id=?
		";
		// execute  คำาสั่ง SELECT  และกำาหนดข้อมูลที่ได้ให้กับตัวแปร $query
		$query = $this->db->query($sql, array( $id) );
		//  ส่งผลลัพท์กลับไปยังผู้เรียก
		return $query;
	}
	public function savenew_researchAward($data)
	{
		$this->db->insert('tb_research_award', $data);
	
	}
	public function deleteresearchAward($id)
	{
		$sql = "
		Delete
		From tb_research_award
		where researchAward_id=$id
		";
		$query = $this->db->query($sql);
	
	}
	public function searchresearchAward($search)
	{
		$sql="SELECT `tb_research_award`.*,tb_research.research_name_th
		FROM (`tb_research_award` INNER JOIN tb_research ON `tb_research_award`.research_id = tb_research.research_id)
		where tb_research_award.researchAward_name like '%$search%' or 
		tb_research.research_name_th like '%$search%' or 
		tb_research_award.researchAward_branch like '%$search%' or 
		tb_research_award.researchAward_meeting like '%$search%' ";
		$query = $this->db->query($sql, array( $search) );
		//  ส่งผลลัพท์กลับไปยังผู้เรียก
		return $query;
	}
}
