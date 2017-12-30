<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice_tax_rate_model extends MY_model
{
	
	public function __construct()
	{
    $this->base_table_name  = 'invoice';
    $this->primary_key      = array('id');
  /*  $this->created_by_field = 'created_by';
    $this->updated_by_field = 'updated_by';
    $this->deleted_by_field = 'deleted_by';*/
    $this->soft_deletes = TRUE;

    parent::__construct();
  
	}
 
 public function get_all_invoice($where_condition)
 {
  /**/
   if($this->soft_deletes)
        {
            $where_condition = ( strlen($where_condition) <> 1 ? 'WHERE ' : ' WHERE ' ) .   'a.'. $this->deleted_by_field .' IS NULL';    
        }
    $sql = "SELECT a.id,a.invoice_no,a.reference_no,a.voucher_type_id,date_format( a.invoice_date,'%d-%m-%Y') as invoice_date ,a.invoice_date_due,
            a.invoice_password,a.sales_amount,a.vat_amount,a.service_tax_paid,a.invoice_amount,b.name,d.column_name FROM invoice a
            JOIN general_ledger b ON(b.id = a.general_ledger_id)
            JOIN client_column_property d ON (d.id = a.status_id)
             $where_condition ";  
    $query =$this->db->query($sql);
   // var_dump($sql);
       return $query->result();
 }
 public function get($id)
   {
        $sql = "SELECT * FROM $this->table WHERE id = $id" ;
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result;
   }
   
  public function get_drodown()
    {
      $query = $this->db->query("SELECT id,name FROM   $this->table");
      foreach ($query->result_array() as $row  )
       {
           $data[$row['id']] = $row['name'];
           
        }
        return $data;
    }
  function insert_invoice_data($data)
    {
    // Inserting in Table(students) of Database(college)
        $this->db->insert($this->table , $data);
        
    }
    function update_invoice_data($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

  
}
           
