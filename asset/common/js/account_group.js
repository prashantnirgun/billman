
//Instantiating
var Account_group 	= Object.create(Tab_prototype);
Account_group.set_controller('account_group');

Account_group.display_type = 'panel';
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
			currenttab = 'tab_account_group'
			if(currenttab == 'tab_account_group')
			{
				if (parent.id == "button_delete")
				{
					var id = parent.value;
					Account_group.set_check_box(id, true);
					Account_group.fk_id = Account_group.set_id('chk_' + id);
					Account_group.load_delete_form(id, parent.getAttribute('data-message'));
				}
			}
		}
	});

	//Check box handle
	$('.check_value').on('click' , function(e) 
	{ 	
		//this will handle check_box click event and set new.id and old.id	
		Account_group.fk_id = Account_group.set_id(this.id);
	});

	$('[id= "button_add"]').on('click', function(e){
		Account_group.fk_id = Account_group.set_id('chk_' + 0);
		$('#tab_account_group_detail').trigger('click');
		var data = {"result":[{"account_group_id":0,"account_group_name":'',"account_group_herarcy":'',"account_group_account_head_id":1,"account_group_statutary_id":2,"account_group_branch_id":1}]}; 
		fill_data(data, Account_group.display_type, Account_group.display_type_id)
	});
}
function body_reload()
{
	if (currenttab == 'tab_account_group')
	{
		var id =  Account_group.id;
		Account_group.get_all_data_in_html(Account_group.controller + '_body');
		//$('#tab_account_group').trigger('click');
	}
	if (currenttab == 'tab_account_group_detail')
	{
		var id =  Account_group.id;
		Account_group.get_all_data_in_html(Account_group.controller + '_body');
		$('#tab_account_group').trigger('click');
	}
}
$(document).ready(function () 
{	
	//as table is added as sub view dynamically and to register the event 
	register_event();
	
	//set the default current tab
	currenttab = 'tab_account_group';

	//Save Button
	$('[id= "button_save_panel"]').on('click', function(e){
		e.preventDefault(); 
		/*if(currenttab == 'tab_director')
		{
			Director.submit_form();
		}*/
		if(currenttab == 'tab_account_group_detail')
		{
			//alert('body save');
			Account_group.submit_form();
		}
	});

	//Delete Button
	$('[id= "delete_close_btn"]').on('click', function(e){
		if (currenttab == 'tab_account_group')
		{
			var x = Account_group.form_delete();
		}
	});

	$('#tab_account_group_detail').on('click',function(e){
		//set the current tab
		currenttab = 'tab_account_group_detail';
		//alert(Account_group.id);
		Account_group.edit_method(Account_group.id);
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
$( "#account_group_form" ).validate({
  rules: {
    account_group_name: {
      minlength:2,
      required: true,
      remote: 
      {
        url:"account_group/is_unique",
        type: "get",
        data: 
        {  

          branch_id : function() {
            return $( "#account_group_branch_id" ).val();
          },
          id : function() {
            return $( "#account_group_id" ).val();
          },
          name : function() {
            return $( "#account_group_name" ).val();
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
		account_group_name: {
			required: 'Account group name is required',
			
		}
}
});*/

});
