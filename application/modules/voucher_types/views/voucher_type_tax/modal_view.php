
<?php

  $tax_rate_dropdown = $this->common_model->get_by_column('tax_rate','id, tax_rate_name','key');
  
?>
<div class="modal fade" id="voucher_type_tax_modal" role="dialog">
    <div class="modal-dialog ">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" id="voucher_type_tax_close_btn" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Voucher Type Tax</h4>
        </div>
        <div class="modal-body">
          
        	 <form action="" id="voucher_type_tax_form" class="form-horizontal">

                    <input type="hidden" placeholder="" name="voucher_type_tax_id" id="voucher_type_tax_id"/> 
                     <input type="hidden" value="" placeholder="voucher" name="voucher_type_tax_voucher_type_id" id="voucher_type_tax_voucher_type_id"/> 
                   
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-2">Tax rate</label>
                            <div class="col-md-4">
                              <?php echo form_dropdown('voucher_type_tax_tax_rate_id',
                              $tax_rate_dropdown,'',array('style'=>'width:100%','class'=>'form-control','id'=>'voucher_type_tax_tax_rate_id')); ?>
                              <span class="help-block"></span> 
                            </div>
                             <label class="control-label col-md-2">Date</label>
                            <div class="col-md-4">
                            <input  name="voucher_type_tax_wef_date" id="voucher_type_tax_wef_date" placeholder="Date" class="form-control datepicker">
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
