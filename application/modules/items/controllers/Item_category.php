<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Item_category extends Admin_Crud_Controller
{

	public function __construct()
	{
        parent::__construct();
        $this->load->model('Item_category_model','model');
    	//$this->permission = $this->get_permission();
    }

	public function index()
	{
		//$result = $this->model->get_all();
		$result = $this->common_model->get('item_category');
		$data 	= $this->set_view_data('Item category', 'Item category',

		$result, 'item_category/home_view', TRUE);
		
		$tax_rate_dropdown = $this->common_model->get_by_column('tax_rate', 'id, tax_rate_name as text', 'KEY');
		

		//$data['data']['member_dropdown']		= $member_dropdown;
		//$data['data']['state_dropdown']			= $state_dropdown;
		//$data['data']['create_permission'] 	= $this->permission['create_permission'];
		//$data['data']['update_permission'] 	= $this->permission['update_permission'];
		//$data['data']['delete_permission'] 	= $this->permission['delete_permission'];
		//var_dump($state_dropdown);
		$data['result'] = $result;
		$data['panel_data']['tax_rate_dropdown'] = $tax_rate_dropdown;
		$this->load->view($this->admin_view, $data);

	}
	
	function set_form_rule()
	{
		$this->form_validation->set_rules('item_category_name', 'Name', 'required');
	}

	public function form_validate()
	{
		$this->set_form_rule();
		echo parent::form_validate();
	}

	
	public function get_html_data()
	{
		//$where_condition = ' ';
		$data['result'] = $this->common_model->get('item_category');
		
		/*$data['update_permission']  = $this->permission['update_permission'];
	  	$data['delete_permission']  = $this->permission['delete_permission'];*/
		echo  $this->load->view('item_category/home_detail_view', $data, TRUE);
	}
	
}
