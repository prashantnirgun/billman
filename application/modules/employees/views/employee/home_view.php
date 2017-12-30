
<div class="container">

  <h3 class="text-center">Employee</h3>
  <div id="flash_box"></div>

  <ul class="nav nav-tabs" id="feedtab">
      <li class="active"><a href="#employee_header" data-toggle="tab" id="tab_employee">Employee</a></li>
      <li><a href="#employee_detail_header" data-toggle="tab" id="tab_employee_detail">Employee Details</a></li>
  </ul>

<div class="tab-content">

   <div class="tab-pane active" id="employee_header"> 
   <br> <br>
   <?php if($create_permission  == 'Y') { ?>
    <button type="button" class="btn btn-primary" id="button_add"
        data-toggle="tooltip" data-placement="bottom" title="Add Employee"><span class="glyphicon glyphicon-plus"></span>
    </button></br><br>
  <?php } ?>
    <div id="employee_body">
      <?php  echo $this->load->view('employee/home_detail_view',$data,TRUE); ?> 
    </div>
   </div>

    <div class="tab-pane" id="employee_detail_header">
      </br></br>
      <div id="employee_detail_body"></div>
        <?php $this->load->view('employee/panel_view'); ?>
    </div>
  </div>
</div><!-- end of container -->

<!-- loading delete form -->
<?php $this->load->view('delete_modal_view'); ?>
<!-- Bootstrap Modal begin -->

<script type="text/javascript" src="<?php echo base_url();?>asset/common/js/employee.js"></script>