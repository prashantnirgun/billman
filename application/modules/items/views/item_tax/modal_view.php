
<?php 
//  $tax_rate_dropdown = $this->common_model->get_by_column('tax_rate','id, name','key');
?>
<div class="modal fade" id="item_tax_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">

  
        <div class="modal-header">
          <button type="button" class="close" id="close_btn" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Item Tax</h4>
        </div>
        <div class="col-md-12" id="alert_box">
         
        </div>
 
        <div class="modal-body">
          <?php echo validation_errors(); ?>
           <form action="" id="item_tax_form" class="form-horizontal">

                    <input type="hidden" value="" name="item_tax_id" id="item_tax_id"/> 
                    <input type="hidden" value="" name="item_tax_item_id" id="item_tax_item_id"/> 
                    <div class="form-body">
                        <div class="form-group">
                             <label class="control-label col-md-2">Tax Rate</label>
                            <div class="col-md-6">
                            <?php echo form_dropdown('item_tax_tax_rate_id',$tax_rate_dropdown,'',array('style'=>'width:100%','class'=>'form-control','id'=>'item_tax_tax_rate_id')); ?>
                            <span class="help-block"></span>
                            </div>
                             <label class="control-label col-md-1">Date</label>
                              <div class="col-md-3">
                              <input name="item_tax_wef_date" id="item_tax_wef_date" placeholder="Date" class="form-control datepicker" type="text">
                              <span class="help-block" id="error_message"></span>
                              </div>
                        </div>
                             
                       
                    </div>
              <div class="col-md-2">
                <input type="button" id="button_save_modal" class="btn btn-primary" value="Save">
              </div>
                <input type="button" class="btn btn-warning" value="Close" data-dismiss="modal">
    
             </form>

        </div>
        
      </div>
      
     </div>
  </div>
