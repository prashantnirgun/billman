        <table class="table table-bordered table-striped table-condensed" id="myTable">
          <tr>
            <th class="col-md-1">#</th>
            <th class="col-md-1">ID</th>  
            <th class="col-md-1">User name</th>  
            <th class="col-md-1">Full name</th>  
            <th class="col-md-2">Email</th>
            <th class="col-md-2">Contact no</th>
            <th class="col-md-1">Action</th>
          </tr>

          <?php if(empty($result)) { $result = array(); }?>
          <?php foreach ($result as $row): ?>
            <tr>
            <td><input type="checkbox" id="chk_<?= $row->user_id;?>" class="check_value"></td>
              <td><?= $row->user_id;?></td>
              <td><?= $row->user_name;?></td>
              <td><?= $row->full_name;?></td>  
              <td><?= $row->email;?></td>
              <td><?= $row->contact_no;?></td>
              <td>
         <button type="button" class="btn btn-warning btn-xs" name="button_delete" id="button_delete" 
          value="<?php echo $row->user_id; ?>" data-message="<?php echo '( '. $row->user_id.' ) '. $row->user_name;?>"
          data-toggle="tooltip" data-placement="bottom"  title="Delete">
          <span class="glyphicon glyphicon-trash"></span>
        </button>
      </td>
            </tr>
          <?php endforeach; ?>

      </table>
        </br></br>