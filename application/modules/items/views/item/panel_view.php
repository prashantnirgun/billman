	
<?php 
/*
$this->load->model('tax_rates/Tax_rate_model','tax_rate_model');
$tax_rate_dropdown = $this->tax_rate_model->get_dropdown();
*/

?>
  <br>
   <!-- <input type="hidden" id="director_details_id" name="director_details_id"> -->

     	<div class="panel panel-primary">
        <div class="panel-heading">Item Details</div>
          <div class="panel-body">
            <form action="" id="item_form" class="form-horizontal">
              <input type="hidden" placeholder="id" name="item_id" id="item_id"/> 
             	<input type="hidden" placeholder="placeholder" name="item_item_category_id" id="item_item_category_id"/> 
    
                 <div class="form-body">
                    <div class="form-group">
                        <label class="control-label col-md-1">SKU </label>
                        <div class="col-md-3">
                          <input type="text" class="form-control" id="item_sku" name="item_sku" value="">
                            <span class="help-block"></span>
                        </div>
                        <label class="control-label col-md-1">Name</label>
                        <div class="col-md-3">
                          <input type="text" class="form-control" id="item_name" name="item_name" value="">
                        </div> 
                        <label class="control-label col-md-1">Price</label>
                         <div class="col-md-2">
                            <input type="text" class="form-control" id="item_price" name="item_price" value="">
                         </div>
                      </div>
                      <div class="form-group">
                        
                          <label class="control-label col-md-2">Purchase Price</label>
                          <div class="col-md-2">
                            <input type="text" class="form-control" id="item_purchase_price" name="item_purchase_price" value="">
                         </div>
                    
                          <label class="control-label col-md-2">Provider Name</label>
                          <div class="col-md-2">
                            <input type="text" class="form-control" id="item_provider_name" name="item_provider_name" value="">
                         </div> 
                          <label class="control-label col-md-1">Tax Rate</label>
                         <div class="col-md-2">
                          <?php echo form_dropdown('item_tax_rate_id',$tax_rate_dropdown,'',array('style'=>'width:100%','class'=>'form-control','id'=>'item_tax_rate_id')); ?>
                            
                         </div>
                         
                      </div> 
                      <div class="form-group">
                       <label class="control-label col-md-1">Description</label>
                        <div class="col-md-11">
                          <input type="text" class="form-control"  id="item_description" name="item_description" value="">
                          <span class="help-block"></span>
                        </div> 
                      </div>     
                 </div>
             
             <div class="col-md-1">
                <input type="button" id="button_save_panel" class="btn btn-primary" value="Save" 
                  data-toggle="tooltip" title="Save">
              </div>
                    <input type="button" class="btn btn-warning" value="Close">
            
    
             </form>
            </div>

         </div>
     