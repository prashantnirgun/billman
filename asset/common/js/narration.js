
//Instantiating
var Narration 	= Object.create(Tab_prototype);
Narration.set_controller('narration');

Narration.display_type = 'panel';
///Meeting.display_type_id = tab_name + '_Modal';


function register_event()
{
	$('.table').on('click', function(e)
	{ 
		var target = event.target;
		if (target.nodeName == "SPAN")
		{
			var parent = target.parentElement;
			//console.log(currenttab);
			currenttab = 'tab_narration';

			if(currenttab == 'tab_narration')
			{
				
				if (parent.id == "button_delete")
				{
					var id = parent.value;
					Narration.set_check_box(id, true);
					Narration.fk_id = Narration.set_id('chk_' + id);
					Narration.load_delete_form(id, parent.getAttribute('data-message'));
				}
			}
		}
	});

	//Check box handle
	$('.check_value').on('click' , function(e) 
	{ 	
		//this will handle check_box click event and set new.id and old.id	
		Narration.fk_id = Narration.set_id(this.id);
	});

	
}
function body_reload()
{
	
	if (currenttab == 'tab_narration_detail')
	{
		var id =  Narration.id;
		Narration.get_all_data_in_html(Narration.controller + '_body');
		$('#tab_narration').trigger('click');
	}
	if (currenttab == 'tab_narration')
	{
	
		var id =  Narration.id;
		Narration.get_all_data_in_html(Narration.controller + '_body');
	}
}
$(document).ready(function () 
{	
	//as table is added as sub view dynamically and to register the event 
	register_event();
	
	//set the default current tab
	currenttab = 'tab_narration';

	$('[id= "button_add"]').on('click', function(e){
		Narration.fk_id = Narration.set_id('chk_' + 0);
		$('#tab_narration_detail').trigger('click');
		var data = {"result":[{"narration_id":0,"narration_branch_id":1,"narration_voucher_type_id":'',"narration_description":''}]};
		fill_data(data, Narration.display_type, Narration.display_type_id)
	});
	//Save Button
	$('[id= "button_save_panel"]').on('click', function(e){
		e.preventDefault(); 
		if(currenttab == 'tab_narration_detail')
		{
			//console.log('submit called');
			Narration.submit_form();
		}
	});

	//Delete Button
	//Delete Button
	$('[id= "delete_close_btn"]').on('click', function(e){
		if (currenttab == 'tab_narration')
		{
			var x = Narration.form_delete();
		}
	
	});

	$('#tab_narration_detail').on('click',function(e){
		//set the current tab
		currenttab = 'tab_narration_detail';
		//console.log(Director.id, Director.old_id);
		Narration.edit_method(Narration.id);
	});

//$('#director_member_id').select2({ theme: "bootstrap"});
});
