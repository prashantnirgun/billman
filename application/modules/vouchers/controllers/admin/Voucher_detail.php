<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Voucher_detail extends Admin_Crud_Controller
{

	function __construct()
	{
		parent::__construct();
        $this->load->model('vouchers/Voucher_detail_model','model');
	}
	public function index()
	{
		echo "voucher Detail";

	}

	public function form_validate()
	{

		$this->form_validation->set_rules('voucher_detail_voucher_id', 'Voucher ', 'required');
		$this->form_validation->set_rules('voucher_detail_loan_id', 'Loan no', 'required');
		$this->form_validation->set_rules('voucher_detail_general_ledger_id', 'General Ledger ', 'required');
		$this->form_validation->set_rules('voucher_detail_transaction_id', 'transaction id', 'required');
		$this->form_validation->set_rules('voucher_detail_debit_credit_id', 'Debit Credit', 'required');
		$this->form_validation->set_rules('voucher_detail_debit_amount', 'Debit Amount', 'required');
		$this->form_validation->set_rules('voucher_detail_credit_amount', 'credit_amount', 'required');

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
        //$data['status'] = TRUE;
        echo json_encode($data);
	}
	public function test()
	{
		var_dump($_POST);
		echo count($_POST);
		$receipt = $this->input->post('receipt_id');
		$gl_id = $this->input->post('gl_id');
		$loan_id = $this->input->post('loan_id');
		$amount = $this->input->post('amount');
		var_dump($receipt);
		echo count($receipt);


		for ($i=0; $i < count($receipt); $i++) {
			$data[] =
        			array('receipt_id' => $receipt[$i],
        				'gl_id' => $gl_id[$i],
        				'loan_id' => $loan_id[$i],
        				'amount' => $amount[$i],
        				'company_id' => 1,
        				'branch_id' => 2);
		}
		var_dump($data);

		$this->db->insert_batch('receipt_detail', $data);
		echo $this->db->last_query();


		/*$data = array(
        array(
                'receipt_id' => $this->input->post('receipt_id'),
                'gl_id' => $this->input->post('gl_id'),
                'loan_id' => $this->input->post('loan_id'),
                'amount' =>$this->input->post('amount'),
                'company_id' => 1,
                'branch_id' => 1
        ),
        array(
                'receipt_id' => $this->input->post('receipt_id'),
                'gl_id' => $this->input->post('gl_id'),
                'loan_id' => $this->input->post('loan_id'),
                'amount' => $this->input->post('amount'),
                'company_id' => 1,
                'branch_id' => 1
        )
	);

	$this->db->insert_batch('receipt_details', $data);*/
	}
}
