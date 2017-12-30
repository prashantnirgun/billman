<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class Employee_model extends MY_Model
{
	
	function __construct()
	{
        $this->base_table_name    = 'employee';
        $this->primary_key        = array('id');
        $this->soft_deletes = TRUE;
    
		parent::__construct();
	}
     public function get_all_employee_attendence($where_condition)
    {

        $sql = "SELECT a.id,a.name,a.telephone_no1,a.telephone_no2,a.email_id,a.address1,a.address2,
                a.pancard_no,date_format(a.birth_date ,'%d-%m-%Y') as birth_date,a.marital_status_id,b.column_name
                FROM $this->table a 
                 JOIN client_column_property b
                 ON (a.marital_status_id = b.id)
                 $where_condition 
                ORDER BY a.birth_date desc";
       // echo $sql;
        $query = $this->db->query($sql);       
        return $query->result();
    }
	/*
    public function get_all($where_condition)
    {
        if($this->soft_deletes)
        {
            $where_condition .= ( strlen($where_condition) > 1 ? 'AND ' : ' WHERE ' ) . $this->table . '.'. $this->deleted_by_field .' IS NULL';    
        }

        $sql  = " SELECT $this->table.id,$this->table.telephone_no1,$this->table.telephone_no2, b.column_name,";
        $sql .= " $this->table.name,$this->table.user_id,$this->table.email_id,$this->table.pancard_no ,";
        $sql .= " date_format($this->table.birth_date ,'%d-%m-%Y') as birth_date,";
        $sql .= "  $this->table.marital_status_id,$this->table.gender_id ";
        $sql .= " FROM  $this->table ";  
        $sql .= " JOIN client_column_property b ON ($this->table.marital_status_id = b.id) ";
        $sql .= " $where_condition";
        $query = $this->db->query($sql);
        return $query->result();
      
    }

    public function get_dropdown()
    {
        $query = $this->db->query("SELECT id,name FROM   $this->table");
        foreach ($query->result_array() as $row  )
        {
           $data[$row['id']] = $row['name'];   
        }
        return $data;
    }

    
    */
}