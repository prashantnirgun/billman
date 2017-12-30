
<div class="container">
  <?php echo validation_errors(); ?>
  <h3 class="text-center" id="item_heading" ><?php echo $header; ?></h3>
  <div id="flash_box"></div>

  <ul class="nav nav-tabs">
     <li class="active"><a href="#item_category_header" data-toggle="tab" id="tab_item_category">Category</a></li>
     <li><a href="#item_header" id="tab_item" data-toggle="tab">item</a></li>  
     <li><a href="#item_detail_header" id="tab_item_detail" data-toggle="tab">Details</a></li>  
     <li><a href="#item_tax_header" id="tab_item_tax" data-toggle="tab">Tax</a></li>  
  </ul>

  <div class="tab-content">
   
    <div class="tab-pane fade active in" id="item_category_header"> 
      <br>
  
    <button type="button" class="btn btn-primary" id="button_add"
    data-toggle="tooltip" data-placement="bottom" title="Add item Category"><span class="glyphicon glyphicon-plus"></span>
    </button></br><br>
  

    <div id="item_category_body"> 
      <?php  $output  = $this->load->view('item_category/home_detail_view',$data,TRUE);  echo $output ; ?> 
    </div>  
  </div>

  <div class="tab-pane fade" id="item_header">
  </br>
  <button type="button" class="btn btn-primary" id="button_add"
    data-toggle="tooltip" data-placement="bottom" title="Add item"><span class="glyphicon glyphicon-plus"></span>
    </button></br><br>
      <div id="item_body">
       
      </div>
    </div>

    <div class="tab-pane fade" id="item_detail_header">
      <div id="item_body">
        <?php $this->load->view('item/panel_view', $panel_data);?>
      </div>
    </div>

     <div class="tab-pane fade" id="item_tax_header">
     </br>
  <button type="button" class="btn btn-primary" id="button_add"
    data-toggle="tooltip" data-placement="bottom" title="Add item tax"><span class="glyphicon glyphicon-plus"></span>
    </button></br></br>
      <div id="item_tax_body">
        
      </div>
    </div>

</div>

<!-- loading delete form -->
<?php $this->load->view('delete_modal_view'); ?>
<?php $this->load->view('item_category/modal_view'); ?>
<?php $this->load->view('item_tax/modal_view'); ?>
 <script type="text/javascript" src="<?php //echo base_url();?>asset/common/js/product.js"></script> 