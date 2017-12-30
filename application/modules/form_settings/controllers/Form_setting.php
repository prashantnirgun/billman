<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_setting extends Admin_Crud_Controller
{

	public function __construct()
	{
        parent::__construct();
        $this->load->model('Form_setting_model','model');
       // $this->permission = $this->get_permission();
    }

  
    
	public function index()
	{
		$where_condition = ' ';
		$search_value 					=$this->input->post('search_value');
		$search_array = array();

		if (!(empty($search_value) || $search_value == ''))
		{
		  array_push($search_array,array('column' => 'form_setting.form_name','condition' => '1', 'value' => $search_value));
		}

		if (count($search_array)> 0)
		{
			$where_condition = $this->generate_where($search_array);
		}
		//$result 					= $this->model->get_all($where_condition);
		$result = $this->common_model->get('form_setting');

		
  	//	$state_dropdown = $this->common_model->get_by_column('state','id, name','key');
  	
		$data 	= $this->set_view_data('Form Setting', 'Form Setting', $result, 'home_view', TRUE);
		
		$data['search']['search_value'] 	= $search_value;
		/*$data['data']['state_dropdown']		= $state_dropdown;
		$data['data']['create_permission'] 	= $this->permission['create_permission'];
		$data['data']['update_permission'] 	= $this->permission['update_permission'];
		$data['data']['delete_permission'] 	= $this->permission['delete_permission'];*/
		
		//last_query();
		$this->load->view($this->admin_view, $data);
	}

	function set_form_rule()
	{
		$this->form_validation->set_rules('form_setting_column_id', 'Column Id', 'required');
		$this->form_validation->set_rules('form_setting_display_name', 'Display Name', 'required');
		$this->form_validation->set_rules('form_setting_display_order', 'Display Order', 'required');
		$this->form_validation->set_rules('form_setting_class_name', 'Class Name', 'required');
	//$this->form_validation->set_rules('form_setting_widget', 'Widget', 'required');
		//$this->form_validation->set_rules('form_setting_extra', 'Extra', 'required');
		//$this->form_validation->set_rules('form_setting_table_name', 'table name', 'required');
		//$this->form_validation->set_rules('form_setting_form_name', 'Form name', 'required');
	}

	public function form_validate()
	{
		$this->set_form_rule();
		echo parent::form_validate();
	}

	public function get_html_data()
	{
		
		$data['result'] = $this->common_model->get('form_setting');
		
	/*	$data['update_permission']  = $this->permission['update_permission'];
	  	$data['delete_permission']  = $this->permission['delete_permission'];*/
		echo  $this->load->view('home_detail_view', $data, TRUE);
	}

}
