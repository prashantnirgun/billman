

    <form class="form-inline" action="<?php base_url();?>acl_user_permission" id="acl_search_form" method="POST">
      
         <label>User</label>
       <?php  $user_dropdown[0]   = 'All User';
         ksort($user_dropdown);
      echo form_dropdown('user_id',$user_dropdown,set_value('user_id'),array('class'=>'form-control','id'=>'user_id')); ?>
         <label>ACL Name</label>
          <input type="search" class="form-control" placeholder="search" name="search_value" id="search_value" value="<?php echo $search_value;?>">  
        <button type="submit" class="btn btn-success" value="Search"  id="search_btn"/><span class="glyphicon glyphicon-search"></span></button></br></br>
    </form>
