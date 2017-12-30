//Instantiating
var Acl_user_permission 	= Object.create(Crud_prototype);
Acl_user_permission.set_controller('acl_user_permission');



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
					Acl_user_permission.edit_method(id);

				}

				if (parent.id == "button_delete")
				{
					var id = parent.value;
					Acl_user_permission.load_delete_form(id, parent.getAttribute('data-message'));

				}
		}
	});
	$('#button_add').on('click', function(e){
		$('#alert_box').html('');
   
		var data = {"result":[{"acl_user_permission_id":0, "acl_user_permission_user_id":0,
    "acl_user_permission_acl_id":0,'acl_user_permission_view_permission':'N','acl_user_permission_create_permission':'N',
    'acl_user_permission_update_permission':'N','acl_user_permission_delete_permission':'N'}]};		
		fill_data(data, Acl_user_permission.display_type, Acl_user_permission.display_type_id)
	});
	
}
function body_reload()
{
	//alert('body_reload');
		var id =  Acl_user_permission.id;
		Acl_user_permission.get_all_data_in_html(Acl_user_permission.controller + '_body');
	
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
		Acl_user_permission.submit_form();
		//flash_message('flash_box','success','message');
		
	});

	//Delete Button
	$('[id= "delete_close_btn"]').on('click', function(e){
			var x = Acl_user_permission.form_delete();
	});	
  $('#acl_user_permission_acl_id').select2({ theme: "bootstrap"});
  $('#acl_user_permission_user_id').select2({ theme: "bootstrap"});

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
$( "#acl_user_permission_form" ).validate({
  rules: {
   module_name: {
      minlength: 2,
      required: true,
      remote: 
      {
        url: "acl_user_permission/is_unique",
        type: "get",
        data: 
        {  

          branch_id : 0
          ,
          id : function() {
            return $( "#acl_user_permission_id" ).val();
          },
          name : function() {
            return $( "#acl_user_permission_id_user_id" ).val();
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
		
		acl_user_permission_acl_id: {
			required: 'Acl Name is required',
			remote: "Acl name is already taken"
			//remote: jQuery.validator.format("city name is already taken")
		}
}
});
$('#user_id').select2({ theme: "bootstrap"});

});


 
