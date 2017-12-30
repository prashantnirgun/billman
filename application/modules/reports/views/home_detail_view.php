   

<table class="table table-bordered table-striped table-condensed" id="myTable">
  <tr>
    
    <th class="col-md-1">ID</th>
    <th class="col-md-1">Bill No</th>
    <th class="col-md-2">Customer Name</th>
    <th class="col-md-2">Bill date</th>
    <th class="col-md-1">Status</th>
    <th style="text-align:right;" class="col-md-1">Service Tax</th>
    <th style="text-align:right;" class="col-md-1">Bill Amount</th>
   
  </tr>
<tbody>

  <?php $total_amount = 0; $service_tax_total_amount = 0; ?>  
  <?php if(empty($result)) { $result = array(); }?>
  <?php foreach($result as $row): ?>
    <tr>
    
    <td><?= $row->id;?></td>
    <td><?= $row->invoice_no;?></td>
    <td><?= $row->name;?></td>
    <td><?= $row->invoice_date;?></td>
    <td><?= $row->column_name;?></td>
    <td style="text-align:right;"><?= currency_format($row->service_tax_paid, TRUE);?></td>
    <td style="text-align:right;"><?=  currency_format($row->invoice_amount, TRUE);?></td>
    
    </tr>
  <?php
  $total_amount += $row->invoice_amount ;
  $service_tax_total_amount += $row->service_tax_paid ;
  endforeach; ?>
</tbody>
<tr>
  <th colspan="5"><b>Total</b></th>
  <td style="text-align:right;"><b><?php echo currency_format($service_tax_total_amount,TRUE);?></b></td>
  <td style="text-align:right;"><b><?php echo currency_format($total_amount,TRUE);?></b></td>
</tr>
</table></br></br>