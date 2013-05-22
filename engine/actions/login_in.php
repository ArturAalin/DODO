<?
$db = new db();

$act = new actions();

$login = $_POST['login'];

$pass = $_POST['password'];

$res = $db->MQuery("SELECT `id`,`login`,`password` FROM `users` WHERE `login` = '". $login ."'");

$result = $res->fetch_assoc();     //Пакуем в массив

//Проверяем

//var_dump($res);




if($res != NULL){
     
     if($pass != ''){
          
          $cookie = setcookie("id", $result['id'], time() + 3600 * 24 * 24, "/");
          
          if($cookie == true and $pass == $result['password']){
     
               $_SESSION['online'] = true;
               
               $_SESSION['user_id'] = $result['id'];
               
               echo $act->SendBoolAnswer(true);                   
          }
                
     }else return ERROR_LOGIN_NULL_PASSWORD;
     
   
}

?>