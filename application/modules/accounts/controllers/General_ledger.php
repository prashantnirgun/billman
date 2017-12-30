<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class General_ledger extends Admin_Crud_Controller 
{
 	public function __construct()
 	{
        parent::__construct();
       	$this->load->model('accounts/General_ledger_model','model');
       	$this->permission  = $this->get_permission();
    }

 	public function index()
 	{
		$account_group_dropdown = $this->common_model->get_by_column('account_group','id, name','KEY');
 
 		$search_value 					=$this->input->post('search_value');
 		$column_name 					=$this->input->post('account_group_id');

 		//build search array
		$search_array = array();

		if (!(empty($search_value) || $search_value == ''))
		{
		  array_push($search_array,array('column' => 'general_ledger.name','condition' => '1', 'value' => $search_value));
		}
		if ($column_name > 0)
		{
			array_push($search_array, array('column' => 'general_ledger.account_group_id','condition' => '3','value' => $column_name));
		}

		$where_condition = '';
		if (count($search_array)> 0)
		{
			$where_condition = $this->generate_where($search_array);
		}
		
 		//$result = $this->model->get_all_general_ledger($where_condition);
 		$result = $this->common_model->get_by_custom_where('general_ledger','general_ledger_get',$where_condition);
		$data 	= $this->set_view_data('General Ledger','General Ledger',
					$result, 'general_ledger/home_view', TRUE);

		$data['search']['search_value'] 			= $search_value;
 		$data['search']['column_name'] 				= $column_name;
 		$data['search']['account_group_dropdown'] 	= $account_group_dropdown;
 		
 		$data['data']['create_permission'] 			= $this->permission['create_permission'];
		$data['data']['update_permission'] 			= $this->permission['update_permission'];
		$data['data']['delete_permission'] 			= $this->permission['delete_permission'];

		$this->load->view($this->admin_view, $data);

 	}

 	public function set_form_rule()
 	{
 		$this->form_validation->set_rules('general_ledger_name', 'general ledger name','required');
		$this->form_validation->set_rules('general_ledger_account_group_id', 'Group Name','required');
		$this->form_validation->set_rules('general_ledger_debit_credit_id','Debit credit','required');
		$this->form_validation->set_rules('general_ledger_opening_amount', 'Opening', 'required');
 	}

	public function form_validate()
	{
		$this->set_form_rule();
		echo parent::form_validate();
	}
	
	public function get_html_data()
	{
		$where_condition = '';
		$data['update_permission']  = $this->permission['update_permission'];
	  	$data['delete_permission']  = $this->permission['delete_permission'];
 		$data['result'] = $this->common_model->get_by_custom_where('general_ledger','general_ledger_get',$where_condition);
		echo  $this->load->view('general_ledger/home_detail_view', $data, TRUE);
	}

	
}
 	