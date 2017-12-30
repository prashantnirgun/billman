 <?php if($create_permission == 'Y') { ?>

        <button type="button" class="btn btn-primary" id="button_add"
        data-toggle="tooltip" data-placement="bottom" title="Add Citys"><span class="glyphicon glyphicon-plus"></span></button><br><br>
      <?php } ?>
<table class="table table-bordered  table-striped table-condensed table-hover" id="myTable">
  <tr>

    <th>ID</th>
    <th>Document Name</th>
    <th>Image File</th>
    <?php  if(($update_permission == 'Y') OR ($delete_permission == 'Y')) {?>
    <th>Action</th>
    <?php }?>

  </tr>

  <?php  if(empty($result)) { $result = array(); }?>
<?php foreach ($result as $row): ?>
    <tr>

    <td><?php echo $row->id;?></td>
    <td><?php echo $row->document_name;?></td>
    <td>
    <a target="_blank" href="<?php echo "/uploads/".$row->table_name."/". $row->image_file_name;?>"><?php echo $row->image_file_name;?></a></td>
<?php  if(($update_permission == 'Y') OR ($delete_permission == 'Y')) {?>

    <td>
    <?php  if(($update_permission == 'Y')) {?>

      <button type="button" class="btn btn-primary btn-xs" name="button_edit" id="button_edit"
      value="<?php echo $row->id; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit">
      <span class="glyphicon glyphicon-pencil"></span></button>
      <?php }?>
      <?php  if( ($delete_permission == 'Y')) {?>

      <button type="button" class="btn btn-warning btn-xs" name="button_delete" id="button_delete"
      value="<?php echo $row->id; ?>" data-message="<?php echo '( '. $row->id.' ) '. $row->document_name;?>"
      data-toggle="tooltip" data-placement="bottom"  title="Delete">
      <span class="glyphicon glyphicon-trash"></span></button>
      <?php } ?>
    </td>
    <?php } ?>
</tr>
<?php endforeach; ?>

</table></br></br>
