<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class Document_list extends Admin_Crud_Controller {

 	public function __construct()
  {
    parent::__construct();
    $this->load->model('Document_list_Model','model');
     $this->permission = $this->get_permission();
  }

 	public function index()
 	{
 		$result     = $this->model->get_all();
		$data       = $this->set_view_data('Document_list', 'Document_list', $result,
                 'document_list_view', TRUE);
    $data['data']['create_permission']  = $this->permission['create_permission'];
    $data['data']['update_permission']  = $this->permission['update_permission'];
    $data['data']['delete_permission']  = $this->permission['delete_permission'];
		$this->load->view($this->admin_view, $data);
 	}

  function _generate_thumbnail($filename)
  {
    $config['image_library'] = 'gd2';
    $config['source_image'] = './image/'.$filename;
    $config['new_image'] = './image/small_pic/'.$filename;
    // Following line create thumbnail into same folder
    //$config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['width']         = 75;
    $config['height']       = 50;

    $this->load->library('image_lib', $config);
    $this->image_lib->resize();
  }

 	public function form_validate()
	{
    $data = array();
		$this->form_validation->set_rules('document_list_voucher_id', 'voucher id', 'required');
		$this->form_validation->set_rules('document_list_document_name', 'Document Name', 'required');
		//$this->form_validation->set_rules('document_list_image_file_name', 'Image File Name', 'required');
		$this->form_validation->set_rules('document_list_archive_id', 'Archive', 'required');
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
        $table_name = $this->input->post('document_list_table_name');

        $folder_name = './uploads/'.$table_name;
          if (!file_exists($folder_name))
          {
              mkdir($folder_name, 0777, true);
          }

        $config['upload_path'] = $folder_name;
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
           $_POST['document_list_image_file_name'] = $filename;
        }
      }
      	parent::save();
      	$data['status'] = TRUE;
        $data['filename'] = $filename;
        $data['table_name'] = $table_name;
    }
    echo json_encode($data);
	}


	public function get_html_data()
	{
		$data['result'] = $this->model->get_all();
    $data['create_permission']  = $this->permission['create_permission'];
    $data['update_permission']  = $this->permission['update_permission'];
    $data['delete_permission']  = $this->permission['delete_permission'];
		echo  $this->load->view('detail_view', $data, TRUE);
	}

	public function get_by_foreign_key($id)
	{
		$data['result'] = $this->model->get_by_voucher_id($id);
		
    //$data['permission']     = $this->permission;
    $data['create_permission']  = $this->permission['create_permission'];
    $data['update_permission']  = $this->permission['update_permission'];
    $data['delete_permission']  = $this->permission['delete_permission'];
    //var_dump($data);
		echo $this->load->view('admin/detail_view', $data, TRUE);
	}

}
