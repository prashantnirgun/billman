<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Narration_model extends MY_model
{
	
	public function __construct()
	{
        $this->base_table_name              = 'narration';
        $this->primary_key                  = array('id');
       
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
        $query = $this->db->query("SELECT id, description FROM   $this->table");
        foreach ($query->result_array() as $row)
        {
            $data[$row['id']] = $row['description'];   
        }
        return $data;
    }
    */
}
           
