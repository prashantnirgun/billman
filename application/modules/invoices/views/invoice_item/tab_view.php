<table class="table table-bordered table-striped table-condensed" id="InvoiceDetailTable">
     <tr>
       <th class="col-md-1">#</th>
       <th>Product &nbsp;&nbsp;
          
       </th>
      <th>Product Description</th>
       <th>Quality</th>
       <th>Rate</th>
       <th>Discount</th>
       <th>Tax Rate</th>
       <th>Amount</th>
       <th>Action</th>
       <th >CRUD</th>
       <th>Invoice ID</th>
       <th>ID</th>
       <th>product ID</th>
       
     </tr>
     <tr>
      <td>
        <input name="invoice_detail_sr_no" id="invoice_detail_sr_no" placeholder=" " class="form-control" type="text" readonly value="0"> 
      </td>
      <td  width="25%";> <!--  <?php// $product_dropdown[0]       = 'Select Any';
               // ksort($product_dropdown);
      // echo form_dropdown('product_id',$product_dropdown,'',array('style'=>'width:80%','class'=>'form-control','id'=>'product_id')); ?>  -->   
       <?php //echo '<select id="product_id_dropdown" value="0" name="product_id_dropdown" class="form-control" style = "width:100%;">'.$product_dropdown.'</select>'; ?>
       
      </td>
      <td>
         <input name="invoice_detail_description" id="invoice_detail_description" placeholder="description" class="form-control" type="text" value=" ">
      </td>
      <td>
        <input name="invoice_detail_quantity" id="invoice_detail_quantity" placeholder="Quantity" class="form-control" type="text" value="0">
      </th>
      <th>
         <input name="invoice_detail_rate" id="invoice_detail_rate" placeholder="rate " class="form-control" type="text" value="0.00">
      </th>
      <th>
        <input name="invoice_detail_discount_amount" id="invoice_detail_discount_amount" placeholder="Amount" class="form-control" type="text" value="0.00">
      </th>
      <th>
        <input name="invoice_detail_tax_rate_id" id="invoice_detail_tax_rate_id" placeholder="Tax rate"
                             class="form-control" type="text" value="0.00">
      </th>
      <th>
      <input name="invoice_detail_amount" id="invoice_detail_amount" placeholder="Amount" class="form-control" type="text" value="0.00">
      </th>
      <th>
       <button id="button_save_modal1_detail" class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-ok"></span></button>
      </th>
      <th >
      <input type="text" value="C" name="action_invoice_detail" id="action_invoice_detail" class="form-control" placeholder="action detail" readonly/>   
       </th>
      <th>
        <input type="text" value="0" class="form-control" name="invoice_detail_invoice_id" id="invoice_detail_invoice_id" placeholder="id" readonly/> 
      </th>
      <th>
        <input type="text" value="0" name="invoice_detail_id" id="invoice_detail_id" class="form-control"  readonly placeholder="invoice_id"/> 
      </th>
      <th>
        <input type="text" value="0" name="invoice_detail_product_id" id="invoice_detail_product_id" class="form-control"  readonly placeholder="product_id"/> 
      </th>
     </tr>
     <tr>
       <th colspan="5">Total</th>
       <td id="discount_amount_total"></td>
       <td id="tax_rate_total"></td>
       
       <td id="total_amount"></td>
     </tr>
</table>

 