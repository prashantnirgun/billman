 

  <table class="table table-bordered table-condensed table-striped table-hover" id="myTable">
  <thead>
    <tr>
      <th>#</th>
      <th>ID</th>
      <th>Name</th>
    <?php  if(($update_permission == 'Y') OR ($delete_permission == 'Y')) {?>
      <th >Action</th>
    <?php } ?>
   
  </thead>
  <tbody>
  <?php if(empty($result)) { $result = array(); }?>
    <?php foreach ($result as $row): ?>
    <tr>
     <td><input type="checkbox" id="chk_<?= $row->id;?>" class="check_value"></td>
        <td><?= $row->id;?></td>
        <td><?= $row->name;?></td>
      <?php  if(($update_permission == 'Y') OR ($delete_permission == 'Y')) {?>
          <td>
        <?php  if(($update_permission == 'Y')) {?>
          <button type="button" class="btn btn-primary btn-xs" name="button_edit" id="button_edit" 
            value="<?php echo $row->id; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit">
            <span class="glyphicon glyphicon-pencil"></span>
          </button>
        <?php }?>
        <?php  if(($delete_permission == 'Y')) {?>
          <button type="button" class="btn btn-warning btn-xs" name="button_delete" id="button_delete" 
          value="<?php echo $row->id; ?>" data-message="<?php echo '( '. $row->id.' ) '. $row->name;?>"
          data-toggle="tooltip" data-placement="bottom"  title="Delete">
          <span class="glyphicon glyphicon-trash"></span>
          </button>
        <?php }?>
      </td>
    <?php }?>
    </tr> 
    <?php endforeach; ?>
  </tbody>
  </table>