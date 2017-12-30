<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
	private $admin_theme, $otp_expiry;
	function __construct(){

		parent::__construct();
		$this->load->model('Login_model','model');
		$this->admin_theme 	= $this->config->item('admin_theme');
		$this->otp_expiry 	= $this->config->item('otp_expiry');
	}

	public function index()
	{
		$data['title']="My Site";
		$folder_name		= '';
		$site_name 			= $this->config->item('site_name');
		$data['message']	= "3 wrong attempt will disable Login!";
		$data['admin_theme'] = $this->admin_theme ;
		$data['name']			= '';
		$data['password']	= '';
		$data['pid']			= 0;
		$this->load->view('login_view',$data);
	}

	public function login_check()
	{
		$username = $this->input->post('name');
		$password = $this->input->post('password');
		
		$otp 	= $this->input->post('otp');
		$ip 	= $this->input->ip_address();		
		echo $otp;
		
		//$this->unlock_user($username);
		$this->login_verify($username, $password, $ip, $otp);
	}

	public function login_verify($username, $password, $ip, $otp)
	{
		$this->form_validation->set_rules('name', 'Username', 'required|trim');
    	$this->form_validation->set_rules('password', 'Password', 'required|trim');

    	if ($this->form_validation->run() == FALSE)
    	{
			redirect('login','refresh');
	    }
	    else
	    {
		  	
		  	$return = $this->model->verify_credential($username, $password, $ip);
		  	
		  	$user_id = $return->user_id;
			if($user_id > 0)
		  	{
				if($otp == '0' || is_null($otp) )
				{
					$otp = generate_otp();
					$message = $this->config->item('otp_message');
					$message = str_replace("@1",$otp, $message);
					$message = str_replace("@2",'login', $message);
					$mobile_no =  $this->model->get_user_mobile_no($user_id);

					//sending sms otp 
					if(ENVIRONMENT == 'production') {
						send_sms($mobile_no, $message);
					}else{
						echo $message;
					}
					
					
					// get time interval from config file
					$timestamp = date('Y-m-d H:i:s', strtotime($this->otp_expiry));
					$this->model->update_otp($user_id, $otp, 'Login', $timestamp);

					$data['message']			= 'Enter your OTP';
					$data['admin_theme'] 	= $this->admin_theme ;
					$data['name']					= $username;
					$data['password']			= $password;
					$data['pid']					= 1;
					//echo $message;
					$this->load->view('login_view',$data);

				}
				else
				{
						$result = $this->model->verify_otp($user_id, $otp, 'Login');
						$flag = FALSE;

						switch ($result)
						{
							case '1': //'otp is correct';
								$data = $this->model->retrieve_user_data($user_id);
								$data['is_logged'] = TRUE;
								$data['session_id'] = 0;
								$date = date_create();
								//$data['date_format'] = date_format($date, 'd-m-Y');
								$data['date_format'] = 'd-m-Y';
								$this->session->set_userdata($data);
								$session_id = $_SESSION['__ci_last_regenerate'];
								$_SESSION['session_id'] = $session_id;

								$this->model->post_login($user_id, $username, '', $ip, $session_id);
								redirect('site/','refresh');
								break;
							case '0': //OTP is wrong
								$flag = TRUE;
								$data['message'] = 'OTP is expired';
								break;
							default: //OTP is expired
								$flag = TRUE;
								$data['message'] = 'OTP is wrong';
								break;
						}

						if($flag)
						{
							$data['admin_theme'] 	= $this->admin_theme ;
							$data['name']					= $username;
							$data['password']			= $password;
							$data['pid']					= 1;
							$this->load->view('login_view',$data);
						}
				}
		    }
			else
		  	{
		  		$this->model->post_login(0, $username, $password, $ip, '');

				$data['name']					= '';
				$data['password']			= '';
				$data['pid'] 					= 0;
				$data['message']			= $return->message;

				$data['admin_theme'] 	= $this->admin_theme ;
				$this->load->view('login_view',$data);
		  	}

		  	//$this->unlock_user($username);
    }
	}

	public function forgot_password()
	{
		$data['title']		= "My Site";
		$folder_name		= 'admin';
		$site_name 			= $this->config->item('site_name');
		$data['message']	= "3 wrong attempt will disable Login!";
		$data['admin_theme'] = $this->admin_theme ;
		$data['name']			= '';
		$data['password']	= '';
		$data['pid']			= 0;
		$this->load->view('forgot_password_view',$data);
	}

	public function reset_password()
	{
		$username = $this->input->post('name');
		$user_id = $this->model->get_user_id($username);
		$otp = $this->input->post('otp');
		$password = $this->input->post('password');

		if($otp == '0' || is_null($otp) )
		{
			if($user_id > 0 )
			{
				$otp = generate_otp();
				
				$message = $this->config->item('otp_message');
				$message = str_replace("@1",$otp, $message);
				$message = str_replace("@2",'reset passowrd', $message);
				$mobile_no =  $this->model->get_user_mobile_no($user_id);

				//sending sms otp 
				//send_sms($mobile_no, $message);

				// get time interval from config file
				$timestamp = date('Y-m-d H:i:s', strtotime($this->otp_expiry));
				$this->model->update_otp($user_id, $otp, 'Reset Password', $timestamp);

				$data['message']			= 'Enter your OTP';
				$data['admin_theme'] 		= $this->admin_theme ;
				$data['name']				= $username;
				$data['password']			= $password;
				$data['pid']				= 1;
				echo $message;
				$this->load->view('forgot_password_view',$data);

			}else
			{
				$data['name']					= '';
				$data['new_password']			= '';
				$data['pid'] 					= 0;
				//$data['message']			= $return->message;
				$data['admin_theme'] 	= $this->admin_theme ;
				$this->load->view('thank_you_view',$data);
			}
		}
		else
		{
			$result = $this->model->verify_otp($user_id, $otp, 'Reset Password');
			$flag = FALSE;

			switch ($result)
			{
				case '1': //'otp is correct';
					$this->model->overwrite_password($user_id,$password);
					redirect('login','refresh');
					break;
				case '0': //OTP is wrong
					$flag = TRUE;
					$data['message'] = 'OTP is expired';
					break;
				default: //OTP is expired
					$flag = TRUE;
					$data['message'] = 'OTP is wrong';
					break;
			}

			if($flag)
			{
				$data['admin_theme'] 	= $this->admin_theme ;
				$data['name']					= $username;
				$data['password']			= $password;
				$data['pid']					= 1;
				$this->load->view('forgot_password_view',$data);
			}
			
		}
	}

	public function logout()
	{
		$session_id = $this->session->userdata('session_id');
		$user_id = $this->session->userdata('user_id');
		$this->model->logout($user_id, $session_id);
		$this->session->sess_destroy();
		redirect('login','refresh');
	}

	public function self_user_creation()
	{
		$pid = $this->input->post('pid');
		switch ($pid){
			case "":
				$data['username']	= '';
				$data['password']	= '';
				$data['pid']		= 0;
				$data['message']	= "Your Account will be activated in 48 Hours";
				break;
			case "0":
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$data['pid'] = 0;
				if(is_numeric($username) AND strlen($username) == 8 )
				{
					$user_id = $this->model->get_user_id($username);
					if($user_id > 0)
					{
						$data['message'] = "Your Account already Exist";
					}
					else
					{
						$member_id = $this->model->is_member($username);

						if($member_id > 0)
						{
							$mobile_no =  trim($this->model->get_mobile_no_of_member($username));
							if(strlen($mobile_no) == 10)
							{
								$otp = generate_otp();
								$message = $this->config->item('otp_message');
								$message = str_replace("@1",$otp, $message);
								$message = str_replace("@2",'User Creation', $message);

								//sending sms otp 
								if(ENVIRONMENT == 'production') {
									send_sms($mobile_no, $message);
								}else{
									echo $message;
								}

								$timestamp = date('Y-m-d H:i:s', strtotime($this->otp_expiry));
								$this->model->update_otp($member_id, $otp, 'User Creation', $timestamp);

								$mobile_no = $this->model->get_mobile_no_of_member($username);
								$data['message'] = 'Enter OTP received on your registred mobile' ;
								$data['pid'] = 1;
								echo $message;
							}
							else
							{
								$data['message'] = "Contact Society Office Your <br/>Mobile No is not updated";
							}
						}
						else
						{
							$data['message'] = "Contact Society Office Your <br/>SAP ID is not updated";
						}
					}
				}
				else
				{
					$data['message']	= "Contact Society Office Your <br/>SAP ID is not updated";
				}
				$data['username']	= $username;
				$data['password']	= $password;
				break;
			case 1:
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$otp = $this->input->post('otp');
				$member_id = $this->model->is_member($username);
				$result = $this->model->verify_otp($member_id, $otp, 'User Creation');
				if($result == 1){
					echo $member_id . ' ' . $password;
					$this->model->self_user_creation($member_id, $password);
				}
				
				die();
				redirect('site/thanks','refresh');
				break;
		}

		$data['title']		 = "Self User Creation";
		$folder_name		 = 'admin';
		$site_name 			 = $this->config->item('site_name');
		
		$data['admin_theme'] = $this->admin_theme ;
		$this->load->view('self_user_creation_view',$data);
	}

	public function unlock_user($id){

		//$username = $this->input->post('name');
		$data['result'] 		= $this->model->unlock_user($id);
		$data['message'] = 'Your account is unlock now';
		echo 'Your account is unlock now';
		
		//$this->load->view('login_view',$data);

	}

	/*public function uc($member_id, $password)
	{
		echo 'calling';
		$this->model->self_user_creation($member_id, $password);
		echo 'called';
	}*/
}
