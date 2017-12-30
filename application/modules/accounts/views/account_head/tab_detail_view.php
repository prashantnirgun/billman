
<table class="table table-bordered  table-striped table-condensed table-hover">
	<tr>
		<th>No</th>
		<th>Account Format</th>
		<th>Account Head</th>
		<?php  if(($update_permission == 'Y') OR ($delete_permission == 'Y')) {?>
        <th>Action</th>
      <?php } ?>
    
	<?php if(empty($result)) { $result = array(); }?>
	<?php foreach ($result as $row): ?>
		<tr>
			<td><?php echo $row->id; ?></td>
			<td><?php echo $row->account_format_name; ?></td>
			<td><?php echo $row->name; ?></td>
			<?php  if(($update_permission == 'Y') OR ($delete_permission == 'Y')) {?>  
    		<td>
    		<?php  if(($update_permission == 'Y')) {?>
		      <button type="button" class="btn btn-primary btn-xs" name="button_edit" id="button_edit" 
		      value="<?php echo $row->id; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit">
		      <span class="glyphicon glyphicon-pencil"></span></button>
		    <?php } ?>
		    <?php  if( ($delete_permission == 'Y')) {?>
		      <button type="button" class="btn btn-warning btn-xs" name="button_delete" id="button_delete" 
		      value="<?php echo $row->id; ?>" data-message="<?php echo '( '. $row->id.' ) '. $row->name;?>"
		      data-toggle="tooltip" data-placement="bottom"  title="Delete">
		      <span class="glyphicon glyphicon-trash"></span></button>
		    <?php } ?>
      		</td>
      		 <?php } ?>
		</tr>
	<?php endforeach; ?>
</table>