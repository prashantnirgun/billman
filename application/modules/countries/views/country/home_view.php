
<div class="container">
  <h3 class="text-center"><?php echo $header; ?></h3>
  <div id="flash_box"></div>
  <ul class="nav nav-tabs">
    <li class="nav-item active">
      <a class="nav-link active" data-toggle="tab" href="#country_header" role="tab" id="tab_country">Country</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  id="tab_state" data-toggle="tab" href="#state_header" role="tab">State</a>
    </li>
     <li class="nav-item">
       <a class="nav-link"  id="tab_city" data-toggle="tab" href="#city_header" role="tab">City</a>
   </li>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <div class="tab-pane active" id="country_header" role="tabpanel">
    <br>
    <?php if($create_permission == 'Y') { ?>
      <button type="button" id="button_add" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Add Country"><span class="glyphicon glyphicon-plus"></span></button>
    <?php }?>
     <input type="button" id="b1" onclick="// Display a warning toast, with no title
toastr.success('My name is Inigo Montoya. You killed my father, prepare to die!');" name="" value="start">
          <input type="button" id="b1" onclick="Pace.stop();" name="" value="stop">

      <br><br>

        <div id="country_body"> 
        <?php 
          //$data['result'] = $result;
          $output = $this->load->view('country/home_detail_view',$data,TRUE); 
          echo $output ; 
        ?> 
      </div>  
      
    </div>

    <div class="tab-pane" id="state_header"> 
      <div id="state_body">
      </div>
    </div> 
    <div class="tab-pane" id="city_header"> 
     <br>
     <button type="button" id="button_add" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Add City"><span class="glyphicon glyphicon-plus"></span></button>
      <br><br>
     
      <div id="city_body">
      </div>
    </div>    
  </div>
</div>
<!-- loading delete form -->
<?php $this->load->view('delete_modal_view'); ?>
<!-- loading modal form -->
<?php $this->load->view('country/modal_view'); ?>
<?php $this->load->view('state/modal_view'); ?>
<?php $this->load->view('city/modal_view'); ?>

<!-- loading country js file -->
<script type="text/javascript" src="<?php echo base_url();?>asset/common/js/country.js"></script>