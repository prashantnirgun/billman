
<div class="container">
  <h3 class="text-center"><?php echo $header; ?></h3>
  <div id="flash_box"></div>

  <ul class="nav nav-tabs">
      <li class="active"><a href="#invoice_header" data-toggle="tab" id="tab_invoice">Invoice</a></li>
      <li><a href="#invoice_detail_header" data-toggle="tab" id="tab_invoice_detail">Detail</a></li>
  </ul>
  <br>
  <div class="tab-content">
    <div class="tab-pane active" id="invoice_header"> 
        

      <?php $this->load->view('invoice/search_view',$search);?>
      <div id="bill_body">  
        <?php echo $this->load->view('invoice/home_detail_view',$data,TRUE);  ?> 
      </div>
    </div>
    <div class="tab-pane" id="invoice_detail_header">
    
        <div id="invoice_detail_header_body">
          <?php $this->load->view('invoice/panel_view', $panel_data); ?>
        </div>
    </div>
  </div>
</div>

<!-- loading delete form -->
<?php $this->load->view('delete_modal_view'); ?>
<!-- <?php //$this->load->view('invoice_item/modal_view'); ?> -->
<?php $this->load->view('general_ledger/modal_view'); ?>
<?php $this->load->view('product/modal_view'); ?>

<link href="<?php echo base_url();?>asset/css/toggle.css" rel="stylesheet">
<script src="//rubaxa.github.io/Sortable/Sortable.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/common/js/form_edit.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/common/js/invoice.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/common/js/dropdown.js"></script>