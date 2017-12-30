<?php 
   
    //$status_dropdown = $this->company_model->build_dropdown('Attendence');
  $status_dropdown = $this->common_model->get_by_custom_where('property_view','property_dropdown','column_value = "Attendence"','KEY');

?>
<div class="modal fade" id="attendence_modal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" id="close_btn" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
           <form action="" id="attendence_form" class="form-horizontal">

                    <input type="hidden" value="" name="attendence_id" id="attendence_id"/> 
                    <input type="hidden" value="" name="attendence_record_lock" id="attendence_record_lock"/> 
                 
                    <div class="form-body">
                        
                        <div class="form-group">
                           <label class="control-label col-md-1">Name</label>
                            <div class="col-md-5">
                              <?php echo form_dropdown('attendence_employee_id',$employee_dropdown,'',array('class'=>'form-control','id'=>'attendence_employee_id')); ?>
                               <span class="help-block"></span>
                           </div>
                           <label class="control-label col-md-2">Status</label>
                            <div class="col-md-3">
                             <?php echo form_dropdown('attendence_status_id',$status_dropdown,'',array('class'=>'form-control','id'=>'attendence_status_id')); ?>
                            
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-1">IN</label>
                            <div class="col-md-3">
                              <input name="attendence_check_in_time" id="attendence_check_in_time" placeholder="IN" class="form-control" type="text" readonly>
                              <span class="help-block"></span>
                            </div>
                           <label class="control-label col-md-1">Out</label>
                            <div class="col-md-3">
                              <input name="attendence_check_out_time" id="attendence_check_out_time" placeholder="OUT" class="form-control" type="text">
                           </div>  
                            <label class="control-label col-md-1">Date</label>
                            <div class="col-md-3">
                              <input name="attendence_present_date" id="attendence_present_date" placeholder="Date" class="form-control datepicker" type="text">
                           </div>   
                        </div>
                      <div class="form-group">
                        <label class="control-label col-md-1">Note</label>
                        <div class="col-md-11">
                          <input type="text" placeholder="Remark" class="form-control" name="attendence_remark" id="attendence_remark">
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