<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System_property extends Admin_Crud_Controller
{
	public function __construct()
	{
        parent::__construct();
        $this->load->model('System_property_model','model');
     //   $this->load->model('countries/Country_model','country_model');
    }

	public function index()
	{
		$country_dropdown 				= $this->common_model->get_by_column('country','id,name','KEY');
		$result = $this->model->get_all();
		
		$data 	= $this->set_view_data('System property', 'System property', $result, 'home_view', TRUE);
		$data['data']['country_dropdown'] = $country_dropdown;
		$this->load->view($this->admin_view, $data);
	}

	function set_form_rule()
	{
		$this->form_validation->set_rules('system_property_setting_key', 'Setting Key', 'required');
		$this->form_validation->set_rules('system_property_setting_value', 'Setting Value', 'required');
	}

	public function form_validate()
	{
		$this->set_form_rule();
		echo parent::form_validate();
	}

	public function get_html_data()
	{
		$data['result'] 			= $this->model->get_all();
		
		echo  $this->load->view('home_detail_view', $data, TRUE);
	}

}
