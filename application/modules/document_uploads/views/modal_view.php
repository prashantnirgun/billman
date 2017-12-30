
<div class="modal fade" id="document_list_modal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" id="document_list_close_btn" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Document Lists</h4>
        </div>
        <div class="modal-body">

             <form  id="document_list_form" class="form-horizontal" action="javascript:void(0);" method="POST" enctype="multipart/form-data">

                    <input type="hidden" placeholder="id" value="" name="document_list_id" id="document_list_id"/>
                     <input type="hidden" placeholder="table name" value="" name="document_list_table_name" id="document_list_table_name"/>
                    <input type="hidden" id="document_list_archive_id" name="document_list_archive_id" class="form-control">
                     <input type="hidden" id="document_list_image_file_name" name="document_list_image_file_name">
                     <input type="hidden" id="document_list_voucher_id" name="document_list_voucher_id" placeholder="Voucher" class="form-control">
                      <div class="form-body">
                       
                       <div class="form-group">
                            <label class="control-label col-md-3 text-danger">Document Name</label>
                            <div class="col-md-6">
                            <input type="text" id="document_list_document_name" name="document_list_document_name" placeholder="Document Name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                         <label class="control-label col-md-3">Upload File</label>
                            <div class="col-md-3">
                               <input type="file" name="userfile" size="10" />
                                <span class="help-block"></span>
                            </div>
                        </div>


                    </div>

                  <div class="col-md-2">
                    <input type="submit" id="upload_save_button" class="btn btn-primary" value="Save" data-toggle="tooltip" title="Save">
                  </div>
                    <input type="reset" class="btn btn-warning" value="Reset">
             </form>

        </div>

      </div>

     </div>
  </div>
