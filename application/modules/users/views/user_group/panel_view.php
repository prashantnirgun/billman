<?php $this->load->model('User_group_model','user_group_model');
        $this->load->model('companys/Company_model','company_model');
$status_dropdown = $this->company_model->build_dropdown('Member');
    $user_group_dropdown = $this->user_group_model->get_dropdown();
   var_dump(json_decode($user_result));

    ?>
        
            <form action="#" id="user_form" class="form-horizontal" method="POST">
             <input type="text" placeholder="id" name="user_id" id="user_id" value="<?php echo $user_result[0]->id;?>" /> 
             <input type="text" placeholder="company_id" name="user_company_id" id="user_company_id" value="<?php echo $user_result[0]->company_id;?>" /> 
          
            
                 <div class="form-body">
                        <div class="form-group">
                         
                            <label class="control-label col-md-1">Status</label>
                            <div class="col-md-2">
                             <?php echo form_dropdown('user_user_status_id',$status_dropdown,$user_result[0]->user_status_id,array('style'=>'width:100%','class'=>'form-control','id'=>'user_user_status_id')); ?>
                              <span class="help-block"></span>
                           </div>
                             <label class="control-label col-md-1">Group</label>
                            <div class="col-md-2">

                              <?php  echo form_dropdown('user_user_group_id',$user_group_dropdown,$user_result[0]->user_group_id,array('style'=>'width:100%','class'=>'form-control','id'=>'user_user_group_id')); ?>
                              <span class="help-block"></span>
                           </div>
                            
                           <label class="control-label col-md-1">Mobile</label>
                            <div class="col-md-3">
                              <input name="user_mobile" id="user_mobile" placeholder="Mobile" class="form-control" type="text" value="<?php echo $user_result[0]->mobile;?>">
                           </div>
                        </div>
                        <div class="form-group">
                         <label class="control-label col-md-1">Name</label>
                            <div class="col-md-3">
                              <input name="user_name" id="user_name" placeholder="Username" class="form-control" type="text"  value="<?php echo $user_result[0]->name;?>">
                              <span class="help-block"></span>
                           </div>
                          
                            <label class="control-label col-md-1">Password</label>
                            <div class="col-md-3">
                              <input name="user_password" id="user_password" placeholder="Password" class="form-control" type="password"  value="<?php echo $user_result[0]->password;?>">
                           </div>
                            <label class="control-label col-md-1">Email</label>
                            <div class="col-md-3"  >
                              <input name="user_email_id" id="user_email_id" placeholder="Email" class="form-control" type="text"  value="<?php echo $user_result[0]->email_id;?>">
                           </div>
                          
                           
                        </div>
                          
                        </div>  
                
                    <input type="submit" class="btn btn-primary" value="Save" 
                     data-toggle="tooltip" title="Save" id="button_save_panel">
                    <input type="reset" class="btn btn-warning" value="Reset">   
             </form>
        