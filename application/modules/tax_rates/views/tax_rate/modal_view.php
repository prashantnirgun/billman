<div class="modal fade" id="tax_rate_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" id="close_btn" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tax Rate</h4>
        </div>
        <div class="col-md-12" id="alert_box">
         
        </div>
 
        <div class="modal-body">
          <?php echo validation_errors(); ?>
           <form action="" id="tax_rate_form" class="form-horizontal">

                    <input type="hidden" value="" name="tax_rate_id" id="tax_rate_id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-1">Name</label>
                            <div class="col-md-5">
                              <input name="tax_rate_tax_rate_name" id="tax_rate_tax_rate_name" placeholder=" Name" class="form-control" type="text">
                              <span class="help-block" id="error_message"></span>
                         
                            </div>
                             <label class="control-label col-md-2">Percent</label>
                            <div class="col-md-2">
                               <input name="tax_rate_tax_rate_percent" id="tax_rate_tax_rate_percent" placeholder=" Percent" class="form-control" type="text">
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
