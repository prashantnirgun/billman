//Instantiating
var Voucher 		= Object.create(Tab_prototype);
var Voucher_detail	= Object.create(Tab_prototype);
Voucher.set_controller('voucher');
Voucher_detail.set_controller('voucher_detail');
var Document_list 	= Object.create(Tab_prototype);
Document_list.set_controller('document_list');

var Loan 			= Object.create(Tab_prototype);
Loan.set_controller('loan');


var General_ledger 	= Object.create(Tab_prototype);
General_ledger.set_controller('general_ledger');

Voucher.display_type = 'panel';

//Gloabal variable declaration
var gl_data ;
var ready_data ;
var gl_json_data1 = []; //
var gl_json_data2 = []; //
var yes_var = 3; // check 
var no_var = 4; //
var convert_voucher_type_list = []; //convert voucher type


//temp / testing variable

function register_event()
{
	$('.table tr').on('click', function(e)
  {
    var target = event.target;
    if (target.nodeName == "SPAN")
    {
      var parent = target.parentElement;
     // currenttab = 'tab_voucher';
      //console.log('tab ',currenttab);
      if(currenttab == 'tab_voucher')
      {

       if (parent.id == "button_delete")
		{
			
			var id = parent.value;
			Voucher.set_check_box(id, true);
			Voucher_detail.fk_id = Voucher.set_id('chk_' + id);
			Voucher.load_delete_form(id, parent.getAttribute('data-message'));

		}
		if (parent.id == "button_transfer")
		{
			console.log(currenttab ,'button transfer');
			var id = parent.value;
			Voucher.set_check_box(id, true);
			Voucher_detail.fk_id = Voucher.set_id('chk_' + id);
			fn_2(id);

		}
      }
      if(currenttab == 'tab_document_upload')
		{
			if (target.nodeName == "SPAN")
			{
				var parent = target.parentElement;
				if (parent.id == "button_edit")
				{
					var id = parent.value;
					Document_list.id = id;
					Document_list.edit_method(id);
				}

				if (parent.id == "button_delete")
				{
					var id = parent.value;
					Document_list.set_check_box(id, true);
					Document_list.load_delete_form(id, parent.getAttribute('data-message'));
				}
			}
		}
     if(currenttab == 'tab_voucher_detail')
		{
			//.console.log(currenttab);
			var parent = target.parentElement;
			//console.log('parent ', parent);
			if (target.nodeName == "SPAN")
			{
				
				if (parent.id == "button_edit")
				{
			
					var voucher_detail_id = parent.value;		
					get_Voucher_Detail_Data(voucher_detail_id);
					//console.log('voucher_detail_id',voucher_detail_id); $("#span_credit_amount").html(' '); $("#span_debit_amount").html(' ');
					$("#debit_amount").removeClass("has-error ");
					$("#credit_amount").removeClass("has-error ");
					check_credit_debit();
					//total_amount();
				}
				if (parent.id == "button_delete")
				{ 
					if(currenttab =='tab_voucher_detail')
					{
						var row = parent.parentElement.parentElement;
						
						if(confirm("Are you Sure?"))
						{	
							row.cells[7].innerHTML = 'D';
							row.style.display='none';
							calculate_Total();
						}
					}

				}
			}
		}
    }

 });//end of table

	$('#voucher_receipt_date').datepicker({
		  format: "dd-mm-yyyy"
	});
	$('#voucher_cheque_date').datepicker({
		  format: "dd-mm-yyyy"
	});

	//check loan id
	 $( ".check_loan_id" ).on('click' , function(e){
     	
     	Loan.fk_id = Loan.set_id(this.id);
     	console.log('check',this.id,Loan.id);
     
		/*for ( var i = 1; i <= end; i++ )
		{
		    row = table.rows[i];
			console.log('change event',row.cells[0].innerHTML);
		}*/
    });

	$('.check_value').on('click' , function(e)
	{
		//this will handle check_box click event and set new.id and old.id
		Voucher.fk_id = Voucher.set_id(this.id);
		//console.log(Voucher.id);
		//console.log( ($(this).is(':checked')),Voucher.set_id(this.id));
	});

	

	$('[id= "button_add"]').on('click', function(e){
		//console.log(currenttab);
		currenttab = 'tab_document_upload';
		if(currenttab == 'tab_document_upload')
		{
			
			var data = {"result":[{"document_list_id":0,"document_list_table_name":Voucher.controller, "document_list_voucher_id":Voucher.id,"document_list_document_name":'',
									"document_list_image_file_name":'',"document_list_image_file_name":'',"document_list_archive_id":2}]};
			fill_data(data, Document_list.display_type, Document_list.display_type_id);
			//console.log(data);
		}
	});

	
	

} //End of function register_event()

function body_reload()
{
	if (currenttab == 'tab_voucher')
	{
		var id =  Voucher.id;
		Voucher.get_all_data_in_html(Voucher.controller + '_body');
	}
	if (currenttab == 'tab_voucher_detail')
	{
		var id =  Voucher.id;
		Voucher.get_all_data_in_html(Voucher.controller + '_body');
		$('#tab_voucher').trigger('click');
	}
	
} //End of function body_reload()

