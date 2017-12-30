<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voucher_type_detail_model extends MY_model
{
	
	public function __construct()
	{ 
      	$this->base_table_name       = 'voucher_type_detail';
        $this->table                 = $this->table_prefix . $this->base_table_name;
        $this->primary_key           = array('id');

    	parent::__construct();
  
	}
    /*
    public function get_all()
    {
      $sql = "SELECT a.id,a.voucher_type_id,a.account_group_id,b.name as account_group,c.name as voucher_type
            FROM  voucher_type_detail a
             JOIN account_group b ON(a.account_group_id = b.id)
             JOIN voucher_type c ON(a.voucher_type_id = c.id)
  
            ORDER BY id desc";
       $query = $this->db->query($sql);  
        return $query->result();
    }

     public function get_voucher_type_detail($id)
    {
         
        $sql = "SELECT a.id,a.voucher_type_id,a.account_group_id,b.name as account_group,c.name as voucher_type
            FROM  voucher_type_detail a
             JOIN account_group b ON(a.account_group_id = b.id)
             JOIN voucher_type c ON(a.voucher_type_id = c.id)
             WHERE a.voucher_type_id = $id
            ORDER BY id desc";
         $query = $this->db->query($sql);
        return $query->result();
    }
    */
}
