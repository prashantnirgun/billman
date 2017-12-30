
<div class="container">
  <?php echo validation_errors(); ?>
  <h3 class="text-center"><?php echo $header; ?></h3>
  <div id="flash_box"></div>

  <ul class="nav nav-tabs">
     <li class="active"><a href="#narration_header" data-toggle="tab" id="tab_narration">Narration</a></li>
     <li><a href="#narration_detail_header" id="tab_narration_detail" data-toggle="tab">Details</a></li>  
  </ul>

  <div class="tab-content">
   
    <div class="tab-pane fade active in" id="narration_header"> 
      <br>
  <?php if($create_permission == 'Y') { ?>
    <button type="button" class="btn btn-primary" id="button_add"
    data-toggle="tooltip" data-placement="bottom" title="Add Narration"><span class="glyphicon glyphicon-plus"></span>
    </button></br><br>
  <?php } ?>

    <div id="narration_body"> 
      <?php  $output  = $this->load->view('home_detail_view',$data,TRUE);  echo $output ; ?> 
    </div>  
  </div>


    <div class="tab-pane fade" id="narration_detail_header">
      <div id="narration_detail_body">
        <?php $this->load->view('panel_view');?>
      </div>
    </div>
</div>

<!-- loading delete form -->
<?php $this->load->view('delete_modal_view'); ?>

<script type="text/javascript" src="<?php echo base_url();?>asset/common/js/narration.js"></script> 