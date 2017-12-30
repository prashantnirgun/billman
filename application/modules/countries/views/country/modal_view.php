
<div class="modal fade" id="country_modal" role="dialog">
  <div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" id="close_btn" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Country</h4>
    </div>

    <div class="modal-body">
      <?php echo validation_errors(); ?>
       <form action="" id="country_form" class="form-horizontal">
      
        <input type="hidden" value="" name="country_id" id="country_id"/> 
        
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-4">Name</label>
              <div class="col-md-7">
                <input name="country_name" id="country_name" placeholder="Country Name" class="form-control" type="text">
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