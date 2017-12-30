<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class Employee_detail_model extends MY_Model
{
	
	function __construct()
	{
		$this->table = 'employee_detail';
		$this->primary_key = array('employee_id');
       /* $this->timestamps=TRUE;
		$this->soft_deletes=TRUE;*/
		parent::__construct();
	}


}