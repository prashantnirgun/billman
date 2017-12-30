
     <form class="form-inline" action="<?php echo base_url();?>general_ledger" method="POST">
            
              <label>Group Name</label>
               
               <?php echo form_dropdown('account_group_id',$account_group_dropdown,$column_name,array('class'=>'form-control','id'=>'general_ledger_search_account_group_id')); ?>
              <label>Name</label>
                <input type="search" class="form-control" placeholder="search" name="search_value" value="<?php echo $search_value ;?>">
                  
                <button type="submit" class="btn btn-success" value="Search"/><span class="glyphicon glyphicon-search"></span></button></br></br>
              
        </form></br>
