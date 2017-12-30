<?php
    $status_dropdown = $this->common_model->get_by_custom_where('property_view','property_dropdown','column_value = "User_status"','KEY');
    $user_group_dropdown = $this->common_model->get_by_column('user_group','id,name','KEY');
?>
        <div id="user_details_area"><br>
            <div class="panel panel-primary">
            <div class="panel-heading">User</div>
              <div class="panel-body">
            <form action="#" id="user_form" class="form-horizontal" method="POST">
             <input type="hidden" placeholder="id" name="user_id" id="user_id" value="" /> 
             <input type="hidden" placeholder="company_id" name="user_company_id" id="user_company_id" value="" /> 
             <input type="hidden" placeholder="login_attempt" name="user_login_attempt" id="user_login_attempt" value="" /> 
             <input type="hidden" placeholder="otp" name="user_otp" id="user_otp" value="" /> 
             <input type="hidden" placeholder="otp_expiry" name="user_otp_expiry" id="user_otp_expiry" value="" /> 
             <input type="hidden" placeholder="token" name="user_token" id="user_token" value="" /> 
             <input type="hidden" placeholder="token_expiry" name="user_token_expiry" id="user_token_expiry" value="" /> 
             <input name="user_password" id="user_password" placeholder="new Password" class="form-control" type="hidden">
            
                 <div class="form-body">
                        <div class="form-group">
                         
                            <label class="control-label col-md-1">Status</label>
                            <div class="col-md-2">
                             <?php echo form_dropdown('user_user_status_id',$status_dropdown,'',array('style'=>'width:100%','class'=>'form-control','id'=>'user_user_status_id')); ?>
                              <span class="help-block"></span>
                           </div>
                             <label class="control-label col-md-1">Group</label>
                            <div class="col-md-2">
                             <!-- <input name="user_user_group_id" id="user_user_group_id" placeholder="Mobile" class="form-control" type="text"> -->
                              <?php  echo form_dropdown('user_user_group_id',$user_group_dropdown,'',array('style'=>'width:100%','class'=>'form-control','id'=>'user_user_group_id')); ?>
                              <span class="help-block"></span>
                           </div>
                            
                           <label class="control-label col-md-1">Mobile</label>
                            <div class="col-md-2">
                              <input name="user_mobile" id="user_mobile" placeholder="Mobile" class="form-control" type="text">
                           </div>
                        </div>
                        <div class="form-group">
                         <label class="control-label col-md-1">Name</label>
                            <div class="col-md-2">
                              <input name="user_name" id="user_name" placeholder="Username" class="form-control" type="text">
                              <span class="help-block"></span>
                           </div>
                          
                           
                            <label class="control-label col-md-1">Email</label>
                            <div class="col-md-3">
                              <input name="user_email_id" id="user_email_id" placeholder="Email" class="form-control" type="text">
                           </div>
                          <!--  <label class="control-label col-md-1"> Password</label>-->
                            <div class="col-md-2">
                              <input name="user_password" id="user_password" placeholder="new Password" class="form-control" type="hidden">
                              <span class="help-block"></span>
                           </div>
                          
                            
                        </div>
                          
                        </div>
    
                 <?php  if(($update_permission == 'Y')) {?>
                    <input type="submit" class="btn btn-primary" value="Save" 
                     data-toggle="tooltip" title="Save" id="button_save_panel">
                    <input type="reset" class="btn btn-warning" value="Reset">   
                  <?php }?>
             </form>
            </div>
             </div>
        </div>