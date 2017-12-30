<?php
    $this->load->model('accounts/General_ledger_model','general_ledger_model');
    $this->load->model('companys/Company_model','company_model');
  // $general_ledger_dropdown = $this->general_ledger_model->get_dropdown();
$general_ledger_dropdown = '';
  $debit_credit_dropdown = $this->company_model->build_dropdown('Debit_credit');

?>

<div class="modal fade" id="voucher_detail_modal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" id="close_btn" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Voucher Details</h4>
        </div>
        <div class="modal-body">

              <form action="" id="voucher_detail_form" class="form-horizontal">
                    <input type="hidden"  placeholder="id" name="action_voucher_detail" id="action_voucher_detail" value="C" />
                    <input type="hidden"  placeholder="id" name="voucher_detail_id" id="voucher_detail_id" value="" />
                    <input type="hidden"  placeholder="voucher_detail_voucher_id" name="voucher_detail_voucher_id" id="voucher_detail_voucher_id" value="" />
                    <input type="hidden" value="" placeholder="voucher_detail_archive_id" name="voucher_detail_archive_id" id="voucher_detail_archive_id" value=""/>
                     <input type="hidden" value="" placeholder="voucher_detail_transaction_id" name="voucher_detail_transaction_id" id="voucher_detail_transaction_id" value=""/>
                    <input type="hidden" value="" placeholder="voucher_detail_sr_no" name="voucher_detail_sr_no" id="voucher_detail_sr_no" value=""/>
                              
                    <div class="form-body">
                      <div class="form-group">
                        <label class="control-label col-md-1">loan#</label>
                            <div class="col-md-5">
                              <input name="voucher_detail_loan_id" id="voucher_detail_loan_id" placeholder="" class="form-control" type="text" value="">
                              <span class="help-block"></span>
                           </div>
                          
                        </div>
                        <div class="form-group">

                             <label class="control-label col-md-1">Ledger</label>
                            <div class="col-md-5">
                              <?php echo form_dropdown('voucher_detail_general_ledger_id',$general_ledger_dropdown,'',array('style'=>'width:100%','class'=>'form-control','id'=>'voucher_detail_general_ledger_id')); ?>

                           </div>
                            
                             <label class="control-label col-md-1">Dr/Cr</label>
                            <div class="col-md-5">
                            <?php echo form_dropdown('voucher_detail_debit_credit_id',$debit_credit_dropdown,'',array('class'=>'form-control','id'=>'voucher_detail_debit_credit_id')); ?>

                            </div>
                         </div>
                           <div class="form-group">
                            <label class="control-label col-md-1">Debit</label>
                            <div class="col-md-5" id="debit_amount">
                              <input name="voucher_detail_debit_amount" id="voucher_detail_debit_amount" placeholder="" class="form-control" type="text">
                              <span class="help-block" id="span_debit_amount"></span>
                            </div>
                            <label class="control-label col-md-1">Credit</label>
                            <div class="col-md-5" id="credit_amount">
                              <input name="voucher_detail_credit_amount" id="voucher_detail_credit_amount" placeholder="" class="form-control" type="text">
                               <span class="help-block" id="span_credit_amount"></span>
                           </div>
                          </div>

                    </div>
                  <div class="col-md-1">
                    <input type="button" id="button_save_modal" class="btn btn-primary" value="Save"
                    data-toggle="tooltip" title="Save1" >
                  </div>
                    <input type="button" class="btn btn-warning" value="Close" data-dismiss="modal">
             </form>

        </div>

      </div>

     </div>
  </div>
