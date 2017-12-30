//Instantiating
var Account_format 	= Object.create(Tab_prototype);
var Account_head 	= Object.create(Tab_prototype);

Account_format.set_controller('account_format');
Account_head.set_controller('account_head');

function register_event()
{
	$('.table').on('click', function(e)
	{ 
		var target = event.target;
		if (target.nodeName == "SPAN")
		{
			var parent = target.parentElement;
			//console.log(currenttab);

			if(currenttab == 'tab_account_format')
			{
				if (parent.id == "button_edit")
				{
					var id = parent.value;				
					Account_format.set_check_box(id, true);
					Account_head.fk_id = Account_format.set_id('chk_' + id);
					Account_format.edit_method(id);
				}

				if (parent.id == "button_delete")
				{
					var id = parent.value;
					Account_format.set_check_box(id, true);
					Account_head.fk_id = Account_format.set_id('chk_' + id);
					Account_format.load_delete_form(id, parent.getAttribute('data-message'));
				}
			}
			if(currenttab == 'tab_account_head')
			{
				if (parent.id == "button_edit")
				{
					var id = parent.value;					
					Account_head.id = id;
					Account_head.edit_method(id);
				}

				if (parent.id == "button_delete")
				{
					var id = parent.value;
					Account_head.set_check_box(id, true);
					Account_head.load_delete_form(id, parent.getAttribute('data-message'));
				}
			}

		}
	});

	//Check box handle
	$('.check_value').on('click' , function(e) 
	{ 	
		//this will handle check_box click event and set new.id and old.id	
		Account_head.fk_id = Account_format.set_id(this.id);
		
	});

	//Add Button
	$('[id= "button_add"]').on('click', function(e){

		if(currenttab == 'tab_account_format')
		{
			var data = {"result":[{"account_format_id":0, "account_format_name":'',"account_format_branch_id":1,"account_format_statutary_id":4}]};
			fill_data(data, Account_format.display_type, Account_format.display_type_id)
		}
		if(currenttab == 'tab_account_head')
		{
			var data = {"result":[{"account_head_id":0, "account_head_name":'',"account_head_branch_id":1,"account_head_statutary_id":4,"account_head_account_format_id":Account_format.id}]};
			fill_data(data, Account_head.display_type, Account_head.display_type_id)
		}
	});
	
} //End of register_event()

function body_reload()
{
	if (currenttab == 'tab_account_format')
	{
		//alert('body_reload');
		var id =  Account_format.id;
		Account_format.get_all_data_in_html(Account_format.controller + '_body');
	}
	if (currenttab == 'tab_account_head')
	{
		var id =  Account_head.id;
		//No dependency so directly calling data
		Account_head.get_data_html(Account_format.id, Account_head.controller + '_body');
	}
} //end of body_reload()


$(document).ready(function () 
{	
	//as table is added as sub view dynamically and to register the event 
	register_event();
	
	//set the default current tab
	currenttab = 'tab_account_format';

	//Save Button
	$('[id= "button_save_modal"]').on('click', function(e){
		e.preventDefault(); 
		if(currenttab == 'tab_account_format')
		{
			Account_format.submit_form();
		}
		if(currenttab == 'tab_account_head')
		{
			Account_head.submit_form();
			//console.log('save');
		}
	});

	//Delete Button
	$('[id= "delete_close_btn"]').on('click', function(e){
		if (currenttab == 'tab_account_format')
		{
			var x = Account_format.form_delete();
		}
		if (currenttab == 'tab_account_head')
		{
			var x = Account_head.form_delete();
		}
	});


	$('#tab_account_head').on('click',function(e){	
		//set the current tab
		currenttab = 'tab_account_head';
		Account_head.get_data_html(Account_format.id, 'account_head_body');
	});

	$('#tab_account_format').on('click',function(e){	
		//set the current tab
		currenttab = 'tab_account_format';
	});
/*  	//jquery validation error.
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
	$( "#account_format_form" ).validate({
  rules: {
    account_format_name: {
      minlength:2,
      required: true,
      remote: 
      {
        url: "account_format/is_unique",
        type: "get",
        data: 
        {  

          branch_id : function() {
            return $( "#account_format_branch_id" ).val();
          },
          id : function() {
            return $( "#account_format_id" ).val();
          },
          name : function() {
            return $( "#account_format_name" ).val();
          }
        
        },
        beforeSend: function () 
        {
        	$("#button_save_modal").attr('disabled', true);
        	//console.log('disabled');
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
		account_format_name: {
			required: 'Account Format is required',
	
		}
}

});
	$( "#account_head_form" ).validate({
  rules: {
    account_head_name: {
      minlength:2,
      required: true,
      remote: 
      {
        url:"account_head/is_unique",
        type: "get",
        data: 
        {  

          branch_id : function() {
            return $( "#account_head_branch_id" ).val();
          },
          id : function() {
            return $( "#account_head_id" ).val();
          },
          name : function() {
            return $( "#account_head_name" ).val();
          }
        
        },
        beforeSend: function () 
        {
        	$("#button_save_modal").attr('disabled', true);
        	//console.log('beforeSend');
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
		account_head_name: {
			required: 'Account head name is required',
			
		}
}
});*/

});