$(document).ready(function ()
{
	
	
	var voucher_type_data;
	//
	var voucher_data;
	///
	var voucher_detail_data;

	var voucher_type_member_dropdown ;
	var voucher_type_gl_dropdown ;

	//as table is added as sub view dynamically and to register the event
	register_event();
	var voucher_type = $('#voucher_type').val();
	
	//var convert_voucher_type_list_data = [];
	//Test
	/*
	var num = '$' + value.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
	console.log('currency',num);
	*/

	console.log(gl_data,'gl_data');
	//End Test
	$('#button_save_panel').on('click', function(e)
	{
	   	form_Voucher_Save();		
		body_reload();
	});


	$('#button_voucher_type_ok').on('click', function(e)
	{

		 console.log($('input[name="optradio"]:checked', '#voucher_type_form').val()); 
		 console.log('current id',Voucher.id);
		 var id = Voucher.id
		 var voucher_type_id = $('#voucher_type_id').val();
		 console.log('id',id,'Voucher',voucher_type_id);
		 $.ajax(
				{
					url: site_url() + "voucher/convert_voucher" ,
				    type: "GET",
				    data: {id:id,voucher_type_id: voucher_type_id},
				    dataType: "JSON",
				    success: function(data)
				    {
				    	console.log('data',data);
				    	delete_row_voucher(id);
				    	$("#voucher_type_modal").modal('hide');

				    },
					error: function (jqXHR, textStatus, errorThrown) { alert('Error ' + textStatus + ' ' + errorThrown); }
				});
		
			
	});
	

	function get_ajax_otpgroup(data)
	{
		
		//$("#voucher_genaral_ledger_id").select2({placeholder: "Select a state",allowClear: true});
		//gl_json_data1.push('');
		//console.log($("#voucher_genaral_ledger_id option"));
		//data.push({'text': 'aaa', 'children' : [{'id' : 10, 'text': 'aaa'}]});
		//$('#e10').select2({data: data});
		var voucher_type_data = data.result.voucher_type;
		var gl_data = data.result.gl;

		var gl_length = Object.keys(gl_data).length;
		var voucher_type_length = Object.keys(voucher_type_data).length;
		var voucher_type_id = $('#voucher_type_id').val();
		console.log(voucher_type_id,'voucher_type_id');
		for (var i = 0; i < gl_length; i++) 
		{
			var flag = false;
			for (var j = 0; j < voucher_type_length; j++) 
			{
				if(voucher_type_data[j]['id'] == voucher_type_id && voucher_type_data[j]['account_group_id'] == gl_data[i]['account_group_id'])
				{
					//console.log('voucher_type_data[j]',voucher_type_data[j]['id']);
					flag = true;
					break;
				}

			}

			if(flag)
			{		
				//gl_json_data1.push('');
				$('#voucher_genaral_ledger_id').html(' ');
				//$('#voucher_genaral_ledger_id optgroup[label= '+gl_data[i]['text']+'] option[value="'+gl_data[i]['children']+'"]').remove()				
				gl_json_data1.push({'text': gl_data[i]['text'] , 'children' : gl_data[i]['children']});				
				
			}
			else
			{
				gl_json_data2.push({'text': gl_data[i]['text'] , 'children' : gl_data[i]['children']});
			}

		}
		console.log('voucher_genaral_ledger_id data1', gl_json_data1);
		//console.log('data2', gl_json_data2);
		$('#voucher_genaral_ledger_id').select2({data: gl_json_data1,theme: "bootstrap"});
		$('#general_ledger_id_voucher_detail').select2({data: gl_json_data2,theme:"bootstrap"});
	}

	//console.log('voucher_type',voucher_type);
	$.ajax(
	{
		url: site_url() + "voucher/get_gl_ajax" ,
		//url: site_url() + "test/f1" ,
	    type: "POST",
	   	data: {voucher_type : voucher_type},
	    dataType: "JSON",
	    success: function(data)
	    {
	    	
	    	get_ajax_otpgroup(data);
	    	console.log('get gl ajax',data);
	    	fn_1(data);
	    	ready_data = data;
	    	console.log('get gl ajax',ready_data);
	    },
		error: function (jqXHR, textStatus, errorThrown) { alert('Error ' + textStatus + ' ' + errorThrown); }
	});
	  
	
	//set the default current tab
	currenttab = 'tab_voucher';
 
 	$('#voucher_member_id').select2({ theme: "bootstrap"});
 	$('#general_ledger_account_group_id').select2({ theme: "bootstrap"});
 	//$('#voucher_detail_general_ledger_id').select2({ theme: "bootstrap"});
 	//$('#voucher_genaral_ledger_id').select2({ theme: "bootstrap"});
	
	var element = document.getElementById("voucher_type_id");
	var opt = element.options[element.selectedIndex];
	 //$('#header_voucher_type').html(opt.text);
	//console.log(opt);
	if (typeof opt != 'undefined')
	{
		$('#header_voucher_type').html(opt.text);
	}

	$('#voucher_type_id').click(function(){
		var opt = element.options[element.selectedIndex];
		 //$('#header_voucher_type').html(opt.text);
		 $('#header_voucher_type').html(opt.text);
	});

	
	//document upload save 
	$('#document_list_form').submit(function(){
   	// $('input[type="submit"]').prop('disabled', false);
    var data = $('#file-upload').serialize();
    //var url = window.location.origin + '/' + Document.controller + '/form_validate'
    var url = site_url()+Document_list.controller +  '/form_validate'
    //console.log(url);
    $.ajax(
    {
      url : url,
      type: "POST",
      data:  new FormData(this),
      contentType: false,
      dataType: "JSON",
      cache: false,
      processData:false,
      success:function(data)
      {
      //  console.log(data);
        if(data.status)
        {
        	 // $('input[type="submit"]').prop('disabled', true);
          $('#' + Document_list.display_type_id + '_modal').modal('hide');
          Document_list.get_data_html(Voucher.id, Document_list.controller + '_body');
        }
      }
    });
    return false;
  });


/*	//jquery validation error.
$.validator.setDefaults({
    errorClass: 'help-block',
     //success: "valid",
    highlight: function(element) {
      $(element)
        .closest('.form-group')
        .addClass('has-error');
    },
    unhighlight: function(element) {
      $(element)
        .closest('.form-group')
        .removeClass('has-error');
    },
    errorPlacement: function (error, element) {
      if (element.prop('type') === 'checkbox') {
        error.insertAfter(element.parent());
      } else {
        error.insertAfter(element);
      }
    }
  });

//javascript Validation
$( "#voucher_form" ).validate({
  rules: {
    voucher_receipt_no: {
      minlength: 2,
      required: true,
      remote: 
      {
        url: site_url()+ "voucher/is_unique_receipt_no",
        type: "get",
        data: 
        {  

          branch_id : function() {
            return $( "#voucher_branch_id" ).val();
          },
          voucher_type_id : function() {
            return $( "#voucher_voucher_type_id" ).val();
          },
          receipt_no : function() {
            return $( "#voucher_receipt_no" ).val();
          }
        
        },
        beforeSend: function () 
        {
        	$("#button_save_panel").attr('disabled', true);
        	//$('#error_message').text('city name is already taken').addClass('has-error');
        },
        success: function (data) 
        {
        	if (data){
        		$("#button_save_panel").attr('disabled', false);
        	}
        	console.log(data);
        }
      },
    
     },
    
      },
      messages: {
		
		voucher_receipt_no: {
			required: 'Receipt no. is required',
			remote: "Receipt no. is already taken"
			//remote: jQuery.validator.format("city name is already taken")
		}
}
});*/
	// add loan id
	$("#add_loan_id").on('click',function(e)
	{
		$('#voucher_detail_loan_id').val(Loan.id);
		var table = document.getElementById("LoanSearchTable");
		var end = table.rows.length - 1;
		for ( var i = 1; i <= end; i++ )
		{
		    row = table.rows[i];
		    row.cells[6].innerHTML= Loan.id
			console.log('change event',row.cells[6].innerHTML= Loan.id);
			break;
		}
		deleteFormLoan() ;
		$('#loan_search_modal').modal('hide');
	});
	//save voucher detail modal
	$("#button_save_modal1").on('click',function(e)
	{
	 	//close the modal
	 	e.preventDefault();
	 	//console.log('inside save');
	 	var voucher_detail_id = $("#voucher_detail_id").val();
	 	var action_voucher_detail = $("#action_voucher_detail").val();
	 	console.log('action_voucher_detail',action_voucher_detail);
	 	var debitCreditVal = $('#voucher_detail_debit_credit_id').val();
	 	var debitVal = document.getElementById('voucher_detail_debit_amount').value;
	 	var creditVal = document.getElementById('voucher_detail_credit_amount').value;
	 	var creditDisable = document.getElementById("voucher_detail_credit_amount").disabled 
	 	var debitDisable = document.getElementById("voucher_detail_debit_amount").disabled 
	 	console.log('action_voucher_detail',creditDisable,debitVal,debitDisable);
	 	if( (creditDisable == true  && debitVal > 0) || (debitDisable== true  && creditVal > 0))
	 	{
	 		if(action_voucher_detail == 'C')
		 	{
		 		console.log('inside',action_voucher_detail);
		 		post_Add_Voucher_Detail();	

		 	}
		 	else
		 	{
		 		console.log('inside post save',action_voucher_detail);
		 		post_Save_Voucher_Detail();
		 	}
		 	//$("#voucher_detail_modal").modal('hide');
		 	calculate_Total();
		 	$("#voucher_detail_id").val(0);
			$("#voucher_detail_voucher_id").val(0);
			$("#voucher_detail_general_ledger_id").val('');
			$("#voucher_detail_loan_id").val(0);
			$("#voucher_detail_transaction_id").val(0);
			$("#voucher_detail_debit_credit_id").val(12);
			$("#voucher_detail_debit_amount").val(0);
			$("#voucher_detail_credit_amount").val(0);
			$("#voucher_detail_archive_id").val(0);
			$("#general_ledger_id_voucher_detail").val(0).trigger('change');
			 	register_event();
	 	}else
	 	{
	 		if(debitCreditVal == 12){
	 			$("#debit_amount").addClass("has-error alert-warning");
	 			$("#span_debit_amount").html('Debit amount is required');
	 			
	 		}else{
	 			$("#credit_amount").addClass("has-error alert-warning");
	 			$("#span_credit_amount").html('Credit amount is required');
	 			
	 		}
	 		
	 	} 	

	});

// save general ledger modal
	$('[id= "button_save_general_ledger_modal"]').on('click', function(e){
	     e.preventDefault();
	  
	  gl_data = {"general_ledger_id" : document.getElementById('general_ledger_id').value,"general_ledger_branch_id": document.getElementById('general_ledger_branch_id').value,
	"general_ledger_name":document.getElementById('general_ledger_name').value,"general_ledger_alise":document.getElementById('general_ledger_alise').value,
	"general_ledger_account_group_id":document.getElementById('general_ledger_account_group_id').value,"general_ledger_debit_credit_id":document.getElementById('general_ledger_debit_credit_id').value,
	"general_ledger_opening_amount":document.getElementById('general_ledger_opening_amount').value,"general_ledger_debit_amount":document.getElementById('general_ledger_debit_amount').value,
	"general_ledger_credit_amount":document.getElementById('general_ledger_credit_amount').value,"general_ledger_closing_amount":document.getElementById('general_ledger_closing_amount').value,
	"general_ledger_statutary_id":document.getElementById('general_ledger_statutary_id').value ,"general_ledger_pancard_no":document.getElementById('general_ledger_pancard_no').value,
	"general_ledger_state_vat_no":document.getElementById('general_ledger_state_vat_no').value,"general_ledger_central_vat_no":document.getElementById('general_ledger_central_vat_no').value};

	 //console.log(site_url() + General_ledger.controller + "/add_general_ledger");  
	
	
	//var sel = $('#voucher_general_ledger_id');
	console.log('some');

	//var sel = this.form.elements['voucher_general_ledger_id'];
	//console.log(sel);
    //addOptionToSelect(sel, 'New Option', '1000', {lbl: 'Bank Accounts'} );
    //$(sel).select2().trigger('change');


	/*
	$("#voucher_general_ledger_id > option").each(function() {
		console.log('inside');
	});
	*/
	//console.log('find',$("#voucher_general_ledger_id").find("option[value='" + 66 + "']").length);
	/*
	var arr = [];
	var end = $('#voucher_genaral_ledger_id optgroup[label="Bank Accounts"] option').length;
	var element = $('#voucher_genaral_ledger_id optgroup[label="Bank Accounts"]');
	console.log(element);
	var option = document.createElement("option");
	option.text = 'new value' ;
	option.value = '1000';
	//element.appendChild(new option);
	$(element).appendChild(new Option("100", "New Value1"));
	*/
	
	 //$('#general_ledger_modal').modal('hide');
	 
	    $.ajax({ 
		 	url 		: site_url() + General_ledger.controller + "/add_general_ledger",
	      	type 		: "POST",
	      	dataType	: "JSON",
	      	data 		:gl_data,
	      	success		: function(data)
			{	
				console.log('add_general_ledger',data);
				
				var gl_name = gl_data.general_ledger_name;
				var id = data.last_gl_id;
				console.log('add_general_ledger',id ,gl_data);
				var element = document.getElementById("general_ledger_account_group_id");
				var account_group_name = element.options[element.selectedIndex].text;
				
		    	if(voucher_type_gl_dropdown == yes_var)
		    	{
		    		var sel_1 = document.getElementById('voucher_genaral_ledger_id');
		    		addOptionToSelect(sel_1, gl_name, id,'' );
	    			$(sel_1).select2().trigger('change');
		    	}
		    	
	    		var sel_2 = document.getElementById('general_ledger_id_voucher_detail');
	    		console.log('select2',sel_2);
	    		addOptionToSelect(sel_2, gl_name, id, {lbl: account_group_name} );
	    		$(sel_2).select2().trigger('change');

	    		//Modal Hide
				$('#general_ledger_modal').modal('hide');

			},
		  	error: function (jqXHR, textStatus, errorThrown)
		  	{
		      alert('Error = ' + textStatus + ' ' + errorThrown);
		  	}

  		});
		
	    //General_ledger.submit_form();
	    
	});

	//add new  general ledger 
	$( "#general_ledger_id_voucher_detail" ).change(function() {
     // var select = document.getElementById("mySelect");
    //var answer = select.options[select.selectedIndex].value;
       var element = document.getElementById("general_ledger_id_voucher_detail");
      var drop_opt = element.options[element.selectedIndex].value;
      console.log('drop_opt',drop_opt);
      if(drop_opt == -1)
      {
        $('#general_ledger_modal').modal('show');
      }
    
    });

	$('#tab_voucher').on('click',function(e){
		currenttab = 'tab_voucher';
	});
	//Tabpage change 
	$('#tab_voucher_detail').on('click',function(e){
		//set the current tab
		//alert(Voucher.id);
		//get_ajax_otpgroup(ready_data);
		get_narration();

		currenttab = 'tab_voucher_detail';
		check_credit_debit();
		
	// set select any in voucher detail
	   $('#general_ledger_id_voucher_detail').val('0').trigger('change');
		//console.log('tab change',currenttab,Voucher.id);
		voucher_type_member_dropdown = $("#voucher_type_id").find(':selected').attr('data-member');
		voucher_type_gl_dropdown = $("#voucher_type_id").find(':selected').attr('data-gl');
		//console.log(voucher_type_gl_dropdown);
		//get_ajax_otpgroup(data);
		//console.log('add_general_ledger',data);
				
		/*var gl_name = gl_data.general_ledger_name;
		var id = gl_data.last_gl_id;

		var element = document.getElementById("general_ledger_account_group_id");
		var account_group_name = element.options[element.selectedIndex].text;
		
    	if(voucher_type_gl_dropdown == yes_var)
    	{
    		var sel_1 = document.getElementById('voucher_genaral_ledger_id');
    		addOptionToSelect(sel_1, gl_name, id, {lbl: account_group_name} );
			$(sel_1).select2().trigger('change');
    	}
    	
		var sel_2 = document.getElementById('voucher_detail_general_ledger_id');
		console.log('select2',sel_2);
		addOptionToSelect(sel_2, gl_name, id, {lbl: account_group_name} );

		$(sel_2).select2().trigger('change');
*/
    	if(voucher_type_member_dropdown == yes_var)
    	{
    		$('#voucher_member_dropdown').show();
    	}
    	else
    	{
    		$('#voucher_member_dropdown').hide();	
    	}

    	if(voucher_type_gl_dropdown == yes_var)
    	{
    		$('#voucher_gl_dropdown').show();
    	}
    	else
    	{
    		$('#voucher_gl_dropdown').hide();	
    	}
		/*var gl_length = Object.keys(gl_data).length;
		var voucher_type_length = Object.keys(voucher_type_data).length;*/
		//console.log("voucher_type_data",voucher_type_data);
		//console.log("voucher_type_data",gl_data);
		var voucher_type_type = $('#voucher_type_id').val();
		//$("#voucher_genaral_ledger_id").val(data.general_ledger_id).trigger('change');
		//get data from voucher and voucher detail table
		get_Voucher_Data();
	});

	$('#tab_document_upload').on('click',function(e){
		//set the current tab
		currenttab = 'tab_document_upload';
		//console.log(currenttab);
		//currenttab = 'tab_' + Document_list.controller;
		Document_list.get_data_html(Voucher.id, Document_list.controller + '_body');
	});

	$( "#voucher_detail_debit_credit_id" ).change(function() {
   		check_credit_debit();
	});

	
    $( "#voucher_receipt_no" ).keyup(function() {
      //alert(this.value);
     $("#action_voucher").val('U');

    });
    $( "#voucher_receipt_date" ).change(function() {
    	
      $("#action_voucher").val('U');
      

    });

    $( "#narration_dropdown" ).change(function() {
   		get_narration();
	});

	 $( "#button_search_loan_id" ).click(function(e) {
	 	e.preventDefault();
   		//get_narration();
   		search_loan_id();
   		deleteFormLoan() ;

   		//alert('button_search_loan_id');
	});

    $( "#voucher_genaral_ledger_id" ).change(function() {
      //alert(this.value);
     //$("#action_voucher").val('U');

     //change gl id for adding 0th row in voucher detail table
     var general_ledger_value =   $( "#voucher_genaral_ledger_id" ).val();
     	var table = document.getElementById("VoucherDetailTable");
		var end = table.rows.length - 1;
		for ( var i = 1; i <= end; i++ )
		{
		    row = table.rows[i];
			console.log('change event',row.cells[0].innerHTML);
			if(row.cells[0].innerHTML == 0)
			{
			row.cells[9].innerHTML = general_ledger_value;
			}
			
		}

    });
     $( "#voucher_member_id" ).change(function() {
      //alert(this.value);
     $("#action_voucher").val('U');

    });
    $( "#voucher_narration" ).keyup(function() {
      //alert(this.value);
     $("#action_voucher").val('U');

    });
     $( "#voucher_cheque_no" ).keyup(function() {
      //alert(this.value);
      $("#action_voucher").val('U');

    });
     $( "#voucher_cheque_date" ).keyup(function() {
      //alert(this.value);
      $("#action_voucher").val('U');

    });
    
     $( "#voucher_cheque_amount" ).change(function() {
      //alert(this.value);
      $("#action_voucher").val('U');

    });

	$('#search_member_id').select2({ theme: "bootstrap"});

	// add voucher record
	$('[id= "button_add_voucher"]').on('click', function(e){
		currenttab = 'tab_voucher';
		//checked box unchecked
		Voucher_detail.fk_id = Voucher.set_id('chk_' + 0);

		var voucher_type_id = $('#voucher_type_id').val();

		var voucher_type_narration = $("#voucher_type_id").find(':selected').attr('data-narration');
		voucher_type_member_dropdown = $("#voucher_type_id").find(':selected').attr('data-member');
		voucher_type_gl_dropdown = $("#voucher_type_id").find(':selected').attr('data-gl');
		//console.log(voucher_type_gl_dropdown);
	check_credit_debit();
		
		
	    if(currenttab == 'tab_voucher' && voucher_type_id > 0)
	    {

	    	$('#tab_voucher_detail').trigger('click');
	    	
	    	if(voucher_type_member_dropdown == yes_var)
	    	{
	    		$('#voucher_member_dropdown').show();
	    	}
	    	else
	    	{
	    		$('#voucher_member_dropdown').hide();
	    	}

	    	if(voucher_type_gl_dropdown == yes_var)
	    	{
	    		//give a call to function
	    		console.log('add ',ready_data);
	    	//add general dropdown
	    		get_ajax_otpgroup(ready_data);
	    		$('#voucher_gl_dropdown').show();
	    	}
	    	else
	    	{
	    		$('#voucher_gl_dropdown').hide();
	    	}

	    	//get current date
	    	var dt = new Date().toJSON().slice(0,10);
	    	//console.log(convert_from_mysql_date(dt));
	    	$.ajax(
				{
					url: site_url() + "voucher/get_next_receipt_no" ,
				    type: "GET",
				    data: {voucher_type: voucher_type_id},
				    dataType: "JSON",
				    success: function(data)
				    {
				    	//console.log(data);
				    	$('#voucher_receipt_no').val(data);
				    },
					error: function (jqXHR, textStatus, errorThrown) { alert('Error ' + textStatus + ' ' + errorThrown); }
				});
	  
	    	$('#action_voucher').val('C');
	    	   // set select any in voucher detail
	    	$('#general_ledger_id_voucher_detail').val('0').trigger('change');

	    	var data = {"id":0,"branch_id":1,"voucher_type_id":voucher_type_id,"batch_detail_status_id":2,
                        "receipt_no":'',"genaral_ledger_id":0,"member_id":0,"receipt_date":convert_from_mysql_date(dt),
                        "cheque_no":0,"narration":voucher_type_narration,"cheque_date":convert_from_mysql_date(dt),"cheque_amount":0,
                        "archive_id":1,"casher_id":0,"officer_id":0, "action" : "C"};

	     	set_Voucher_Data(data);

	     	//add 0th row in voucher detail table
	     	var voucher_gl_id = $("#voucher_genaral_ledger_id").val();

			//var opt = element.options[element.selectedIndex]; 
			var table = document.getElementById("VoucherDetailTable");
			var end = table.rows.length -1;
			console.log('end',end);
			//if( end ==)
			console.log('table end',end)
	     	if(voucher_type_member_dropdown == yes_var && voucher_type_gl_dropdown == yes_var && end == end)
	    	{
	     	var data_voucher_detail = [{"id":0,"voucher_id":Voucher.id,"general_ledger_id":voucher_gl_id,"loan_id":0,
				"transaction_id":0,"debit_credit_id":12,"debit_amount":0,"credit_amount":0,"archive_id":2,
				"action" : "C","sr_no":0}];

	     	//console.log('data_voucher_detail',data_voucher_detail);
	     	set_Voucher_Detail_Data(data_voucher_detail);
	     	
	     	}
	     	else{
	     		deleteFormVoucherDetail() ;
	     	}

	     	
	     //delete or clear total amount 
	     	$('#total_debit_amount').html('00.00');
	     	$('#total_credit_amount').html('00.00 ');
	    }
	    else{
	    	alert('Please select voucher type');
	    }


	});

	//add voucher_detail record
	$('#button_add_voucher_detail').on('click', function(e)
	{
		//var voucher_detail_id = 1;
		var count =  1;
		//var end = refTable.rows.length - 2;
		var table = document.getElementById("VoucherDetailTable");
		var end = table.rows.length - 3;
		for ( var i = 1; i <= end; i++ )
		{
		    row = table.rows[i];
			console.log(row.cells[6].innerHTML);
			if(row.cells[6].innerHTML ==' ' || row.cells[6].innerHTML == 'C')
			{
				count ++;
				console.log(count ,'count');
			}
			
		}
		var data = {"result":[{"voucher_detail_id":0,"voucher_detail_voucher_id":Voucher.id,"voucher_detail_general_ledger_id":15,"voucher_detail_loan_id":0,
				"voucher_detail_transaction_id":0,"voucher_detail_debit_credit_id":12,"voucher_detail_debit_amount":0,"voucher_detail_credit_amount":0,"voucher_detail_archive_id":2,"voucher_detail_sr_no":0}]};
			fill_data(data, Voucher_detail.display_type, Voucher_detail.display_type_id);
		check_credit_debit();
		$('#action_voucher_detail').val('C');
	});

	//add general ledger in voucher detail
	//add voucher_detail record
	$('#button_add_general_ledger').on('click', function(e)
	{
		$('#general_ledger_modal').modal('show');
	});
	//Delete Button
	$('[id= "delete_close_btn"]').on('click', function(e){
		if (currenttab == 'tab_voucher')
		{
			var x = Voucher.form_delete();
		}
		if (currenttab == 'tab_document_upload')
		{
			var x = Document_list.form_delete();
		}
	
	});
	

}); // End of ready

