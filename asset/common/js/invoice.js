var header_data;
var item_dropdown
var item_tax;

var invoice;
var invoice_item;
var invoice_item_tax;
var invoice_tax;

var voucher_type_tax;
var item_tax_amount = 0;
var chk_id;
var form = Object.create(form_edit_prototype);

$(document).ajaxStart(function() { Pace.restart(); }); 


$(document).ready(function (){
	//var chk_id = parseInt(0) ;
	//get_Voucher_Data(chk_id);



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

	// Listner set for invoice_crud on fields START
	$('#invoice_status_id').on('change', function() {
		set_invoice_crud();
	});

	$('#invoice_invoice_date').on('change', function() {
		set_invoice_crud();
	});

	$('#invoice_date_due').on('change', function() {
		set_invoice_crud();
	});

	$('#invoice_general_ledger_id').on('change', function() {
		set_invoice_crud();
	});

	$('#invoice_reference_no').on('change', function() {
		set_invoice_crud();
	});

	$('#invoice_password').on('change', function() {
		set_invoice_crud();
	});
	// Listner set for invoice_crud on fields END

	// List with handle
	//Sortable.create(listWithHandle, {
	/*
	Sortable.create(invoice_item_div, {
	  handle: '.glyphicon-move',
	  animation: 150
	});
	*/
	register_event('check_value');
	register_event('tab_change');
	register_event('button_add');
	register_event('check_box');
});

function save() {
	console.log(invoice_item);
}

function add(argument) {
	var data = {};
	var length = invoice_item.length ;
	header_data.forEach(function(element, index) {
		data[element.column_id] = element.default_value;
	});
	data['sr_no'] = length + 1;

	create_div(length, data);
	register_event('child_row');

	invoice_item[invoice_item.length] = data;
	var row_id = invoice_item.length -1;
	var a = document.getElementById("row_" + row_id).firstChild.nextSibling.firstChild.id;
	form.current_column = a;

	console.log(a,row_id,form.current_column);
	form.edit_row(row_id);
}

