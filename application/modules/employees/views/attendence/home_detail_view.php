  <!--  May - 2016 -->
  
<table class="table table-bordered table-striped table-condensed" id="myTable">
  <tr>
  
    <th>Mark</th>
    <th>ID</th>
    <th>Employee Name</th>
    <th>Contact</th>
    <th>Email Id</th>
    <th>Pancard No</th>
    <th>Birth Date</th>
    <th>Marital Status</th>

<?php  if(($update_permission == 'Y') OR ($delete_permission == 'Y')) {?>
    <th>Action</th>
<?php } ?>
  </tr>
  <?php $days = 0; $present = 0; $interval=0; $absent = 0; $sunday = 0; $holiday = 0; $halfday = 0; if(empty($result)) { $result = array();}?>
  <?php foreach($result as $row):?>
  <tr>
    <td><input type="checkbox" class="check_value" id="chk_<?= $row->id;?>"></td>  
    <td><?= $row->id;?></td>
    <td><?= $row->name;?></td>
    <td><?= $row->telephone_no1;?></td>
    <td><?= $row->email_id;?></td>
    <td><?= $row->pancard_no;?></td>
    <td><?= $row->birth_date;?></td>
    <td><?= $row->column_name;?></td>

<?php  if(($update_permission == 'Y') OR ($delete_permission == 'Y')) {?>
    <td>
    <button  type="button" class="btn btn-info btn-xs"  name="button_edit" id="button_edit" 
            value="<?php echo $row->id; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit">
            <span class="glyphicon glyphicon-th-list"></span>
          </button>
    </td>   
  <?php }?>
  </tr>
<?php endforeach; ?>
</table>
 <div id="attendence_details"></div>