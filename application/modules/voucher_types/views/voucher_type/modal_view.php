
<?php
  
  $debit_credit_dropdown = $this->common_model->get_by_custom_where('property_view','property_dropdown','column_value = "Debit_credit"','KEY');

/*$list = $this->common_model->get_by_column_where('client_column_property','id, column_name as name','column_property_id = 17','array');*/
  $register_dropdown = $this->common_model->get_by_custom_where('property_view','property_dropdown','column_value = "Voucher_type"','KEY');

/*$list = $this->common_model->get_by_column_where('client_column_property','id, column_name as name','column_property_id = 2','array');
*/
$statutary_dropdown      = $this->common_model->get_by_custom_where('property_view','property_dropdown','column_value = "Yes_no"','KEY');


  /*
  $member_dropdown = $this->company_model->build_dropdown('Yes_no');
  $gl_dropdown = $this->company_model->build_dropdown('Yes_no');
  */
?>
<div class="modal fade" id="voucher_type_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" id="close_btn" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Voucher</h4>
        </div>
        <div class="modal-body">
            <?php echo validation_errors(); ?>
        	 <form action="" id="voucher_type_form" class="form-horizontal">
                    <input type="hidden" value="" name="voucher_type_id" id="voucher_type_id"/>  
                    <input type="hidden" value="" name="voucher_type_statutary_id" id="voucher_type_statutary_id"/>  
                    <input type="hidden" value="" name="voucher_type_company_id" id="voucher_type_company_id"/>  
                    <input type="hidden" placeholder="statutary ID" name="voucher_type_statutary_id" id="voucher_type_statutary_id" value="2"/>  
                   
                    <div class="form-body">
                    <div class="form-group">
                            <label class="control-label col-md-1">Name</label>
                            <div class="col-md-5">
                              <input  name="voucher_type_name" id="voucher_type_name" placeholder="Name" class="form-control">
                              <span class="help-block"></span>
                         
                            </div>
                           <label class="control-label col-md-1">Dr/Cr</label>
                            <div class="col-md-2">
                            <?php echo form_dropdown('voucher_type_debit_credit_id',$debit_credit_dropdown,'',array('style' => 'width: 100%','class'=>'form-control','id'=>'voucher_type_debit_credit_id')); ?> 
                             <span class="help-block"></span>
                            </div>

                            <div class="col-md-3">
                            <?php echo form_dropdown('voucher_type_register_id',$register_dropdown,'',array('style' => 'width: 100%','class'=>'form-control','id'=>'voucher_type_register_id')); ?> 
                             <span class="help-block"></span>
                            </div>
                             
                        </div>

                        <div class="form-group">
                          	<label class="control-label col-md-1">Prefix</label>
                            <div class="col-md-3">
                              <input name="voucher_type_prefix" id="voucher_type_prefix" placeholder="Prefix" class="form-control" type="text">
                              <span class="help-block"></span>
                         
                            </div>
                             <label class="control-label col-md-1">Suffix</label>
                            <div class="col-md-3">
                              <input name="voucher_type_suffix" id="voucher_type_suffix" placeholder="Suffix" class="form-control" type="text">
                              <span class="help-block"></span>
                         
                            </div>
                            <label class="control-label col-md-2">Start No</label>
                            <div class="col-md-2">
                              <input name="voucher_type_start_no" id="voucher_type_start_no" placeholder="No" class="form-control" type="text">
                              <span class="help-block"></span>
                            </div>
                             
                        </div>

                        <div class="form-group">
 
                             <label class="control-label col-md-2">Narration</label>
                            <div class="col-md-4">
                              <input name="voucher_type_narration" id="voucher_type_narration" placeholder="Narration" class="form-control" type="text">
                              <span class="help-block"></span>
                         
                            </div>
                             <label class="control-label col-md-2">ResetFrequency</label>
                            <div class="col-md-4">
                              <input name="voucher_type_reset_frequency_id" id="voucher_type_reset_frequency_id" placeholder="Narration" class="form-control" type="text">
                              <span class="help-block"></span>
                         
                            </div>
                             
                        </div>
                         <div class="form-group">
                             <label class="control-label col-md-2">Member</label>
                            <div class="col-md-4">
                               <?php echo form_dropdown('voucher_type_member_drop_down',$statutary_dropdown,'',array('style' => 'width: 100%','class'=>'form-control','id'=>'voucher_type_member_drop_down')); ?> 
                              <span class="help-block"></span>
                         
                            </div>
                             <label class="control-label col-md-2">Gl</label>
                            <div class="col-md-4">
                               <?php echo form_dropdown('voucher_type_gl_drop_down',$statutary_dropdown,'',array('style' => 'width: 100%','class'=>'form-control','id'=>'voucher_type_gl_drop_down')); ?> 
                              <span class="help-block"></span>
                            </div>
                        </div>
                       
                    </div>
              <div class="col-md-2">
          			<input type="button" id="button_save_modal" class="btn btn-primary" value="Save">
              </div>
          			<input type="button" class="btn btn-warning" value="Close" data-dismiss="modal">
              
    
             </form>

        </div>
        
      </div>
      
   	 </div>
  </div>