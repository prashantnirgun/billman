
     <form class="form-inline" action="<?php echo base_url();?>user_group" method="POST">
       <label>Status </label>
           <?php echo form_dropdown('user_group_status_id',$status_dropdown,$user_status_select,array('class'=>'form-control','id'=>'user_group_status_id_search')); ?>
           <label>&nbsp;Name&nbsp;</label>
            <input type="text" class="form-control" placeholder="search" name="search_value" id="search_value" value="<?php echo $search_value ;?>">
     
        <button type="submit" class="btn btn-success" value="Search"/><span class="glyphicon glyphicon-search"></span></button>
      
    </form>

</br></br>