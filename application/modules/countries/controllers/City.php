<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City extends Admin_Crud_Controller
{

	public function __construct()
	{
        parent::__construct();
        $this->load->model('City_model','model');
        $this->permission = $this->get_permission();
    }

  
    
	public function index()
	{
		$where_condition = ' ';
		//$result 					= $this->model->get_all($where_condition);
		$result = $this->common_model->get_by_custom('city','city_get');

  		$state_dropdown = $this->common_model->get_by_column('state','id, name','key');
  	
		$data 	= $this->set_view_data('City', 'City', $result, 'home_view', TRUE);
		
		$data['data']['state_dropdown']		= $state_dropdown;
		$data['data']['create_permission'] 	= $this->permission['create_permission'];
		$data['data']['update_permission'] 	= $this->permission['update_permission'];
		$data['data']['delete_permission'] 	= $this->permission['delete_permission'];
		
		//last_query();
		$this->load->view($this->admin_view, $data);
	}

	function set_form_rule()
	{
		$this->form_validation->set_rules('city_name', 'City Name', 'required');
		$this->form_validation->set_rules('city_state_id', 'State', 'required');
	}

	public function form_validate()
	{
		$this->set_form_rule();
		echo parent::form_validate();
	}

	public function get_by_foreign_key($id)
	{
		//$data['result'] = $this->model->get_by_foreign_key($id);
		//$data['result'] = $this->common_model->get_by_where('city','state_id = '. $id);
		$data['result'] = $this->common_model->get_by_custom_where('city','city_get','state_id = '. $id);
		$data['create_permission'] 	= $this->permission['create_permission'];
		$data['update_permission']  = $this->permission['update_permission'];
	  	$data['delete_permission']  = $this->permission['delete_permission'];
		echo $this->load->view('city/tab_detail_view', $data, TRUE);
		
	}
	public function get_html_data()
	{
		
		$data['result'] = $this->common_model->get_by_custom('city','city_get');
		
		$data['update_permission']  = $this->permission['update_permission'];
	  	$data['delete_permission']  = $this->permission['delete_permission'];
		echo  $this->load->view('city/tab_detail_view', $data, TRUE);
	}

}
