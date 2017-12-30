<?php 
   /* $list = $this->common_model->get_by_column_where('client_column_property','id, column_name as name','column_property_id = 2','array');*/
 $statutary_dropdown      = $this->common_model->get_by_custom_where('property_view','property_dropdown','column_value = "Yes_no"','KEY');

    //$statutary_dropdown = $this->company_model->build_dropdown('Yes_no');
?>
<div class="modal fade" id="account_format_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" id="close_btn" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Acount Format</h4>
        </div>
        <div class="modal-body">
          
             <form action="" id="account_format_form" class="form-horizontal">

                    <input type="hidden" placeholder="id" value="" name="account_format_id" id="account_format_id"/> 
                    <input type="hidden" value="" name="account_format_branch_id" id="account_format_branch_id"/>
                    <input type="hidden" value="" name="account_format_statutary_id" id="account_format_statutary_id"/>
               
                    <div class="form-body">
                        <div class="form-group"> 
                            <label class="control-label col-md-1">Name</label>
                              <div class="col-md-5">
                              <input type="text" id="account_format_name" name="account_format_name" placeholder="Name" class="form-control">
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