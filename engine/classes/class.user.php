<?php
class user{
     
     public $db;
     
     public $userData;
     
     public $Id;
     
     public $NickName;
     
     //Конструктор
     public function __construct(){
          
          $this->db = new db();
          
          if(isset($_COOKIE['id'])){
               
               $this->userData = $this->db->MQuery("SELECT * FROM `users` WHERE `id` = '". $_COOKIE['id'] ."'"); 
                   
          }
          
          
          
          //ID из сессии
          if(isset($_SESSION['online'])){
               
               if($_SESSION['online'] == true){
                    
                    $this->Id = $_SESSION['user_id'];
                    
               }   
                
          }
          
          
          //self::$NickName = self::$userData['nickname'];
          
     }
     
     //Проверяет на олнайн
     public function StatusOnline(){
          if(isset($_SESSION['online'])){
               if($_SESSION['online'] == true){
                    
                    return true;
                    
               }else{
                    
                    return false;
                    
               }     
          }  
     }

}
?>