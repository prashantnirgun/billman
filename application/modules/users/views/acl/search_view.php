
    <form class="form-inline" action="<?php base_url();?>acl" id="acl_search_form" method="POST">
     
         <label>Module Name</label>
          <input type="search" class="form-control" placeholder="search" name="search_value" id="search_value" value="<?php echo $search_value;?>">  
        <button type="submit" class="btn btn-success" value="Search"  id="search_btn"/><span class="glyphicon glyphicon-search"></span></button></br></br>
       
    </form>
