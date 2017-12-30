<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_head extends Admin_Crud_Controller 
{
 	public function __construct()
 	{
	   parent::__construct();
	   $this->load->model('Account_head_model','model');
	   	$this->permission = $this->get_permission();
    }

 
 	public function set_form_rule()
 	{
 		$this->form_validation->set_rules('account_head_account_format_id', 'Name', 'required');
		$this->form_validation->set_rules('account_head_name', 'Name', 'required');
		$this->form_validation->set_rules('account_head_statutary_id', 'statutary', 'required');
		$this->form_validation->set_rules('account_head_branch_id', 'statutary', 'required');
 	}

 	public function form_validate()
 	{
 		$this->set_form_rule();
 		echo parent::form_validate();
	}

	public function get_by_foreign_key($id)
	{
		//$data['result'] = $this->model->get_by_account_format_id($id);
		$data['result'] = $this->common_model->get_by_custom_where('account_head', 'account_head_get','account_format_id = '. $id);
		$data['create_permission'] 		 = $this->permission['create_permission'];
		$data['update_permission']  = $this->permission['update_permission'];
	   	$data['delete_permission'] 	= $this->permission['delete_permission'];
		echo $this->load->view('account_head/tab_detail_view', $data, TRUE);
		
	}
 }