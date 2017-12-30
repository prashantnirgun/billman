
<div class="container">
  <h3 class="text-center"><?php echo $header;?></h3>
  <div id="flash_box"></div>
  
   <ul class="nav nav-tabs">
    <li class="nav-item active">
      <a class="nav-link active" data-toggle="tab" href="#general_header" role="tab" id="tab_general">General</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  id="tab_email" data-toggle="tab" href="#email_header" role="tab">Email</a>
    </li>
   
  </ul>
	<div class="tab-content">
	    <div class="tab-pane active" id="general_header" role="tabpanel"> 
	    <br/>
	   		<div class="row">
	   			<div class="col-xs-12 col-md-6">
		            <div class="form-group">
		                <label for="settings[default_language]" class="control-label">
		                    Language                </label>
		                <select name="settings[default_language]" class="input-sm form-control">
                                    <option value="english"
                        selected="selected">English</option>
                        </select>
		            </div>
        		</div>
        		<div class="col-xs-12 col-md-6">
		            <div class="form-group">
		                <label for="settings[default_language]" class="control-label">Fist day of week </label>
		                <select name="settings[first_day_of_week]" class="input-sm form-control">
                            <option value="0" selected="selected">Sunday</option>
                            <option value="1">Monday</option>
                            <option value="2">Tuesday</option>
                            <option value="3">Wednesday</option>
                            <option value="4">Thursday</option>
                            <option value="5">Friday</option>
                            <option value="6">Saturday</option>
                        </select>
		            </div>
        		</div> 		
	   		</div>
	   		<div class="row">
	   			<div class="col-xs-12 col-md-6">
	   				<div class="form-group">
                		<label for="settings[default_country]" class="control-label">  Default country </label> 
                		 <?php echo form_dropdown('country_id',$country_dropdown,'',array('style'=>'width:100%','class'=>'form-control','id'=>'country_id')); ?> 
                	</div>   
        		</div>

		        <div class="col-xs-12 col-md-6">
		            <div class="form-group">
		                <label for="settings[date_format]" class="control-label">Date Format</label>
		                <select name="settings[date_format]" class="input-sm form-control">
		                 	<option value="m/d/Y">11/26/2016</option>
		                 	<option value="m-d-Y">11-26-2016</option>
                          	<option value="m.d.Y">11.26.2016</option>
                            <option value="Y/m/d">2016/11/26</option>
                            <option value="Y-m-d">2016-11-26</option>
                            <option value="Y.m.d">2016.11.26</option>
                            <option value="d/m/Y">26/11/2016</option>
                            <option value="d-m-Y" selected="selected">26-11-2016</option>
                            <option value="d-M-Y">26-Nov-2016</option>
                            <option value="d.m.Y">26.11.2016</option>
                            <option value="j.n.Y">26.11.2016</option>
                            <option value="d M,Y">26 Nov,2016</option>
                        </select>
			   		</div>
		        </div>
		    </div>
		    <hr/>

		<h4>Amount Settings</h4>
    	<br/>

	    <div class="row">
	        <div class="col-xs-12 col-md-6">
	            <div class="form-group">
	                <label class="control-label">
	                    Currency Symbol                </label>
	                <input type="text" name="settings[currency_symbol]" class="input-sm form-control"
	                       value="Rs.">
	            </div>
	        </div>
	        <div class="col-xs-12 col-md-6">
	            <div class="form-group">
	                <label for="settings[currency_symbol_placement]" class="control-label">
	                    Currency Symbol Placement                </label>
	                <select name="settings[currency_symbol_placement]" class="input-sm form-control">
	                    <option value="before" selected="selected">Before Amount</option>
	                    <option value="after">After Amount</option>
	                    <option value="afterspace">After Amount with nonbreaking space</option>
	                </select>
	            </div>
        	</div>
	    </div>
	    <div class="row">
	        <div class="col-xs-12 col-md-6">
	            <div class="form-group">
	                <label for="settings[thousands_separator]" class="control-label">
	                    Thousands Separator                </label>
	                <input type="text" name="settings[thousands_separator]" class="input-sm form-control" value=",">
	            </div>
	        </div>

	        <div class="col-xs-12 col-md-6">
	            <div class="form-group">
	                <label for="settings[decimal_point]" class="control-label">Decimal Point</label>
	                <input type="text" name="settings[decimal_point]" class="input-sm form-control" value=".">
	            </div>
	        </div>
    </div>
     <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="form-group">
                <label class="control-label">Tax Rate Decimal Places</label>
                	<select name="settings[tax_rate_decimal_places]" class="input-sm form-control" 
                	id="tax_rate_decimal_places">
                    <option value="2" selected="selected">2</option>
                    <option value="3">3</option>
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-md-6">
            <div class="form-group">
                <label class="control-label"> Number of Items in Lists </label>
                	<select name="settings[default_list_limit]" class="input-sm form-control"
                        id="default_list_limit">
                    <option value="15" selected="selected"> 15</option>
                    <option value="25">25 </option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>
    </div>
      <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="form-group">
                <label class="control-label">Currency Code </label>
                <input type="text" name="settings[currency_code]" class="input-sm form-control" value="INR">
            </div>
        </div>
    </div>

    <hr/>
    <h4>Dashboard</h4>
    <br/>

    <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="form-group">
                <label for="settings[quote_overview_period]" class="control-label"> Quote Overview Period  </label>
                	<select name="settings[quote_overview_period]" class="input-sm form-control">
                    <option value="this-month" selected="selected">This Month</option>
                    <option value="last-month">Last Month</option>
                    <option value="this-quarter">This Quarter</option>
                    <option value="last-quarter">Last Quarter</option>
                    <option value="this-year">This Year</option>
                    <option value="last-year">Last Year</option>
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-md-6">
            <div class="form-group">
                <label for="settings[invoice_overview_period]" class="control-label">
                    Invoice Overview Period                </label>
                <select name="settings[invoice_overview_period]" class="input-sm form-control">
                    <option value="this-month" selected="selected">This Month</option>
                    <option value="last-month">Last Month</option>
                    <option value="this-quarter">This Quarter</option>
                    <option value="last-quarter">Last Quarter</option>
                    <option value="this-year">This Year</option>
                    <option value="last-year">Last Year</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="form-group">
                <label class="control-label">Disable the Quickactions</label>
                <select name="settings[disable_quickactions]" class="input-sm form-control" id="disable_quickactions">
                    <option value="0" selected="selected">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>
        </div>
    </div>

    <hr/>
    <h4>Interface</h4>
    <br/>

     <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="form-group">
                <label class="control-label">Disable the Sidebar </label>
                <select name="settings[disable_sidebar]" class="input-sm form-control" id="disable_sidebar">
                    <option value="0">No</option>
                    <option value="1"selected="selected">Yes</option>
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-md-6">
            <div class="form-group">
                <label class="control-label">Custom Title </label>
                <input type="text" name="settings[custom_title]" class="input-sm form-control" value="">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label">Use a Monospace font for amounts  </label>
        <select name="settings[monospace_amounts]" class="input-sm form-control" id="monospace_amounts">
            <option value="0">No</option>
            <option value="1">Yes</option>
        </select>

        <p class="help-block">
            Example:
        <span style="font-family: Monaco, Lucida Console, monospace"> Rs.123,456.78 </span>
        </p>
    </div>

    <div class="form-group">
        <label class="control-label"> Login Logo </label>
            <input type="file" name="login_logo" size="40" class="input-sm form-control"/>
    </div>

    <hr/>
    <h4>System Settings</h4>
    <br/>
    <div class="form-group">
        <label for="settings[bcc_mails_to_admin]" class="control-label">
        Send all outgoing emails as BCC to the admin account </label>
        <select name="settings[bcc_mails_to_admin]" class="input-sm form-control">
            <option value="0">No</option>
            <option value="1">Yes</option>
        </select>

        <p class="help-block">The admin account is the account that was created while installing InvoicePlane.</p>
    </div>

    <div class="form-group">
        <label for="settings[cron_key]" class="control-label"> CRON Key</label>

        <div class="row">
            <div class="col-xs-8 col-sm-9">
                <input type="text" name="settings[cron_key]" id="cron_key"
                       class="input-sm form-control"
                       value="feZAFxDo1TdVu0nE">
            </div>
            <div class="col-xs-4 col-sm-3">
                <input id="btn_generate_cron_key" value="Generate"
                       type="button" class="btn btn-primary btn-sm btn-block">
            </div>
        </div>
    </div>


    <div class="form-group">
        <label class="control-label"> Enable the Debug Mode</label>
        <select name="settings[enable_debug]" class="input-sm form-control"
                id="disable_sidebar">
            <option value="0" selected="selected">No </option>
            <option value="1">Yes</option>
        </select>
    </div>

