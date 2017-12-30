<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Crud_Controller
{
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('User_model','model');
	   /* $this->load->model('User_group_model','user_group_model');
	    $this->load->model('companys/Company_model','company_model');*/
	     $this->permission = $this->get_permission();

    }

	public function index()
	{
		$id = $this->session->userdata('user_id');
		//$user_result = parent::get($id);

		$search_value 		= $this->input->post('search_value');
		$user_status_select = $this->input->post('user_status_select');

		$user_group 		= $this->input->post('user_group_id');
		$user_status 		= $this->input->post('user_status_id');
		
		$user_group_dropdown = $this->common_model->get_by_column('user_group','id,name','KEY');
		$user_group_dropdown[0] 		= 'All Group';
		ksort($user_group_dropdown);

		$status_dropdown = $this->common_model->get_by_custom_where('property_view','property_dropdown','column_value = "User_status"','KEY');
		$status_dropdown[0] = 'All Record';
		ksort($status_dropdown);
		
		$search_array = array();

		if (!(empty($search_value) || $search_value == ''))
		{
			array_push($search_array,array('column' => 'user.name', 'condition' => '2', 'value' => $search_value));
		}

		if ($user_group > 0)
		{
			array_push($search_array, array('column' => 'user.user_group_id', 'condition' => '3', 'value' => $user_group));
		}
		if ($user_status > 0)
		{
			array_push($search_array, array('column' => 'user.user_status_id', 'condition' => '3', 'value' => $user_status));
		}


		$where_condition = '';
		if (count($search_array)> 0)
		{
			$where_condition = $this->generate_where($search_array);
		}
		
		$result =  $this->common_model->get_by_custom_where('user','user_get',$where_condition);

		$data = $this->set_view_data('User', 'User', $result, 'user/home_view', TRUE);
		$data['data']['search_value'] 	= $search_value;
		$data['data']['status_dropdown'] 	= $status_dropdown;
		$data['data']['user_group_dropdown'] 	= $user_group_dropdown;
		//$data['data']['group_select'] 	= $group_select;
		$data['data']['user_status_select'] 	= $user_status_select;

		$data['data']['create_permission'] 	= $this->permission['create_permission'];
		$data['data']['update_permission']  = $this->permission['update_permission'];
		$data['data']['delete_permission']  = $this->permission['delete_permission'];
		//$data['data']['user_result'] 	= $user_result;
		
		$this->load->view($this->admin_view, $data);
	}

	/*public function user_index()
	{
		$id = $this->session->userdata('user_id');
		$user_result = parent::get($id);
		return $user_result;
	}
*/
	public function set_form_rule()
	{
		$this->form_validation->set_rules('user_name', 'User Name', 'required');
		$this->form_validation->set_rules('user_user_group_id', 'usser group', 'required');
		$this->form_validation->set_rules('user_email_id', 'Email ID', 'required');
		$this->form_validation->set_rules('user_mobile', 'Mobile', 'required');
		$this->form_validation->set_rules('user_user_status_id', 'user status', 'required');
		//$this->form_validation->set_rules('user_password', 'Password', 'required');
	}

	public function form_validate()
	{
		
		$password = $this->input->post('user_password');
		$user_status_id = $this->input->post('user_user_status_id');
		
		if($password == '')
		{
			$_POST['user_password'] = "password";
		}
		
		if($user_status_id == 37)
		{
			$_POST['user_login_attempt'] = 0;
		}

		$this->set_form_rule();
		echo parent::form_validate();
	}

	public function get_html_data()
	{
		$where_condition='';
		$data['result'] 		=  $this->common_model->get_by_custom_where('user','user_get',$where_condition);
		$data['delete_permission']  = $this->permission['delete_permission'];
		echo  $this->load->view('user/home_detail_view', $data, TRUE);
	}

	public function overwrite_password()
	{
		//$old_password 			= $this->input->post('old_password');
		$new_password  			= $this->input->post('new_password');
		$user_id 				= $this->input->post('user_id');
		//$current_timestamp				= date("Y-m-d H:i:s");
		$data['result'] 		= $this->model->overwrite_password($user_id,$new_password);
		$data['id']				=$this->input->post('user_id');
		$data['new_password']			=$this->input->post('new_password');
		//$data['old_password']			=$this->input->post('old_password');
		//$data['current_timestamp']			=date("Y-m-d H:i:s");

		echo json_encode($data);
	}
	public function unlock_user(){

		$user_id 				= $this->input->post('user_id');

		$data['result'] 		= $this->model->unlock_user($user_id);
		
		echo json_encode($data);

	}
}
