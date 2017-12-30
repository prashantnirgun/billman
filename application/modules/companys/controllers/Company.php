<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends Admin_Crud_Controller 
{
 
 	public function __construct()
 	{
	    parent::__construct();    
	    $this->load->model('Company_model','model');
	    //$this->load->model('companys/Branch_model','branch_model');     
	    $this->permission = $this->get_permission();
    }

 	public function index()
 	{
 		//$where_condition = '';
 		$result = $this->common_model->get_by_custom('company','company_get');
		$data = $this->set_view_data('Company', 'Company', $result, 
							  'company/home_view',TRUE);
		$data['data']['create_permission'] 	= $this->permission['create_permission'];
		$data['data']['update_permission'] 	= $this->permission['update_permission'];
		$data['data']['delete_permission'] 	= $this->permission['delete_permission'];
		$this->load->view($this->admin_view, $data);	
 	}
 	
 	public function set_form_rule()
 	{
 		$this->form_validation->set_rules('company_name', 'Company Name', 'required');
		$this->form_validation->set_rules('company_no_of_branch', 'No Of Branch', 'required');
		$this->form_validation->set_rules('company_address1', 'Address1', 'required');
		$this->form_validation->set_rules('company_address2', 'Address2', 'required');
		$this->form_validation->set_rules('company_address3', 'Address3', 'required');
		$this->form_validation->set_rules('company_company_type_id', 'company_type_id', 'required');
		$this->form_validation->set_rules('company_start_date', 'start_date', 'required');
		$this->form_validation->set_rules('company_end_date', 'end_date', 'required');
 	}

	public function form_validate()
	{	
		$this->set_form_rule();

		$table_name = $this->input->post('document_list_table_name');

        $folder_name = './uploads/company';
          if (!file_exists($folder_name))
          {
              mkdir($folder_name, 0777, true);
          }
        //Convert date format for mysql 
    	$_POST['company_start_date'] = date_create($this->input->post('company_start_date'))->format("Y-m-d");
    	$_POST['company_end_date'] = date_create($this->input->post('company_end_date'))->format("Y-m-d");
    	echo parent::form_validate(); 
	}

	public function get_html_data()
	{
		//$where_condition  = ' ';
		$data['result']   = $this->common_model->get_by_custom('company','company_get');
		$data['update_permission']  = $this->permission['update_permission'];
	   	$data['delete_permission']  = $this->permission['delete_permission'];
		echo  $this->load->view('company/home_detail_view', $data, TRUE);
	}

} /*end of Company class*/