<div class="container">

  <h3 class="text-center"><?php echo $header;?></h3>
  <div id="flash_box"></div>
  <?php if($create_permission == 'Y') { ?>
    <button type="button" class="btn btn-primary" id="button_add"
    data-toggle="tooltip" data-placement="bottom" title="Add Tax"><span class="glyphicon glyphicon-plus"></span></button></br></br>
  <?php } ?>

    <div id="tax_rate_body">
      <?php echo $this->load->view('home_detail_view',$data,TRUE); ?> 
    </div>  
	
</div>

<!-- loading delete form -->
<?php $this->load->view('delete_modal_view'); ?>

<!-- Bootstrap Modal begin -->
<?php $this->load->view('tax_rate/modal_view'); ?>

<script type="text/javascript" src="<?php echo base_url();?>asset/common/js/tax_rate.js"></script> 