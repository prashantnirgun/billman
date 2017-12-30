<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utility_model extends MY_model
{
    
    public function __construct()
    {
    $this->base_table_name  = '';
   // $this->primary_key      = array('id');
   // $this->soft_deletes = TRUE;

    parent::__construct();
  
    }

    public function get_result($sql){


       //$sql = "SELECT * FROM $this->table";
        $query = $this->db->query($sql);
         //echo $sql;
        return $query->result();
    }

}
