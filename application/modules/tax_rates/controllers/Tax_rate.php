<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tax_rate extends Admin_Crud_Controller
{

	public function __construct()
	{
        parent::__construct();

        $this->load->model('Tax_rate_model','model');
       
        $this->permission = $this->get_permission();
    }

	public function index()
	{
		//$user_id = $this->session->userdata('id');
		//var_dump($user_id);
		
		$result 					= $this->model->get_all();
		
		$data 						= $this->set_view_data('Tax Rate', 'Tax Rate', $result, 'tax_rate/home_view', TRUE);
		
		$data['data']['create_permission'] 	= $this->permission['create_permission'];
		$data['data']['update_permission'] 	= $this->permission['update_permission'];
		$data['data']['delete_permission'] 	= $this->permission['delete_permission'];
		
		$this->load->view($this->admin_view, $data);
	}

	/*
	01 Write a function set_form_view() in city controller
	02 I moved form_validate() in Admin_Crud_Controller
	03 It makes my form_validate function of 2 lines
	*/
	function set_form_rule(){
		$this->form_validation->set_rules('tax_rate_tax_rate_name', ' Name', 'required');
		$this->form_validation->set_rules('tax_rate_tax_rate_percent', 'Percent', 'required');
	
	}

	public function form_validate()
	{
		$this->set_form_rule();
		echo parent::form_validate();
	}

	public function get_html_data()
	{
		
		$data['result'] 			= $this->model->get_all();
		$data['update_permission']  = $this->permission['update_permission'];
	  	$data['delete_permission']  = $this->permission['delete_permission'];
		echo  $this->load->view('tax_rate/home_detail_view', $data, TRUE);
	}

}
