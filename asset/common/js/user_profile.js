//Instantiating
var User_profile  = Object.create(Tab_prototype);
var User  = Object.create(Tab_prototype);

User_profile.set_controller('user_profile');
User.set_controller('user');

User_profile.display_type = 'panel';
User.display_type = 'panel';



function register_event()
{
  $('.table').on('click', function(e)
  { 
    var target = event.target;
    if (target.nodeName == "SPAN")
    {
      var parent = target.parentElement;
      //console.log(currenttab);

      if(currenttab == 'tab_user_profile')
      {
     // console.log('sdjf');
        if (parent.id == "button_delete")
        {
         var id = parent.value;
          User_profile.set_check_box(id, true);
          User_profile.fk_id = User_profile.set_id('chk_' + id);
          User_profile.load_delete_form(id, parent.getAttribute('data-message'));
        }
      }
    
      }
  });

  //Check box handle
  $('.check_value').on('click' , function(e) 
  {   
    //this will handle check_box click event and set new.id and old.id  
    User_profile.fk_id = User_profile.set_id(this.id);
  });
 
  /*$('[id= "button_add"]').on('click', function(e){
    $('#tab_meeting_home_detail').trigger('click');
    var data = {"result":[{"meeting_id":0,"meeting_meeting_date":'',"meeting_remark":'',"meeting_archive_id":1}]}; 
    fill_data(data, Meeting.display_type, Meeting.display_type_id)
  });*/
}
function body_reload()
{
  
  if (currenttab == 'tab_user_profile_detail')
  {
 // console.log('body_reload');
    var id =  User_profile.id;
    User_profile.get_all_data_in_html(User_profile.controller + '_body');
    $('#tab_user_profile').trigger('click');
  }
 /* if (currenttab == 'tab_user_profile')
  {
    var id =  User.id;
    User.get_all_data_in_html(User.controller + '_body');
    
  }*/
}
$(document).ready(function () 
{ 

  //as table is added as sub view dynamically and to register the event 
  register_event();
  
  //set the default current tab
  currenttab = 'tab_user';
   var gm = $('#user_user_group_id').val();

  
  
  document.getElementById('designation').innerHTML = $('#user_user_group_id option:selected').text();
 
  
$('[id= "button_save_panel"]').on('click', function(e){
    e.preventDefault(); 
    // console.log(console);
    if(currenttab == 'tab_user')
    {
    // console.log(currenttab);
      User.submit_form();
      document.getElementById('designation').innerHTML = $('#user_user_group_id option:selected').text();
    }
    if(currenttab == 'tab_user_profile')
    {
      
     // console.log('save');
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

  $('#user_profile_form').submit(function(){
   // console.log('saved called');
   // $('input[type="submit"]').prop('disabled', false);
    var data = $('#file-upload').serialize();
    //var url = window.location.origin + '/' + Document.controller + '/form_validate'
    var url =  User_profile.controller +  '/form_validate'
    //console.log(url);
    $.ajax(
    {
      url : url,
      type: "POST",
      data:  new FormData(this),
      contentType: false,
      dataType: "JSON",
      cache: false,
      processData:false,
      success:function(data)
      {
      //  console.log(data);
        if(data.status)
        {
           // $('input[type="submit"]').prop('disabled', true);
          //$('#' + User_profile.display_type_id + '_modal').modal('hide');

           flash_message('flash_box','success','Saved record.');
            // User_profile.get_all_data_in_html(User_profile.controller + '_body');
        }
      }
    });
    return false;
  });
 /*$(function() {
    $("#userfile").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
 
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
 
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").html();
            }
        }
    });
});
*/
 
$('#tab_user_password_change').on('click',function(e){
    //set the current tab
    
    currenttab = 'tab_user_password_change';
    //console.log(currenttab);
    //  $('#user_id_change').val(User.id)

  });
$('#tab_user').on('click',function(e){
    //set the current tab
    
    currenttab = 'tab_user';
     $('#user_new_password').val('');
     $('#user_confirmed_password').val('');
     $('#user_old_password').val('');
    //  $('#user_id_change').val(User.id)

  });
  $('#tab_user_profile_detail').on('click',function(e){
    //set the current tab
    //alert('user detail');
    currenttab = 'tab_user_profile_detail';
     $('#user_new_password').val('');
     $('#user_confirmed_password').val('');
     $('#user_old_password').val('');
    //console.log(Director.id, Director.old_id);
   /// get_user(User.id);
   // User_profile.edit_method(User_profile.id);
  });

  $('#tab_user_profile').on('click',function(e){  
    //set the current tab
    currenttab = 'tab_user_profile';
   //console.log(currenttab);
      $('#user_new_password').val('');
     $('#user_confirmed_password').val('');
     $('#user_old_password').val('');

    //User_profile.get_data_html(User_profile.id, 'user_profile_body');
  });
 //$('#meeting_detail_director_id').select2({ theme: "bootstrap"});

});
function change_password()
{
  var new_password = $('#user_new_password').val() ;
  var confirmed_password =  $('#user_confirmed_password').val() ;
  var old_password =  $('#user_old_password').val() ;
  var user_id =  $('#user_id').val() ;
  var current_timestamp = new Date();
  
 // console.log('old',old_password);
  //console.log('new',new_password);
  //console.log('confirm',confirmed_password);
  //console.log('url',site_url() + User.controller+"/change_password" );
 if(new_password == confirmed_password) {

  $.ajax(
    {
      url: site_url() + User_profile.controller+"/change_password" ,
      //url: site_url() + "test/f1" ,
        type: "POST",
         data: {user_id :user_id ,old_password:old_password,new_password:new_password,current_timestamp:current_timestamp},
        dataType: "JSON",
        success: function(data)
        {

          //console.log('change_password',data,old_password,new_password);
         
          //console.log('data',data);
        },
      error: function (jqXHR, textStatus, errorThrown) { alert('Error ' + textStatus + ' ' + errorThrown); }
    });
   }
   else
   {
    //alert('Password does not match the confirm password.')
     $("#user_confirmed_password").addClass('has-error');
     $("#confirmed_password_msg").html('Password does not match the confirm password.');
   }
  
}
