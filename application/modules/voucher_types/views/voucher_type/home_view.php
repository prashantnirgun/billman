
<div class="container">
  <h3 class="text-center"><?php echo $header; ?></h3>
  <div id="flash_box"></div>
    <ul class="nav nav-tabs">
      <li class="active"><a href="#voucher_header" data-toggle="tab" id="tab_voucher_type">Voucher</a></li>
      <li><a href="#voucher_detail_header" id="tab_voucher_type_detail" data-toggle="tab">Details</a></li>
      
      <li><a href="#voucher_type_tax_header" id="tab_voucher_type_tax" data-toggle="tab">Duties & Tax</a></li>
    </ul>

  <div class="tab-content">
   
    <div class="tab-pane fade active in" id="voucher_header">
    <br>  
    <?php //var_dump($register_data['register_type']);?>
    <input type="register_type" name="register_type" value="<?php echo $register_data['register_type'] ; ?>" >

  <?php if($create_permission == 'Y') { ?>   
    <button type="button" class="btn btn-primary" id="button_add"
        data-toggle="tooltip" data-placement="bottom" title="Add Voucher type"><span class="glyphicon glyphicon-plus"></span>
    </button></br><br>
  <?php } ?>

    <div id="voucher_type_body">
     <?php echo $this->load->view('voucher_type/home_detail_view',$data,TRUE); ?>  
     </div>
    </div>
    <div class="tab-pane fade" id="voucher_detail_header">	 
        <div id="voucher_type_detail_body">
        </div>
    </div>
    <div class="tab-pane fade" id="voucher_type_tax_header">  
    
        <div id="voucher_type_tax_body">
        </div>
    </div>
  </div>
</div>
	<!-- loading delete form -->
<?php $this->load->view('delete_modal_view'); ?>

<!-- Bootstrap Modal begin -->
<?php $this->load->view('voucher_type/modal_view'); ?>
<?php $this->load->view('voucher_type_detail/modal_view'); ?>
<?php $this->load->view('voucher_type_tax/modal_view'); ?>

<script type="text/javascript" src="<?php echo base_url();?>asset/common/js/voucher_type.js"></script> 