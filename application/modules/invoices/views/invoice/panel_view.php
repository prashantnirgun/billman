
  <br>
  <!-- <input type="hidden" id="director_details_id" name="director_details_id"> -->

  <div class="panel panel-primary">
    <div class="panel-heading"> Details</div>
    <div class="panel-body">
      <input type="hidden" placeholder="id" name="invoice_crud" id="invoice_crud" value="R" />
      <form action="" id="product_form" class="form-horizontal"> 

        <input type="hidden" placeholder="id" name="invoice_id" id="invoice_id"/> 

        <input type="hidden" placeholder="branch id" name="invoice_branch_id" id="invoice_branch_id"/> 
        <input type="text"  id="invoice_voucher_type_id" name="invoice_voucher_type_id" placeholder="voucher type " value="6">

        <div class="form-body">
          <div class="form-group">
            <label class="control-label col-md-1">Invoice No. </label>
            <div class="col-md-2">
              <input type="text" class="form-control" id="invoice_invoice_no" name="invoice_invoice_no" value="">
              <span class="help-block"></span>
            </div>
            <label class="control-label col-md-1">Status</label>
            <div class="col-md-2">
              <?php echo form_dropdown('invoice_status_id',$status_dropdown,'',array('style'=>'width:100%','class'=>'form-control','id'=>'invoice_status_id')); ?>

            </div>
            <label class="control-label col-md-1">Date</label>
            <div class="col-md-2">
              <input type="text" class="form-control datepicker" id="invoice_invoice_date" name="invoice_invoice_date" value="" placeholder="bill date">
            </div>
            <label class="control-label col-md-1">Due Date</label>
            <div class="col-md-2">
              <input type="text" class="form-control datepicker" id="invoice_date_due" name="invoice_date_due" value="" placeholder="due date">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-1">Customer</label>
            <div class="col-md-3">
              <?php $general_ledger_dropdown[0] ='Select Any'; $general_ledger_dropdown[-1] ='Add New';

            ksort($general_ledger_dropdown); echo form_dropdown('invoice_general_ledger_id',$general_ledger_dropdown,'',array('style'=>'width:100%','class'=>'form-control','id'=>'invoice_general_ledger_id')); ?>

            </div>

            <label class="control-label col-md-1">Ref No</label>
            <div class="col-md-2">
              <input type="text" class="form-control" id="invoice_reference_no" name="invoice_reference_no" value="" placeholder="Ref no.">
            </div>
            <label class="control-label col-md-1">Password</label>
            <div class="col-md-2">
              <input type="text" class="form-control" id="invoice_password" name="invoice_password" value="" placeholder="Password">
            </div>
          </div>

          <button type="button" class="btn btn-primary" id="button_add"
          data-toggle="tooltip" data-placement="bottom" title="Add Invoice Detail"><span class="glyphicon glyphicon-plus"></span>
          </button>
          <?php //$this->load->view('invoice_item/tab_view', array($product_dropdown));?>

          <div id="header_data_div"></div>
          <br/>
          <div id="invoice_item_div" class="list-group"></div>
          <br/>
          <div id="hidden_data"></div>
          <div class="row">
            <div class="col-md-9">
              <div class="row">
                  <textarea name="invoice_narration" id="invoice_narration" class="form-control" rows="6"  placeholder="narration" value=""></textarea>
                  <span class="help-block"></span>
              </div>
              <div class="row">
                <?php $narration_dropdown[0] = 'Select Any';
                 ksort($narration_dropdown);
                echo form_dropdown('narration_dropdown',$narration_dropdown,'',array('style' => 'width: 100%','class'=>'form-control','id'=>'narration_dropdown')); ?>
              </div>
                <div class="row">
                  <label class="switch">
                  <input type="checkbox"  id="check_box">
                  <div class="slider round"></div>
                  </label>
                </div>
                 <div class="row" id="detail_item_tax" name="detail_item_tax"></div>
            </div>
            <div class=col-md-3>

              <div class="form-group">
                <label class="control-label col-md-5">Sub Total</label>
                <div class="col-md-7">
                  <input type="text" class="form-control" id="invoice_sales_amount" name="invoice_sales_amount" value="">
                </div>
              </div>

              <div class="" style="display:none> id="item_tax" >
              </div>

              <div class="form-group">
                <label class="control-label col-md-5">Item Tax</label>
                <div class="col-md-7">
                  <input type="text" class="form-control" id="invoice_service_tax_paid" name="invoice_service_tax_paid" value="0.00">
                  <span class="help-block"></span>
                </div> 
              </div>

              <div class="form-group">
                <label class="control-label col-md-5">Invoice tax</label>
                <div class="col-md-7">
                <input type="text" class="form-control" id="invoice_vat_amount" name="invoice_vat_amount" value="0.00">
                <span class="help-block"></span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-5"> Dis Amt</label>
                <div class="col-md-7">
                  <input type="text" class="form-control" id="invoice_discount_amount" name="invoice_discount_amount" value="0.00">
                </div>  
              </div>

              <div class="form-group">
                <label class="control-label col-md-5">Round Up</label>
                <div class="col-md-7">
                  <input type="text" class="form-control" id="invoice_round_up" name="invoice_round_up" value="0.00">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-5">Amount</label>
                <div class="col-md-7">
                  <input type="text" class="form-control" id="invoice_amount" name="invoice_amount" value="">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-5">Discount % </label>
                <div class="col-md-7">
                  <input type="text" class="form-control" id="invoice_discount_percent" name="invoice_discount_percent" value="">
                </div>
              </div>

            </div>
          </div><!-- <div class="row" style="border: 2px solid black"> -->

          <div class="col-md-2">
            <input type="button" id="button_save_panel" class="btn btn-primary" value="Save" 
           data-toggle="tooltip" title="Save">
            <input type="button" class="btn btn-warning" value="Close">
          </div>

        </div>
      </form>
      <!-- </form> -->
    </div>

  </div>