//User Defined Function

function search_loan_id()
{
	var genaral_ledger_id = $("#general_ledger_id_voucher_detail option:selected").val(); 
	var member_id = $('#voucher_member_id').val();
	$.ajax({ 
	 	url 		: site_url() + Loan.controller + "/search_by_loan_id",
      	
      	dataType	: "JSON",
      	type: "GET",
		data: {member_id: member_id,genaral_ledger_id:genaral_ledger_id},
      	success		: function(data)
			{		  		
			   console.log(data);
			   var count = Object.keys(data.result).length;
			   var table = document.getElementById("LoanSearchTable");
			
				//console.log('end',end);
				//var count = data.result ;
				
				console.log(count);
				for (var i = 0 ; i < count ; i++) 
				{
					var end = table.rows.length - 1;
					var row = table.insertRow(end );
				
					row.insertCell(0).innerHTML ="<input type='checkbox' class='check_loan_id' id=chk_"+ data.result[i].loan_id +
				">"
					row.insertCell(1).innerHTML = data.result[i].loan_id;
					row.insertCell(2).innerHTML = data.result[i].member_name;
					row.insertCell(3).innerHTML = data.result[i].loan_amount;
					row.insertCell(4).innerHTML = data.result[i].loan_unpaid;
					row.insertCell(5).innerHTML = data.result[i].no_of_installment;
					row.insertCell(6).innerHTML = data.result[i].no_of_installment_paid;
					row.insertCell(7).innerHTML = data.result[i].scheme_name;
					//console.log('loan_id',data.result[i].loan_id,end);
					register_event()
				}
				$('#loan_search_modal').modal('show');
			   
		  	},
		  	error: function (jqXHR, textStatus, errorThrown)
		  	{
		      alert('Error = ' + textStatus + ' ' + errorThrown);
		  	}
  		});

  return false;
}
//set_
function get_narration()
{
	console.log('narration');
	var element = document.getElementById("narration_dropdown");
	var opt = element.options[element.selectedIndex];
	console.log(opt.text);
	var old_narration = $("#voucher_narration").val();
	$("#voucher_narration").val(old_narration +','+opt.text);
}

