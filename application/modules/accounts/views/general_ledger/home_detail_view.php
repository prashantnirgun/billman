
<table class="table table-bordered  table-striped table-condensed table-hover" id="myTable">
      <tr>
        <th class="col.md-1">#</th>
         <th>ID</th>
         <th>General Ledger Name</th>
        <th>Group Name</th>
        <th>Alias</th>
        <th  class="text-right">Opening</th>
      <?php  if(($delete_permission == 'Y')) {?>
        <th>Action</th>
      <?php } ?>
      
      </tr>
      <?php $total_opening = 0;?>
      <?php if(empty($result)) { $result = array(); }?>
    <?php foreach ($result as $row): ?>
        <tr>
         <td><input type="checkbox"  id="chk_<?= $row->id;?>" class="check_value" value="<?php echo $row->id ?>"></td>
        <td><?= $row->id;?></td>
        <td><?= $row->name;?></td>
        <td><?= $row->group_name;?></td>
        <td><?= $row->alise;?></td>
        <td  class="text-right"><?= currency_format($row->opening_amount, TRUE);?></td>
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
    <?php 
    $total_opening +=  $row->opening_amount;
  endforeach; ?>
    <tr>
      <th colspan="5"><b>Total</b></th>
      <td><b><?php echo number_format($total_opening,2)?></b></td>
    </tr>
</table></br></br>   