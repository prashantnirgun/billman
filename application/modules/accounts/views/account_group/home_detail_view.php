
    <table class="table table-bordered  table-striped table-condensed table-hover" id="myTable">
      <tr>
        <th class="col.md-1">#</th>
        <th>ID</th>
        <th>Head</th>
        <th>Name</th>
        <th>Herarcy</th>
        <th>Total</th>
    <?php  if(($update_permission == 'Y') OR ($delete_permission == 'Y')) {?>
        <th>Action</th>
    <?php } ?>
      </tr>
      <?php if(empty($result)) { $result = array(); }?>
    <?php foreach ($result as $row): ?>
        <tr>
        <td><input type="checkbox"  id="chk_<?= $row->id;?>" class="check_value" value="<?php echo $row->id ?>"></td>
        <td><?= $row->id;?></td>
        <td><?= $row->account_head;?></td>
        <td><?= $row->name;?></td>
        <td><?= $row->herarcy;?></td>
        <td><span class="badge"><?= $row->count;?></span></td>
    <?php  if(($delete_permission == 'Y')) {?>
        <td>
          <button type="button" class="btn btn-warning btn-xs" name="button_delete" id="button_delete" 
                value="<?php echo $row->id; ?>" data-message="<?php echo '( '. $row->id.' ) '. $row->name;?>"
                data-toggle="tooltip" data-placement="bottom"  title="Delete">
                <span class="glyphicon glyphicon-trash"></span>
          </button>
        </td>
    <?php } ?>
    </tr>
    <?php endforeach; ?>
</table></br></br>
