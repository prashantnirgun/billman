<div class="container">

<h3 class="text-center"><?php echo $header;?></h3>
   <div id="flash_box"></div>
   	<div class="row">
    <?php if($create_permission == 'Y') { ?>
   		<div class="col-md-1">
   			 <button type="button" class="btn btn-primary" id="button_add"
        data-toggle="tooltip" data-placement="bottom" title="Add Acl"><span class="glyphicon glyphicon-plus"></span></button>
   		</div>
    <?php } ?>
   		<div class="col-md-7 col-sm-8">
   			<?php $this->load->view('search_view',$data); ?>
        </div>
   	</div>
       
        
         <div id="acl_group_permission_body">
   	 
      <?php echo $this->load->view('home_detail_view',$data,TRUE);   ?> 
    </div>  
	
</div>

<!-- loading delete form -->
<?php $this->load->view('delete_modal_view'); ?>

<!-- Bootstrap Modal begin -->
<?php $this->load->view('modal_view'); ?>
 <script type="text/javascript" src="<?php echo base_url();?>asset/common/js/acl_group_permission.js"></script>