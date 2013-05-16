<?php
class user{
     
     private $db;
     
     public $userData;
     
     public $Id;
     
     //Конструктор
     public function __construct(){
          $this->db = new db();
          $this->db->query("SELECT * FROM `users` WHERE `id` = '". $_COOKIE['id'] ."'");
          $this->userData = $this->db->result; 
          //ID из сессии
          if($_SESSION['online'] == true){
               $this->Id = $_SESSION['user_id'];
          }
     }
     
     //Проверяет на олнайн
     public function StatusOnline(){
          if($_SESSION['online'] == true){
               return true;
          }else{
               return false;
          }
     }

}
?>