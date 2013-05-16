<?php
session_start();

header('Content-Type: text/html; charset=utf-8');

require_once('engine/engine.php');


//Выводим шаблон
if(!isset($_POST['ajax']) and !isset($_GET['ajax'])){
     include('tmp/main.phtml');
}
?>