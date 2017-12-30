  <div class="panel panel-primary">
        <div class="panel-heading">Detail</div>
          <div class="panel-body">
             <form action="" id="general_ledger_form" class="form-horizontal">

                    <input type="hidden" value="" name="general_ledger_id" id="general_ledger_id"/> 
                    <input type="hidden" value="" name="general_ledger_branch_id" id="general_ledger_account_branch_id"/> 
                    <input type="hidden" value="" name="account_format_debit_amount" id="general_ledger_account_group_iddebit_amount"/> 
                   
                    <div class="form-body">
                        <div class="form-group">
                           <label class="control-label col-md-1">Group</label>
                            <div class="col-md-3">
                              <?php echo form_dropdown('general_ledger_account_group_id',$account_group_dropdown,'<?php echo $account_group_id;?>',array('style'=>'width:100%','class'=>'form-control','id'=>'general_ledger_account_group_id')); ?>
                              <span class="help-block"></span>
                            </div>
                            <label class="control-label col-md-1">Name</label>
                            <div class="col-md-3">
                              <input name="general_ledger_name" id="general_ledger_account_group_idname" placeholder="Name" class="form-control" type="text">
                              <span class="help-block"></span>
                            </div>
                          <label class="control-label col-md-1">Alise</label>
                            <div class="col-md-3">
                              <input name="general_ledger_alise" id="general_ledger_account_group_idalise" class="form-control" placeholder="Alise">
                            </div>
                          </div>
                           <div class="form-group">
                               
                            <label class="control-label col-md-1">Dr/Cr</label>
                            <div class="col-md-2">
                              <select name="general_ledger_debit_credit_id" id="general_ledger_debit_credit_id" class="form-control" placeholder="Debit Credit">
                              <option value="C">Credit</option>
                              <option value="D">Debit</option>
                              </select>
                            </div>
                             <label class="control-label col-md-1">Opening</label>
                            <div class="col-md-2">
                              <input name="general_ledger_opening_amount" id="general_ledger_opening_amount" class="form-control" placeholder="Opening">
                            </div>
                             <label class="control-label col-md-1">Closing</label>
                            <div class="col-md-2">
                              <input name="general_ledger_closing_amount" id="general_ledger_closing_amount" class="form-control" placeholder="Closing">
                            </div>
                        </div>

                         <div class="form-group">
                           <label class="control-label col-md-1">PanCard</label>
                            <div class="col-md-3">
                              <input name="general_ledger_pancard_no" id="general_ledger_pancard_no" placeholder="Pancard No" style="text-transform:uppercase" class="form-control" type="text">
                              <span class="help-block"></span>
                            </div>
                            <label class="control-label col-md-1">State vat</label>
                            <div class="col-md-3">
                              <input name="general_ledger_state_vat_no" id="general_ledger_state_vat_no" placeholder="State vat" class="form-control" type="text">
                              <span class="help-block"></span>
                            </div>
                          <label class="control-label col-md-2">Central vat</label>
                            <div class="col-md-2">
                              <input name="general_ledger_central_vat_no" id="general_ledger_central_vat_no" class="form-control" placeholder="Central Vat">
                            </div>
                          </div>
                           <div class="form-group">
                           <label class="control-label col-md-1">Debit amount</label>
                            <div class="col-md-3">
                              <input name="general_ledger_debit_amount" id="general_ledger_debit_amount" placeholder="debit_amount" style="text-transform:uppercase" class="form-control" type="text">
                              <span class="help-block"></span>
                            </div>
                            <label class="control-label col-md-1">Credit amount</label>
                            <div class="col-md-3">
                              <input name="general_ledger_credit_amount" id="general_ledger_credit_amount" placeholder="debit_amount" class="form-control" type="text">
                              <span class="help-block"></span>
                            </div>
                          </div>
                        
                    </div>

                <input type="button" id="SaveBtnGeneralLedger" class="btn btn-primary" value="Save">
                <input type="reset" class="btn btn-warning" value="Reset">
    
             </form>
            </div>

         </div>