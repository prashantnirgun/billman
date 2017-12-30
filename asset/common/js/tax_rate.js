//Instantiating
var Tax_rate 	= Object.create(Crud_prototype);
Tax_rate.set_controller('tax_rate');



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
					Tax_rate.edit_method(id);
				}

				if (parent.id == "button_delete")
				{
					var id = parent.value;
					Tax_rate.load_delete_form(id, parent.getAttribute('data-message'));

				}
		}
	});
	$('#button_add').on('click', function(e){
		$('#alert_box').html('');
    console.log('s');
		var data = {"result":[{"tax_rate_id":0,"tax_rate_name":'', "tax_rate_percent":''}]};		
		fill_data(data, Tax_rate.display_type, Tax_rate.display_type_id);
	});
	
}
function body_reload()
{
	//alert('body_reload');
		var id =  Tax_rate.id;
		Tax_rate.get_all_data_in_html(Tax_rate.controller + '_body');
   // console.log(City.controller + '_body')
	
} //end of body_reload()
 
 

$(document).ready(function () 
{	
	//as table is added as sub view dynamically and to register the event 
	register_event();

	//Save Button
	$('[id= "button_save_modal"]').on('click', function(e){
		e.preventDefault(); 
		Tax_rate.submit_form();
		//flash_message('flash_box','success','message');
		
	});

	//Delete Button
	$('[id= "delete_close_btn"]').on('click', function(e){
			var x = Tax_rate.form_delete();
	});	
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
});*/

});


 