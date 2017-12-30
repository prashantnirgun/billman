<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voucher_type_tax_model extends MY_model
{
    
    public function __construct()
    {
        $this->base_table_name        = 'voucher_type_tax';
        $this->primary_key            = array('id');
        
        $this->soft_deletes = TRUE; 

        parent::__construct();
    }


}