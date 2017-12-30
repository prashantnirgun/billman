<div class="modal fade" id="city_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">

  
        <div class="modal-header">
          <button type="button" class="close" id="close_btn" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">City</h4>
        </div>
        <div class="col-md-12" id="alert_box"></div>
 
        <div class="modal-body">
          <?php echo validation_errors(); ?>
           <form action="" id="city_form" class="form-horizontal">

            <input type="hidden" value="" name="city_id" id="city_id"/> 
            <div class="form-body">
              <div class="form-group">
                <label class="control-label col-md-1">City</label>
                <div class="col-md-4">
                <input name="city_name" id="city_name" placeholder="city Name" class="form-control" type="text">
                <span class="help-block" id="error_message"></span>
                </div>
              
                <label class="control-label col-md-1">State</label>
                <div class="col-md-4">
                <?php echo form_dropdown('city_state_id',$state_dropdown,'',array('style'=>'width:100%','class'=>'form-control','id'=>'city_state_id')); ?>
                <span class="help-block"></span>
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
