<div class="modal fade" id="form_setting_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">

  
        <div class="modal-header">
          <button type="button" class="close" id="close_btn" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Form Setting</h4>
        </div>
        <div class="col-md-12" id="alert_box"></div>
 
        <div class="modal-body">
          <?php echo validation_errors(); ?>
           <form action="" id="form_setting_form" class="form-horizontal">

            <input type="hidden" value="" name="form_setting_id" id="form_setting_id"/> 
            <div class="form-body">
              <div class="form-group">
                <label class="control-label col-md-2">Column ID</label>
                <div class="col-md-4">
                <input name="form_setting_column_id" id="form_setting_column_id" placeholder="column id" class="form-control" type="text">
                <span class="help-block" id="error_message"></span>
                </div>
              
                <label class="control-label col-md-2">Display Name</label>
                <div class="col-md-4">
                   <input name="form_setting_display_name" id="form_setting_display_name" placeholder="Display Name" class="form-control" type="text">
                <span class="help-block"  id="error_message"></span>
                </div>
              </div>
              <div class="form-group">
            
              
                <label class="control-label col-md-2">Display Order</label>
                <div class="col-md-4">
                   <input name="form_setting_display_order" id="form_setting_display_order" placeholder="Display Order" class="form-control" type="text">
                <span class="help-block"  id="error_message"></span>
                </div>
             
                <label class="control-label col-md-2">Class Name</label>
                <div class="col-md-4">
                <input name="form_setting_class_name" id="form_setting_class_name" placeholder="class name" class="form-control" type="text">
                <span class="help-block" id="error_message"></span>
                </div>
            </div>
              <div class="form-group">
              
                <label class="control-label col-md-2">Widget</label>
                <div class="col-md-4">
                   <input name="form_setting_widget" id="form_setting_widget" placeholder="Widget" class="form-control" type="text">
                <span class="help-block"  id="error_message"></span>
                </div>
             
                <label class="control-label col-md-2">Extra</label>
                <div class="col-md-4">
                <input name="form_setting_extra" id="form_setting_extra" placeholder="Extra" class="form-control" type="text">
                <span class="help-block" id="error_message"></span>
                </div>
             </div>
              <div class="form-group">
                <label class="control-label col-md-2">Default Value</label>
                <div class="col-md-4">
                   <input name="form_setting_default_value" id="form_setting_default_value" placeholder="Default Value" class="form-control" type="text">
                <span class="help-block"  id="error_message"></span>
                </div>
              
                <label class="control-label col-md-2">Table Name</label>
                <div class="col-md-4">
                <input name="form_setting_table_name" id="form_setting_table_name" placeholder="Table Name" class="form-control" type="text">
                <span class="help-block" id="error_message"></span>
                </div>
               </div>
              <div class="form-group">
                <label class="control-label col-md-2">Form Name</label>
                <div class="col-md-4">
                   <input name="form_setting_form_name" id="form_setting_form_name" placeholder="Form Name" class="form-control" type="text">
                <span class="help-block"  id="error_message"></span>
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
