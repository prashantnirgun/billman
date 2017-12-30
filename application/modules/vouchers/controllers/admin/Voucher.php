<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voucher extends Admin_Crud_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Voucher_model','model');
		//$this->load->model('accounts/Account_group_model','account_group_model');
		//$this->load->model('accounts/General_ledger_model','general_ledger_model');
		$this->load->model('voucher_types/Voucher_type_model','voucher_type_model');
		//$this->load->model('vouchers/Voucher_detail_model','voucher_detail_model');
		//$this->load->model('members/Member_model','member_model');
		//$this->load->model('companys/Company_model','company_model');
	}	

	public function receipt()
	{
		$this->voucher_index('Receipt');
	}

	public function payment()
	{
		$this->voucher_index('Payment');
	}

	public function journal()
	{
		$this->voucher_index('Journal Voucher');
	}

	public function contra()
	{
		$this->voucher_index('Contra');
	}

	public function voucher_index($type)
	{
		//echo "Receipt";
		$start_date 	= $this->input->post('receipt_date_from', TRUE);
		$end_date 		= $this->input->post('receipt_date_to', TRUE);
		$search_value 	= $this->input->post('member_id', TRUE);
		$voucher_type 	= $this->input->post('voucher_type_id', TRUE);
		$criteria 		= $this->input->post('criteria', TRUE);

		
		/*
		//required select with data attribute
		$receipt_type_dropdown = $this->voucher_type_model->get_drodown_select($type, $voucher_type);
		*/
		$result = $this->common_model->get_by_custom_where('voucher_type','voucher_type_dropdown',
      		'column_name = "Receipt"','ASSOC');

		//`var_dump_pre($result);
    	$receipt_type_dropdown = $this->common_model->data_attribute_dropown($result);

		

		/* logic to get first voucher type */
		$pos = strpos($receipt_type_dropdown, 'value=') + 7 ;
		$pos2 = strpos($receipt_type_dropdown, '"', $pos) - $pos;
		$voucher_type = substr($receipt_type_dropdown, $pos, $pos2 );
		
		//echo $voucher_type;

		$search_array = array();

		if (!(empty($search_value) || $search_value == ''))
		{
			array_push($search_array,array('column' => 'a.member_id', 'condition' => '7', 'value' => $search_value));
		}

		if ($voucher_type > 0)
		{
			array_push($search_array, array('column' => 'a.voucher_type_id', 'condition' => '7', 'value' =>
				$voucher_type));
		}else
		{
			//$voucher_type = $this->voucher_type_model->get_first_row($type);
			array_push($search_array, array('column' => 'a.voucher_type_id', 'condition' => '7', 'value' =>
				$voucher_type));
		}

		if( !(empty($start_date) AND empty($end_date)) )
        {
        	array_push($search_array, array('column' => 'receipt_date', 'condition' => ' ', 'value' =>
		        	  date_create($start_date)->format("Y-m-d")."'".' AND '.
		        	  "'".date_create($end_date)->format("Y-m-d")));
        }

		$where_condition = '';
		if (count($search_array)> 0)
		{
			$where_condition = $this->generate_where($search_array);
		}
		//var_dump($where_condition);
		$where_condition = 'WHERE '. $where_condition;
		//$result = $this->model->get_all_voucher($type, $where_condition);
		$result = $this->common_model->get_by_custom('voucher','voucher_get');
		
		//var_dump($result);
		
		//echo $this->db->last_query();
		
		
		$member_dropdown = $this->common_model->get_by_column('member','id, name','KEY');
		$debit_credit_dropdown = $this->common_model->get_by_where('property_view','column_value = "Debit_Credit"','KEY');

		$general_ledger_dropdown = $this->common_model->get_by_column('member',
  			'id, name','KEY');
		/*
		$list = $this->common_model->get_by_column('member','id, name','array');
  		$member_dropdown      = $this->common_model->data_dropown($list);
		*/
		$member_dropdown[0] = 'All Member';
			ksort($member_dropdown );
		
		$data = $this->set_view_data($type,$type,$result, 'voucher/home_view', TRUE);

		$data['data']['start_date'] 		= $start_date;
		$data['data']['end_date']	 		= $end_date;
		$data['data']['search_value']		= $search_value;
		$data['data']['criteria'] 			= $criteria;
		$data['data']['member_dropdown'] 	= $member_dropdown;
		$data['data']['voucher_type'] 		= $voucher_type;
		$data['data']['receipt_type_dropdown'] 	= $receipt_type_dropdown;
		$data['data']['general_ledger_dropdown'] 	= $general_ledger_dropdown;
		$data['data']['debit_credit_dropdown'] 	= $debit_credit_dropdown;
		$data['data']['type'] 				= $type;
		//var_dump($receipt_type_dropdown);
		$this->load->view($this->admin_view, $data);
	}
	
	public function get_by_foreign_key($id)
	{
		//$add_data = array()
		$data['result'] = $this->model->get_by_voucher_id($id);
		echo $this->load->view('voucher/panel_detail_view', $data, TRUE); 
	}

	public function get($id,$output = "screen")
	{
		/*
		$result = $this->common_model->get_by_where('voucher',
			'id = ' . $id);
		$data['result']['voucher'] = $result ; //$this->add_table_name($result);
		*/
		
		$data['result']['voucher_detail'] = $this->common_model->get_by_where('voucher_detail', 'voucher_id = ' . $id);
		/*
		$data['result']['voucher'] = $this->model->get($id);
		$data['result']['voucher_detail'] = $this->voucher_detail_model->get($id);
		*/
		$data['result']['action'] = 'R';
		//$data['sql'] = $this->db->last_query();
		echo json_encode($data);
		//echo  $this->load->view('voucher/panel_detail_view', $data, TRUE);
	}

	public function test($id)
	{
		$data['result']['header_data'] = array(
	array('id'=>'transaction_id','name'=>'tr_id','order'=>0,'class'=>'hidden','widget'=>'','extra'=>'','default'=>0),
	array('id'=>'id','name'=>'ID','order'=>0,'class'=> 'hidden','widget'=>'','extra'=>'','default'=>0),
	array('id'=>'voucher_id','name'=>'Voucher No','order'=>0,'class'=>'hidden','widget'=>'','extra'=>'','default'=>0),
	array('id'=>'sr_no','name'=>'Sr No','order'=>0,'class'=>'hidden','widget'=>'','extra'=>'','default'=>0),
	array('id'=>'credit_amount','name'=>'Credit','order'=>4,'class'=>'col-md-1','widget'=>'','extra'=>'decimal','default'=>0.00),
	array('id'=>'debit_amount','name'=>'Debit','order'=>3,'class'=>'col-md-1','widget'=>'','extra'=>'decimal','default'=>0),
	array('id'=>'debit_credit_id','name'=>'Dr/Cr','order'=>4,'class'=>'hidden','widget'=>'','extra'=>'','default'=>0),
	array('id'=>'general_ledger_id','name'=>'Ledger','order'=>0,'class'=>'hidden','widget'=>'','extra'=>'','default'=>4),
	array('id'=>'general_ledger_name','name'=>'Ledger','order'=>1,'class'=>'col-md-3','widget'=>'gl_dropdown','extra'=>'general_ledger_id','default'=>''),
	array('id'=>'loan_id','name'=>'Loan ID','order'=>2,'class'=>'col-md-1','widget'=>'','extra'=>'numeric','default'=>0),
	array('id'=>'archive_id','name'=>'archive_id','order'=>0, 'class'=>'hidden','widget'=>'','extra'=>'','default'=>0),
	array('id'=>'crud','name'=>'CRUD','order'=>0, 'class'=>'hidden','widget'=>'','extra'=>'','default'=>'C')
	);

		$data['result']['voucher_detail'] = $this->common_model->get_by_custom_where('voucher_detail',
			'voucher_detail_get', 'voucher_id = ' . $id);
		$data['result']['gl_dropdown'] = $this->common_model->get_by_column('general_ledger', 'id,name as text','ASSOC');
		$data['result']['action'] = 'R';
		echo json_encode($data['result']);
	}

	function set_form_rule()
	{
		//voucher Table
		$this->form_validation->set_rules('voucher_voucher_type_id', 'Voucher Type', 'required');
		$this->form_validation->set_rules('voucher_receipt_no', 'Receipt no', 'required');
		//$this->form_validation->set_rules('voucher_general_ledger_id', 'General Ledger ', 'required');
		$this->form_validation->set_rules('voucher_member_id', 'Member Name', 'required');
		$this->form_validation->set_rules('voucher_receipt_date', 'Receipt Date', 'required');
		$this->form_validation->set_rules('voucher_cheque_no', 'Cheque No', 'required');
		$this->form_validation->set_rules('voucher_narration', 'Narration', 'required');
		$this->form_validation->set_rules('voucher_cheque_date', 'Cheque Date', 'required');
		$this->form_validation->set_rules('voucher_cheque_amount', 'Cheque amount', 'required');
		$this->form_validation->set_rules('voucher_voucher_no', 'voucher no', 'required');
	}

	public function form_validate()
	{
		//var_dump($_POST);
		//$this->set_form_rule();
		$voucher_data = array();
		$voucher_detail_data = array();

		$voucher_data['id'] 				= $this->input->post('voucher_data[id]');
		$voucher_data['branch_id'] 			= $this->input->post('voucher_data[branch_id]');
		$voucher_data['voucher_type_id'] 	= $this->input->post('voucher_data[voucher_type_id]');
		$voucher_data['batch_detail_status_id'] = $this->input->post('voucher_data[batch_detail_status_id]');
		$voucher_data['receipt_no'] 		= $this->input->post('voucher_data[receipt_no]');
		$voucher_data['member_id'] 			= $this->input->post('voucher_data[member_id]');
		//$voucher_data['receipt_date'] 		= $this->input->post('voucher_data[receipt_date]');
		$voucher_data['cheque_no'] 			= $this->input->post('voucher_data[cheque_no]');
		$voucher_data['narration'] 			= $this->input->post('voucher_data[narration]');
		//$voucher_data['cheque_date'] 		= $this->input->post('voucher_data[cheque_date]');
		$voucher_data['cheque_amount'] 		= $this->input->post('voucher_data[cheque_amount]');
		$voucher_data['archive_id'] 		= $this->input->post('voucher_data[archive_id]');
		$voucher_data['casher_id'] 			= $this->input->post('voucher_data[casher_id]');
		$voucher_data['officer_id'] 		= $this->input->post('voucher_data[officer_id]');

		//Handle date & xxx_by n xxx_at
		$voucher_action =  $this->input->post('voucher_data[action_voucher]');
		
		if($voucher_action == 'C' || $voucher_data['id'] == 0)
		{
			//insert
			//$voucher_data['created_at'] = date("Y-m-d H:i:s");
			$voucher_data['created_at'] = date("Y-m-d H:i:s");
			$voucher_data['created_by_user_id'] = $this->session->userdata('user_`id');
			$voucher_data['updated_at'] = NULL;
			$voucher_data['updated_by_user_id'] = NULL;
			$voucher_data['deleted_at'] = NULL;
			$voucher_data['deleted_by_user_id'] = NULL;
			$voucher_data['receipt_date'] = date_create($this->input->post('voucher_data[receipt_date]'))->format("Y-m-d");
        	$voucher_data['cheque_date'] = date_create($this->input->post('voucher_data[cheque_date]'))->format("Y-m-d");

			$this->model->insert_voucher_data($voucher_data);
        	$voucher_id = $this->db->insert_id();
		}
		else 
		{
			$voucher_id = $voucher_data['id'];
			if( $voucher_action == 'U' && $voucher_data['id'] > 0)
			{
				$voucher_data['updated_at'] = date("Y-m-d H:i:s");
				$voucher_data['updated_by_user_id'] = $this->session->userdata('user_id');
				$voucher_data['deleted_at'] = NULL;
				$voucher_data['deleted_by_user_id'] = NULL;

			 	$this->model->update_voucher_data($voucher_data['id'] ,$voucher_data);			
				$data['action'] = 'Reaction';
			}
		}

		
	//  post data of voucher_detail 
		$voucher_detail_post_data = $_POST['voucher_detail_data'];
		//$data['voucher_detail_post_data'] = $voucher_detail_post_data;
		$voucher_detail_insert_data = array();
		$voucher_detail_update_data = array();
		
		$val = '';
		//$voucher_detail_data = array();
        foreach ($voucher_detail_post_data as $outer) 
        {
        	$tr_id = '0';
            foreach ($voucher_detail_post_data as $inner) 
            {
                if(!($outer['sr_no'] == $inner['sr_no'] && $outer['debit_credit_id'] == $inner['debit_credit_id']))
                {
                    $tr_id = $inner['general_ledger_id'];                    
                    break;
                }
            }
            $val .= ' outer[' . $outer['sr_no'] . '][transaction_id] '. $outer['transaction_id'] . ' $tr_id ' . $tr_id;
            if($outer['transaction_id'] != $tr_id)
            {
            	$val .= 'if cleared';
            	$outer['transaction_id'] = $tr_id;

            	if($outer['action'] == 'R')
            	{
            		//$val .= 'action ';
            		$outer['action'] = 'U';
            	}
            }
            
            $voucher_detail_data[] = $outer;
        }

		foreach ($voucher_detail_data as $key => $rows) 
		{
			$data['action'] = $voucher_detail_data[$key]['action'];
			
			switch ($data['action']) 
			{
				//'C' FOR create action in voucher detail
				case 'C':
		        	$voucher_detail_insert_data[] = array(
		 				'id'=> $voucher_detail_data[$key]['id'],
		 				'voucher_id'=> $voucher_id,
		 				'general_ledger_id'=>$voucher_detail_data[$key]['general_ledger_id'],
		 				'sr_no'=>$voucher_detail_data[$key]['sr_no'],
		 				'loan_id'=>$voucher_detail_data[$key]['loan_id'],
		 				'transaction_id'=>$voucher_detail_data[$key]['transaction_id'],
		 				'debit_credit_id'=>$voucher_detail_data[$key]['debit_credit_id'],
		 				'debit_amount'=>$voucher_detail_data[$key]['debit_amount'],
		 				'credit_amount'=>$voucher_detail_data[$key]['credit_amount'],
		 				'created_at'=>date("Y-m-d H:i:s"),
		 				'created_by_user_id'=>$this->session->userdata('user_id'),
		 				'updated_at'=>NULL,
		 				'updated_by_user_id'=>NULL,
		 				'deleted_at'=>NULL,
		 				'deleted_by_user_id'=>NULL,
		 				);
			        break;

			    //'U' for checking update action field in voucher detail
		    	case 'U':
		        	$voucher_detail_update_data[] = array(
		 				'id'=>$voucher_detail_data[$key]['id'],
		 				'voucher_id'=>$voucher_id,
		 				'general_ledger_id'=>$voucher_detail_data[$key]['general_ledger_id'],
		 				'sr_no'=>$voucher_detail_data[$key]['sr_no'],
		 				'loan_id'=>$voucher_detail_data[$key]['loan_id'],
		 				'transaction_id'=>$voucher_detail_data[$key]['transaction_id'],
		 				'debit_credit_id'=>$voucher_detail_data[$key]['debit_credit_id'],
		 				'debit_amount'=>$voucher_detail_data[$key]['debit_amount'],
		 				'credit_amount'=>$voucher_detail_data[$key]['credit_amount'],
		 				'updated_at'=>NULL,
		 				'updated_by_user_id'=>$this->session->userdata('user_id'),
		 				'deleted_at'=>NULL,
		 				'deleted_by_user_id'=>NULL,
		 				);
		        	
 		 			$data['voucher_detail_update_data'] = $voucher_detail_update_data;
		        	break;

		        //'D' for checking delete action field in voucher detail
		   		case 'D':
		   		 	if ($voucher_detail_data[$key]['id'] > 0)
		   		 	{
			      		$this->db->where('id', $voucher_detail_data[$key]['id']);
						$this->db->delete('voucher_detail'); 
					}
		        	break;
			}

		}
		
		
		if(count($voucher_detail_insert_data) > 0)
		{
			$this->db->insert_batch('voucher_detail', $voucher_detail_insert_data);
		}

		if(count($voucher_detail_update_data) > 0)
		{
			$this->db->update_batch('voucher_detail', $voucher_detail_update_data,'id');
		}
		
		$data['voucher_data'] = $voucher_data;
		$data['voucher_detail_insert_data'] = $voucher_detail_insert_data;
		$data['voucher_detail_update_data'] = $voucher_detail_update_data;
 	 	//$data['voucher_detail'] = $this->db->last_query() ;
 		$data['status']	= TRUE;
 		$data['branch_id']	= $voucher_data['branch_id'];
 		//$data['detail'] = $voucher_detail_data;
 		
 		//$data['val'] = $val;
		echo json_encode($data);
	}

	public function get_html_data()
	{
		$search_array = array();
 		$where_condition = '';
 		$data['result'] 			 = $this->model->get_all_voucher($where_condition);
 		
		echo  $this->load->view('voucher/home_detail_view', $data, TRUE);
	}

	public function get_next_receipt_no()
	{
		$voucher_type = $this->input->get('voucher_type',TRUE);
		$receipt_no = $this->model->get_next_receipt_no($voucher_type);
		echo json_encode($receipt_no);
	}

	public function is_unique_receipt_no()
	{
		$voucher_type_id 			= $this->input->get('voucher_type_id',TRUE);
		$receipt_no 				= $this->input->get('receipt_no',TRUE);
		$branch_id					= $this->input->get('branch_id',TRUE);
		$result 					= $this->model->is_unique_receipt_no($branch_id, $voucher_type_id, $receipt_no );

		echo json_encode($result);
	}
	public function get_gl_ajax()
	{
		$voucher_type = $this->input->post('voucher_type',TRUE);
		
		$data['result']['voucher_type'] = $this->model->get_voucher_type($voucher_type);
		$account_group_data = $this->account_group_model->get_account_group_data();
		$general_ledger_data = $this->general_ledger_model->get_general_ledger_data();

        foreach ($account_group_data as $key) 
        {          
            $id = $key['id'];
            $child_data = array();
            foreach ($general_ledger_data as $row) 
            {
                if($row['account_group_id'] == $id)
                {
                    $child_data[]= array('id'=>$row['id'] , 'text' => $row['name']);
                }
            }
            $data['result']['gl'][] = array('text' => $key['name'], 'account_group_id' => $key['id'] , 'children' => $child_data ) ; //[$key['name']] = $child_data;
            
        }

        $data['result']['voucher_type_list'] = $this->model->get_voucher_type_list();
		
		echo json_encode($data);

	}

	public function convert_voucher()
	{
		$id 				= $this->input->get('id',TRUE);
		$voucher_type_id 	= $this->input->get('voucher_type_id',TRUE);
		$data['result'] 	= $this->model->convert_voucher($id, $voucher_type_id);
		echo json_encode($data);
	}

}
