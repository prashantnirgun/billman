
<div class="container">
  <h3 class="text-center"><?php echo $header; ?></h3>
  <div id="flash_box"></div>

	<ul class="nav nav-tabs">
	    <li class="active"><a href="#company_header" data-toggle="tab" id="tab_company">Company</a></li>
	    <li><a href="#branch_header" data-toggle="tab" id="tab_branch">Branch</a></li>
	</ul>
  <br>
  <div class="tab-content">
  	<div class="tab-pane active" id="company_header"> 
      <?php if($create_permission == 'Y') {    ?>
        <button type="button" class="btn btn-primary" id="button_add"
        data-toggle="tooltip" data-placement="bottom" title="Add Company"><span class="glyphicon glyphicon-plus"></span>
        </button></br><br>
    <?php } ?>

      <div id="company_body">  
        <?php echo $this->load->view('company/home_detail_view',$data,TRUE);  ?> 
      </div>
    </div>
  	<div class="tab-pane" id="branch_header">
     <?php
       
         if($create_permission == 'Y') {    
      ?>
      <button type="button" class="btn btn-primary" id="button_add"
        data-toggle="tooltip" data-placement="bottom" title="Add Branch"><span class="glyphicon glyphicon-plus"></span></button></br><br>
      <?php } ?>
        <div id="branch_body"></div>
    </div>
  </div>
</div>

<!-- loading delete form -->
<?php $this->load->view('delete_modal_view'); ?>

<!-- Bootstrap Modal begin -->
<?php $this->load->view('company/modal_view'); ?>
<?php $this->load->view('branch/modal_view'); ?>

<script type="text/javascript" src="<?php echo base_url();?>asset/common/js/company.js"></script>