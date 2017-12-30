<div class="container">
  <h3 class="text-center">General Ledger</h3>
  <div id="flash_box"></div>

  <ul class="nav nav-tabs">
    <li class="active"><a href="#general_ledger" data-toggle="tab" id="tab_general_ledger">General Ledger</a></li>
    <li><a href="#general_ledger_master_header"  data-toggle="tab"  id="tab_general_ledger_master">Detail</a></li>
    <li><a href="#general_ledger_detail"  data-toggle="tab" id="tab_general_ledger_detail">More Info</a></li>
  </ul><br/>

  <div class="tab-content">
  
  <div class="tab-pane fade active in" id="general_ledger">
      <div class="row">
       <?php
   
           if($create_permission == 'Y') {
          ?>
        <div class="col-md-1">
          <button type="button" class="btn btn-primary" id="button_add"
          data-toggle="tooltip" data-placement="bottom" title="Add General Ledger"><span class="glyphicon glyphicon-plus"></span>
          </button>
        </div>
      <?php } ?>
        <div class="col-md-7">
           <?php $this->load->view('supplier/search_view',$search); ?>
        </div>
      </div> 

      <div id="general_ledger_body">
        <?php echo $this->load->view('supplier/home_detail_view',$data,TRUE);
        ?>
      </div>
    </div>
   
      <div class="tab-pane fade" id="general_ledger_master_header">
        <?php  $this->load->view('supplier/panel_view');?>
      </div>

      <div class="tab-pane fade" id="general_ledger_detail">
         <?php $this->load->view('general_ledger_detail/panel_view',$data);?>
      </div>
    </div>
</div><!-- end of container -->

<!-- loading delete form -->
<?php $this->load->view('delete_modal_view'); ?>

<script type="text/javascript" src="<?php echo base_url();?>asset/common/js/general_ledger.js"></script> 
<!-- loading general ledger js -->