<div class="panel panel-primary">
  <div class="panel-heading">Detail</div>
  <div class="panel-body">
    <form action="" id="general_ledger_form" class="form-horizontal" method="POST">
      <input type="hidden" value="0" name="general_ledger_id" id="general_ledger_id"/> 
      <input type="hidden" value="1" name="general_ledger_statutary_id" id="general_ledger_statutary_id"/> 
      <input type="hidden" value="1" name="general_ledger_branch_id" id="general_ledger_branch_id"/> 
      <input type="hidden" name="general_ledger_closing_amount" id="general_ledger_closing_amount">
      <input type="hidden" name="general_ledger_debit_amount" id="general_ledger_debit_amount" >
      <input type="hidden" name="general_ledger_credit_amount" id="general_ledger_credit_amount">
      <input type="hidden" name="general_ledger_account_group_id" id="general_ledger_account_group_id">

      <div class="form-body">
        <div class="form-group">
          <label class="control-label col-md-1">Name</label>
          <div class="col-md-3">
            <input name="general_ledger_name" id="general_ledger_name" placeholder="Name" class="form-control" type="text">
            <span class="help-block"></span>
          </div>

          <label class="control-label col-md-1">Alise</label>
          <div class="col-md-3">
            <input name="general_ledger_alise" id="general_ledger_alise" class="form-control" placeholder="Alise">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-1">Debit/Credit</label>
          <div class="col-md-3">
            <?php echo form_dropdown('general_ledger_debit_credit_id',$debit_credit_dropdown,'',array('style'=>'width:100%','class'=>'form-control','id'=>'general_ledger_debit_credit_id')); ?>
          </div>

          <label class="control-label col-md-1">Opening</label>
          <div class="col-md-3">
            <input name="general_ledger_opening_amount" id="general_ledger_opening_amount" class="form-control" placeholder="Opening">
          </div>

          <label class="control-label col-md-1">Pan</label>
          <div class="col-md-3">
            <input name="general_ledger_pancard_no" id="general_ledger_pancard_no" placeholder="Pancard No" style="text-transform:uppercase" class="form-control" type="text">
            <span class="help-block"></span>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-1">SVAT</label>
          <div class="col-md-3">
            <input name="general_ledger_state_vat_no" id="general_ledger_state_vat_no" placeholder="State vat" class="form-control" type="text">
            <span class="help-block"></span>
          </div>

          <label class="control-label col-md-1">CVAT</label>
          <div class="col-md-3">
            <input name="general_ledger_central_vat_no" id="general_ledger_central_vat_no" class="form-control" placeholder="Central Vat">
          </div>
        </div>
      </div>

      <?php  if(($update_permission == 'Y')) {?>
        <div class="col-md-1">
          <input type="submit" id="button_save_panel" class="btn btn-primary" value="Save">
        </div>
        <input type="button" class="btn btn-warning" value="Close">
      <?php } ?>
    </form>
  </div>
</div>