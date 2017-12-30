<!DOCTYPE html>
<html lang="en">
	<head>
    	<title>Table</title>
  		<meta charset="utf-8">
		  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

		  <link rel="icon" href="<?=base_url()?>asset/favicon.ico" type="image/ico">

    	<!-- Bootstrap 3.3.5 -->
    	<link rel="stylesheet" href="<?php echo base_url('asset/'.$admin_theme); ?>/bootstrap/css/bootstrap.min.css">

    	<!-- Theme style -->
    	<link rel="stylesheet" href="<?php echo base_url('asset/'.$admin_theme); ?>/dist/css/AdminLTE.min.css">

    	<!-- select2 -->
    	<link rel="stylesheet" href="<?php echo base_url('asset/'.$admin_theme); ?>/plugins/select2/select2.css">

    	<link rel="stylesheet" href="<?php echo base_url('asset/'.$admin_theme); ?>/bootstrap/css/select2-bootstrap.min.css">

    	<!-- datepicker -->
      <link rel="stylesheet" href="<?php echo base_url('asset/'.$admin_theme); ?>/plugins/datepicker/datepicker3.css">

      <!-- JavaSript Begins -->
    	<!-- jQuery 2.1.4 -->
    	<script src="<?php echo base_url('asset/'.$admin_theme); ?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>

    	<!-- Bootstrap 3.3.5 -->
    	<script src="<?php echo base_url('asset/'.$admin_theme); ?>/bootstrap/js/bootstrap.min.js"></script>

     	<!-- select2 plugins) -->
     	<script src="<?php echo base_url('asset/'.$admin_theme); ?>/plugins/select2/select2.min.js"></script>

    	<!-- bootstrap datepicker plugins) -->
    	<script src="<?php echo base_url('asset/'.$admin_theme); ?>/plugins/datepicker/bootstrap-datepicker.js"></script>

    	<script type='text/javascript' src="<?php echo base_url(); ?>asset/common/js/admin/common.js"></script>
      <script type='text/javascript' src="<?php echo base_url(); ?>asset/common/js/admin/form_edit.js"></script>
		  <script type='text/javascript' src="<?php echo base_url(); ?>asset/common/js/v.js"></script>

      <!-- Latest Sortable -->
      <script src="//rubaxa.github.io/Sortable/Sortable.js"></script>

      <style>
  
  body {
  
}

.glyphicon-move {
  cursor: move;
  cursor: -webkit-grabbing;
}
</style>
  </head>
  <body>
  	<div class="container">
      <br/><br/>
      <div id="header"></div>
      <br/>
      <input type="button" name="btn_add" class="btn btn-primary" value="Add" onclick="add()">
      <input type="button" name="btn_save" class="btn btn-primary" value="Save" onclick="save()">
      <br/><br/>
      <div id="header_data_div"></div>
      <br/>
      <div id="detail_data_div" class="list-group"></div>
      <br/>
      <div id="hidden_data"></div>
      

      <!-- <select class="dropdown"></select> -->
       <br/><br/><br/><br/><br/><br/> <br/><br/><br/> 
  	</div>
  </body>

  </html>