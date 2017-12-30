 
 <br>
    <div id="attendence_area">
     
        <div class="row">
        <?php if($create_permission == 'Y') { ?>

        <div class="col-md-1">
          <button type="button" class="btn btn-primary" id="button_add"
          data-toggle="tooltip" data-placement="bottom" title="Add Attendence"><span class="glyphicon glyphicon-plus"></span></button>
        </div>
        <?php } ?>
         <form class="form-inline" action="" method="POST" onsubmit="return false">
            <div class="col-md-6 col-md-offset-5">
                <label>Date</label>
               <input type="text" placeholder="Start Date" class="form-control datepicker" name="in_date" id="in_date" value="">
                <label>To</label>
                <input type="text" placeholder="Last Date" class="form-control datepicker" name="out_date" id="out_date" value="">
                <input type="button" class="btn btn-success" value="Search" id="button_search" name="button_search"/></br></br>
            </div>
        </form>
    </div>
  </div>
<div id="attendence_count_area"></div>