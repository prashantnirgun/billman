<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ACL extends Admin_Crud_Controller{

	public function __construct()
	{
        parent::__construct();    
        $this->load->model('Acl_model','model'); 
         $this->permission = $this->get_permission();
    }
 
	public function index()
	{	
		
		$search_value 					= $this->input->post('search_value');
		$search_array = array();

		if (!(empty($search_value) || $search_value == ''))
		{
			array_push($search_array,array('column' => 'module_name', 'condition' => '1', 'value' => $search_value));
		}
		$where_condition = '';
		if (count($search_array)> 0)
		{
			$where_condition =  $this->generate_where($search_array);
		}
		$user_group_dropdown 			= $this->common_model->get_by_column('user_group','id,name','KEY');
		
		//$result = $this->model->get_all($where_condition);
		$result	= $this->common_model->get_by_custom_where('acl','acl_get',$where_condition);

		$data = $this->set_view_data('ACL', 'ACL', $result, 'acl/home_view', TRUE);
		$data['data']['user_group_dropdown'] = $user_group_dropdown;
		$data['data']['search_value'] = $search_value;

		$data['data']['create_permission'] 	= $this->permission['create_permission'];
		$data['data']['update_permission']  = $this->permission['update_permission'];
		$data['data']['delete_permission']  = $this->permission['delete_permission'];

		$this->load->view($this->admin_view, $data);
		//var_dump($data);
	}
	
	public function set_form_rule()
	{
		$this->form_validation->set_rules('acl_module_name', 'Module Name', 'required');
		$this->form_validation->set_rules('acl_table_name', 'TAble Name', 'required');
		$this->form_validation->set_rules('acl_create_permission', 'Create Permission', 'required');
		$this->form_validation->set_rules('acl_update_permission', 'Update Permission', 'required');
		$this->form_validation->set_rules('acl_delete_permission', 'Deleted Permission', 'required');
	}

	public function form_validate()
	{
		$this->set_form_rule();
		echo parent::form_validate();
	}

	public function get_html_data()
	{
		$where_condition = '';
		$data['result'] = $this->common_model->get_by_custom_where('acl','acl_get',$where_condition);
		$data['create_permission']  = $this->permission['create_permission'];
	    $data['update_permission']  = $this->permission['update_permission'];
	    $data['delete_permission']  = $this->permission['delete_permission'];
		echo  $this->load->view('acl/home_detail_view', $data, TRUE);
	}

}