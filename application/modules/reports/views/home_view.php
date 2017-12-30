

<div class="container">

<h3 class="text-center"><?php echo $header;?></h3>
   <div id="flash_box"></div>
   <div class="row">

   <div class="col-md-12">
     <?php $this->load->view('search_view',$search); ?>
     
   </div>
   </div>
        
       
    <div id="report_body">

      <?php echo $this->load->view('home_detail_view',$data,TRUE) ;?> 
    </div>  
  
</div>

<script type="text/javascript">
   $('#voucher_type_id').select2({ theme: "bootstrap"});

</script>
