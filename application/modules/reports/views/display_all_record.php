

<table class="table table-bordered table-striped table-condensed" id="myTable">
<tr>

	<th>No</th>
	<th>ID</th>
	<th>Member</th>
	<th>Employee</th>
	<th>Date & Time</th>

</tr>
<?php $no = 1 ;?>
<?php if(empty($result)) { $result = array();}?>
<?php foreach ($result as $row): $NO =$no++;  ?>
	<tr>
		<td><?php echo $NO; ?></td>
		<td><?=$row->id;?></td>
		<td><?=$row->member_name;?></td>
		<td><?=$row->employee_name;?></td>
		<td><?=$row->date_time;?></td>
		
	</tr>

<?php 
 
endforeach; ?>

</table></br></br>

