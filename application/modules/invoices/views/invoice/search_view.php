 <div class="row">
   <div class="col-md-1">
  <button type="button" class="btn btn-primary" id="button_add_invoice"
        data-toggle="tooltip" data-placement="bottom" title="Add Invoice"><span class="glyphicon glyphicon-plus"></span>
  </button>
   
  </div>
        <form class="form-inline" action="<?php echo base_url();?>invoice" method="POST">
            <div class="col-md-11">
      
                <label for="admition_date">Form&nbsp;</label>
                <input type="text" placeholder="Start Date" class="form-control datepicker" name="application_date_from" id="application_date_from" value="<?php echo $start_date; ?>">
                <label>To</label>
                <input type="text" placeholder="Last Date" class="form-control datepicker" name="application_date_to" id="application_date_to" value="<?php echo $end_date;?>">
                 <label>&nbsp;Search &nbsp;</label>
              <select class="form-control" name="column_name" id="selection">
                <option <?php if ($column_name == 'member_name' ) echo 'selected' ; ?> value="b.name">Name</option>
                <option <?php if ($column_name == 'sales_amount' ) echo 'selected' ; ?> value="sales_amount">Amount</option>
                <option <?php if ($column_name == 'invoice_no' ) echo 'selected' ; ?> value="invoice_no">Bill No</option>
               
              </select>
              
              <select class="form-control" name="criteria" value="<?php echo $criteria;?>">
                <option <?php if ($criteria == '1' ) echo 'selected' ; ?> value="1">Starting With</option>
                <option <?php if ($criteria == '2' ) echo 'selected' ; ?> value="2">Contaiing</option>
                <option <?php if ($criteria == '3' ) echo 'selected' ; ?> value="3">Exact with</option>
                <option <?php if ($criteria == '4' ) echo 'selected' ; ?> value="4">Ending with</option>
            </select>
              
                         <input type="search" class="form-control" placeholder="search" name="search" value="<?php echo $search_value;?>">
                
            <button type="submit" class="btn btn-success" value="Search"/><span class="glyphicon glyphicon-search"></span></button></br></br>
            </div>
        </form>
        </div>