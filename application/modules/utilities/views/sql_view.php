<div class="container">

  <h3 class="text-center">SQL</h3>
  <div id="flash_box"></div>


  <form class="form-inline" action="<?php echo base_url();?>utility/get_result" method="POST">
  	<label>Query&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
	
	<label>&nbsp;Result&nbsp;</label>
	<select class="form-control" name="select_format">
		<option value="format">Formated</option>
		<option value="unformat">UnFormated</option>
	</select>
	&nbsp;&nbsp;<button type="submit" class="btn btn-primary" value="Search" name="sql_get"/><span class="glyphicon glyphicon glyphicon-flash"></span></button>
	<br><br>
	<textarea cols="167" rows="5" name="text_get" value=""></textarea>
  </form>
	
	<div>
  	  <?php if(empty($result))
  	   {
  	  	 $data = array();

  	    } else{

  	    	if($select_fomat == "format"){
  	    		var_dump_pre($result);
  	    	}else{
  	    		var_dump($result);	
  	    	}
  	    }
  	    //var_dump($data["result"]);
  	   
  	    ?>
  	</div>
   
</div>