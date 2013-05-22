<?php
session_start();

header('Content-Type: text/html; charset=utf-8');

define('SYSTEM_DIR_MODULES','engine/mod/');
define('SYSTEM_DIR_ACTIONS','engine/actions/');


define('ERROR_LOGIN_NULL_PASSWORD','ОШИБКА! Вы отправили пустой пароль');

require_once('engine/engine.php');

//var_dump($_SESSION['online']);

//Выводим шаблон
if(!isset($_POST['ajax']) and !isset($_GET['ajax'])){
     
     include('tmp/main.phtml');
     
}

?>