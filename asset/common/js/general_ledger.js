
//Instantiating
var General_ledger 			= Object.create(Tab_prototype);
var General_ledger_detail 	= Object.create(Tab_prototype);

General_ledger.set_controller('general_ledger');
General_ledger_detail.set_controller('general_ledger_detail');


General_ledger.display_type = 'panel';
General_ledger_detail.display_type = 'panel';

function register_event()
{
	$('.table').on('click', function(e)
	{ 
		var target = event.target;
		if (target.nodeName == "SPAN")
		{
			var parent = target.parentElement;
			
			currenttab = 'tab_general_ledger'
			if(currenttab == 'tab_general_ledger')
			{
				
				if (parent.id == "button_delete")
				{
					var id = parent.value;
					console.log(currenttab,id);
					General_ledger.set_check_box(id, true);
					General_ledger_detail.fk_id = General_ledger.set_id('chk_' + id);
					General_ledger.load_delete_form(id, parent.getAttribute('data-message'));
				}
			}
			

		}
	});

	//Check box handle
	$('.check_value').on('click' , function(e) 
	{ 	
		//console.log(this.id);
		//this will handle check_box click event and set new.id and old.id	
		General_ledger.fk_id = General_ledger.set_id(this.id);
	});

	$('[id= "button_add"]').on('click', function(e){
		//alert('button_add');
		$('#tab_general_ledger_master').trigger('click');

		var data = {"result":[{"general_ledger_id":0,"general_ledger_branch_id":1,"general_ledger_name":'',
					"general_ledger_alise":0,"general_ledger_account_group_id":0,"general_ledger_debit_credit_id":12,
					"general_ledger_opening_amount":0,"general_ledger_debit_amount":0,"general_ledger_credit_amount":0,
					"general_ledger_closing_amount":0,"general_ledger_statutary_id":4,"general_ledger_pancard_no":0,
					"general_ledger_state_vat_no":'',"general_ledger_central_vat_no":''}]};
		fill_data(data, General_ledger.display_type, General_ledger.display_type_id);
	});
}
function body_reload()
{
	
	if (currenttab == 'tab_general_ledger_master')
	{
	
		var id =  General_ledger.id;
		General_ledger.get_all_data_in_html(General_ledger.controller + '_body');
		$('#tab_general_ledger').trigger('click');
	}
	if (currenttab == 'tab_general_ledger_detail')
	{
	
		var id =  General_ledger_detail.id;
		General_ledger_detail.get_data_html(General_ledger.id,General_ledger_detail.controller + '_body');
		$('#tab_general_ledger').trigger('click');
	}
}
$(document).ready(function () 
{	
	//alert('body_reload');
	//as table is added as sub view dynamically and to register the event 
	register_event();
	
	//set the default current tab
	currenttab = 'tab_general_ledger';

	//$('#general_ledger_account_group_id').select2({ theme: "bootstrap"});
	//Save Button
	$('[id= "button_save_panel"]').on('click', function(e){
		e.preventDefault(); 
		
		if(currenttab == 'tab_general_ledger_master')
		{
			//console.log('submit called');
			General_ledger.submit_form();
		}
		if(currenttab == 'tab_general_ledger_detail')
		{
			console.log('submit called');
			General_ledger_detail.submit_form();
		}
	});

	//Delete Button
	$('[id= "delete_close_btn"]').on('click', function(e){
		if (currenttab == 'tab_general_ledger')
		{
			var x = General_ledger.form_delete();
		}
	
	});

	$('#tab_general_ledger_master').on('click',function(e){
		//set the current tab
		currenttab = 'tab_general_ledger_master';
		//console.log(Director.id, Director.old_id);
		General_ledger.edit_method(General_ledger.id);
	});
	$('#tab_general_ledger_detail').on('click',function(e){
		//set the current tab
		
		currenttab = 'tab_' + General_ledger_detail.controller ;
		General_ledger_detail.edit_method(General_ledger.id, General_ledger_detail.controller + '_body');
	});
	

/*//jquery validation error.
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

	$( "#general_ledger_form" ).validate({
  rules: {
    general_ledger_name: {
      minlength: 2,
      required: true,
      remote: 
      {
        url: "general_ledger/is_unique",
        type: "get",
        data: 
        {  

          branch_id : function() {
            return $( "#general_ledger_branch_id" ).val();
          },
          id : function() {
            return $( "#general_ledger_id" ).val();
          },
          name : function() {
            return $( "#general_ledger_name" ).val();
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
		general_ledger_name: {
			required: 'Name is required',
		
		}
}
});*/
	$('#general_ledger_account_group_id').select2({ theme: "bootstrap"});
	$('#general_ledger_search_account_group_id').select2({ theme: "bootstrap"});
	//$('#acnt_group_general_ledger_group_id').select2({ theme: "bootstrap"});
});

