var header_data;
var gl_dropdown
var detail_data;
var form = Object.create(form_edit_prototype);

$(document).ready(function (){
	get_Voucher_Data();
	//cors();

	$(document).mouseup(function (e)
	{
	    var container = $("#hidden_row");
	    ////console.log(container.has(e.target));
	    if (!container.is(e.target) // if the target of the click isn't the container...
	        && container.has(e.target).length === 0) // ... nor a descendant of the container
	    {
	    	//$('#row_data_'+ form.current_row).show();
	    	//container.hide();
	    }
	});

	// List with handle
	//Sortable.create(listWithHandle, {
	Sortable.create(detail_data_div, {
	  handle: '.glyphicon-move',
	  animation: 150
	});

});

function save() {
	console.log(detail_data);
}

function add(argument) {
	var data = {};
	header_data.forEach(function(element, index) {
		data[element.id]=element.default;
	});
	
	create_div(detail_data.length, data);
	register_event('child_row');
	detail_data[detail_data.length]= data;
	var row_id = detail_data.length -1;
	var a = document.getElementById("row_" + row_id).firstChild.nextSibling.firstChild.id;
	form.current_column = a;
	console.log(a);
	form.edit_row(row_id);
}

function print_header() {
	var parent = document.getElementById('header_data_div');
	header_data.forEach(function(element, index) {
		
		if(element.class !== "hidden"){
			var target = document.createElement("div");
			target.setAttribute('class', element.class);
			
			var val = element.name;
			target.appendChild(document.createTextNode(val));

			parent.appendChild(target);
			//console.log(element.name, element.class);
		}
	});
}

function register_event(target_object) {
	switch (target_object) {
		case 'child_row':
			$(".child_row" ).click(function(e){
				form.current_column = e.target.id;
				form.edit_row(find_next_to(e.target.parentElement.parentElement.id,'row_'));
			});
			break;
		case 'gl_dropdown':
			$(".dropdown").select2({ data: gl_dropdown });
			$(".dropdown").on("change", function(e) {
				
				var data_id = this.value;
				var index = this.selectedIndex;
				var data_value = this.options[this.selectedIndex].text;
				var data_column = this.getAttribute('data-extra'); 
		        
		        $('#row_data_'+ form.current_row + ' #' + find_next_to(this.id, 'hidden_')).html(data_value);
		        //update text and id
		        set_json_data(form.current_row, data_column, data_id);
		        set_json_data(form.current_row, find_next_to(this.id, 'hidden_'), data_value);
		        });
			break;
		case 'blur':
			$("input[name^='hidden_']").blur(function (event) { 
				var id = find_next_to(event.target.id, 'hidden_'); 
				form.get_data_from_element(event.target.id); 
			});
			break;
		case 'btn_delete':
			$("input[name^='btn_delete']").click(function (event) { 
				//alert('delete event');
				var parent = this.parentElement.parentElement;
				parent.style.display = "none";
				form.set_row_id(find_next_to(parent.id,'row_'));
				set_json_data(form.current_row,"crud", "D")
			});
			break;
		default:
			break;
	}
}

function get_Voucher_Data()
{  
 	$.ajax({
 	url: site_url() + "voucher/test/78",
  	type: "POST",
   	dataType: "JSON",
   	success: function(data) 
	{
		header_data = data.header_data;
		gl_dropdown = data.gl_dropdown;
		detail_data = data.voucher_detail;

		sort_json(header_data,'col_order');
		form.print_column_property(header_data);
		print_header();
		form.print_data(data.voucher_detail);
		form.print_hidden(header_data);
		register_event('gl_dropdown');
		register_event('blur');
	},
	error: function (jqXHR, textStatus, errorThrown)
	{
	    alert('Error = ' + textStatus + ' ' + errorThrown);
	}
  	});
}

function cors()
{  
 	$.ajax({
 	url: 'https://dev.tss.net.in/sms/cors',
   	dataType: "JSON",
   	success: function(data) 
	{
		//console.log('cors data',data);
	},
	error: function (jqXHR, textStatus, errorThrown)
	{
	    alert('Error = ' + textStatus + ' ' + errorThrown);
	}
  	});
}


function get_json_data(row,key) {
	return  detail_data[row][key];
}

function set_json_data(row,key,new_value) {
	//console.log('row',row,'key',key,'value',val);
	var old_value = detail_data[row][key];
	
	if(old_value.toString() !== new_value.toString()){
		detail_data[row][key] = new_value;
		if(detail_data[row].crud == 'R'){
			detail_data[row].crud = 'U';	
		}
	}
}