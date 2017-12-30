<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends Admin_Crud_Controller
{

	public function __construct()
	{
        parent::__construct();
        $this->load->model('Invoice_tax_rate_model','model');

        $this->permission = $this->get_permission();
    }

    public function new_save($input_data, $exclude_column, $table_name = NULL)
    {
    	if($table_name == NULL)
    	{
    		$table_name = $this->model->get_table_name();
    	}
    		
    	$column_list = $this->model->get_column_name_list($table_name);	
    
    	$insert_data = array();
    	$update_data = array();
    	$delete_data = array();

		$size = count($input_data);
		
		for ($i=0; $i < $size; $i++) { 
			$row = $input_data[$i];
			$crud = $row['crud'];
		
			foreach ($row as $key => $value) {
				//echo $key .'<br/>';
				if($crud == 'C' && in_array($key, $column_list) && (!in_array($key, $exclude_column)))
				{
					$insert_data[$i][$key] = $value;
					
					if(count($key) == 1){
						foreach ($exclude_column as $key) {
							if(strpos($key, 'created_at') !== false)
							{
								$insert_data[$i][$key] 	= date("Y-m-d H:i:s");	
							}elseif(strpos($key, 'created_by') !== false)
							{
								$insert_data[$i][$key] 	= $this->session->userdata('user_id');
							}else{
								$insert_data[$i][$key]	= NULL;	
							}
						}	
					}
				}

				if($crud == 'U' && in_array($key, $column_list) && (!in_array($key, $exclude_column)))
				{
					$update_data[$i][$key] = $value;

					if(count($key) == 1){
						foreach ($exclude_column as $key) {
							if(strpos($key, 'updated_at') !== false)
							{
								$update_data[$i][$key] = date("Y-m-d H:i:s");	
							}elseif(strpos($key, 'updated_by') !== false)
							{
								$update_data[$i][$key] = $this->session->userdata('user_id');
							}
						}
					}
				}

				if($crud == 'D' && in_array($key, $column_list) && (!in_array($key, $exclude_column)))
				{
					$delete_data[$i][$key] = $value;

					if(count($key) == 1){
						foreach ($exclude_column as $key) {
							if(strpos($key, 'deleted_at') !== false)
							{
								$delete_data[$i][$key] = date("Y-m-d H:i:s");
							}elseif(strpos($key, 'deleted_by') !== false)
							{
								$delete_data[$i][$key] = $this->session->userdata('user_id');
							}
						}
					}
				}	
			} //foreach ($row as $key => $value) {
		} //for ($i=0; $i < $size; $i++) { 

		$data = array();

		if(count($insert_data))
		{
			$this->db->insert_batch($table_name, $insert_data);
			$data['insert_id'] = $this->db->insert_id();

			if(ENVIRONMENT == "development"){
				$data['inserted_rows'] = $this->db->affected_rows();
				$data['sql'] = $this->db->last_query();
			}
		}

    	if(count($update_data))
		{
			$this->db->update_batch($table_name, $update_data,'id');
			if(ENVIRONMENT == "development"){
				$data['updated_rows'] = $this->db->affected_rows();
				$data['sql'] = $this->db->last_query();
			}
		}

    	if(count($delete_data))
		{
			$this->db->update_batch($table_name, $delete_data,'id');
			if(ENVIRONMENT == "development"){
				$data['soft_deleted_rows'] = $this->db->affected_rows();
				$data['sql'] = $this->db->last_query();
			}
		}
		return $data;
    }

    public function test()
    {

    	//invoice_item_tax
    	/*
		$data['invoice_tax']= $this->common_model->get_by_column_where('invoice_item_tax',
			'id, invoice_id, item_id, gross_amount, tax_amount, discount, net_amount, "R" as crud','invoice_id = 2' );
		*/
		$data['invoice_tax']= $this->common_model->get_by_column_where('invoice_tax',
			'id, invoice_id, tax_rate_id, include_item_tax, "R" as crud','invoice_id = 2' );
		
		var_dump($data);

		foreach ($data as $key => $value) {
			echo $key;
		}

    	/*
    	//remove table name from columns
    	$post_data[] = array(
			'id'=> 6,
			'branch_id'=> 1,
			'invoice_no'=> 6,
			'reference_no'=> 0,
			'voucher_type_id'=> 6,
			'invoice_date'=> '2016-04-24',
			'date_due'=> '2017-06-15',
			'general_ledger_id'=> 15,
			'password'=> NULL,
			'sales_amount'=> 100,
			'vat_amount'=> 5,
			'service_tax_paid'=> 0,
			'round_up'=> 0.00,
			'amount'=> 105.00,
			'discount_amount'=> 0.00,
			'discount_percent'=> 0.00,
			'status_id'=> 55,
			'narration'=> NULL,'crud'=>'U','dummy_collumn'=> 10,
			'created_at' =>"2017-06-09 12:59:13", 'created_by_user_id' => 10);
    	
    	$post_data[] = array(
			'id'=> 2,
			'branch_id'=> 1,
			'invoice_no'=> 2,
			'reference_no'=> 0,
			'voucher_type_id'=> 6,
			'invoice_date'=> '2016-04-24',
			'date_due'=> '2017-06-15',
			'general_ledger_id'=> 15,
			'password'=> NULL,
			'sales_amount'=> 100,
			'vat_amount'=> 5,
			'service_tax_paid'=> 0,
			'round_up'=> 0.00,
			'amount'=> 105.00,
			'discount_amount'=> 0.00,
			'discount_percent'=> 0.00,
			'status_id'=> 55,
			'narration'=> NULL,'crud'=>'U', 
			'created_at' => "2017-06-09 12:59:13", 'created_by_user_id' => 10);
		
		$post_data[] = array(
			'id'=> 3,
			'branch_id'=> 1,
			'invoice_no'=> 3,
			'reference_no'=> 0,
			'voucher_type_id'=> 6,
			'invoice_date'=> '2016-04-24',
			'date_due'=> '2017-06-15',
			'general_ledger_id'=> 15,
			'password'=> NULL,
			'sales_amount'=> 100,
			'vat_amount'=> 5,
			'service_tax_paid'=> 0,
			'round_up'=> 0.00,
			'amount'=> 105.00,
			'discount_amount'=> 0.00,
			'discount_percent'=> 0.00,
			'status_id'=> 55,
			'narration'=> NULL,'crud'=>'D','my_column'=> 100,
			'created_at' => "2017-06-09 12:59:13", 'created_by_user_id' => 100,
			'updated_at' => "2017-06-09 12:59:13", 'updated_by_user_id' => 101);
		

    	$exclude_column = array('created_at','created_by_user_id',
    		'updated_at','updated_by_user_id',
    		'deleted_at','deleted_by_user_id');
    	
    	$data = $this->new_save($post_data, $exclude_column, 'invoice');
    	*/
    	/*
		if(count($data['insert_data']))
		{
			$this->db->insert_batch('invoice', $data['insert_data']);	
		}
    	
    	if(count($data['update_data']))
		{
			$this->db->update_batch('invoice', $data['update_data'],'id');	
		}
    	
    	if(count($data['delete_data']))
		{
			$this->db->update_batch('invoice', $data['delete_data'],'id');	
		}

    	echo $this->db->last_query();
    	*/
    }

	public function index()
	{
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

		//$result 					= $this->model->get_all_invoice($where_condition);
		$result = $this->common_model->get_by_custom('invoice','invoice_get');
		//$general_ledger_dropdown 			= $this->general_ledger_model->get_dropdown();
		$data 						= $this->set_view_data('Invoice', 'Invoice', $result, 'invoice/home_view', TRUE);
		$data['search']['search_value'] = $search_value;	
		$data['search']['criteria'] 	= $condition;	
		$data['search']['start_date'] 	= $start_date;	
		$data['search']['end_date'] 	= $end_date;	
		$data['search']['column_name'] 	= $column_name;	

		
  		$general_ledger_dropdown = $this->common_model->get_by_column('general_ledger','id,name','KEY');
   		$status_dropdown = $this->common_model->get_by_custom_where('property_view','property_dropdown','column_value = "invoice_status"','KEY');
   		$item_dropdown = $this->common_model->get_by_column('item','id,name','KEY');
 		$narration_dropdown = $this->common_model->get_by_column('narration','id,description','KEY');

 		$data['panel_data']['general_ledger_dropdown'] = $general_ledger_dropdown;
 		$data['panel_data']['status_dropdown'] = $status_dropdown;
 		$data['panel_data']['narration_dropdown'] = $narration_dropdown;
 		$data['panel_data']['item_dropdown'] = $item_dropdown;

		//$data['data']['general_dropdown'] 	= $general_ledger_dropdown;
		
		$this->load->view($this->admin_view, $data);
	}
	
	public function get_invoice($invoice_id)
	{
		//Column Defination
		$data['header_data'] = $this->common_model->get_by_where('form_setting','table_name = "invoice_detail"');

		//product 
		$data['item_dropdown'] = $this->common_model->get_by_column('item','id,name as text, price , tax_rate_id','ASSOC');

		//item Tax
		$data['item_tax']= $this->common_model->get_by_custom('item_tax','item_tax_get');

		//Tax on Invoice Type 
		$data['voucher_type_tax']= $this->common_model->get_by_custom_where('voucher_type_tax','voucher_type_tax_get','voucher_type_tax.voucher_type_id = 6');

		//invoice
		$data['invoice']= $this->common_model->get_by_column_where('invoice','id, branch_id, invoice_no, reference_no,
		voucher_type_id, invoice_date, date_due, general_ledger_id, password, sales_amount, vat_amount, service_tax_paid,
		round_up, amount, discount_amount, discount_percent, status_id, narration, "R" as crud',
		'id = ' . $invoice_id);

		//invoice_item
		$data['invoice_item']= $this->common_model->get_by_custom_where('invoice_item','invoice_item_get','invoice_item.invoice_id = ' . $invoice_id);

		//invoice_item_tax
		$data['invoice_item_tax']= $this->common_model->get_by_column_where('invoice_item_tax',
			'id, invoice_id, item_id, tax_id, gross_amount, tax_amount, discount, net_amount, "R" as crud','invoice_id = 2' );

		//invoice_tax
		$data['invoice_tax']= $this->common_model->get_by_column_where('invoice_tax',
			'id, invoice_id, tax_rate_id, gross_amount, tax_amount, "R" as crud','invoice_id = 2' );
		echo json_encode($data);
	}

	/*
	public function get($id,$output = "screen")
	{
		$data['result']['invoice'] = $this->model->get($id);
		$data['result']['invoice_detail'] = $this->invoice_detail_model->get($id);
		$data['result']['action_invoice'] = 'R';
		//$data['sql'] = $this->db->last_query();
		echo json_encode($data);
		//echo  $this->load->view('voucher/panel_detail_view', $data, TRUE);
	}
	*/
	
	function set_form_rule()
	{
		$this->form_validation->set_rules('invoice_branch_id', 'Voucher Type', 'required');
		$this->form_validation->set_rules('invoice_voucher_type_id', 'Voucher type', 'required');
		$this->form_validation->set_rules('invoice_invoice_date', 'Date ', 'required');
		
		$this->form_validation->set_rules('invoice_date_due', 'Due Date', 'required');
		$this->form_validation->set_rules('general_ledger_id', 'General Ledger', 'required');
		$this->form_validation->set_rules('invoice_sales_amount', 'Sales Amount', 'required');
		$this->form_validation->set_rules('invoice_vat_amount', 'Vate amount', 'required');
		$this->form_validation->set_rules('invoice_service_tax_paid', 'Service tax paid', 'required');
		$this->form_validation->set_rules('invoice_amount', 'invoice amount', 'required');
		$this->form_validation->set_rules('invoice_status_id', 'status', 'required');
	}

	public function form_validate()
	{
		//Get data from post
		$invoice_post_data 			= $_POST['invoice'];
		$invoice_item_post_data 	= $_POST['invoice_item'];
		$invoice_item_tax_post_data	= $_POST['invoice_item_tax'];
		$invoice_tax_post_data 		= $_POST['invoice_tax'];

		$exclude_column = array('created_at','created_by_user_id',
					    		'updated_at','updated_by_user_id',
					    		'deleted_at','deleted_by_user_id');
    	
    	$data['invoice'] 			= $this->new_save($invoice_post_data, $exclude_column, 'invoice');
    	$data['invoice_item'] 		= $this->new_save($invoice_item_post_data, $exclude_column, 'invoice_item');
    	$data['invoice_item_tax']	= $this->new_save($invoice_item_tax_post_data, $exclude_column, 'invoice_item_tax');
    	//$data['invoice_tax'] 		= $this->new_save($invoice_tax_post_data, $exclude_column, 'invoice_tax');
    	$data['invoice_post'] 			= $invoice_post_data ;
		$data['invoice_item_post'] 		= $invoice_item_post_data ;
		$data['invoice_item_tax_post']	= $invoice_item_tax_post_data ;

    	echo json_encode($data);
	}

	public function form_validate1()
	{
		$invoice_data = array();

		//START Section I Invoice Table data 
		$invoice_data['id'] = $this->input->post('invoice[id]', TRUE);
		$invoice_data['branch_id'] = $this->input->post('invoice[branch_id]', TRUE);
		$invoice_data['invoice_no'] = $this->input->post('invoice[invoice_no]', TRUE);
		$invoice_data['reference_no'] = $this->input->post('invoice[reference_no]', TRUE);
		$invoice_data['voucher_type_id'] = $this->input->post('invoice[voucher_type_id]', TRUE);
		$invoice_data['invoice_date'] = $this->input->post('invoice[invoice_date]', TRUE);
		$invoice_data['date_due'] = $this->input->post('invoice[date_due]', TRUE);
		$invoice_data['general_ledger_id'] = $this->input->post('invoice[general_ledger_id]', TRUE);
		$invoice_data['password'] = $this->input->post('invoice[password]', TRUE);
		$invoice_data['sales_amount'] = $this->input->post('invoice[sales_amount]', TRUE);
		$invoice_data['vat_amount'] = $this->input->post('invoice[vat_amount]', TRUE);
		$invoice_data['service_tax_paid'] = $this->input->post('invoice[service_tax_paid]', TRUE);
		$invoice_data['round_up'] = $this->input->post('invoice[round_up]', TRUE);
		$invoice_data['amount'] = $this->input->post('invoice[invoice_amount]');
		$invoice_data['discount_amount'] = $this->input->post('invoice[discount_amount]', TRUE);
		$invoice_data['discount_percent'] = $this->input->post('invoice[discount_percent]', TRUE);
		$invoice_data['status_id'] = $this->input->post('invoice[invoice_crud]', TRUE);
		$invoice_data['crud'] = $this->input->post('invoice_data[crud]', TRUE);

		
		if($invoice_data['crud'] == 'C' || $invoice_data['id'] == 0)
		{
			//insert
			
			$invoice_data['created_at'] = date("Y-m-d H:i:s");
			$invoice_data['created_by_user_id'] = $this->session->userdata('id');
			$invoice_data['updated_at'] = NULL;
			$invoice_data['updated_by_user_id'] = NULL;
			$invoice_data['deleted_at'] = NULL;
			$invoice_data['deleted_by_user_id'] = NULL;
			$invoice_data['invoice_date'] = date_create($this->input->post('invoice_data[invoice_date]'))->format("Y-m-d");
        	$invoice_data['date_due'] = date_create($this->input->post('invoice_data[date_due]'))->format("Y-m-d");

			$this->model->insert_invoice_data($invoice_data);
        	$invoice_id = $this->db->insert_id();
		}
		else 
		{
			$invoice_id = $invoice_data['id'];
			if( $invoice_data['crud'] == 'U' && $invoice_data['id'] > 0)
			{
				$invoice_data['updated_at'] = date("Y-m-d H:i:s");
				$invoice_data['updated_by_user_id'] = $this->session->userdata('id');
				$invoice_data['deleted_at'] = NULL;
				$invoice_data['deleted_by_user_id'] = NULL;

			 	$this->model->update_invoice_data($invoice_data['id'] ,$invoice_data);			
				$data['action'] = 'Reaction';
			}
		}
		//END Section I Invoice Table 
		
		//START Section II Invoice_item Table
		
		$invoice_item_post_data = $_POST['invoice_item'];
		
		$invoice_item_insert_data = array();
		$invoice_item_update_data = array();
		$invoice_item_data = array();
       
		foreach ($invoice_item_post_data as $key => $rows) 
		{
			$data['crud'] = $invoice_item_post_data[$key]['crud'];
			switch ($data['crud']) 
			{
				//'C' FOR create action in voucher detail
				case 'C':
		        	$invoice_item_insert_data[] = array(
		 				'invoice_id'		=> $invoice_id,
		 				'tax_rate_id'		=> $invoice_item_post_data[$key]['tax_rate_id'],
		 				'item_id'			=> $invoice_item_post_data[$key]['item_id'],
		 				'description'		=> $invoice_item_post_data[$key]['description'],
		 				'quantity'			=> $invoice_item_post_data[$key]['quantity'],
		 				'rate'				=> $invoice_item_post_data[$key]['rate'],
		 				'discount_amount'	=> $invoice_item_post_data[$key]['discount_amount'],
		 				'sr_no'				=> $invoice_item_post_data[$key]['sr_no'],
		 				'amount'			=> $invoice_item_post_data[$key]['amount'],
		 				'created_at'		=> date("Y-m-d H:i:s"),
		 				'created_by_user_id'=> $this->session->userdata('id'),
		 				'updated_at'		=> NULL,
		 				'updated_by_user_id'=> NULL,
		 				'deleted_at'		=> NULL,
		 				'deleted_by_user_id'=> NULL,
		 				);
			        break;

			    //'U' for checking update action field in voucher detail
		    	case 'U':
		        	$invoice_item_update_data[] = array(
		 				'id'				=> $invoice_item_post_data[$key]['id'],
		 				'invoice_id'		=> $invoice_id,
		 				'tax_rate_id'		=> $invoice_item_post_data[$key]['tax_rate_id'],
		 				'item_id'			=> $invoice_item_post_data[$key]['item_id'],
		 				'description'		=> $invoice_item_post_data[$key]['description'],
		 				'quantity'			=> $invoice_item_post_data[$key]['quantity'],
		 				'rate'				=> $invoice_item_post_data[$key]['rate'],
		 				'discount_amount'	=> $invoice_item_post_data[$key]['discount_amount'],
		 				'amount'			=> $invoice_item_post_data[$key]['amount'],
		 				'updated_at'		=> date("Y-m-d H:i:s"),
		 				'updated_by_user_id'=> $this->session->userdata('id'),
		 				'deleted_at'		=> NULL,
		 				'deleted_by_user_id'=> NULL,
		 				);
 		 			//$data['invoice_item_update_data'] = $voucher_detail_update_data;
		        	break;
		        //'D' for checking delete action field in voucher detail
		   		case 'D':
		   		 	if ($invoice_item_post_data[$key]['id'] > 0)
		   		 	{
			      		$this->db->where('id', $invoice_item_post_data[$key]['id']);
						$this->db->delete('invoice_item'); 
					}
		        	break;
			}

		}
		/*
		if(count($invoice_item_insert_data) > 0)
		{
			$this->db->insert_batch('invoice_item', $invoice_item_insert_data);
			
		}

		if(count($invoice_item_update_data) > 0)
		{
			$this->db->update_batch('invoice_detail', $invoice_item_update_data, 'id');
			//$this->db->update_batch('invoice_detail', $invoice_detail_update_data,'id');
			$data['invoice_item_update_data'] = $this->db->last_query();
		}
		*/
		//END Section II Invoice_item Table
		$data['invoice'] = $invoice_data;
		$data['invoice_item_insert'] = $invoice_item_insert_data;
		$data['invoice_item_insert'] = $invoice_item_update_data;
		$data['invoice_item_tax'] = $_POST['invoice_item_tax'];
		$data['invoice_tax'] = $_POST['invoice_tax'];
		$data['status']	= TRUE;
		$data['invoice_item_post_data']	= $invoice_item_post_data;
		//$data['size'] = count($invoice_detail_update_data);
		echo json_encode($data);
	}


/*
	public function get_html_data()
	{
		$where_condition ='';
		$data['result'] 			= $this->model->get_all($where_condition);
		$data['update_permission']  = $this->permission['update_permission'];
	  	$data['delete_permission']  = $this->permission['delete_permission'];
		echo  $this->load->view('tax_rate/home_detail_view', $data, TRUE);
	}
*/
}
