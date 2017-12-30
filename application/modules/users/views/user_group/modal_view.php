<div class="modal fade" id="user_group_modal" role="dialog">
    <div class="modal-dialog modal-sm">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" id="close_btn" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">User Group</h4>
        </div>
        <div class="modal-body">
          
        	 <form action="" id="user_group_form" class="form-horizontal">

                    <input type="hidden" value="" name="user_group_id" id="user_group_id"/> 
                    <input type="hidden" value="1" placeholder="company_id" name="user_group_company_id" id="user_group_company_id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Name</label>
                            <div class="col-md-8">
                              <input name="user_group_name" id="user_group_name" class="form-control" type="text">
                              <span class="help-block"></span>
                        	</div>
                        </div>
                        <div class="form-group">
                        	 <label class="control-label col-md-5">User Status</label>
                            <div class="col-md-6">
                             <?php echo form_dropdown('user_group_status_id',$status_dropdown,'',array('style'=>'width:100%','class'=>'form-control','id'=>'user_group_status_id')); ?>
                            
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
