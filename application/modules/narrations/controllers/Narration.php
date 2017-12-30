<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Narration extends Admin_Crud_Controller 
{
 	public function __construct()
 	{
        parent::__construct();   
        $this->load->model('Narration_model','model');
        //$this->load->model('Voucher_types/Voucher_type_model','voucher_type_model');
        $this->permission = $this->get_permission();      
    }

 	public function index(){

 		//$result = $this->model->get_all();
 		$result = $this->common_model->get_by_custom('narration','narration_get');
 		$voucher_type_dropdown	 = $this->common_model->get_by_column('voucher_type','id, name','key');
		$data = $this->set_view_data('Narration', 'Narration', $result,
											  'home_view', TRUE);
		$data['data']['voucher_type_dropdown']	= $voucher_type_dropdown;
		$data['data']['create_permission'] 	= $this->permission['create_permission'];
		$data['data']['update_permission'] 	= $this->permission['update_permission'];
		$data['data']['delete_permission'] 	= $this->permission['delete_permission'];
		$this->load->view($this->admin_view, $data);
 	}

 	public function set_form_rule()
 	{
 	
		$this->form_validation->set_rules('narration_branch_id', 'Branch', 'required');
		$this->form_validation->set_rules('narration_branch_id', 'Voucher type', 'required');
		$this->form_validation->set_rules('narration_description', 'description', 'required');
 	}

 	public function form_validate()
 	{		
		$this->set_form_rule();
		echo parent::form_validate();
	}

	public function get_html_data()
	{
		$data['result'] = $this->common_model->get_by_custom('narration','narration_get');
		$data['update_permission']  = $this->permission['update_permission'];
	   	$data['delete_permission']  = $this->permission['delete_permission'];
		echo  $this->load->view('home_detail_view', $data, TRUE);
	}

	
} 