
    <table class="table table-bordered table-striped table-condensed myTableView">
      <tr>
        <th class="col-md-1">ID</th>
        <th class="col-md-2">Name</th>
        <th class="col-md-2">Percent</th>
        
      <?php  if(($update_permission == 'Y') OR ($delete_permission == 'Y')) {?>
        <th class="col-md-1">Action</th>
      <?php } ?>
    
      </tr>
      <?php if(empty($result)) { $result = array(); }?>
    <?php foreach ($result as $row): ?>
        <tr>
        <td><?= $row->id;?></td>
        <td><?= $row->tax_rate_name;?></td>
        <td><?= $row->tax_rate_percent;?></td>

      <?php  if(($update_permission == 'Y') OR ($delete_permission == 'Y')) {?>
        <td>
        <button type="button" class="btn btn-primary btn-xs" name="button_edit" id="button_edit" 
      value="<?php echo $row->id; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit">
      <span class="glyphicon glyphicon-pencil"></span></button>
      <button type="button" class="btn btn-warning btn-xs" name="button_delete" id="button_delete" 
      value="<?php echo $row->id; ?>" data-message="<?php echo '( '. $row->id.' ) '. $row->tax_rate_name;?>"
      data-toggle="tooltip" data-placement="bottom"  title="Delete">
      <span class="glyphicon glyphicon-trash"></span></button>
      </td>
    <?php } ?>
    </tr>
    <?php endforeach; ?>

    </table></br></br>
