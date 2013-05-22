<?php
class actions{
     
     public $db;
     
     public function __construct(){
          
          $this->db = new db();
          
     }
     
     public function SendBoolAnswer($answer){
          
          if(is_bool($answer) == true){
               
               $answer = json_encode(array('answer'=>$answer));
               
               return $answer;
               
          }                 
     }
          
     //Вход
     public function login_in($login, $pass){ 
               $this->db->query("SELECT `id`,`login`,`password` FROM `users` WHERE `login` = '". $login ."'");
               $result = $this->db->result->fetch_assoc();//Пакуем в массив
               //Проверяем
               if($this->db->result != NULL){
                    if(setcookie("id", $result['id'], time() + 3600 * 24 * 24, "/") == true and $pass == $result['password'] and $pass != ''){
                         $_SESSION['online'] = true;
                         $_SESSION['user_id'] = $result['id'];
                         echo self::SendBoolAnswer(true);
                        
                    }else{
                         self::login_out();
                    }     
               }
     }
     //Проверка на авторизацию
     public function authStatus(){
         if(isset($_COOKIE['id']) and $_SESSION['online'] == true){
               echo self::SendBoolAnswer(true);
          }else{
               echo self::SendBoolAnswer(false);    
          }
          
     }
     
     //Выход
     public function login_out(){
         if(setcookie("id", NULL, time()+3600, "/") == true){
               session_destroy();
         }
     }     
}//Конец класса
?>