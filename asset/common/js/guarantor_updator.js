//Instantiating
var Guarantor 	= Object.create(Crud_prototype);
Guarantor.set_controller('guarantor');

var Nominee 	= Object.create(Crud_prototype);
Nominee.set_controller('nominee');

var member_serach_id ;
function register_event()
{
	$('.table').on('click', function(e)
	{ 
		var target = event.target;
		if (target.nodeName == "SPAN")
		{
			var parent = target.parentElement;
			var select_element = document.getElementById("select_option");
			var select_opt = select_element.options[select_element.selectedIndex];
		//console.log('select_opt',select_opt);
			if(select_opt.value == 'guarantor')
			{
				if (parent.id == "button_edit")
				{
					var id = parent.value;				
					Guarantor.edit_method(id);
				}

				if (parent.id == "button_delete")
				{
					var id = parent.value;
					Guarantor.load_delete_form(id, parent.getAttribute('data-message'));

				}
			}else{
				if (parent.id == "button_edit")
				{
					var id = parent.value;				
					Nominee.edit_method(id);
				}

				if (parent.id == "button_delete")
				{
					var id = parent.value;
					Nominee.load_delete_form(id, parent.getAttribute('data-message'));

				}
			}
		}
	});
	

	$('#button_add').on('click', function(e){

		var element = document.getElementById("member_id_search");
		var opt = element.options[element.selectedIndex];
		 member_serach_id = opt.value;  
		// console.log('opt',member_serach_id);

	var select_element = document.getElementById("select_option");
	var select_opt = select_element.options[select_element.selectedIndex];
		
		if(select_opt.value == 'guarantor')
		{
			
			//console.log('select_opt Guarantor',select_opt);
		 	var data = {"result":[{"guarantor_id":0, "guarantor_member_id":member_serach_id,"guarantor_guarantor_id":0,"guarantor_start_date":'',
									"guarantor_status_id":27}]};
			fill_data(data, Guarantor.display_type, Guarantor.display_type_id);
		
		}else
		{
			//console.log('select_opt',select_opt);
			
		var data = {"result":[{"nominee_id":0, "nominee_member_id":member_serach_id,"nominee_hierarchy":0,"nominee_salutation_id":0,
							"nominee_name":'',"nominee_relationship":'',"nominee_nominee_date":'',"nominee_major_minor_id":0,
							"nominee_age":0,"nominee_guardian":'',"nominee_guardian_relation":'',"nominee_address1":'',"nominee_address3":'',
							"nominee_telephone_no":0,"nominee_remark":''}]};
		fill_data(data, Nominee.display_type, Nominee.display_type_id);
		}
						
	});
			
	
}

 $('#search_button').on('click', function(e){
     
	var element = document.getElementById("select_option");
	var opt = element.options[element.selectedIndex];
	var element_1 = document.getElementById("member_id_search");
	var opt_1 = element_1.options[element_1.selectedIndex];
	 member_serach_id = opt_1.value;  
	 		
	if(opt.value == 'nominee')
	{
		//console.log('nominee',opt.value,Nominee.controller);
		var id =  Nominee.id;
		
		register_event();
		var id =  Nominee.id;
		//Nominee.get_data_html(member_serach_id,Nominee.controller + '_body');
		get_data_html_nominee(member_serach_id,Nominee.controller + '_body');
	}else
	{
		
		//console.log('guarantor',opt.value,Guarantor.controller);
		var id =  Guarantor.id;
		//Guarantor.get_data_html(member_serach_id,Guarantor.controller + '_body');
		get_data_html_guarantor(member_serach_id,Guarantor.controller + '_body');
	}

 });

function body_reload()
{
		
} //end of body_reload()

$(document).ready(function () 
{	
	//as table is added as sub view dynamically and to register the event 
	register_event();
	
	//Save Button
	$('[id= "button_save_modal"]').on('click', function(e){
		e.preventDefault(); 
		var select_element = document.getElementById("select_option");
		var select_opt = select_element.options[select_element.selectedIndex];
		if(select_opt.value == "guarantor"){

			Guarantor.submit_form();
		}else{
			Nominee.submit_form();
		}
		
	});
	

	//Delete Button
	$('[id= "delete_close_btn"]').on('click', function(e){
		var select_element = document.getElementById("select_option");
		var select_opt = select_element.options[select_element.selectedIndex];
		if(select_opt.value == "guarantor"){

			var x = Guarantor.form_delete();
		}else{
			var x = Nominee.form_delete();
		}
		
	});	
	 $('#guarantor_guarantor_id').select2({ theme: "bootstrap"});
 $('#member_id_search').select2({ theme: "bootstrap"});

});

function get_data_html_guarantor(id,target)
{
	var url = site_url()   + 'guarantor/get_by_foreign_key/' + id ;
  	//console.log(url);
    if ( id > 0 )
    {
        //If true then call ajax
            $.ajax({ url:url,
            type: "GET",
            dataType: "HTML",
            success: function(data)
            {
            	//console.log(data);
                $('#all_body').html(data);
                register_event();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error = ' + textStatus + ' ' + errorThrown);
            }
        });
        return false;
    }
}
function get_data_html_nominee(id,target)
{
	var url = site_url()   + 'nominee/get_by_foreign_key/' + id ;
  	//console.log(url);
    if ( id > 0 )
    {
        //If true then call ajax
            $.ajax({ url:url,
            type: "GET",
            dataType: "HTML",
            success: function(data)
            {
            	//console.log(data);
                $('#all_body').html(data);
                //$('#guarantor').html('');
                register_event();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error = ' + textStatus + ' ' + errorThrown);
            }
        });
        return false;
    }
}

