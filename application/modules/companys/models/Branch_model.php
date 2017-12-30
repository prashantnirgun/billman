<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch_model extends MY_model
{
	
	public function __construct()
	{
    $this->base_table_name  = 'branch';
    $this->primary_key      = array('id');
		parent::__construct();
	}

  /*
  public function get_all($id)
   {
      $sql = "SELECT id,manager,address1,address2,address3,type_id,
              telephone_no,email_id
              FROM $this->table" ;
      $query = $this->db->query($sql);   
      return $query->result();   
   }

     public function test_fk($id)
   {
      $sql = "SELECT a.id,a.manager,a.address1,a.address2,a.address3,a.type_id,a.company_id,
                a.telephone_no,a.email_id
                FROM $this->table a join company b
              ON (a.company_id = b.id)
              WHERE a.company_id = $id";
      $query = $this->db->query($sql);
      return $query->result();
   }

   public function get_dropdown(){
     $query = $this->db->query("SELECT id,manager FROM $this->table");
      foreach ($query->result_array() as $row  ) 
        {
           $data[$row['id']] = $row['manager'];  
        }
        return $data;
   }
   */
}
           
