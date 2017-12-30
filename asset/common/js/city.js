//Instantiating
var City 	= Object.create(Crud_prototype);
City.set_controller('city');

$(document).ajaxStart(function() { Pace.restart(); }); 


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
					City.edit_method(id);
				}

				if (parent.id == "button_delete")
				{
					var id = parent.value;
					City.load_delete_form(id, parent.getAttribute('data-message'));

				}
		}
	});
	$('#button_add').on('click', function(e){
		$('#alert_box').html('');
		var data = {"result":[{"city_id":0, "city_state_id":'',"city_name":'',"city_member_id":'',
		'city_contact_person':'','city_contact_no':0,'city:city_email':''}]};		
		fill_data(data, City.display_type, City.display_type_id)
	});
	
}
function body_reload()
{
	//alert('body_reload');
		var id =  City.id;
		City.get_all_data_in_html(City.controller + '_body');
   // console.log(City.controller + '_body')
	
} //end of body_reload()
 
 

$(document).ready(function () 
{	
	//as table is added as sub view dynamically and to register the event 
	register_event();

	//Save Button
	$('[id= "button_save_modal"]').on('click', function(e){
		e.preventDefault(); 
		City.submit_form();
		//flash_message('flash_box','success','message');
		
	});

	//Delete Button
	$('[id= "delete_close_btn"]').on('click', function(e){
			var x = City.form_delete();
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
$( "#city_form" ).validate({
  rules: {
    city_name: {
      minlength: 2,
      required: true,
      remote: 
      {
        url: "city/is_unique",
        type: "get",
        data: 
        {  

          branch_id : 0
          ,
          id : function() {
            return $( "#city_id" ).val();
          },
          name : function() {
            return $( "#city_name" ).val();
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
		
		city_name: {
			required: 'City Name is required',
			remote: "city name is already taken"
			//remote: jQuery.validator.format("city name is already taken")
		}
}
});

});


 $('#city_member_id').select2({ theme: "bootstrap"});
 $('#city_state_id').select2({ theme: "bootstrap"});
