<?php
class partnerinmodel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function get_partner_in($id){
    $sql="select research_researcher.*,tb_research.research_id
			from research_researcher inner join tb_research on research_researcher.research_id=tb_research.research_id
			where research_researcher.research_id =? ";
   	$query = $this->db->query($sql, array( $id) );
	
		return $query;
	}
    

}