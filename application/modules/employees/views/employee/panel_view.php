
<?php
/*$list = $this->common_model->get_by_column_where('client_column_property','id, column_name as name','column_property_id = 3','array');*/
  $marital_status_dropdown = $this->common_model->get_by_custom_where('property_view','property_dropdown','column_value = "Martial"','KEY');
/*
$list = $this->common_model->get_by_column_where('client_column_property','id, column_name as name','column_property_id = 14','array');*/
  $employeement_type_dropdown = $this->common_model->get_by_custom_where('property_view','property_dropdown','column_value = "Employement_type"','KEY');

 /* $list = $this->common_model->get_by_column_where('client_column_property','id, column_name as name','column_property_id = 1','array');*/
  $gender_dropdown = $this->common_model->get_by_custom_where('property_view','property_dropdown','column_value = "Gender"','KEY');

  $user_dropdown = $this->common_model->get_by_column('user','id, name','KEY');
  


    //$marital_status_dropdown = $this->company_model->build_dropdown('Martial');
    //$employeement_type_dropdown = $this->company_model->build_dropdown('Employement_type');
    //$gender_dropdown = $this->company_model->build_dropdown('Gender');
    //$user_dropdown = $this->user_model->get_dropdown();
?>
<div class="panel panel-primary">
        <div class="panel-heading">Details</div>
          <div class="panel-body">
           <form action="" id="employee_form" class="form-horizontal">
                    <input type="hidden" value="" name="employee_id" id="employee_id"/> 
                    
                    
                    <div class="form-body">
                       <div class="form-group">
                           <label class="control-label col-md-1">Name</label>
                            <div class="col-md-3">
                              <input name="employee_name" id="employee_name" placeholder="Name" class="form-control" type="text">
                              <span class="help-block"></span> 
                            </div>    
                             <label class="control-label col-md-1">Email ID</label>
                            <div class="col-md-3">
                              <input name="employee_email_id" id="employee_email_id" placeholder="email Id" class="form-control" type="text">
                              <span class="help-block"></span>
                            </div>
                            <label class="control-label col-md-1">User</label>
                            <div class="col-md-3">
                             <?php echo form_dropdown('employee_user_id',$user_dropdown,'',array('class'=>'form-control','id'=>'employee_user_id','style' => 'width: 100%')); ?>
                              
                            </div> 
                          
                      </div>

                        <div class="form-group"> 
                        <label class="control-label col-md-2">Telephone No</label>
                              <div class="col-md-2">
                              <input name="employee_telephone_no1" id="employee_telephone_no1" placeholder="Telephone_1" class="form-control" type="text">
                              <span class="help-block"></span>
                              </div>
                              <div class="col-md-2">
                               <input name="employee_telephone_no2" id="employee_telephone_no2" placeholder="Telephone_2" class="form-control" type="text">
                              <span class="help-block"></span>
                            </div>
                          <label class="control-label col-md-1">Address</label>
                            <div class="col-md-3">
                              <input name="employee_address1" id="employee_address1" placeholder="Address_1" class="form-control" type="text">
                              <span class="help-block"></span>
                            </div>
                           
                        </div>   
                        <div class="form-group"> 
                         <label class="control-label col-md-1">Address</label>
                             <div class="col-md-3">
                              <input name="employee_address2" id="employee_address2" placeholder="Address_2" class="form-control" type="text">
                              <span class="help-block"></span>
                            </div> 
                            <label class="control-label col-md-2">Pancard No</label>
                            <div class="col-md-2">
                              <input name="employee_pancard_no" id="employee_pancard_no" style="text-transform:uppercase;" placeholder="Pancard No" class="form-control" type="text">
                              <span class="help-block"></span>
                            </div> 
                            <label class="control-label col-md-2">Birth Date</label>
                            <div class="col-md-2">
                              <input name="employee_birth_date" id="employee_birth_date" placeholder="birth_date" class="datepicker form-control" type="text">
                              <span class="help-block"></span>
                            </div> 
                        </div>
                        <div class="form-group"> 
                            <label class="control-label col-md-2">Marital Status</label>
                            <div class="col-md-2">
                             <?php echo form_dropdown('employee_marital_status_id',$marital_status_dropdown,'',array('class'=>'form-control','id'=>'employee_marital_status_id')); ?>
                           
                            </div> 
                            <label class="control-label col-md-1">Gender</label>
                            <div class="col-md-2">
                             <?php echo form_dropdown('employee_gender_id',$gender_dropdown,'',array('class'=>'form-control','id'=>'employee_gender_id')); ?>
                            
                            </div>
                            <label class="control-label col-md-3">Employeement Type</label>
                            <div class="col-md-2">
                             <?php echo form_dropdown('employee_employeement_type_id',$employeement_type_dropdown,'',array('class'=>'form-control','id'=>'employee_employeement_type_id')); ?>
                            
                            </div> 
                            
                        </div>
                    </div>
            <?php  if(($update_permission == 'Y') OR ($delete_permission == 'Y')) {?>          
              <div class="col-md-1">
                <input type="button" id="button_save_panel" class="btn btn-primary" value="Save">
              </div>
                <input type="button" class="btn btn-warning" value="Close">
            <?php }?>
             </form>
            </div>

         </div>
     