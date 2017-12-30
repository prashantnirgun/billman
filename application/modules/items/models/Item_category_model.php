<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_category_model extends MY_model
{
	
	public function __construct()
	{
        $this->base_table_name         = 'item_category';
        $this->primary_key            = array('id');
      //  $this->soft_deletes = TRUE;
		parent::__construct();
	}

   /* public function get_soft_delete()
    {
        return $this->deleted_by_field;
    }*/
    /*
    public function get_all()
    {        
       $sql = "SELECT * FROM $this->table";
        $query =$this->db->query($sql);     
        return $query->result();
        
    }
    
    public function get_dropdown()
    {
        $query = $this->db->query("SELECT id, name FROM   $this->table");
        foreach ($query->result_array() as $row)
        {
            $data[$row['id']] = $row['name'];   
        }
        return $data;
    }
   */
}
           
