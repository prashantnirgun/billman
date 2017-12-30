
 <div class="row">

      <div class="col-md-1">
      <button type="button" class="btn btn-primary" id="button_add_voucher"
      data-toggle="tooltip" data-placement="bottom" title="Add Receipt"><span class="glyphicon glyphicon-plus"></span></button></br></br>
      </div>
      <form class="form-inline" action="<?php echo base_url();?>voucher/receipt" method="POST">
      <div class="col-md-11">
      <label>Date&nbsp;</label>
     
       <!-- <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input type="text" class="form-control pull-right" id="reservation">
        </div>
      </div>  -->
        <label>Date&nbsp;</label>
        <input name="receipt_date_from" id="receipt_date_from" class="form-control datepicker" value ="<?php echo $start_date; ?>" placeholder="From" type="text" >
        <input name="receipt_date_to" id="receipt_date_to" class="form-control datepicker" value ="<?php echo $end_date; ?>" placeholder="To" type="text" >
        <label>&nbsp;Type&nbsp;</label>
         <?php 
         // var_dump( $receipt_type_dropdown);
            /*
            $receipt_type_dropdown [0] = 'All';
            ksort($receipt_type_dropdown ); echo form_dropdown('voucher_type_id',$receipt_type_dropdown,set_value('voucher_type_id'),array('class'=>'form-control myClass','id'=>'voucher_type_id')); 
            */
            //$receipt_type_dropdown [0] = 'All';
           // ksort($receipt_type_dropdown );
            echo '<select id="voucher_type_id" name="voucher_type_id" class="form-control">' . $receipt_type_dropdown . '</select>';
            ?>
       
          <label>&nbsp;Member&nbsp;</label>
           <?php echo form_dropdown('member_id',$member_dropdown,set_value('member_id'),array('class'=>'form-control myClass','id'=>'search_member_id')); ?>
            <button type="submit" class="btn btn-success" value="Search"/><span class="glyphicon glyphicon-search"></span></button></br></br>
          </div>
      </form>
    </div>