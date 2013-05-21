<?php
/**
 * Модуль постов
*/
//Рбота с записями
class actPosts{    
     
     public $db;
     
     public $user;
     
     public $repl;
     
     //Конструктор
     function __construct(){
          
          $this->db = new db();
          
          $this->user = new user(); 
          
          $this->repl = new modRepl();    
          
     }
          
     //Добавление поста
     public function addPost($text){
          
          if($text != '' and $text != null){
               
               $this->db->query("INSERT INTO `notes` (`id`, `user_id`, `text`, `date`) VALUES (NULL, '". $this->user->Id ."', '". $text ."', '0');");
                   
                    //Достаем последнюю запись
                    
               $this->db->query("SELECT * FROM `notes` WHERE `user_id` = ". $this->user->Id ." ORDER BY `id` DESC LIMIT 1");
               
               $row = $this->db->result->fetch_assoc();
                    
                    //HTML
               ob_start();
               
                    require('tmp/post.phtml');
                    
                    $post = ob_get_contents();
                    
               ob_end_clean();
               
               $post = $this->repl->replace($post);

               if($post != null){
                    
                    echo json_encode($post); 
                         
               }else{
                    
                    echo json_encode('<div class="SYSTEM ERROR">Error! Шаблон не был загружен</div>');   
                                     
               }
                   
          }else{
               
               echo json_encode('<div class="SYSTEM ERROR">ERROR! Вы ничего не отправили</div>');
               
          }  
     }
     
          //Вывод постов
     public function echoPost($nums = false){
          
          if($nums == null)$nums = 0;
          
          $this->db->query('SELECT `id` FROM `notes` ORDER BY `id` DESC LIMIT 1');
          
          $result = $this->db->result->fetch_assoc();
          
          $maxPost = $result['id'];     //Последний пост в БД
          
          $nums = $maxPost - (10 * $nums);
          
          //Достаем посты
          $this->db->query("SELECT * FROM  `notes` WHERE `user_id` = ". $this->user->Id ." and `id` <= ". $nums ."  ORDER BY `id` DESC LIMIT 10");
          
          $result = $this->db->result;
          
          ob_start(); #1
          
               while($row = $result->fetch_array()){
                    
                    ob_start();
                    
                    include('tmp/post.phtml');    //Шаблон
                    
                    $str = ob_get_contents();
                    
                    ob_end_clean();
                              
                    echo $this->repl->replace($str);
                    
               }
               
          $content = ob_get_contents();
          
          ob_end_clean();
          
          echo $content;
     }
     
          //Удаление поста
     public function delPost($id){
          
          $this->db->query('DELETE FROM `notes` WHERE `id` = ' . (int)$id); 
                   
     }
}


if(isset($_POST['ajax']) and $_POST['ajax'] == true and isset($_POST['post'])){#Работает только при ajax запросе
    
     //Объекты
     $act = new actPosts();
     
     //Выбираем что делать
     switch($_POST['post']){
     
          case add:
          $act->addPost($_POST['textPost']);
          break;
          
          case del:
          $act->delPost($_POST['delID']);
          break;
                    
          default:
          $act->echoPost($_POST['Nums']);
          break;
          
     }   
}
?>