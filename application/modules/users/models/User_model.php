<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class User_model extends MY_Model
{
    
    function __construct()
    {
        $this->base_table_name  = 'user';
        $this->primary_key      = array('id');
        parent::__construct();
    }
    
    public function change_password($user_id,$old_password,$new_password)
    {
        $sql = "SELECT update_password_f($user_id,'$old_password','$new_password)";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function overwrite_password($user_id,$password)
    {
        $sql = "update user set password = encrypt_password_f($user_id,'$password')
        WHERE id = $user_id";
        $query = $this->db->query($sql);        
    }


    public function encrypt_password($user_id, $password)
    {
        $sql = "SELECT encrypt_password_f($user_id,'$password')";
        $query = $this->db->query($sql);
    }

    public function unlock_user($user_id){

        $sql = "UPDATE user
              SET user_status_id = 37,login_attempt = 0
              WHERE id= $user_id';";
        $query = $this->db->query($sql);
        return $query->result();

    }
   /*
    public function get_all($where_condition) 
    {
        
             $sql = "SELECT a.id ,a.user_group_id,a.status_id,a.name,a.mobile,a.password,
                    a.user_status_id,c.column_name AS login_status ,b.name as group_name
            FROM user a 
            JOIN (user_group b,client_column_property c)
            ON (a.user_group_id = b.id AND a.user_status_id = c.id) 
            $where_condition ORDER BY a.id desc";
           // echo $sql;
        $query = $this->db->query($sql);
       // echo $sql;
        return $query->result();
    }
     public function get_user_detail($id)
    {
        $sql = "SELECT id,company_id,user_group_id,name,email_id,mobile,password,user_status_id FROM  user where id = $id ";
        $query =$this->db->query($sql);
         return $query->result();

    }*/
    /*public function get_dropdown()
    {
         $query = $this->db->query("SELECT id,name FROM   $this->table");
      foreach ($query->result_array() as $row  ) {
           $data[$row['id']] = $row['name'];
           
        }
        return $data;
    }*/
   
  /*  public function authenticate($username, $password)
    {
          $query = $this->db->query("SELECT id 
            FROM user
              WHERE (name = '$username' OR  mobile = '$username' OR email_id = '$username') AND password = '$password'

            ORDER BY id desc");
          $rowcount = $query->num_rows();
         
        if ($rowcount == 0) {
          return 0;
        }else {
           return $query->row()->id;
        }
        
    }
   */

   /* function retrieve_user_data($id)
    {
        $query = $this->db->query("SELECT a.id , a.name ,b.full_name,a.user_group_id
            FROM $this->table a join user_profile b ON (a.id = b.user_id)
            WHERE a.id = $id
            ORDER BY a.id desc");

        $set = $query->row_array();

        $query = $this->db->query("SELECT a.id FROM employee a WHERE a.user_id = $id limit 1");

        return  array_merge($set, array("is_logged" => TRUE), array('employee_id' => $query->row()->id));
    }*/

      /* public function unique_username($user_name,$id)
    {
         $query = $this->db->query("SELECT id , name,user_group_id
            FROM $this->table_name
            WHERE  user_name  in ('$user_name') AND id not in($id)");

         if($query->num_rows() == 0){
            return TRUE;
         }else{
            return FALSE;
         }
         
    }

  

    

 
    public function login($data2) 
    {

        $condition = "user_name =" . "'" . $data2['user_name'] . "' AND " . "user_password =" . "'" . $data['user_password'] . "'";
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) 
        {
        return true;
        } else
         {
        return false;
        }
    }

    public function read_user_information($user_name) 
    {

        $condition = "user_name =" . "'" . $user_name . "'";
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
        return $query->result();
        } else {
        return false;
        }
    }*/

}