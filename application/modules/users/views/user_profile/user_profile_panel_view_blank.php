<?php 
//var_dump($result);
$user_id = $this->session->userdata('user_id');
//$gender_dropdown = $this->company_model->build_dropdown('Gender');
$gender_dropdown = $this->common_model->get_by_custom_where('property_view','property_dropdown','column_value = "Gender"','KEY');
//echo $resut->user_profile_email;
//echo $result['full_name'];
?>
            <form action="#" id="user_profile_form" class="form-horizontal" action="javascript:void(0);" method="POST" enctype="multipart/form-data">
             <input type="hidden" placeholder="id" name="user_profile_user_id" id="user_profile_user_id" value="<?php echo 
             $user_id;?>" />

                 <div class="form-body">
                  <div class="form-group">

                  <label class="control-label col-md-1">Name</label>
                            <div class="col-md-4">
                               <input name="user_profile_full_name" id="user_profile_full_name" placeholder="Mobile" class="form-control" type="text" value="">
                           </div>
                           <label class="control-label col-md-1">Email</label>
                            <div class="col-md-3">
                              <input name="user_profile_email" id="user_profile_email" placeholder="Username" class="form-control" type="text" value="">
                              <span class="help-block"></span>
                           </div>
                             <label class="control-label col-md-1">Gender</label>
                            <div class="col-md-2">
                                 <?php  echo form_dropdown('user_profile_gender_id',$gender_dropdown,'',array('style'=>'width:100%','class'=>'form-control','id'=>'user_profile_gender_id')); ?>
                              <span class="help-block"></span>
                           </div>

                            <label class="control-label col-md-1">Address</label>
                            <div class="col-md-4">
                              <input name="user_profile_address1" id="user_profile_address1" placeholder="address" class="form-control" type="text" value="">
                           </div>
                             <div class="col-md-4">
                              <input name="user_profile_address2" id="user_profile_address2" placeholder="address" class="form-control" type="text" value="">
                           </div>
                           <div class="col-md-3">
                              <input name="user_profile_address3" id="user_profile_address3" placeholder="address" class="form-control" type="text" value="">
                              <span class="help-block"></span>
                           </div>
                            <label class="control-label col-md-1">Contact</label>
                            <div class="col-md-3">
                              <input name="user_profile_contact_no" id="user_profile_contact_no" placeholder="Mobile" class="form-control" type="text" value="">
                           </div>
                           <!-- <div class="col-md-3">
                              <input name="user_profile_image_file_name" id="user_profile_image_file_name" placeholder="Password" class="form-control" type="text" value="<?php //echo $result['image_file_name'];?>">
                           </div> -->

                            <div class="col-md-4">
                               <input type="file" name="userfile" id="userfile" size="10" class="form-control" />
                                <span class="help-block"></span>
                            </div>
                </div>

                </div>
              <div class="col-md-2">
                    <input type="submit" class="btn btn-primary" value="Save"
                     data-toggle="tooltip" title="Save" id="upload_save_button">
              </div>
                    <input type="reset" class="btn btn-warning" value="Reset">

             </form>
