
<div class="modal fade" id="system_property_modal" role="dialog">
  <div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" id="close_btn" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">System Peoperty</h4>
    </div>

    <div class="modal-body">
      <?php echo validation_errors(); ?>
  	   <form action="" id="system_property_form" class="form-horizontal">
      
        <input type="text" value="" name="system_property_id" id="system_property_id"/> 
        <input type="text" value="" name="system_property_company_id" id="system_property_company_id"/> 
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-2">Setting Key</label>
              <div class="col-md-4">
                <input name="system_property_setting_key" id="system_property_setting_key" placeholder="Key" class="form-control" type="text">
                <span class="help-block"></span>
              </div>
                <label class="control-label col-md-2">Setting Value</label>
              <div class="col-md-4">
                <input name="system_property_setting_value" id="system_property_setting_value" placeholder="Value" class="form-control" type="text">
                <span class="help-block"></span>
              </div>
            </div>
          </div>
    			<input type="button" id="button_save_modal" class="btn btn-primary" value="Save" 
              data-toggle="tooltip" title="Save">
    			<input type="button" class="btn btn-warning" value="Close" data-dismiss="modal">
       </form>
    </div>
  
  </div>
 </div>
</div>