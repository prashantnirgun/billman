<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_model
{
	public function __construct()
	{
	     parent::__construct();
	}

	function verify_credential($username, $password, $ip)
	{
		try
		{
			$sql = "CALL verify_credential_sp( '$username', '$password', '$ip')";
			//echo $sql;
			$result = $this->db->conn_id->query($sql)->fetchObject();
			

		} catch (Exception $e) {
				echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		return $result; //->result();
	}

	public function get_user_mobile_no($user_id)
	{
		try
		{
			$sql = "SELECT get_user_mobile_no_f(".$user_id.") as mobile_no";
			$result = $this->db->query($sql)->row()->mobile_no;
			return $result;
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}

  	function post_login($user_id, $user_name, $password, $ip, $session_id)
  	{
		try {
				$sql = "call post_login_sp($user_id, '$user_name', '$password', '$ip', '$session_id')";
				$stmt = $this->db->conn_id->prepare($sql);
				$stmt->execute();
				$stmt->closeCursor();
			} catch (PDOException $e) {
				echo 'exception ' . $e->getMessage();
			}
		}
	
  	public function get_user_id($name)
	{
		$sql = "SELECT id from user where name = '$name' ";
        $query = $this->db->query($sql);
        
       	if ($query->num_rows() > 0 )
        {
        	return  $query->row()->id;	
        }
        return 0 ;
	}

	public function is_member($name)
	{
		$sql = "SELECT id from member where sap_id = '$name' ";
        $query = $this->db->query($sql);

       	if ($query->num_rows() > 0 )
        {
        	return  $query->row()->id;	
        }
        return 0 ;
	}

  	function retrieve_user_data($user_id)
  	{
		try {
				$sql = "call get_user_data_sp($user_id)";
				$result = $this->db->conn_id->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				return $result[0];
			} catch (PDOException $e) {
				echo 'exception ' . $e->getMessage();
			}
	}

	public function logout($user_id, $session_id)
	{
		try {
			$sql = "call logout_sp($user_id, '$session_id')";
			$stmt = $this->db->conn_id->prepare($sql);
			$stmt->execute();
			$stmt->closeCursor();
		} catch (PDOException $e) {
			echo 'exception ' . $e->getMessage();
		}
	}

	public function update_otp($user_id, $otp, $module, $timestamp)
	{
		try {
			$sql = "call update_otp_sp($user_id, '$otp', '$module', '$timestamp')";
			$stmt   = $this->db->conn_id->prepare($sql);
			$result = $stmt->execute();
			$stmt->closeCursor();
		} catch (PDOException $e) {
			echo 'exception ' . $e->getMessage();
		}
	}

	public function verify_otp($user_id, $otp, $module)
	{
		/*
		1 = true
		2 = false
		10 = no opt found
		*/
		try {
			$sql = "call verify_otp_sp($user_id, '$otp', '$module')";
			$result = $this->db->conn_id->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			return $result[0]['result'];
		} catch (PDOException $e) {
			echo 'exception ' . $e->getMessage();
		}

	}

	public function self_user_creation($member_id, $password)
	{
		//1 is system user
		$sql = "call self_user_creation_sp($member_id, '$password', 1)";
		$result = $this->db->conn_id->query($sql)->fetchAll();
	}

	public function overwrite_password($user_id,$password)
    {
        $sql = "update user set password = encrypt_password_f($user_id,'$password')
        WHERE id = $user_id";
        $query = $this->db->query($sql);
    }

    public function get_mobile_no_of_member($sap_id)
    {
		$sql = "SELECT b.telephone_no as telephone_no FROM member a  
				JOIN member_detail b
				ON(a.id = b.member_id)
				WHERE sap_id = $sap_id";

        $query = $this->db->query($sql);
        
       	if ($query->num_rows() > 0 )
        {
        	return  $query->row()->telephone_no;	
        }
        return 0 ;
    }

     public function unlock_user($id){

        $sql = "UPDATE user
              SET user_status_id = 37,login_attempt = 0
              WHERE id = $id";
              //var_dump($sql);
        $query = $this->db->query($sql);
        //return $query->result();

    }

    
 }

/*
function verify_credential1($username, $password, $count, $ip, $timestamp)
  	{
			try
			{
				$sql = "CALL verify_credential_sp( '$username', '$password', $count, '$ip', '$timestamp', @token, @user_id)";
				$stmt   = $this->db->conn_id->prepare($sql);
				$result = $stmt->execute();
				$stmt->closeCursor();

				$result = $this->db->conn_id->query("SELECT @token as token_id ,@user_id as user_id")->fetchObject();

			} catch (Exception $e) {
			    echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
			
		//$sql = "CALL verify_credential_sp('$username','$password', $count, '$ip', '$timestamp', @token, @user_id)";
		//$sql = "CALL verify_credential_sp('$username','$password', @token)";
		//$query = $this->db->query($sql);
		//$query = $this->db->query("SELECT @token as token_id ,@user_id as user_id")->row();
		
		//return $result; //->result();

  	}
  	*/