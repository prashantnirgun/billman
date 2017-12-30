//Instantiating
var User_group 	= Object.create(Crud_prototype);
User_group.set_controller('user_group');


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
					User_group.edit_method(id);
				}

				if (parent.id == "button_delete")
				{
					var id = parent.value;
					User_group.load_delete_form(id, parent.getAttribute('data-message'));

				}
		}
	});
	$('#button_add').on('click', function(e){
		var data = {"result":[{"user_group_id":0, "user_group_company_id":1,"user_group_name":'',"user_group_status_id":0}]};		
		fill_data(data, User_group.display_type, User_group.display_type_id)
	});
	
}
function body_reload()
{
		var id =  User_group.id;
		User_group.get_all_data_in_html(User_group.controller + '_body');
	
} //end of body_reload()

$(document).ready(function () 
{	
	//as table is added as sub view dynamically and to register the event 
	register_event();
	
	//set the default current tab

	//Save Button
	$('[id= "button_save_modal"]').on('click', function(e){
		e.preventDefault(); 
		
			User_group.submit_form();
		
	});

	//Delete Button
	$('[id= "delete_close_btn"]').on('click', function(e){
		
			var x = User_group.form_delete();
		
	});	
$('#user_group_status_id').select2({ theme: "bootstrap"});
$('#user_group_status_id_search').select2({ theme: "bootstrap"});
});
/*$(document).ready(function () 
{	
	$('.showBtnUserGroup').on('click', function(e){
		user_group.edit_method(this.value);
	});
	$('#addBtnUserGroup').on('click', function(e){
		var data = {"result":[{"user_group_id":0, "user_group_company_id":1,"user_group_name":'',"user_group_status_id":0}]};		
		fill_data(data, user_group.display_type, user_group.display_type_id);
	});
	$('#SaveBtnUserGroup').on('click', function(e){
		e.preventDefault(); 
		user_group.submit_form();
	});
	$('#delete_close_btn').on('click', function(e){
		user_group.submit_form_delete();
	});
	$('.DeleteBtnUserGroup').on('click',function(e)
	{
		user_group.load_delete_form(this.id,this.value);

	});

	

});
*/