
<?php
 //$general_ledger_dropdown = array();
 //$member_dropdown = array();
/*
    $this->load->model('accounts/General_ledger_model','general_ledger_model');
    $this->load->model('Narrations/narration_model','narration_model');
    $general_ledger_dropdown = array();
   $narration_dropdown = $this->narration_model->get_dropdown();
   $member_dropdown = $this->member_model->get_dropdown();
*/   
?>

  <div  id="voucher_panel">
   <div class="panel panel-primary">
        <div class="panel-heading">Voucher</div>
          <div class="panel-body">
          <input type="text" placeholder="id" name="action_voucher" id="action_voucher" value="R" />
             <form action="" id="voucher_form" class="form-horizontal" method="POST">

                    <input type="text" placeholder="id" name="voucher_id" id="voucher_id" value="" />

                    <input type="text"  name="voucher_branch_id" id="voucher_branch_id"  value=""/>
                    <input type="text" name="voucher_voucher_type_id" id="voucher_voucher_type_id"  value=""/>
                    <input type="text" name="voucher_batch_detail_status_id" id="voucher_batch_detail_status_id" placeholder="status" value="" />
                    <input type="text" name="voucher_casher_id" id="voucher_casher_id" placeholder="Casher" value="" />
                    <input type="text" value="" name="voucher_officer_id" id="voucher_officer_id" placeholder="Officer"/>
                    <input type="text" value="" name="voucher_archive_id" id="voucher_archive_id" placeholder="archive_id"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-1">No</label>
                              <div class="col-md-2">
                              <input type="text" id="voucher_receipt_no" name="voucher_receipt_no" placeholder="Receipt No" class="form-control"  value="" >
                              <span class="help-block"></span>
                            </div>
                             <label class="control-label col-md-1">Date</label>
                            <div class="col-md-2">
                               <input type="text" id="voucher_receipt_date" name="voucher_receipt_date" placeholder="Date" class="form-control datepicker" value="">
                                <span class="help-block"></span>
                            </div>
                             <div class="col-md-3" id="voucher_gl_dropdown">
                          <?php echo form_dropdown('voucher_genaral_ledger_id',$general_ledger_dropdown,'',array('style' => 'width: 100%','class'=>'form-control','id'=>'voucher_genaral_ledger_id')); ?>
                          <span class="help-block"></span>
                          </div>
                          <div class="col-md-3" id="voucher_member_dropdown">
                            <?php 
                                $member_dropdown[0] = 'Select Member';
                                ksort($member_dropdown);
                            echo form_dropdown('voucher_member_id',$member_dropdown,'',array('style' => 'width: 100%','class'=>'form-control myClass','id'=>'voucher_member_id')); ?>
                            <span class="help-block"></span>
                            </div>

                        </div>
                    </div>
                  <?php $this->load->view('voucher_detail/tab_view');?>

                   <div class="form-group">
                         <div class="col-md-12">
                          <textarea name="voucher_narration" id="voucher_narration" class="form-control" rows="2" placeholder="narration" value=""></textarea>
                          <span class="help-block"></span>
                         </div>
                        </div>
                       <div class="form-group">
                        <div class="col-md-12" id="narration_voucher_dropdown">
                          <?php $narration_dropdown[0]       = 'Select Any';
                                     ksort($narration_dropdown);
                            echo form_dropdown('narration_dropdown',$narration_dropdown,'',array('style' => 'width: 100%','class'=>'form-control','id'=>'narration_dropdown')); ?>
                          <span class="help-block"></span>
                          </div>
                      </div>
                           <label class="control-label col-md-2">Cheque No</label>
                            <div class="col-md-2">
                               <input type="text" id="voucher_cheque_no" name="voucher_cheque_no" placeholder="" class="form-control"  value="">
                                <span class="help-block"></span>
                            </div>

                            <label class="control-label col-md-2">Cheque Date</label>
                            <div class="col-md-2">
                               <input type="text" id="voucher_cheque_date" name="voucher_cheque_date" class="form-control datepicker" value="">
                                <span class="help-block"></span>
                            </div>

                            <label class="control-label col-md-2">Cheque Amount</label>
                            <div class="col-md-2">
                               <input type="text" id="voucher_cheque_amount" name="voucher_cheque_amount" placeholder="" class="form-control" value="" style="text-align:right;">
                                <span class="help-block"></span>
                            </div>
                    <div class="col-md-1">
                    <input type="button" name="button_save_panel" id="button_save_panel" class="btn btn-primary" value="Save"
                     data-toggle="tooltip" title="Save">
                    </div>
                    <input type="button" class="btn btn-warning" value="Reset" onclick="">

             </form>
            </div>

         </div>
      </div>
