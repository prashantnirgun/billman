<div class="container">
  <?php echo validation_errors(); ?>
  <h3 class="text-center">Format & Head</h3>
  <div id="flash_box"></div> 

  <ul class="nav nav-tabs">
          <li class="active"><a href="#account_format_header" id="tab_account_format" data-toggle="tab">
          Account Format</a></li>
          <li><a href="#account_head_header" id="tab_account_head" data-toggle="tab">Account Head</a></li>
  </ul>
  <br>
  <div class="tab-content">
    
    <div class="tab-pane fade active in" id="account_format_header"> 
     <?php if($create_permission == 'Y') { ?>  
       <button type="button" class="btn btn-primary" id="button_add"
          data-toggle="tooltip" data-placement="bottom" title="Add AccountFormat">
          <span class="glyphicon glyphicon-plus"></span>
      </button><br><br>
    <?php } ?>
      <div id="account_format_body"> 
        <?php $output = $this->load->view('account_format/home_detail_view',$data,TRUE); 
          echo $output ; 
        ?> 
      </div>  
    </div>

    <div class="tab-pane" id="account_head_header">
    <?php if($create_permission == 'Y') { ?>
      <button type="button" class="btn btn-primary" id="button_add"
        data-toggle="tooltip" data-placement="bottom" title="Add AccountHeads">
        <span class="glyphicon glyphicon-plus"></span>
      </button>
      <?php } ?>
      <br/><br/>

      <div id="account_head_body">
      </div>
    </div>
    </div>

</div>



<!-- loading delete form -->
<?php $this->load->view('delete_modal_view'); ?>

<!-- Bootstrap Modal begin -->
<?php $this->load->view('account_format/modal_view');?>
<?php $this->load->view('account_head/modal_view');?>
 
<script type="text/javascript" src="<?php echo base_url();?>asset/common/js/account.js"></script> 