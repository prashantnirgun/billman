<div class="modal fade" id="invoice_detail_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">

  
        <div class="modal-header">
          <button type="button" class="close" id="close_btn" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Invoice Item</h4>
        </div>
        <div class="col-md-12" id="alert_box">
         
        </div>

        <div class="modal-body">
          <?php echo validation_errors(); ?>
          <input type="text" value="C" name="action_invoice_detail" id="action_invoice_detail" placeholder="action detail"/> 
           <form action="" id="invoice_detail_form" class="form-horizontal">

                    <input type="text" value="" name="invoice_detail_id" id="invoice_detail_id" placeholder="id"/> 
                    <input type="text" value="" name="invoice_detail_invoice_id" id="invoice_detail_invoice_id" placeholder="invoice_id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-2">Product</label>
                            <div class="col-md-4">
                            <?php echo form_dropdown('invoice_detail_product_id',$product_dropdown,'',array('style'=>'width:100%','class'=>'form-control','id'=>'invoice_detail_product_id')); ?>
                              
                              <span class="help-block" id="error_message"></span>
                         
                            </div>
                            <label class="control-label col-md-2">Tax Rate </label>
                            <div class="col-md-3">
                            <input name="invoice_detail_tax_rate_id" id="invoice_detail_tax_rate_id" placeholder=""
                             class="form-control" type="text">
                              <span class="help-block"></span>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-md-2">Quantity</label>
                            <div class="col-md-3">
                              <input name="invoice_detail_quantity" id="invoice_detail_quantity" placeholder=" " class="form-control" type="text">
                              <span class="help-block" id="error_message"></span>
                         
                            </div>
                            <label class="control-label col-md-2">Rate</label>
                             <div class="col-md-4">
                              <input name="invoice_detail_rate" id="invoice_detail_rate" placeholder="quantity " class="form-control" type="text">
                              <span class="help-block" id="error_message"></span>
                         
                            </div>
                        </div>
                         <div class="form-group">
                            
                           
                            <label class="control-label col-md-2">Dis Amt</label>
                            <div class="col-md-4">
                            <input name="invoice_detail_discount_amount" id="invoice_detail_discount_amount" placeholder="Amount" class="form-control" type="text">
                              <span class="help-block"></span>
                            </div>
                             <label class="control-label col-md-2">Sr No</label>
                            <div class="col-md-4">
                              <input name="invoice_detail_sr_no" id="invoice_detail_sr_no" placeholder=" " class="form-control" type="text">
                              <span class="help-block" id="error_message"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Amount</label>
                            <div class="col-md-4">
                              <input name="invoice_detail_amount" id="invoice_detail_amount" placeholder="Amount" class="form-control" type="text">
                              <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-2">Description</label>
                            <div class="col-md-9">
                            <input name="invoice_detail_description" id="invoice_detail_description" placeholder="description" class="form-control" type="text">
                              <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
              <div class="col-md-2">
                <input type="button" id="button_save_modal_detail1" class="btn btn-primary" value="Save">
              </div>
                <input type="button" class="btn btn-warning" value="Close" data-dismiss="modal">
    
             </form>

        </div>
        
      </div>
      
     </div>
  </div>