function f1() 
{
	voucher_type_gl_dropdown = $("#voucher_type_id").find(':selected').attr('data-gl');
	
	//console.log('f1 vd',voucher_detail_data);
	//var yes_var = 3;
	var voucher_detail_data_length = Object.keys(voucher_detail_data).length;
	//console.log('length',voucher_detail_data_length);
	if(voucher_type_gl_dropdown == yes_var)
	{
		for (var i = 0; i<= voucher_detail_data_length; i++) 
		{
			//console.log(voucher_detail_data[0].sr_no);
			if(voucher_detail_data[0].sr_no == 0)
			{
				//console.log('general_ledger_id');
				$("#voucher_genaral_ledger_id").val(voucher_detail_data[0].general_ledger_id).trigger('change');
				break;	
			}
		}
	}
}

//checking selected value debit and credit
function check_credit_debit()
{
	var voucher_detail_id = $('#voucher_detail_id').val();
	var debit_credit_id = $('#voucher_detail_debit_credit_id').val();
	//console.log(voucher_detail_id);
	$("#voucher_detail_credit_amount").attr('disabled', true);
	if(debit_credit_id == 12 )
	{
		$("#voucher_detail_debit_amount").attr('disabled', false);
		$("#voucher_detail_credit_amount").attr('disabled', true);
		$("#span_credit_amount").html(' ');
		$("#voucher_detail_credit_amount").val(0);
		$("#credit_amount").removeClass("has-error ");
	}
	else
	{
		$("#voucher_detail_debit_amount").attr('disabled', true);
		$("#voucher_detail_credit_amount").attr('disabled', false);
		$("#debit_amount").removeClass("has-error");
		$("#span_debit_amount").html(' ');
		$("#voucher_detail_debit_amount").val(0);
	}
}
/*
	set value in voucher detail
*/
function post_Save_Voucher_Detail()
{
	console.log('post_Save_Voucher_Detail');
	var refTable = document.getElementById("VoucherDetailTable");
	
	var detail_id = $("#voucher_detail_sr_no").val();
	console.log('sr_no',detail_id);
	var action_voucher_detail = $("#action_voucher_detail").val();
	//console.log(action_voucher_detail);
	for ( var i = 1; row = refTable.rows[i]; i++ ) 
	{
	    row = refTable.rows[i];
	    if (detail_id == row.cells[0].firstChild.nodeValue)
	    {
	    	
	    	var element = document.getElementById("general_ledger_id_voucher_detail");
			var opt = element.options[element.selectedIndex];
			row.cells[1].innerHTML = $("#voucher_detail_debit_credit_id").val();
			
	    	row.cells[2].innerHTML = opt.text;
	    	row.cells[3].innerHTML = $("#voucher_detail_debit_amount").val();
	    	row.cells[4].innerHTML = $("#voucher_detail_credit_amount").val();
	    	row.cells[5].innerHTML = $("#voucher_detail_loan_id").val() ;
	    	
	    	if(row.cells[7].innerHTML == 'C')
		    {
		    	row.cells[7].innerHTML = 'C';	
		    }else
		    {
		    	row.cells[7].innerHTML = 'U';	
		    }	 
		    row.cells[8].innerHTML = $("#voucher_detail_voucher_id").val();
		    row.cells[9].innerHTML = $("#voucher_detail_id").val();
	    	row.cells[10].innerHTML = $("#general_ledger_id_voucher_detail").val();
	    	row.cells[11].innerHTML = $("#voucher_detail_transaction_id").val();	    	
	    	//row.cells[11].innerHTML = $("#voucher_detail_loan_id").val() ;

	    	break;
	    }
	}
}

