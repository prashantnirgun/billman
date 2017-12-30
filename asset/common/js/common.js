//to get the current tab selected
var currenttab, base_url ;

function site_url()
{	
	if (window.location.host == 'localhost' || window.location.hostname == 'billman.local' ){
		base_url = 'http://billman.local/';
	}
	else
	{
		
		base_url = 'http://' + window.location.hostname + '/';
	}
	/*if (window.location.host == 'localhost' || window.location.hostname == 'billman.local' ){
		base_url = 'http://billman.local/';
	}
	else
	{
		base_url = window.location.protocol + window.location.hostname + '/';
	}
	*/
	//base_url = window.location.protocol + window.location.hostname + '/';
	return base_url;
}


function sort_json(data, key_to_sort_by) {
    function sortByKey(a, b) {
        var x = a[key_to_sort_by];
        var y = b[key_to_sort_by];
        return ((x < y) ? -1 : ((x > y) ? 1 : 0));
    }
    data.sort(sortByKey);
}

function find_next_to(in_string, find_string) {
	return val = in_string.substring((in_string.indexOf(find_string) + find_string.length)) ;
}

var fn1 = function(){
	 return this.id ;
};

var fn_edit_method = function(id)
{
	this.id = id;
	this.get_data(id);
};

var fn_test = function(){
	alert('test');
};


var fn_load_delete_form = function(id,message)
{
	this.id = id;
	$('[name="delete_form_id"]').val(this.id);
	$('#msg').html(message +' Are You sure ?');
	$('#delete_model_form').modal('show');
};

var  fn_get_data_html = function(id, target)
{
  var url = site_url()  + this.controller + '/get_by_foreign_key/' + id ;
 // console.log('fn_get_data_html', url);
    if ( id > 0 )
    {
        $.ajax({ url:url,
            type: "GET",
            dataType: "HTML",
            success: function(data)
            {
                $('#' + target).html(data);
                register_event();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('fn_get_data_html = ' + textStatus + ' ' + errorThrown);
            }
        });
        return false;
    }
}

function fn_set_check_box(id, action)
{
	$('#chk_' + id ).prop('checked', action);
}

var  fn_get_all_data_in_html = function(target)
{
  	var url =  site_url() + this.controller + '/get_html_data' ;
  	var id =  this.id;

	//If true then call ajax
    $.ajax({ url:url,
    type: "GET",
    dataType: "HTML",
    success: function(data)
    {
    	//console.log(data);
        $('#'+ target).html(data);
        register_event();

        fn_set_check_box(id, true);
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
        alert('Error = ' + textStatus + ' ' + errorThrown);
    }
});
return false;

}

var fn_form_delete =function ()
{
	var url = site_url() + this.controller + '/delete/' + this.id ;
	$.ajax(
	{
		url: url,
	    type: "GET",
	    dataType: "JSON",
	    success: function(data)
	    {
	    	if(data.status)
              {
              	flash_message('flash_box','success','Record deleted..');
	            $('#delete_model_form').modal('hide');
	            body_reload();
              }else
              {
                $('#msg').append('<br/>Warning : Can\'t delete this record has reference data associated with it!');
              }
	    },
		error: function (jqXHR, textStatus, errorThrown) { alert('Error ' + textStatus + ' ' + errorThrown); }
	});
};

function fill_data(data, display_type, display_type_id)
{
	//console.log(display_type_id + '_modal');
	switch (display_type)
	{
		case 'modal' :
			set_data(data);
      		$('#' + display_type_id + '_modal').modal('show');
			break;
		case 'panel' :
			//console.log(data);
			set_data(data);
			break;
		default :
			console.log('show table with data');
			break;
	}
};

