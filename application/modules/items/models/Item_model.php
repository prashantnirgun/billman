<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_model extends MY_model
{
	
	public function __construct()
	{
    $this->base_table_name  = 'item';
    $this->primary_key      = array('id');
		parent::__construct();
	}

  /*
  public function get_all()
  {        
     $sql = "SELECT * FROM $this->table";
      $query =$this->db->query($sql);     
      return $query->result();
      
  }

    public function get_all_id($id)
    {        
       $sql = "SELECT * FROM $this->table where product_category_id = $id";
        $query =$this->db->query($sql);     
        return $query->result();
        
    }
    
    public function get_dropdown()
    {
        $query = $this->db->query("SELECT id, name FROM   product");
        foreach ($query->result_array() as $row)
        {
            $data[$row['id']] = $row['name'];   
        }
        return $data;
    }

    public function get_drodown_select()
    {
         $sql  = "SELECT a.id as id, a.name as name, a.tax_rate_id,a.price as price, b.tax_rate_percent as tax_rate FROM product a join tax_rate b
          on (a.tax_rate_id =  b.id) ";
        $result = $this->db->query($sql)->result_array();
        $output = '';
      
       // array_push( $result, $tt[][0]['name']= 'Select  Any');
        $tt = array_push($result, array(
        "id" => 0, 
        "name" => 'select Any',
        "price" => '0',
        "tax_rate" => '0',
        ),array(
        "id" => -1, 
        "name" => 'Add new',
        "price" => '0',
        "tax_rate" => '0',
        ));
          //var_dump($tt).'<br><br>';
        $count = 1;
        foreach ($result as $row)
        {
    
            $output .= '<option value ='.$row['id'].' data-price ='.$row['price'].' data-tax_rate ="'.$row['tax_rate'].'" ' ;
            $output .= ($count == 1 ? 'selected>': '>') . $row['name'] . '</option>';
        }

       return $output;
    }

  public function get_by_foreign_key($id)
   {
      $sql = "SELECT id,product_category_id,name,description,price,purchase_price
              FROM product  
              WHERE product_category_id = $id";
              
      $query = $this->db->query($sql);
      return $query->result();
   }
   */
}
           
