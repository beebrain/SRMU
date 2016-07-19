<?php
class institutionModel extends CI_Model {
	
	public  function __construct() {

		parent::__construct();
		ob_start();

	}
	public function institution()
	{
		$sql="select * from ref_institution order by institution_name";
		$query = $this->db->query($sql);
		//return $query->result();
		return $query;
	}
	public function savenew_Institution($data)
	{
		$this->db->insert('ref_institution', $data);
	}
	public function deleteInstitution($id)
	{
		$sql = "
		Delete
		From ref_institution
		where institution_id=$id
		";
		$query = $this->db->query($sql);
	}
	public function searchInstitution($search)
	{
		$sql="select *
		from ref_institution
		where institution_name like '%$search%'
	
		";
		$query = $this->db->query($sql, array( $search) );
		//  ส่งผลลัพท์กลับไปยังผู้เรียก
		return $query;
	}
}