<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_tax_model extends MY_model
{
	
	public function __construct()
	{
    $this->base_table_name  = 'item_tax';
    $this->primary_key      = array('id');
		parent::__construct();
	}
}