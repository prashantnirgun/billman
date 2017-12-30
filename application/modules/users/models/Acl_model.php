<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acl_model extends MY_model{
	
	public function __construct()
	{
        $this->base_table_name = 'acl';
        //$this->table = $this->table_prefix . $this->base_table_name;
        $this->primary_key = array('id');

	     parent::__construct();
  
	}
 
/* public function get_all($where_condition)
 {
   $sql = "SELECT id,url,module_name,company_id,table_name,create_permission,update_permission,
         delete_permission,view_permission FROM   $this->table $where_condition   ORDER BY id DESC";
        //var_dump($sql);
        $query =$this->db->query($sql);
         return $query->result();
 }
  public function get_dropdown()
    {
         $query = $this->db->query("SELECT id,module_name FROM   $this->table");
      foreach ($query->result_array() as $row  ) {
           $data[$row['id']] = $row['module_name'];
           
        }
        return $data;
    }

  */
}
           