</div>

	<div class="tab-pane" id="email_header">
	   <br>
	    <div class="row">
	    	<div class="col-xs-12 col-md-6">
			    <div class="form-group">
			        <label for="settings[email_send_method]" class="control-label"> Email Sending Method </label>
			        <select name="settings[email_send_method]" id="email_send_method" class="input-sm form-control">
			            <option value=""></option>
			            <option value="phpmail"> PHP Mail</option>
			            <option value="sendmail">Sendmail </option>
			            <option value="smtp">SMTP</option>
			        </select>
			    </div>
			</div>
		</div>	

		<div class="row">
			<div class="col-xs-12 col-md-6">
				<div class="form-group">
				    <label for="settings[email_pdf_attachment]">Attach Quote/Invoice on email?</label>
				    <select name="settings[email_pdf_attachment]" class="input-sm form-control">
				        <option value="0">No </option>
				        <option value="1" selected="selected">Yes</option>
				    </select>
				</div>    
			</div>
		</div>      

	</div>
</div>
    <!-- <div id="system_property_body">
      <?php //echo $this->load->view('home_detail_view',$data,TRUE); ?> 
    </div>   -->
</div>

<!-- loading delete form -->
<?php $this->load->view('delete_modal_view'); ?>
<!-- Bootstrap Modal begin -->
<?php $this->load->view('modal_view'); ?>

<script type="text/javascript" src="<?php echo base_url();?>asset/common/js/system_property.js"></script>


