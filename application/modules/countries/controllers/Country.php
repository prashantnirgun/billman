<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Country extends Admin_Crud_Controller 
{
 	public function __construct()
 	{
		parent::__construct();
        $this->load->model('Country_model','model');
         $this->permission = $this->get_permission();
    }

 	public function index()
 	{
 		//$result 		= $this->model->get_all();
 		$result = $this->common_model->get('country');
		$data 	= $this->set_view_data('Country', 'Country', $result,'country/home_view', TRUE);
		$state_dropdown = $this->common_model->get_by_column('state','id, name','key');
		$data['data']['create_permission'] 	= $this->permission['create_permission'];
		$data['data']['update_permission'] 	= $this->permission['update_permission'];
		$data['data']['delete_permission'] 	= $this->permission['delete_permission'];
		$data['data']['state_dropdown']		= $state_dropdown;
		$this->load->view($this->admin_view, $data);		
 	}
 	
 	public function set_form_rule()
 	{
 		$this->form_validation->set_rules('country_name', 'name', 'required');
 	}

 	public function form_validate()
 	{
		$this->set_form_rule();
		//echo 
		$return = parent::form_validate();
		for ($i=0; $i < 999999999; $i++) { 
			
		}
		echo $return;
	}

	public function get_html_data()
	{
		$data['result'] =  $this->common_model->get('country');
		$data['update_permission']  = $this->permission['update_permission'];
	  	$data['delete_permission']  = $this->permission['delete_permission'];
		echo  $this->load->view('country/home_detail_view', $data, TRUE);
	}

} 