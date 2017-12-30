
<?php
/*$list = $this->common_model->get_by_column_where('client_column_property','id, column_name as name','column_property_id = 15','array');*/
  $type_dropdown = $this->common_model->get_by_custom_where('property_view','property_dropdown','column_value = "Company_type_id"','KEY');

  //$type_dropdown = $this->model->build_dropdown('Member'); 
?>
<div class="modal fade" id="branch_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" id="close_btn" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Branch</h4>
        </div>
        <div class="modal-body">
          
           <form action="" id="branch_form" class="form-horizontal">

                    <input type="hidden" value="" name="branch_id" id="branch_id"/> 
                     <input type="hidden" name="branch_company_id" id="branch_company_id" placeholder="Branch" class="form-control" >
                    <div class="form-body">
                        <div class="form-group">
                           
                            <label class="control-label col-md-2">Manager</label>
                            <div class="col-md-3">
                              <input name="branch_manager" id="branch_manager" placeholder="Manager" class="form-control" type="text">
                              <span class="help-block"></span>
                            </div>
                             <label class="control-label col-md-3">Type</label>
                            <div class="col-md-3">
                             <?php echo form_dropdown('branch_type_id',$type_dropdown,'',array('class'=>'form-control','id'=>'branch_type_id')); ?>
                              
                            </div>
                        </div>
                         <div class="form-group">
                           <label class="control-label col-md-3">Address</label>
                            <div class="col-md-3">
                              <input name="branch_address1" id="branch_address1" placeholder="Address" class="form-control" type="text">
                           </div>
                            <div class="col-md-3">
                              <input name="branch_address2" id="branch_address2" placeholder="Address" class="form-control" type="text">
                           </div>
                            <div class="col-md-3">
                              <input name="branch_address3" id="branch_address3" placeholder="Address" class="form-control" type="text">
                           </div>
                              <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                           <label class="control-label col-md-3">Telephone No</label>
                            <div class="col-md-3">
                              <input name="branch_telephone_no" id="branch_telephone_no" placeholder="Telephone" class="form-control" type="text">
                           </div>
                            <label class="control-label col-md-3">Email ID</label>
                            <div class="col-md-3">
                              <input name="branch_email_id" id="branch_email_id" placeholder="Email" class="form-control" type="text">
                              <span class="help-block"></span>
                            </div>
                          </div>
                       
                        </div>

                <input type="button" id="button_save_modal" class="btn btn-primary" value="Save" 
                data-toggle="tooltip" title="Save">
                <input type="reset" class="btn btn-warning" value="Reset">
    
             </form>
        </div>
        
      </div>
      
     </div>
  </div>


