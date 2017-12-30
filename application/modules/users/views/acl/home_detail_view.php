 <table class="table table-bordered table-striped table-condensed table-hover myTableView">
      <tr>
        <th class="col-md-1">ID</th>
        <th class="col-md-2">Name</th>
        <th class="col-md-2">Table name</th>
         <th class="col-md-2">Url</th>
        <th class="col-md-1">Create</th>
         <th class="col-md-1">View</th>
        <th class="col-md-1">Update</th>
        <th class="col-md-1">Delete</th>
       
        <th class="col-md-2">Action</th>
        
      </tr>
      <?php if(empty($result)) { $result = array(); }?>
    <?php foreach ($result as $row): ?>
        <tr>
        <td><?= $row->id;?></td>
        <td><?= $row->module_name;?></td>
        <td><?= $row->table_name;?></td>
        <td><?= $row->url;?></td>
        <td><?= (($row->create_permission=='Y')?'Yes':'No');?></td>
         <td><?= (($row->view_permission=='Y')?'Yes':'No');?></td>
        <td><?= (($row->update_permission=='Y')?'Yes':'No');?></td>
        <td><?= (($row->delete_permission=='Y')?'Yes':'No');?></td>
      
        <td>
        
        <button type="button" class="btn btn-primary btn-xs" name="button_edit" id="button_edit" 
      value="<?php echo $row->id; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit">
      <span class="glyphicon glyphicon-pencil"></span></button>
     
      
      <button type="button" class="btn btn-warning btn-xs" name="button_delete" id="button_delete" 
      value="<?php echo $row->id; ?>" data-message="<?php echo '( '. $row->id.' ) '. $row->module_name;?>"
      data-toggle="tooltip" data-placement="bottom"  title="Delete">
      <span class="glyphicon glyphicon-trash"></span></button>
     
      </td>
     
    </tr>
    <?php endforeach; ?>

    </table></br></br>
