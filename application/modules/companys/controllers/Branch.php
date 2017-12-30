<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch extends Admin_Crud_Controller 
{
 	public function __construct()
 	{
	    parent::__construct();    
	 	$this->load->model('Branch_model','model');
	 	$this->permission = $this->get_permission();       
    }
    
 	public function set_form_rule()
 	{
 		$this->form_validation->set_rules('branch_company_id', 'Company Name', 'required');
		$this->form_validation->set_rules('branch_manager', 'Manager', 'required');
		$this->form_validation->set_rules('branch_address1', 'Address1', 'required');
		$this->form_validation->set_rules('branch_address2', 'Address2', 'required');
		$this->form_validation->set_rules('branch_address3', 'Address3', 'required');
		$this->form_validation->set_rules('branch_telephone_no', 'Telephone_no', 'required');
		$this->form_validation->set_rules('branch_email_id', 'Email id', 'required');
		$this->form_validation->set_rules('branch_type_id', 'type_id', 'required');
 	}

	public function form_validate()
	{
		$this->set_form_rule();

		//$table_name = $this->input->post('document_list_table_name');

        $folder_name = './uploads/company/branch';
          if (!file_exists($folder_name))
          {
              mkdir($folder_name, 0777, true);
          }
		echo parent::form_validate();
	}

	public function get_by_foreign_key($id)
	{
		//$data['result'] 			= $this->model->test_fk($id);
		$data['result'] = $this->common_model->get_by_where('branch','company_id = '. $id);
		//var_dump($data['result']);
		$data['update_permission']  = $this->permission['update_permission'];
	   	$data['delete_permission']  = $this->permission['delete_permission'];
		echo $this->load->view('branch/tab_detail_view', $data, TRUE);
		
	}
 } 