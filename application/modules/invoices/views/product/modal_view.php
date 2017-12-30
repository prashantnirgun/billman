<div class="modal fade" id="product_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">

  
        <div class="modal-header">
          <button type="button" class="close" id="close_btn" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Product</h4>
        </div>
        <div class="col-md-12" id="alert_box">
         
        </div>

        <div class="modal-body">
          <?php echo validation_errors(); ?>
          
           <form action="" id="product_form" class="form-horizontal">

                    <input type="hidden" value="" name="product_id" id="product_id" placeholder="id" value="0" /> 
                    
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-2">Product</label>
                            <div class="col-md-4">
                            <?php echo form_dropdown('product_product_category_id',$product_category_dropdown,'',array('style'=>'width:100%','class'=>'form-control','id'=>'product_product_category_id')); ?>
                              
                              <span class="help-block" id="error_message"></span>
                         
                            </div>
                            <label class="control-label col-md-2">SKU</label>
                            <div class="col-md-3">
                            <input name="product_sku" id="product_sku" placeholder=""
                             class="form-control" type="text">
                              <span class="help-block"></span>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-md-2">Name</label>
                            <div class="col-md-3">
                              <input name="product_name" id="product_name" placeholder=" " class="form-control" type="text">
                              <span class="help-block" id="error_message"></span>
                         
                            </div>
                            <label class="control-label col-md-2">Price</label>
                             <div class="col-md-4">
                              <input name="product_price" id="product_price" placeholder="Price " class="form-control" type="text">
                              <span class="help-block" id="error_message"></span>
                         
                            </div>
                        </div>
                         <div class="form-group">
                            
                           
                            <label class="control-label col-md-2">Purchase Price</label>
                            <div class="col-md-4">
                            <input name="product_purchase_price" id="product_purchase_price" placeholder="Price" class="form-control" type="text">
                              <span class="help-block"></span>
                            </div>
                             <label class="control-label col-md-2">Provider Name</label>
                            <div class="col-md-4">
                              <input name="product_provider_name" id="product_provider_name" placeholder=" " class="form-control" type="text">
                              <span class="help-block" id="error_message"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Tax rate </label>
                            <div class="col-md-4">
                              <input name="product_tax_rate_id" id="product_tax_rate_id" placeholder="tax rate" class="form-control" type="text">
                              <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-2">Description</label>
                            <div class="col-md-9">
                            <input name="product_description" id="product_description" placeholder="description" class="form-control" type="text">
                              <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
              <div class="col-md-2">
                <input type="button" id="button_save_modal_product" class="btn btn-primary" value="Save">
              </div>
                <input type="button" class="btn btn-warning" value="Close" data-dismiss="modal">
    
             </form>

        </div>
        
      </div>
      
     </div>
  </div>
