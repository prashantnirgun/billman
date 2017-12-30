
<div class="container">
  <h3 class="text-center">User</h3>
  <div id="flash_box"></div>
  <ul class="nav nav-tabs">
    <li class="nav-item active">
      <a class="nav-link active" data-toggle="tab" href="#user_header" role="tab" id="tab_user">User</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  id="tab_user_home_detail" data-toggle="tab" href="#user_detail_header" role="tab">Detail</a>
    </li>
      <li class="nav-item">
      <a class="nav-link"  id="tab_user_password_change" data-toggle="tab" href="#user_password_change_header" role="tab">Password Change</a>
    </li>
    
   
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <div class="tab-pane active" id="user_header" role="tabpanel"> 
    <br>
    <div class="row">
<?php if($create_permission == 'Y') { ?>
      <div class="col-md-1">
         <button type="button" class="btn btn-primary"
                data-toggle="tooltip" data-placement="bottom" title="Add Member" id="button_add" ><span class="glyphicon glyphicon-plus"></span></button>  
      </div>
<?php }?>
      <div class="col-md-7">
      <?php echo $this->load->view('user/search_view',$data,TRUE); ?> 
      </div>
    </div>
  
  
        <div id="user_body"> 
       <?php echo $this->load->view('user/home_detail_view',$data,TRUE); ?> 
      </div>  
      
    </div>

    <div class="tab-pane" id="user_detail_header"> 
    <?php $this->load->view('user/panel_view'); ?> 
    </div>

    <div class="tab-pane" id="user_password_change_header"> 
     <?php $this->load->view('user/password_change_view'); ?> 
    </div>
    
    </div>
    
  </div>
</div>
<!-- loading delete form -->
<?php $this->load->view('delete_modal_view'); ?>


 <script type="text/javascript" src="<?php echo base_url();?>asset/common/js/user.js"></script> 