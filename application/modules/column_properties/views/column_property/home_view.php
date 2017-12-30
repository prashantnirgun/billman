
<div class="container">
  <h3 class="text-center"><?php echo $header; ?></h3>
  <div id="flash_box"></div>
  <ul class="nav nav-tabs">
    <li class="nav-item active">
      <a class="nav-link active" data-toggle="tab" href="#column_property_header" role="tab" id="tab_column_property">Column Property</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  id="tab_column_client_property" data-toggle="tab" href="#column_client_property_header" role="tab">Column Client Property</a>
    </li>
    
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <div class="tab-pane active" id="column_property_header" role="tabpanel"> 

   <br>

        <div id="column_property_body"> 
         <?php $this->load->view('column_property/search_view',$data); ?>
        <?php 
         // $data['result'] = $result;
          $output = $this->load->view('column_property/home_detail_view',$data,TRUE); 
          echo $output ; 
        ?> 
      </div>  
      
    </div>

    <div class="tab-pane" id="column_client_property_header"> 
        <div id="client_column_property_body">
          
        </div>
    </div>
      
     </div>
    </div>
    
  </div>
</div>
<!-- loading delete form -->
<?php $this->load->view('delete_modal_view'); ?>
<?php $this->load->view('column_property/modal_view'); ?>
<?php $this->load->view('client_column_property/modal_view'); ?>
<script type="text/javascript" src="<?php echo base_url();?>asset/common/js/column_property.js"></script>