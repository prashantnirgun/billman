<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document_list_model extends MY_model
{
    
    public function __construct()
    {
      //table_name
      $this->base_table_name    = 'document_list';
      $this->table              = $this->table_prefix . $this->base_table_name;   
      $this->primary_key        = array('id');
      //Column Name
        parent::__construct();
  
    }
   public function get_all()
   {
      $sql = "SELECT * FROM  $this->table";
      $query = $this->db->query($sql);
      return $query->result(); 
   }
   public function get_by_voucher_id($id)
   {
      $sql = "SELECT id ,voucher_id,document_name,image_file_name,table_name 
             FROM  $this->table WHERE voucher_id = $id";
             //var_dump($sql);
      $query = $this->db->query($sql);
      return $query->result(); 
   }
 }