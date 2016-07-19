<?php class presentationModel extends CI_Model
{
	function __construct() 
	{ 
		parent::__construct();

	}
	public function presentation()
	{
		$sql="select *
			  from tb_presentation 
			  order by presentation_id";
		$query = $this->db->query($sql);
		//return $query->result();
		return $query;
	}
	public function  dataDetail($id)
	{
		$sql = "
			SELECT `tb_presentation`.*,tb_research.*
		FROM (`tb_presentation` INNER JOIN tb_research ON `tb_presentation`.research_id = tb_research.research_id)
		
			where  presentation_id=?
		";
		// execute  คำาสั่ง SELECT  และกำาหนดข้อมูลที่ได้ให้กับตัวแปร $query
		$query = $this->db->query($sql, array( $id) );
		//  ส่งผลลัพท์กลับไปยังผู้เรียก
		return $query;
	}
	public function  dataDetailPart($id)
	{
		$sql = "
			SELECT `tb_presentation`.*,tb_research.*,tb_research_partner.*
FROM (`tb_presentation` INNER JOIN tb_research ON `tb_presentation`.research_id = tb_research.research_id)
inner  JOIN tb_research_partner ON `tb_research`.research_id = tb_research_partner.research_id

			where  presentation_id=?
		";
		// execute  คำาสั่ง SELECT  และกำาหนดข้อมูลที่ได้ให้กับตัวแปร $query
		$query = $this->db->query($sql, array( $id) );
		//  ส่งผลลัพท์กลับไปยังผู้เรียก
		return $query;
	}
	public function savenew_presentation($data)
	{
		$this->db->insert('tb_presentation', $data);
	
	}
	public function deletepresentation($id)
	{
		$sql = "
		Delete
		From tb_presentation
		where presentation_id=$id
		";
		$query = $this->db->query($sql);
	
	}
	public function searchpresentation($search)
	{
		$sql="SELECT `tb_presentation`.*,tb_research.research_name_th
		FROM (`tb_presentation` INNER JOIN tb_research ON `tb_presentation`.research_id = tb_research.research_id)
		where tb_presentation.presentation_name like '%$search%' or 
		tb_research.research_name_th like '%$search%' or 
		tb_presentation.presentation_meeting like '%$search%'	
		";
		$query = $this->db->query($sql, array( $search) );
		//  ส่งผลลัพท์กลับไปยังผู้เรียก
		return $query;
	}
}
