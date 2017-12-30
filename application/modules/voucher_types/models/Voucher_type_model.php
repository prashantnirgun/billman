<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voucher_type_model extends MY_model
{
    
    public function __construct()
    {
        $this->base_table_name        = 'voucher_type';
        $this->primary_key            = array('id');
        
        $this->soft_deletes = TRUE; 

        parent::__construct();
    }

    /*public function get_first_row($type)
    {
        $sql  = "SELECT ifnull(id,0) id FROM $this->table WHERE register_id in ";
        $sql .= "(SELECT column_id FROM column_value_view WHERE column_name = '$type') ORDER BY name asc limit 1";
        $result = $this->db->query($sql)->result();
        return  $result[0]->id;
       
    }*/

    
    /*
    public function get_all($where_condition)
    {
         if($this->soft_deletes)
        {
            $where_condition .= ( strlen($where_condition) > 1 ? 'AND ' : ' WHERE ' ) . $this->table . '.'. $this->deleted_by_field .' IS NULL';    
        }

        $sql  = " SELECT $this->table.id,$this->table.name,$this->table.prefix,$this->table.suffix,";
        $sql .= " $this->table.start_no,$this->table.narration,$this->table.register_id,";
        $sql .= " $this->table.statutary_id,b.column_name";
        $sql .= " FROM  $this->table"; 
        $sql .= " JOIN client_column_property b ON ($this->table.register_id = b.id)";
        $sql .= " ORDER BY $this->table.id desc";
        $query = $this->db->query($sql);  
        return $query->result();
        
    }
    public function get_drodown()
    {
        $query = $this->db->query("SELECT id, name FROM   $this->table");
        foreach ($query->result_array() as $row)
        {
            $data[$row['id']] = $row['name'];   
        }
        return $data;
    }

    public function get_first_row($type)
    {
        $sql  = "SELECT ifnull(id,0) id FROM $this->table WHERE register_id in ";
        $sql .= "(SELECT column_id FROM column_value_view WHERE column_name = '$type') ORDER BY name asc limit 1";
        $result = $this->db->query($sql)->result();
        
        if($this->db->affected_rows() > 0)
        {
            //var_dump($result);
            return  $result[0]->id;
        }
        else
        {
             return '';     
        }
        //var_dump($sql);
    }
    */
    public function get_drodown_select($type, $default)
    {
        $sql  = "SELECT id, name, member_drop_down, narration,gl_drop_down FROM $this->table ";
        $sql .= "WHERE register_id in ";
        $sql .= "(SELECT column_id FROM column_value_view WHERE column_name = '$type') ORDER BY name asc";

        $result = $this->db->query($sql)->result_array();
        $output = '';
        
        $count = 1;

        foreach ($result as $row)
        {
            $output .= '<option data-gl="'.$row['gl_drop_down'].'" data-narration="'.$row['narration'].'" data-member="'.$row['member_drop_down'].'" value="'. $row['id'] . '"';
            if($default > 0)
            {
                $output .= ($default == $row['id'] ? 'selected>': '>') . $row['name'] . '</option>';
            }
            else
            {
                $output .= ($count == 1 ? 'selected>': '>') . $row['name'] . '</option>';
            }
            $count ++;
        }
        
        return $output ; 
    }
    
   
}
