
<table class="table table-bordered table-striped table-condensed" id="atd_table">
<tr>
	<th>Name</th>
	<th>Date</th>
	<th>Present</th>
    <th>Absent</th>
    <th>Halfday</th>
    <th>Sunday</th>
    <th>Holiday</th>
</tr>

<?php if(empty($result)) { $result = array(); }?>
		<?php foreach ($result as $row): ?>
	<tr>
		<td><?= $row->employee_name;?></td>
		<td><?= $row->present_date;?></td>
		<td><?= $row->Present;?></td>
		<td><?= $row->Absent;?></td>
		<td><?= $row->Halfday;?></td>
		<td><?= $row->Sunday;?></td>
		<td><?= $row->Holiday;?></td>
	</tr>
		<?php endforeach; ?>

</table></br></br>
