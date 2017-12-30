<div class="row">

   <!--  <form class="form-inline" action="<?php // base_url();?>nominal_member" method="POST">
  -->
     <form class="form-inline" action="<?php echo base_url();?>column_property" method="POST">
     <div class="col-md-1">
      <button type="button" id="button_add" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Add column property"><span class="glyphicon glyphicon-plus"></span></button>
        <br><br>
     </div>
   <div class="col-md-4">
    <label>Column Name</label>
      <input type="text" class="form-control" placeholder="search" name="search" value="<?php echo $search_value;?>">
      <button type="submit" class="btn btn-success" value="Search">
        <span class="glyphicon glyphicon-search">
        </span>
      </button>
       </div>
    </form>
 
</div>