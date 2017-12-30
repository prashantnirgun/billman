
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_tax extends Admin_Crud_Controller
{

	public function __construct()
	{
        parent::__construct();
    	$this->load->model('Item_tax_model','model');
      	//$this->permission = $this->get_permission();
    }

	function set_form_rule()
	{
		$this->form_validation->set_rules('item_tax_item_id', 'item id', 'required');
		$this->form_validation->set_rules('item_tax_tax_rate_id', 'Tax rate ', 'required');
		$this->form_validation->set_rules('item_tax_wef_date', 'Date', 'required');
	}

	public function form_validate()
	{
		$this->set_form_rule();
		$_POST['item_tax_wef_date'] = date_create($this->input->post('item_tax_wef_date'))->							format("Y-m-d");
		echo parent::form_validate();
	}

	public function get_by_foreign_key($item_id)
	{
		//$item_id = $this->input->get('item_id');
		//$item_id = 5;
		/*$data['result'] = $this->common_model->get_by_where('item_tax','item_id = '. $item_id);*/
		$data['result'] = $this->common_model->get_by_custom_where('item_tax','item_tax_get','item_id = '. $item_id);
		//get_by_custom_where($tname, $custom_query, $where, $result_type = 'OBJ')
		/*$data['create_permission'] 	= $this->permission['create_permission'];
		$data['update_permission']  = $this->permission['update_permission'];
	  	$data['delete_permission']  = $this->permission['delete_permission'];*/
		echo $this->load->view('item_tax/tab_detail_view', $data, TRUE);
	}
}