   

<table class="table table-bordered table-striped table-condensed" id="myTable">
  <tr>
    <th class="col-md-1">#</th>
    <th class="col-md-1">ID</th>
    <th class="col-md-2">Bill No</th>
    <th class="col-md-2">Customer Name</th>
    <th class="col-md-2">Bill date</th>
    <th class="col-md-2">Status</th>
    <th class="col-md-2">Service Tax</th>
    <th class="col-md-2">Bill Amount</th>
    <th class="col-md-1">Action</th> 
  </tr>
<tbody>

  <?php $total_amount = 0;?>  
  <?php if(empty($result)) { $result = array(); }?>
  <?php foreach($result as $row): ?>
    <tr>
    <td><input type="checkbox" class="check_value" id="chk_<?= $row->id;?>"></td>
    <td><?= $row->id;?></td>
    <td><?= $row->invoice_no;?></td>
    <td><?= $row->name;?></td>
    <td><?= $row->invoice_date;?></td>
    <td><?= $row->column_name;?></td>
    <td><?= $row->service_tax_paid;?></td>
    <td><?=  currency_format($row->amount, TRUE);?></td>
    <td>
    <button type="button" class="btn btn-warning btn-xs" name="button_delete" id="button_delete" 
          value="<?php echo $row->id; ?>" data-message="<?php echo 'Recepit No. is ' .$row->invoice_no;?>"
          data-toggle="tooltip" data-placement="bottom"  title="Delete">
          <span class="glyphicon glyphicon-trash"></span>
        </button>
    </td>
    </tr>
  <?php
  $total_amount += $row->amount ;
  endforeach; ?>
</tbody>
<tr>
  <th colspan="7"><b>Total</b></th>
  <td style="text-align:right;"><b><?php echo currency_format($total_amount,TRUE);?></b></td>
</tr>
</table></br></br>