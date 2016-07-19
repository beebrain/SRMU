<?php 
class loginModel extends CI_Model
{ 
	
	public function __construct()
	{
		parent::__construct();
	}
	// class attributes
	
	public function admin()
	{ 
	$sql = "
		SELECT mas_user.*,ref_permission.permission_name
			FROM mas_user INNER JOIN ref_permission ON mas_user.permission_id=ref_permission.permission_id
			where mas_user.user_status='1'and
			ref_permission.permission_name='admin'
	";
	$query = $this->db->query($sql); 
	return $query; 
	} 
}
