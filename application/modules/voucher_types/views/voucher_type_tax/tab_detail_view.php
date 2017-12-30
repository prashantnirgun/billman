
<br>   

    <button type="button" class="btn btn-primary" id="button_add"
        data-toggle="tooltip" data-placement="bottom" title="Add Voucher Type Detail"><span class="glyphicon glyphicon-plus"></span>
    </button></br><br>

	<table class="table table-bordered table-striped table-condensed table-hover" id="myTable">
		<tr>
		
     		<th>ID</th>
      		<th>Tax Rate </th>
			<th>Date</th>
		
			<th>Action</th>
		
		</tr>
	<?php if(empty($result)) { $result = array();}?>
	<?php foreach($result as $row):?>
		<tr>
      		<td><?= $row->tax_rate_id?></td>
      		<td><?= $row->tax_rate_name;?></td>
			<td><?= date_display($row->wef_date);?></td>  
			<td>
			 
			<button type="button" class="btn btn-primary btn-xs" name="button_edit" id="button_edit" 
			      value="<?php echo $row->tax_rate_id; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit">
			      <span class="glyphicon glyphicon-pencil"></span></button>
			    
			      <button type="button" class="btn btn-warning btn-xs" name="button_delete" id="button_delete" 
			      value="<?php echo $row->tax_rate_id; ?>" data-message="<?php echo '( '. $row->tax_rate_id.' ) '. $row->tax_rate_name;?>"
			      data-toggle="tooltip" data-placement="bottom"  title="Delete">
			      <span class="glyphicon glyphicon-trash"></span></button>
			     
			</td>
		
		</tr>
	<?php endforeach; ?>
	</table>