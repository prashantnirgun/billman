<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice_detail_model extends MY_model
{
    
    public function __construct()
    {
        $this->base_table_name              = 'invoice_detail';
        $this->primary_key                  = array('id');
        //$this->soft_deletes = TRUE;
        parent::__construct();
    }

   /* public function get_soft_delete()
    {
        return $this->deleted_by_field;
    }*/

    public function get_all()
    {        
       $sql = "SELECT * FROM invoice_detail";
        $query =$this->db->query($sql);     
        return $query->result();
        
    }
    public function get($id)
    {
       
        $sql  = "select a.id,a.invoice_id,a.tax_rate_id,a.product_id,a.description,a.quantity,
        a.rate,a.amount,a.discount_amount,a.sr_no,b.name  from invoice_detail a ";
        $sql .= " JOIN  product b ";
        $sql .= " ON(b.id = a.product_id) ";
        $sql .= " WHERE a.invoice_id = $id";
        $query = $this->db->query($sql);
        //var_dump($sql);
        $result = $query->result();
        return $result;
    } 
    public function get_dropdown()
    {
        $query = $this->db->query("SELECT id, name FROM   $this->table");
        foreach ($query->result_array() as $row)
        {
            $data[$row['id']] = $row['name'];   
        }
        return $data;
    }
    public function get_by_foreign_key($id)
   {
      $sql = "SELECT id,product_category_id,name,description,price,purchase_price
              FROM product  
              WHERE product_category_id = $id";
              
      $query = $this->db->query($sql);
      return $query->result();
   }

   public function get_drodown_select()
    {
        $sql  = "select a.id as id,a.invoice_id,a.tax_rate_id,a.product_id,a.description,a.quantity,
        a.rate as rate,a.amount,a.discount_amount as discount_amount ,a.sr_no,b.name as name  from invoice_detail a ";
        $sql .= " JOIN  product b ";
        $sql .= " ON(b.id = a.product_id) ";
       // $sql .= " WHERE a.invoice_id = 3";
        $result = $this->db->query($sql)->result_array();
        $output = '';
        var_dump($sql);
        $count = 1;
        foreach ($result as $row)
        {
            $output .= '<option data-rate="'.$row['rate'].'>'.$row['name'].'</option>';
          
        }
       // return $output;
    }
}
           
