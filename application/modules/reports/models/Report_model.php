<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends MY_model
{

    public function __construct()
    {
       $this->base_table_name  = 'invoice';
    $this->primary_key      = array('id');
        parent::__construct();
  
    }
    
 
}
