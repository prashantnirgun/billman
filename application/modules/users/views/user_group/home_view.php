
<div class="container">

	<h3><center>User Group</center></h3>
	<div id="flash_box"></div>
	<div class="row">
  <?php if($create_permission == 'Y') { ?>
	   <div class="col-md-1">
         <button type="button" class="btn btn-primary"
            data-toggle="tooltip" data-placement="bottom" title="Add User Group" id="button_add" ><span class="glyphicon glyphicon-plus">  
            </span></button>  
      </div>
  <?php }?>
      <div class="col-md-5">
			<?php $this->load->view('user_group/search_view',$search);?>
      </div>
  </div><!--end row-->
	
    
    <div id="user_group_body"> 
      <?php echo $this->load->view('user_group/home_detail_view',$data,TRUE);  ?> 
	</div>  
</div><!-- end of contaniner -->

<!-- loading delete form -->
<?php $this->load->view('delete_modal_view'); ?>

<!-- Bootstrap Modal begin -->
    <?php $this->load->view('user_group/modal_view');?>

<script type="text/javascript" src="<?php echo base_url();?>asset/common/js/user_group.js"></script> 