<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System_property_model extends MY_model
{
	
	public function __construct()
	{
    $this->base_table_name  = 'system_property';
    $this->table            = $this->table_prefix . $this->base_table_name;
    $this->primary_key      = array('id');
  /*$this->created_by_field = 'created_by';
    $this->updated_by_field = 'updated_by';
    $this->deleted_by_field = 'deleted_by';*/
    parent::__construct();
	}
 
 public function get_all()
 {
   $sql = "SELECT *
      FROM   $this->table a
     
      ORDER BY id DESC";
    $query =$this->db->query($sql);
    return $query->result();
 }

  
}
           