/*
	calculate debit and credit total
*/
function calculate_Total()
{
	var refTable = document.getElementById("VoucherDetailTable");
	var end = refTable.rows.length - 2;
	var debit_total = 0;
	var credit_total = 0;
	var voucher_type_member_dropdown = $("#voucher_type_id").find(':selected').attr('data-member');
	var voucher_type_gl_dropdown = $("#voucher_type_id").find(':selected').attr('data-gl');
	for ( var i = 1; i <= end ; i++ ) 
	{
	    row = refTable.rows[i];
		if (row.cells[7].innerHTML !== 'D')
		{
			debit_total 	+=   parseFloat(row.cells[3].innerHTML);
			credit_total  	+=   parseFloat(row.cells[4].innerHTML) ;
		}   
	}
	
	//document.getElementById("total_debit_amount").innerHTML = debit_total.toFixed(2);
	//document.getElementById("total_credit_amount").innerHTML = credit_total.toFixed(2);
	var cr_total = credit_total.toFixed(2);
	var dr_total = debit_total.toFixed(2);

	//checking same amount total for journal and contra voucher..
	/*if(voucher_type_member_dropdown == 4 && voucher_type_member_dropdown == 4 && (cr_total !== dr_total))
	{
		//alert('Debit and Credit amount total should be same.')
		$("#button_save_panel").attr('disabled', true);
	}
	else
	{
		$("#button_save_panel").attr('disabled', false);
	}*/

}

