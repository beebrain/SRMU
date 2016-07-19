<?php class whomodel extends CI_Model
{
	function __construct() 
	{ 
		parent::__construct();
	}
	
	public function all()
	{
		$sql = "
		SELECT *
		FROM master_user 			
		";
		$query = $this->db->query($sql);
		return $query;
	}
	function checkPass($id,$pass)
	{
		$sql = "
		select *
		FROM master_user where user_id=$id && password=md5('.$pass.')
		";
		$query = $this->db->query($sql);
	if ($query->num_rows() > 0){
        return true;
    }
    else{
        return false;
    }
	}
	function checkUsername($username)
	{
    $this->db->where('username', $username);
    $query = $this->db->get('master_user');
    if ($query->num_rows() > 0){
        return true;
    }
    else{
        return false;
    }
}

} 
 