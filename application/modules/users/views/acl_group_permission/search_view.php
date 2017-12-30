
    <form class="form-inline" action="<?php base_url();?>acl_group_permission" id="acl_search_form" method="POST">
         <label>Group</label>
        <?php 
         $user_group_dropdown[0]       = 'All Group';
            ksort($user_group_dropdown);
        echo form_dropdown('user_group_id',$user_group_dropdown,set_value('user_group_id'),array('class'=>'form-control','id'=>'user_group_id')); ?>
         <label>ACL Name</label>
          <input type="search" class="form-control" placeholder="search" name="search_value" id="search_value" value="<?php echo $search_value;?>">  
        <button type="submit" class="btn btn-success" value="Search"  id="search_btn"/><span class="glyphicon glyphicon-search"></span></button></br></br>
       
    </form>
