<?php
     // ***Подключение
require_once('lib.class.php');
require_once('class.user.php');
require_once('class.html.php');
require_once('class.actions.php'); 
require_once('class.template.php'); 

     // ***Базовый класс
class engine {
     function __construct(){
          
     }
     
     //Метод добавление модуля
     public function addMod($name){
          ob_start();
          require('engine/mod/mod.' . $name . '.php');
          $content = ob_get_contents();
          ob_end_clean();
          return $content;
     }
}
?>
