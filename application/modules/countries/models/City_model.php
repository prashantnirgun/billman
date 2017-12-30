<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City_model extends MY_model
{
	
	public function __construct()
	{
    $this->base_table_name  = 'city';
    $this->primary_key      = array('id');
    $this->soft_deletes = TRUE;
    parent::__construct();
	}

}
           
