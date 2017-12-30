
<?php
/*$list = $this->common_model->get_by_column_where('client_column_property','id,Company_type_id column_name as name','column_property_id = 15','array');*/
$company_type_dropdown = $this->common_model->get_by_custom_where('property_view','property_dropdown','column_value = "Company_type_id"','KEY');

  //$company_type_dropdown = $this->model->build_dropdown('Company_type_id'); 
?>
<div class="modal fade" id="company_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" id="close_btn" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo $header; ?></h4>
        </div>
        <div class="modal-body">
          
        	 <form action="" id="company_form" class="form-horizontal">

                    <input type="hidden" value="" name="company_id" id="company_id"/> 
                    <div class="form-body">
                        <div class="form-group">
                        	 <label class="control-label col-md-3">Company Name</label>
                            <div class="col-md-4">
                              <input name="company_name" id="company_name" placeholder="Company Name" class="form-control" type="text">
                              <span class="help-block"></span>
                           </div>
                            <label class="control-label col-md-3">No Of Branch</label>
                            <div class="col-md-2">
                              <input name="company_no_of_branch" id="company_no_of_branch" placeholder="Branch" class="form-control" type="text">
                              <span class="help-block"></span>
                            </div>
                        </div>
                         <div class="form-group">
                           <label class="control-label col-md-2">Address</label>
                            <div class="col-md-3">
                              <input name="company_address1" id="company_address1" placeholder="Address" class="form-control" type="text">
                              <span class="help-block"></span>
                           </div>
                            <div class="col-md-3">
                              <input name="company_address2" id="company_address2" placeholder="Address" class="form-control" type="text">
                              <span class="help-block"></span>
                            </div>
                            <div class="col-md-3">
                              <input name="company_address3" id="company_address3" placeholder="Address" class="form-control" type="text">
                            </div>
                              <span class="help-block"></span>
                            </div>
                          <div class="form-group">
                           <label class="control-label col-md-3">Company Type</label>
                            <div class="col-md-3">
                             <?php echo form_dropdown('company_company_type_id',$company_type_dropdown,'',array('class'=>'form-control','id'=>'company_company_type_id')); ?>
                            
                           </div>
                            <label class="control-label col-md-3">Start Date</label>
                            <div class="col-md-3">
                              <input name="company_start_date" id="company_start_date" placeholder="Date" class="form-control datepicker" type="text">
                              <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">End Date</label>
                            <div class="col-md-3">
                              <input name="company_end_date" id="company_end_date" placeholder="Date" class="form-control datepicker" type="text">
                              <span class="help-block"></span>
                            </div>
                        </div>
                        </div>
                  <div class="col-md-2">
              			<input type="button" id="button_save_modal" class="btn btn-primary" value="Save" 
              			data-toggle="tooltip" title="Save">
                  </div>
              			<input type="button" class="btn btn-warning" value="Close" data-dismiss="modal">
    
             </form>
        </div>
        
      </div>
      
   	 </div>
  </div>