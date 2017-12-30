<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends Admin_Crud_Controller 
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Report_model','model');
    }

    
    public function index()
    { 

        $condition                       = $this->input->post('criteria');
        $start_date                     = $this->input->post('application_date_from');
        $end_date                       = $this->input->post('application_date_to');
        $search_value                   = $this->input->post('search');
        $column_name                    = $this->input->post('column_name');

        $voucher_type_select                 = $this->input->post('voucher_type_id');
        $invoice_status_select                 = $this->input->post('invoice_status_id');

        $search_array = array();

        if (!(empty($search_value) || $search_value == ''))
        {
            array_push($search_array,array('column' => $column_name, 'condition' => $condition, 'value' => $search_value));
        }
        if ($voucher_type_select > 0)
        {
            array_push($search_array, array('column' => 'voucher_type_id', 'condition' => '3', 'value' => $voucher_type_select));
        }

        if ($invoice_status_select > 0)
        {
            array_push($search_array, array('column' => 'status_id', 'condition' => '3', 'value' => $invoice_status_select));
        }

        if( !(empty($start_date) AND empty($end_date)) )
        {
            array_push($search_array, array('column' => 'invoice_date', 'condition' => ' ', 'value' =>
              date_create($start_date)->format("Y-m-d").'"'." AND ". 
              '"'.date_create($end_date)->format("Y-m-d")));
        }
        $where_condition = '';
        if (count($search_array)> 0)
        {
            $where_condition = $this->generate_where($search_array);
        }

        //$result                   = $this->model->get_all_invoice($where_condition);
        $result = $this->common_model->get_by_custom_where('invoice','invoice_get',$where_condition);
        //$general_ledger_dropdown          = $this->general_ledger_model-Report>get_dropdown();
        $data                       = $this->set_view_data('Report', 'Report', $result, 'home_view', TRUE);

        $voucher_type_dropdown = $this->common_model->get_by_column('voucher_type','id,name','KEY');
        $status_dropdown = $this->common_model->get_by_custom_where('property_view','property_dropdown','column_value = "invoice_status"','KEY');

        $data['search']['voucher_type_dropdown'] = $voucher_type_dropdown;
        $data['search']['status_dropdown'] = $status_dropdown;
        $data['search']['search_value'] = $search_value;    
        $data['search']['criteria']     = $condition;   
        $data['search']['start_date']   = $start_date;  
        $data['search']['end_date']     = $end_date;    
        $data['search']['column_name']  = $column_name; 
        $data['search']['voucher_type_select']  = $voucher_type_select; 
        $data['search']['invoice_status_select']  = $invoice_status_select; 
       // echo $this->db->last_query();
     // var_dump($where_condition);
      //var_dump($data); 
       $this->load->view($this->admin_view, $data);
       
    }
    
   
    
   
}