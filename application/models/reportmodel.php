<?php 
class reportModel extends CI_Model
{ 
	
	public function __construct()
	{
		parent::__construct();

	}

	function dataDepartment()
	{ 

	$sql = "
	SELECT DISTINCT ref_major.department_id
	FROM master_user INNER JOIN ref_major ON master_user.major_id=ref_major.major_id
			
	";

	$query = $this->db->query($sql); 

	return $query; 
	} 
	public function buggetYear(){
		$sql = "
	SELECT DISTINCT  tb_research.budget_year
	FROM tb_research
	order by budget_year ASC
		
	";
		
		$query = $this->db->query($sql);
		
		return $query;
	}
	public function department_1(){
		$sql="SELECT COUNT(*) AS department1
		FROM (`master_user` )
		INNER JOIN ref_position ON `master_user`.position_id = ref_position.position_id
		INNER JOIN ref_major ON `master_user`.major_id = ref_major.major_id
		INNER JOIN ref_department ON `ref_major`.department_id = ref_department.department_id
		where user_type_id=3 and ref_department.department_id=1";
		$query = $this->db->query($sql);
		
		return $query;
		
	}
} 
