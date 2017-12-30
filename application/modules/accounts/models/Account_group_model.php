<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_group_model extends MY_model
{

	public function __construct()
    {

        $this->base_table_name = 'account_group';
        $this->primary_key = array('id');
        $this->soft_deletes = TRUE;

		parent::__construct();
	}

    /*
    public function get_all_account_group($where_condition)
    {
        if($this->soft_deletes)
        {
            $where_condition .= ( strlen($where_condition) > 1 ? 'AND ' : ' WHERE ' ) . $this->table . '.'. $this->deleted_by_field .' IS NULL';
        }

        $sql  = " SELECT $this->table.id , $this->table.name , $this->table.herarcy ,$this->table.account_head_id ,";
        $sql .= " c.name as account_head, ifnull(b.count,0) as count,$this->table.statutary_id ";
        $sql .= " FROM $this->table ";
        $sql .= " LEFT JOIN (select count(account_group_id) as count, account_group_id from general_ledger ";
        $sql .= " WHERE deleted_at is null group by account_group_id) as b  ON ($this->table.id = b.account_group_id)";
        $sql .= " join account_head c ON ($this->table.account_head_id = c.id)";
        $sql .= " $where_condition ORDER BY $this->table.account_head_id,$this->table.id desc";

        $query = $this->db->query($sql);

        return $query->result();
    }
     public function get_dropdown()
     {
        $query = $this->db->query("SELECT id,name FROM account_group");
         foreach ($query->result_array() as $row  )
         {
           $data[$row['id']] = $row['name'];

        }
        return $data;
   }
   public function get_account_group_data()
   {
      $sql = "select id, name from account_group where id in (select account_group_id from general_ledger group by account_group_id)";
       $query = $this->db->query($sql);
        $account_group_data = $query->result_array();
        return $account_group_data ;
   }
    */
}
