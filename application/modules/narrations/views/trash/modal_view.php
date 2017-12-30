<div class="modal fade" id="section_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" id="close_btn" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo $header; ?></h4>
        </div>
        <div class="modal-body">
          
        	 <form action="" id="section_form" class="form-horizontal" method="POST">

                    <input type="hidden" value="" name="section_id" id="section_id"/> 
                    <input type="hidden" value="" name="section_company_id" id="section_company_id" placeholder="Company ID"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Name</label>
                            <div class="col-md-4">
                              <input name="section_name" id="section_name" placeholder="Section Name" class="form-control" type="text">
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
