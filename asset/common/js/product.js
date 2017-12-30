//Instantiating
var Item_category 	= Object.create(Tab_prototype);
Item_category.set_controller('item_category');

var Item	= Object.create(Tab_prototype);
Item.set_controller('item');

var Item_tax	= Object.create(Tab_prototype);
Item_tax.set_controller('item_tax');

Item.display_type = 'panel';
 var item_id ;
function register_event()
{
	$('.table').on('click', function(e)
	{ 
		var target = event.target;
		if (target.nodeName == "SPAN")
		{
			var parent = target.parentElement;

			if(currenttab == 'tab_item_category')
			{
				
				if (parent.id == "button_delete")
				{
					var id = parent.value;
					Item_category.set_check_box(id, true);
					Item_category.fk_id = Item_category.set_id('chk_' + id);
					Item_category.load_delete_form(id, parent.getAttribute('data-message'));
				}
				if (parent.id == "button_edit")
				{
					var id = parent.value;				
					Item_category.set_check_box(id, true);
					Item.fk_id = Item_category.set_id('chk_' + id);
					Item_category.edit_method(id);
				}
			}
			if(currenttab == 'tab_item')
			{
				console.log(currenttab);
				if (parent.id == "button_delete")
				{
					var id = parent.value;
					Item.set_check_box(id, true);
					Item.fk_id = Item.set_id('chk_' + id);
					Item.load_delete_form(id, parent.getAttribute('data-message'));
				}
			}
			if(currenttab == 'tab_item_tax')
			{
				
				if (parent.id == "button_delete")
				{
					var id = parent.value;
					Item_tax.set_check_box(id, true);
					Item_tax.fk_id = Item_tax.set_id('chk_' + id);
					Item_tax.load_delete_form(id, parent.getAttribute('data-message'));
				}
				if (parent.id == "button_edit")
				{
					var id = parent.value;				
					Item_tax.set_check_box(id, true);
					Item.fk_id = Item_tax.set_id('chk_' + id);
					Item_tax.edit_method(id);
				}
			}
		}
	});

	//Check box handle
	$('.check_value').on('click' , function(e) 
	{ 	
		//Product_category.fk_id = Product_category.set_id(this.id);
		Item_category.fk_id = Item_category.set_id(this.id);
		//Product.fk_id = Product.set_id(this.id);
		//console.log('Product_category'.Product_category.id);
	});

	$('[id= "button_add"]').on('click', function(e){
		if(currenttab == 'tab_item_category')
		{			
		
		Item_category.fk_id = Item_category.set_id('chk_' + 0);
		
		var data = {"result":[{"item_category_id":0,"item_category_name":''}]};
		fill_data(data, Item_category.display_type, Item_category.display_type_id)
		}
		
		if(currenttab == 'tab_product')
		{		
			console.log(currenttab,'item_id',Item.id,'Item_category.id',Item_category.id);
			$('#tab_item_detail').trigger('click');	
			currenttab = 'tab_item_detail';
			

			var data = {"result":[{"item_id":0,"item_item_category_id":item_category.id,
			"item_sku":'',"item_name":'',"item_description":'',"item_price":0.00,"item_purchase_price":0.00,
			"item_provider_name":'',"item_tax_rate_id":0}]};
			fill_data(data, Item.display_type, Item.display_type_id)
		}
		if(currenttab == 'tab_item_tax')
		{		
			currenttab = 'tab_item_tax';
			//$('#tab_item_detail').trigger('click');	

			var data = {"result":[{"item_tax_id":0,"item_tax_item_id":item_id,
			"item_tax_wef_date":''}]};
			console.log(Item_tax.display_type,currenttab);
			fill_data(data, Item_tax.display_type, Item_tax.display_type_id)
		}
	});

	// Show Duties And Tax
$('[id= "button_tax_rate"]').on('click', function(e){
	
	$("#tab_item_tax").trigger("click");
	 item_id = this.value;
	 console.log('sdf',item_id);
	Item_tax.get_data_html(item_id, 'item_tax_body');
	});
}
function body_reload()
{
	
	if (currenttab == 'tab_item_category')
	{
		var id =  Item.id;
		Item_category.get_all_data_in_html(Item_category.controller + '_body');
	}
	if (currenttab == 'tab_item_detail')
	{
		var id =  Item_category.id;
		Item.get_data_html(Item_category.id,Item.controller + '_body');
		$('#tab_item').trigger('click');
	}
	if (currenttab == 'tab_item_tax')
	{
		var id =  Item.id;
		Item_tax.get_data_html(item_id,'product_tax_body');
		//$('#tab_product').trigger('click');
	}
}
$(document).ready(function () 
{	
	//as table is added as sub view dynamically and to register the event 
	register_event();
	
	currenttab = 'tab_item_category';

	//Save Button
	$('[id= "button_save_panel"]').on('click', function(e){
		e.preventDefault(); 
		currenttab = 'tab_item_detail';
		if(currenttab == 'tab_item_detail')
		{
			console.log(currenttab,'submit called');
			Item.submit_form();
		}
	});

	$('[id= "button_save_modal"]').on('click', function(e){
		//currenttab ='tab_product_category';
		if(currenttab == 'tab_item_category')
		{
			//console.log('Product_category submit called');
			Item_category.submit_form();
		}
		if(currenttab == 'tab_item_tax')
		{
			console.log('Item tax submit called',currenttab);
			Item_tax.submit_form();
		}
	});
	//Delete Button
	$('[id= "delete_close_btn"]').on('click', function(e){
		if (currenttab == 'tab_item_category')
		{
			var x = Item_category.form_delete();
		}
		if (currenttab == 'tab_item')
		{
			var x = Item.form_delete();
		}
		if (currenttab == 'tab_item_tax')
		{
			var x = Item_tax.form_delete();
		}
	
	});

	
	$('#tab_item').on('click',function(e){
		//set the current tab
		currenttab = 'tab_item';
		//console.log('Product_category'.Product_category.id);
		Item.get_data_html(Item_category.id, 'item_body')
		//console.log(Product_category.id);
	});
	$('#tab_item_detail').on('click',function(e){
		//set the current tab
		//$('#chk_' + this.id ).prop('checked', false);
		
		currenttab = 'tab_item_detail';
		console.log(currenttab,item_id);
		if(item_id > 0){
			Item.edit_method(item_id);
		}
		
	});

	$('#tab_item_tax').on('click',function(e){
		//set the current tab
		currenttab = 'tab_item_tax';
		//console.log('product_id',Product.id,'product_category_id',Product_category.id);
		Item_tax.get_data_html(Item.id, 'item_tax_body');
		console.log('item_id',Item.id);
	});

$('#item_tax_rate_id').select2({ theme: "bootstrap"});
});
