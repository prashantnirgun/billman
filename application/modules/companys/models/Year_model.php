<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Year_model extends MY_model{
	
	public function __construct()
	{
        $this->table = 'year';
        $this->primary_key = array('id');
      /*	$this->soft_deletes =TRUE;
		$this->timestamps = TRUE;*/
        //$this->has_one['companys']=array('foreign_model'=>'Companys_model','foreign_key'=>'id','local_key'=>'company_id');
		parent::__construct();
  
	}

	/*
	function get_all()
	{
		$sql = "SELECT * FROM $this->table";
		$query = $this->db->query($sql);
		return $query->result();
	}
	*/
}