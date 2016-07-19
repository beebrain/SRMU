<?php class adminModel extends CI_Model
{
	function __construct() 
	{ 
		parent::__construct();
	}
	
	public function  dataAlluser()
	{
		$sql = "
		SELECT *
		FROM master_user 			
		";
		$query = $this->db->query($sql, array( ) );
		return $query;
	}
	public function  dataAdmin()
	{
	//  เตรียมคำาสั่ง
		$sql = " 
		SELECT master_user.*,ref_user_type.*
				FROM master_user INNER JOIN ref_user_type ON `master_user`.user_type_id=ref_user_type.user_type_id
				where user_type_name='ผู้ดูแลระบบ'
		"; 
		// execute  คำาสั่ง SELECT  และกำาหนดข้อมูลที่ได้ให้กับตัวแปร $query 
		$query = $this->db->query($sql, array( ) ); 
		//  ส่งผลลัพท์กลับไปยังผู้เรียก
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
	
	public function  dataOnestaff($id)
	{
		//  เตรียมคำาสั่ง
		$sql = "
		SELECT master_user.*,ref_user_type.*
		FROM master_user INNER JOIN ref_user_type ON `master_user`.user_type_id=ref_user_type.user_type_id
		where user_type_name='เจ้าหน้าที่'and user_id=?
		";
		// execute  คำาสั่ง SELECT  และกำาหนดข้อมูลที่ได้ให้กับตัวแปร $query
		$query = $this->db->query($sql, array( $id) );
		//  ส่งผลลัพท์กลับไปยังผู้เรียก
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
	public function searchStaff($search)
	{
		$sql="select *
			from master_user 
			where (user_type_id=2) AND
			(name_th like '%$search%'or surname_th like '%$search%')

				";
		$query = $this->db->query($sql, array( $search) );
		//  ส่งผลลัพท์กลับไปยังผู้เรียก
		return $query;
	}
	
	public function searchResearcher($search)
	{
		$sql="SELECT `master_user`.*, ref_position.*
		FROM `master_user` INNER JOIN ref_position ON `master_user`.position_id = ref_position.position_id
		where (user_type_id=3) AND
		(name_th like '%$search%'or surname_th like '%$search%')
	
		";
		$query = $this->db->query($sql, array( $search) );
		//  ส่งผลลัพท์กลับไปยังผู้เรียก
		return $query;
	}
	public function savenew_staff($data){
		
		$this->db->insert('master_user', $data);
		$report=array();
		$report['error']=$this->db->_error_number();
		$report['message']=$this->db->_error_message();
		if($report !== 0){
			return TRUE;
		}else 
			return FALSE;
	}
	public function delete_staff($id){
		$sql = "
		Delete 
		From master_user
		where user_id=$id
		";
		$query = $this->db->query($sql);
		$report=array();
		$report['error']=$this->db->_error_number();
		$report['message']=$this->db->_error_message();
		if($report !== 0){
			return TRUE;
		}else
			return FALSE;
	}
	public function edit_staff($id)
	{
		$this->db->where("user_id",$id);
		$this->db->update("master_user",$ara);
		$report=array();
		$report['error']=$this->db->_error_number();
				$report['message']=$this->db->_error_message();
						if($report !== 0){
						return TRUE;
						}else
							return FALSE;
	}

} // end class
 