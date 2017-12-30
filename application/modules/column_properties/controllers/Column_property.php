<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Column_property extends Admin_Crud_Controller 
{
  	public function __construct()
 	{
        parent::__construct();
        $this->load->model('Column_property_model','model');  
        $this->permission = $this->get_permission();
    }

 	public function index()
 	{

 		$search_value 			= $this->input->post('search');
		$search_array = array();

		if (!(empty($search_value) || $search_value == ''))
		{
			array_push($search_array,array('column' => 'column_value', 'condition' => '2', 'value' => $search_value));
		}
		$where_condition = '';
		if (count($search_array)> 0)
		{
			$where_condition = $this->generate_where($search_array);
		}

 		//$result 	= $this->model->get_all($where_condition); 		
 		$result 	= $this->common_model->get_by_where('column_property',$where_condition);
		$data 		= $this->set_view_data('Column Property', 'Column Property', $result,
			         'column_property/home_view', TRUE);	
		$data['data']['search_value'] 	= $search_value;

		$data['data']['create_permission'] 	= $this->permission['create_permission'];
		$data['data']['update_permission']  = $this->permission['update_permission'];
		$data['data']['delete_permission']  = $this->permission['delete_permission'];
		//var_dump($result);	
		
		$this->load->view($this->admin_view, $data);		
 	}
 	
 	public function set_form_rule()
 	{
 		$this->form_validation->set_rules('column_property_column_value', 'column value', 'required');
		$this->form_validation->set_rules('column_property_statutary_id', 'Remark', 'required');	
 	}

 	public function form_validate()
 	{
		$this->set_form_rule();
		echo parent::form_validate();	
	}
	
	public function get_html_data()
	{
		$where_condition= '';
		$data['result'] = $this->common_model->get_by_where('column_property',$where_condition);
		$data['create_permission'] 	= $this->permission['create_permission'];
		$data['update_permission']  = $this->permission['update_permission'];
		$data['delete_permission']  = $this->permission['delete_permission'];
		echo  $this->load->view('column_property/home_detail_view', $data, TRUE);
	}
} 