<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utility extends Admin_Crud_Controller
{

	public function __construct()
	{
        parent::__construct();

        $this->load->model('Utility_model','model');
        
        //$this->permission = $this->get_permission();
    }

  
    
	public function index()
	{
        $data = $this->set_view_data('SQL', 'SQL', '', 'admin/sql_view', TRUE);
        $this->load->view($this->admin_view, $data);
       
		//$this->load->view('admin/sql_view',$data);
    }

    public function get_result()
    {
        //var_dump_pre($_POST);
        $text_sql = $_POST["text_get"];
        $select_fomat = $_POST["select_format"];
        //$text_sql = $this->input->post('text_sql');

       $result = $this->model->get_result($text_sql);
       
        
        
        //$this->load->view('admin/sql_view',$data);
        $data = $this->set_view_data('SQL', 'SQL', $result, 'admin/sql_view', TRUE);
        $data['result'] = $result;
        $data['select_fomat'] = $select_fomat;
        $this->load->view($this->admin_view, $data);
       
    }
    public function set_result()
    {
        //$data['result'] = $this->model->get_result();
        //$this->load->view('admin/sql_view',$data);
    }

}