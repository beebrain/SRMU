<?php
class fundModel extends CI_Model {
	
	public  function __construct() {

		parent::__construct();
		ob_start();

	}
	public function fund()
	{
		$sql="select * from ref_fund order by fund_type";
		$query = $this->db->query($sql);
		//return $query->result();
		return $query;
	}
	public function fundIN()
	{
		$sql="select * from ref_fund where fund_type=2";
		$query = $this->db->query($sql);
		//return $query->result();
		return $query;
	}
	public function fundOUT()
	{
		$sql="select * from ref_fund where fund_type=1";
		$query = $this->db->query($sql);
		//return $query->result();
		return $query;
	}
	public function savenew_Fund($data)
	{
		$this->db->insert('ref_fund', $data);

	}
	public function deleteFund($id)
	{
		$sql = "
		Delete
		From ref_fund
		where fund_id=$id
		";
		$query = $this->db->query($sql);

	}
	public function searchFund($search)
	{
		$sql="select *
		from ref_fund
		where fund_name like '%$search%'
	
		";
		$query = $this->db->query($sql, array( $search) );
		//  ส่งผลลัพท์กลับไปยังผู้เรียก
		return $query;
	}
}

	