
//Instantiating
var Employee 	= Object.create(Tab_prototype);
Employee.set_controller('employee');

Employee.display_type = 'panel';
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
			currenttab = 'tab_employee'
			if(currenttab == 'tab_employee')
			{
				
				if (parent.id == "button_delete")
				{
					var id = parent.value;
					Employee.set_check_box(id, true);
					Employee.fk_id = Employee.set_id('chk_' + id);
					Employee.load_delete_form(id, parent.getAttribute('data-message'));
				}
			}
			

		}
	});

	//Check box handle
	$('.check_value').on('click' , function(e) 
	{ 	
		//this will handle check_box click event and set new.id and old.id	
		Employee.fk_id = Employee.set_id(this.id);
	});

	$('[id= "button_add"]').on('click', function(e){
		Employee.fk_id = Employee.set_id('chk_' + 0);
		$('#tab_employee_detail').trigger('click');
		console.log('add button');
		var data = {"result":[{"employee_id":0,"employee_name":'',"employee_user_id":0,"employee_telephone_no1":0,
					"employee_telephone_no2":0,"employee_email_id":'',"employee_address1":'',"employee_address2":'',
					"employee_pancard_no":0,"employee_birth_date":'',"employee_marital_status_id":0,"employee_gender_id":0,"employee_employeement_type_id":0}]};
		fill_data(data, Employee.display_type, Employee.display_type_id);
	});
}
function body_reload()
{
	
	if (currenttab == 'tab_employee_detail')
	{
	
		var id =  Employee.id;
		Employee.get_all_data_in_html(Employee.controller + '_body');
		$('#tab_employee').trigger('click');
	}
}
$(document).ready(function () 
{	
	//as table is added as sub view dynamically and to register the event 
	register_event();
	
	//set the default current tab
	currenttab = 'tab_employee';

	//Save Button
	$('[id= "button_save_panel"]').on('click', function(e){
		e.preventDefault(); 
		if(currenttab == 'tab_employee_detail')
		{
			Employee.submit_form();
		}
	});

	//Delete Button
	$('[id= "delete_close_btn"]').on('click', function(e){
		if (currenttab == 'tab_employee')
		{
			var x = Employee.form_delete();
		}
	
	});


	$('#tab_employee_detail').on('click',function(e){
		//set the current tab
		currenttab = 'tab_employee_detail';
		//alert(currenttab);
		//console.log(Director.id, Director.old_id);
		Employee.edit_method(Employee.id);
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
//jquery validation
$( "#employee_form" ).validate({
  rules: {
    employee_name: {
      required: true,
      minlength: 2,
      remote: 
      {
        url: "employee/is_unique",
        type: "get",
        data: 
        {  

          branch_id : 0
          ,
          id : function() {
            return $( "#employee_id" ).val();
          },
          name : function() {
            return $( "#employee_name" ).val();
          }
        
        },
        beforeSend: function () 
        {
        	$("#button_save_panel").attr('disabled', true);
        	
        },
        success: function (data) 
        {
        	if (data){
        		$("#button_save_panel").attr('disabled', false);
        	}
        	
        }
      },
    
     },
    
      },
      messages: {
		employee_name: {
			required: 'Employee name is required',
	
		}
}
});*/

$('#employee_user_id').select2({ theme: "bootstrap"});
});
