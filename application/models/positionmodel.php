<?php
class positionModel extends CI_Model {
	
	public  function __construct() {

		parent::__construct();
		ob_start();

	}
	public function position()
	{
		$sql="select * from ref_position order by position_name";
		$query = $this->db->query($sql);
		//return $query->result();
		return $query;
	}
	public function savenew_Position($data)
	{
		$this->db->insert('ref_position', $data);
	}
	public function deletePosition($id)
	{
		$sql = "
		Delete
		From ref_position
		where position_id=$id
		";
		$query = $this->db->query($sql);
	}
	public function searchPosition($search)
	{
		$sql="select *
		from ref_position
		where position_name like '%$search%' and position_name_EN like '%$search%'
		";
		$query = $this->db->query($sql, array( $search) );
		//  ส่งผลลัพท์กลับไปยังผู้เรียก
		return $query;
	}
}