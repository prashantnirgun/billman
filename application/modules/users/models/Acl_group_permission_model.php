<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acl_group_permission_model extends MY_model{
	
	public function __construct()
	{
        $this->base_table_name = 'acl_group_permission';
       // $this->table = $this->table_prefix . $this->base_table_name;
        $this->primary_key = array('id');

        /*$this->created_by_field = 'created_by_user_id';
        $this->updated_by_field = 'updated_by_user_id';
        $this->deleted_by_field = 'deleted_by_user_id';*/
	     parent::__construct();
  
	}
 
 /*public function  get_all($where_condition)
 {
   $sql = "SELECT a.id,a.branch_id ,a.acl_id,a.user_group_id,a.view_permission,a.create_permission,a.update_permission,
      a.delete_permission,b.module_name,c.name as user_group_name
         FROM   $this->table  a
          JOIN acl b
          ON ( a.acl_id = b.id )
          JOIN user_group c 
          ON ( a.user_group_id = c.id )
          $where_condition
          ORDER BY id DESC";
       // var_dump($sql);
        $query =$this->db->query($sql);
         return $query->result();
 }*/
  /*public function get_drodown()
    {
         $query = $this->db->query("SELECT id,module_name FROM   $this->table");
      foreach ($query->result_array() as $row  ) {
           $data[$row['id']] = $row['module_name'];
           
        }
        return $data;
    }*/

  
}
           
