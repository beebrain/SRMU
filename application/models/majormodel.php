<?php 
class MajorModel extends CI_Model
{ 
	
	public function __construct()
	{
		parent::__construct();

	}
	function majorName(){
	
	$sql = "
	select major_name from ref_major order by major_id
	";
	
	$query = $this->db->query($sql);
	
	return $query;
	}
	function major()
	{ 

	$sql = "
	SELECT ref_major.*,ref_department.department_name
	FROM ref_major INNER JOIN ref_department ON ref_major.department_id=ref_department.department_id
	ORDER BY  ref_department.department_name 
	";

	$query = $this->db->query($sql); 

	return $query; 
	} 
	public function savenew_Major($data)
	{
		$this->db->insert('ref_major', $data);
	
	}
	public function deleteMajor($id)
	{
		$sql = "
		Delete
		From ref_major
		where major_id=$id
		";
		$query = $this->db->query($sql);
	
	}
	public function searchMajor($search)
	{
	$sql="sELECT * FROM (`ref_major`) INNER JOIN `ref_department` ON `ref_department`.`department_id` = `ref_major`.`department_id`
	where major_name like '%$search%'
	
	";
	$query = $this->db->query($sql, array( $search) );
	//  ส่งผลลัพท์กลับไปยังผู้เรียก
	return $query;
	}
} 
