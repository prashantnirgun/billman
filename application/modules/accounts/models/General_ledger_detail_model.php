<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class General_ledger_detail_model extends MY_Model
{
	function __construct()
	{	
    $this->base_table_name          = 'general_ledger_detail';
    $this->primary_key              = array('general_ledger_id');
    /*$this->created_by_field         = 'created_by_user_id';
    $this->updated_by_field         = 'updated_by_user_id';
    $this->deleted_by_field         = 'deleted_by_user_id';  */  
    $this->soft_deletes = TRUE;

	parent::__construct();
	}
    
    /*
    public function get_all()
    {
        $sql = "SELECT general_ledger_id,contact_person_name,email,telephone1,telephone2,branch_type_id,
            address1,address2,address2,remarks
            FROM general_ledger_detail";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function get_by_general_legder_id($id)
    {
       $sql = "SELECT general_ledger_id,contact_person_name,email,telephone1,telephone2,branch_type_id,
                address1,address2,address2,remarks
                FROM general_ledger_detail
                WHERE general_ledger_id = $id ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    */
}