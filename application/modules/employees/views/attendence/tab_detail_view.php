	<table class="table table-bordered table-striped table-condensed">
	<tr>
		<th  style="display:none">id</th>
		<th>Date</th>
		<th>IN</th>
		<th>OUT</th>
		
		<th>Action</th>
	</tr>
	<?php $index_old = 1; $table_detail =0 ;?>
		<?php if(empty($result)) { $result = array(); }?>
		<?php foreach ($result as $row):  $index_new = $index_old++; ?>
		<tr>
			<td style="display:none"><?= $row->id;?></td>
			<td><?= $row->present_date;?></td>
			<td><?= $row->check_in_time;?></td>
			<td><?= $row->check_out_time;?></td>
			<td>
			
	<?php if( $index_new == 1) {?>	
		  <button type="button" class="btn btn-danger btn-xs" name="button_sign_out" id="button_sign_out" 
		      value="<?php echo $row->id; ?>" data-toggle="tooltip" data-placement="bottom" title="SignOut">
		      <span class="glyphicon glyphicon-off"></span>
		    </button>
		   <?php } ?>
		    </td>
	</tr>
		<?php endforeach; ?>

		</table></br></br>
<!-- if(index == 1){
                  table_detail += '<button type="button" class="btn btn-danger btn-xs" name="try_btn" id="try_btn" onclick="$(\'#url\').val(\'tss_attendences/attendence_out\');'+
                  'showSignOut(' + o.id +')" data-toggle="tooltip" data-placement="bottom" title="Sing Out"><span class="glyphicon glyphicon-off"></span></button>';  
                }
                table_detail += '</td></tr>'; -->