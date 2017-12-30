 
<?php 
$statutary_dropdown   = $this->common_model->get_by_custom_where('property_view','property_dropdown','column_value = "Yes_no"','KEY'); 

?>
 <div class="account_details_area">
        <div class="panel panel-primary">
        <div class="panel-heading">Detail</div>
          <div class="panel-body">
            <form action="" id="account_group_form" class="form-horizontal" >
             <input type="hidden" placeholder="id" name="account_group_id" id="account_group_id"/> 
                 <input name="account_group_branch_id" id="account_group_branch_id" placeholder="Branch" class="form-control" type="hidden">
                 <input name="account_group_statutary_id" id="account_group_statutary_id" placeholder="account_group_statutary_id" class="form-control" type="hidden">
                    <div class="form-body"> 
                       <div class="form-group">
                            <label class="control-label col-md-1">Name</label>
                            <div class="col-md-2">
                              <input name="account_group_name" id="account_group_name" placeholder="Group Name" class="form-control" type="text">
                          
                              <span class="help-block"></span>
                            </div>
                             <label class="control-label col-md-1">Herarcy</label>
                            <div class="col-md-2">
                              <select name="account_group_herarcy" id="account_group_herarcy" class="form-control">
                                <option value="1">1</option> <option value="2">2</option>  <option value="3">3</option> <option value="4">4</option> <option value="5">5</option> <option value="6">6</option>
                                <option value="7">7</option> <option value="8">8</option> <option value="9">9</option> <option value="10">10</option> <option value="11">11</option> <option value="12">12</option>
                                 <option value="13">13</option> <option value="14">14</option> <option value="15">15</option>
                              </select>
                              <span class="help-block"></span>
                            </div>

                              <label class="control-label col-md-1">Head</label>
                            <div class="col-md-2">
                              <?php echo form_dropdown('account_group_account_head_id',$account_head_dropdown,'',array('style'=>'width:100%','class'=>'form-control','id'=>'account_group_account_head_id')); ?>
                              <span class="help-block"></span>
                            </div>
                             
                        </div>
                     </div>
               <?php  if(($update_permission == 'Y')) {?>
                <div class="col-md-1">
                <input type="button" id="button_save_panel" class="btn btn-primary" value="Save">
                </div>
                <input type="button" class="btn btn-warning" value="Close" >
              <?php }?>
             </form>
            </div>

         </div>
    </div>