<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_format extends Admin_Crud_Controller
{
 	public function __construct()
 	{
       parent::__construct();
       $this->load->model('accounts/Account_format_model','model');
       //$this->load->model('accounts/Account_head_model','account_head_model');
       //$this->load->model('companys/Company_model','company_model');
       $this->permission = $this->get_permission();
    }

 	public function index()
 	{
 		//$where_condition = ' ';
 		//$result  = $this->model->get_all($where_condition);
 		$result  = $this->common_model->get('account_format');
		$data 	 = $this->set_view_data('Account Format', 'Account Format',
      				$result,'account_format/home_view', TRUE);

 		//$data['data']['account_format_dropdown'] = $this->model->get_dropdown();
 		//$list = $this->common_model->get_by_column('account_format','id, name','array');
  		//$account_format_dropdown = $this->common_model->data_dropown($list);

  		//$data['data']['account_format_dropdown']	= $account_format_dropdown;
 		$data['data']['create_permission']			= $this->permission['create_permission'];
 		$data['data']['update_permission']			= $this->permission['update_permission'];
 		$data['data']['delete_permission']			= $this->permission['delete_permission'];
		$this->load->view($this->admin_view, $data);
 	}

 	public function set_form_rule()
 	{
 		$this->form_validation->set_rules('account_format_name', 'Format Name', 'required');
		$this->form_validation->set_rules('account_format_statutary_id', 'Statutary', 'required');
		$this->form_validation->set_rules('account_format_branch_id', 'Branch', 'required');
 	}

	public function form_validate()
	{
		$this->set_form_rule();
		echo parent::form_validate();
	}

	public function get_html_data()
	{
		
		$data['result'] 			= $this->common_model->get('account_format');
		$data['update_permission']  = $this->permission['update_permission'];
		$data['delete_permission']  = $this->permission['delete_permission'];
		echo  $this->load->view('account_format/home_detail_view', $data, TRUE);
	}

}
