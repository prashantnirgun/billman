<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller{

	public function __construct()
	{
        parent::__construct();
  	}


	public function index()
	{
		$is_logged = $this->session->userdata('is_logged');
		//read session data is_login
		if($is_logged == FALSE)
		{
			//login page
			redirect('login','refresh');
		}
		else
		{
				$user_group_id = $this->session->userdata('user_group_id');
				$admin_theme 						= $this->config->item('admin_theme');
				$sub_admin_theme 					= $this->config->item('sub_admin_theme');
				$data['header_data']['title'] 		= 'Welcome';
				$data['header_data']['header'] 		= 'Welcome';
				$data['header_data']['admin_theme'] = $admin_theme;
				$data['header_data']['sub_admin_theme'] = $sub_admin_theme;
				$data['header_data']['site_name'] 	= $this->config->item('site_name');
				$data['data']['result'] 			= array();
				$data['content_view'] 				= 'home_view' ;
				$data['load_header'] 				= TRUE;
				if($user_group_id <= 5)
				{
					$main_view 	= $admin_theme .'/main' ;
					//echo  "inside admin";
				}
				else
				{
					$main_view = $admin_theme .'/public' .'/main' ;
				}
			///var_dump_pre($data['header_data']['admin_theme']);
			//var_dump_pre($main_view);
			$this->load->view( $main_view, $data);
		}

	}

	public function thanks(){
		$this->load->view( 'thank_you_view');
	}
/*
	public function load($name)
	{
		
		//$name = 'loan';
		$user_group_id = $this->session->userdata('user_group_id');

		if($user_group_id <= 5)
		{
	  		$name = 'admin/'.$name;
		}
		redirect($name,'refresh');
	}
*/
}
