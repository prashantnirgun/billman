<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class General_ledger_detail extends Admin_Crud_Controller
 {
 	
 	public function __construct()
 	{
       parent::__construct(); 
       $this->load->model('accounts/General_ledger_detail_model','model');
       //$this->load->model('accounts/General_ledger_model','general_ledger_model');
    
    }

 	/*public function index(){
 		$result 		= $this->model->get_all();
		$data 			= $this->set_view_data('general ledger detail', 'general ledger detail',
						$result, 'general_ledger_detail_list_view', TRUE);		
		$this->load->view($this->admin_view, $data);
 	}*/
 	/*public function set_form_rule()
 	{
 		$this->form_validation->set_rules('general_ledger_detail_general_ledger_id','general ledger head', 'required');
		$this->form_validation->set_rules('general_ledger_detail_contact_person_name','person name', 'required');
		$this->form_validation->set_rules('general_ledger_detail_email', 'email', 'required');
		$this->form_validation->set_rules('general_ledger_detail_telephone1','telephone1','required');
		$this->form_validation->set_rules('general_ledger_detail_telephone2','telephone2','required');
		$this->form_validation->set_rules('general_ledger_detail_branch_type_id','branch type', 'required');
		$this->form_validation->set_rules('general_ledger_detail_address1','address1','required');
		$this->form_validation->set_rules('general_ledger_detail_address2','address2','required');
		$this->form_validation->set_rules('general_ledger_detail_address3','address3','required');
		$this->form_validation->set_rules('general_ledger_detail_remarks','remarks', 'required');
 	}
 	public function form_validate()
 	{
		$this->set_form_rule();
		echo parent::form_validate();
	}*/

	/*public function get_html_data()
	{	
 		$data['result'] 		= $this->general_ledger_model->get_all();
		$data['create_permission'] 	= $this->permission['create_permission'];
		$data['update_permission'] 	= $this->permission['update_permission'];
		$data['delete_permission'] 	= $this->permission['delete_permission'];
		echo  $this->load->view('general_ledger/general_ledger_home_detail_view', $data, TRUE);
	}

	public function get_by_foreign_key($id)
	{
		$data['result'] 			= $this->model->get_by_general_legder_id($id);
		$data['create_permission'] 	= $this->permission['create_permission'];
		$data['update_permission'] 	= $this->permission['update_permission'];
		$data['delete_permission'] 	= $this->permission['delete_permission'];
		echo $this->load->view('general_ledger/general_ledger_home_detail_view', $data, TRUE);	
	}*/
 }