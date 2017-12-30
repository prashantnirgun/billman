<br>
       <div class="panel panel-primary">
        <div class="panel-heading">Detail</div>
          <div class="panel-body">
            <form action="" id="meeting_form" class="form-horizontal" method="POST">
             <input type="hidden" placeholder="id" name="meeting_id" id="meeting_id"/> 
             <input type="hidden" value="1" placeholder="archive_id" name="meeting_archive_id" id="meeting_archive_id"/> 
            
                    <div class="form-body"> 
                       <div class="form-group">
                            <label class="control-label col-md-2">Meeting Date</label>
                            <div class="col-md-3">
                              <input name="meeting_meeting_date" id="meeting_meeting_date" placeholder="Date" class="form-control datepicker" type="text">
                              <span class="help-block"></span>
                            </div>
                             <label class="control-label col-md-1">Remark</label>
                            <div class="col-md-6"> 
                              <input name="meeting_remark" id="meeting_remark" placeholder="Remark" class="form-control" type="text">
                              <span class="help-block"></span>
                            </div>
                        </div>
                     </div>
                 <?php  if(($permission[0]->update_permission == 'Y') OR ($permission[0]->delete_permission == 'Y')) {?> 
                 <div class="col-md-1">
                <input type="button" id="button_save_panel" class="btn btn-primary" value="Save">
                </div>
                <input type="button" class="btn btn-warning" value="Close" >
              <?php } ?>
             </form>
            </div>

         </div>