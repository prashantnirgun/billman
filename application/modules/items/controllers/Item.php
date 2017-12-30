
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends Admin_Crud_Controller
{

	public function __construct()
	{
        parent::__construct();
    	$this->load->model('Item_model','model');
      	//$this->permission = $this->get_permission();
    }

	function set_form_rule()
	{
		$this->form_validation->set_rules('item_name', 'Name', 'required');
		$this->form_validation->set_rules('item_description', 'Name', 'required');
	}

	public function form_validate()
	{
		$this->set_form_rule();
		echo parent::form_validate();
	}

	public function get_by_foreign_key($id)
	{
		//$data['result'] = $this->model->get_by_foreign_key($id);
		//$id = $this->input->get('product_category_id');
		//$id = 2;
		$data['result'] = $this->common_model->get_by_where('item','item_category_id = '. $id);
		//$data['result'] = $result;
		//var_dump($result);
		echo $this->load->view('item/tab_detail_view', $data, TRUE);
	}

	/*
	public function add_general_ledger()
	{
		
		$this->set_form_rule();

		if ($this->form_validation->run() == FALSE)
        {
 			$data['status'] = FALSE;
			$var = $_POST;

			foreach(array_keys($var) as $rvar)
			{
			 	if(!form_error($rvar) == ''){
					$data['inputerror'][] = $rvar;
					$data['error_string'][] = form_error($rvar);
				}
			}
        }
        else
        {
        	parent::save();
        	$data['status'] = TRUE;
        	$data['last_gl_id'] = $this->db->insert_id();
        }
                
        //$data['general_ledger_dropdown']= $this->model->get_dropdown();
        echo json_encode($data);
	}
	*/
	/*public function get_by_foreign_key($id)
	{
		//$where_condition = ' ';
		//$id = $this->input->get('product_category_id');
		//echo $id ;
		$data['result'] 			= $this->model->get_all_id($id);
		$data['update_permission']  = $this->permission['update_permission'];
	  	$data['delete_permission']  = $this->permission['delete_permission'];
		echo  $this->load->view('product/tab_detail_view', $data, TRUE);
	}*/

}
