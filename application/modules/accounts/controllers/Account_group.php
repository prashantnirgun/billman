<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_group extends Admin_Crud_Controller 
{
 	public function __construct()
 	{
        parent::__construct(); 
    	$this->load->model('Account_group_model','model');
       	//$this->load->model('Account_head_model','account_head_model');
       	$this->permission = $this->get_permission();
    }

 	public function index()
 	{ 		
 		$search_value 					= $this->input->post('search_value');
 		$column_name 					= $this->input->post('account_head_id');

 		//build search array
		$search_array = array();

		if (!(empty($search_value) || $search_value == ''))
		{
			array_push($search_array,array('column' => 'account_group.name', 'condition' => '1', 'value' => $search_value));
		}
		if ($column_name > 0)
		{
			array_push($search_array, array('column' => 'account_group.account_head_id', 'condition' => '3', 'value' => $column_name));
		}

		$where_condition = '';
		if (count($search_array)> 0)
		{
			$where_condition = $this->generate_where($search_array);
		}

 		//$result = $this->model->get_all_account_group($where_condition);
 		$result	= $this->common_model->get_by_custom_where('account_group',
 			'account_group_get',$where_condition);
 		$account_head_dropdown = $this->common_model->get_by_column('account_head','id, name','KEY');
  		
		$data = $this->set_view_data('Account Group','Account Group', $result,'account_group/home_view', TRUE);

		$data['search']['search_value'] 		= $search_value;
		$data['search']['column_name'] 			= $column_name;
 		$data['search']['account_head_dropdown'] = $account_head_dropdown;
 		
 		$data['data']['create_permission'] 		 = $this->permission['create_permission'];
		$data['data']['update_permission'] 		 = $this->permission['update_permission'];
		$data['data']['delete_permission'] 		 = $this->permission['delete_permission'];
		$this->load->view($this->admin_view, $data);	
 	}

 	public function set_form_rule()
 	{
 		$this->form_validation->set_rules('account_group_name', 'Group Name', 'required');
		$this->form_validation->set_rules('account_group_herarcy', 'Herarcy', 'required');
		$this->form_validation->set_rules('account_group_account_head_id', 'HEAD Name', 'required');
		$this->form_validation->set_rules('account_group_statutary_id', 'satutary Name', 'required');
		$this->form_validation->set_rules('account_group_branch_id', 'Branch ID', 'required');
 	}

 	public function form_validate()
 	{
		$this->set_form_rule();
		echo parent::form_validate();
	}

	public function get_html_data()
	{
		$where_condition = '';
		$search_value 				= $this->input->post('search_value');
 		$column_name 				= $this->input->post('account_head_id');
 		$data['result']				=  $this->common_model->get_by_custom_where('account_group',
 			'account_group_get',$where_condition);
 		$data['update_permission']  = $this->permission['update_permission'];
	   	$data['delete_permission'] 	= $this->permission['delete_permission'];
		echo  $this->load->view('account_group/home_detail_view', $data, TRUE);
	}

	

}/*end of Account group class*/