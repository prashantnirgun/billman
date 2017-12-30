
<div class="container">

 <h3 class="text-center">Attendence</h3>
    <div id="flash_box"></div>

   <ul class="nav nav-tabs" id="feedtab">
        <li class="active"><a href="#employee_header" data-toggle="tab" id="tab_employee">Employee</a></li>
        <li><a href="#attendence_header" data-toggle="tab" id="tab_attendence">Attendence</a></li>
    </ul>

  <div class="tab-content">
    <br>
    
     <div class="tab-pane active" id="employee_header"> 
      <?php $this->load->view('attendence/search_view',$data); ?> 
      <div id="employee_body">
      <?php $this->load->view('attendence/home_detail_view',$data); ?> 
      </div>
      <div id="attendence_detail_list"></div>
     </div>

   <div class="tab-pane" id="attendence_header"> 
    <?php $this->load->view('attendence/detail_view'); ?>
    <div id="attendence_body">   </div>
    </div>
   </div>
</div>

<!-- loading delete form -->
<?php $this->load->view('delete_modal_view'); ?>

<!-- Bootstrap Modal begin -->
<?php $this->load->view('attendence/modal_view');?>
<!-- loading attendence js file -->
<script type="text/javascript" src="<?php echo base_url();?>asset/common/js/attendence.js"></script>

 