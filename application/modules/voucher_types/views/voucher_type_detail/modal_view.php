
<?php

   $account_group_dropdown = $this->common_model->get_by_column('account_group','id, name','key');
  
?>
<div class="modal fade" id="voucher_type_detail_modal" role="dialog">
    <div class="modal-dialog modal-sm">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" id="voucher_detail_close_btn" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Voucher Details</h4>
        </div>
        <div class="modal-body">
          
        	 <form action="" id="voucher_type_detail_form" class="form-horizontal">

                    <input type="hidden" placeholder="" name="voucher_type_detail_id" id="voucher_type_detail_id"/> 
                     <input type="hidden" value="" placeholder="voucher" name="voucher_type_detail_voucher_type_id" id="voucher_type_detail_voucher_type_id"/> 
                     <input type="hidden" value="" placeholder="voucher_type_detail_statutary_id" name="voucher_type_detail_statutary_id" id="voucher_type_detail_statutary_id"/> 
                   
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-2">Name</label>
                            <div class="col-md-10">
                              <?php echo form_dropdown('voucher_type_detail_account_group_id',
                              $account_group_dropdown,'',array('style'=>'width:100%','class'=>'form-control','id'=>'voucher_type_detail_account_group_id')); ?>
                              <span class="help-block"></span> 
                            </div>     
                        </div>
                       
                    </div>
              <div class="col-md-4">
          			<input type="button" id="button_save_modal" class="btn btn-primary" value="Save">
              </div>
          			<input type="button" class="btn btn-warning" value="Close" data-dismiss="modal">
    
             </form>

        </div>
        
      </div>
      
   	 </div>
  </div>
