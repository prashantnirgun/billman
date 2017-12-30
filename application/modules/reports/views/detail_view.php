

<table class="table table-bordered table-striped table-condensed" id="recoveryTable">
<tr>

	
	<th>Name</th>
	<th>Created</th>
	<th>Updated</th>
	<th>Deleted</th>
	
</tr>
<?php $total_created= 0; $total_updated =0; $total_deleted =0;?>
<?php if(empty($result)) { $result = array();}?>
<?php foreach ($result as $row):  ?>
	<tr>
		
		<td><?=$row->name;?></td>
		<td><?=$row->created;?></td>
		<td><?=$row->updated;?></td>
		<td><?=$row->deleted;?></td>
		
	</tr>

<?php 
$total_created += $row->created; 
$total_updated += $row->updated; 
$total_deleted += $row->deleted; 
endforeach; ?>
	<tr>
  <th colspan ="1"><b>Total</b></th>
  <td><b><?php echo $total_created; ?></b></td>
  <td><b><?php echo $total_updated; ?></b></td>
  <td><b><?php echo $total_deleted; ?></b></td>

</tr>
	
</table></br></br>

