//Instantiating
var Acl_group_permission 	= Object.create(Crud_prototype);
Acl_group_permission.set_controller('acl_group_permission');



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
					Acl_group_permission.edit_method(id);

				}

				if (parent.id == "button_delete")
				{
					var id = parent.value;
					Acl_group_permission.load_delete_form(id, parent.getAttribute('data-message'));

				}
		}
	});
	$('#button_add').on('click', function(e){
		$('#alert_box').html('');
   
		var data = {"result":[{"acl_group_permission_id":0, "acl_group_permission_branch_id":1,"acl_group_permission_acl_id":0,
    "acl_group_permission_user_group_id":0,'acl_group_permission_view_permission':'N','acl_group_permission_create_permission':'N',
    'acl_group_permission_update_permission':'N','acl_group_permission_delete_permission':'N'}]};		
		fill_data(data, Acl_group_permission.display_type, Acl_group_permission.display_type_id)
	});
	
}
/*
 $('#search_btn').on('click', function(e){
  e.preventDefault();
  var id =  Acl_group_permission.id;
    Acl_group_permission.get_all_data_in_html(Acl_group_permission.controller + '_body');
  });
*/
function body_reload()
{
	//alert('body_reload');
// $('#search_btn').trigger('click');
		//var id =  Acl_group_permission.id;
		//Acl_group_permission.get_all_data_in_html(Acl_group_permission.controller + '_body');
	
} //end of body_reload()
 
//search_btn
$(document).ready(function () 
{	
	//as table is added as sub view dynamically and to register the event 
	register_event();
	

	//Save Button
	$('[id= "button_save_modal"]').on('click', function(e){
		e.preventDefault(); 
     //$('#search_btn').trigger('click');
		Acl_group_permission.submit_form();
		//flash_message('flash_box','success','message');
		
	});

	//Delete Button
	$('[id= "delete_close_btn"]').on('click', function(e){
			var x = Acl_group_permission.form_delete();
	});	
  $('#acl_group_permission_user_group_id').select2({ theme: "bootstrap"});
  $('#user_group_id').select2({ theme: "bootstrap"});
  $('#acl_group_permission_acl_id').select2({ theme: "bootstrap"});
	//jquery validation error.
/*$.validator.setDefaults({
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
  });*/
    //javascript Validation
/*$( "#acl_group_permission_form" ).validate({
  rules: {
   acl_group_permission_acl_id: {
      minlength: 2,
      required: true,
      remote: 
      {
        url: "acl_group_permission/is_unique",
        type: "get",
        data: 
        {  

          branch_id : 0
          ,
          id : function() {
            return $( "#acl_group_permission_id" ).val();
          },
          name : function() {
            return $( "#acl_group_permission_acl_id" ).val();
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
		
		acl_group_permission_acl_id: {
			required: 'Acl Name is required',
			remote: "Acl name is already taken"
			//remote: jQuery.validator.format("city name is already taken")
		}
}
});*/

});


 
