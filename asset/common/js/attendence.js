
var Employee 	= Object.create(Tab_prototype);
var Attendence 	= Object.create(Tab_prototype);

Employee.set_controller('employee');
Attendence.set_controller('attendence');
//Attendence.display_type = 'panel';

function register_event()
{
	$('.table').on('click', function(e)
	{ 
		console.log(currenttab);
		var target = event.target;
		if (target.nodeName == "SPAN")
		{
			var parent = target.parentElement;
			

			if(currenttab == 'tab_employee')
			{
				if (parent.id == "button_edit")
				{
				
					var id = parent.value;
					Employee.set_check_box(id, true);
					Employee.fk_id = Employee.set_id('chk_' + id);
					//console.log(Employee.fk_id);
					fn_attendence_detail();					
				}

			}
			if(currenttab == 'tab_attendence')
			{
				if (parent.id == "button_edit")
				{
					//alert('attendence');
					var id = parent.value;
					Attendence.set_check_box(id, true);
					Attendence.fk_id = Attendence.set_id('chk_' + id);
					Attendence.edit_method(id);
					//fn_attendence_detail();	
				}

				
			}
			
		}
	});
	$('#button_sign_out').on('click', function(e) {
  	//alert(this.value); 
  	var id = this.value;
  	//console.log();
    showSignOut(id);
  });

	//Check box handle
	$('.check_value').on('click' , function(e) 
	{ 	
		//this will handle check_box click event and set new.id and old.id	
		Employee.fk_id = Employee.set_id(this.id);
		
	});

	//Add Button
	$('[id= "button_add"]').on('click', function(e){
	
		//console.log('Employee.id',Employee.id);
		var data = {"result":[{"attendence_id":0, "attendence_employee_id":Employee.id,"attendence_present_date":'',"attendence_check_in_time": new Date().toLocaleTimeString('en-US'),
					"attendence_check_out_time":0,"attendence_status_id":7,"attendence_remark":'',"attendence_record_lock":'N'}]};
		fill_data(data, Attendence.display_type, Attendence.display_type_id);
	});
	$('#in_date').datepicker({
		  format: "dd-mm-yyyy"
	});
	$('#out_date').datepicker({
		  format: "dd-mm-yyyy"
	});
} //End of register_event()

function body_reload()
{
	if (currenttab == 'tab_attendence')
	{
		//alert('reload');
		var id =  Attendence.id;
		Attendence.get_data_html(Employee.id,Attendence.controller + '_body');
	}
	
} //end of body_reload()


$(document).ready(function () 
{	
	//as table is added as sub view dynamically and to register the event 
	register_event();
	
	//set the default current tab
	currenttab = 'tab_employee';
	$('#button_search').on('click', function(e)
  {    
    fn_attendence();
  });

	$('#button_sign_out').on('click', function(e)
  {   
  	//alert(this.value); 
    showSignOut(this.value);
  });
	//Save Button
	$('[id= "button_save_modal"]').on('click', function(e){
		e.preventDefault(); 

	      Attendence.submit_form();	
		
	});
	
	$('#tab_attendence').on('click',function(e){
		//set the current tab
		currenttab = 'tab_' + Attendence.controller ;
		//console.log(currenttab,'attendence',Employee.id);
		//alert(currenttab);
		var old_employee_id = 0;
		//if(Employee.id !== old_employee_id){

			Attendence.get_data_html(Attendence.id, 'attendence_body');
			$('#attendence_body').html('');
		//}
		
		
	});
	$('#tab_employee').on('click',function(e){
		//set the current tab
		currenttab = 'tab_' + Employee.controller ;
		//console.log(currenttab);
	});

	var currentDate = new Date();  
	$("#out_date").datepicker("setDate", currentDate);
	currentDate.setDate(01);
	$("#in_date").datepicker("setDate",currentDate);

	 $('.datepicker').on(
'show', function() {
    var zIndexModal = $('#attendence_modal').css('z-index');
    $('.datepicker').css('z-index', zIndexModal + 1);
    //$('.datepicker').css('format', "dd-mm-yyyy");
    //format: "dd-mm-yyyy"

  });
});

function fn_attendence()
 {

  var employee_id  = Employee.id;
// var s = $('#in_date').datepicker('getDates').val().split('-'); 
 // var b = new Date(Number(s[2]),Number(s[1])-1,Number(s[0]) +1);
 //console.log(b);
  var in_date  = $('#in_date').val();
  var out_date  = $('#out_date').val()

            $.ajax({ url: "attendence/retrieve_attendence",
            data: {id: employee_id,in_date:in_date,out_date:out_date},
            type: "POST",
            dataType: "HTML",
            success: function(data) {
               
              $('#attendence_body').html(data);
              register_event();
              
     
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error = ' + textStatus + ' ' + errorThrown);        
            }
        });
        return false;

    //$('#attendence_id').val(employees_id);
  
}
function fn_attendence_detail(){
    //alert(id);
   var employee_id  = Employee.id;
  
        //If true then call ajax
            $.ajax({ url: "attendence/show_attendence_details",
            data: {id : employee_id},
            type: "POST",
            dataType: "HTML",
            success: function(data) {
                //console.log(data);
             $('#attendence_detail_list').html(data);
              register_event();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error = ' + textStatus + ' ' + errorThrown);        
            }
        });
        return false;

 }

 function showSignOut(id)
{
 
  $.ajax({ url: "attendence/attendence_out",
        //data array { post['argument']  : value, , , , ,}
        data: {id: id},
        type: "POST",
        //dataType: "JSON",
        success: function() {
            //01 fill values 02 Clear error class and Messages
              register_event();
            window.location.reload();
           
            },
            error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error = ' + textStatus + ' ' + errorThrown);        
        }
    });
            return false;
    
}



