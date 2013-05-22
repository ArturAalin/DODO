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
     
     function __construct(){}
     
     public function getControl($action = null,$options = false){
          
           if(!is_null($action)){
               
               return self::runAction($action,$options);  
                         
          } else return 'Не полученно экшена'; 
           
     }
     
     private function runAction($GetAction,$sett){
          
          $ActDir = SYSTEM_DIR_ACTIONS;
          
          $ActFile = $GetAction . '.php';
          
          if(is_dir($ActDir)){
               
               $File = $ActDir. '/' . $ActFile;
               
               if(is_file($File)){
                    
                    include($File);
                    
               }else return 'Переменная не является путем к файлу';
               
          }else return 'Переменная не является путем для каталога';

          if($sett['act'] == true){
               
               return $GetAction;
               
          }
     }    

     
     
     //Жир
     
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
