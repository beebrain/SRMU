<?php class partentModel extends CI_Model
{
	function __construct() 
	{ 
		parent::__construct();

	}
	public function partent()
	{
		$sql="select *
			  from tb_partent 
			  order by partent_id";
		$query = $this->db->query($sql);
		//return $query->result();
		return $query;
	}
	public function  dataDetail($id)
	{
		//  เตรียมคำาสั่ง
		$sql = "
		SELECT `tb_partent`.*,tb_research.*
		FROM (`tb_partent` INNER JOIN tb_research ON `tb_partent`.research_id = tb_research.research_id)
			where  partent_id=?
		";
		// execute  คำาสั่ง SELECT  และกำาหนดข้อมูลที่ได้ให้กับตัวแปร $query
		$query = $this->db->query($sql, array( $id) );
		//  ส่งผลลัพท์กลับไปยังผู้เรียก
		return $query;
	}
	public function  dataDetailPart($id)
	{
		$sql = "
			SELECT `tb_partent`.*,tb_research.*,research_researcher.*,tb_research_partner.*
FROM (`tb_partent` INNER JOIN tb_research ON `tb_partent`.research_id = tb_research.research_id)
inner JOIN research_researcher ON `tb_research`.research_id = research_researcher.research_id
inner  JOIN tb_research_partner ON `tb_research`.research_id = tb_research_partner.research_id
	
			where  partent_id=?
		";
		// execute  คำาสั่ง SELECT  และกำาหนดข้อมูลที่ได้ให้กับตัวแปร $query
		$query = $this->db->query($sql, array( $id) );
		//  ส่งผลลัพท์กลับไปยังผู้เรียก
		return $query;
	}
	public function savenew_partent($data)
	{
		$this->db->insert('tb_partent', $data);
	
	}
	public function deletepartent($id)
	{
		$sql = "
		Delete
		From tb_partent
		where partent_id=$id
		";
		$query = $this->db->query($sql);
	
	}
	public function searchpartent($search)
	{
		$sql="select *
		from tb_partent
		where partent_name like '%$search%'
	
		";
		$query = $this->db->query($sql, array( $search) );
		//  ส่งผลลัพท์กลับไปยังผู้เรียก
		return $query;
	}
	public function searchpartent1($search)
	{
		$sql="SELECT `tb_partent`.*,tb_research.research_name_th
		FROM (`tb_partent` INNER JOIN tb_research ON `tb_partent`.research_id = tb_research.research_id)
		where (tb_partent.partent_type) = 1 and
		tb_partent.partent_name like '%$search%' or
		tb_research.research_name_th like '%$search%' or
		tb_partent.partent_no like '%$search%'
	
		";
		$query = $this->db->query($sql, array( $search) );
		//  ส่งผลลัพท์กลับไปยังผู้เรียก
		return $query;
	}
	public function searchpartent2($search)
	{
		$sql="SELECT `tb_partent`.*,tb_research.research_name_th
		FROM (`tb_partent` INNER JOIN tb_research ON `tb_partent`.research_id = tb_research.research_id)
		where (tb_partent.partent_type) = 2 and
		tb_partent.partent_name like '%$search%' or
		tb_research.research_name_th like '%$search%' or
		tb_partent.partent_no like '%$search%'
	
		";
		$query = $this->db->query($sql, array( $search) );
		//  ส่งผลลัพท์กลับไปยังผู้เรียก
		return $query;
	}
	public function searchpartent3($search)
	{
		$sql="SELECT `tb_partent`.*,tb_research.research_name_th
		FROM (`tb_partent` INNER JOIN tb_research ON `tb_partent`.research_id = tb_research.research_id)
		where (tb_partent.partent_type) = 3 and
		tb_partent.partent_name like '%$search%' or
		tb_research.research_name_th like '%$search%' or
		tb_partent.partent_no like '%$search%'
	
		";
		$query = $this->db->query($sql, array( $search) );
		//  ส่งผลลัพท์กลับไปยังผู้เรียก
		return $query;
	}
}
