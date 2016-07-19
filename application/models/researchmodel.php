<?php class researchModel extends CI_Model
{
	function __construct() 
	{ 
		parent::__construct();

	}
	public function research()
	{
		$sql="select *
			  from tb_research 
			  order by research_name_th";
		$query = $this->db->query($sql);
		//return $query->result();
		return $query;
	}
	public function position($iPosition)
	{
		$sql="SELECT `master_user`.user_id, ref_position.position_name
			 FROM (`master_user` INNER JOIN ref_position ON `master_user`.position_id = ref_position.position_id)
				where master_user.user_id=?
				";
		
		$query = $this->db->query($sql, array( $iPosition) );

		return $query;
	}
	public function positionRe($id)
	{
		$sql="SELECT `master_user`.*, ref_position.*
FROM (`master_user` INNER JOIN ref_position ON `master_user`.position_id = ref_position.position_id)
				where master_user.user_id=?
				";
	
		$query = $this->db->query($sql, array( $id) );
	
		return $query;
	}
	public function savenew_Research($data)
	{
		$this->db->insert('tb_research', $data);
	
	}
	public function savenew_Research_Partner($data,$partner,$partner_in)
	{
		$this->db->insert('tb_research', $data);
		
		$id=$this->db->insert_id();
		$partner['research_id'] = $id;
		$this->db->insert('tb_research_partner', $partner);
		
		for ($i=0;$i<sizeof($partner_in);$i++){
			$data2['research_id'] = $id;
			$data2['researcher_id'] = $partner_in[$i];
			$this->db->insert('research_researcher', $data2);
		}
		//$partner_in['research_id']= $id;
		//$this->db->insert('research_researcher', $partner_in);
		
		//$this->db->insert('research_researcher', $partner_in);
	}
	
	public function dataDetail($id){
		$sql = "
		SELECT `tb_research`.*,ref_fund.*,tb_research_partner.*
		FROM (`tb_research` INNER JOIN ref_fund ON `tb_research`.fund_id = ref_fund.fund_id)
		
		Left JOIN tb_research_partner ON `tb_research`.research_id = tb_research_partner.research_id
				where tb_research.research_id=?
		";
		
		$query = $this->db->query($sql, array( $id) );
		return $query;
	}
	public function dataResearch($id){
		$sql = "
		SELECT `tb_research`.*
		FROM (`tb_research` )
				
			where research_id=?
		";
	
		$query = $this->db->query($sql, array( $id) );
		return $query;
	}
	public function dataDetailMain($id){
		$sql = "
		select tb_research.*,master_user.*,ref_fund.*
FROM (`tb_research` INNER JOIN ref_fund ON `tb_research`.fund_id = ref_fund.fund_id)
 INNER JOIN master_user  on tb_research.user_id = master_user.user_id
				
			where tb_research.research_id=?
		";
	
		$query = $this->db->query($sql, array( $id) );
		return $query;
	}
	public function deleteResearch($id)
	{
		$sql = "
		Delete
		From tb_research
		where research_id=$id
		";
		$query = $this->db->query($sql);
	
	}
	public function deleteResearchGroup($id)
	{
		$sql = "
		Delete `tb_research`.*,ref_fund.*,research_researcher.*,tb_research_partner.*
		FROM (`tb_research` INNER JOIN ref_fund ON `tb_research`.fund_id = ref_fund.fund_id)
		inner JOIN research_researcher ON `tb_research`.research_id = research_researcher.research_id
		inner JOIN tb_research_partner ON `tb_research`.research_id = tb_research_partner.research_id

		where tb_research.research_id and tb_research_partner.research_id and research_researcher.research_id=$id
		";
		$query = $this->db->query($sql);
	
	}
	public function dataDetailPartner($id){
		$sql = "
		SELECT `tb_research`.*,tb_research_partner.*
		FROM (`tb_research` INNER JOIN tb_research_partner ON `tb_research`.research_id = tb_research_partner.research_id)
			where tb_research.research_id=?
		";
	
		$query = $this->db->query($sql, array( $id) );
		return $query;
	}
	
	public function searchResearch($search)
	{
		$sql="select *
		from tb_research
		where research_name_th like '%$search%'
	
		";
		$query = $this->db->query($sql, array( $search) );
		//  ส่งผลลัพท์กลับไปยังผู้เรียก
		return $query;
	}
	public function searchResearchMain($search){
		$sql="select tb_research.*,ref_fund.fund_name 

	from tb_research join ref_fund on tb_research.fund_id = ref_fund.fund_id
	where research_name_th like '%$search%' or research_name_en like '%$search%' or fund_name like '%$search%' or budget_year like '%$search%' or budget like '%$search%'
		
		";
		$query = $this->db->query($sql, array( $search) );
		//  ส่งผลลัพท์กลับไปยังผู้เรียก
		return $query;
	}
	public function research_award($id){
		$sql = "select tb_research.*,tb_research_award.*
				FROM (`tb_research` INNER JOIN tb_research_award ON `tb_research`.research_id = tb_research_award.research_id)
				where tb_research.research_id=? ";
		$query = $this->db->query($sql, array( $id) );
		return $query;
	}
	public function research_presentation($id){
		$sql = "select tb_research.*,tb_presentation.*
				FROM (`tb_research` INNER JOIN tb_presentation ON `tb_research`.research_id = tb_presentation.research_id)
				where tb_research.research_id=? ";
		$query = $this->db->query($sql, array( $id) );
		return $query;
	}
	public function research_publication($id){
		$sql = "select tb_research.*,tb_publication.*
				FROM (`tb_research` INNER JOIN tb_publication ON `tb_research`.research_id = tb_publication.research_id)
				where tb_research.research_id=? ";
		$query = $this->db->query($sql, array( $id) );
		return $query;
	}
	public function research_partent($id){
		$sql = "select tb_research.*,tb_partent.*
				FROM (`tb_research` INNER JOIN tb_partent ON `tb_research`.research_id = tb_partent.research_id)
				where tb_research.research_id=? ";
		$query = $this->db->query($sql, array( $id) );
		return $query;
	}
}