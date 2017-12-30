var header_data;
var product_dropdown
var item_data;
var product_tax;
var invoice_product_tax;
var invoice_tax;
var voucher_type_tax;
var item_tax = 0;
var chk_id;

var form = Object.create(form_edit_prototype);

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

	// List with handle
	//Sortable.create(listWithHandle, {
	/*
	Sortable.create(item_data_div, {
	  handle: '.glyphicon-move',
	  animation: 150
	});
	*/
	register_event('check_value');
	register_event('tab_change');
	register_event('button_add');
});

function save() {
	console.log(item_data);
}

function add(argument) {
	var data = {};
	var length = item_data.length ;
	header_data.forEach(function(element, index) {

		data[element.column_id] = element.default_value;
		//console.log('data',element);
	});
	data['sr_no'] = length + 1;
	//console.log('data',item_data);
	create_div(length, data);
	
	register_event('child_row');

	item_data[item_data.length] = data;
	//console.log('detail', item_data);
	var row_id = item_data.length -1;
	var a = document.getElementById("row_" + row_id).firstChild.nextSibling.firstChild.id;
	form.current_column = a;
	//item_data[row_id] = {a:row_id +1};
	//console.log('detail data',item_data);
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
				
				 console.log('child_row',e.target.id);
				form.edit_row(find_next_to(e.target.parentElement.parentElement.id,'row_'));
			});
			break;
		case 'product_dropdown':
			$("#hidden_product_name").select2({ data: product_dropdown });
			$("#hidden_product_name").on("change", function(e) {
				var value = this.value;
				console.log('value',value.length)
				
				var rate = $(this).select2('data')[0]['price'];
				var product_name = $(this).select2('data')[0]['product_name'];
				//console.log('rate',rate);
				if(rate == 0){
					document.getElementById('hidden_rate').value = rate;
					set_json_data(form.current_row,'rate',rate);
					set_json_data(form.current_row,'product_name',product_name);
					calculate_amount();
		       
				}
				//calculate_amount();
				/*var data_id = this.value;
					var index = this.selectedIndex;
					var data_value = this.options[this.selectedIndex].text;
					var data_column = this.getAttribute('data-extra'); 

			        $('#row_data_'+ form.current_row + ' #' + find_next_to(this.id, 'hidden_')).html(data_value);
			        //update text and id
			        set_json_data(form.current_row, data_column, data_id);
			        set_json_data(form.current_row, find_next_to(this.id, 'hidden_'), data_value);*/
		    	 calculate_item_tax_amount();
		  		
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
				//alert('delete event');
				var parent = this.parentElement.parentElement;
				//console.log('parent', this.parentElement.parentElement);
				//parent.style.display = "none";
				parent.parentNode.removeChild(parent);
				//parent.remove(parent);
				form.set_row_id(find_next_to(parent.id,'row_'));
				set_json_data(form.current_row,"crud", "D")
			});
			break;
		case 'quantity':
			$('#hidden_quantity').on('change', function() {

				//console.log('quantity',this.value);
		  		set_json_data(form.current_row,'quantity',this.value);
		  		calculate_amount();
			});
			break;
		case 'check_value':
			$('.check_value').on('click', function() {
				//console.log('check_value',this.id);
				 chk_id = fn_check_value(this.id);
				//console.log('check_id',chk_id);
				
		  		
			});
			break;
		case 'hidden_rate':
			$('#hidden_rate').on('change', function() {
				//console.log('quantity',this.value);
		  		set_json_data(form.current_row,'hidden_rate',this.value);
		  		calculate_amount();
			});
			break;
		case 'button_add':
			$('#button_add').on('click', function() {
				//set_json_data(form.current_row,'button_add',this.value);
				//console.log('button_add');
		  		add();
		  		
			});
			break;
		case 'tab_change':
			$('#tab_invoice_detail').on('click',function(e){

				//console.log('tab_change', chk_id);
				get_Voucher_Data(chk_id);
			});
			break;
		default:
			break;
	}
}

function get_Voucher_Data(invoice_id)
{  
	//console.log(invoice_id);
	if(invoice_id !== form.invoice_id && invoice_id > 0){

 	$.ajax({
 	url: site_url() + "invoice/get_invoice/"+ invoice_id,
  	type: "POST",
   	dataType: "JSON",
   	success: function(data) 
	{
		
		header_data = data.header_data;
		product_dropdown = data.product_dropdown;
		item_data = data.item_data;
		product_tax = data.product_tax;
		invoice_product_tax = data.invoice_product_tax;
		invoice_tax = data.invoice_tax;
		voucher_type_tax = data.voucher_type_tax;
		console.log(data);
		sort_json(header_data,'display_order');
		form.print_column_property(header_data);
		//01 table Header
			print_header();		
		//02 data
		form.print_data(item_data);
		//03 bottom 
		
		form.invoice_id = invoice_id
		
		form.print_hidden(header_data);
			
		
		register_event('product_dropdown');
		register_event('blur');
		register_event('quantity');
		//register_event('check_value');
		register_event('hidden_rate');
		
		//register_event('tab_change');
		update_total();
	},
	error: function (jqXHR, textStatus, errorThrown)
	{
	    alert('Error = ' + textStatus + ' ' + errorThrown);
	}
  	});
 }//end of if condition
}

function get_json_data(row,key) {
	return  item_data[row][key];
}

function set_json_data(row,key,new_value) {
	//console.log('row',row,'key',key,'value',new_value);
	if (row > 0 && undefined !== new_value){
		var old_value = item_data[row][key];
	///	console.log('row',row,'key',key,'value',new_value,'old_value',old_value);
		if(old_value.toString() !== new_value.toString()){
			item_data[row][key] = new_value;
			if(item_data[row].crud == 'R'){
				item_data[row].crud = 'U';	
			}
		}
	}
}

