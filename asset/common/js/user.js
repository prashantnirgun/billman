

//Instantiating
var User   = Object.create(Tab_prototype);
var User_profile  = Object.create(Tab_prototype);
User.set_controller('user');
User_profile.set_controller('user_profile');

User.display_type = 'panel';
User_profile.display_type = 'panel';
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

      if(currenttab == 'tab_user')
      {
        
        if (parent.id == "button_delete")
        {
         var id = parent.value;
          User.set_check_box(id, true);
          User.fk_id = User.set_id('chk_' + id);
          User.load_delete_form(id, parent.getAttribute('data-message'));
        }
      }
    
  if(currenttab == 'tab_user_profile')
      {
        
        if (parent.id == "button_delete")
        {
          var id = parent.value;
          User_profile.set_check_box(id, true);
          User_profile.load_delete_form(id, parent.getAttribute('data-message'));
        }
      }
      }
  });

  //Check box handle
  $('.check_value').on('click' , function(e) 
  {   
    //this will handle check_box click event and set new.id and old.id  
    User.fk_id = User.set_id(this.id);
  });
 $('[id= "button_add"]').on('click', function(e){
     currenttab = 'tab_user';
     User.fk_id = User.set_id('chk_' + 0);
    if(currenttab == 'tab_user')
    {    
     
      $('#tab_user_home_detail').trigger('click');
      // $('#user_details_area').show();
      var data = {"result":[{"user_id":0,"user_company_id":1,"user_user_group_id":'',"user_name":'',
                            "user_email_id":'',"user_mobile":'',"user_password":'',"user_status_id":'27'}]}; 
      fill_data(data, User.display_type, User.display_type_id);
      $('#user_details_area').show();
      }
    
  });
  /*$('[id= "button_add"]').on('click', function(e){
    $('#tab_meeting_home_detail').trigger('click');
    var data = {"result":[{"meeting_id":0,"meeting_meeting_date":'',"meeting_remark":'',"meeting_archive_id":1}]}; 
    fill_data(data, Meeting.display_type, Meeting.display_type_id)
  });*/
}
function body_reload()
{
  
  if (currenttab == 'tab_user_home_detail')
  {
 // console.log('body_reload');
    var id =  User.id;
    User.get_all_data_in_html(User.controller + '_body');
    $('#tab_user').trigger('click');
  }
  if (currenttab == 'tab_user_profile')
  {
    var id =  User.id;
    User.get_all_data_in_html(User.controller + '_body');
    
  }
}
$(document).ready(function () 
{ 
  //as table is added as sub view dynamically and to register the event 
  register_event();
  
  //set the default current tab
  currenttab = 'tab_user';

   
  //Save Button
  $('[id= "button_save_panel"]').on('click', function(e){
    e.preventDefault(); 
    if(currenttab == 'tab_user_home_detail')
    {
     //console.log('submit called');
      User.submit_form();
    }
    if(currenttab == 'tab_user_profile')
    {
      //console.log('submit called');
      User_profile.submit_form();
    }
  });
 $('[id= "button_change_password"]').on('click', function(e){
    e.preventDefault(); 
   // alert('panel');change_password()
    /*if(currenttab == 'tab_user_password_change')
    {*/
      change_password();

    //} 
  });

  //Delete Button
  $('[id= "delete_close_btn"]').on('click', function(e){
    if (currenttab == 'tab_user')
    {
      var x = User.form_delete();
    }
    if (currenttab == 'tab_meeting_detail')
    {
      var x = Meeting_detail.form_delete();
    }
  
  });


  $('#tab_user_home_detail').on('click',function(e){
    //set the current tab
    //alert('user detail');
    currenttab = 'tab_user_home_detail';
      $('#user_id').val(User.id)
    User.edit_method(User.id);
  });

   $('#tab_user_password_change').on('click',function(e){
    //set the current tab
    
    currenttab = 'tab_user_password_change';
   
      $('#user_id_change').val(User.id)

  });


  $('#tab_user_profile').on('click',function(e){  
    //set the current tab
    currenttab = 'tab_user_profile';
  //  console.log(Meeting.id);
    User_profile.get_data_html(User.id, 'user_profile_body');
  });
 //$('#meeting_detail_director_id').select2({ theme: "bootstrap"});
$('#user_group_status_id').select2({ theme: "bootstrap"});
$('#user_group_id_search').select2({ theme: "bootstrap"});

});

function change_password()
{
  var new_password = $('#user_new_password').val() ;
  var confirmed_password =  $('#user_confirmed_password').val() ;
 // var old_password =  $('#user_old_password').val() ;
  var user_id =  $('#user_id_change').val() ;
  //ar current_timestamp = new Date();
 
  //console.log('url',site_url() + User.controller+"/change_password" );
 if(new_password == confirmed_password) {

  $.ajax(
    {
      url: site_url() + User.controller+"/overwrite_password" ,
      //url: site_url() + "test/f1" ,
        type: "POST",
        data: {user_id :user_id ,new_password:new_password},
        dataType: "JSON",
        success: function(data)
        {

          //console.log('change_password',data,new_password);
          flash_message('flash_box','success','Password changed successfully');
          $('#user_new_password').val() ;
          $('#user_confirmed_password').val() ;
        //  console.log('data',data);
        },
      error: function (jqXHR, textStatus, errorThrown) { alert('Error ' + textStatus + ' ' + errorThrown); }
    });
   }
   else
   {
    alert('Password does not match the confirm password.')
   }
  
}

