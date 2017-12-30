<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Column_property_model extends MY_model{
	
	public function __construct()
    {

	    $this->base_table_name          = 'column_property';
        //$this->table                    = $this->table_prefix . $this->base_table_name;
		$this->primary_key              = array('id');
		$this->soft_deletes = TRUE;
		parent::__construct();
	}
    public function get_all($where_condition)
    {
        $sql = "SELECT *
                FROM column_property $where_condition ORDER BY id DESC";
         $query = $this->db->query($sql);
        // var_dump($sql);
        return $query->result();    
    }
  
}