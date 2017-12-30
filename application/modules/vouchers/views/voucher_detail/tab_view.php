
<table class="table table-bordered table-striped table-condensed" id="VoucherDetailTable">
     <tr>
      <th class="col-md-1">#</th>
       <th>DC ID</th> 
       <th>General Ledger</th>
       <th>Debit</th>
       <th>Credit</th>
       <th>Loan ID</th>
       <th>Action
       </th>
       <th>CRUD</th>
       <th>Voucher ID</th>
       <th>ID</th>
       <th>GL D</th>
       <th>TR ID</th>
       
     </tr>
     
     <tr>
      <td>
     <input name="voucher_detail_sr_no" id="voucher_detail_sr_no" placeholder=" " class="form-control" type="text" readonly value="0"> 
     </td>
     <td width="12%";>
       <?php echo form_dropdown('voucher_detail_debit_credit_id',$debit_credit_dropdown,'',array('class'=>'form-control','id'=>'voucher_detail_debit_credit_id')); ?>

     </td>
     <td width="15%";>
      <?php $general_ledger_dropdown[0] ='Select Any';
     $general_ledger_dropdown[-1] ='Add New'; ksort( $general_ledger_dropdown);
      echo form_dropdown('general_ledger_id_voucher_detail',$general_ledger_dropdown,'',array('style'=>'width:100%','class'=>'form-control','id'=>'general_ledger_id_voucher_detail')); ?>
       
      </td>
     
     <td>
       <input name="voucher_detail_debit_amount" id="voucher_detail_debit_amount" placeholder="" class="form-control" type="text" value="0">
     </td>
     <td>
       <input name="voucher_detail_credit_amount" value="0" id="voucher_detail_credit_amount" placeholder="" class="form-control" type="text">
     </td>
      <td>
     <input name="voucher_detail_loan_id" id="voucher_detail_loan_id" placeholder="" class="form-control" type="text" value="0">
     <button class="btn btn-xs btn-success" id="button_search_loan_id" data-toggle="tooltip" title="search" value="Search"><span class="glyphicon glyphicon-search"></span></button>
     </td>
     <td>
      
      <button class="btn btn-xs btn-primary" id="button_save_modal1" data-toggle="tooltip" title="Save1" value="Save"><span class="glyphicon glyphicon-ok"></span></button>
     </td>
     <td>
       <input type="text"  class="form-control"  placeholder="id" name="action_voucher_detail" id="action_voucher_detail" value="C" readonly />
     </td>
     <td>
        <input type="text"  class="form-control"  placeholder="voucher_detail_voucher_id" name="voucher_detail_voucher_id" id="voucher_detail_voucher_id" value="0" readonly/>
     </td>
     <td>
       <input type="text"  class="form-control"  placeholder="id" name="voucher_detail_id" id="voucher_detail_id" value="0" readonly />
     </td>
     <td>
       <input type="text"  class="form-control"  placeholder="voucher_detail_general_ledger_id" name="voucher_detail_general_ledger_id" id="voucher_detail_general_ledger_id" value="0" readonly/>
     </td>
     
     <td>
        <input type="text"  class="form-control"  placeholder="voucher_detail_transaction_id" name="voucher_detail_transaction_id" id="voucher_detail_transaction_id" value="0" readonly/>
     </td>

      
     </tr>
     <!-- <tr>
       <th>Total</th>
       <td></td>
     </tr> -->
</table>

 
