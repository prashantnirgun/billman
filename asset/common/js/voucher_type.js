//Instantiating
var Voucher_type 	= Object.create(Crud_prototype);
var Voucher_type_detail 	= Object.create(Crud_prototype);
var Voucher_type_tax 	= Object.create(Crud_prototype);

Voucher_type.set_controller('voucher_type');
Voucher_type_detail.set_controller('voucher_type_detail');
Voucher_type_tax.set_controller('voucher_type_tax');



function register_event()
{
	$('.table').on('click', function(e)
	{ 
		var target = event.target;
		if (target.nodeName == "SPAN")
		{
			var parent = target.parentElement;
			//console.log(currenttab);

			if(currenttab == 'tab_voucher_type')
			{
				if (parent.id == "button_edit")
				{
					var id = parent.value;				
					Voucher_type.set_check_box(id, true);
					Voucher_type_detail.fk_id = Voucher_type.set_id('chk_' + id);
					Voucher_type.edit_method(id);
				}

				if (parent.id == "button_delete")
				{
					var id = parent.value;
					Voucher_type.set_check_box(id, true);
					Voucher_type_detail.fk_id = Voucher_type.set_id('chk_' + id);
					Voucher_type.load_delete_form(id, parent.getAttribute('data-message'));
				}
			}
			if(currenttab == 'tab_voucher_type_detail')
			{
				if (parent.id == "button_edit")
				{
					var id = parent.value;					
					Voucher_type_detail.id = id;
					Voucher_type_detail.edit_method(id);
				}

				if (parent.id == "button_delete")
				{
					var id = parent.value;
					Voucher_type_detail.set_check_box(id, true);
					Voucher_type_detail.load_delete_form(id, parent.getAttribute('data-message'));
				}
			}
			if(currenttab == 'tab_voucher_type_tax')
			{
				if (parent.id == "button_edit")
				{
					var id = parent.value;					
					Voucher_type_tax.id = id;
					Voucher_type_tax.edit_method(id);
				}

				if (parent.id == "button_delete")
				{
					var id = parent.value;
					Voucher_type_tax.set_check_box(id, true);
					Voucher_type_tax.load_delete_form(id, parent.getAttribute('data-message'));
				}
			}

		}
	});

	//Check box handle
	$('.check_value').on('click' , function(e) 
	{ 	
		//this will handle check_box click event and set new.id and old.id	
		Voucher_type_detail.fk_id = Voucher_type.set_id(this.id);
		
	});

	//Add Button
	$('[id= "button_add"]').on('click', function(e){

		if(currenttab == 'tab_voucher_type')
		{
			var data = {"result":[{"voucher_type_id":0, "voucher_type_name":'',"voucher_type_company_id":1,"voucher_type_register_id":0,
					"voucher_type_prefix":'',"voucher_type_suffix":'',"voucher_type_debit_credit_id":12,"voucher_type_start_no":0,
					"voucher_type_narration":'',"voucher_type_reset_frequency_id":0,"voucher_type_statutary_id":4,'voucher_member_drop_down':4}]};
			fill_data(data, Voucher_type.display_type, Voucher_type.display_type_id)
		}
		if(currenttab == 'tab_voucher_type_detail')
		{
			
			var data = {"result":[{"voucher_type_detail_id":0, "voucher_type_detail_voucher_type_id":Voucher_type.id,"voucher_type_detail_account_group_id":'',"voucher_type_detail_statutary_id":4}]};
			fill_data(data, Voucher_type_detail.display_type, Voucher_type_detail.display_type_id)
		}
		if(currenttab == 'tab_voucher_type_tax')
		{
			
			var data = {"result":[{"voucher_type_tax_id":0, "voucher_type_tax_voucher_type_id":Voucher_type.id,"voucher_type_tax_tax_rate_id":'',"voucher_type_tax_wef_date":''}]};
			fill_data(data, Voucher_type_tax.display_type, Voucher_type_tax.display_type_id)
		}
	});
	
} //End of register_event()

function body_reload()
{
	if (currenttab == 'tab_voucher_type')
	{
		var id =  Voucher_type.id;
		Voucher_type.get_all_data_in_html(Voucher_type.controller + '_body');
	}
	if (currenttab == 'tab_voucher_type_detail')
	{
		var id =  Voucher_type_detail.id;
		//No dependency so directly calling data
		Voucher_type_detail.get_data_html(Voucher_type.id, Voucher_type_detail.controller + '_body');
	}
	if (currenttab == 'tab_voucher_type_tax')
	{
		var id =  Voucher_type_tax.id;
		//No dependency so directly calling data
		Voucher_type_tax.get_data_html(Voucher_type.id, Voucher_type_tax.controller + '_body');
	}
} //end of body_reload()


$(document).ready(function () 
{	
	//as table is added as sub view dynamically and to register the event 
	register_event();
	
	//set the default current tab
	currenttab = 'tab_voucher_type';

	//Save Button
	$('[id= "button_save_modal"]').on('click', function(e){
		e.preventDefault(); 
		if(currenttab == 'tab_voucher_type')
		{
			Voucher_type.submit_form();
		}
		if(currenttab == 'tab_voucher_type_detail')
		{
			Voucher_type_detail.submit_form();
			//console.log('save');
		}
		if(currenttab == 'tab_voucher_type_tax')
		{
			Voucher_type_tax.submit_form();
			//console.log('save');
		}
	});

	//Delete Button
	$('[id= "delete_close_btn"]').on('click', function(e){
		if (currenttab == 'tab_voucher_type')
		{
			var x = Voucher_type.form_delete();
		}
		if (currenttab == 'tab_voucher_type_detail')
		{
			var x = Voucher_type_detail.form_delete();
		}
		if (currenttab == 'tab_voucher_type_tax')
		{
			var x = Voucher_type_tax.form_delete();
		}
	});


	$('#tab_voucher_type_detail').on('click',function(e){	
		//set the current tab
		currenttab = 'tab_voucher_type_detail';
		Voucher_type_detail.get_data_html(Voucher_type.id, 'voucher_type_detail_body');
	});
	// voucher type tax
	$('#tab_voucher_type_tax').on('click',function(e){	
		//set the current tab
		currenttab = 'tab_voucher_type_tax';
		//console.log('tab_voucher_type_tax');
		Voucher_type_tax.get_data_html(Voucher_type.id, 'voucher_type_tax_body');
	});

	$('#tab_voucher_type').on('click',function(e){	
		//set the current tab
		currenttab = 'tab_voucher_type';
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
//jquery validation
	$( "#voucher_type_form" ).validate({
  rules: {
    voucher_type_name: {
      minlength: 2,
      required: true,
      remote: 
      {
        url: "voucher_type/is_unique",
        type: "get",
        data: 
        {  

          branch_id : 0,
           
          id : function() {
            return $( "#voucher_type_id" ).val();
          },
          name : function() {
            return $( "#voucher_type_name" ).val();
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
		voucher_type_name: {
			required: 'Name is required',
			
		}
}
});
	$('#voucher_type_detail_account_group_id').select2({ theme: "bootstrap"});
	$('#voucher_type_register_id').select2({ theme: "bootstrap"});
});
