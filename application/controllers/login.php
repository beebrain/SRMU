<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class  Login extends CI_Controller 
{ 
	function __construct() 
	{ 
		parent::__construct();
	}
	 
	function index() 
	{ 
		$data['menu']="menu";
		$data['main_content']="login";
		$this->load->view('template', $data);
	} 

} 
