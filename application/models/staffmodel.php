<?php
class staffModel extends CI_Model {
	
	public  function __construct() {

		parent::__construct();
		

	}

	public function staff() {
		
		$sql="SELECT mas_staff.*,mas_user.*
				FROM mas_staff
				inner JOIN mas_user
			  ";
		$query = $this->db->query($sql);
	    //return $query->result();
		return $query;
	}
	public function dataAllstaff() {
	
		$sql="SELECT master_user.*,ref_user_type.*
				FROM master_user INNER JOIN ref_user_type ON `master_user`.user_type_id=ref_user_type.user_type_id
				where user_type_name='เจ้าหน้าที่'
			  ";
		$query = $this->db->query($sql);
		//return $query->result();
		return $query;
	}
	public function  dataStaff($id)
	{
	 $sql = "
		SELECT *
		FROM master_user
		where user_type_id='2'and user_id=?
		";
		// execute  คำาสั่ง SELECT  และกำาหนดข้อมูลที่ได้ให้กับตัวแปร $query
		$query = $this->db->query($sql, array( $id) );
		//  ส่งผลลัพท์กลับไปยังผู้เรียก
		return $query;
	} 

	public function dataAllresearcher() {
	
		$sql="SELECT `master_user`.*,ref_user_type.*, ref_position.*
		FROM (`master_user` INNER JOIN ref_user_type ON `master_user`.user_type_id = ref_user_type.user_type_id)
		INNER JOIN ref_position ON `master_user`.position_id = ref_position.position_id
	
				where user_type_name='ผู้วิจัย'
			  ";
		$query = $this->db->query($sql);
		//return $query->result();
		return $query;
	}
	public function dataResearcher(){
		$sql="SELECT `master_user`.*, ref_position.*,ref_major.major_name
		FROM (master_user	INNER JOIN ref_position ON `master_user`.position_id = ref_position.position_id)
		INNER JOIN ref_major ON `master_user`.major_id = ref_major.major_id
	
	
				where master_user.user_type_id='3'";
		$query = $this->db->query($sql);
		return $query;
	}
	public function  dataOneresearcher($id)
	{
		//  เตรียมคำาสั่ง
		$sql = "
		SELECT `master_user`.*,ref_user_type.*, ref_position.*,ref_major.*,ref_department.*
		FROM (`master_user` INNER JOIN ref_user_type ON `master_user`.user_type_id = ref_user_type.user_type_id)
		left JOIN ref_position ON `master_user`.position_id = ref_position.position_id
		left JOIN ref_major ON `master_user`.major_id = ref_major.major_id
		left JOIN ref_department ON `ref_major`.department_id = ref_department.department_id
		where user_type_name='ผู้วิจัย'and user_id=?
		";
		// execute  คำาสั่ง SELECT  และกำาหนดข้อมูลที่ได้ให้กับตัวแปร $query
		$query = $this->db->query($sql, array( $id) );
		//  ส่งผลลัพท์กลับไปยังผู้เรียก
		return $query;
	}
	public function searchResearcher($search)
	{
		$sql="SELECT `master_user`.*, ref_position.*
		FROM `master_user` left JOIN ref_position ON `master_user`.position_id = ref_position.position_id
		where (user_type_id=3) AND
		(name_th like '%$search%'or surname_th like '%$search%')
	
		";
		$query = $this->db->query($sql, array( $search) );
		//  ส่งผลลัพท์กลับไปยังผู้เรียก
		return $query;
	}
	public function searchResearcherMain($search)
	{
		$sql="SELECT `master_user`.*,ref_user_type.*, ref_position.*,ref_major.*,ref_department.*
FROM (`master_user` INNER JOIN ref_user_type ON `master_user`.user_type_id = ref_user_type.user_type_id)
		left JOIN ref_position ON `master_user`.position_id = ref_position.position_id
		left JOIN ref_major ON `master_user`.major_id = ref_major.major_id
		left  JOIN ref_department ON `ref_major`.department_id = ref_department.department_id
		where (master_user.user_type_id=3) AND
		(name_th like '%$search%' or surname_th like '%$search%' or name_en like '%$search%' or surname_en like '%$search%'   or major_name like '%$search%'  or department_name like '%$search%' ) 
	
		";
		$query = $this->db->query($sql, array( $search) );
		//  ส่งผลลัพท์กลับไปยังผู้เรียก
		return $query;
	}
	public function savenew_Researcher($data){
		$this->db->insert('master_user', $data);
	}
	public function deleteResearcher($id){
		$sql = "
		Delete
		From master_user
		where user_id=$id
		";
		$query = $this->db->query($sql);
	}
	public function update_Researcher($id,$ara){
		$this->db->where("user_id",$id);
		$this->db->update("master_user",$ara);
	}

}
