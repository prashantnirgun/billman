
function register_event()
{

  $('.table td').click(function(e){
    var tbl = document.getElementById("recoveryTable");
    var tbl_lenght = tbl.rows.length-2;
    //alert(tbl_lenght);
        var column_num = parseInt( $(this).index() );
        var row_num = parseInt( $(this).parent().index() );
      
      if (tbl_lenght > 0 && column_num >= 1 )
      {

      
          var row = tbl.rows[row_num]; //.firstChild.innerHTML;
          var in_date = convert_to_mysql_date($('#in_date').datepicker('getDate'));
          //var s = $('#in_date').datepicker('getDates').val().split('-');
          //var b = new Date(Number(s[2]),Number(s[1])-1,Number(s[0]) +1);
          //var date_curr = b.toISOString().slice(0, 10);
           //console.log(date_curr);
          var table_name = row.cells[0].firstChild.nodeValue ;
          var cell_value = row.cells[column_num].firstChild.nodeValue;
      if(cell_value > 0)
      {
         fn_recovery_all_record(table_name,column_num, in_date);
          if(column_num == 1)
          {

           $('#table_name_header').html("Detail Report for  "+table_name + " With Date & Time");
         // document.getElementById('table_name_header').innerHTML = 'Table is '+table_name + ' and Created_at field';
          }else if(column_num == 2)
          {
            //alert(column_num);
             document.getElementById('table_name_header').innerHTML= 'Table is '+table_name + ' and Updated_at field';
          }else
          {
            // alert(column_num);
             document.getElementById('table_name_header').innerHTML= 'Table is '+table_name + ' and Deleted_at field';
          }
      }else
      {
        $('#table_name_header').html('');
        $('#display_all_record').html('');
        alert("There is not record foud.");
      }

      }

  });
   $('#button_report').on('click', function(e)
  {
    fn_recovery_report();
  });
}

$(document).ready(function ()
{
  //alert('sadl');
  register_event();
 //var d = new date();
 var today = new Date();
  var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+ today.getFullYear();
 $('#in_date').val(date);
 });
var fn_recovery_report = function()
 {
  //alert('report recovery');

      //var a = $('#in_date').datepicker('getDates').val();
      //var s = $('#in_date').datepicker('getDates').val().split('-');
      //var b = new Date(Number(s[2]),Number(s[1])-1,Number(s[0]) +1);
      var in_date = convert_to_mysql_date($('#in_date').datepicker('getDate'));
           $.ajax({ url: "report_summary",
            data: {in_date: in_date},
            type: "POST",
            dataType: "HTML",
            success: function(data)
            {

               //console.log(data);
             $('#recovery_report_display').html(data);
              register_event();

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error = ' + textStatus + ' ' + errorThrown);
            }
        });
        return false;
}
function fn_recovery_all_record(table_name,col_name,report_date)

 {

     var url = "reports/report/report_detail/"+table_name+"/"+col_name+"/"+report_date ;
           $.ajax({
            url: url ,
           // data: {in_date: b.toISOString().slice(0, 10),table_name:table_name,col_name:col_name},
            type: "GET",
            dataType: "HTML",
            success: function(data)
            {
              //alert(data);
               //console.log(data);
             $('#display_all_record').html(data);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error = ' + textStatus + ' ' + errorThrown);
            }
        });
        return false;
}
