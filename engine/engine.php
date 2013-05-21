<?php

include('classes/classes.php');    //Классы

     // Объекты
     $db = new db();
     
     $engine = new engine();
     
     $act = new actions();
     
     $user = new user();
     
     $html = new html();
     
     $tmp = new Template();

include('engine/lang/lang.php');   //Скрипт локализатор

     // Action's
     
if(isset ($_POST['act']) or isset($_GET['act'])){
     
     if(isset($_POST['act'])){
          
          $varact = $_POST['act'];  
                  
     }else{
          
          $varact = $_GET['act'];
          
     }
     
     // Экшены
     
     switch ($varact){
          case login_out:
          $act->login_out(); //Возвращает bool
          break;
     
          case login_in:
          $act->login_in($_POST['login'],$_POST['password']); //Возвращает bool
          break;
          
          case authStatus:
          $act->authStatus();
          break;
          
          case __mysql:
          $db->dbStatus();
          break;
     }
}

     // HTML В AJAX
if(isset($_POST['html']) and isset($_POST['ajax'])){
     
     switch ($_POST['html']){
          
          case formLogin:
          $html->getForm('login.htm');
          break;
          
     }
}

//Модули

$engine->addMod('posts');

$rPanel = $engine->addMod('rightPanel','html');


//Генерируем шаблон

define('TMP_RIGHT_PANEL',$rPanel);

define('TMP_BUTTON_GET_POSTS',$html->getHtml('file.phtml'));    



?>