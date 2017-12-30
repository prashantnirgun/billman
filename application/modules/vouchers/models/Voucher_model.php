<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voucher_model extends MY_model{

	public function __construct()
	{
        $this->base_table_name = 'voucher';
        $this->table            = $this->table_prefix . $this->base_table_name;
        $this->primary_key = array('id');
        
		parent::__construct();

	}

    public function get_all_voucher($type, $where_condition)
    {
        if ($type == 'Journal Voucher')
        {
            $sql = "SELECT a.id,a.receipt_no,a.voucher_type_id,d.name
             as member_name,date_format(a.receipt_date,'%d-%m-%Y') as receipt_date,a.cheque_no,a.narration,
            date_format(a.cheque_date,'%d-%m-%Y') as cheque_date,a.cheque_amount,sum(c.debit_amount) as amount
            FROM $this->table a            
            JOIN voucher_detail c ON (a.id = c.voucher_id)
            JOIN voucher_type d  ON (a.voucher_type_id = d.id)
           /*// JOIN general_ledger b ON(c.general_ledger_id = b.id)*/
            $where_condition
            GROUP BY a.id desc";
        }else
        {
            $sql = "SELECT a.id,a.receipt_no,a.voucher_type_id,d.name,
             b.name as member_name,date_format(a.receipt_date,'%d-%m-%Y') as receipt_date,a.cheque_no,a.narration,
            date_format(a.cheque_date,'%d-%m-%Y') as cheque_date,a.cheque_amount,sum(c.debit_amount) as amount
            FROM $this->table a
            JOIN member b ON (b.id = a.member_id)
            JOIN voucher_detail c ON (a.id = c.voucher_id)
            JOIN voucher_type d  ON (a.voucher_type_id = d.id)
            $where_condition
            GROUP BY a.id desc";      
        }
      
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function get_voucher_type_list()
    {
        $sql = "select a.id, concat(name, ' (',b.column_name,')') as name
                from voucher_type a join client_column_property b
                ON(a.register_id = b.id)";
                
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function convert_voucher($id, $voucher_type)
    {
        return TRUE;

    }

    public function get($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = $id" ;
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }

    // Function to select all from table name students.
    function show_receipts(){
        $query = $this->db->get('voucher');
        $query_result = $query->result();
        return $query_result;
    }
    // Function to select particular record from table name students.
    function show_receipts_id($data){
        $this->db->select('*');
        $this->db->from('voucher');
        $this->db->where('id', $data);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function insert_voucher_data($data)
    {
    // Inserting in Table(students) of Database(college)
        $this->db->insert($this->table , $data);
        
    }
    function update_voucher_data($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }
    
    public function get_next_receipt_no($voucher_type)
    {
        $sql = "select ifnull(max(cast(receipt_no AS UNSIGNED)),0) + 1 as receipt_no from voucher where voucher_type_id = $voucher_type";

        $result = $this->db->query($sql)->row()->receipt_no;
        return $result;
    }

    public function is_unique_receipt_no($branch_id, $voucher_type_id, $receipt_no )
    {  
        $sql = "SELECT is_unique_receipt_no($branch_id, $voucher_type_id, '$receipt_no') as receipt_no";
        $query =$this->db->query($sql);
        $result = $query->row(1)->receipt_no;
        //echo $result .'<br>';
        return ($result == '1' ? TRUE : FALSE);
    }

    public function get_voucher_type($type)
    {
      $sql = "SELECT b.id, a.account_group_id, b.member_drop_down, gl_drop_down
            from voucher_type_detail a
            JOIN voucher_type b
            ON(a.voucher_type_id = b.id)
            JOIN client_column_property c
            ON(b.register_id = c.id)
            where c.column_name = '$type'";
        $query =$this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function get_general_ledger()
    {

        $sql = "SELECT a.account_group_id, a.id, a.name as gl_name, b.name as group_name
            FROM general_ledger a join account_group b
            on (a.account_group_id = b.id)";
         $query =$this->db->query($sql);
        $result = $query->result();
        return $result;

    }
}
