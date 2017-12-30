
    <table class="table table-bordered table-striped table-condensed myTableView">
      <tr>
        <th class="col-md-1">ID</th>
        <th class="col-md-2">Setting Key</th>
        <th class="col-md-2">Setting Value</th>
        <th class="col-md-1">Action</th>  
      </tr>
      <?php if(empty($result)) { $result = array(); }?>
    <?php foreach ($result as $row): ?>
        <tr>
        <td><?= $row->id;?></td>
        <td><?= $row->setting_key;?></td>
        <td><?= $row->setting_value;?></td>
        <td>
        <button type="button" class="btn btn-primary btn-xs" name="button_edit" id="button_edit" 
      value="<?php echo $row->id; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit">
      <span class="glyphicon glyphicon-pencil"></span></button>
      <button type="button" class="btn btn-warning btn-xs" name="button_delete" id="button_delete" 
      value="<?php echo $row->id; ?>" data-message="<?php echo '( '. $row->id.' ) '. $row->setting_key;?>"
      data-toggle="tooltip" data-placement="bottom"  title="Delete">
      <span class="glyphicon glyphicon-trash"></span></button>
      </td>
    </tr>
    <?php endforeach; ?>

    </table></br></br>
