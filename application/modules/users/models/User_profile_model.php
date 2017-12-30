<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_profile_model extends MY_model{
	
	public function __construct()
	{
      $this->base_table_name = 'user_profile';
    //  $this->table = $this->table_prefix . $this->base_table_name;
      $this->primary_key = array('user_id');
      /*$this->created_by_field = 'created_by';
      $this->updated_by_field = 'updated_by';
      $this->deleted_by_field = 'deleted_by';*/
		parent::__construct();
  
	}

   public function change_password($user_id,$old_password,$new_password,$current_timestamp)
    {
        $sql = "SELECT update_password_f($user_id,'$old_password','$new_password','$current_timestamp')";
        $query = $this->db->query($sql);
        return $query->result();
    }

 
   /*  public function get_user_profile($id)
    {
         $sql ="SELECT a.user_id,a.full_name,a.gender_id,a.contact_no,a.email,a.image_file_name,a.address1,
                a.address2,a.address3,b.name as user_name
                    FROM  $this->table a 
                    JOIN user b 
                    ON ( a.user_id = b.id )
                   
                    WHERE a.user_id = $id";
       // echo $sql;
        $query = $this->db->query($sql);
      //  return $query->row()->rate_of_interest;
        return $query->result();

    
    }*/
 
 

  
	
}