<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voucher_detail_model extends MY_model{

	public function __construct()
	{

        $this->base_table_name = 'voucher_detail';
        $this->table = $this->table_prefix . $this->base_table_name;
        $this->primary_key = array('id');

        /*$this->created_by_field = 'created_by_employee_id';
        $this->updated_by_field = 'updated_by_employee_id';
        $this->deleted_by_field = 'deleted_by_employee_id';*/
		parent::__construct();

	}
  
    /*
    public function get($id){
      //  $data = $array();
        $sql  = "select b.*, c.name from voucher a ";
        $sql .= " JOIN (voucher_detail  b, general_ledger c) ";
        $sql .= " ON(a.id = b.voucher_id AND a.branch_id = c.branch_id AND ";
        $sql .= " b.general_ledger_id = c.id) ";
        $sql .= " WHERE b.voucher_id = $id";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;

    }
    */
    public function insert_voucher_detail_data($data)
    {   
        $this->db->insert_batch('voucher_detail',$data);
    }
    public function update_voucher_detail_data($data,$id)
    {
     $this->db->update_batch('voucher_detail',$data, $id); 
   
    }
    
}
