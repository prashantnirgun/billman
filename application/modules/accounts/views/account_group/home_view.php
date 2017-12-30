
<div class="container">
  
  <h3 class="text-center"><?php echo $header; ?></h3>
  <div id="flash_box"></div>
   <ul class="nav nav-tabs">
      <li class="active"><a href="#account_header" data-toggle="tab" id="tab_account_group">Account Group</a></li>
      <li><a href="#account_detail_header" id="tab_account_group_detail" data-toggle="tab">Details</a></li>
    </ul><br>

  <div class="tab-content">
    <div class="tab-pane fade active in" id="account_header">
      <div class="row">
        <div class="col-md-1">
          <?php
   
           if($create_permission == 'Y') {
          ?>
            <button type="button" class="btn btn-primary" id="button_add"
              data-toggle="tooltip" data-placement="bottom" title="Add AccountGroup"><span class="glyphicon glyphicon-plus"></span>
            </button>
          <?php } ?>
        </div>
        <div class="col-md-5 col-sm-8">
          <?php $this->load->view('account_group/search_view',$search); ?>
        </div>
      </div>
      
      <div id="account_group_body">
       <?php  echo $this->load->view('account_group/home_detail_view',$data,TRUE); ?>
       </div>
    </div>

      <div class="tab-pane" id="account_detail_header"> 
        <?php $this->load->view('account_group/panel_view');?> 
      </div>
  </div>
</div>

<!-- loading delete form -->
<?php $this->load->view('delete_modal_view'); ?>
<script type="text/javascript" src="<?php echo base_url();?>asset/common/js/account_group.js"></script>