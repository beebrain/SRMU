<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class report extends CI_Controller 
{ 
	function __construct() 
	{ 
		parent::__construct();
		$this->load->model('majorModel');
		$this->load->model('departmentModel');
		$this->load->model('reportModel');
	}
	 
	function index() 
	{ 
		$data['menu']="menu";
		$data['main_content']="reportMajor";
		$data['queryMajor']=$this->majorModel->majorName();
		$this->load->view('template', $data);
	} 
	function researcher_major()
	{
		$data['menu']="menu";
		$data['main_content']="reportMajor";
		$data['queryMajor']=$this->majorModel->majorName();
		$this->load->view('template', $data);
	}
	function researcher_department()
	{
		$data['menu']="menu";
		$data['main_content']="reportDepartment";
		$data['queryDepartment']=$this->departmentModel->department();
		$this->load->view('template', $data);
	}
	function research_bugget()
	{
		$data['menu']="menu";
		$data['main_content']="reportBuggetYear";
		$data['querybuggetYear']=$this->reportModel->buggetYear();
		$this->load->view('template', $data);
	}
	
} 
