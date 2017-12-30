//Instantiating
var Form_setting 	= Object.create(Crud_prototype);
Form_setting.set_controller('form_setting');



function register_event()
{
	$('.table').on('click', function(e)
	{ 
		var target = event.target;
		if (target.nodeName == "SPAN")
		{
			var parent = target.parentElement;
			
				if (parent.id == "button_edit")
				{
					var id = parent.value;	
					//$('#alert_box').html('');			
					Form_setting.edit_method(id);
				}

				if (parent.id == "button_delete")
				{
					var id = parent.value;
					Form_setting.load_delete_form(id, parent.getAttribute('data-message'));

				}
		}
	});
	$('#button_add').on('click', function(e){
		$('#alert_box').html('');
		var data = {"result":[{"form_setting_id":0, "form_setting_column_id":'',"city_display_name":'',"city_display_order":0,
		'city_class_name':'','city_widget':'','form_setting_extra':'','form_setting_default_value':0,'form_setting_table_name':'',
    'form_setting_form_name':''}]};		
		fill_data(data, Form_setting.display_type, Form_setting.display_type_id)
	});
	
}
function body_reload()
{
	//alert('body_reload');
		var id =  Form_setting.id;
		Form_setting.get_all_data_in_html(Form_setting.controller + '_body');
   // console.log(City.controller + '_body')
	
} //end of body_reload()
 
 

$(document).ready(function () 
{	
	//as table is added as sub view dynamically and to register the event 
	register_event();

	//Save Button
	$('[id= "button_save_modal"]').on('click', function(e){
		e.preventDefault(); 
		Form_setting.submit_form();
		//flash_message('flash_box','success','message');
		
	});

	//Delete Button
	$('[id= "delete_close_btn"]').on('click', function(e){
			var x = Form_setting.form_delete();
	});	

});

