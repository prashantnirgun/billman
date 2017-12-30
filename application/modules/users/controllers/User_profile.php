<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_profile extends Admin_Crud_Controller{

	public function __construct()
	{
        parent::__construct();

        $this->load->model('User_profile_model','model');
        //$this->load->model('User_model','user_model');        
        //$this->load->model('companys/Company_model','company_model');
     //$this->load->model('User_group_model','user_group_model');
        //$this->load->model('citys/State_model','state_model');
    }

	public function index()
	{
		$user_id = $this->session->userdata('user_id');
		$user_group_dropdown = $this->common_model->get_by_column('user_group','id,name','KEY');
			$profile_name = $this->session->userdata('full_name');
		$result = $this->common_model->get_by_custom_where('user_profile','user_profile_get','user_profile.user_id ='.$user_id);
		//var_dump('user_id'$user_id);
		//$result = $result['result'];
		//echo $result['result'];
		foreach ($result as $row )
		{

			foreach ($row as $key => $value)
			{
				//echo $key . ' = ' . $value. '<br>';
				$profile_data[$key] = $value;
				//var_dump($value);
				//echo '<br>';
			}
		}
		$profile_data['user_id'] = $user_id;
		//$gender_dropdown = $this->company_model->build_dropdown('Gender');
		$gender_dropdown = $this->common_model->get_by_custom_where('property_view','property_dropdown','column_value = "Gender"','KEY');
		//public function set_view_data($title, $header, $result, $content_view, $load_header = TRUE )
		$data = $this->set_view_data('User Profile', 'User Profile', $profile_data, 'user_profile/home_view', TRUE);
		$data['data']['gender_dropdown'] =   $gender_dropdown ;

		//$result = $this->user_model->get($user_id);
		$result = $this->common_model->get_by_where('user','user.id ='.$user_id);

		foreach ($result as $row )
		{
			foreach ($row as $key => $value)
			{
				//echo $key . ' = ' . $value. '<br>';
				$user_data[$key] = $value;
				//echo '<br>';
			}
		}

		//var_dump($user_data);
		
		$data['user_data'] = $user_data;
		$data['profile_data'] = $profile_data;
		
		$data['data']['profile_name'] = $profile_name;
		$data['user_group_dropdown'] = $user_group_dropdown;
		//var_dump($data);
		//echo $this->admin_view . ' '. base_url();
		$this->load->view($this->admin_view, $data);
	}

	public function form_validate()
	{
    $data = array();
		$this->form_validation->set_rules('user_profile_full_name', 'Name', 'required');
		$this->form_validation->set_rules('user_profile_gender_id', 'Gender', 'required');
		$this->form_validation->set_rules('user_profile_contact_no', 'Contact No', 'required');
		$this->form_validation->set_rules('user_profile_email', 'Email', 'required');

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
	     // $filename = $_FILES['userfile']['name'];
	     //$filename = str_replace('%20','_',$_FILES['userfile']['name']);
	     $filename = str_replace(' ','_',$_FILES['userfile']['name']);
	      // You can setfilename in config for upload
	      if (!(empty($filename) OR $filename == ''))
	      {
	        //$table_name = $this->input->post('document_list_table_name');

	        /*$folder_name = './uploads/'.$table_name;
	          if (!file_exists($folder_name))
	          {
	              mkdir($folder_name, 0777, true);
	          }
	*/
	        	$config['upload_path'] = './uploads';
	    		$config['allowed_types'] = 'png|jpg|pdf|jpeg';
	    		$config['max_size'] = 1024*8;
	    		//$config['encrypt_name'] = True;
	    		$this->load->library('upload',$config);

	    		if(!$this->upload->do_upload('userfile'))
	        {
	          $data['info'] = array('error' => $this->upload->display_errors());
	          //$this->load->view('upload_form', $error);
	          $data['status'] = FALSE;
	    		}
	        else
	        {
	           //$data = array('upload_data' => $this->upload->data());

	           //Create a thumbnail Image
	           //$upload_data = $data['upload_data'];
	           //$this->_generate_thumbnail($filename);
	           $_POST['user_profile_image_file_name'] = $filename;
	        }
	      }
	      	parent::save();
	      	$data['status'] = TRUE;
	        $data['filename'] = $filename;
	       // $data['table_name'] = $table_name;
	    }
	    echo json_encode($data);
	}
	public function get_by_foreign_key($id)
	{
		$user_id = $this->session->userdata('user_id');
		//$data['result'] = $this->model->get_user_profile($user_id);
		$data['result'] = $this->common_model->get_by_custom_where('user_profile','user_profile_get',$user_id);
			//var_dump($data);
		echo $this->load->view('user_profile/user_profile_panel_view', $data, TRUE);
	}

	public function get_html_data()
	{
		$id = $this->session->userdata('user_id');
			 // $gender_dropdown = $this->company_model->build_dropdown('Gender');
		$data['result'] = $this->model->get($id);
		//$data['data']['gender_dropdown'] =   $gender_dropdown ;
		//echo  $this->load->view('user_profile/user_profile_panel_view', $data, TRUE);

	}
	public function change_password()
	{
		$old_password 			= $this->input->post('old_password');
		$new_password  			= $this->input->post('new_password');
		$user_id 				= $this->input->post('user_id');
		$current_timestamp				= date("Y-m-d H:i:s");
		$data['result'] 		= $this->model->change_password($user_id,$old_password,$new_password,$current_timestamp);
		//$data['id']				=$this->input->post('user_id');
		//$data['new_password']			=$this->input->post('new_password');
		//$data['old_password']			=$this->input->post('old_password');
	//	$data['current_timestamp']	= date("Y-m-d H:i:s");
		echo json_encode($data);
	}

	/*public function form_validate(){

		$this->form_validation->set_rules('user_profile_full_name', 'Name', 'required');
		$this->form_validation->set_rules('user_profile_gender_id', 'Gender', 'required');
		$this->form_validation->set_rules('user_profile_contact_no', 'Contact No', 'required');
		$this->form_validation->set_rules('user_profile_email', 'Email', 'required');
		$this->form_validation->set_rules('user_profile_image_file_name', 'File name', 'required');
	//	$this->form_validation->set_rules('password', 'State', 'required');
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

        	$data['status'] = true;
        	//var_dump($data);
        	//$data['status'] = TRUE;

        }

        echo json_encode($data);
	}*/
	
}
