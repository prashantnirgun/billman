<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_group_model extends MY_model
{
	
	public function __construct()
	{
        $this->base_table_name      = 'user_group';
        $this->table                = $this->table_prefix . $this->base_table_name;
        $this->primary_key          = array('id');
        $this->created_by_field = 'created_by';
        $this->updated_by_field = 'updated_by';
        $this->deleted_by_field = 'deleted_by';
		parent::__construct();
  
	}
    
   /* public function get_all_user_group($where_condition)
    {
        $sql   = "SELECT a.id ,a.name,b.column_name
                FROM $this->table a
                JOIN client_column_property b ON (a.status_id = b.id) 
                $where_condition
                ORDER BY id desc";
        $query = $this->db->query($sql);
        
        return $query->result();
    
    }*/

    /*public function get_dropdown()
    {
        $query = $this->db->query("SELECT id,name FROM user_group");
          foreach ($query->result_array() as $row  ) 
            {
               $data[$row['id']] = $row['name'];
            }
        return $data;
    }*/
}