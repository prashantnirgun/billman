<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends MX_Controller{

	public function __construct(){


		parent::__construct();

		//$this->folder_name		= 'admin';
		$this->folder_name		 ='';
		$this->admin_theme 		= $this->config->item('admin_theme');//adminlte/admin
		$this->admin_view 		= $this->admin_theme .'/main' ;
		$this->site_name 		= $this->config->item('site_name');
		$is_logged 				= $this->session->userdata('is_logged');//read session data 
		
		//Before Security Check
		/*
		Immportant code below please do not comment or
		delete the lines below. You are not athorised 
		to make any change to it.
		*/
		if($is_logged == FALSE){
			redirect('login_form','refresh');
			$this->session->unset_userdata('employee_id');
		}
		$user_group_id  = $this->session->userdata('user_group_id');
		
		if($user_group_id >= 5){
			echo 'You are not authorised.';
			die();
		}
		
	}

	public function index()
	{

		/*$data['datepicker']			= true;
 		$data['select']				= true;
 		var_dump($data['datepicker']);*/
	}
	public function set_view_data($title, $header, $result, $content_view, $load_header = TRUE )
	{
		$data['header_data']['title'] 		= $title;
		$data['header_data']['header'] 		= $header;
		$data['header_data']['admin_theme'] = $this->admin_theme;
		$data['header_data']['site_name'] 	= $this->config->item('site_name');

		$data['data']['data']['result'] = $result;
		$data['content_view'] 	= $content_view ;
		$data['load_header'] 	= $load_header;
		//var_dump($data);
		return $data;
	}

	function generate_where($condition_array)
	{
		$condition = '';
		//$count = count($condition_array);
		$count = count($condition_array) - 1;
		if (count($condition_array) > 0)		
		{
			//$condition = ' WHERE ';
			foreach ($condition_array as $row=>$value )
			{
				$condition .= $this->build_condition($value['column'],  $value['condition'], $value['value']) ;
				if ($row < $count)
				{
					$condition .= ' AND ';
				}

			}
		}
		
		return $condition ;
	}


	function build_condition($column_name, $condition, $values)
	{

		switch($condition)
		{
			case 1 : //starting with
			{
				$condition = $column_name. " LIKE \"$values%\"";
				break;
			}
			case 2 : //containing with
			{
				$condition = $column_name .  " LIKE \"%$values%\"";
				break;
			}
			case 3 : //exactly with
			{
				$condition = $column_name . " = \"$values\" ";
				break;
			}
			case 4 : //Ending with
			{
				$condition = $column_name . " LIKE \"%$values\"";
				break;
			}
			case 5 : //in
			{
				$val = '';
				foreach ($values as $value) {
					if(strlen($val) > 0){
						$val .= ', ' .$value;
					}
					else{
						$val = $value;	
					}
				}
				
				$condition = $column_name . " IN($val)";
				break;
			}
			case 6 : //not inin
			{
				$val = '';
				foreach ($values as $value) {
					if(strlen($val) > 0){
						$val .= ', ' .$value;
					}
					else{
						$val = $value;	
					}
				}
				$condition = $column_name . " NOT IN($val)";
				break;
			}
			case 7 : //Numeric exactly with
			{
				$condition = $column_name . " = $values ";
				break;
			}
			default : //Date
			{
				$condition = $column_name . " BETWEEN \"$values\"";
				break;
			}
		}
		return $condition;
	}

}
