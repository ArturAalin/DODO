<?php
     //Подключение классов
require_once('lib.class.php');
require_once('class.user.php');
require_once('class.html.php');
require_once('class.actions.php'); 
require_once('class.template.php'); 
require_once('class.repl.php'); 

   
     //Функции движка
class engine {
     
     function __construct(){
          
     }
     
     //Метод добавление модуля
     public function addMod($name,$option = false){
          if($option == 'html'){
               
               ob_start();
               
               require('engine/mod/mod.' . $name . '.php');
               
               $content = ob_get_contents();
               
               ob_end_clean();
               
               return $content;   
                
          }elseif($option == false){
               
               include('engine/mod/mod.' . $name . '.php');
               
          }
          
     }
}
?>
