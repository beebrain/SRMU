<?php
class autoresearcher extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function get_research(){
    $sql="
	
SELECT master_user.user_id,master_user.title,ref_position.position_name,master_user.name_th,master_user.surname_th
FROM (`master_user` left JOIN ref_position ON `master_user`.position_id = ref_position.position_id )
where user_type_id=3 
ORDER BY name_th ASC";
    $query = $this->db->query($sql);
    if($query->num_rows > 0){

      	return $query;
   
     	 //format the array into json data
    }
	}
    

}