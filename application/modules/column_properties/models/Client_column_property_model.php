<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_column_property_model extends MY_model
{
	
	public function __construct()
    {

		$this->base_table_name        = 'client_column_property';
   // $this->table                  = $this->table_prefix . $this->base_table_name;
    $this->primary_key            = array('id');
        
  $this->soft_deletes = TRUE;
  parent::__construct();
	}

    /* public function get_all()
   {
      $sql = "SELECT *
              FROM $this->table ";            
      $query = $this->db->query($sql);
      return $query->result();
   }*/
   
/*  public function get_by_foreign_key($id)
   {
      $sql = "SELECT id,company_id,column_property_id,column_name,set_default,statutary_id, decription
            FROM client_column_property a 
           
            WHERE column_property_id = $id";
              
      $query = $this->db->query($sql);
      return $query->result();
   }
*/
}