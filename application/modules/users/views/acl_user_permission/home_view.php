<div class="container">

<h3 class="text-center"><?php echo $header;?></h3>
   <div id="flash_box"></div>
  <div class="row">
  
   <div class="col-md-1">
        <button type="button" class="btn btn-primary" id="button_add"
        data-toggle="tooltip" data-placement="bottom" title="Add Acl USer Permission"><span class="glyphicon glyphicon-plus"></span></button></br><br>
    </div>
  
    <div class="col-md-7">
     <?php $this->load->view('search_view',$data); ?>
    </div>
         <div id="acl_user_permission_body">
      <?php echo $this->load->view('home_detail_view',$data,TRUE); ?> 
    </div>  
	
</div>

<!-- loading delete form -->
<?php $this->load->view('delete_modal_view'); ?>

<!-- Bootstrap Modal begin -->
<?php $this->load->view('modal_view'); ?>
 <script type="text/javascript" src="<?php echo base_url();?>asset/common/js/acl_user_permission.js"></script>