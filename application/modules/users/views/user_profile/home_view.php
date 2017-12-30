
<div class="container">
  <h3>User Profile</h3>
<?php// var_dump($profile_data);?>
  <div class="row">
     <div class="col-md-3">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo get_user_image_filename('../'); ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $profile_name;?></h3>

              <p class="text-muted text-center" id="designation">DON</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
            <!-- /.box-body -->
          </div>
      </div><!-- end div col-md-3 -->
      <div class="col-md-9" style="">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs" >
            <li class="nav-item active">
              <a class="nav-link active" data-toggle="tab" href="#user_header" role="tab" id="tab_user">User</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"  id="tab_user_profile" data-toggle="tab" href="#user_profile_header" role="tab">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"  id="tab_user_password_change" data-toggle="tab" href="#user_password_change_header" role="tab">Password Change</a>
            </li>
          </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="user_header" role="tabpanel">
          <div id="user_body">
          <br/>
           <?php  $this->load->view('user_profile/user_panel_view'); ?>
          </div>
          </div>

           <div class="tab-pane" id="user_profile_header">
         
           <div id="user_profile_body"><br/>
            <?php
                     
               $data['$profile_data'] = $profile_data;
              //var_dump($data);
              if(!empty($profile_data))
              {

               $output = $this->load->view('user_profile/user_profile_panel_view',$data,TRUE);
              }
              else{
                $output = $this->load->view('user_profile/user_profile_panel_view_blank',$data,TRUE);
              }
              echo $output ;
             ?> 
           </div>
         </div>
           <div class="tab-pane" id="user_password_change_header">
           <?php $this->load->view('user_profile/change_password_view'); ?>
                    </div> 
      </div>

</div>
  </div><!-- end row -->
</div><!-- end container -->
<!-- loading delete form -->
<?php $this->load->view('delete_modal_view'); ?>


 <script type="text/javascript" src="<?php echo base_url();?>asset/common/js/user_profile.js"></script>
