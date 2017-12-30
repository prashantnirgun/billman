<div class="container">

  <h3 class="text-center"><?php echo $header;?></h3>
  <div id="flash_box"></div>


   <div class="row">
      
        <div class="col-md-1">
          <button type="button" class="btn btn-primary" id="button_add"
          data-toggle="tooltip" data-placement="bottom" title="Add Form Setting"><span class="glyphicon glyphicon-plus"></span>
          </button>
        </div>
   
        <div class="col-md-7">
           <?php $this->load->view('search_view',$search); ?>
        </div>
      </div> 

      <div id="form_setting_body">
        <?php echo $this->load->view('home_detail_view',$data,TRUE);
        ?>
      </div>
	
</div>

<!-- loading delete form -->
<?php $this->load->view('delete_modal_view'); ?>

<!-- Bootstrap Modal begin -->
<?php $this->load->view('modal_view'); ?>

<script type="text/javascript" src="<?php echo base_url();?>asset/common/js/form_setting.js"></script> 