<div class="modal fade" id="acl_group_permission_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" id="close_btn" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Group Permission</h4>
        </div>
        <div class="col-md-12" id="alert_box">
         
        </div>
 
        <div class="modal-body">
          <?php echo validation_errors(); ?>
           <form action="" id="acl_group_permission_form" class="form-horizontal">

                    <input type="hidden" value="" name="acl_group_permission_id" id="acl_group_permission_id"/> 
                    <input type="hidden" value="" name="acl_group_permission_branch_id" id="acl_group_permission_branch_id"/> 
    
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-2">User group</label>
                            <div class="col-md-4">
                             <?php echo form_dropdown('acl_group_permission_user_group_id',$user_group_dropdown,'',array('style'=>'width:100%','class'=>'form-control','id'=>'acl_group_permission_user_group_id')); ?>
                              <span class="help-block" id="error_message"></span>
                            </div>
                            <label class="control-label col-md-1">Acl</label>
                            <div class="col-md-4">
                             <?php echo form_dropdown('acl_group_permission_acl_id',$acl_dropdown,'',
                             array('style'=>'width:100%','class'=>'form-control','id'=>'acl_group_permission_acl_id')); ?>
                              
                              <span class="help-block" id="error_message"></span>
                         
                            </div>
                             
                        </div>
                        <center><b>Permission</b></center>
                         <div class="form-group">
                             <label class="control-label col-md-2">Create</label>
                            <label class="control-label col-md-3">View</label>
                            <label class="control-label col-md-3">Update</label>

                            <label class="control-label col-md-3">Delete</label>

                            
                           
                          </div>

                          <div class="form-group">
                            <div class="col-md-3">
                              <select name="acl_group_permission_create_permission" id="acl_group_permission_create_permission" class="form-control">
                              <option value="Y">Yes</option>
                              <option value="N">No</option>
                            </select>
                             
                              <span class="help-block"></span>
                            </div>
                            <div class="col-md-3">
                              <select name="acl_group_permission_view_permission" id="acl_group_permission_view_permission" class="form-control">
                              <option value="Y">Yes</option>
                              <option value="N">No</option>
                            </select>
                             
                              <span class="help-block"></span>
                            </div>

                            <div class="col-md-3">
                            <select name="acl_group_permission_update_permission" id="acl_group_permission_update_permission" class="form-control">
                              <option value="Y">Yes</option>
                              <option value="N">No</option>
                            </select>
                            <span class="help-block"></span>
                            </div>

                             <div class="col-md-3">
                            <select name="acl_group_permission_delete_permission" id="acl_group_permission_delete_permission" class="form-control">
                              <option value="Y">Yes</option>
                              <option value="N">No</option>
                            </select>
                           
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
