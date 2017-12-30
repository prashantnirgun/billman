<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class General_ledger_model extends MY_Model
{

	function __construct()
	{

    $this->base_table_name = 'general_ledger';
    $this->primary_key = array('id');
     $this->soft_deletes = TRUE;
		parent::__construct();
	}
/*
  $SQL = "SELECT id INTO $account_group 
    FROM account_group WHERE name ='Sundry Debtors' AND branch_id = 1";
*/
  /*
  public function get_all_general_ledger($where_condition)
  {
     if($this->soft_deletes)
        {
            $where_condition .= ( strlen($where_condition) > 1 ? 'AND ' : ' WHERE ' ) . $this->table . '.'. $this->deleted_by_field .' IS NULL';    
        }

    $sql = "SELECT $this->table.id,$this->table.name ,$this->table.alise,b.name as group_name ,";
    $sql .= " $this->table.statutary_id,$this->table.pancard_no,$this->table.debit_credit_id, ";
    $sql .= " $this->table.account_group_id,$this->table.opening_amount,$this->table.debit_amount,";
    $sql .= " $this->table.credit_amount,$this->table.closing_amount,$this->table.state_vat_no,";
    $sql .= " $this->table.central_vat_no";
    $sql .= " FROM $this->table ";
    $sql .= " LEFT JOIN account_group b ON ($this->table.account_group_id = b.id)";
    $sql .= " $where_condition ORDER BY  $this->table.id ";
    
     	$query = $this->db->query($sql);
  	 	$result = $query->result();
  	 	$query->free_result();
  	return $result;
  }
  public function get_dropdown()
  {
    $query = $this->db->query("SELECT id,name,account_group_id FROM general_ledger");

      foreach ($query->result_array() as $row )
        {
          $data[$row['id']] = $row['name'];
        }
        return $data;
  }
   public function get_general_ledger_data()
  {
     $sql = "SELECT a.account_group_id, a.id, a.name ,b.name as account_group_name  
              FROM general_ledger a
              JOIN account_group b 
              ON (a.account_group_id = b.id)";
      $query =$this->db->query($sql);
      $result = $query->result_array();
      return $result;
  }
  */
}
