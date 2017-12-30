<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acl_group_permission extends Admin_Crud_Controller
{

	public function __construct()
	{
        parent::__construct();    
        $this->load->model('Acl_group_permission_model','model');
     	//$this->load->model('Acl_model','acl_model');
     	$this->permission = $this->get_permission();

     	//$this->load->model('User_group_model','user_group_model');
    }

	public function index()
	{	
		
		$search_value 					= $this->input->post('search_value');
		$user_group 					= $this->input->post('user_group_id');
		$search_array = array();

		if (!(empty($search_value) || $search_value == ''))
		{
			array_push($search_array,array('column' => 'module_name', 'condition' => '1', 'value' => $search_value));
		}
		if ($user_group > 0)
		{
			array_push($search_array, array('column' => 'user_group_id', 'condition' => '3', 'value' => $user_group));
		}
		$where_condition = '';
		//var_dump($where_condition);
		if(count($search_array)> 0)
		{
			$where_condition = $this->generate_where($search_array);
		}

		//$result = $this->model->get_all($where_condition);
		$result	= $this->common_model->get_by_custom_where('acl_group_permission','acl_group_permission_get',$where_condition);

		$acl_dropdown      = $this->common_model->get_by_column('acl','id,module_name as name','KEY');
		$user_group_dropdown      = $this->common_model->get_by_column('user_group','id,name','KEY');
		//$acl_dropdown		= $this->acl_model->get_dropdown();
		//$user_group_dropdown		 = $this->user_group_model->get_dropdown();
		$data = $this->set_view_data('Group Permission','Group Permission',$result,'acl_group_permission/home_view', TRUE);
		$data['data']['acl_dropdown'] 		= $acl_dropdown;
		$data['data']['user_group_dropdown'] = $user_group_dropdown;
		$data['data']['search_value'] = $search_value;
		
		$data['data']['create_permission'] 	= $this->permission['create_permission'];
		$data['data']['update_permission']  = $this->permission['update_permission'];
		$data['data']['delete_permission']  = $this->permission['delete_permission'];

		$this->load->view($this->admin_view, $data);
	}
	
	public function set_form_rule()
	{

		$this->form_validation->set_rules('acl_group_permission_acl_id', 'Acl name', 'required');
		$this->form_validation->set_rules('acl_group_permission_user_group_id', 'TAble Name', 'required');
		$this->form_validation->set_rules('acl_group_permission_create_permission', 'Create Permission', 'required');
		$this->form_validation->set_rules('acl_group_permission_update_permission', 'Update Permission', 'required');
		$this->form_validation->set_rules('acl_group_permission_delete_permission', 'Deleted Permission', 'required');
	}

	public function form_validate()
	{
		$this->set_form_rule();
		echo parent::form_validate();
	}

	public function get_html_data()
	{
		
		$where_condition ='';
		$data['result'] = $this->common_model->get_by_custom_where('acl_group_permission','acl_group_permission_get',$where_condition);
		$data['create_permission']  = $this->permission['create_permission'];
	    $data['update_permission']  = $this->permission['update_permission'];
	    $data['delete_permission']  = $this->permission['delete_permission'];
		echo  $this->load->view('acl_group_permission/home_detail_view', $data, TRUE);
	}

}