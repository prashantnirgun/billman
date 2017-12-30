
<?php ///echo $search_value;?>
 <div class="row">
        <form class="form-inline" action="<?php echo base_url();?>attendence" method="POST">
            <div class="col-md-6 ">
                <label> Name</label>
              
              <select class="form-control" name="criteria" id="criteria">
                <option value="1">Starting With</option>
                <option value="2">Contaiing</option>
                <option value="3">Exact with</option>
                <option value="4">Ending with</option>
              </select>
              <input type="search" class="form-control" placeholder="search" name="search" value="<?php echo $search_value;?>" />
              <button type="submit" class="btn btn-success" value="<?php echo $search_value; ?>"  id="search_btn"/><span class="glyphicon glyphicon-search"></span></button></br></br>
                
            </div>
        </form>
    </div>