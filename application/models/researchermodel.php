<?php
class ResearcherModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function allResearcher()
	{
		$sql = "SELECT `master_user`.*,ref_position.*
FROM (`master_user` INNER JOIN ref_position ON `master_user`.position_id = ref_position.position_id)	
where (`master_user`.`user_type_id` = 3)";
		$query = $this->db->query($sql);
		return $query;
	}
	public function  dataOneresearcher($id)
	{
		//  เตรียมคำาสั่ง
		$sql = "
		SELECT `master_user`.*,ref_user_type.*, ref_position.*,ref_major.*,ref_department.*
		FROM (`master_user` INNER JOIN ref_user_type ON `master_user`.user_type_id = ref_user_type.user_type_id)
		INNER JOIN ref_position ON `master_user`.position_id = ref_position.position_id
		INNER JOIN ref_major ON `master_user`.major_id = ref_major.major_id
		INNER JOIN ref_department ON `ref_major`.department_id = ref_department.department_id
		where user_type_name='ผู้วิจัย'and user_id=?
		";
		// execute  คำาสั่ง SELECT  และกำาหนดข้อมูลที่ได้ให้กับตัวแปร $query
		$query = $this->db->query($sql, array( $id) );
		//  ส่งผลลัพท์กลับไปยังผู้เรียก
		return $query;
	}
	public function update_Researcher($id,$ara){
		$this->db->where("user_id",$id);
		$this->db->update("master_user",$ara);
	}
public function researcher_research($id){
		$sql = "select master_user.*,tb_research.*
				FROM (`master_user` INNER JOIN tb_research ON `master_user`.user_id = tb_research.user_id)
				where master_user.user_id=? ";
		$query = $this->db->query($sql, array( $id) );
		return $query;
	}
	
public function partner_in_research($id){
		$sql = "select distinct  research_researcher.research_id,master_user.user_id
FROM (`research_researcher` Inner JOIN master_user 
ON research_researcher.researcher_id=master_user.user_id)
				where master_user.user_id=? ";
		$query = $this->db->query($sql, array( $id) );
		return $query;
}
	public function researcher_award($id){
		$sql = "select master_user.*,tb_researcher_award.*
FROM (`master_user` INNER JOIN tb_researcher_award ON `master_user`.user_id = tb_researcher_award.user_id)
				where master_user.user_id=? ";
		$query = $this->db->query($sql, array( $id) );
		return $query;
	}

}