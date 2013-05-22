$(document).ready(function(){  
//Переменные
     
     var postBlock = '#left';   //Посты   
     var exitButton = '#exit';     //Кнопка выхода
     var getPostsButton = '#GetPosts'; //Кнопка получения постов
     var sendPostsButton = '#sendPost';
     
     //Клики да кнопочки
     $(exitButton).click(function(){
          loginOut();
     });
     
     var nums = 0;
     $(getPostsButton).click(function(numsPost){
          nums = nums + 1;
          getPosts(nums);
     });
     
     $(sendPostsButton).click(function(){
          var text = $('#textPost').val();
          addPost(text);
     });
     


     
          
     //**Выполняет при загрузке страницы

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
     //**Функция загрузки логин-формы
function loginForm(){
      $.ajax({
          type: "POST",
          dataType: 'html',
          data: {"ajax":true, 'html':'formLogin'},
          success: function(data){
               $(postBlock).html(data);
               $('#loginin').bind('click', function(){loginIn();});
          }
       });
} 


//*****ВХОД \ ВЫХОД
     //**Авторизация
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
     //**Выход
function loginOut(){
     $.ajax({
          type: 'post',
          data: {"ajax":true, 'act':'login_out'},
          success: function(data){
               location.reload();
          }
     });
}

//*****ДЕЙСТВИЯ ЮЗЕРА
     //Получение поста
function getPosts(nums){
     $('#loadIMG').html("<img src='tmp/img/load.gif' />");
     $.ajax({
          type: 'post',
          data: {'ajax':true, 'post':'', 'Nums':nums},
          success: function(data){
               $(postBlock).append(data);
               deletePost();   
               $('#loadIMG').html('');                                             
          }
     });
}

function addPost(text){
     $.ajax({
          type: 'post',
          dataType: 'json',
          data: {'ajax':true, 'post':'add', 'textPost':text},
          success: function(data){
               $(postBlock).append(data);
               deletePost();
          }
     });
}

//Удаление поста
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