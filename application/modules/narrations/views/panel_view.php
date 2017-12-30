<?php 
//$voucher_type_dropdown = $this->common_model->get_by_column('voucher_type','id, name','key');

?>
	<br>
   <!-- <input type="hidden" id="director_details_id" name="director_details_id"> -->

     	<div class="panel panel-primary">
        <div class="panel-heading">Details</div>
          <div class="panel-body">
            <form action="" id="narration_form" class="form-horizontal">
                              
                 <div class="form-body">
                  <input type="hidden" placeholder="id" name="narration_id" id="narration_id"/>                 
                  <input type="hidden" placeholder="branch id" name="narration_branch_id" id="narration_branch_id"/>
                    <div class="form-group">
                       <label class="control-label col-md-1">Voucher</label>
                    </div>
                    <div class="form-group">
                      <div class="col-md-12">
                     <?php echo form_dropdown('narration_voucher_type_id',$voucher_type_dropdown,'',array('style'=>'width:100%','class'=>'form-control','id'=>'narration_voucher_type_id')); ?>
                     
                        <span class="help-block"></span>
                      </div>
                    </div>
                    <div class="form-group">       
                        <label class="control-label col-md-1">Description</label>
                    </div>
                    <div class="form-group">       
                        <div class="col-md-11">
                          <textarea type="text" class="form-control" id="narration_description" 
                          name="narration_description" rows="4" cols="50" value=""></textarea>
                        </div> 
                            
                    </div>
                       
                 </div>
              <?php  if(($update_permission == 'Y')) {?> 
             <div class="col-md-1">
                <input type="button" id="button_save_panel" class="btn btn-primary" value="Save" 
                  data-toggle="tooltip" title="Save">
              </div>
                    <input type="button" class="btn btn-warning" value="Close">
            <?php } ?>
    
             </form>
            </div>

         </div>
     