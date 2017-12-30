<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends Admin_Crud_Controller
{

	public function __construct()
	{
        parent::__construct();

        $this->load->model('Invoice_tax_rate_model','model');
        $this->load->model('Invoice_detail_model','invoice_detail_model');
       // $this->load->model('products/Product_model','product_model');	
        //$this->permission = $this->get_permission();
    }
    

	public function index()
	{
		//$user_id = $this->session->userdata('id');
		//var_dump($user_id);
		$condition 						= $this->input->post('criteria');
		$start_date 					= $this->input->post('application_date_from');
		$end_date 						= $this->input->post('application_date_to');
		$search_value 					= $this->input->post('search');
		$column_name 					= $this->input->post('column_name');

		$search_array = array();

		if (!(empty($search_value) || $search_value == ''))
		{
			array_push($search_array,array('column' => $column_name, 'condition' => $condition, 'value' => $search_value));
		}
		if( !(empty($start_date) AND empty($end_date)) )
        {
        	array_push($search_array, array('column' => 'invoice_date', 'condition' => ' ', 'value' =>
        	  date_create($start_date)->format("Y-m-d")."'".' AND '. 
        	  "'".date_create($end_date)->format("Y-m-d")));
        }
		$where_condition = '';
		if (count($search_array)> 0)
		{
			$where_condition = $this->generate_where($search_array);
		}


		$result 					= $this->model->get_all_invoice($where_condition);
		//$general_ledger_dropdown 			= $this->general_ledger_model->get_dropdown();
		$data 						= $this->set_view_data('Invoice', 'Invoice', $result, 'invoice/home_view', TRUE);
		$data['search']['search_value'] = $search_value;	
		$data['search']['criteria'] 	= $condition;	
		$data['search']['start_date'] 	= $start_date;	
		$data['search']['end_date'] 	= $end_date;	
		$data['search']['column_name'] 	= $column_name;	
		
		
		$this->load->view($this->admin_view, $data);
	}

	
	public function get($id,$output = "screen")
	{
		$data['result']['invoice'] = $this->model->get($id);
		$data['result']['invoice_detail'] = $this->invoice_detail_model->get($id);
		$data['result']['action_invoice'] = 'R';
		//$data['sql'] = $this->db->last_query();
		echo json_encode($data);
		//echo  $this->load->view('voucher/panel_detail_view', $data, TRUE);
	}
	
	function set_form_rule()
	{
		$this->form_validation->set_rules('invoice_branch_id', 'Voucher Type', 'required');
		$this->form_validation->set_rules('invoice_voucher_type_id', 'Voucher type', 'required');
		$this->form_validation->set_rules('invoice_invoice_date', 'Date ', 'required');
		
		$this->form_validation->set_rules('invoice_invoice_date_due', 'Due Date', 'required');
		$this->form_validation->set_rules('general_ledger_id', 'General Ledger', 'required');
		$this->form_validation->set_rules('invoice_sales_amount', 'Sales Amount', 'required');
		$this->form_validation->set_rules('invoice_vat_amount', 'Vate amount', 'required');
		$this->form_validation->set_rules('invoice_service_tax_paid', 'Service tax paid', 'required');
		$this->form_validation->set_rules('invoice_invoice_amount', 'invoice amount', 'required');
		$this->form_validation->set_rules('invoice_status_id', 'status', 'required');
	}

	public function form_validate()
	{
		//var_dump($_POST);
		$invoice_data = array();

		$invoice_data['id'] 				= $this->input->post('invoice_data[id]');
		$invoice_data['branch_id'] 			= $this->input->post('invoice_data[branch_id]');
		$invoice_data['invoice_no'] 	= $this->input->post('invoice_data[invoice_no]');
		$invoice_data['reference_no'] = $this->input->post('invoice_data[reference_no]');
		$invoice_data['voucher_type_id'] 		= $this->input->post('invoice_data[voucher_type_id]');
		$invoice_data['general_ledger_id'] 			= $this->input->post('invoice_data[general_ledger_id]');
		$invoice_data['invoice_password'] 		= $this->input->post('invoice_data[invoice_password]');
		$invoice_data['sales_amount'] 		= $this->input->post('invoice_data[sales_amount]');
		$invoice_data['vat_amount'] 			= $this->input->post('invoice_data[vat_amount]');
		$invoice_data['service_tax_paid'] 		= $this->input->post('invoice_data[service_tax_paid]');
		$invoice_data['round_up'] 		= $this->input->post('invoice_data[round_up]');
		$invoice_data['invoice_amount'] 		= $this->input->post('invoice_data[invoice_amount]');
		$invoice_data['invoice_discount_amount'] 		= $this->input->post('invoice_data[invoice_discount_amount]');
		$invoice_data['invoice_discount_percent'] 		= $this->input->post('invoice_data[invoice_discount_percent]');
		$invoice_data['status_id'] 		= $this->input->post('invoice_data[status_id]');
		
		$invoice_action =  $this->input->post('invoice_data[action_invoice]');

		if($invoice_action == 'C' || $invoice_data['id'] == 0)
		{
			//insert
			
			$invoice_data['created_at'] = date("Y-m-d H:i:s");
			$invoice_data['created_by_user_id'] = $this->session->userdata('id');
			$invoice_data['updated_at'] = NULL;
			$invoice_data['updated_by_user_id'] = NULL;
			$invoice_data['deleted_at'] = NULL;
			$invoice_data['deleted_by_user_id'] = NULL;
			$invoice_data['invoice_date'] = date_create($this->input->post('invoice_data[invoice_date]'))->format("Y-m-d");
        	$invoice_data['invoice_date_due'] = date_create($this->input->post('invoice_data[invoice_date_due]'))->format("Y-m-d");

			$this->model->insert_invoice_data($invoice_data);
        	$invoice_id = $this->db->insert_id();
		}
		else 
		{
			$invoice_id = $invoice_data['id'];
			if( $invoice_action == 'U' && $invoice_data['id'] > 0)
			{
				$invoice_data['updated_at'] = date("Y-m-d H:i:s");
				$invoice_data['updated_by_user_id'] = $this->session->userdata('id');
				$invoice_data['deleted_at'] = NULL;
				$invoice_data['deleted_by_user_id'] = NULL;

			 	$this->model->update_invoice_data($invoice_data['id'] ,$invoice_data);			
				$data['action'] = 'Reaction';
			}
		}

		//  post data of invoice_detail 
		$invoice_detail_post_data = $_POST['invoice_detail_data'];
		
		$invoice_detail_insert_data = array();
		$invoice_detail_update_data = array();
		
		
		$invoice_detail_data = array();
       

		foreach ($invoice_detail_post_data as $key => $rows) 
		{
			$data['action'] = $invoice_detail_post_data[$key]['action'];
			
			switch ($data['action']) 
			{
				//'C' FOR create action in voucher detail
				case 'C':
		        	$invoice_detail_insert_data[] = array(
		 				//'id'=> 0,
		 				'invoice_id'	=> $invoice_id,
		 				'tax_rate_id'	=>$invoice_detail_post_data[$key]['tax_rate_id'],
		 				'product_id'	=>$invoice_detail_post_data[$key]['product_id'],
		 				'description'	=>$invoice_detail_post_data[$key]['description'],
		 				'quantity'		=>$invoice_detail_post_data[$key]['quantity'],
		 				'rate'			=>$invoice_detail_post_data[$key]['rate'],
		 				'discount_amount'=>$invoice_detail_post_data[$key]['discount_amount'],
		 				'sr_no'			=>$invoice_detail_post_data[$key]['sr_no'],
		 				'amount'		=>$invoice_detail_post_data[$key]['amount'],
		 				'created_at'=>date("Y-m-d H:i:s"),
		 				'created_by_user_id'=>$this->session->userdata('id'),
		 				'updated_at'		=>NULL,
		 				'updated_by_user_id'=>NULL,
		 				'deleted_at'=>NULL,
		 				'deleted_by_user_id'=>NULL,
		 				);
			        break;

			    //'U' for checking update action field in voucher detail
		    	case 'U':
		        	$invoice_detail_update_data[] = array(

		 				'id'				=>$invoice_detail_post_data[$key]['id'],
		 				'invoice_id'		=> $invoice_id,
		 				'tax_rate_id'		=>$invoice_detail_post_data[$key]['tax_rate_id'],
		 				'product_id'		=>$invoice_detail_post_data[$key]['product_id'],
		 				'description'		=>$invoice_detail_post_data[$key]['description'],
		 				'quantity'			=>$invoice_detail_post_data[$key]['quantity'],
		 				'rate'				=>$invoice_detail_post_data[$key]['rate'],
		 				'discount_amount'	=>$invoice_detail_post_data[$key]['discount_amount'],
		 				'amount'			=>$invoice_detail_post_data[$key]['amount'],
		 				'updated_at'		=>date("Y-m-d H:i:s"),
		 				'updated_by_user_id'=>$this->session->userdata('id'),
		 				'deleted_at'		=>NULL,
		 				'deleted_by_user_id'=>NULL,
		 				);
		        	
 		 			//$data['voucher_detail_update_data'] = $voucher_detail_update_data;
		        	break;

		        //'D' for checking delete action field in voucher detail
		   		case 'D':
		   		 	if ($invoice_detail_post_data[$key]['id'] > 0)
		   		 	{
			      		$this->db->where('id', $invoice_detail_post_data[$key]['id']);
						$this->db->delete('invoice_detail'); 
					}
		        	break;
			}

		}
		if(count($invoice_detail_insert_data) > 0)
		{
			$this->db->insert_batch('invoice_detail', $invoice_detail_insert_data);
			
		}

		if(count($invoice_detail_update_data) > 0)
		{
			$this->db->update_batch('invoice_detail', $invoice_detail_update_data, 'id');
			//$this->db->update_batch('invoice_detail', $invoice_detail_update_data,'id');
			$data['invoice_detail_update_data'] = $this->db->last_query();
		}
		//$data['voucher_detail'] = count($invoice_detail_insert_data);
		$data['status']	= TRUE;
		//$data['invoice_detail_post_data']	= $invoice_detail_update_data;
		//$data['size'] = count($invoice_detail_update_data);
		echo json_encode($data);
	}

	public function get_html_data()
	{
		$where_condition ='';
		$data['result'] 			= $this->model->get_all($where_condition);
		$data['update_permission']  = $this->permission['update_permission'];
	  	$data['delete_permission']  = $this->permission['delete_permission'];
		echo  $this->load->view('tax_rate/home_detail_view', $data, TRUE);
	}

}
