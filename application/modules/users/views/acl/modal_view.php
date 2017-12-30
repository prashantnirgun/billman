<div class="modal fade" id="acl_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">

  
        <div class="modal-header">
          <button type="button" class="close" id="close_btn" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ACL</h4>
        </div>
        <div class="col-md-12" id="alert_box">
         
        </div>
 
        <div class="modal-body">
          <?php echo validation_errors(); ?>
           <form action="" id="acl_form" class="form-horizontal">

                    <input type="hidden" value="" name="acl_id" id="acl_id"/> 
                    <input type="hidden" value="" name="acl_company_id" id="acl_company_id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-1">Name</label>
                            <div class="col-md-5">
                              <input name="acl_module_name" id="acl_module_name" placeholder="Module Name" class="form-control" type="text">
                              <span class="help-block" id="error_message"></span>
                         
                            </div>
                             <label class="control-label col-md-2">Table</label>
                            <div class="col-md-4">
                              <input name="acl_table_name" id="acl_table_name" placeholder="Table name" class="form-control" type="text">
                              <span class="help-block"></span>
                              </div>
                           
                        </div>
                         <div class="form-group">
                             <label class="control-label col-md-1">Url</label>
                            <div class="col-md-5">
                              <input name="acl_url" id="acl_url" placeholder="Url" class="form-control" type="text">
                              <span class="help-block" id="error_message"></span>
                            </div>
                             
                            
                         </div>
                          <center><b>Permission</b><br>
                          <div class="form-group">
                         
                            <label class="control-label col-md-2">Create</label>

                            <label class="control-label col-md-3">View</label>
                        
                            <label class="control-label col-md-3">Update</label>
                           
                            <label class="control-label col-md-3 text-center">Delete</label>
                            
                        </div>
                        <div class="form-group">
                         
                            <div class="col-md-3">
                              <select name="acl_create_permission" id="acl_create_permission" class="form-control">
                                <option value="Y">Yes</option>
                                <option value="N">No</option>
                              </select>
                               
                              <span class="help-block"></span>
                            </div>
                            <div class="col-md-3">
                             <select name="acl_view_permission" id="acl_view_permission" class="form-control">
                              <option value="Y">Yes</option>
                              <option value="N">No</option>
                            </select>
                        
                              <span class="help-block" id="error_message"></span>
                            </div>

                            <div class="col-md-3">
                             <select name="acl_update_permission" id="acl_update_permission" class="form-control">
                              <option value="Y">Yes</option>
                              <option value="N">No</option>
                            </select>
                             
                              <span class="help-block"></span>
                            </div>

                            <div class="col-md-3">
                             <select name="acl_delete_permission" id="acl_delete_permission" class="form-control">
                              <option value="Y">Yes</option>
                              <option value="N">No</option>
                            </select>
                           
                              <span class="help-block"></span>
                            </div>

                            
                        </div>
                        </center>
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
