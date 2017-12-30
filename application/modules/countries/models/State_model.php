<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class State_model extends MY_model
{
	
	public function __construct()
    {

  	  $this->base_table_name          = 'state';
      $this->table                    = $this->table_prefix . $this->base_table_name;
      $this->primary_key              = array('id');
		
    	parent::__construct();
	}
/*
    public function get_all()
   {
      $sql    = "SELECT *
              FROM $this->table ";
      $query = $this->db->query($sql);
      return $query->result();
   }
   
    public function get_by_foreign_key($id)
   {
      $sql = "SELECT id,country_id,name
              FROM state  
              WHERE country_id = $id";
              
      $query = $this->db->query($sql);
      return $query->result();
   }
   */
}