<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_group extends Admin_Crud_Controller
{

	public function __construct()
	{
        parent::__construct();        
        $this->load->model('User_group_model','model');  
        $this->permission = $this->get_permission();
    }

	public function index()
	{	
		$this->load->model('companys/Company_model','company_model');
    	//$status_dropdown 					= $this->company_model->build_dropdown('Member');
    	$status_dropdown 					= $this->common_model->get_by_custom_where('property_view','property_dropdown','column_value = "User_status"','KEY');
		$search_value 						= $this->input->post('search_value');
		$user_status_select 				= $this->input->post('user_group_status_id');

		//build search array
		$search_array = array();

		if (!(empty($search_value) || $search_value == ''))
		{
			array_push($search_array,array('column' => 'user_group.name', 'condition' => '2', 'value' => $search_value));
		}
		if ($user_status_select > 0)
		{
			array_push($search_array, array('column' => 'user_group.status_id', 'condition' => '3', 'value' => $user_status_select));
		}

		$where_condition = '';
		if (count($search_array)> 0)
		{
			$where_condition = $this->generate_where($search_array);
		}
		
 		//$result 							= $this->model->get_all_user_group($where_condition);
 		$result 							= $this->common_model->get_by_custom_where('user_group','user_group_get',$where_condition);
			
		$data 								= $this->set_view_data('User Group', 'User Group',
											$result,'user_group/home_view', TRUE);
		$user_status_select 				= $this->input->post('user_status_select');	
		$data['search']['search_value']			= $search_value;
		$data['search']['user_status_select']	= $user_status_select;
		$data['data']['status_dropdown'] 	= $status_dropdown;	

		$data['data']['create_permission'] 	= $this->permission['create_permission'];
		$data['data']['update_permission']  = $this->permission['update_permission'];
		$data['data']['delete_permission']  = $this->permission['delete_permission'];
		$this->load->view($this->admin_view, $data);
		
	}
	
	public function set_form_rule()
	{
		$this->form_validation->set_rules('user_group_name', 'Group Name', 'required');
		$this->form_validation->set_rules('user_group_status_id', 'User Status', 'required');
		$this->form_validation->set_rules('user_group_company_id', 'Company name', 'required');
	}

	public function form_validate()
	{
		$this->set_form_rule();
		echo parent::form_validate();
	}

	public function get_html_data()
	{
		$search_array    = array();
		$where_condition = '';
		if (count($search_array)> 0)
		{
			$where_condition = $this->generate_where($search_array);
		}
		
		$data['result'] 	=  $this->common_model->get_by_custom_where('user_group','user_group_get',$where_condition);
		$data['create_permission']  = $this->permission['create_permission'];
	    $data['update_permission']  = $this->permission['update_permission'];
	    $data['delete_permission']  = $this->permission['delete_permission'];
		echo  $this->load->view('user_group/home_detail_view', $data, TRUE);
	}
}