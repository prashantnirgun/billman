<?php   // $status_dropdown = $this->common_model->get_by_custom_where('property_view','property_dropdown','column_value = "User_status"','KEY');
?>
 <form class="form-inline" action="<?php echo base_url();?>user" method="POST">
         <label>Group</label>
      <?php
       echo form_dropdown('user_group_id',$user_group_dropdown,set_value('user_group_id'),array('class'=>'form-control','id'=>'user_group_id_search')); ?>
        <label>&nbsp;Status&nbsp;</label>
      <?php
       echo form_dropdown('user_status_id',$status_dropdown,set_value('user_group_id'),array('class'=>'form-control','id'=>'user_status_id_search')); ?>
     
       <label>&nbsp;Name&nbsp;</label>
      <input type="text" class="form-control" placeholder="search" name="search_value" value="<?php echo $search_value;?>">
      <button type="submit" class="btn btn-success" value="Search">
        <span class="glyphicon glyphicon-search">
        </span>
      </button>
      
    </form>
</br>
