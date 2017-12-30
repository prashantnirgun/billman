<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class Voucher_type_tax extends Admin_Crud_Controller
{
	//public $permission ;

	function __construct()
	{
		parent::__construct();
		$this->load->model('voucher_types/Voucher_type_tax_model','model');
	//	$this->load->model('accounts/Account_group_model','account_group_model');
      	//$this->permission = $this->get_permission();
		
	}
	function set_form_rule()
	{
		$this->form_validation->set_rules('voucher_type_tax_voucher_type_id', 'voucher type ', 'required');
		$this->form_validation->set_rules('voucher_type_tax_tax_rate_id', 'Tax rate', 'required');
		$this->form_validation->set_rules('voucher_type_tax_wef_date', 'date', 'required');
	}
 	public function form_validate(){	
		$this->set_form_rule();
		$_POST['voucher_type_tax_wef_date'] = date_create($this->input->post('voucher_type_tax_wef_date'))->							format("Y-m-d");
		echo parent::form_validate();

	}

	public function get_by_foreign_key($id)
	{
		$data['result'] = $this->common_model->get_by_custom_where('voucher_type_tax', 'voucher_type_tax_get', 'voucher_type_tax.voucher_type_id = '.$id);
		//$data['permission']			= $this->permission;
		//$data['create_permission']  = $this->permission['create_permission'];
		//$data['update_permission']  = $this->permission['update_permission'];
	  	//$data['delete_permission']  = $this->permission['delete_permission'];
		echo $this->load->view('voucher_type_tax/tab_detail_view', $data, TRUE);
		
	}
	
}