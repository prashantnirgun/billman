
<div class="modal fade" id="state_modal" role="dialog">
  <div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" id="close_btn" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">State</h4>
    </div>

    <div class="modal-body">
      <?php echo validation_errors(); ?>
       <form action="" id="state_form" class="form-horizontal">
      
        <input type="hidden" value="" name="state_id" id="state_id"/> 
        <input type="hidden" value="" name="state_country_id" id="state_country_id"/> 
        
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-1">Name</label>
              <div class="col-md-7">
                <input name="state_name" id="state_name" placeholder="State Name" class="form-control" type="text">
                <span class="help-block"></span>
              </div>
            </div>
          </div>
          <input type="button" id="button_save_modal" class="btn btn-primary" value="Save" 
              data-toggle="tooltip" title="Save">
          <input type="button" class="btn btn-warning" value="Close" data-dismiss="modal">
       </form>
    </div>
  
  </div>
 </div>
</div>