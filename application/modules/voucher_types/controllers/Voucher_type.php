<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class Voucher_type extends Admin_Crud_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Voucher_type_model','model');
		//$this->load->model('accounts/Account_group_model','account_group_model');
		$this->permission = $this->get_permission();
	}

	public function voucher_type_index($register_type)
	{
		
		//$result 		 = $this->model->get_all($where_condition);
		$result = $this->common_model->get_by_custom_where('voucher_type','voucher_type_get','column_name = "'.$register_type.'"');
		$data 	= $this->set_view_data('Voucher Type', 'Voucher Type',
											 $result, 'voucher_type/home_view', TRUE);
		//$data['account_group_dropdown'] 	= $account_group_dropdown;
		
		$data['data']['create_permission'] 	= $this->permission['create_permission'];
		$data['data']['update_permission'] 	= $this->permission['update_permission'];
		$data['data']['delete_permission'] 	= $this->permission['delete_permission'];
		$data ['register_data']['register_type'] 	= $register_type;
		$this->load->view($this->admin_view, $data);	
	}
	public function sale_get(){
		//Sales Register 57
		$this->voucher_type_index('Sales Register');
	}
	public function purchase_get(){
		//Sales Register 57
		$this->voucher_type_index('Purchase Register');
	}
	public function voucher_type_other_get(){
		//Sales Register 57
		$this->voucher_type_index('Purchase Register');
	}

	public function set_form_rule()
	{
		$this->form_validation->set_rules('voucher_type_name', 'name', 'required');
		$this->form_validation->set_rules('voucher_type_register_id', 'Register ID', 'required');
		$this->form_validation->set_rules('voucher_type_debit_credit_id', 'Debit_credit', 'required');
		$this->form_validation->set_rules('voucher_type_start_no', 'Start No', 'required');
		$this->form_validation->set_rules('voucher_type_reset_frequency_id', 'Reset frequency id', 'required');
		$this->form_validation->set_rules('voucher_type_statutary_id', 'statutary_id', 'required');
		$this->form_validation->set_rules('voucher_type_company_id', 'company id', 'required');
	}

 	public function form_validate()
 	{
 		$this->set_form_rule();
 		echo parent::form_validate();
	}

	public function get_html_data()
	{
		//$where_condition ='';
		//$register_type = $this->input->post('register_type');
		$data['result'] = $this->common_model->get_by_custom('voucher_type','voucher_type_get');
		/*$data['result'] = $this->common_model->get_by_custom_where('voucher_type','voucher_type_get','column_name = "'.$register_type.'"');*/
		$data['update_permission']  = $this->permission['update_permission'];
	   	$data['delete_permission']  = $this->permission['delete_permission'];
		echo  $this->load->view('voucher_type/home_detail_view', $data, TRUE);
	}
	
}