function calculate_amount() {
	var rate = document.getElementById('hidden_rate').value;
	var quantity = document.getElementById('hidden_quantity').value;
	var product_id = document.getElementById('hidden_product_name').value;
	var amount = rate * quantity;
	document.getElementById('hidden_amount').value = amount;
	console.log('amount',amount,'rate',rate,'quantity',quantity);
	set_json_data(form.current_row,'amount',amount);
	
	calculate_product_tax(product_id,amount);
	//calculate_invoice_tax();
	update_total();

}

function fn_check_value(value){
	this.id = parseInt(value.substring(4));
	//console.log('fn_check');
	if (this.id !== this.old_id )
	{
		$('#chk_' + this.old_id ).prop('checked', false);
	}
	//console.log('cm',this.id, ' ', this.old_id);
	this.old_id = this.id;
	//console.log('set_id is called');
	return this.id;
}

function update_total() {
	var total = 0;
	item_data.forEach( function(element, index) {
		//console.log(total,element.amount);
		//var amount = parseFloat(element.amount);
		total += parseFloat(element.amount);

	});
	//console.log('total', total);
	document.getElementById('invoice_sales_amount').value = total.toFixed(2);
}

function calculate_product_tax(product_id){

	var gross_amount = 0;
	var total_gross_amount = 0;
	//console.log('product_id',product_id);
	item_data.forEach(function(element, index) {
		
		if (element.product_id == product_id){
				gross_amount += parseFloat(element.amount);
				//console.log('gross_amount',gross_amount);
		}
		total_gross_amount += parseFloat(element.amount);
	});

	product_tax.forEach(function(element, index) {
		//console.log('form current_row',element,product_id);
		if(element.product_id == product_id)
		{
			//Object.keys(invoice_product_tax).length;
			var tax_rate_id = element.tax_rate_id;
			var tax_rate_percent = element.tax_rate_percent;
			//console.log('tax_id',element.tax_rate_id,Object.keys(invoice_product_tax).length);
			
			var tax_amount = (gross_amount * element.tax_rate_percent) / 100;
			//console.log('tax_rate_percent',element.tax_rate_percent,'tax_amount',tax_amount,'gross_amount',gross_amount,'product_id',
				//product_id,'tax_rate_id',tax_rate_id);
			set_invoice_product_tax(product_id, tax_rate_id, gross_amount, tax_amount);
		}
	});
	calculate_invoice_tax(total_gross_amount);
}

function calculate_invoice_tax(total){

		//var gross_amount = 0;
		//console.log('product_id',product_id);
		/*
		var total = 0;
		item_data.forEach( function(element, index) {
			console.log(total,element.amount);
			//var amount = parseFloat(element.amount);
			total += parseFloat(element.amount);

		});
		*/
		var voucher_type_id = document.getElementById('invoice_voucher_type_id').value;
  		voucher_type_tax.forEach(function(element, index) {
		//console.log('form current_row',element,product_id);
		 if(element.voucher_type_id == voucher_type_id)
				{
					//Object.keys(invoice_product_tax).length;
					var tax_rate_id = element.tax_rate_id;
					var tax_rate_percent = element.tax_rate_percent;
					//console.log('tax_id',element.tax_rate_id,Object.keys(invoice_product_tax).length);
					
					var invoice_tax_amount = (total * element.tax_rate_percent) / 100;
					//console.log('tax_rate_percent',element.tax_rate_percent,'invoice_tax_amount',invoice_tax_amount,'total',total
					//,'tax_rate_id',tax_rate_id);
					document.getElementById('invoice_vat_amount').value = invoice_tax_amount ;
					//set_invoice_product_tax(product_id, tax_rate_id, gross_amount, tax_amount);
				}


	});
}

function set_invoice_product_tax(product_id, tax_rate_id, gross_amount, tax_amount){
	var count = Object.keys(invoice_product_tax).length;
	var flag = 0;
	//console.log('count',count,product_id);
	for (var i = 0; i < count; i++) {
		if(invoice_product_tax[i]['tax_id'] == tax_rate_id && invoice_product_tax[i]['product_id']== product_id)
		{
			//console.log('inside flag 1');
			invoice_product_tax[i]['gross_amount'] = gross_amount;
			invoice_product_tax[i]['tax_amount'] = tax_amount;
			flag = 1;
		}
	}

	if(flag == 0) {
		//console.log('inside flag 0',count);	
		invoice_product_tax[count] = {"product_id":product_id,'tax_amount':tax_amount,'tax_id':tax_rate_id,
									'gross_amount':gross_amount};
	}
	//console.log('set invoice_product_tax',invoice_product_tax);	
}
function calculate_item_tax_amount() {
	invoice_product_tax.forEach(function(element, index) {
		 
		item_tax += parseFloat(element.tax_amount);
		
		//console.log('calculate_tax_amount',element.tax_amount,item_tax);
		document.getElementById('invoice_service_tax_paid').value = item_tax;
	});
}
function calculate_total_amount(){
	var total_invoice_amount = 0;
	var sub_total = document.getElementById('invoice_sales_amount').value;
	//var item_tax_total = document.getElementById('invoice_service_tax_paid').value;
	var discount_amount = document.getElementById('invoice_invoice_discount_amount').value;
	var invoice_tax = document.getElementById('invoice_vat_amount').value;
	var round_up = document.getElementById('invoice_round_up').value;
	total_invoice_amount = parseFloat(sub_total) + parseFloat(item_tax) + parseFloat(discount_amount) + parseFloat(round_up) + parseFloat(invoice_tax);
	 document.getElementById('invoice_invoice_amount').value = parseFloat(total_invoice_amount );
	// console.log('total',item_tax,sub_total,parseFloat(total_invoice_amount ));
}
