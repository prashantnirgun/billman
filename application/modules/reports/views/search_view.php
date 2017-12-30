
        <form class="form-inline" action="<?php echo base_url();?>report" method="POST">
             
                <div class="row">
                  <label class="control-label col-md-2">From</label>
                  <label class="control-label col-md-1">To</label>
                  <label class="control-label col-md-2">Voucher Type</label>
                  <label class="control-label col-md-1">Status</label>
                  <label class="control-label col-md-1">Search </label>
                </div>
                 <div class="row">
                   <input type="text" placeholder="Start Date" class="form-control datepicker" name="application_date_from" id="application_date_from" value="<?php echo $start_date; ?>">
                <label></label>
                <input type="text" placeholder="Last Date" class="form-control datepicker" name="application_date_to" id="application_date_to" value="<?php echo $end_date;?>">

                <?php echo form_dropdown('voucher_type_id',$voucher_type_dropdown,$voucher_type_select,array('class'=>'form-control','id'=>'voucher_type_id')); ?>
               <?php echo form_dropdown('invoice_status_id',$status_dropdown,$invoice_status_select,array('class'=>'form-control','id'=>'invoice_status_id')); ?>


              <select class="form-control" name="column_name" id="selection">
                <option <?php if ($column_name == 'member_name' ) echo 'selected' ; ?> value="name">Name</option>
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
                
            <button type="submit" class="btn btn-success" value="Search"/><span class="glyphicon glyphicon-search"></span></button><br><br>
                
              </div>
                
        </form>
        