<div class="modal fade" id="item_category_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">

  
        <div class="modal-header">
          <button type="button" class="close" id="close_btn" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Item Category</h4>
        </div>
        <div class="col-md-12" id="alert_box">
         
        </div>
 
        <div class="modal-body">
          <?php echo validation_errors(); ?>
           <form action="" id="item_category_form" class="form-horizontal">

                    <input type="hidden" value="" name="item_category_id" id="item_category_id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Name</label>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                              <input name="item_category_name" id="item_category_name" placeholder=" Name" class="form-control" type="text">
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
