<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

 class State extends Admin_Crud_Controller {
 	
 	public function __construct(){

        parent::__construct();
        
        $this->load->model('State_model','model');
        $this->permission = $this->get_permission();
        //$this->load->model('member/Member_model','members_model');
      
            
    }

   
 	public function form_validate(){
		$this->form_validation->set_rules('state_name', 'name', 'required');
		
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
		//$data['result'] = $this->model->get_by_foreign_key($id);
		$data['result'] = $this->common_model->get_by_where('state','country_id = '. $id);
		$data['create_permission'] 	= $this->permission['create_permission'];
		$data['update_permission']  = $this->permission['update_permission'];
	  	$data['delete_permission']  = $this->permission['delete_permission'];
		echo $this->load->view('state/tab_detail_view', $data, TRUE);
		
	}
	
	public function get_html_data()
	{
		$data['result'] = $this->common_model->get('state');
		//var_dump($data);
		$data['update_permission']  = $this->permission['update_permission'];
		$data['delete_permission']  = $this->permission['delete_permission'];
		echo  $this->load->view('state/tab_detail_view', $data, TRUE);
	}
	
}

