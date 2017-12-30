   

<table class="table table-bordered table-striped table-condensed" id="VoucherListTable">
	<tr>
		<th>#</th>
		<th>ID</th>
		<th>Receipt No</th>
		<th>Name</th>
		<th>Date</th>	
    	<th>Cheque No.</th>     
		<th>Amount</th>		
		<th>Action</th>		
	</tr>
<tbody>

	<?php $total_amount = 0;?>	
	<?php if(empty($result)) { $result = array(); }?>
	<?php foreach($result as $row): ?>
		<tr>
		<td><input type="checkbox" class="check_value" id="chk_<?= $row->id;?>"></td>
		<td><?= $row->id;?></td>
		<td><?= $row->receipt_no;?></td>
		<td><?= $row->member_name; ?></td>
		<td><?= $row->receipt_date;?></td>
   		<td style="text-align:right;"><?= $row->cheque_no;?></td>
		<td style="text-align:right;"><?= currency_format($row->amount, TRUE) ;?></td>
		<td>
		<button type="button" class="btn btn-warning btn-xs" name="button_delete" id="button_delete" 
		      value="<?php echo $row->id; ?>" data-message="<?php echo 'Name is '.$row->member_name.' and Recepit No. is ' .$row->receipt_no;?>"
		      data-toggle="tooltip" data-placement="bottom"  title="Delete">
		      <span class="glyphicon glyphicon-trash"></span>
		    </button>
		<button type="button" class="btn btn-info btn-xs" name="button_print" id="button_print" 
		      value="<?php echo $row->id; ?>"
		      data-toggle="tooltip" data-placement="bottom"  title="Delete">
		      <span class="glyphicon glyphicon-print glyphicon"></span>
		    </button>
		  
		    <button type="button" class="btn btn-primary btn-xs" name="button_transfer" id="button_transfer" 
		      value="<?php echo $row->id; ?>"
		      data-toggle="tooltip" data-placement="bottom"  title="Transfer">
		    <span class="glyphicon glyphicon-random"></span>
		  </button>

	
		</td>

		</tr>
	<?php
	$total_amount += $row->amount ;
	endforeach; ?>
</tbody>
<tr>
	<th colspan="6"><b>Total</b></th>
	<td style="text-align:right;"><b><?php echo number_format($total_amount,2);?></b></td>
</tr>
</table></br></br>