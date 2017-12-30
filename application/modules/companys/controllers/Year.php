<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Year extends Admin_Curd_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('companys/Year_model','model');
		 $this->permission = $this->get_permission();
	}

	public function index()
	{
		
		$result = $this->model->get_all();
		$data = $this->set_view_data('Year', 'Year', $result, 'year/year_list_view', TRUE);
		$data['data']['create_permission'] 	= $this->permission['create_permission'];
		$data['data']['update_permission']  = $this->permission['update_permission'];
		$data['data']['delete_permission']  = $this->permission['delete_permission'];
		$this->load->view($this->admin_view, $data);	
	
	}
}