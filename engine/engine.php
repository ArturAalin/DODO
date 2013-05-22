<?php

include('classes/classes.php');    //Классы

     // Объекты
     $db = new db();
     
     $engine = new engine();
          
     $user = new user();
     
     $html = new html();
     
     $tmp = new Template();

include('engine/lang/lang.php');   //Скрипт локализатор


$gAct = null;

if(isset($_GET['act'])){
     
     $gAct = $_GET['act'];
     
}elseif(isset($_POST['act'])){
     
     $gAct = $_POST['act'];
}

$engine->getControl($gAct); 
     

     // HTML В AJAX
if(isset($_POST['html']) and isset($_POST['ajax'])){
     
     switch ($_POST['html']){
          
          case 'formLogin':
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