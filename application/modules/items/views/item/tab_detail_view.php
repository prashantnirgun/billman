
	
		<table class="table table-bordered table-striped table-condensed" id="myTable">
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Description</th>
				<th >Action</th>
			</tr>
		<?php if(empty($result)) { $result = array(); }?>
		<?php foreach ($result as $row): ?>
				<tr>
				
				<td><?= $row->id;?></td>
				<td><?= $row->name;?></td>
				<td><?= $row->description;?></td>
				<td>
			<button type="button" class="btn btn-success btn-xs" name="button_tax_rate" id="button_tax_rate" 
            value="<?php echo $row->id; ?>" data-toggle="tooltip" data-placement="bottom" title="Show Duties & Tax">
            <span class="glyphicon glyphicon-th-list"></span>
      		</button>
			<button type="button" class="btn btn-warning btn-xs" name="button_delete" id="button_delete" 
			      value="<?php echo $row->id; ?>" data-message="<?php echo '( '. $row->id.' ) '. $row->name;?>"
			      data-toggle="tooltip" data-placement="bottom"  title="Delete">
			      <span class="glyphicon glyphicon-trash"></span>
			</button>
			   </td>
		</tr>
		<?php endforeach; ?>
</table></br></br>