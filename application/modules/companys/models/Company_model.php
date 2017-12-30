<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company_model extends MY_model
{
	
	public function __construct()
	{
        $this->base_table_name          = 'company';
        $this->primary_key              = array('id');
        
        $this->soft_deletes = TRUE;

		parent::__construct();
  
	}

    /*
    public function get_all($where_condition)
    {        
        if($this->soft_deletes)
        {
            $where_condition .= ( strlen($where_condition) > 1 ? 'AND ' : ' WHERE ' ) . $this->table . '.'. $this->deleted_by_field .' IS NULL';    
        }

        $sql  = "SELECT $this->table.id,$this->table.name,$this->table.no_of_branch,$this->table.address1,";
        $sql .= " $this->table.address2,$this->table.address3,$this->table.company_type_id,";
        $sql .= " $this->table.start_date,$this->table.end_date,b.column_name";
        $sql .= " FROM $this->table"; 
        $sql .= " JOIN client_column_property b ON (b.id = $this->table.company_type_id)" ;
        $query = $this->db->query($sql);
        
        return $query->result();
    }
    
    public function build_dropdown($column_name){
    
        $sql    = "SELECT  id, column_name FROM client_column_property WHERE column_property_id IN 
                    (SELECT id FROM column_property WHERE column_value = '$column_name')";
        $query  = $this->db->query($sql);
         foreach ($query->result_array() as $row  )
         {
           $data[$row['id']] = $row['column_name'];  
        }
    return $data;    
    }
    */
}
           
