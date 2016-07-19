<?php class publicationModel extends CI_Model
{
	function __construct() 
	{ 
		parent::__construct();

	}
	public function publication()
	{
		$sql="select *
			  from tb_publication 
			  order by publication_id";
		$query = $this->db->query($sql);
		//return $query->result();
		return $query;
	}
	public function  dataDetail($id)
	{
		//  เตรียมคำาสั่ง
		$sql = "
		SELECT `tb_publication`.*,tb_research.*
		FROM (`tb_publication` INNER JOIN tb_research ON `tb_publication`.research_id = tb_research.research_id)
			where  publication_id=?
		";
		// execute  คำาสั่ง SELECT  และกำาหนดข้อมูลที่ได้ให้กับตัวแปร $query
		$query = $this->db->query($sql, array( $id) );
		//  ส่งผลลัพท์กลับไปยังผู้เรียก
		return $query;
	}
	public function  dataDetailPart($id)
	{
		$sql = "
			SELECT `tb_publication`.*,tb_research.*,research_researcher.*,tb_research_partner.*
FROM (`tb_publication` INNER JOIN tb_research ON `tb_publication`.research_id = tb_research.research_id)
inner JOIN research_researcher ON `tb_research`.research_id = research_researcher.research_id
inner  JOIN tb_research_partner ON `tb_research`.research_id = tb_research_partner.research_id
	
			where  publication_id=?
		";
		// execute  คำาสั่ง SELECT  และกำาหนดข้อมูลที่ได้ให้กับตัวแปร $query
		$query = $this->db->query($sql, array( $id) );
		//  ส่งผลลัพท์กลับไปยังผู้เรียก
		return $query;
	}
	public function savenew_publication($data)
	{
		$this->db->insert('tb_publication', $data);
	
	}
	public function deletepublication($id)
	{
		$sql = "
		Delete
		From tb_publication
		where publication_id=$id
		";
		$query = $this->db->query($sql);
	
	}
	public function searchpublication($search)
	{
		$sql="
		SELECT `tb_publication`.*,tb_research.research_name_th
		FROM (`tb_publication` INNER JOIN tb_research ON `tb_publication`.research_id = tb_research.research_id)
		where tb_publication.publication_name like '%$search%' or
		tb_publication.journal_name like '%$search%' or
		tb_publication.publication_name like '%$search%' or
		tb_research.research_name_th like '%$search%' or
		tb_publication.publication_keyword like '%$search%'
	
		";
		$query = $this->db->query($sql, array( $search) );
		//  ส่งผลลัพท์กลับไปยังผู้เรียก
		return $query;
	}
}

