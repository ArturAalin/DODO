$(document).ready(function(){     
     //����� �� ��������
     $('#exit').click(function(){
          loginOut();
     });
     
     var nums = 0;
     $('#GetPosts').click(function(numsPost){
          nums = nums + 1;
          getPosts(nums);
     });
     
     $('#sendPost').click(function(){
          var text = $('#textPost').val();
          addPost(text);
     });
     
     //**��������� ��� �������� ��������
$.ajax({
     type: 'POST',
     dataType: 'json',
     data: {"ajax":true, 'act':'authStatus'},
     success: function(data){
          if(data.answer == false){
               loginForm();
          }else{
               getPosts();
          }
     }
}); 
     //**������� �������� �����-�����
function loginForm(){
      $.ajax({
          type: "POST",
          dataType: 'html',
          data: {"ajax":true, 'html':'formLogin'},
          success: function(data){
               $('#all').html(data);
               $('#loginin').bind('click', function(){loginIn();});
          }
       });
} 


//*****���� \ �����
     //**�����������
function loginIn(){
     //Data in var
     var login = $('#login').val();
     var password = $('#password').val(); 
     //ajax
        $.ajax({
          type: "POST",
          data: {"ajax":true, 'act':'login_in', 'login': login, 'password': password},
          success: function(data){
               location.reload();
               }//end if
          });
}
     //**�����
function loginOut(){
     $.ajax({
          type: 'post',
          data: {"ajax":true, 'act':'login_out'},
          success: function(){
               location.reload();
          }
     });
}

//*****�������� �����
     //��������� �����
function getPosts(nums){
     $.ajax({
          type: 'post',
          data: {'ajax':true, 'post':'', 'Nums':nums},
          success: function(data){
               $('#all').append(data);
                deletePost();                                  
          }
     });
}

function addPost(text){
     $.ajax({
          type: 'post',
          dataType: 'json',
          data: {'ajax':true, 'post':'add', 'textPost':text},
          success: function(data){
               var html = $('#all').html();
               html = data + html;
               $('#all').html(html);
               deletePost();
          }
     });
}

//�������� �����
function deletePost(){

     $('.DelPost').on('click', function(){
     var dataID = $(this).attr('data-id');
     $.ajax({
          type: 'POST',
          data: {'ajax':true, 'post':'del', 'delID':dataID},
          success: function(){
                    $("[box-id = " + dataID + "]").remove();  
               }
          });
     });    
}



});//document ready end