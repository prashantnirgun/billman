<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_setting_model extends MY_model
{
	
	public function __construct()
	{
    $this->base_table_name  = 'form_setting';
    $this->primary_key      = array('id');
    $this->soft_deletes = TRUE;
    parent::__construct();
	}

}
           
