 $(document).ready(function(){
     //reload page
     function reloadPage(){
          location.reload();
        } 
     }
     //Autification
function loginIn(){
     //Data in var
     var login = $('#login').val();
     var password = $('#password').val(); 
     //!!
     alert(login + " " + password)  
     //ajax
        $.ajax({
          type: "POST",
          data: {"ajax":true, 'act':'login_in', 'login':login, 'password':password},
          success: function(data){
               if(data == true){
                  $.ajax({
          type: "POST",
          data: {"ajax":true, 'act':'aut_status'},
          success: function(data){
               alert('ok' + data);          
               }
          }); 
               }//end if
               }
        });   
}//function loginIn end;


function loginForm(){
      $.ajax({
          type: "POST",
          data: {"ajax":true, 'html':'formLogin'},
          success: function(data){
               $('#all').html(data);
               $('#loginin').bind('click', function(){loginIn();});
          }
       });
}     
/////////////////Constructor
         $.ajax({
          type: "POST",
          data: {"ajax":true, 'act':'aut_status'},
          success: function(data){
               if(data == false){loginForm();}
               }
          }); 
           
         
     });/*document ready end*/ 