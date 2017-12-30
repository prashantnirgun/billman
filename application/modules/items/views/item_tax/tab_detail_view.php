	
		<table class="table table-bordered table-striped table-condensed" id="myTable">
			<tr>
				<th>ID</th>
				<th>Tax Rate</th>
				<th>Date</th>
				<th >Action</th>
			</tr>
		<?php if(empty($result)) { $result = array(); }?>
		<?php foreach ($result as $row): ?>
				<tr>
				<td><?= $row->id;?></td>
				<td><?= $row->tax_rate_name;?></td>
				<td><?= date_display($row->wef_date);?></td>
				<td>
				<button type="button" class="btn btn-primary btn-xs" name="button_edit" id="button_edit" 
		        value="<?php echo $row->id; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit">
		        <span class="glyphicon glyphicon-pencil"></span></button>
				<button type="button" class="btn btn-warning btn-xs" name="button_delete" id="button_delete" 
			      value="<?php echo $row->id; ?>" data-message="<?php echo '( '. $row->id.' ) '. $row->tax_rate_name;?>"
			      data-toggle="tooltip" data-placement="bottom"  title="Delete">
			      <span class="glyphicon glyphicon-trash"></span>
			    </button>
			   </td>
		</tr>
		<?php endforeach; ?>
</table></br></br>