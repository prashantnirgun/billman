<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tax_rate_model extends MY_model
{
	
	public function __construct()
	{
    $this->base_table_name  = 'tax_rate';
    $this->primary_key      = array('id');
  /*  $this->created_by_field = 'created_by';
    $this->updated_by_field = 'updated_by';
    $this->deleted_by_field = 'deleted_by';*/
    $this->soft_deletes = TRUE;

    parent::__construct();
  
	}
 
 public function get_all()
 {
    $sql = "SELECT * FROM tax_rate";  
    $query =$this->db->query($sql);
       return $query->result();
 }
  public function get_dropdown()
    {
      $query = $this->db->query("SELECT id,tax_rate_name FROM   $this->table");
      foreach ($query->result_array() as $row  )
       {
           $data[$row['id']] = $row['tax_rate_name'];
           
        }
        return $data;
    }

  
}
           
