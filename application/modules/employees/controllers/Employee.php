<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class Employee extends Admin_Crud_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Employee_model','model');
		//$this->load->model('employees/Employee_detail_model','employee_detail_model');
		//$this->load->model('companys/Company_model','company_model');
		//$this->load->model('users/User_model','user_model');
		$this->permission = $this->get_permission();
	}
	
	public function index()
	{	
		$where_condition ='';
		//$result 		= $this->model->get_all($where_condition);
		$result = $this->common_model->get_by_custom('employee','employee_get');
		$data 			= $this->set_view_data('Employee', 'Employee', $result,'employee/home_view', TRUE);
		
		$data['data']['create_permission'] 	= $this->permission['create_permission'];
		$data['data']['update_permission'] 	= $this->permission['update_permission'];
		$data['data']['delete_permission'] 	= $this->permission['delete_permission'];
		$this->load->view($this->admin_view, $data);	
	}

	public function set_form_rule()
	{
		$this->form_validation->set_rules('employee_name', 'Employee Name', 'required');
		$this->form_validation->set_rules('employee_user_id', 'user ID', 'required');
		$this->form_validation->set_rules('employee_telephone_no1', 'Telephone_no1', 'required');
		$this->form_validation->set_rules('employee_telephone_no2', 'Telephone_no2', 'required');
		$this->form_validation->set_rules('employee_email_id', 'Email Id', 'required');
		$this->form_validation->set_rules('employee_address1', 'Address1', 'required');
		$this->form_validation->set_rules('employee_address2', 'Address2', 'required');
		$this->form_validation->set_rules('employee_pancard_no', 'Pancard No', 'required');
		$this->form_validation->set_rules('employee_birth_date', 'Birth Date', 'required');
		$this->form_validation->set_rules('employee_marital_status_id', 'Marital Status', 'required');
		$this->form_validation->set_rules('employee_gender_id', 'Gender', 'required');
		$this->form_validation->set_rules('employee_employeement_type_id', 'Employeement Type', 'required');
	}

	public function form_validate()
	{
		$this->set_form_rule();
		//Convert date format for mysql 
        $_POST['employee_birth_date'] = date_create($this->input->post('employee_birth_date'))->							format("Y-m-d");
        echo parent::form_validate();
	}
	
	public function get_html_data()
	{
		$where_condition ='';
		$data['result'] = $this->common_model->get_by_custom('employee','employee_get');
		$data['update_permission']  = $this->permission['update_permission'];
	   	$data['delete_permission']  = $this->permission['delete_permission'];
		echo  $this->load->view('employee/home_detail_view', $data, TRUE);
	}
	
}