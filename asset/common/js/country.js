

//Instantiating
var Country 	= Object.create(Tab_prototype);
var State 	= Object.create(Tab_prototype);

var City 	= Object.create(Crud_prototype);
City.set_controller('city');

Country.set_controller('country');
State.set_controller('state');

$(document).ajaxStart(function() { 
	Pace.restart(); 

}); 

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": true,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "1000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
};

function register_event()
{
	$('.table').on('click', function(e)
	{ 
		var target = event.target;
		if (target.nodeName == "SPAN")
		{
			var parent = target.parentElement;
			//console.log(currenttab);

			if(currenttab == 'tab_country')
			{
				
				if (parent.id == "button_delete")
				{
					var id = parent.value;
					Country.set_check_box(id, true);
					Country.fk_id = Country.set_id('chk_' + id);
					Country.load_delete_form(id, parent.getAttribute('data-message'));
				}
				if (parent.id == "button_edit")
				{
					var id = parent.value;				
					Country.set_check_box(id, true);
					Country.fk_id = Country.set_id('chk_' + id);
					Country.edit_method(id);
				}

			}
			if(currenttab == 'tab_city')
		      {
		        if (parent.id == "button_edit")
		        {
		          var id = parent.value;     
		          City.id = id;   
		          
		          City.edit_method(id);
		          //console.log(State.id);
		        }

		        if (parent.id == "button_delete")
		        {
		          var id = parent.value;
		          City.set_check_box(id, true);
		          City.load_delete_form(id, parent.getAttribute('data-message'));
		        }
		      }
		
	if(currenttab == 'tab_state')
      {
        if (parent.id == "button_edit")
        {
          var id = parent.value;     
          State.id = id;   
          
          State.edit_method(id);
          //console.log(State.id);
        }

        if (parent.id == "button_delete")
        {
          var id = parent.value;
          State.set_check_box(id, true);
          State.load_delete_form(id, parent.getAttribute('data-message'));
        }
      }
      }
	});

	//Check box handle
	$('.check_value').on('click' , function(e) 
	{ 	
		//this will handle check_box click event and set new.id and old.id	

		/*if(currenttab == 'tab_country'){
			console.log('currenttab check',currenttab,Country.fk_id);
			Country.fk_id = Country.set_id(this.id);
		}else{
			//State.fk_id = 0;
			console.log('currenttab check',currenttab,State.fk_id,State.set_id(this.id));
			State.fk_id = State.set_id(this.id);
		}*/
		Country.fk_id = Country.set_id(this.id);
		
	
	});
	$('[id= "button_add"]').on('click', function(e){

		//currenttab =  'tab_country';
			if(currenttab == 'tab_country')
			{			
			
			var data = {"result":[{"country_id":0,"country_name":''}]}; 
			fill_data(data, Country.display_type, Country.display_type_id)
			}
			if(currenttab == 'tab_state')
			{
				var data = {"result":[{"state_id":0, "state_country_id":Country.id,"state_name":''}]};
				fill_data(data, State.display_type, State.display_type_id);
			}
			if(currenttab == 'tab_city')
			{
				var data = {"result":[{"city_id":0, "city_state_id":State.id,"city_name":''}]};
				fill_data(data, City.display_type, City.display_type_id);
			}
	});

$('[id= "button_show_state"]').on('click', function(e){
	//console.log('sdf');
	$("#tab_city").trigger("click");
	var state_id = this.value;
	City.get_data_html(state_id, 'city_body');
});
	
}
function body_reload()
{
	
	if (currenttab == 'tab_country')
	{
	
		var id =  Country.id;
		Country.get_all_data_in_html(Country.controller + '_body');
		//$('#tab_meeting').trigger('click');
	}
	if (currenttab == 'tab_state')
	{
		var id =  State.id;
	    State.get_data_html(Country.id, 'state_body');
		
	}
	if (currenttab == 'tab_city')
	{
		var id =  City.id;
	    City.get_data_html(State.id, 'city_body');
		
	}
}
$(document).ready(function () 
{	
	//as table is added as sub view dynamically and to register the event 
	register_event();
	
	//set the default current tab
	currenttab = 'tab_country';

	
	$('[id= "button_save_modal"]').on('click', function(e){
		if(currenttab == 'tab_country')
		{
			Country.submit_form();
		}
		if(currenttab == 'tab_state')
		{
			State.submit_form();
		}
		if(currenttab == 'tab_city')
		{
			City.submit_form();
		}
	});


	//Delete Button
	$('[id= "delete_close_btn"]').on('click', function(e){
		if (currenttab == 'tab_country')
		{
			var x = Country.form_delete();
		}
		if (currenttab == 'tab_state')
		{
			var x = State.form_delete();
		}
		if (currenttab == 'tab_city')
		{
			var x = City.form_delete();
		}
	
	});


	$('#tab_country').on('click',function(e){
		//set the current tab
		currenttab = 'tab_country';
		//console.log(Country.id,currenttab);
		
	});

	$('#tab_state').on('click',function(e){	
		//set the current tab
		currenttab = 'tab_state';
		//$('#chk_' + this.id ).prop('checked', false);
		//console.log(State.id,currenttab);
		State.get_data_html(Country.id, 'state_body');
	});
	$('#tab_city').on('click',function(e){	
		//set the current tab
		currenttab = 'tab_city';
		//console.log(State.id,currenttab);
		//Loan_detail.fk_id = Country.set_id('chk_' + 0);
		City.get_data_html(State.id, 'city_body');
	});
// $('#meeting_detail_director_id').select2({ theme: "bootstrap"});
$('#city_state_id').select2({ theme: "bootstrap"});

});

