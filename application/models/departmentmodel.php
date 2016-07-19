<?php 
class departmentModel extends CI_Model
{ 
	
	public  function __construct() {

		parent::__construct();


	}
	public function department()
	{
		$sql="select * from ref_department order by department_name";
		$query = $this->db->query($sql);
		//return $query->result();
		return $query;
	}
	public function savenew_Department($data)
	{
		$this->db->insert('ref_department', $data);
		
	}
	public function deleteDepartment($id)
	{
		$sql = "
		Delete
		From ref_department
		where department_id=$id
		";
		$query = $this->db->query($sql);
	
	}
	public function searchDepartment($search)
	{
		$sql="select *
		from ref_department
		where department_name like '%$search%'
	
		";
		$query = $this->db->query($sql, array( $search) );
		//  ส่งผลลัพท์กลับไปยังผู้เรียก
		return $query;
	}
}