
    <form class="form-inline" action="<?php echo base_url();?>account_group" id="account_group_search_form" method="POST">
     
         <label>Head</label>
         <?php echo form_dropdown('account_head_id',$account_head_dropdown,$column_name,array('class'=>'form-control','id'=>'account_head_id')); ?>
         <label>Name</label>
          <input type="search" class="form-control" placeholder="search" name="search_value" id="search_value" value="<?php echo $search_value;?>">  
        <button type="submit" class="btn btn-success" value="Search"  id="search_btn"/><span class="glyphicon glyphicon-search"></span></button></br></br>
       
    </form>