function print_header() {
	var parent = document.getElementById('header_data_div');
	header_data.forEach(function(element, index) {

		if(element.class_name !== "hidden"){
			var target = document.createElement("div");
			target.setAttribute('class', element.class_name);
			var val = element.display_name;
			target.appendChild(document.createTextNode(val));
			parent.appendChild(target);
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
		case 'item_dropdown':
			$("#hidden_item_name").select2({ data: item_dropdown });
			$("#hidden_item_name").on("change", function(e) {
				var value = this.value;
				var rate = $(this).select2('data')[0];
				var item_name = $(this).select2('data')[0]['item_name'];
				
				if(rate == 0){
					document.getElementById('hidden_rate').value = rate;
					set_json_data(form.current_row,'rate',rate);
					set_json_data(form.current_row,'item_name',item_name);
					calculate_amount();
				}
				calculate_total_amount();
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
				var parent = this.parentElement.parentElement;
				//console.log('parent', this.parentElement.parentElement);
				//parent.style.display = "none";
				parent.parentNode.removeChild(parent);
				//parent.remove(parent);
				form.set_row_id(find_next_to(parent.id,'row_'));
				set_json_data(form.current_row,"crud", "D")
			});
			break;
		case 'hidden_quantity':
			$('#hidden_quantity').on('change', function() {
				set_json_data(form.current_row,'hidden_quantity',this.value);
				calculate_amount();
				calculate_total_amount();
			});
			break;
		case 'check_value':
			$('.check_value').on('click', function() {
				chk_id = fn_check_value(this.id);
			});
			break;
		case 'hidden_rate':
			$('#hidden_rate').on('change', function() {
				set_json_data(form.current_row,'hidden_rate',this.value);
				calculate_amount();
				calculate_total_amount();
			});
			break;
		case 'button_add':
			$('#button_add').on('click', function() {
				add();
			});
			break;
		case 'tab_change':
			$('#tab_invoice_detail').on('click',function(e){
				get_Voucher_Data(chk_id);
				$('#detail_item_tax').empty();
			});
			break;
		case 'check_box':
			$('#check_box').change(function() {
				if(this.checked){
					$( "#item_tax" ).show();
					$( "#detail_item_tax" ).show();
				}else{
					$( "#item_tax" ).hide();
					$( "#detail_item_tax" ).hide();
				}
				this.checked ? 'checked' : 'not checked' ;
			});
			break;
		case 'button_save_panel':
			$('#button_save_panel').on('click',function(e){
				$.ajax({
					url: site_url() + "invoice/form_validate",
					type: "POST",
					dataType: "JSON",
					data: {"invoice" : invoice, "invoice_item" : invoice_item , 
					'invoice_item_tax' :invoice_item_tax, 'invoice_tax' : invoice_tax },
					success: function(data){
						console.log(data);
					}
				});
			});
			break ;
		default:
			break;
	}
}

function get_Voucher_Data(invoice_id)
{
	if(invoice_id !== form.invoice_id && invoice_id > 0){

		$.ajax({
			url: site_url() + "invoice/get_invoice/"+ invoice_id,
			type: "POST",
			dataType: "JSON",
			beforeSend: function(){
			  console.log('beforeSend event');
   			},
			success: function(data) 
			{
				console.log('sucess event');
				header_data = data.header_data;
				item_dropdown = data.item_dropdown;
				item_tax = data.item_tax;
				
				invoice = data.invoice;
				invoice_item = data.invoice_item;
				invoice_item_tax = data.invoice_item_tax;
				invoice_tax = data.invoice_tax;
				voucher_type_tax = data.voucher_type_tax;
			
				console.log(data);
				sort_json(header_data,'display_order');
				form.print_column_property(header_data);
				//01 table Header
				print_header();		
				//02 data
				form.print_data(invoice_item);
				//03 bottom 
				
				form.invoice_id = invoice_id
				
				form.print_hidden(header_data);

				fill_invoice_data();

				register_event('item_dropdown');
				register_event('blur');
				register_event('hidden_quantity');
				//register_event('check_value');
				register_event('hidden_rate');
				register_event('button_save_panel');
				
				//register_event('tab_change');
				update_total();
			},
		complete: function(){
     		console.log('complete event');
   		},
		error: function (jqXHR, textStatus, errorThrown)
		{
			alert('Error = ' + textStatus + ' ' + errorThrown);
		}
	});
 }//end of if condition
}

function get_json_data(row,key) {
	return  invoice_item[row][key];
}

function set_json_data(row,key,new_value) {
	console.log('row',row,'key',key,'value',new_value,invoice_item[row][key]);
	if (row >= 0 && undefined !== new_value){
		var old_value = invoice_item[row][key];
		//console.log('set invoice_item',old_value);
		if(old_value !== new_value){
			invoice_item[row][key] = new_value;
			if(invoice_item[row].crud == 'R'){
				invoice_item[row].crud = 'U';	
			}
		}
	}
}

function calculate_amount(){
	var rate = document.getElementById('hidden_rate').value;
	var quantity = document.getElementById('hidden_quantity').value;
	var item_id = document.getElementById('hidden_item_name').value;
	var amount = rate * quantity;
	document.getElementById('hidden_amount').value = amount;
	set_json_data(form.current_row,'amount',amount);
	update_total();
	calculate_item_tax(item_id);
}

function fn_check_value(value){
	this.id = parseInt(value.substring(4));
	if (this.id !== this.old_id )
	{
		$('#chk_' + this.old_id ).prop('checked', false);
	}
	this.old_id = this.id;
	return this.id;
}

function update_total() {
	var total = 0;
	invoice_item.forEach( function(element, index) {
		total += parseFloat(element.amount);
	});
	document.getElementById('invoice_sales_amount').value = total.toFixed(2);
}

function calculate_item_tax(item_id){
	var gross_amount = 0;
	var total_gross_amount = 0;
	var item_name ;
	invoice_item.forEach(function(element, index) {
		
		if (element.item_id == item_id){
			gross_amount += parseFloat(element.amount);
			item_name = element.item_name;
		}
		total_gross_amount += parseFloat(element.amount);
	});

	item_tax.forEach(function(element, index) {
		if(element.item_id == item_id)
		{
			var tax_rate_id = element.tax_rate_id;
			var tax_rate_percent = element.tax_rate_percent;
			console.log('item_id',item_id);
			
			tax_amount = (gross_amount * element.tax_rate_percent) / 100;
			
			item_tax_amount += tax_amount;
			document.getElementById('invoice_service_tax_paid').value = item_tax_amount;

			var row_data = document.createElement("div");
			row_data.className = 'row';
			document.getElementById('detail_item_tax').appendChild(row_data);

			var row_span = document.createElement("div");
			var row_span1 = document.createElement("div");
			var row_span2 = document.createElement("div");
			var row_span3 = document.createElement("div");

			row_span.className = 'col-md-3 ';
			row_span1.className = 'col-md-2';
			row_span2.className = 'col-md-1';
			row_span3.className = 'col-md-1';

			row_data.appendChild(row_span);
			row_data.appendChild(row_span1);
			row_data.appendChild(row_span2);
			row_data.appendChild(row_span3);

			row_span.innerHTML = item_name;
			row_span1.innerHTML = element.tax_rate_name;
			row_span2.innerHTML = element.tax_rate_percent;
			row_span3.innerHTML = item_tax_amount;

			set_invoice_item_tax(item_id, tax_rate_id, gross_amount, item_tax_amount);
		}
	});
	calculate_invoice_tax(total_gross_amount);
}

function calculate_invoice_tax(total){
	var voucher_type_id = document.getElementById('invoice_voucher_type_id').value;

	voucher_type_tax.forEach(function(element, index) {
		if(element.voucher_type_id == voucher_type_id)
		{
			var tax_rate_id = element.tax_rate_id;
			var tax_rate_percent = element.tax_rate_percent;
			var invoice_tax_amount = (total * element.tax_rate_percent) / 100;
			document.getElementById('invoice_vat_amount').value = invoice_tax_amount ;
			var flag = 0;

			var count = Object.keys(invoice_tax).length;
			for (var i = 0; i < count; i++) {
				if(tax_rate_id == invoice_tax[i]['tax_rate_id']){
					invoice_tax[i]['gross_amount'] = total;
					invoice_tax[i]['tax_amount'] = invoice_tax_amount;
					invoice_tax[i]['crud'] = 'U';
					flag = 1;
				}
			}

			if(flag == 0) {
				invoice_tax[count] = {"id" : 0, 'invoice_id': form.invoice_id, 'tax_rate_id' : tax_rate_id,
				'gross_amount' : total, 'tax_amount' : invoice_tax_amount, 'crud' : 'C', };
			}
		}
	});
}

function set_invoice_item_tax(item_id, tax_rate_id, gross_amount, tax_amount){
	var count = Object.keys(invoice_item_tax).length;
	var flag = 0;
	for (var i = 0; i < count; i++) {
		console.log(invoice_item_tax[i]['tax_id']);
		if(invoice_item_tax[i]['tax_id'] == tax_rate_id && invoice_item_tax[i]['item_id']== item_id)
		//if(invoice_item_tax[i]['tax_id'] == 1)
		{
			invoice_item_tax[i]['gross_amount'] = gross_amount;
			invoice_item_tax[i]['tax_amount'] = tax_amount;
			invoice_item_tax[i]['crud'] = 'U';
			flag = 1;
		}
	}

	if(flag == 0) {
		invoice_item_tax[count] = {"id" : 0, 'invoice_id': form.invoice_id, "item_id":item_id, 'gross_amount':gross_amount,
		'tax_amount':tax_amount, 'discount' : 0.00, 'net_amount' : gross_amount + tax_amount, 
		'crud':'C', 'tax_id': tax_rate_id };
	}
}

function calculate_total_amount(){
	var total_amount = 0;
	var sub_total = document.getElementById('invoice_sales_amount').value;
	var item_tax_total = document.getElementById('invoice_service_tax_paid').value;
	var discount_amount = document.getElementById('invoice_discount_amount').value;
	var invoice_tax = document.getElementById('invoice_vat_amount').value;
	var round_up = document.getElementById('invoice_round_up').value;

	total_amount = parseFloat(sub_total) + parseFloat(item_tax_total) + parseFloat(discount_amount) + parseFloat(round_up) + parseFloat(invoice_tax);
	document.getElementById('invoice_amount').value = parseFloat(total_amount );
}

function fill_invoice_data(){
	data = invoice[0];
	var key;
	for (key in data) {
        if (data.hasOwnProperty(key)) {
        	document.getElementById('invoice_' + key).value = data[key];
        }
    }
}

function set_invoice_crud() {
	if(invoice[0]['id'] > 0){
		invoice[0]['crud'] = 'U';
	}else{
		invoice[0]['crud'] = 'C';
	}	
}