/*
	submit voucher
*/
function form_Voucher_Save() 
{
	var table = document.getElementById("VoucherDetailTable");
	var end = table.rows.length - 2;
	
	var voucher_detail_data = [];
	var voucher_data;
	for ( var i = 1; i <= end; i++ )
	{
		
		row = table.rows[i];

		var action_voucher_detail = row.cells[6].innerHTML;
		console.log('form_save' ,row.cells[3].innerHTML.replace('₹',''));
		
		voucher_detail_data.push({"id" : ( action_voucher_detail == 'C' ? '0' : row.cells[9].innerHTML), "voucher_id" : row.cells[8].innerHTML,
		"general_ledger_id":row.cells[10].innerHTML,"loan_id":row.cells[5].innerHTML,
		"transaction_id":row.cells[11].innerHTML,"debit_credit_id":row.cells[1].innerHTML,
		"debit_amount":row.cells[3].innerHTML , "credit_amount":row.cells[4].innerHTML,
		"archive_id":2, "action":row.cells[7].innerHTML, "sr_no": row.cells[0].innerHTML});

	}

	voucher_data = {"id" : document.getElementById('voucher_id').value,"branch_id": document.getElementById('voucher_branch_id').value,
	"voucher_type_id":document.getElementById('voucher_voucher_type_id').value,"batch_detail_status_id":document.getElementById('voucher_batch_detail_status_id').value,
	"receipt_no":document.getElementById('voucher_receipt_no').value,
	"member_id":document.getElementById('voucher_member_id').value,"receipt_date":document.getElementById('voucher_receipt_date').value,
	"cheque_no":document.getElementById('voucher_cheque_no').value,"narration":document.getElementById('voucher_narration').value,
	"cheque_date":document.getElementById('voucher_cheque_date').value,"cheque_amount":document.getElementById('voucher_cheque_amount').value,
	"archive_id":document.getElementById('voucher_archive_id').value,"casher_id":document.getElementById('voucher_casher_id').value,
	"officer_id":document.getElementById('voucher_officer_id').value,"action_voucher" : document.getElementById('action_voucher').value };

	//console.log(voucher_data);
	var data = {voucher_data,voucher_detail_data};

	//console.log(data);
	$.ajax({ 
	 	url 		: site_url() + Voucher.controller + "/form_validate",
      	type 		: "POST",
      	dataType	: "JSON",
      	data 		: data,
      	success		: function(data)
			{		  		
			   	//console.log(data);
			   	flash_message('flash_box','success','Saved record..');
		  	},
		  	error: function (jqXHR, textStatus, errorThrown)
		  	{
		      alert('Error = ' + textStatus + ' ' + errorThrown);
		  	}
  		});

  return false;
}

/*
	get voucher data 
*/
function get_Voucher_Data()
{  
	//alert(Voucher.id);
	if(Voucher.id > 1)
	{

 	$.ajax({
 	url: site_url() + "voucher/get/" + Voucher.id ,

  	type: "POST",
    dataType: "JSON",
    success: function(data) 
	{
	  	voucher_data = data.result.voucher;
	  	voucher_detail_data = data.result.voucher_detail;

  		set_Voucher_Data(data.result.voucher);
  		$("#action_voucher").val('R');
  		//table empty
  		set_Voucher_Detail_Data(data.result.voucher_detail);
  		var action = data.result.action ;
  		//
  		f1();
  		//console.log('get',action);
  		calculate_Total();
  		register_event();	
	},

	  	error: function (jqXHR, textStatus, errorThrown)
	  	{
	      alert('Error = ' + textStatus + ' ' + errorThrown);
	  	}
  	});
 }
  return false;
}

