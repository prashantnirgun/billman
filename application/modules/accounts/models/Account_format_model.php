<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_format_model extends MY_model
{
    
    public function __construct()
    {
        $this->base_table_name      = 'account_format';
        $this->primary_key          = array('id');
        $this->soft_deletes = TRUE;

        parent::__construct();
    }
}
    
    /*
    public function get_all($where_condition)
    {        
        if($this->soft_deletes)
        {
            $where_condition .= ( strlen($where_condition) > 1 ? 'AND ' : ' WHERE ' ) . $this->table . '.'. $this->deleted_by_field .' IS NULL';    
        }

        $sql  = " SELECT id ,name,statutary_id";
        $sql .= " FROM $this->table ";
        $sql .= " $where_condition ORDER BY id desc" ;
        $query = $this->db->query($sql); 
      
        return $query->result();
    }
    public function get_dropdown()
    {
        $query = $this->db->query("SELECT id,name 
                 FROM $this->table");
        foreach ($query->result_array() as $row) 
        {
            $data[$row['id']] = $row['name'];
        }
        return $data;
    }
    */
