
<table class="table table-bordered table-striped table-condensed" id="myTable">
	<tr>
    	<th>Mark</th>
		<th>ID</th>
    	<th>Name</th>
		<th>Contact</th>
		<th>Email Id</th>
		<th>Pancard No</th>
		<th>Birth Date</th>
		<th>Marital Status</th>
	<?php  if(($update_permission == 'Y') OR ($delete_permission == 'Y')) {?>
		<th>Action</th>
	<?php } ?>
	</tr>
	<?php if(empty($result)) { $result = array();}?>
	<?php foreach($result as $row):?>
	<tr>
   		<td><input type="checkbox"  id="chk_<?= $row->id;?>" class="check_value"</td>  
		<td><?= $row->id;?></td>
		<td><?= $row->name;?></td>
    	<td><?= $row->telephone_no1;?></td>
		<td><?= $row->email_id;?></td>
		<td><?= $row->pancard_no;?></td>
		<td><?= $row->birth_date;?></td>
		<td><?= $row->column_name;?></td>
	<?php  if(($update_permission == 'Y') OR ($delete_permission == 'Y')) {?>
		<td>
			<button type="button" class="btn btn-warning btn-xs" name="button_delete" id="button_delete" 
	      	value="<?php echo $row->id; ?>" data-message="<?php echo '( '. $row->id.' ) '. $row->name;?>"
		    data-toggle="tooltip" data-placement="bottom"  title="Delete">
		    <span class="glyphicon glyphicon-trash"></span>
		    </button>
		</td>
	<?php } ?>
	</tr>
<?php endforeach; ?>
</table>