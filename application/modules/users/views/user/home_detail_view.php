        <table class="table table-bordered table-striped table-condensed table-hover" id="myTable">
          <tr>
            <th class="col-md-1">#</th>
            <th class="col-md-1">ID</th>  
            <th class="col-md-1">Status</th>  
            <th class="col-md-1">Group Name</th>  
            <th class="col-md-2">Name</th>
           <?php  if(  ($delete_permission == 'Y')) {?>
            <th class="col-md-1">Action</th>
            <?php }?>
          </tr>

          <?php if(empty($result)) { $result = array(); }?>
          <?php foreach ($result as $row): ?>
            <tr>
            <td><input type="checkbox" id="chk_<?= $row->id;?>" class="check_value"></td>
              <td><?= $row->id;?></td>
              <td><?= $row->login_status;?></td>
              <td><?= $row->group_name;?></td>  
              <td><?= $row->user_name;?></td>
              <?php  if( ($delete_permission == 'Y')) {?>
              <td>
         <button type="button" class="btn btn-warning btn-xs" name="button_delete" id="button_delete" 
          value="<?php echo $row->id; ?>" data-message="<?php echo '( '. $row->id.' ) '. $row->login_status;?>"
          data-toggle="tooltip" data-placement="bottom"  title="Delete">
          <span class="glyphicon glyphicon-trash"></span>
        </button>
      </td>
      <?php }?>
            </tr>
          <?php endforeach; ?>

      </table>
        </br></br>