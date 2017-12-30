<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

 class Client_column_property extends Admin_Crud_Controller
 {
 	
 	public function __construct()
 	{
        parent::__construct();
        $this->load->model('column_properties/Client_column_property_model','model');   
         $this->permission = $this->get_permission();
    }

 	/*public function index()
 	{
 		echo 'index';
 	}*/
 	public function set_form_rule()
 	{
 		$this->form_validation->set_rules('client_column_property_column_property_id', 'column property ID', 'required');
		$this->form_validation->set_rules('client_column_property_column_name','Column name', 'required');
		$this->form_validation->set_rules('client_column_property_set_default', 'Set Default', 'required');
		$this->form_validation->set_rules('client_column_property_statutary_id', 'statutary id', 'required');
 	}

 	public function form_validate()
 	{
 		$this->set_form_rule();
 		echo parent::form_validate();	
	}
	public function get_by_foreign_key($id)
	{
		$data['result'] = $this->common_model->get_by_custom_where('client_column_property','client_column_property_get','column_property_id = '.$id);

		$data['permission']		= $this->get_permission(); 
		$data['create_permission'] 	= $this->permission['create_permission'];
		$data['update_permission'] 	= $this->permission['update_permission'];
		$data['delete_permission'] 	= $this->permission['delete_permission'];

		echo $this->load->view('client_column_property/tab_detail_view', $data, TRUE);
		
	}
	public function get_html_data()
	{
		//$data['result'] = $this->model->get_all();
		$data['result'] = $this->common_model->get_by_custom_where('client_column_property','client_column_property_get','column_property_id = '.$id);
		echo $this->load->view('client_column_property/tab_detail_view', $data, TRUE);
	}
}/*end of main class*/
 	

