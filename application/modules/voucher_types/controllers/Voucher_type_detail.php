<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class Voucher_type_detail extends Admin_Crud_Controller
{
	//public $permission ;

	function __construct()
	{
		parent::__construct();
		$this->load->model('voucher_types/Voucher_type_detail_model','model');
	//	$this->load->model('accounts/Account_group_model','account_group_model');
      	$this->permission = $this->get_permission();
		
	}
	
 	public function form_validate(){
 		
		$this->form_validation->set_rules('voucher_type_detail_voucher_type_id', 'voucher type ', 'required');
		$this->form_validation->set_rules('voucher_type_detail_account_group_id', 'account group', 'required');
		$this->form_validation->set_rules('voucher_type_detail_statutary_id', 'statutary_id', 'required');

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
        
        }
        
        echo json_encode($data);	

	}

	public function get_by_foreign_key($id)
	{
		$data['result'] = $this->common_model->get_by_custom_where('voucher_type_detail', 'voucher_type_detail_get', 'voucher_type_detail.voucher_type_id = '.$id);
		//$data['permission']			= $this->permission;
		$data['create_permission']  = $this->permission['create_permission'];
		$data['update_permission']  = $this->permission['update_permission'];
	  	$data['delete_permission']  = $this->permission['delete_permission'];
		echo $this->load->view('voucher_type_detail/tab_detail_view', $data, TRUE);
		
	}
	
}