/*
	get values from voucher detail table
*/
function get_Voucher_Detail_Data(voucher_detail_id)
{
	//console.log('get_Voucher_Detail_Data',voucher_detail_id);
	var refTab = document.getElementById("VoucherDetailTable");
	//var row = refTab.rows[voucher_detail_id];
	for ( var i = 1; row = refTab.rows[i]; i++ ) 
	{
	    row = refTab.rows[i];    
	    if (voucher_detail_id == row.cells[0].firstChild.nodeValue)
	    {
	    	$("#voucher_detail_sr_no").val(row.cells[0].firstChild.nodeValue);
	    	$("#voucher_detail_id").val(row.cells[8].firstChild.nodeValue);
	    	$("#voucher_detail_loan_id").val(row.cells[5].firstChild.nodeValue);
			$("#voucher_detail_debit_amount").val(row.cells[3].firstChild.nodeValue);
			//console.log('row.cells[3].firstChild.nodeValue',row.cells[3].firstChild.nodeValue.replace('₹',''));
			$("#voucher_detail_credit_amount").val(row.cells[4].firstChild.nodeValue);
			$("#voucher_detail_debit_credit_id").val(row.cells[1].firstChild.nodeValue);
			$("#voucher_detail_voucher_id").val(row.cells[8].firstChild.nodeValue);
			$("#voucher_detail_general_ledger_id").val(row.cells[10].firstChild.nodeValue);
			$("#general_ledger_id_voucher_detail").val(row.cells[10].firstChild.nodeValue).trigger('change');

			$("#voucher_detail_transaction_id").val(row.cells[11].firstChild.nodeValue);

			$("#voucher_detail_archive_id").val(2);
			$("#action_voucher_detail").val('U');
	    	//$('#voucher_detail_modal').modal('show');
	    	break; 	
	    }
	}
		
}
//set value for voucher panel 
function set_Voucher_Data(data) 
{
	var table = document.getElementById("VoucherDetailTable");
	var end = table.rows.length;
	var gl_set = $("#voucher_genaral_ledger_id").val();
	
	//console.log('voucher get',gl_set);
	$("#voucher_id").val(data.id);
	$("#voucher_branch_id").val(data.branch_id);
	$("#voucher_voucher_type_id").val(data.voucher_type_id);
	$("#voucher_batch_detail_status_id").val(data.batch_detail_status_id);
	$("#voucher_receipt_no").val(data.receipt_no);
	$("#voucher_genaral_ledger_id").val(gl_set).trigger('change');
	$("#voucher_member_id").val(data.member_id).trigger('change');
	//$("#voucher_member_id").val(data.member_id);
	$("#voucher_receipt_date").val(data.receipt_date);
	$("#voucher_cheque_no").val(data.cheque_no);
	$("#voucher_narration").val(data.narration);
	$("#voucher_cheque_date").val(data.cheque_date);
	$("#voucher_cheque_amount").val(data.cheque_amount);
	$("#voucher_archive_id").val(data.archive_id);
	$("#voucher_casher_id").val(data.casher_id);
	$("#voucher_officer_id").val(data.officer_id);
}

//delete rows of voucher_detail table
function deleteFormVoucherDetail() 
{  
  var refTab = document.getElementById("VoucherDetailTable");
  var end = refTab.rows.length -1 ;
  for ( var i = 1; i < end ;) 
  {
    refTab.deleteRow(i);
    end = refTab.rows.length -1 ;
  }
}
function deleteFormLoan() 
{  
  var refTab = document.getElementById("LoanSearchTable");
  var end = refTab.rows.length -1 ;
  for ( var i = 1; i < end ;) 
  {
    refTab.deleteRow(i);
    end = refTab.rows.length -1 ;
  }
}
//set value for voucher detail table when get values
function set_Voucher_Detail_Data(data)
{

	var count = data.length ;
	var table = document.getElementById("VoucherDetailTable");
	deleteFormVoucherDetail();
	//console.log('from set_Voucher_Detail_Data' , data);
	
	//console.log(count);
	for (var i = 0 ; i < count ; i++) 
	{
		var end = table.rows.length - 1;
		var row = table.insertRow(end );
		//console.log('set detail end',end);
		//console.log('currency_format' , currency_format(data[i].debit_amount, true));

		//var number = 1557564534;
		var debit_amount = parseInt(data[i].debit_amount);
		//console.log(currency_format(debit_amount,true));
		var credit_amount = parseInt(data[i].credit_amount)
		var Loan_id = parseInt(data[i].loan_id)
		//with INR Rupee Symbol
		//console.log('deposit amt',currency_format(deposit_amount, true));
		//console.log('loan id',currency_format(loan_id));currency_format(debit_amount,true);

		row.insertCell(0).innerHTML = data[i].sr_no;
		row.insertCell(1).innerHTML = data[i].debit_credit_id;
		row.insertCell(2).innerHTML = data[i].name;
		row.insertCell(3).innerHTML = debit_amount;
		row.insertCell(4).innerHTML =credit_amount;
		row.insertCell(5).innerHTML = Loan_id;
		//console.log('set_Voucher_Detail_Data',data[i].sr_no);
		if( data[i].sr_no == 0){
			row.insertCell(6).innerHTML = " ";
			
		}else
		{
			row.insertCell(6).innerHTML = "<button id='button_edit' name='button_edit' type='button' class='btn btn-primary btn-xs' value='"+data[i].sr_no+
		"'><span class='glyphicon glyphicon-pencil'></span></button>"+ ' ' +
		"<button type='button' class='btn btn-warning btn-xs' value='Delete' id='button_delete'><span class='glyphicon glyphicon-trash'></span></button>";
		}
		
		
		
		if ( typeof data[i].action != 'undefined' )
		{
			row.insertCell(7).innerHTML =  data[i].action;
					
		}
		else
		{
			row.insertCell(7).innerHTML =  'R';	
		}

		row.insertCell(8).innerHTML = data[i].voucher_id;
		row.insertCell(9).innerHTML = data[i].id ;
		row.insertCell(10).innerHTML = data[i].general_ledger_id ;
		row.insertCell(11).innerHTML = data[i].transaction_id;
		//row.insertCell(11).innerHTML = ;
		//row.insertCell(12).innerHTML = data[i].transaction_id;
		//calculate_Total();
	}
}

//Function used to set Modal data 
function set_Voucher_Detail_Modal_Data(data)
{
	//console.log(data);
	$("#voucher_detail_id").val(data.result[0].voucher_detail_id);
	$("#voucher_detail_voucher_id").val(data.result[0].voucher_detail_voucher_id);
	$("#voucher_detail_general_ledger_id").val(data.result[0].voucher_detail_general_ledger_id);
	$("#voucher_detail_loan_id").val(data.result[0].voucher_detail_loan_id);
	$("#voucher_detail_transaction_id").val(data.result[0].voucher_detail_transaction_id);
	$("#voucher_detail_debit_credit_id").val(data.result[0].voucher_detail_debit_credit_id);
	$("#voucher_detail_debit_amount").val(data.result[0].voucher_detail_debit_amount);
	$("#voucher_detail_credit_amount").val(data.result[0].voucher_detail_credit_amount);
	$("#voucher_detail_archive_id").val(data.result[0].voucher_detail_archive_id);
}

