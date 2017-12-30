
		<table class="table table-bordered table-striped table-condensed table-hover">
			<tr>
				<th>#</th>
				<th>ID</th>
				<th>Voucher Type</th>
				<th>Description</th>
				
			<?php  if(($delete_permission == 'Y')) {?>
				<th >Action</th>
			<?php } ?>
			</tr>
		<?php if(empty($result)) { $result = array(); }?>
		<?php foreach ($result as $row): ?>
				<tr>
				<td><input type="checkbox" id="chk_<?= $row->id;?>" class ="check_value"></td>
				<td><?= $row->id;?></td>
				<td><?= $row->voucher_type;?></td>
				<td><?= $row->description;?></td>
			<?php  if( ($delete_permission == 'Y')) {?>
				<td>
				<button type="button" class="btn btn-warning btn-xs" name="button_delete" id="button_delete" 
			      value="<?php echo $row->id; ?>" data-message="<?php echo '( '. $row->id.' ) '. $row->description . ' of type '. $row->voucher_type;?>"
			      data-toggle="tooltip" data-placement="bottom"  title="Delete">
			      <span class="glyphicon glyphicon-trash"></span>
			    </button>
			   </td>

			<?php } ?>
		</tr>
		<?php endforeach; ?>
</table></br></br>