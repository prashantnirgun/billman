<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acl_user_permission_model extends MY_model{

	public function __construct()
	{
    $this->base_table_name = 'acl_user_permission';
    // $this->table = $this->table_prefix . $this->base_table_name;
    $this->primary_key = array('id');
    parent::__construct();
	}

public function get_user_permission_by_acl_module_name($user_id, $module)
  {
    $sql ="SELECT id FROM acl WHERE module_name = '$module'";
    //echo $sql;
    $query =$this->db->query($sql);
    $acl_id = $query->row()->id;
    return $this->get_user_permission_by_acl_id($user_id, $acl_id);
  }

 public function get_user_permission_by_acl_id($user_id, $acl_id)
  {   
    $sql = "CALL  get_user_permission_by_id_sp(?, ?)";
    $arg = array($user_id, $acl_id);
    $query = $this->db->query($sql, $arg);
    $result =  $query->result_array();
    return $result[0];
  }

}
