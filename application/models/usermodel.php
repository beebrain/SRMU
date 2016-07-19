<?php 
class adminModel extends CI_Model
{
	public $user_type_id;
	public $username;
	public $password;
	public $title;
	public $position_id;
	public $name_th;
	public $surname_th;
	public $name_en;
	public $surname_en;
	public $major_id;
	public $address;
	public $email;
	public $tel;
	public $photo;
	public $status_user;

	public function __construct()
	{
		parent::__construct();
	}
	public function get_all() 
	{ 
		$sql = " 
		SELECT employee.*, dep_name 
		FROM employee INNER JOIN department ON emp_dep_id=dep_id 
		ORDER BY emp_code ASC 
		"; 
	
		$query = $this->db->query($sql); 
		
		return $query; 
	} 
	
}