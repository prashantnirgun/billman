
        <div id="user_details_area"><br>
            <div class="panel panel-primary">
            <div class="panel-heading">Change Password</div>
              <div class="panel-body">
            <form action="#" id="user_form" class="form-horizontal" method="POST">
             <input type="hidden" placeholder="id" name="user_id" id="user_id_change" value="" /> 
             
                 <div class="form-body">
                       
                        <div class="form-group">
                         
                           <label class="control-label col-md-2">New Password</label>
                            <div class="col-md-2">
                              <input name="user_new_password" id="user_new_password" placeholder="new Password" class="form-control" type="password">
                              <span class="help-block"></span>
                           </div>
                           
                            <label class="control-label col-md-2">Confirmed Password</label>
                            <div class="col-md-3">
                              <input name="user_confirmed_password" id="user_confirmed_password" placeholder="confirmed password" class="form-control" type="password">
                           </div>
                          
                           
                        </div>
                          
                        </div>
    
                 <?php  if(($update_permission == 'Y')) {?>
                    <input type="submit" class="btn btn-primary" value="OK" 
                     data-toggle="tooltip" title="Change Password" id="button_change_password">
                    <input type="reset" class="btn btn-warning" value="Reset">   
                <?php }?>
             </form>
            </div>
             </div>
        </div>