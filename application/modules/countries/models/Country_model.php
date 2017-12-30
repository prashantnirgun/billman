<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Country_model extends MY_model
{
	
	public function __construct()
    {

	    $this->base_table_name         = 'country';
      $this->table                   = $this->table_prefix . $this->base_table_name;
		  $this->primary_key             = array('id');

		parent::__construct();
	}
  /*
     public function get_all()
     {
        $sql = "SELECT *
                FROM country  ORDER BY id DESC";
        $query = $this->db->query($sql);
        return $query->result();     
    }

  public function get_dropdown()
  {
    $sql = "SELECT id,name FROM  $this->table ";
    $query = $this->db->query($sql);
      foreach ($query->result_array() as $row  ) 
      {
        $data[$row['id']] = $row['name'];     
      }
   return $data;
    }
  */
}