<?php 

$this->load->model('companys/Company_model','company_model');
$this->load->model('accounts/Account_group_model','account_group_model');
$debit_credit_dropdown  = $this->company_model->build_dropdown('Debit_credit');
$account_group_dropdown = $this->account_group_model->get_dropdown();

?>
<div class="modal fade" id="general_ledger_modal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" id="close_btn" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">General ledger</h4>
        </div>
        <div class="modal-body">

              <form action="" id="general_ledger_form" class="form-horizontal">
                   <input type="hidden" value="0" name="general_ledger_id" id="general_ledger_id"/> 
                    <input type="hidden" value="2" name="general_ledger_statutary_id" id="general_ledger_statutary_id"/> 
                    <input type="hidden" value="1" placeholder="Branch Id" name="general_ledger_branch_id" id="general_ledger_branch_id"/> 
                    <input type="hidden" name="general_ledger_closing_amount" id="general_ledger_closing_amount" class="form-control" placeholder="Closing" value="0">
                     <input name="general_ledger_debit_amount" id="general_ledger_debit_amount" placeholder="debit"  class="form-control" type="hidden" value="0">
                     <input name="general_ledger_credit_amount" id="general_ledger_credit_amount" placeholder="debit"  class="form-control" type="hidden" value="0">
                              
                    <div class="form-body">
                      <div class="form-group">
                           <label class="control-label col-md-1">Group</label>
                            <div class="col-md-5">
                              <?php echo form_dropdown('general_ledger_account_group_id',$account_group_dropdown,'',array('style'=>'width:100%','class'=>'form-control','id'=>'general_ledger_account_group_id')); ?>
                              <span class="help-block"></span>
                            </div>
                            <label class="control-label col-md-1">Name</label>
                            <div class="col-md-5">
                              <input name="general_ledger_name" id="general_ledger_name" placeholder="Name" class="form-control" type="text">
                              <span class="help-block"></span>
                            </div>
                      </div>
                       <div class="form-group">
                          <label class="control-label col-md-1">Alise</label>
                            <div class="col-md-5">
                              <input name="general_ledger_alise" id="general_ledger_alise" class="form-control" placeholder="Alise">
                            </div>
                            <label class="control-label col-md-1">Dr/Cr</label>
                            <div class="col-md-5">
                             <?php echo form_dropdown('general_ledger_debit_credit_id',$debit_credit_dropdown,'',array('style'=>'width:100%','class'=>'form-control','id'=>'general_ledger_debit_credit_id')); ?>
                            </div>
                           
                        </div>
                        
                        <div class="form-group">
                             <label class="control-label col-md-1">OP.</label>
                            <div class="col-md-5">
                              <input name="general_ledger_opening_amount" id="general_ledger_opening_amount" class="form-control" placeholder="Opening" value="0.00">
                            </div>
                            <label class="control-label col-md-1">PAN</label>
                            <div class="col-md-5">
                              <input name="general_ledger_pancard_no" id="general_ledger_pancard_no" placeholder="Pancard No" style="text-transform:uppercase" class="form-control" type="text">
                              <span class="help-block"></span>
                            </div>
                         
                          </div>
                         <div class="form-group">
                           
                            <label class="control-label col-md-1">SVAT</label>
                            <div class="col-md-5">
                              <input name="general_ledger_state_vat_no" id="general_ledger_state_vat_no" placeholder="State vat" class="form-control" type="text">
                              <span class="help-block"></span>
                            </div>
                          <label class="control-label col-md-1">CVAT</label>
                            <div class="col-md-5">
                              <input name="general_ledger_central_vat_no" id="general_ledger_central_vat_no" class="form-control" placeholder="Central Vat">
                            </div>
                          </div>

                    </div>
                  <div class="col-md-2">
                    <input type="button" id="button_save_general_ledger_modal" class="btn btn-primary" value="Save"
                    data-toggle="tooltip" title="Save1" >
                  </div>
                    <input type="button" class="btn btn-warning" value="Close" data-dismiss="modal">
             </form>

        </div>

      </div>

     </div>
  </div>
