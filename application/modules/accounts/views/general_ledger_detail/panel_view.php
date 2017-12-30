<?php

/*$list = $this->common_model->get_by_column_where('client_column_property','id, column_name as name','column_property_id = 15','array');
  $branch_type_dropdown      = $this->common_model->data_dropown($list);*/
$company_type_dropdown = $this->common_model->get_by_custom_where('property_view','property_dropdown','column_value = "Company_type_id"','KEY');



?>   
<div class="panel panel-primary">
  <div class="panel-heading">General Detail</div>
      <div class="panel-body">
            <form action="" id="general_ledger_detail_form" class="form-horizontal" >
        
             <input type="hidden" placeholder="general_ledger_detail_general_ledger_id" name="general_ledger_detail_general_ledger_id" id="general_ledger_detail_general_ledger_id"/> 
                    <div class="form-body"> 
                       <div class="form-group">
                            
                             <label class="control-label col-md-2">Contact Name</label>                         
                            <div class="col-md-2">
                              <input type="text" class="form-control" id="general_ledger_detail_contact_person_name" name="general_ledger_detail_contact_person_name" placeholder="Person name" >
                              <span class="help-block"></span>
                            </div>
                              <label class="control-label col-md-1">Email</label>
                            <div class="col-md-3">
                            <input type="text" class="form-control" id="general_ledger_detail_email" name="general_ledger_detail_email" placeholder="Email">
                              <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-1">Telephone</label>
                            <div class="col-md-3">
                               <input type="text" class="form-control" id="general_ledger_detail_telephone1" name="general_ledger_detail_telephone1" placeholder="Telephone_1">
                              <span class="help-block"></span>
                            </div>             
                            <div class="col-md-2">
                              <input type="text" class="form-control" id="general_ledger_detail_telephone2" name="general_ledger_detail_telephone2" placeholder="Telephone_2">
                              <span class="help-block"></span>
                            </div>
                              <label class="control-label col-md-2">Branch Type</label>
                            <div class="col-md-2">                            
                            <?php echo form_dropdown('general_ledger_detail_branch_type_id',$company_type_dropdown,'<?php echo $general_ledger_id;?>',array('style'=>'width:100%','class'=>'form-control','id'=>'general_ledger_detail_branch_type_id')); ?>
                            
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-1">Address</label>
                            <div class="col-md-3">
                               <input type="text" class="form-control" id="general_ledger_detail_address1" name="general_ledger_detail_address1" placeholder="address1">
                              <span class="help-block"></span>
                            </div>             
                            <div class="col-md-3">
                              <input type="text" class="form-control" id="general_ledger_detail_address2" name="general_ledger_detail_address2" placeholder="address2">
                              <span class="help-block"></span>
                            </div>
                            <div class="col-md-3">
                            <input type="text" class="form-control" id="general_ledger_detail_address3" name="general_ledger_detail_address3" placeholder="address3">
                              <span class="help-block"></span>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-md-1">Remarks</label>
                            <div class="col-md-11">
                               <input type="text" class="form-control" id="general_ledger_detail_remarks" name="general_ledger_detail_remarks" placeholder="remarks">
                              <span class="help-block"></span>
                            </div>           
                          </div>
                     </div>
               <?php  if(($update_permission == 'Y')) {?>
                <input type="button" id="button_save_panel" class="btn btn-primary" value="Save">
                <input type="reset" class="btn btn-warning" value="Reset">
              <?php }?>
             </form>
    </div>

         </div>