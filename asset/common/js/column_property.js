//Instantiating
var Column_property 	= Object.create(Tab_prototype);
var Client_column_property 	= Object.create(Tab_prototype);
Column_property.set_controller('column_property');
Client_column_property.set_controller('client_column_property');

//Client_column_property.display_type = 'panel';
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

			if(currenttab == 'tab_column_property')
			{
				
				if (parent.id == "button_delete")
				{
					var id = parent.value;
					Column_property.set_check_box(id, true);
					Column_property.fk_id = Column_property.set_id('chk_' + id);
					Column_property.load_delete_form(id, parent.getAttribute('data-message'));
				}
				if (parent.id == "button_edit")
				{
					var id = parent.value;				
					Column_property.set_check_box(id, true);
					Column_property.fk_id = Column_property.set_id('chk_' + id);
					Column_property.edit_method(id);
				}
			}
		
	if(currenttab == 'tab_column_client_property')
      {
        if (parent.id == "button_edit")
        {
          var id = parent.value;     
          Client_column_property.id = id;   
          
          Client_column_property.edit_method(id);
          //console.log(Client_column_property.id);
        }

        if (parent.id == "button_delete")
        {
          var id = parent.value;
          Client_column_property.set_check_box(id, true);
          Client_column_property.load_delete_form(id, parent.getAttribute('data-message'));
        }
      }
      }
	});

	//Check box handle
	$('.check_value').on('click' , function(e) 
	{ 	
		//this will handle check_box click event and set new.id and old.id	
		Column_property.fk_id = Column_property.set_id(this.id);
	});
	$('[id= "button_add"]').on('click', function(e){

		if(currenttab == 'tab_column_client_property')
		{			
			
			var data = {"result":[{"client_column_property_id":0,"client_column_property_company_id":1,"client_column_property_column_property_id":Column_property.id,
			"client_cloumn_property_column_name":'','client_column_property_set_default':2,'client_column_property_statutary_id':1}]}; 
			fill_data(data, Client_column_property.display_type, Client_column_property.display_type_id)
			}
			if(currenttab == 'tab_column_property')
		{
			var data = {"result":[{"column_property_id":0, "column_property_statutary_id":1,
			"column_property_column_value":0,'column_property_decription':''}]};
			fill_data(data, Column_property.display_type, Column_property.display_type_id);
		}
	});
	/*$('[id= "button_add"]').on('click', function(e){
		$('#tab_meeting_home_detail').trigger('click');
		var data = {"result":[{"meeting_id":0,"meeting_meeting_date":'',"meeting_remark":'',"meeting_archive_id":1}]}; 
		fill_data(data, Meeting.display_type, Meeting.display_type_id)
	});*/
}
function body_reload()
{
	
	if (currenttab == 'tab_column_property')
	{
	
		var id =  Column_property.id;
		Column_property.get_all_data_in_html(Column_property.controller + '_body');
		//$('#tab_meeting').trigger('click');
	}
	if (currenttab == 'tab_column_client_property')
	{
		var id =  Client_column_property.id;
	    Client_column_property.get_data_html(Column_property.id, 'client_column_property_body');
		
	}
}
$(document).ready(function () 
{	
	//as table is added as sub view dynamically and to register the event 
	register_event();
	
	//set the default current tab
	currenttab = 'tab_column_property';

	//Save Button
	//jquery validation error.
$.validator.setDefaults({
    errorClass: 'help-block',
     //success: "valid",
    highlight: function(element) {
      $(element)
        .closest('.form-group')
        .addClass('has-error');
    },
    unhighlight: function(element) {
      $(element)
        .closest('.form-group')
        .removeClass('has-error');
    },
    errorPlacement: function (error, element) {
      if (element.prop('type') === 'checkbox') {
        error.insertAfter(element.parent());
      } else {
        error.insertAfter(element);
      }
    }
  });
//javascript Validation
$( "#column_property_form" ).validate({
  rules: {
    column_property_column_value: {
      minlength: 2,
      required: true,
      remote: 
      {
        url: "column_property/is_unique",
        type: "get",
        data: 
        {  

          branch_id : 0
          ,
          id : function() {
            return $( "#column_property_id" ).val();
          },
          name : function() {
            return $( "#column_property_column_value" ).val();
          }
        
        },
        beforeSend: function () 
        {
        	$("#button_save_modal").attr('disabled', true);
        	//$('#error_message').text('city name is already taken').addClass('has-error');
        },
        success: function (data) 
        {
        	if (data){
        		$("#button_save_modal").attr('disabled', false);
        	}
        	
        }
      },
    
     },
    
      },
      messages: {
		
		column_property_column_value: {
			required: 'Column Value is required',
			remote: "Column value is already taken"
			//remote: jQuery.validator.format("city name is already taken")
		}
}
});

	$('[id= "button_save_modal"]').on('click', function(e){
		if(currenttab == 'tab_column_client_property')
		{
			//console.log('submit called');
			Client_column_property.submit_form();
		}
		if(currenttab == 'tab_column_property')
		{
			//console.log('submit called');
			Column_property.submit_form();
		}
	});

	//Delete Button
	$('[id= "delete_close_btn"]').on('click', function(e){
		if (currenttab == 'tab_column_property')
		{
			var x = Column_property.form_delete();
		}
		if (currenttab == 'tab_column_client_property')
		{
			var x = Client_column_property.form_delete();
		}
	
	});

	$('#tab_column_client_property').on('click',function(e){	
		//set the current tab

		currenttab = 'tab_column_client_property';
		
		Client_column_property.get_data_html(Column_property.id, 'client_column_property_body');
	});
 //$('#meeting_detail_director_id').select2({ theme: "bootstrap"});

});

