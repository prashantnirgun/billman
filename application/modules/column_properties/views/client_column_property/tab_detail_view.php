
<br>
<?php if($create_permission == 'Y') { ?>

    <button type="button" id="button_add" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span></button>
<?php }?>
    <br><br>


<table class="table table-bordered  table-striped table-condensed table-hover" id="myTable">
  <tr>
    <th>ID</th>
    <th>Column Name</th>
    <th>Statutary</th>

<?php  if(($update_permission == 'Y') OR ($delete_permission == 'Y')) {?>
    <th>Action</th>
<?php } ?>

  </tr>
  <?php if(empty($result)) { $result = array(); }?>
<?php foreach ($result as $row): ?>
      <td><?= $row->id;?></td>
      <td><?= $row->column_name;?></td>

      <td><?= (($row->statutary_id == '3')?'Yes':'No');?></td>
 
<?php  if(($update_permission == 'Y') OR ($delete_permission == 'Y')) {?>
   
    <td>

<?php  if(($update_permission == 'Y') OR ($delete_permission == 'Y')) {?>

      <button type="button" class="btn btn-primary btn-xs" name="button_edit" id="button_edit" 
            value="<?php echo $row->id; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit">
            <span class="glyphicon glyphicon-pencil"></span>
          </button>
    <?php } ?>

<?php  if(($update_permission == 'Y') OR ($delete_permission == 'Y')) {?>

          <button type="button" class="btn btn-warning btn-xs" name="button_delete" id="button_delete" 
            value="<?php echo $row->id; ?>" data-message="<?php echo '( '. $row->id.' ) '. $row->column_name;?>"
            data-toggle="tooltip" data-placement="bottom"  title="Delete">
            <span class="glyphicon glyphicon-trash"></span>
          </button>
    <?php } ?>
      </td>
    <?php } ?>

      </tr>
      <?php endforeach; ?>
    </table>