<?php
class user{
     
     private $db;
     
     public $userData;
     
     public $Id;
     
     //�����������
     public function __construct(){
          $this->db = new db();
          $this->db->query("SELECT * FROM `users` WHERE `id` = '". $_COOKIE['id'] ."'");
          $this->userData = $this->db->result; 
          //ID �� ������
          if($_SESSION['online'] == true){
               $this->Id = $_SESSION['user_id'];
          }
     }
     
     //��������� �� ������
     public function StatusOnline(){
          if($_SESSION['online'] == true){
               return true;
          }else{
               return false;
          }
     }

}
?>