/*
	add row in voucher detail table
*/
function post_Add_Voucher_Detail()
{
	//console.log('post_Add_Voucher_Detail');
	var table = document.getElementById("VoucherDetailTable");
	var end = table.rows.length -1 ;
	//console.log('post_Add_Voucher_Detail',end);
	var row = table.insertRow(end);

	var cell1 = row.insertCell(0);
	var cell2 = row.insertCell(1);
	var cell3 = row.insertCell(2);
	var cell4 = row.insertCell(3);
	var cell5 = row.insertCell(4);
	var cell6 = row.insertCell(5);
	var cell7 = row.insertCell(6);
	var cell8 = row.insertCell(7);
	var cell9 = row.insertCell(8);
	var cell10 = row.insertCell(9);
	var cell11 = row.insertCell(10);
	var cell12 = row.insertCell(11);
	var element = document.getElementById("general_ledger_id_voucher_detail");

	var opt = element.options[element.selectedIndex];
	var vd  = $("#voucher_detail_id").val();
	//console.log(opt.text);
	var count =  1;
	//console.log(count,count);
	//var end = refTable.rows.length - 2;
	var table = document.getElementById("voucherDetailTable");

	var voucher_type_member_dropdown = $("#voucher_type_id").find(':selected').attr('data-member');
	var voucher_type_gl_dropdown = $("#voucher_type_id").find(':selected').attr('data-gl');
	//var yes_var = 3;
	/*if(voucher_type_member_dropdown == yes_var && voucher_type_gl_dropdown == yes_var)
	{
		var end = table.rows.length - 3;
	}
	else
	{
		var end = table.rows.length - 2;
	}*/
	var action = $('#action_voucher_detail').val();

	if (action == 'C')
	{
		count = end-1;
	}
	else
	{

		for ( var i = 1; i <= end; i++ )
		{
		    row = table.rows[i];
			//console.log('',row.cells[6].innerHTML);
			if(action == 'C')
			{
				count ++;
			}
		}
		//console.log('else',count);
	}
//currency_format(parseInt($("#voucher_detail_credit_amount").val()),true);
	cell1.innerHTML = count;
	cell2.innerHTML = $("#voucher_detail_debit_credit_id").val();
	cell3.innerHTML = opt.text; 
	cell4.innerHTML = $("#voucher_detail_debit_amount").val();
	cell5.innerHTML = $("#voucher_detail_credit_amount").val(); 
	cell6.innerHTML = $("#voucher_detail_loan_id").val();
	cell7.innerHTML = "<button id='button_edit' name='button_edit' type='button' class='btn btn-primary btn-xs' value='"+ cell1.innerHTML +
	"'><span class='glyphicon glyphicon-pencil'></span></button>"+ ' ' +
	"<button type='button' class='btn btn-warning btn-xs' value='Delete' id='button_delete'><span class='glyphicon glyphicon-trash'></span></button>";  
	cell8.innerHTML = 'C'; 
	cell9.innerHTML =   $("#voucher_detail_voucher_id").val(); 
	//cell9.style.display ='none'	
	cell10.innerHTML =$("#voucher_detail_id ").val();  
	cell11.innerHTML = $("#general_ledger_id_voucher_detail option:selected").val(); 
	cell12.innerHTML = $("#voucher_detail_transaction_id ").val();
	//register_event();	
}

//CONVERT VOUCHER type
function fn_1(data)
{
	//console.log('yes_var',yes_var);
	var voucher_type_data_length = Object.keys(data.result.voucher_type_list).length;

	var voucher_type_id = $('#voucher_type_id').val();
	//console.log('current',voucher_type_id);
	var radio_var = '';
	for (var i = 0; i < voucher_type_data_length ; i++) 
	{
        if (!(data.result.voucher_type_list[i].id == voucher_type_id) )
        {
        	var child = data.result.voucher_type_list[i];
    		convert_voucher_type_list.push({child});  	
            radio_var += '<label class="radio-inline">'+
    		'<input type="radio" name="optradio" id="rb1" value="rb' + data.result.voucher_type_list[i].id + '">'+ 
    		data.result.voucher_type_list[i].name +'</label><br>';
        }
    }
    document.getElementById("voucher_type_radio_div").innerHTML = radio_var;    
}

function fn_2(id)
{
	//console.log('fn_2',id);
	var voucher_table = document.getElementById("VoucherListTable");
	var end = voucher_table.rows.length- 2 ;
	//console.log(voucher_table,end);
	for ( var i = 1; i <= end; i++ )
		{
		    row = voucher_table.rows[i];
		    if(row.cells[1].innerHTML == id)
		    {
		    	var id = row.cells[1].innerHTML;
		    	var receipt_no = row.cells[2].innerHTML;
		    	var name = row.cells[3].innerHTML;
		    	var date = row.cells[4].innerHTML;

		    }
		    
		    document.getElementById("voucher_label").innerHTML = '<b> Receipt No :</b> '+receipt_no +  " &nbsp;&nbsp;&nbsp;<b> Date : </b>"+ date +" <br/><b> Name : </b>"+name;
		}
		
	$("#voucher_type_modal").modal('show');
	
}
function delete_row_voucher(id)
{
	var voucher_table = document.getElementById("VoucherListTable");
	var end = voucher_table.rows.length- 2 ;
	//console.log(voucher_table,end);
	for ( var i = 1; i <= end; i++ )
		{
		    row = voucher_table.rows[i];
		    
		    if(id == row.cells[1].innerHTML)
		    {
		    	//console.log(row.cells[1].innerHTML);
		    	voucher_table.deleteRow(i);
		    }
		}
}

function flash_message(element,role,message)
{
	//alert('flash_message');
	switch (role)
	{
		case 'success' :
			$('#'+element).html('<div class="col-md-12"><div class="glyphicon glyphicon-ok alert alert-success" >&nbsp; <span class="h4">Successfully..'+message+'</span></div></div>');
			break;
		case 'warning' :
			$('#'+element).html('<div class="col-md-12"><div class="glyphicon glyphicon-warning-sign alert alert-warning" >&nbsp;<span class="h4">Warning..'+message+'</span></div>');
			break;
		case 'info' :
			$('#'+element).html('<div class="col-md-12"><div class="glyphicon glyphicon-info-sign alert alert-info" >&nbsp;<span class="h4">Info..'+message+'</span></div></div>');
			break;
		case 'danger' :
			$('#'+element).html('<div class="col-md-12"><div class="glyphicon glyphicon-ban-circle alert alert-danger" >&nbsp;<span class="h4">Danger..'+message+'</span></div></div>');
			break;
		default :
		$('#'+element).html('');
		//	$('#alert_box').html('<div class="col-md-12"><div class="glyphicon glyphicon-ok alert alert-info" >&nbsp;<strong>Info!</strong>'+messag+'</div></div>');
		break;
	}
	$('#'+element).show().fadeOut(2000);
}


