<?php

include('classes/classes.php');    //������

     // ***�������
$db = new db();

$engine = new engine();

$act = new actions();

$user = new user();

$html = new html();

$tmp = new Template();

include('engine/lang/lang.php');   //������ �����������

     // ***Action's
if(isset ($_POST['act']) or isset($_GET['act'])){
     if(isset($_POST['act'])){
          $varact = $_POST['act'];          
     }else{
          $varact = $_GET['act'];
     }
     
     //������
     switch ($varact){
          case login_out:
          $act->login_out(); //���������� bool
          break;
     
          case login_in:
          $act->login_in($_POST['login'],$_POST['password']); //���������� bool
          break;
          
          case authStatus:
          $act->authStatus();
          break;
     }
}

     //HTML � AJAX
if(isset($_POST['html']) and isset($_POST['ajax'])){
     switch ($_POST['html']){
          case formLogin:
          $html->getForm('login.htm');
          break;
          
     }
}

     //������
$engine->addMod('posts');
?>