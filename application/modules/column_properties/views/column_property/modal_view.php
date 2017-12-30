 
<?php 
    $statutary_dropdown      = $this->common_model->get_by_custom_where('property_view','property_dropdown'
,'column_value = "Yes_no"','KEY');

?>
<div class="modal fade" id="column_property_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">

  
        <div class="modal-header">
          <button type="button" class="close" id="close_btn" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Column Property</h4>
        </div>
        <div class="col-md-12" id="alert_box">
         
        </div>
 
        <div class="modal-body">
          <?php echo validation_errors(); ?>
           <form action="" id="column_property_form" class="form-horizontal">

                    <input type="hidden" value="" name="column_property_id" id="column_property_id"/> 
                   
 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-2">Column Name</label>
                            <div class="col-md-4">
                              <input name="column_property_column_value" id="column_property_column_value" placeholder="column value" class="form-control" type="text">
                              <span class="help-block" id="error_message"></span>
                         
                            </div>
                            <label class="control-label col-md-2">statutary</label>
                             <div class="col-md-2">
                           <?php echo form_dropdown('column_property_statutary_id',$statutary_dropdown,'',array('style'=>'width:100%','class'=>'form-control','id'=>'column_property_statutary_id')); ?>
                           </div>
                         
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-2">Description</label>
                            <div class="col-md-4">
                              <input name="column_property_decription" id="column_property_decription" placeholder="column value" class="form-control" type="text">
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
