//Instantiating
var Acl 	= Object.create(Crud_prototype);
Acl.set_controller('acl');



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
					Acl.edit_method(id);

				}

				if (parent.id == "button_delete")
				{
					var id = parent.value;
					Acl.load_delete_form(id, parent.getAttribute('data-message'));

				}
		}
	});
	$('#button_add').on('click', function(e){
		$('#alert_box').html('');
   
		var data = {"result":[{"acl_id":0, "acl_company_id":1,"acl_module_name":'',"acl_url":'',
		'acl_table_name':'','acl_view_permission':'N','acl_create_permission':'N','acl_update_permission':'N','acl_delete_permission':'N'}]};		
		fill_data(data, Acl.display_type, Acl.display_type_id)
	});
	
}
function body_reload()
{
	//alert('body_reload');
		var id =  Acl.id;
		Acl.get_all_data_in_html(Acl.controller + '_body');
	
} //end of body_reload()
 
 

$(document).ready(function () 
{	
	//as table is added as sub view dynamically and to register the event 
	register_event();
	
	//set the default current tab
	//flash_message('flash_box','success','message');
	
	//Save Button
	$('[id= "button_save_modal"]').on('click', function(e){
		e.preventDefault(); 
		Acl.submit_form();
		//flash_message('flash_box','success','message');
		
	});

	//Delete Button
	$('[id= "delete_close_btn"]').on('click', function(e){
			var x = Acl.form_delete();
	});	
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
/*$( "#acl_form" ).validate({
  rules: {
   acl_module_name: {
      minlength: 2,
      required: true,
      remote: 
      {
        url: "acl/is_unique",
        type: "get",
        data: 
        {  

          branch_id : 0
          ,
          id : function() {
            return $( "#acl_id" ).val();
          },
          module_name : function() {
            return $( "#acl_module_name" ).val();
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
		
		acl_module_name: {
			required: 'Acl Name is required',
			remote: "Acl name is already taken"
			//remote: jQuery.validator.format("city name is already taken")
		}
}
});
*/
});


 
