//declaring object
var form_edit_prototype = {
	invoice_id  : 0,
	current_row : -1,
	previous_row : -1,
	set_data_to_element : fn_set_data_to_element,
	get_data_from_element : fn_get_data_from_element,
	print_data : fn_print_data,
	print_hidden : fn_print_hidden,
	print_column_property : fn_print_column_property,
	edit_row	: fn_edit_row,
	set_row_id	: fn_set_row_id,
	current_column : ''
}

function fn_set_row_id(row_id) {
	this.previous_row = this.current_row;
	this.current_row = row_id;
}

function fn_edit_row(row_id) {
	this.set_row_id(row_id);
	if(this.previous_row >= 0 ){
		document.getElementById('row_data_' + this.previous_row).style.display = "block";
	}

	document.getElementById('row_data_' + this.current_row).style.display = 'none';
	this.set_data_to_element();
	var edit_div = document.getElementById('hidden_row');
	//var edit_div = document.getElementById('hidden_data');
	console.log('edit_div',edit_div,this.current_row);
	//document.getElementById('row_' + this.current_row).appendChild(edit_div);
	document.getElementById('row_' + this.current_row).appendChild(edit_div);

	var p = document.getElementById('hidden_'+ form.current_column);
	p.focus();
}

function format_value(format,value){
	switch (format) {
		case 'decimal':
			value = parseFloat(value) + 0.00;
			value = currency_format(value,true);
			break;
		case 'numeric':
			value = parseFloat(value) ;
			value = currency_format(value,false);
			break;
		default:
			// statements_def
			break;
	}
	return value;
}

function fn_get_data_from_element(id) {
	
	var source = document.getElementById(id);
	var raw_val = source.value;
	
	var val = format_value(source.getAttribute('data-extra'), raw_val);
	
	$('#row_data_'+ this.current_row + ' #' + find_next_to(id, 'hidden_')).html(val);
	//Update Json data value
	set_json_data(this.current_row, find_next_to(id, 'hidden_'), raw_val);
}

function fn_set_data_to_element() {

	var row_id = 'row_data_' + this.current_row;
	var source_node = document.getElementById(row_id).firstChild;
	while (source_node) {
		//console.log('source_node',source_node);
		if(source_node.id !== "btn_delete"){
			var target_node = document.getElementById('hidden_' + source_node.id);
			var class_name = target_node.getAttribute('class');
			if(target_node.nodeName == "SELECT" ){
				var data_column = target_node.getAttribute('data-extra');
				var val = get_json_data(this.current_row,data_column);
				//console.log('fn_set_data_to_element',val);
				$(target_node).val(val).trigger("change");
			}else {
				 //var xx = $(target_node).val();
				 //var xx = $('#'+source_node.id).val();
				target_node.value = get_json_data(this.current_row,source_node.id);
				//console.log('_node',target_node,target_node.value,this.current_row,source_node.id);
			}
		}
		var source_node = source_node.nextSibling;
		//console.log('source_node',source_node);
	}
	$("#hidden_row").css("display","block");
}

function fn_print_data(data) {
		document.getElementById('invoice_item_div').innerHTML = '';
		data.forEach( function(current_obj, index) {
		create_div(index,current_obj);

    }); //end of data.forEach
    register_event('child_row');
    register_event('btn_delete');
}

function create_div (index, data) {
	//console.log('create_div',index, 'data', data); 
	var row = document.createElement("div");
	row.className = 'row list-group-item';
	row.setAttribute("id", 'row_' + index);
	//row.class = "list-group";

	//<span class="glyphicon glyphicon-move" aria-hidden="true"></span>
	var newSpan = document.createElement('span');
	newSpan.setAttribute('class', 'glyphicon glyphicon-move');
	newSpan.setAttribute('aria-hidden', 'true');
	row.appendChild(newSpan);

	//console.log('newSpan',newSpan);
	var row_data = document.createElement("div");
	row_data.id = "row_data_" + index;

	row.appendChild(row_data);

	header_data.forEach( function(element, index) {
		//console.log(element.column_id, element.class_name.indexOf('hidden'));
	if(element.class_name.indexOf('hidden') == -1 ){

		var target = document.createElement("div");
		//Property / Attributes setting
		target.className 	= element.class_name + ' child_row';
		target.id 			= element.column_id ;
		
		var val = format_value(element.extra, data[element.column_id] );
		target.appendChild(document.createTextNode(val));
		row_data.appendChild(target);
	}
	}); //end of header_data.forEach

	var btn = document.createElement("input");
    //Assign different attributes to the btn. 
    btn.setAttribute("type", 	"button");
    btn.setAttribute("value", 	"Delete");
    btn.setAttribute("name", 	"btn_delete");
    btn.setAttribute("id", 		"btn_delete");
    btn.setAttribute("class", 	"btn btn-danger");
    //target.appendChild(btn);
	row_data.appendChild(btn);
	
	//document.getElementById('invoice_item_div').appendChild(row);
	document.getElementById('invoice_item_div').appendChild(row);
	//console.log(row);
}

function fn_print_hidden(data){

	var row = document.createElement("div");
	row.className = 'row';
	row.id = 'hidden_row';
	//console.log('print_hidden()',data);
	data.forEach( function(element, index) {
		var column_id 		= 'hidden_' + element.column_id;
		var column_class 	= element.class_name;
		var column_name 	= element.display_name;
		var column_widget	= element.widget;
		var column_extra	= element.extra;

		var target = document.createElement("div");

		//Non Hidden is true
		if(column_class.indexOf('hidden') == -1 ){
			//Property / Attributes setting
			target.className = "form-group " + column_class ;
			
			if(column_widget.indexOf('dropdown') >= 0 ){
				var new_element = document.createElement("SELECT");
				column_class = "form-control dropdown";

				//register_event(column_widget);
			}else if(column_widget.indexOf('div') >= 0 ){
				var new_element = document.createElement("DIV");
			}else{
				var new_element = document.createElement("INPUT");
				new_element.setAttribute("type", "text");
				column_class = "form-control";
			}

			new_element.setAttribute('data-extra', column_extra);
			new_element.setAttribute("name", column_id);
			new_element.setAttribute("id",  column_id);
			new_element.setAttribute("class", column_class);

			target.appendChild(new_element);
			row.appendChild(target);
		}
	}); //end of header_data.forEach
	document.getElementById('hidden_data').appendChild(row);
	console.log('hidden_data row',row);
	//document.getElementById('hidden_data').innerHTML = row.innerHTML ;

}

function get_column_property(id)
{
  for(var i= 0; i< header_data.length; i++)
  {
    if(header_data[i].id == id)
    {
    	var returnedObject = {};
       	returnedObject["column_class"] 	= header_data[i].class_name;
       	returnedObject["column_id"] 	= header_data[i].id;
       	returnedObject["column_order"] 	= header_data[i].display_order;
       	return returnedObject;
       	break;
    }
  }
}

function fn_print_column_property(data){
	
	var output = '<table border="1"><tr><th>Column ID</th><th>Name</th><th>Order'+
	'</th><th>Class Name</th><th>Widget</th><th>Extra</th><th>Default</th></tr>';
	var end = data.length;

	for (var i = 0; i < end; i++) {
		output += '<tr><td>' + data[i].id + '</td><td>' + 
		data[i].display_name + '</td><td>' + data[i].display_order + '</td><td>' + 
		data[i].class_name + '</td><td>' + data[i].widget + '</td><td>' + 
		data[i].extra + '</td><td>' + data[i].default_value + '</td></tr>';
	}
	output += '</table>';
	$('#header').html(output);
}