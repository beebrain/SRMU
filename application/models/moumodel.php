<?php class mouModel extends CI_Model
{
	function __construct() 
	{ 
		parent::__construct();
		ob_start();
	}
	public function mou()
	{
		$sql="select *
			  from tb_mou
			  order by mou_name";
		$query = $this->db->query($sql);
		//return $query->result();
		return $query;
	}
	public function  dataDetail($id)
	{
		//  เตรียมคำาสั่ง
		$sql = "
		select *
			from tb_mou
			where mou_id=?
		";
		// execute  คำาสั่ง SELECT  และกำาหนดข้อมูลที่ได้ให้กับตัวแปร $query
		$query = $this->db->query($sql, array( $id) );
		//  ส่งผลลัพท์กลับไปยังผู้เรียก
		return $query;
	}
	public function savenew_Mou($data)
	{
		$this->db->insert('tb_mou', $data);
		return $this->db->insert_id();
	}
	public function deleteMou($id)
	{
		$sql = "
		Delete
		From tb_mou
		where mou_id=$id
		";
		$query = $this->db->query($sql);
		
	}
	public function searchMou($search)
	{
		$sql="select *
		from tb_mou
		where mou_name like '%$search%'
	
		";
		$query = $this->db->query($sql, array( $search) );
		//  ส่งผลลัพท์กลับไปยังผู้เรียก
		return $query;
	}
}