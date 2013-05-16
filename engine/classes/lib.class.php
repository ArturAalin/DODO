<?php
/**
 * @author Artur
 * @copyright 2013
 * @ver: 1.0.1
 */

#БД 
class db{
    private $host;
    
    private $user;
    
    private $password;
    
    protected $base;
    
    protected $mysql;
    
     /*RESULT-ы*/
    public $result;
    
    public $result2;
    
    public $result3;
    
     //Конструктор
function __construct($host = NULL, $user = NULL,$password = NULL, $base = NULL, $charset = 'utf8'){
     if($host != NULL or $base != NULL){
          $this->host = $host;
          $this->user = $user;
          $this->password = $password;
          $this->base = $base;
     }else{
     //Стандартные данные
          $this->host = 'localhost';
          $this->user = 'root';
          $this->password = '';
          $this->base = 'record_note';
     }
        $this->mysql = new mysqli($this->host, $this->user, $this->password, $this->base); 
        $this->mysql->set_charset($charset); 
}  

     //Query
function query($query,$option=NULL){
     switch($option){
          case 2:
          $this->result2 = $this->mysql->query($query);
          break;
                    
          case 3:
          $this->result3 = $this->mysql->query($query);
          break;
                    
          default:
          $this->result = $this->mysql->query($query);
          break;
     }
}

}//Class db end
?>