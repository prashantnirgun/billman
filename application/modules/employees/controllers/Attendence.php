<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class Attendence extends Admin_Crud_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Attendence_model','model');
		$this->load->model('Employee_model','employee_model');
		//$this->load->model('companys/Company_model','company_model');
		$this->permission = $this->get_permission();
	}
	public function index()
	{

		
		//$employee_dropdown		= $this->employee_model->get_dropdown();
		$employee_dropdown		= $this->common_model->get_by_column('employee','id, name','key');
		//var_dump($employee_dropdown);
		$criteria 				= $this->input->post('criteria');
		$search_value 			= $this->input->post('search');

		$in_date 					= $this->input->post('in_date');
		$out_date 						= $this->input->post('out_date');
		
		//build search array
		$search_array = array();

		if (!(empty($search_value) || $search_value == ''))
		{
			array_push($search_array,array('column' => 'a.name', 'condition' => $criteria, 'value' => $search_value));
		}
		
		$where_condition = '';
		if (count($search_array)> 0)
		{
			$where_condition = 'WHERE ' . $this->generate_where($search_array);
		}
		
 		$result 	= $this->employee_model->get_all_employee_attendence($where_condition);
		$data 		= $this->set_view_data('Attendence', 'Attendence',$result, 'attendence/home_view', TRUE);
		$data['data']['employee_dropdown'] 		= $employee_dropdown;
		$data['data']['criteria'] 				= $criteria;
		$data['data']['search_value'] 			= $search_value;

		$data['data']['create_permission'] 	= $this->permission['create_permission'];
		$data['data']['update_permission'] 	= $this->permission['update_permission'];
		$data['data']['delete_permission'] 	= $this->permission['delete_permission'];
		
		$this->load->view($this->admin_view, $data);	
	}
	
	public function set_form_rule()
	{
		$this->form_validation->set_rules('attendence_employee_id', 'Employee Name', 'required');
		$this->form_validation->set_rules('attendence_present_date', 'Present Date', 'required');
		$this->form_validation->set_rules('attendence_status_id', 'Status', 'required');
		//$this->form_validation->set_rules('attendence_record_lock', 'record_lock', 'required');
		//$this->form_validation->set_rules('attendence_archive_id', 'archive ID', 'required');
	}

	public function form_validate()
	{
		$this->set_form_rule();
		$_POST['attendence_present_date'] = date_create($this->input->post('attendence_present_date'))->format("Y-m-d");
		echo parent::form_validate();
	}
	
	public function get_by_foreign_key($id)
	{

		$data['result'] = $this->model->get_by_employee_id($id);
		/*$data['result'] = $this->common_model->get_by_custom_where('attendence','','attendence.employee_id = '.$id);*/
		$data['create_permission'] 	= $this->permission['create_permission'];
		$data['update_permission'] 	= $this->permission['update_permission'];
		$data['delete_permission'] 	= $this->permission['delete_permission'];
	echo  $this->load->view('attendence/tab_detail_view', $data, TRUE);
	}

	public function retrieve_attendence()
	{
		
		$id 				= $this->input->post('id');
		$in_date 			=  $this->input->post('in_date');
		$out_date			=  $this->input->post('out_date');

		$search_array = array();
		if( !(empty($in_date) AND empty($out_date)) )
        {
        	array_push($search_array, array('column' => 'attendence.present_date', 'condition' => ' ', 'value' =>
        	  date_create($in_date)->format("Y-m-d").'"'." AND ". 
        	  '"'.date_create($out_date)->format("Y-m-d")));
        }

        $where_condition = '';
		if (count($search_array)> 0)
		{
			$where_condition =  $this->generate_where($search_array);
		}

	$data['result'] 	= $this->model->retrive_attendence($id,$where_condition);
		/*$data['result'] 	= $this->common_model->get_by_custom_where('attendence','','attendence.employee_id = '.$id);*/
		
		echo $this->load->view('attendence/tab_detail_view', $data, TRUE);
	}
	
	public function show_attendence_details()
	{
		$employee_id 	= $this->input->post('id');
		$data['result'] = $this->model->getVal($employee_id);
		echo $this->load->view('attendence/monthly_detail_view', $data, TRUE);
	}

	public function attendence_out()
	{
		$id 		= $this->input->post('id');
		$check_in	= $this->input->post('check_in');
		$check_out	= $this->input->post('check_out');
		$check_time	= $check_in-$check_out;
			var_dump($check_time);
		if($check_time <5)
		$this->model->sign_out($id);
	}
	public function callsp()
	{
		$id 				=  $this->input->post('employee_id');
		$date_att 			= $this->input->post('doc_date');
		$daily_attendence 	= $this->input->post('daily_attendence');
		$data['result'] 	= $this->model->getMenus($id,$date_att,$id,$daily_attendence);
		echo json_encode($data);
		
	}

}

