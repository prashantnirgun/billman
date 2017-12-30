
  
            <form action="#" id="user_form" class="form-horizontal" method="POST">
             <input type="hidden" placeholder="id" name="user_id" id="user_id" value="<?php echo $this->session->userdata('user_id');?>" /> 
             
                 <div class="form-body">
                       
                        <div class="form-group">
                         <label class="control-label col-md-1">Old </label>
                            <div class="col-md-3">
                              <input name="user_old_password" id="user_old_password" placeholder="Old password" class="form-control" type="password">
                              <span class="help-block"></span>
                           </div>
                          </div>
                        <div class="form-group">
                           <label class="control-label col-md-1">New </label>
                            <div class="col-md-3">
                              <input name="user_new_password" id="user_new_password" placeholder="New Password" class="form-control" type="password">
                              <span class="help-block" id="new_password_msg"></span>
                           </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-1">Confirmed </label>
                            <div class="col-md-3">
                              <input name="user_confirmed_password" id="user_confirmed_password" placeholder="Confirmed password" class="form-control" type="password">
                              <span class="help-block" id="confirmed_password_msg"></span>
                           </div>
                          
                           
                        </div>
                          
                        </div>
                
                    <input type="submit" class="btn btn-primary" value="OK" 
                     data-toggle="tooltip" title="Change Password" id="button_change_password">
                    <input type="reset" class="btn btn-warning" value="Reset">   
             </form>
            