var fn_get_data = function(id)
{
	var url = site_url() +this.controller + '/get/' + id ;
	var display_type = this.display_type;
	var display_type_id = this.display_type_id;
	//console.log(display_type ,display_type_id);
	//console.log('fn_get_data', url);

	//if (this.old_id !== this.id)
	//{
		//Prevent ajax call as data is alrady loaded
		this.old_id = this.id;

		$.ajax(
		{
			url: url,
		    type: "GET",
		    dataType: "JSON",
		    success: function(data) { //console.log('data from get_data: ',data);
		    send_data(data); },
			error: function (jqXHR, textStatus, errorThrown) { alert('Error ' + textStatus + ' ' + errorThrown); }
		});

		function send_data(data){ fill_data(data, display_type, display_type_id); };

};
var fn_search_index = function()
{

	var url = site_url() + this.controller + '/search_index';
	var controller = this.controller;
	var form = controller +'_search_form';
	if(document.getElementById(form))
	{
		$.ajax(
		{
			url: url,
			type: "POST",
		    data: $('#'+ form).serialize(),
		    dataType: "HTML",
		    success: function(data) {
		    	//console.log(data);
		    	$('#'+ controller +'_div').html(data);
		    },
			error: function (jqXHR, textStatus, errorThrown) { alert('Error ' + textStatus + ' ' + errorThrown); }
		});
	}
	else
	{
		console.log('Error : Requested form not found : ' + form);
	}
};
var fn_submit_form = function()
{
	//console.log(window.location.origin);
	var url = site_url() +this.controller + '/form_validate';
	var display_type_id = this.display_type_id;
	var form = display_type_id + '_form';
	//console.log('url',url);

	if(document.getElementById(form))
	{
		Pace.track(function () {
		$('#' + display_type_id + '_modal').modal('hide');
		$.ajax(
		{
			url: url,
			type: "POST",
			data: $('#'+ form).serialize(),
		    dataType: "JSON",
		   	success: function(data)
		    {
		    	console.log('common',data);
			    if(data.status) //if success close modal and reload ajax table
			   	{
			   		$('#' + display_type_id + '_modal').modal('hide');
			   		flash_message('flash_box','success','Record saved Successfully..');
			   		body_reload();
			   	}
			   	else // form validation error
			   	{
			   		$('#' + display_type_id + '_modal').modal('show');

					for (var i = 0; i < data.inputerror.length; i++) {
						$('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
			    		$('[name="'+data.inputerror[i]+'"]').next().html(data.error_string[i]); //select span help-block class set text error string
					}
				}
		 	},
			error: function (jqXHR, textStatus, errorThrown) { 
				$('#' + display_type_id + '_modal').modal('show');

				alert('Error ' + textStatus + ' ' + errorThrown); }
		});
	});
	}
	else
	{
		console.log('Error : Requested form not found : ' + form);
	}
};

function set_data(data)
{
	var count = Object.keys(data.result).length;
	//console.log('common.js/set_data',data.result);
	for (var i = 0; i < count; i++)
	{
		var columns = Object.keys(data.result[i]).length;
		for (var j =  0; j < columns; j++)
		{
			var key = Object.keys(data.result[i])[j];
    		var elementExists = document.getElementById(key);
    		
			if(elementExists !== null)
    		{

    			var attr = $(elementExists).attr('class');
	    		if (attr == undefined) { attr = '';}
	    	
				if( attr.indexOf('select2-hidden-accessible') > -1 )
				{
					$(elementExists).val(data.result[i][key]).trigger('change');
	    		}

	    		else if(attr.indexOf('datepicker') > -1)
	    		{
	    			$(elementExists).datepicker('setDate', convert_from_mysql_date(data.result[i][key]));
	            }
	    		else
	    		{
	    			$(elementExists).addClass("has_success").val(data.result[i][key]);
	    		}
    		}
		};
	};
};


//declaring object
var Crud_prototype = {
	id : 0,
	old_id : 0,
	message:'',
	controller : '',
	display_type : 'modal',
	display_type_id : '',
	fk_id : '',
	form_method : 'GET',
	post_crud : '',
	set_controller : function (value){
		this.controller = value;
		this.display_type_id = value;
	},
	set_check_box : fn_set_check_box,
	get_data : fn_get_data,
	edit_method : fn_edit_method,
	submit_form : fn_submit_form,
	search_index : fn_search_index,
	get_data_html : fn_get_data_html,
	get_all_data_in_html : fn_get_all_data_in_html,
	test : fn_test,
	load_delete_form : fn_load_delete_form,
	form_delete : fn_form_delete,
	get_id : fn1
};

//adding method to object
//Crud_prototype.set_id =  function fn2(value)
Crud_prototype.set_id = function fn2(value)
{
	this.id = parseInt(value.substring(4));
	if (this.id !== this.old_id )
	{
		$('#chk_' + this.old_id ).prop('checked', false);
	}
	//console.log('cm',this.id, ' ', this.old_id);
	this.old_id = this.id;
	//console.log('set_id is called');
	return this.id;
};

//Crud_prototype.prototype.set_id = this.id;
//Crud_prototype.set_id = fn0;

//Extending
var Tab_prototype = Object.create(Crud_prototype);
/*
Tab_prototype.set_id = function check_box_clicked(value)
{
	this.id = parseInt(value.substring(4));
	//alert(this.id + " : " + this.old_id);
	if (this.id !== this.old_id )
	{
		$('#chk_' + this.old_id ).prop('checked', false);
	}
	//console.log(this.id, ' ', this.old_id);
	this.old_id = this.id;
	return this.id;
};
*/
function twoDigits(d) {
    if(0 <= d && d < 10) return "0" + d.toString();
    if(-10 < d && d < 0) return "-0" + (-1*d).toString();
    return d.toString();
}

function convert_from_mysql_date(val)
{
	//convert from yyy-mm-dd to dd-mm-yyy;
	if (val instanceof Date){
		var dt = val;
	}
	else{
		var dt = new Date(Date.parse(val.replace('-','/','g')));
	}
	return dt.getDate() + '-' + (dt.getMonth() + 1) + '-' + dt.getFullYear();
}

function convert_to_mysql_date(val)
{
	//convert from yyy-mm-dd to dd-mm-yyy;
	if (val instanceof Date){
		var dt = val;
	}
	else{
		var dt = new Date(Date.parse(val.replace('-','/','g')));
	}
	//return dt.my_date.toISOString().substring(0, 10);
	return dt.getUTCFullYear() + "-" + twoDigits(1 + dt.getUTCMonth()) + "-" + twoDigits(dt.getUTCDate() + 1) ;
}
function currency_format(value, symbol = false)
{
        if(value % 1 != 0 || symbol == true)
        {
            return value.toLocaleString('en-IN', {
                            maximumFractionDigits: 2,
                            style: 'currency',
                            currency: 'INR'
                        });
        }
        else {
            return value.toLocaleString('en-IN');
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
	/*
	window.setTimeout(function() {
    $('#'+element).fadeTo(500, 0).slideUp(500, function(){
        $(this).hide();
    });
	}, 2000);*/
	$('#'+element).show().fadeOut(2000);


	//console.log(document.getElementById(element));
}
