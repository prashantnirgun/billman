
//Instantiating
var Company 	= Object.create(Tab_prototype);
var Branch 	= Object.create(Tab_prototype);

Company.set_controller('company');
Branch.set_controller('branch');

function register_event()
{
	$('.table').on('click', function(e)
	{ 
		var target = event.target;
		if (target.nodeName == "SPAN")
		{
			var parent = target.parentElement;
			//console.log(currenttab);

			if(currenttab == 'tab_company')
			{
				if (parent.id == "button_edit")
				{
					var id = parent.value;				
					Company.set_check_box(id, true);
					Branch.fk_id = Company.set_id('chk_' + id);
					Company.edit_method(id);
				}

				if (parent.id == "button_delete")
				{
					var id = parent.value;
					Company.set_check_box(id, true);
					Branch.fk_id = Company.set_id('chk_' + id);
					Company.load_delete_form(id, parent.getAttribute('data-message'));
				}
			}
			if(currenttab == 'tab_branch')
			{
				if (parent.id == "button_edit")
				{
					var id = parent.value;					
					Branch.id = id;
					Branch.edit_method(id);
				}

				if (parent.id == "button_delete")
				{
					var id = parent.value;
					Branch.set_check_box(id, true);
					Branch.load_delete_form(id, parent.getAttribute('data-message'));
				}
			}

		}
	});

	//Check box handle
	$('.check_value').on('click' , function(e) 
	{ 	
		//this will handle check_box click event and set new.id and old.id	
		Branch.fk_id = Company.set_id(this.id);
		
	});

	//Add Button
	$('[id= "button_add"]').on('click', function(e){

		if(currenttab == 'tab_company')
		{
			var data = {"result":[{"company_id":0, "company_name":'',"company_no_of_branch":0,"company_address1":'',
					"company_address2":'',"company_address3":'',"company_company_type_id":0,"company_start_date":'',"":'company_end_date'}]};	
			fill_data(data, Company.display_type, Company.display_type_id)
		}
		if(currenttab == 'tab_branch')
		{
			var data = {"result":[{"branch_id":0, "branch_company_id":Company.id,"branch_manager":'',"branch_address1":'',
						"branch_address2":'',"branch_address3":'',"branch_telephone_no":0,"branch_email_id":'',"branch_type_id":15}]};
			fill_data(data, Branch.display_type, Branch.display_type_id)
		}
	});
	
} //End of register_event()

function body_reload()
{
	if (currenttab == 'tab_company')
	{
		var id =  Company.id;
		Company.get_all_data_in_html(Company.controller + '_body');
	}
	if (currenttab == 'tab_branch')
	{
		var id =  Branch.id;
		//No dependency so directly calling data
		Branch.get_data_html(Company.id, Branch.controller + '_body');
	}
} //end of body_reload()


$(document).ready(function () 
{	
	//as table is added as sub view dynamically and to register the event 
	register_event();
	
	//set the default current tab
	currenttab = 'tab_company';

	//Save Button
	$('[id= "button_save_modal"]').on('click', function(e){
		e.preventDefault(); 
		if(currenttab == 'tab_company')
		{
			Company.submit_form();
		}
		if(currenttab == 'tab_branch')
		{
			Branch.submit_form();
			//console.log('save');
		}
	});

	//Delete Button
	$('[id= "delete_close_btn"]').on('click', function(e){
		if (currenttab == 'tab_company')
		{
			var x = Company.form_delete();
		}
		if (currenttab == 'tab_branch')
		{
			var x = Branch.form_delete();
		}
	});


	$('#tab_branch').on('click',function(e){	
		//set the current tab
		currenttab = 'tab_branch';
		Branch.get_data_html(Company.id, 'branch_body');
	});

	$('#tab_company').on('click',function(e){	
		//set the current tab
		currenttab = 'tab_company';
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
//javascript validation
	$( "#company_form" ).validate({
  rules: {
    company_name: {
      minlength: 2,
      required: true,
      remote: 
      {
        url: "company/is_unique",
        type: "get",
        data: 
        {  

          branch_id : 0
          ,
          id : function() {
            return $( "#company_id" ).val();
          },
          name : function() {
            return $( "#company_name" ).val();
          }
        
        },
        beforeSend: function () 
        {
        	$("#button_save_modal").attr('disabled', true);
        	
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
		company_name: {
			required: 'Company name is required',
			
		}
}
});


});

