
<div class="container">
  <div  id="header1">
    <center><b><h3 id="header_voucher_type"></h3></b></center>
  </div>
<div id="flash_box"></div>

<script type="text/javascript">

</script>
  <ul class="nav nav-tabs">
      <li class="active"><a href="#voucher_header" data-toggle="tab" id="tab_voucher">Receipt</a></li>
     <li><a href="#voucher_detail_header"  data-toggle="tab" id="tab_voucher_detail">Detail</a></li>
     <li><a href="#document_upload_header"  data-toggle="tab" id="tab_document_upload">Document</a></li>
  </ul>

<input type="hidden" id="voucher_type" name="voucher_type" value="<?php echo $type; ?>" > 

  <div class="tab-content">
    <br>
      <div class="tab-pane fade active in" id="voucher_header">
       <?php $this->load->view('voucher/search_view');?>
        <div id="voucher_body">
         <?php echo $this->load->view('voucher/home_detail_view',$data,TRUE); ?>
        </div>
      </div>

  	<div class="tab-pane fade" id="voucher_detail_header">

    	 <div id="voucher_detail_body">
       <?php $this->load->view('voucher/panel_detail_view'); ?>

    	 </div>
     </div>
     <div class="tab-pane fade" id="document_upload_header">

       <div id="document_list_body">
    
       </div>
     </div>
 </div>
 
<!-- loading delete form -->
<?php $this->load->view('delete_modal_view'); ?>

<?php /*$this->load->view('document_uploads/modal_view'); */?>
<?php /* $this->load->view('loan/loan_modal_view'); */ ?>
<?php /* $this->load->view('general_ledger/modal_view'); */ ?>
<?php /* $this->load->view('voucher_type_modal'); */ ?>
<script type="text/javascript" src="<?php echo base_url();?>asset/common/js/voucher.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/common/js/dropdown.js"></script>
